<?php

namespace OK\Actions;

/**
 * @method \stdClass checkFlag($access_token, $params = []) Проверка наличия служебного флага у пользователя
 * @method \stdClass deleteGuests($access_token, $params = []) Удалить пользователя из списка гостей
 * @method \stdClass getAdditionalInfo($access_token, $params = []) Возвращает дополнительную информацию о пользователях
 * @method \stdClass getCallsLeft($access_token, $params = []) Метод позволяет приложению проверить, не превышен ли предел вызова методов для указанного пользователя
 * @method \stdClass getCurrentUser($access_token, $params = []) Получение информации о текущем пользователе
 * @method \stdClass getGames($access_token, $params = []) Возвращает список установленных приложений у пользователя
 * @method \stdClass getGuests($access_token, $params = []) Возвращает список гостей указанного пользователя
 * @method \stdClass getHolidays($access_token, $params = []) Метод позволяет получать список праздников пользователя. См. также users.getFriendsHolidays и users.getPortalHolidays.
 * @method \stdClass getInfo($access_token, $params = []) Возвращает большой массив информации, связанной с пользователем, для каждого переданного идентификатора пользователя
 * @method \stdClass getInfoBy($access_token, $params = []) Возвращает большой массив информации, связанной с пользователем, с учетом его связи с вызывающим юзером
 * @method \stdClass getInvitableFriends($access_token, $params = []) Возвращает список друзей для приглашения в игры с пометкой о возможности автовыбора из приложения
 * @method \stdClass getLoggedInUser($access_token, $params = []) Возвращает ID текущего пользователя
 * @method \stdClass getMobileOperator($access_token, $params = []) Метод проверяет, имеет ли пользователь привязанный номер телефона известных операторов мобильной связи. Если имеет, то метод возвращает идентификатор оператора мобильной связи
 * @method \stdClass hasAppPermission($access_token, $params = []) Проверяет, имеет ли приложение разрешение на выполнение вызова определенных методов для указанного пользователя
 * @method \stdClass isAppUser($access_token, $params = []) Проверяет, установил ли пользователь приложение
 * @method \stdClass removeAppPermissions($access_token, $params = []) Удаление разрешений из списка разрешений пользователя на вызов приложения
 * @method \stdClass resetFlag($access_token, $params = []) Обнуление служебного флага у пользователя
 * @method \stdClass setStatus($access_token, $params = []) Устанавливает или очищает статус пользователя
 * @method \stdClass updateMask($access_token, $params = []) Производит логическую побитовую операцию (OR или AND) переданного числового значения над маской пользователя и устанавливает полученный результат в маску пользователя. Если параметр mask не указан, то возвращает текущее значение маски пользователя.
 * @method \stdClass updateMasks($access_token, $params = []) Производит логическую побитовую операцию (OR или AND) переданного числового значения над масками указанных пользователей и и сохраняет результат. Если параметр mask не указан, то возвращает текущее значение масок указанных пользователей.
 * @method \stdClass updateMasksV2($access_token, $params = []) Производит битовые операции над масками указанных пользователей и и сохраняет результат. Если параметр маски для операции не указаны, то возвращает текущее значение масок указанных пользователей.
 */
class Users extends BaseAction
{
}
