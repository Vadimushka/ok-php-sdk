<?php


namespace OK\OAuth;


use OK\Exceptions\OKClientException;
use OK\Exceptions\OKOAuthException;
use OK\TransportClient\Curl\CurlHttpClient;
use OK\TransportClient\TransportClientResponse;
use OK\TransportClient\TransportRequestException;

class OKOAuth
{

    private const PARAM_CLIENT_ID = 'client_id';
    private const PARAM_SCOPE = 'scope';
    private const PARAM_RESPONSE_TYPE = 'response_type';
    private const PARAM_REDIRECT_URI = 'redirect_uri';
    private const PARAM_LAYOUT = 'layout';
    private const PARAM_STATE = 'state';
    private const PARAM_CODE = 'code';
    private const PARAM_CLIENT_SECRET = 'client_secret';
    private const PARAM_GRANT_TYPE = 'grant_type';
    private const PARAM_REFRESH_TOKEN = 'refresh_token';

    private const RESPONSE_KEY_ERROR = 'error';
    private const RESPONSE_KEY_ERROR_DESCRIPTION = 'error_description';

    private const HOST = 'https://api.ok.ru/oauth/token.do';
    private const ENDPOINT_AUTHORIZE = 'https://connect.ok.ru/oauth/authorize';

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    /**
     * @var CurlHttpClient
     */
    private $http_client;

    /**
     * @var string
     */
    private $host;

    /**
     * OKOAuth constructor.
     *
     */
    public function __construct() {
        $this->http_client = new CurlHttpClient(static::CONNECTION_TIMEOUT);
        $this->host = static::HOST;
    }

    /**
     * Get authorize url
     *
     * @param string $response_type
     * @param int $client_id
     * @param string $redirect_uri
     * @param string $layout
     * @param array|null $scope
     * @param string|null $state
     * @return string
     */
    public function getAuthorizeUrl(string $response_type, int $client_id, string $redirect_uri, string $layout, ?array $scope = null, ?string $state = null): string
    {
        $scope_mask = implode(";", $scope);

        $params = [
            static::PARAM_CLIENT_ID => $client_id,
            static::PARAM_SCOPE => $scope_mask,
            static::PARAM_RESPONSE_TYPE => $response_type,
            static::PARAM_REDIRECT_URI => $redirect_uri,
            static::PARAM_LAYOUT => $layout,
            static::PARAM_STATE => $state,
        ];

        return self::ENDPOINT_AUTHORIZE . '?' . http_build_query($params);
    }

    /**
     * @param int $client_id
     * @param string $client_secret
     * @param string $redirect_uri
     * @param string $grant_type
     * @param string $code
     * @return mixed
     * @throws OKClientException
     * @throws OKOAuthException
     */
    public function getAccessToken(int $client_id, string $client_secret, string $redirect_uri, string $grant_type, string $code)
    {
        $params = [
            static::PARAM_CLIENT_ID => $client_id,
            static::PARAM_CLIENT_SECRET => $client_secret,
            static::PARAM_REDIRECT_URI => $redirect_uri,
            static::PARAM_CODE => $code,
            static::PARAM_GRANT_TYPE => $grant_type,
        ];

        try {
            $response = $this->http_client->get($this->host, $params);
        } catch (TransportRequestException $e) {
            throw new OKClientException($e);
        }

        return $this->checkOAuthResponse($response);
    }

    /**
     * @param int $client_id
     * @param string $client_secret
     * @param string $grant_type
     * @param string|null $refresh_token
     * @return mixed
     * @throws OKClientException
     * @throws OKOAuthException
     */
    public function getAccessTokenByRefreshToken(int $client_id, string $client_secret, string $grant_type, string $refresh_token)
    {
        $params = [
            static::PARAM_CLIENT_ID => $client_id,
            static::PARAM_CLIENT_SECRET => $client_secret,
            static::PARAM_REFRESH_TOKEN => $refresh_token,
            static::PARAM_GRANT_TYPE => $grant_type,
        ];

        try {
            $response = $this->http_client->get($this->host, $params);
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
     * @throws OKClientException
     * @throws OKOAuthException
     */
    protected function checkOAuthResponse(TransportClientResponse $response) {
        $this->checkHttpStatus($response);

        $body = $response->getBody();
        $decode_body = $this->decodeBody($body);

        if (isset($decode_body[static::RESPONSE_KEY_ERROR])) {
            throw new OKOAuthException("{$decode_body[static::RESPONSE_KEY_ERROR_DESCRIPTION]}. OAuth error {$decode_body[static::RESPONSE_KEY_ERROR]}");
        }

        return $decode_body;
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
        if ((int)$response->getHttpStatus() !== static::HTTP_STATUS_CODE_OK) {
            throw new OKClientException("Invalid http status: {$response->getHttpStatus()}");
        }
    }

}