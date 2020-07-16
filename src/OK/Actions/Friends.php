<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Friends
{

    private $request;

    public function __construct(OKApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Отправляет друзьям приглашение в приложение
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.appInvite
     */
    public function appInvite(string $access_token, array $params = [])
    {
        return $this->request->post('friends.appInvite', $access_token, $params);
    }

    /**
     * Возвращает идентификаторы пользователей, являющихся друзьями текущего пользователя.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.get
     */
    public function get(string $access_token, array $params = [])
    {
        return $this->request->post('friends.get', $access_token, $params);
    }

    /**
     * Возвращает идентификаторы пользователей, являющихся друзьями текущего пользователя и авторизовавших вызывающее приложение.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.getAppUsers
     */
    public function getAppUsers(string $access_token, array $params = [])
    {
        return $this->request->post('friends.getAppUsers', $access_token, $params);
    }

    /**
     * Получает всех друзей текущего пользователя, которые:
     * <ul>
     * <li>сейчас онлайн</li>
     * <li>играли в текущую игру (и не удалили её)</li>
     * </ul>
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.getAppUsersOnline
     */
    public function getAppUsersOnline(string $access_token, array $params = [])
    {
        return $this->request->post('friends.getAppUsersOnline', $access_token, $params);
    }

    /**
     * Возвращает идентификаторы друзей текущего пользователя, у которых день рожденья сегодня или в ближайшем будущем.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.getBirthdays
     */
    public function getBirthdays(string $access_token, array $params = [])
    {
        return $this->request->post('friends.getBirthdays', $access_token, $params);
    }

    /**
     * Возвращает друзей пользователя, которые заходили с указанных платформ
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.getByDevices
     */
    public function getByDevices(string $access_token, array $params = [])
    {
        return $this->request->post('friends.getByDevices', $access_token, $params);
    }

    /**
     * Возвращает идентификаторы общих друзей между исходным пользователем и целевым пользователем
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.getMutualFriends
     */
    public function getMutualFriends(string $access_token, array $params = [])
    {
        return $this->request->post('friends.getMutualFriends', $access_token, $params);
    }

    /**
     * Возвращает идентификаторы пользователей, являющихся друзьями текущего пользователя и находящимися онлайн в текущий момент
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.getOnline
     */
    public function getOnline(string $access_token, array $params = [])
    {
        return $this->request->post('friends.getOnline', $access_token, $params);
    }

    /**
     * Получить описание связей пользователя
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.getRelatives
     * @deprecated use method getRelativesV2
     */
    public function getRelatives(string $access_token, array $params = [])
    {
        return $this->request->post('friends.getRelatives', $access_token, $params);
    }

    /**
     * Получить описание связей пользователя.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.getRelativesV2
     */
    public function getRelativesV2(string $access_token, array $params = [])
    {
        return $this->request->post('friends.getRelativesV2', $access_token, $params);
    }

    /**
     * Возвращает рекомендации дружб для пользователя, людей с которыми пользователь возможно знаком
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/friends/friends.getSuggestions
     */
    public function getSuggestions(string $access_token, array $params = [])
    {
        return $this->request->post('friends.getSuggestions', $access_token, $params);
    }

}