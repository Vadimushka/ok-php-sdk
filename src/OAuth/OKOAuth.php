<?php

namespace Vadimushka\OK\OAuth;

use Vadimushka\OK\Exceptions\OKClientException;
use Vadimushka\OK\Exceptions\OKOAuthException;
use Vadimushka\OK\TransportClient\Curl\CurlHttpClient;
use Vadimushka\OK\TransportClient\TransportClient;
use Vadimushka\OK\TransportClient\TransportClientResponse;
use Vadimushka\OK\TransportClient\TransportRequestException;

class OKOAuth
{

    private const PARAM_CLIENT_ID = 'client_id';
    private const PARAM_REDIRECT_URI = 'redirect_uri';
    private const PARAM_LAYOUT = 'layout';
    private const PARAM_SCOPE = 'scope';
    private const PARAM_RESPONSE_TYPE = 'response_type';
    private const PARAM_STATE = 'state';
    private const PARAM_CLIENT_SECRET = 'client_secret';
    private const PARAM_CODE = 'code';
    private const PARAM_GRANT_TYPE = 'grant_type';
    private const PARAM_REFRESH_TOKEN = 'refresh_token';

    private const RESPONSE_KEY_ERROR = 'error';
    private const RESPONSE_KEY_ERROR_DESCRIPTION = 'error_description';

    protected const HOST = 'https://api.ok.ru';
    private const ENDPOINT_AUTHORIZE = '/oauth/authorize';
    private const ENDPOINT_ACCESS_TOKEN = '/oauth/token.do';
    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    private TransportClient $http_client;

    private string $host;

    /**
     * OKOAuth constructor.
     *
     */
    public function __construct()
    {
        $this->http_client = new CurlHttpClient(static::CONNECTION_TIMEOUT);
        $this->host = static::HOST;
    }

    /**
     * Get authorize url
     *
     * @param string $response_type
     * @param int $application_id
     * @param array $scope
     * @param string $redirect_uri
     * @param string $state
     * @param string $layout
     * @return string
     * @see OKAuthScope
     * @see OKAuthLayout
     * @see OkAuthResponseType
     */
    public function getAuthorizeUrl(string $response_type, int $application_id, array $scope, string $redirect_uri, string $state = '', string $layout = ''): string
    {
        $params = [
            static::PARAM_CLIENT_ID => $application_id,
            static::PARAM_SCOPE => implode(";", $scope),
            static::PARAM_RESPONSE_TYPE => $response_type,
            static::PARAM_REDIRECT_URI => $redirect_uri,
            static::PARAM_STATE => $state,
            static::PARAM_LAYOUT => $layout,
        ];
        return 'https://connect.ok.ru' . static::ENDPOINT_AUTHORIZE . '?' . http_build_query($params);
    }

    /**
     * @param string $code
     * @param int $application_id
     * @param string $client_secret
     * @param string $redirect_uri
     * @return array
     * @throws OKClientException|OKOAuthException
     */
    public function getAccessToken(string $code, int $application_id, string $client_secret, string $redirect_uri): array
    {
        $params = [
            static::PARAM_CODE => $code,
            static::PARAM_CLIENT_ID => $application_id,
            static::PARAM_CLIENT_SECRET => $client_secret,
            static::PARAM_REDIRECT_URI => $redirect_uri,
            static::PARAM_GRANT_TYPE => 'authorization_code',
        ];
        try {
            $response = $this->http_client->post($this->host . static::ENDPOINT_ACCESS_TOKEN, $params);
        } catch (TransportRequestException $e) {
            throw new OKClientException($e);
        }
        return $this->checkOAuthResponse($response);
    }

    /**
     * @param string $refresh_token
     * @param int $application_id
     * @param string $client_secret
     * @return array
     * @throws OKClientException|OKOAuthException
     */
    public function getAccessTokenByRefreshToken(string $refresh_token, int $application_id, string $client_secret): array
    {
        $params = [
            static::PARAM_REFRESH_TOKEN => $refresh_token,
            static::PARAM_CLIENT_ID => $application_id,
            static::PARAM_CLIENT_SECRET => $client_secret,
            static::PARAM_GRANT_TYPE => 'refresh_token',
        ];
        try {
            $response = $this->http_client->post($this->host . static::ENDPOINT_ACCESS_TOKEN, $params);
        } catch (TransportRequestException $e) {
            throw new OKClientException($e);
        }
        return $this->checkOAuthResponse($response);
    }

    /**
     * Decodes the authorization response and checks its status code and whether it has an error.
     *
     * @param TransportClientResponse $response
     *
     * @return mixed
     *
     * @throws OkClientException
     * @throws OkOAuthException
     */
    protected function checkOAuthResponse(TransportClientResponse $response): array
    {
        $this->checkHttpStatus($response);

        $body = $response->getBody();
        $decode_body = $this->decodeBody($body);

        if (isset($decode_body[static::RESPONSE_KEY_ERROR])) {
            throw new OkOAuthException("{$decode_body[static::RESPONSE_KEY_ERROR_DESCRIPTION]}. OAuth error {$decode_body[static::RESPONSE_KEY_ERROR]}");
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
