<?php

namespace OK\Actions;

/**
 * @method \stdClass addAlbumLike($access_token, $params = []) Поставить “Класс” указанному фотоальбому
 * @method \stdClass addPhotoLike($access_token, $params = []) Поставить “Класс” указанной фотографии
 * @method \stdClass createAlbum($access_token, $params = []) Создает фотоальбом для указанного пользователя
 * @method \stdClass deleteAlbum($access_token, $params = []) Удаление альбома
 * @method \stdClass deletePhoto($access_token, $params = []) Удалить фотографию
 * @method \stdClass deleteTags($access_token, $params = []) Удаление фотометок друзей (они же фототеги, фотопины) с фотографии текущего пользователя
 * @method \stdClass editAlbum($access_token, $params = []) Изменить параметры альбома: название, описание и настройки видимости
 * @method \stdClass editPhoto($access_token, $params = []) Изменить описание к фотографии
 * @method \stdClass getAlbumInfo($access_token, $params = []) Получение информации об альбоме
 * @method \stdClass getAlbumLikes($access_token, $params = []) Получить список пользователей, поставивших “Класс” альбому
 * @method \stdClass getAlbums($access_token, $params = []) Возвращает список фотоальбомов указанного пользователя
 * @method \stdClass getInfo($access_token, $params = []) Получение информации о фотографиях пользователя, друга или группы
 * @method \stdClass getPhotoInfo($access_token, $params = []) Получение информации о фотографии
 * @method \stdClass getPhotoLikes($access_token, $params = []) Получить список пользователей, поставивших “Класс” фотографии
 * @method \stdClass getPhotoMarks($access_token, $params = []) Возвращает список всех оценок фотографий пользователя
 * @method \stdClass getPhotos($access_token, $params = []) Получение списка фотографий пользователя, его друга или группы
 * @method \stdClass getTags($access_token, $params = []) Получение списка отмеченных пользователей на фотографии
 * @method \stdClass getUserAlbumPhotos($access_token, $params = []) Возвращает список фотографий указанного альбома
 * @method \stdClass getUserPhotos($access_token, $params = []) Возвращает список личных фотографий указанного пользователя
 * @method \stdClass setAlbumMainPhoto($access_token, $params = []) Установить фотографию в качестве обложки альбома
 */
class Photos extends BaseAction
{
}
