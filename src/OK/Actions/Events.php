<?php


namespace OK\Actions;

use OK\Client\OKApiRequest;

class Events {

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

    public function get(string $access_token, array $params = []) {
        return $this->request->post('events.get', $access_token, $params);
    }
}