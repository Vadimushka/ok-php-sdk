<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;

class Bookmark {

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

    public function add(string $access_token, array $params = []) {
        return $this->request->post('bookmark.add', $access_token, $params);
    }

    public function delete(string $access_token, array $params = []) {
        return $this->request->post('bookmark.delete', $access_token, $params);
    }

}