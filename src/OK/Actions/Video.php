<?php


namespace OK\Actions;

use OK\Actions\Enums\VideoAttachmentType;
use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

/**
 * Методы для работы с видео
 */
class Video {

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
     * Удаляет указанный видеоролик пользователя
     *
     * @param string $access_token
     * @param array $params
     *  @var integer $long: Идентификатор загруженного видеоролика
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function delete(string $access_token, array $params = []) {
        return $this->request->post('video.delete', $access_token, $params);
    }

    /**
     * Инициирует процесс добавления видео и возвращает URL, который должен использоваться для загрузки видео
     *
     * @param string $access_token
     * @param array $params
     *  @var string $uid: Идентификатор пользователя, видео которого требуется добавить. Укажите uid при вызове этого метода без ключа сессии.
     *  @var string $gid: Идентификатор группы, в которую будет добавлено видео
     *  @var string $file_name: Название загружаемого файла
     *  @var VideoAttachmentType $attachment_type: Указывается только для тех файлов которые предназначаются для аудио/видео аттачментов.
     *  @var integer $file_size: Размер загружаемого файла. Если на момент загрузки файла его размер еще неизвестен, допустимо указать 0. Поддерживаются файлы размером от 16 Кб до 1 Гб.
     *  @var float $lat: Широта (координаты, откуда грузится видео)
     *  @var float $lng: Долгота (координаты, откуда грузится видео)
     *  @var string $cid: ID видео-канала, в который осуществляется загрузка
     *  @var boolean $post_form: Грузится ли видео из формы постинга или нет (Если загрузка идет из формы постинга, то не будет создано отдельное событие в ленте “Загружено видео”)
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function getUploadUrl(string $access_token, array $params = []) {
        return $this->request->post('video.getUploadUrl', $access_token, $params);
    }

    /**
     * Подписка пользователя на канал
     *
     * @param string $access_token
     * @param array $params
     *  @var string $cid: id канала
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function subscribe(string $access_token, array $params = []) {
        return $this->request->post('video.subscribe', $access_token, $params);
    }

    /**
     * Обновление информации о видеоролике. Также завершает инициированную процедуру загрузки видео, принимая соглашение и делая видео доступным для пользователей.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function update(string $access_token, array $params = []) {
        return $this->request->post('video.update', $access_token, $params);
    }
}