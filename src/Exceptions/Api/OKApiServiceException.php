<?php

namespace Vadimushka\OK\Exceptions\Api;

use Vadimushka\OK\Client\OkApiError;
use Vadimushka\OK\Exceptions\OkApiException;

class OKApiServiceException extends OkApiException
{

    public function __construct(OkApiError $error) {
        parent::__construct(2, 'Service temporarily unavailable', $error);
    }
}
