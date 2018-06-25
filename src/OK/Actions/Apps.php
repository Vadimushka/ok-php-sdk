<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;

class Apps {

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
        return $this->request->post('apps.checkVipOfferStatus', $access_token, $params);
    }

    public function getAppPromoInfo(string $access_token, array $params = []) {
        return $this->request->post('apps.getAppPromoInfo', $access_token, $params);
    }

    public function getPlatformCatalogNodeTop(string $access_token, array $params = []) {
        return $this->request->post('apps.getPlatformCatalogNodeTop', $access_token, $params);
    }

    public function getPlatformCatalogNodesTop(string $access_token, array $params = []) {
        return $this->request->post('apps.getPlatformCatalogNodesTop', $access_token, $params);
    }

    public function getPlatformNew(string $access_token, array $params = []) {
        return $this->request->post('apps.getPlatformNew', $access_token, $params);
    }

    public function getPlatformTop(string $access_token, array $params = []) {
        return $this->request->post('apps.getPlatformTop', $access_token, $params);
    }

    public function getTop(string $access_token, array $params = []) {
        return $this->request->post('apps.getTop', $access_token, $params);
    }

    public function removeAppPromoInfo(string $access_token, array $params = []) {
        return $this->request->post('apps.removeAppPromoInfo', $access_token, $params);
    }

    public function setAppPromoInfo(string $access_token, array $params = []) {
        return $this->request->post('apps.setAppPromoInfo', $access_token, $params);
    }

    public function setVipOfferStatus(string $access_token, array $params = []) {
        return $this->request->post('apps.setVipOfferStatus', $access_token, $params);
    }

    public function setVipOffers(string $access_token, array $params = []) {
        return $this->request->post('apps.setVipOffers', $access_token, $params);
    }

}