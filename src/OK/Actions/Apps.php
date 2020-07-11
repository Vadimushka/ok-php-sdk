<?php
namespace OK\Actions;

use OK\Actions\Enums\ApplicationBeanFields;
use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

/**
 * Методы для работы с приложениями
 */
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
     * Возвращает список приложений для выбранного раздела каталога.
     *
     * @param string $access_token
     * @param array $params
     *  @var ApplicationBeanFields $fields: Список запрашиваемых полей
     *  @var string $anchor: Идентификатор постраничного вывода.
     *  @var integer $count: Количество возвращаемых результатов.
     *  @var string $node: Идентификатор раздела каталога
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
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
     *  @var ApplicationBeanFields $fields: Список запрашиваемых полей
     *  @var integer $count: Количество возвращаемых результатов.
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
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
     *  @var ApplicationBeanFields $fields: Список запрашиваемых полей
     *  @var string $anchor: Идентификатор постраничного вывода.
     *  @var integer $count: Количество возвращаемых результатов.
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
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
     *  @var ApplicationBeanFields $fields: Список запрашиваемых полей
     *  @var string $anchor: Идентификатор постраничного вывода.
     *  @var integer $count: Количество возвращаемых результатов.
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
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
     */
    public function getTop(string $access_token, array $params = [])
    {
        return $this->request->post('apps.getTop', $access_token, $params);
    }


}