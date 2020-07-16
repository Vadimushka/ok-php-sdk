<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Callbacks
{

    private $request;

    public function __construct(OKApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Обратная связь, вызываемая API для уведомления удаленного сервера приложений о завершении транзакции. Используется для игровых платежей и для игровых подписок
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/callbacks/callbacks.payment
     */
    public function payment(string $access_token, array $params = [])
    {
        return $this->request->post('callbacks.payment', $access_token, $params);
    }

}