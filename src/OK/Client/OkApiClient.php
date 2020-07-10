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

    /**
     * @return OKApiRequest
     */
    public function getRequest(): OKApiRequest
    {
        return $this->request;
    }

    /**
     * @return Apps
     */
    public function getApps(): Apps
    {
        if (!$this->apps) {
            $this->apps = new Apps($this->request);
        }
        return $this->apps;
    }

    /**
     * @return Bookmark
     */
    public function getBookmark(): Bookmark
    {
        if (!$this->bookmark) {
            $this->bookmark = new Bookmark($this->request);
        }
        return $this->bookmark;
    }

    /**
     * @return Callbacks
     */
    public function getCallbacks(): Callbacks
    {
        if (!$this->callbacks) {
            $this->callbacks = new Callbacks($this->request);
        }
        return $this->callbacks;
    }

    /**
     * @return Communities
     */
    public function getCommunities(): Communities
    {
        if (!$this->communities) {
            $this->communities = new Communities($this->request);
        }
        return $this->communities;
    }

    /**
     * @return Discussions
     */
    public function getDiscussions(): Discussions
    {
        if (!$this->discussions) {
            $this->discussions = new Discussions($this->request);
        }
        return $this->discussions;
    }

    /**
     * @return Events
     */
    public function getEvents(): Events
    {
        if (!$this->events) {
            $this->events = new Events($this->request);
        }
        return $this->events;
    }

    /**
     * @return Friends
     */
    public function getFriends(): Friends
    {
        if (!$this->friends) {
            $this->friends = new Friends($this->request);
        }
        return $this->friends;
    }

    /**
     * @return Group
     */
    public function getGroup(): Group
    {
        if (!$this->group) {
            $this->group = new Group($this->request);
        }
        return $this->group;
    }

    /**
     * @return Interests
     */
    public function getInterests(): Interests
    {
        if (!$this->interests) {
            $this->interests = new Interests($this->request);
        }
        return $this->interests;
    }

    /**
     * @return Market
     */
    public function getMarket(): Market
    {
        if (!$this->market) {
            $this->market = new Market($this->request);
        }
        return $this->market;
    }

    /**
     * @return Mediatopic
     */
    public function getMediatopic(): Mediatopic
    {
        if (!$this->mediatopic) {
            $this->mediatopic = new Mediatopic($this->request);
        }
        return $this->mediatopic;
    }

    /**
     * @return MessagesV2
     */
    public function getMessagesV2(): MessagesV2
    {
        if (!$this->messagesV2) {
            $this->messagesV2 = new MessagesV2($this->request);
        }
        return $this->messagesV2;
    }

    /**
     * @return Notifications
     */
    public function getNotifications(): Notifications
    {
        if (!$this->notifications) {
            $this->notifications = new Notifications($this->request);
        }
        return $this->notifications;
    }

    /**
     * @return Payment
     */
    public function getPayment(): Payment
    {
        if (!$this->payment) {
            $this->payment = new Payment($this->request);
        }
        return $this->payment;
    }

    /**
     * @return Photos
     */
    public function getPhotos(): Photos
    {
        if (!$this->photos) {
            $this->photos = new Photos($this->request);
        }
        return $this->photos;
    }

    /**
     * @return PhotosV2
     */
    public function getPhotosV2(): PhotosV2
    {
        if (!$this->photosV2) {
            $this->photosV2 = new PhotosV2($this->request);
        }
        return $this->photosV2;
    }

    /**
     * @return Places
     */
    public function getPlaces(): Places
    {
        if (!$this->places) {
            $this->places = new Places($this->request);
        }
        return $this->places;
    }

    /**
     * @return Sdk
     */
    public function getSdk(): Sdk
    {
        if (!$this->sdk) {
            $this->sdk = new Sdk($this->request);
        }
        return $this->sdk;
    }

    /**
     * @return Search
     */
    public function getSearch(): Search
    {
        if (!$this->search) {
            $this->search = new Search($this->request);
        }
        return $this->search;
    }

    /**
     * @return Share
     */
    public function getShare(): Share
    {
        if (!$this->share) {
            $this->share = new Share($this->request);
        }
        return $this->share;
    }

    public function getStat(): Stat
    {
        if(!$this->stat){
            $this->stat = new Stat($this->request);
        }
        return $this->stat;
    }

    /**
     * @return Stream
     */
    public function getStream(): Stream
    {
        if (!$this->stream) {
            $this->stream = new Stream($this->request);
        }
        return $this->stream;
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        if (!$this->url) {
            $this->url = new Url($this->request);
        }
        return $this->url;
    }

    /**
     * @return Users
     */
    public function getUsers(): Users
    {
        if (!$this->users) {
            $this->users = new Users($this->request);
        }
        return $this->users;
    }

    /**
     * @return Video
     */
    public function getVideo(): Video
    {
        if (!$this->video) {
            $this->video = new Video($this->request);
        }
        return $this->video;
    }

    /**
     * @return Widget
     */
    public function getWidget(): Widget
    {
        if (!$this->widget) {
            $this->widget = new Widget($this->request);
        }
        return $this->widget;
    }


}