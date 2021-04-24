<?php

namespace OK\Actions;

/**
 * @method array get($access_token, $params = []) Возвращает идентификаторы пользователей, являющихся друзьями текущего пользователя.
 * @method array getAppUsers($access_token, $params = []) Возвращает идентификаторы пользователей, являющихся друзьями текущего пользователя и авторизовавших вызывающее приложение.
 * @method array getAppUsersOnline($access_token, $params = []) Получает всех друзей текущего пользователя, которые:<br> 1) сейчас онлайн<br> 2) играли в текущую игру (и не удалили её)
 * @method array getBirthdays($access_token, $params = []) Возвращает идентификаторы друзей текущего пользователя, у которых день рожденья сегодня или в ближайшем будущем.
 * @method array getByDevices($access_token, $params = []) Возвращает друзей пользователя, которые заходили с указанных платформ
 * @method array getMutualFriends($access_token, $params = []) Возвращает идентификаторы общих друзей между исходным пользователем и целевым пользователем
 * @method array getOnline($access_token, $params = []) Возвращает идентификаторы пользователей, являющихся друзьями текущего пользователя и находящимися онлайн в текущий момент
 * @method array getRelativesV2($access_token, $params = []) Получить описание связей пользователя.
 * @method array getSuggestions($access_token, $params = []) Возвращает рекомендации дружб для пользователя, людей с которыми пользователь возможно знаком
 */
class Friends extends BaseAction
{
}
