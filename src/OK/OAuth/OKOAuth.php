<?php

namespace OK\OAuth;

use GuzzleHttp\Client;

class OKOAuth
{
    /**
     * @var \GuzzleHttp\Client
     */
    private Client $http_client;

    /**
     * OKOAuth constructor.
     *
     */
    public function __construct()
    {
        $this->http_client = new Client();
    }

    /**
     * Get authorize url
     *
     * @param int $application_id Идентификатор приложения {application id}
     * @param array $scope Запрашиваемые права приложения, разделённые символом ‘;’. См. права приложения
     * @param string $redirect_uri URI, на который будет передан access_token. URI должен посимвольно совпадать с одним из URI, зарегистрированных в настройках приложения.
     * Часть URI после символа ‘?’ (query) не учитывается при проверке, тем не менее, для передачи динамически изменяющихся данных рекомендуется использовать параметр state.
     * @param string $state Параметр состояния. В неизменном виде пробрасывается в redirect_uri. Позволяет передавать произвольные данные между разными фазами OAuth и защищаться от xsrf.
     * @param string $layout Внешний вид окна авторизации:
     * w – (по умолчанию) стандартное окно для полной версии сайта;
     * m – окно для мобильной авторизации;
     * a – упрощённое окно для мобильной авторизации без шапки.
     *
     * @return string Get authorize url
     * @see \OK\OAuth\Scopes\OKAuthScope
     */
    public function getAuthorizeUrl(
        int $application_id,
        array $scope,
        string $redirect_uri,
        string $state = '',
        string $layout = ''
    ): string {
        $params = [
            'client_id' => $application_id,
            'scope' => implode(";", $scope),
            'response_type' => 'code',
            'redirect_uri' => $redirect_uri,
            'state' => $state,
            'layout' => $layout,
        ];
        return 'https://connect.ok.ru/oauth/authorize?' . http_build_query(array_filter($params,
                fn($param) => !empty($param)));
    }

    /**
     * @param string $code Код авторизации
     * @param int $application_id Идентификатор приложения {application id}
     * @param string $client_secret Секретный ключ приложения {application_secret_key}
     * @param string $redirect_uri Тот же URI переадресации
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAccessToken(
        string $code,
        int $application_id,
        string $client_secret,
        string $redirect_uri
    ): \stdClass {
        $params = [
            'code' => $code,
            'client_id' => $application_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
            'grant_type' => 'authorization_code',
        ];
        return json_decode($this->http_client->post('https://api.ok.ru/oauth/token.do',
            ['query' => $params])->getBody()->getContents());
    }

    /**
     * @param string $refresh_token Маркер обновления
     * @param int $application_id Идентификатор приложения {application id}
     * @param string $client_secret Секретный ключ приложения {application_secret_key}
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAccessTokenByRefreshToken(
        string $refresh_token,
        int $application_id,
        string $client_secret
    ): \stdClass {
        $params = [
            'refresh_token' => $refresh_token,
            'client_id' => $application_id,
            'client_secret' => $client_secret,
            'grant_type' => 'refresh_token',
        ];
        return json_decode($this->http_client->post('https://api.ok.ru/oauth/token.do',
            ['query' => $params])->getBody()->getContents());
    }
}
