<?php
namespace OK\Actions;

use OK\Actions\Enums\CommunitiesFilterType;
use OK\Actions\Enums\PagingDirection;
use OK\Actions\Enums\UserInfoField;
use OK\Client\OKApiRequest;
use OK\Exceptions\OKApiException;
use OK\Exceptions\OKClientException;

/**
 * Методы для работы с сообществами
 */
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

    /**
     * Получение списка участников сообщества
     *
     * @param string $access_token
     * @param array $params
     *  @var string $gid: Идентификатор сообщества
     *  @var integer $start_year: Год вступления в сообщество
     *  @var integer $end_year: Год выхода из сообщества
     *  @var string $anchor: Идентификатор постраничного вывода.
     *  @var PagingDirection $direction: Направление постраничного вывода.
     *  @var integer $count: Количество возвращаемых результатов.
     *  @var UserInfoField $fields: Список запрашиваемых полей
     *  @var CommunitiesFilterType $filter: Фильтр по статусу участия
     * @return array|mixed|null
     * @throws OKApiException
     * @throws OKClientException
     */
    public function getMembers(string $access_token, array $params = []) {
        return $this->request->post('communities.getMembers', $access_token, $params);
    }

}