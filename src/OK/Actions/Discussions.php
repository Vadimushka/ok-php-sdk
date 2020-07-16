<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Discussions
{

    private $request;

    public function __construct(OKApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Получение подробной информации о дискуссии с возможностью в одном запросе получить информацию об упоминаемых в дискуссии объектах.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.get
     */
    public function get(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.get', $access_token, $params);
    }

    /**
     * Возвращает информацию о ресурсах, прикрепленных к комментарию, по id
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getAttachedResources
     */
    public function getAttachedResources(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getAttachedResources', $access_token, $params);
    }

    /**
     * Получение информации о комментарие к дискуссии.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getComment
     */
    public function getComment(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getComment', $access_token, $params);
    }

    /**
     * Получение списка пользователей, поставивших “Класс” для указанного комментария
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getCommentLikes
     */
    public function getCommentLikes(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getCommentLikes', $access_token, $params);
    }

    /**
     * Получение списка комментариев к дискуссии
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getComments
     */
    public function getComments(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getComments', $access_token, $params);
    }

    /**
     * Получение комментариев из ветки дискуссии
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getDiscussionComments
     */
    public function getDiscussionComments(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getDiscussionComments', $access_token, $params);
    }

    /**
     * Получение числа сообщений в одной дискуссии
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getDiscussionCommentsCount
     */
    public function getDiscussionCommentsCount(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getDiscussionCommentsCount', $access_token, $params);
    }

    /**
     * Получить список пользователей, поставивших “Класс” для дискуссии
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getDiscussionLikes
     */
    public function getDiscussionLikes(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getDiscussionLikes', $access_token, $params);
    }

    /**
     * Получение списка дискуссий
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getDiscussions
     */
    public function getDiscussions(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getDiscussions', $access_token, $params);
    }

    /**
     * Получение информации о новостях дискуссий, на которые подписан пользователь.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getDiscussionsNews
     */
    public function getDiscussionsNews(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getDiscussionsNews', $access_token, $params);
    }

    /**
     * Получение списка дискуссий
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/discussions/discussions.getList
     */
    public function getList(string $access_token, array $params = [])
    {
        return $this->request->post('discussions.getList', $access_token, $params);
    }

}