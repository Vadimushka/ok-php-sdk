<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Group
{

    private $request;

    public function __construct(OKApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Возвращает основные счётчики объектов группы - количество членов группы, фотографий, фотоальбомов и т.п.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getCounters
     */
    public function getCounters(string $access_token, array $params = [])
    {
        return $this->request->post('group.getCounters', $access_token, $params);
    }

    /**
     * Получение информации о группах
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getInfo
     */
    public function getInfo(string $access_token, array $params = [])
    {
        return $this->request->post('group.getInfo', $access_token, $params);
    }

    /**
     * Получение списка пользователей группы. Для получения всех участников группы в порядке вступления необходимо в качестве аргумента statuses перечислить все статусы (ADMIN, MODERATOR, ACTIVE). Если передать пустое значение, то пользователи вернутся в порядке возрастания id.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getMembers
     */
    public function getMembers(string $access_token, array $params = [])
    {
        return $this->request->post('group.getMembers', $access_token, $params);
    }

    /**
     * Получает основные счетчики статистики групп
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getStatOverview
     */
    public function getStatOverview(string $access_token, array $params = [])
    {
        return $this->request->post('group.getStatOverview', $access_token, $params);
    }

    /**
     * Метод для получения статистики по аудитории группы: демография по полу и возрасту, география по странам и городам, и т.д. <br>Данные в статистике возвращаются за последние 7 дней. За исключением демографии по участникам, она - среди всех участников группы (НО демография по охвату и пользователям, дававшим обратную связь - за последние 7 дней).
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getStatPeople
     */
    public function getStatPeople(string $access_token, array $params = [])
    {
        return $this->request->post('group.getStatPeople', $access_token, $params);
    }

    /**
     * Метод для получения статистики по топику, используя его идентификатор
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getStatTopic
     */
    public function getStatTopic(string $access_token, array $params = [])
    {
        return $this->request->post('group.getStatTopic', $access_token, $params);
    }

    /**
     * Метод для получения статистики по топикам. Возвращает список топиков из группы по выбранному диапазону со статистикой.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getStatTopics
     */
    public function getStatTopics(string $access_token, array $params = [])
    {
        return $this->request->post('group.getStatTopics', $access_token, $params);
    }

    /**
     * Получает историю счетчиков статистики по дням
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getStatTrends
     */
    public function getStatTrends(string $access_token, array $params = [])
    {
        return $this->request->post('group.getStatTrends', $access_token, $params);
    }

    /**
     * Получение информации о принадлежности пользователей конкретной группе
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getUserGroupsByIds
     */
    public function getUserGroupsByIds(string $access_token, array $params = [])
    {
        return $this->request->post('group.getUserGroupsByIds', $access_token, $params);
    }

    /**
     * Получение списка групп пользователя
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.getUserGroupsV2
     */
    public function getUserGroupsV2(string $access_token, array $params = [])
    {
        return $this->request->post('group.getUserGroupsV2', $access_token, $params);
    }

    /**
     * Операция припинивания или отпинивания события в групповой ленте
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.pinGroupFeed
     */
    public function pinGroupFeed(string $access_token, array $params = [])
    {
        return $this->request->post('group.pinGroupFeed', $access_token, $params);
    }

    /**
     * Установка главной фотографии группы. Используется как 3й шаг процесса загрузки фотографий на сервер.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/group/group.setMainPhoto
     */
    public function setMainPhoto(string $access_token, array $params = [])
    {
        return $this->request->post('group.setMainPhoto', $access_token, $params);
    }

}