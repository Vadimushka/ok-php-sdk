<?php

namespace OK\Actions;

/**
 * @method \stdClass get($access_token, $params = []) Получение подробной информации о дискуссии с возможностью в одном запросе получить информацию об упоминаемых в дискуссии объектах.
 * @method \stdClass getAttachedResources($access_token, $params = []) Возвращает информацию о ресурсах, прикрепленных к комментарию, по id
 * @method \stdClass getComment($access_token, $params = []) Получение информации о комментарие к дискуссии.
 * @method \stdClass getCommentLikes($access_token, $params = []) Получение списка пользователей, поставивших “Класс” для указанного комментария
 * @method \stdClass getComments($access_token, $params = []) Получение списка комментариев к дискуссии
 * @method \stdClass getDiscussionComments($access_token, $params = []) Получение комментариев из ветки дискуссии
 * @method \stdClass getDiscussionCommentsCount($access_token, $params = []) Получение числа сообщений в одной дискуссии
 * @method \stdClass getDiscussionLikes($access_token, $params = []) Получить список пользователей, поставивших “Класс” для дискуссии
 * @method \stdClass getDiscussionsNews($access_token, $params = []) Получение информации о новостях дискуссий, на которые подписан пользователь.
 * @method \stdClass getList($access_token, $params = []) Получение списка дискуссий
 */
class Discussions extends BaseAction
{
}
