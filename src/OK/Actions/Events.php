<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Events {

    private $request;

    public function __construct(OKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Возвращает число событий, отображаемых для вошедшего пользователя: сообщений, оповещений, обсуждений и т.д.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/events/events.get
     */
    public function get(string $access_token, array $params = []) {
        return $this->request->post('events.get', $access_token, $params);
    }
}