<?php


namespace OK\Actions;

use OK\Client\OKApiRequest;

class Communities {

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

    public function checkVipOfferStatus(string $access_token, array $params = []) {
        return $this->request->post('communities.getMembers', $access_token, $params);
    }

}