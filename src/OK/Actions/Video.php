<?php


namespace OK\Actions;

use OK\Client\OKApiRequest;

class Video {

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

    public function delete(string $access_token, array $params = []) {
        return $this->request->post('video.delete', $access_token, $params);
    }

    public function getUploadUrl(string $access_token, array $params = []) {
        return $this->request->post('video.getUploadUrl', $access_token, $params);
    }

    public function subscribe(string $access_token, array $params = []) {
        return $this->request->post('video.subscribe', $access_token, $params);
    }

    public function update(string $access_token, array $params = []) {
        return $this->request->post('video.update', $access_token, $params);
    }
}