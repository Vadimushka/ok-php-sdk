<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;

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

    public function getWidgetContent(string $access_token, array $params = []) {
        return $this->request->post('widget.getWidgetContent', $access_token, $params);
    }

    public function getWidgets(string $access_token, array $params = []) {
        return $this->request->post('widget.getWidgets', $access_token, $params);
    }

}