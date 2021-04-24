<?php

namespace OK\Client;

/**
 * @method \OK\Actions\Apps getApps() Методы для работы с приложениями
 * @method \OK\Actions\Auth getAuth() Методы для работы с авторизацией
 * @method \OK\Actions\Bookmark getBookmark() Методы для работы с закладками
 * @method \OK\Actions\Communities getCommunities() Методы для работы с сообществами
 * @method \OK\Actions\Discussions getDiscussions() Методы для работы с дискуссиями
 * @method \OK\Actions\Events getEvents() Методы для работы с событиями
 * @method \OK\Actions\Friends getFriends() Методы для работы с друзьями
 * @method \OK\Actions\Group getGroup() Методы для работы с группами
 * @method \OK\Actions\Interests getInterests() Методы для работы с интересами
 * @method \OK\Actions\Market getMarket() Методы для работы с каталогами и товарами
 * @method \OK\Actions\Mediatopic getMediatopic() Методы для работы с медиатопиками
 * @method \OK\Actions\Notifications getNotifications() Методы для работы с нотификациями
 * @method \OK\Actions\Payment getPayment() Методы для работы с платежами
 * @method \OK\Actions\Photos getPhotos() Методы для работы с фото
 * @method \OK\Actions\PhotosV2 getPhotosV2() Методы для работы с фото (новый вариант)
 * @method \OK\Actions\Places getPlaces() Методы для работы с функциональностью "места"
 * @method \OK\Actions\Sdk getSdk() Специальные методы для работы из SDK
 * @method \OK\Actions\Search getSearch() Методы для работы с поиском
 * @method \OK\Actions\Share getShare() Методы для работы с функциональностью "поделиться"
 * @method \OK\Actions\Shortlink getShortlink() Методы для создания короткой ссылки
 * @method \OK\Actions\Stat getStat() Методы для работы со статистикой
 * @method \OK\Actions\Storage getStorage() Методы для хранения состояний и переменных в приложениях
 * @method \OK\Actions\Stream getStream() Методы для работы с лентой
 * @method \OK\Actions\Url getUrl() Методы для работы с ссылками
 * @method \OK\Actions\Users getUsers() Методы для работы с пользователями
 * @method \OK\Actions\Video getVideo() Методы для работы с видео
 * @method \OK\Actions\Widget getWidget() Методы для получения мобильных виджетов
 */
class OkApiClient
{

    private OKApiRequest $request;

    public function __construct(string $application_key, string $app_secret_key)
    {
        $this->request = new OKApiRequest($application_key, $app_secret_key);
    }

    public function getRequest(): OKApiRequest
    {
        return $this->request;
    }

    public function __call(string $name, array $arguments)
    {
        return new ("OK\Actions\\" . str_replace('get', '', $name))($this->request);
    }

}
