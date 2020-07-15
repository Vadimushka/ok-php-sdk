<?php


namespace OK\Actions;


use OK\Client\OKApiRequest;

class MessagesV2 {

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

}