<?php

namespace OK\Actions;

/**
 * @method \stdClass appCashback($access_token, $params = []) Выбирает пользователей, заплативших в игру за указанный интервал, и возвращает им сумму ОКов, переданную в параметр amount.
 * @method \stdClass getDailyTransactionsFromServer($access_token, $params = []) Статистика по игровым платежам
 * @method \stdClass getUserAccountBalance($access_token, $params = []) Метод возвращает количество OK на балансе текущего пользователя
 * @method \stdClass getUserAccountBonusBalance($access_token, $params = []) Возвращает текущий баланс бонусных ОКов на счете текущего пользователя
 * @method \stdClass getVipStatus($access_token, $params = []) Получает статус VIP-подписки пользователя
 */
class Payment extends BaseAction
{
}
