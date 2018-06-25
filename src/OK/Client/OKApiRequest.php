<?php

namespace OK\Client;


use OK\TransportClient\Curl\CurlHttpClient;
use OK\TransportClient\TransportClientResponse;
use OK\TransportClient\TransportRequestException;

class OKApiRequest {

    private const PARAM_APPLICATION_KEY = 'application_key';
    private const PARAM_ACCESS_TOKEN = 'access_token';
    private const PARAM_METHOD = 'method';
    private const PARAM_SIG = 'sig';
    private const PARAM_FORMAT = 'format';

    private const KEY_ERROR = 'error';
    private const KEY_RESPONSE = 'response';

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    private $host;

    private $application_key;
    private $application_key_secret;

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


    public function post(string $method, string $access_token, array $params = []) {
        $params = $this->formatParams($params);
        $params[static::PARAM_ACCESS_TOKEN] = $access_token;
        $params[static::PARAM_APPLICATION_KEY] = $this->application_key;
        $params[static::PARAM_METHOD] = $method;
        $params[static::PARAM_SIG] = $this->calcSignature($params);

        try {
            $response = $this->http_client->get($this->host, $params);
        } catch (TransportRequestException $e) {
            throw new VKClientException($e);
        }

        return $this->parseResponse($response);
    }

    private function calcSignature($params){
        $requestStr = "";
        foreach ($params as $key => $value) {
            $requestStr .= $key . "=" . $value;
        }
        $requestStr .= md5($params[static::PARAM_ACCESS_TOKEN] . $this->application_key_secret);
        return md5($requestStr);
    }

    /**
     * Decodes the response and checks its status code and whether it has an Api error. Returns decoded response.
     *
     * @param TransportClientResponse $response
     *
     * @return mixed
     *
     * @throws VKApiException
     * @throws VKClientException
     */
    private function parseResponse(TransportClientResponse $response) {
        $this->checkHttpStatus($response);

        $body = $response->getBody();
        $decode_body = $this->decodeBody($body);

        if (isset($decode_body[static::KEY_ERROR])) {
            $error = $decode_body[static::KEY_ERROR];
            $api_error = new VKApiError($error);
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
     * @throws VKClientException
     */
    protected function checkHttpStatus(TransportClientResponse $response) {
        if ($response->getHttpStatus() != static::HTTP_STATUS_CODE_OK) {
            throw new VKClientException("Invalid http status: {$response->getHttpStatus()}");
        }
    }

}