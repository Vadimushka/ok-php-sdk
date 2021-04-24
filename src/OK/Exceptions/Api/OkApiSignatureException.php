<?php

namespace OK\Exceptions\Api;

use JetBrains\PhpStorm\Pure;
use OK\Client\OkApiError;

class OkApiSignatureException extends \OK\Exceptions\OkApiException
{

    #[Pure]
    public function __construct(
        OkApiError $error
    ) {
        parent::__construct(104, 'Неверная подпись', $error);
    }
}
