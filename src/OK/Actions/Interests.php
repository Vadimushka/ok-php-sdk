<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Interests {

    private $request;

    public function __construct(OKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Возвращает интересы пользователя
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/interests/interests.get
     */
    public function get(string $access_token, array $params = [])
    {
        return $this->request->post('interests.get', $access_token, $params);
    }

}