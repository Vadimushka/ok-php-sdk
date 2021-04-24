<?php

namespace OK\Exceptions\Api;

use JetBrains\PhpStorm\Pure;
use OK\Client\OkApiError;

class OkApiMissingRequiredOrInvalidParamException extends \OK\Exceptions\OkApiException
{

    #[Pure]
    public function __construct(
        OkApiError $error
    ) {
        parent::__construct(100, 'Отсутствующий или неверный параметр', $error);
    }

}
