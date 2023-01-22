<?php

namespace Vadimushka\OK\Exceptions\Api;

use Vadimushka\OK\Client\OkApiError;
use Vadimushka\OK\Exceptions\OkApiException;

class OKApiMethodException extends OkApiException
{
    public function __construct(OkApiError $error)
    {
        parent::__construct(3, 'Method does not exist', $error);
    }
}
