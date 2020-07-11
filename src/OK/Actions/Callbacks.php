<?php
namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

/**
 * Callback - методы (например, платежка)
 */
class Callbacks {

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
     * Обратная связь, вызываемая API для уведомления удаленного сервера приложений о завершении транзакции. Используется для игровых платежей и для игровых подписок
     *
     * @param string $access_token
     * @param array $params
     *  @var string $uid: Идентификатор пользователя
     *  @var string $transaction_id: Уникальный идентификатор транзакции. Для некоторых действий (начало триального периода игровой подписки, отказ от подписки) параметр может отсутствовать
     *  @var string $transaction_time: Время транзакции в формате yyyy-mm-dd HH:MM:SS
     *  @var string $product_code: Код продукта
     *  @var string $product_option: Код выбранного варианта продукта
     *  @var integer $amount: Общая сумма в виртуальной валюте портала
     *  @var string $currency: Валюта платежа (за исключением платежей в «ok»)
     *  @var string $payment_system: Система оплаты в случае прямых платежей в валюте RUR
     *  @var string $extra_attributes: JSON-кодированные пары ключей/значений, содержащие дополнительные параметры транзакции, которые передает приложение в методе FAPI.UI.showPayment.
     *  @var string $trial_days: Пробный период в днях купленной игровой подписки
     *  @var boolean $card_promo
     * @return array|mixed|null
     * @link https://apiok.ru/dev/methods/rest/callbacks/callbacks.payment
     * @link https://apiok.ru/apps/features/subscriptions
     * @throws OKApiException
     * @throws OKClientException
     */
    public function payment(string $access_token, array $params = []) {
        return $this->request->post('callbacks.payment', $access_token, $params);
    }

}