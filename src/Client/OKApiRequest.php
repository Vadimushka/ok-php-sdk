<?php

namespace Vadimushka\OK\Client;

use Vadimushka\OK\Client\OkApiError;
use Vadimushka\OK\Exceptions\Api\ExceptionMapper;
use Vadimushka\OK\Exceptions\OkApiException;
use Vadimushka\OK\Exceptions\OKClientException;
use Vadimushka\OK\TransportClient\Curl\CurlHttpClient;
use Vadimushka\OK\TransportClient\TransportClient;
use Vadimushka\OK\TransportClient\TransportClientResponse;
use Vadimushka\OK\TransportClient\TransportRequestException;

class OKApiRequest
{

    private const PARAM_ACCESS_TOKEN = 'access_token';

    private const KEY_ERROR = 'error';
    private const KEY_RESPONSE = 'response';

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    /**
     * @var string
     */
    private string $host = 'https://api.ok.ru/fb.do';

    private TransportClient $http_client;

    public function __construct(private string $application_key, private string $application_key_secret)
    {
        $this->http_client = new CurlHttpClient(static::CONNECTION_TIMEOUT);
    }

    /**
     * Makes post request.
     *
     * @param string $method
     * @param string $access_token
     * @param array $params
     * @return array
     * @throws OKClientException
     * @throws OkApiException
     */
    public function post(string $method, string $access_token, array $params = []): array
    {
        $params = ['application_key' => $this->application_key] + $params;
        $params['format'] = "json";
        $params['method'] = $method;
        $params = array_map(fn($param) => is_bool($param) ? ($param ? 1 : 0) : $param, $params);
        $params['sig'] = $this->calcSignature($params, $access_token);
        $params['access_token'] = $access_token;

        try {
            $response = $this->http_client->post($this->host, $params);
        } catch (TransportRequestException $e) {
            throw new OKClientException($e);
        }
        return $this->parseResponse($response);
    }

    private function calcSignature(array $params, string $access_token): string
    {
        ksort($params);
        $signStr = "";
        foreach ($params as $key => $value) {
            $signStr .= $key . "=" . $value;
        }
        return md5($signStr . md5($access_token . $this->application_key_secret));
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
     * @throws OKClientException|OkApiException
     */
    public function upload(string $upload_url, string $parameter_name, string $path): mixed
    {
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
     * @return array
     *
     * @throws OKClientException|OkApiException
     */
    private function parseResponse(TransportClientResponse $response): array
    {
        $this->checkHttpStatus($response);

        $body = $response->getBody();
        $decode_body = $this->decodeBody($body);

        if (isset($decode_body['error_code'])) {
            throw ExceptionMapper::parse(new OKApiError($decode_body));
        }
        return $decode_body;
    }

    /**
     * Decodes body.
     *
     * @param string $body
     *
     * @return array
     */
    protected function decodeBody(string $body): array
    {
        $decoded_body = json_decode($body, true);

        if (!is_array($decoded_body)) {
            $decoded_body = [];
        }

        return $decoded_body;
    }

    /**
     * @param TransportClientResponse $response
     *
     * @throws OKClientException
     */
    protected function checkHttpStatus(TransportClientResponse $response): void
    {
        if ((int)$response->getHttpStatus() !== static::HTTP_STATUS_CODE_OK) {
            throw new OkClientException("Invalid http status: {$response->getHttpStatus()}");
        }
    }

}
