<?php

namespace OK\Actions;

/**
 * @method \stdClass getEndpoints($access_token, $params = []) Возвращает линки на сервисы Одноклассников.
 * @method \stdClass getInstallSource($access_token, $params = []) Возвращает положительный идентификатор места клика на приложение внутри OK
 * @method \stdClass init($access_token, $params = []) Создает новую SDK сессию (анонимный логин)
 * @method \stdClass reportPayment($access_token, $params = []) Отправка информации о платеже пользователя
 * @method \stdClass reportStats($access_token, $params = []) Отправляет статистику об использование пользователем приложения
 * @method \stdClass rewardStatus($access_token, $params = []) Определение победителя (приз - ОКи) среди участников игрового события
 * @method \stdClass setStatus($access_token, $params = []) Установка статуса пользователя в игровом событии
 */
class Sdk extends BaseAction
{
}
