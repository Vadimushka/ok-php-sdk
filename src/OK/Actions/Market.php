<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;

class Market {

    private $request;

    public function __construct(OKApiRequest $request) {
        $this->request = $request;
    }

}