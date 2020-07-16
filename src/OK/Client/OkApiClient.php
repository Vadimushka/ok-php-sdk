<?php

namespace OK\Client;

use OK\Actions\Apps;
use OK\Actions\Bookmark;
use OK\Actions\Callbacks;
use OK\Actions\Communities;
use OK\Actions\Discussions;
use OK\Actions\Events;
use OK\Actions\Friends;
use OK\Actions\Group;
use OK\Actions\Interests;
use OK\Actions\Market;
use OK\Actions\Mediatopic;
use OK\Actions\MessagesV2;
use OK\Actions\Notifications;
use OK\Actions\Payment;
use OK\Actions\Photos;
use OK\Actions\PhotosV2;
use OK\Actions\Places;
use OK\Actions\Sdk;
use OK\Actions\Search;
use OK\Actions\Share;
use OK\Actions\Stat;
use OK\Actions\Stream;
use OK\Actions\Url;
use OK\Actions\Users;
use OK\Actions\Video;
use OK\Actions\Widget;

class OkApiClient
{

    protected const API_HOST = 'https://api.ok.ru/fb.do';

    private $request;
    private $apps;
    private $bookmark;
    private $callbacks;
    private $communities;
    private $discussions;
    private $events;
    private $friends;
    private $group;
    private $interests;
    private $market;
    private $mediatopic;
    private $messagesV2;
    private $notifications;
    private $payment;
    private $photos;
    private $photosV2;
    private $places;
    private $sdk;
    private $search;
    private $share;
    private $stat;
    private $stream;
    private $url;
    private $users;
    private $video;
    private $widget;

    /**
     * OkApiClient constructor.
     * @param string $application_key
     * @param string $app_secret_key
     */
    public function __construct(string $application_key, string $app_secret_key)
    {
        $this->request = new OKApiRequest($application_key, $app_secret_key, self::API_HOST);
    }

    public function getRequest(): OKApiRequest
    {
        return $this->request;
    }

    /**
     * Методы для работы с приложениями
     */
    public function getApps(): Apps
    {
        return $this->apps = $this->apps ?? new Apps($this->getRequest());
    }

    /**
     * Методы для работы с закладками
     */
    public function getBookmark(): Bookmark
    {
        return $this->bookmark = $this->bookmark ?? new Bookmark($this->getRequest());
    }

    /**
     * Callback - методы (например, платежка)
     */
    public function getCallbacks(): Callbacks
    {
        return $this->callbacks = $this->callbacks ?? new Callbacks($this->getRequest());
    }

    /**
     * Методы для работы с сообществами
     */
    public function getCommunities(): Communities
    {
        return $this->communities = $this->communities ?? new Communities($this->getRequest());
    }

    /**
     * Методы для работы с дискуссиями
     */
    public function getDiscussions(): Discussions
    {
        return $this->discussions = $this->discussions ?? new Discussions($this->getRequest());
    }

    /**
     * Методы для работы с событиями
     */
    public function getEvents(): Events
    {
        return $this->events = $this->events ?? new Events($this->getRequest());
    }

    /**
     * Методы для работы с друзьями
     */
    public function getFriends(): Friends
    {
        return $this->friends = $this->friends ?? new Friends($this->getRequest());
    }

    /**
     * Методы для работы с группами
     */
    public function getGroup(): Group
    {
        return $this->group = $this->group ?? new Group($this->getRequest());
    }

    /**
     * Методы для работы с интересами
     */
    public function getInterests(): Interests
    {
        return $this->interests = $this->interests ?? new Interests($this->getRequest());
    }

    /**
     * Методы для работы с каталогами и товарами
     */
    public function getMarket(): Market
    {
        return $this->market = $this->market ?? new Market($this->getRequest());
    }

    /**
     * Методы для работы с медиатопиками
     */
    public function getMediatopic(): Mediatopic
    {
        return $this->mediatopic = $this->mediatopic ?? new Mediatopic($this->getRequest());
    }

    /**
     * Методы для работы с сообщениями (новая версия)
     */
    public function getMessagesV2(): MessagesV2
    {
        return $this->messagesV2 = $this->messagesV2 ?? new MessagesV2($this->getRequest());
    }

    /**
     * Методы для работы с нотификациями
     */
    public function getNotifications(): Notifications
    {
        return $this->notifications = $this->notifications ?? new Notifications($this->getRequest());
    }

    /**
     * Методы для работы с платежами
     */
    public function getPayment(): Payment
    {
        return $this->payment = $this->payment ?? new Payment($this->getRequest());
    }

    /**
     * Методы для работы с фото
     */
    public function getPhotos(): Photos
    {
        return $this->photos = $this->photos ?? new Photos($this->getRequest());
    }

    /**
     * Методы для работы с фото (новый вариант)
     */
    public function getPhotosV2(): PhotosV2
    {
        return $this->photosV2 = $this->photosV2 ?? new PhotosV2($this->getRequest());
    }

    /**
     * Методы для работы с функциональностью "места"
     */
    public function getPlaces(): Places
    {
        return $this->places = $this->places ?? new Places($this->getRequest());
    }

    /**
     * Специальные методы для работы из SDK
     */
    public function getSdk(): Sdk
    {
        return $this->sdk = $this->sdk ?? new Sdk($this->getRequest());
    }

    /**
     * Методы для работы с поиском
     */
    public function getSearch(): Search
    {
        return $this->search = $this->search ?? new Search($this->getRequest());
    }

    /**
     * Методы для работы с функциональностью "поделиться"
     */
    public function getShare(): Share
    {
        return $this->share = $this->share ?? new Share($this->getRequest());
    }

    /**
     * Методы для работы со статистикой
     */
    public function getStat(): Stat
    {
        return $this->stat = $this->stat ?? new Stat($this->getRequest());
    }

    /**
     * Методы для работы с лентой
     */
    public function getStream(): Stream
    {
        return $this->stream = $this->stream ?? new Stream($this->getRequest());
    }

    /**
     * Методы для работы с ссылками
     */
    public function getUrl(): Url
    {
        return $this->url = $this->url ?? new Url($this->getRequest());
    }

    /**
     * Методы для работы с пользователями
     */
    public function getUsers(): Users
    {
        return $this->users = $this->users ?? new Users($this->getRequest());
    }

    /**
     * Методы для работы с видео
     */
    public function getVideo(): Video
    {
        return $this->video = $this->video ?? new Video($this->getRequest());
    }

    /**
     * Методы для получения мобильных виджетов
     */
    public function getWidget(): Widget
    {
        return $this->widget = $this->widget ?? new Widget($this->getRequest());
    }


}