<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

/**
 * Методы для получения мобильных виджетов
 */
class Widget {

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
     * Метод возвращает содержимое одного виджета как обычный HTTP-ответ.
     *
     * @param string $access_token
     * @param array $params
     *  @var string $wid: Идентификатор виджета
     *  @var string $style: Стиль виджета
     * @return mixed
     * @throws OKApiException
     * @throws OKClientException
     */
    public function getWidgetContent(string $access_token, array $params = []) {
        return $this->request->post('widget.getWidgetContent', $access_token, $params);
    }

    /**
     * Метод возвращает один или несколько UI-виджетов, которые можно встроить в ваше веб-приложение
     *
     * @param string $access_token
     * @param array $params
     *  @var string $wids: Список идентификаторов виджетов для возврата
     *  @var string $style: Стиль виджета. Данный стиль будет применен ко всем переданным виджетам. Если какой-то из них не поддерживает этот стиль, то для него будет подгружен стиль по умолчанию.
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function getWidgets(string $access_token, array $params = []) {
        return $this->request->post('widget.getWidgets', $access_token, $params);
    }

}