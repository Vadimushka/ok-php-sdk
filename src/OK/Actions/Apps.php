<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Apps
{

    /**
     * @var OKApiRequest
     */
    private $request;

    /**
     * Apps constructor.
     * @param OKApiRequest $request
     */
    public function __construct(OKApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function getPlatformCatalogNodeTop(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getPlatformCatalogNodeTop', $access_token, $params);
    }

    /**
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function getPlatformCatalogNodesTop(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getPlatformCatalogNodesTop', $access_token, $params);
    }

    /**
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function getPlatformNew(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getPlatformNew', $access_token, $params);
    }

    /**
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function getPlatformTop(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getPlatformTop', $access_token, $params);
    }

    /**
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function getTop(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getTop', $access_token, $params);
    }


}