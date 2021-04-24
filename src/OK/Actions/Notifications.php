<?php

namespace OK\Actions;

/**
 * @method \stdClass sendFavPromo($access_token, $params = []) Отправляет сообщение с оповещением постоянным платящим пользователям приложения.
 * @method \stdClass sendMass($access_token, $params = []) Отправляет сообщение с оповещением всем пользователям приложения, чьи профили соответствуют указанным критериям
 * @method \stdClass sendSimple($access_token, $params = []) Отправляет простое оповещение от приложения пользователю
 * @method \stdClass stopFavPromo($access_token, $params = []) Отменяет рассылку созданную при помощи метода notifications.sendFavPromo
 * @method \stdClass stopSendMass($access_token, $params = []) Отменяет рассылку созданную при помощи метода notifications.sendMass
 * @method \stdClass updateFavPromo($access_token, $params = []) Обновляет рассылку созданную при помощи метода notifications.sendFavPromo
 */
class Notifications extends BaseAction
{
}
