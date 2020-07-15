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

    /**
     * @var OKApiRequest
     */
    private $request;

    /**
     * Методы для работы с приложениями
     * @var Apps
     */
    private $apps;

    /**
     * Методы для работы с закладками
     * @var Bookmark
     */
    private $bookmark;

    /**
     * Callback - методы (например, платежка)
     * @var Callbacks
     */
    private $callbacks;

    /**
     * Методы для работы с сообществами
     * @var Communities
     */
    private $communities;

    /**
     * Методы для работы с дискуссиями
     * @var Discussions
     */
    private $discussions;

    /**
     * Методы для работы с событиями
     * @var Events
     */
    private $events;

    /**
     * Методы для работы с друзьями
     * @var Friends
     */
    private $friends;

    /**
     * Методы для работы с группами
     * @var Group
     */
    private $group;

    /**
     * Методы для работы с интересами
     * @var Interests
     */
    private $interests;

    /**
     * Методы для работы с каталогами и товарами
     * @var Market
     */
    private $market;

    /**
     * Методы для работы с медиатопиками
     * @var Mediatopic
     */
    private $mediatopic;

    /**
     * Методы для работы с сообщениями (новая версия)
     * @var MessagesV2
     */
    private $messagesV2;

    /**
     * Методы для работы с нотификациями
     * @var Notifications
     */
    private $notifications;

    /**
     * Методы для работы с платежами
     * @var Payment
     */
    private $payment;

    /**
     * Методы для работы с фото
     * @var Photos
     */
    private $photos;

    /**
     * Методы для работы с фото (новый вариант)
     * @var PhotosV2
     */
    private $photosV2;

    /**
     * Методы для работы с функциональностью "места"
     * @var Places
     */
    private $places;

    /**
     * Специальные методы для работы из SDK
     * @var Sdk
     */
    private $sdk;

    /**
     * Методы для работы с поиском
     * @var Search
     */
    private $search;

    /**
     * Методы для работы с функциональностью "поделиться"
     * @var Share
     */
    private $share;

    /**
     * Методы для работы со статистикой
     * @var Stat
     */
    private $stat;

    /**
     * Методы для работы с лентой
     * @var Stream
     */
    private $stream;

    /**
     * Методы для работы с ссылками
     * @var Url
     */
    private $url;

    /**
     * Методы для работы с пользователями
     * @var Users
     */
    private $users;

    /**
     * Методы для работы с видео
     * @var Video
     */
    private $video;

    /**
     * Методы для получения мобильных виджетов
     * @var Widget
     */
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

    public function getApps(): Apps
    {
        return $this->apps = $this->apps ?? new Apps($this->getRequest());
    }

    public function getBookmark(): Bookmark
    {
        return $this->bookmark = $this->bookmark ?? new Bookmark($this->getRequest());
    }

    public function getCallbacks(): Callbacks
    {
        return $this->callbacks = $this->callbacks ?? new Callbacks($this->getRequest());
    }

    public function getCommunities(): Communities
    {
        return $this->communities = $this->communities ?? new Communities($this->getRequest());
    }

    public function getDiscussions(): Discussions
    {
        return $this->discussions = $this->discussions ?? new Discussions($this->getRequest());
    }

    public function getEvents(): Events
    {
        return $this->events = $this->events ?? new Events($this->getRequest());
    }

    public function getFriends(): Friends
    {
        return $this->friends = $this->friends ?? new Friends($this->getRequest());
    }

    public function getGroup(): Group
    {
        return $this->group = $this->group ?? new Group($this->getRequest());
    }

    public function getInterests(): Interests
    {
        return $this->interests = $this->interests ?? new Interests($this->getRequest());
    }

    public function getMarket(): Market
    {
        return $this->market = $this->market ?? new Market($this->getRequest());
    }

    public function getMediatopic(): Mediatopic
    {
        return $this->mediatopic = $this->mediatopic ?? new Mediatopic($this->getRequest());
    }

    public function getMessagesV2(): MessagesV2
    {
        return $this->messagesV2 = $this->messagesV2 ?? new MessagesV2($this->getRequest());
    }

    public function getNotifications(): Notifications
    {
        return $this->notifications = $this->notifications ?? new Notifications($this->getRequest());
    }

    public function getPayment(): Payment
    {
        return $this->payment = $this->payment ?? new Payment($this->getRequest());
    }

    public function getPhotos(): Photos
    {
        return $this->photos = $this->photos ?? new Photos($this->getRequest());
    }

    public function getPhotosV2(): PhotosV2
    {
        return $this->photosV2 = $this->photosV2 ?? new PhotosV2($this->getRequest());
    }

    public function getPlaces(): Places
    {
        return $this->places = $this->places ?? new Places($this->getRequest());
    }

    public function getSdk(): Sdk
    {
        return $this->sdk = $this->sdk ?? new Sdk($this->getRequest());
    }

    public function getSearch(): Search
    {
        return $this->search = $this->search ?? new Search($this->getRequest());
    }

    public function getShare(): Share
    {
        return $this->share = $this->share ?? new Share($this->getRequest());
    }

    public function getStat(): Stat
    {
        return $this->stat = $this->stat ?? new Stat($this->getRequest());
    }

    public function getStream(): Stream
    {
        return $this->stream = $this->stream ?? new Stream($this->getRequest());
    }

    public function getUrl(): Url
    {
        return $this->url = $this->url ?? new Url($this->getRequest());
    }

    public function getUsers(): Users
    {
        return $this->users = $this->users ?? new Users($this->getRequest());
    }

    public function getVideo(): Video
    {
        return $this->video = $this->video ?? new Video($this->getRequest());
    }

    public function getWidget(): Widget
    {
        return $this->widget = $this->widget ?? new Widget($this->getRequest());
    }


}