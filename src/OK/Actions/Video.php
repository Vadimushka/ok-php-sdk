<?php

namespace OK\Actions;

/**
 * @method \stdClass delete($access_token, $params = []) Удаляет указанный видеоролик пользователя
 * @method \stdClass getUploadUrl($access_token, $params = []) Инициирует процесс добавления видео и возвращает URL, который должен использоваться для загрузки видео
 * @method \stdClass subscribe($access_token, $params = []) Подписка пользователя на канал
 * @method \stdClass update($access_token, $params = []) Обновление информации о видеоролике. Также завершает инициированную процедуру загрузки видео, принимая соглашение и делая видео доступным для пользователей.
 */
class Video extends BaseAction
{
}
