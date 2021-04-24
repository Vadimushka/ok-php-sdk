<?php

namespace OK\Actions;

/**
 * @method \stdClass deleteTopic($access_token, $params = []) Удаление медиатопика
 * @method \stdClass edit($access_token, $params = []) Удаление медиатопика
 * @method \stdClass getByIds($access_token, $params = []) Получение медиатопика по его уникальному идентификатору
 * @method \stdClass getPollAnswerVoters($access_token, $params = []) Возвращает пользовательей, проголосовавших за указанный вариант ответа
 * @method \stdClass getRepublishedTopic($access_token, $params = []) Получение id топика после перепубликации (например, после прохождения модерации или публикации отложенного поста)
 * @method \stdClass post($access_token, $params = []) Публикация медиатопика, который может содержать множество вложенных объектов
 */
class Mediatopic extends BaseAction
{
}
