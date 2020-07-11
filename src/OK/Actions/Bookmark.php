<?php
namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

/**
 * Методы для работы с закладками
 */
class Bookmark {

    /**
     * @var OKApiRequest
     */
    private $request;

    /**
     * Apps constructor.
     * @param OKApiRequest $request
     */
    public function __construct(OKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Добавление контента в закладки
     *
     * @param string $access_token
     * @param array $params
     *  @var string $ref_id: id контента
     *  @var string $bookmark_type: Тип контента
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function add(string $access_token, array $params = []) {
        return $this->request->post('bookmark.add', $access_token, $params);
    }

    /**
     * Удаление контента из закладок
     *
     * @param string $access_token
     * @param array $params
     *  @var string $ref_id: id контента
     *  @var string $bookmark_type: Тип контента
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function delete(string $access_token, array $params = []) {
        return $this->request->post('bookmark.delete', $access_token, $params);
    }

}