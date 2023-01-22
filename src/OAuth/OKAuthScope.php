<?php
namespace Vadimushka\OK\OAuth;

class OKAuthScope
{
    /**
     * Основное разрешение, необходимо для вызова большинства методов
     */
    public const VALUABLE_ACCESS = 'VALUABLE_ACCESS';

    /**
     * Получение длинных токенов от <a href="https://apiok.ru/ext/oauth/">OAuth авторизации</a>
     */
    public const LONG_ACCESS_TOKEN = 'LONG_ACCESS_TOKEN';

    /**
     * Доступ к фотографиям
     */
    public const PHOTO_CONTENT = 'PHOTO_CONTENT';

    /**
     * Доступ к группам
     */
    public const GROUP_CONTENT = 'GROUP_CONTENT';

    /**
     * Доступ к видео
     */
    public const VIDEO_CONTENT = 'VIDEO_CONTENT';

    /**
     * Доступ к email адресу пользователя
     */
    public const GET_EMAIL = 'GET_EMAIL';
}
