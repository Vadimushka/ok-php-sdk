<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Bookmark
{

    private $request;

    public function __construct(OKApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Добавление контента в закладки
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/bookmark/bookmark.add
     */
    public function add(string $access_token, array $params = [])
    {
        return $this->request->post('bookmark.add', $access_token, $params);
    }

    /**
     * Удаление контента из закладок
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/bookmark/bookmark.delete
     */
    public function delete(string $access_token, array $params = [])
    {
        return $this->request->post('bookmark.delete', $access_token, $params);
    }

}