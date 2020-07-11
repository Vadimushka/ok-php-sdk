<?php

namespace OK\Client;

use OK\Exceptions\Api\ExceptionMapper;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;
use OK\TransportClient\Curl\CurlHttpClient;
use OK\TransportClient\TransportClientResponse;
use OK\TransportClient\TransportRequestException;

class OKApiRequest {

    private const PARAM_APPLICATION_KEY = 'application_key';
    private const PARAM_SIG = 'sig';
    private const PARAM_ACCESS_TOKEN = 'access_token';
    private const PARAM_METHOD = 'method';
    private const PARAM_FORMAT = 'format';

    private const KEY_ERROR = 'error';
    private const KEY_RESPONSE = 'response';

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    /**
     * @var string
     */
    private $host;

    private $application_key;
    private $application_key_secret;

    /**
     * @var CurlHttpClient
     */
    private $http_client;


    /**
     * OKApiRequest constructor.
     * @param string $application_key
     * @param string $app_secret_key
     * @param string $host
     */
    public function __construct(string $application_key, string $app_secret_key, string $host) {
        $this->http_client = new CurlHttpClient(static::CONNECTION_TIMEOUT);
        $this->host = $host;
        $this->application_key = $application_key;
        $this->application_key_secret = $app_secret_key;
    }

    /**
     * Makes post request.
     *
     * @param string $method
     * @param string $access_token
     * @param array $params
     *
     * @return mixed
     *
     * @throws OKClientException
     * @throws OKApiException
     */
    public function post(string $method, string $access_token, array $params = []) {
        $params = $this->formatParams($params);
        $params[static::PARAM_FORMAT] = "json";
        $params[static::PARAM_ACCESS_TOKEN] = $access_token;
        $params[static::PARAM_APPLICATION_KEY] = $this->application_key;
        $params[static::PARAM_METHOD] = $method;
        $params[static::PARAM_SIG] = $this->calcSignature($params);

        try {
            $response = $this->http_client->get($this->host, $params);
        } catch (TransportRequestException $e) {
            throw new OKClientException($e);
        }

        return $this->parseResponse($response);
    }

    private function calcSignature($params){
        $requestStr = "";
        $ACCESS_TOKEN = $params[static::PARAM_ACCESS_TOKEN];
        unset($params[static::PARAM_ACCESS_TOKEN]);
        ksort($params);
        foreach ($params as $key => $value) {
            if($key == self::PARAM_ACCESS_TOKEN)
                continue;
            $requestStr .= $key . "=" . $value;
        }
        $requestStr .= md5($ACCESS_TOKEN . $this->application_key_secret);
        return md5($requestStr);
    }

    /**
     * Uploads data by its path to the given url.
     *
     * @param string $upload_url
     * @param string $parameter_name
     * @param string $path
     *
     * @return mixed
     *
     * @throws OKClientException
     * @throws OKApiException
     */
    public function upload(string $upload_url, string $parameter_name, string $path) {
        try {
            $response = $this->http_client->upload($upload_url, $parameter_name, $path);
        } catch (TransportRequestException $e) {
            throw new OKClientException($e);
        }

        return $this->parseResponse($response);
    }

    /**
     * Decodes the response and checks its status code and whether it has an Api error. Returns decoded response.
     *
     * @param TransportClientResponse $response
     *
     * @return mixed
     *
     * @throws OKApiException
     * @throws OKClientException
     */
    private function parseResponse(TransportClientResponse $response) {
        $this->checkHttpStatus($response);

        $body = $response->getBody();
        $decode_body = $this->decodeBody($body);

        if (isset($decode_body[static::KEY_ERROR])) {
            $error = $decode_body[static::KEY_ERROR];
            $api_error = new OKApiError($error);
            throw ExceptionMapper::parse($api_error);
        }

        if (isset($decode_body[static::KEY_RESPONSE])) {
            return $decode_body[static::KEY_RESPONSE];
        } else {
            return $decode_body;
        }
    }

    /**
     * Formats given array of parameters for making the request.
     *
     * @param array $params
     *
     * @return array
     */
    private function formatParams(array $params) {
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $params[$key] = implode(',', $value);
            } else if (is_bool($value)) {
                $params[$key] = $value ? 1 : 0;
            }
        }
        return $params;
    }

    /**
     * Decodes body.
     *
     * @param string $body
     *
     * @return mixed
     */
    protected function decodeBody(string $body) {
        $decoded_body = json_decode($body, true);

        if ($decoded_body === null || !is_array($decoded_body)) {
            $decoded_body = [];
        }

        return $decoded_body;
    }

    /**
     * @param TransportClientResponse $response
     *
     * @throws OKClientException
     */
    protected function checkHttpStatus(TransportClientResponse $response): void {
        if ($response->getHttpStatus() != static::HTTP_STATUS_CODE_OK) {
            throw new OKClientException("Invalid http status: {$response->getHttpStatus()}");
        }
    }

}