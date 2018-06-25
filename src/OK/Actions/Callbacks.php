<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;

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

    public function payment(string $access_token, array $params = []) {
        return $this->request->post('callbacks.payment', $access_token, $params);
    }

}