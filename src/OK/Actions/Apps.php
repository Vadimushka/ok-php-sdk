<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

class Apps
{

    private $request;

    public function __construct(OKApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Возвращает список приложений для выбранного раздела каталога.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/apps/apps.getPlatformCatalogNodeTop
     */
    public function getPlatformCatalogNodeTop(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getPlatformCatalogNodeTop', $access_token, $params);
    }

    /**
     * Возврашает каталог игр с указанным количеством приложений для каждого раздела.
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/apps/apps.getPlatformCatalogNodesTop
     */
    public function getPlatformCatalogNodesTop(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getPlatformCatalogNodesTop', $access_token, $params);
    }

    /**
     * Получение новых игр на платформе
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/apps/apps.getPlatformNew
     */
    public function getPlatformNew(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getPlatformNew', $access_token, $params);
    }

    /**
     * Список игр из топа
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/apps/apps.getPlatformTop
     */
    public function getPlatformTop(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getPlatformTop', $access_token, $params);
    }

    /**
     * Получения топа приложений
     *
     * @param string $access_token
     * @param array $params
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     * @link https://apiok.ru/dev/methods/rest/apps/apps.getTop
     */
    public function getTop(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getTop', $access_token, $params);
    }


}