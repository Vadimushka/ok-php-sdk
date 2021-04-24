<?php

namespace OK\Exceptions\Api;

use JetBrains\PhpStorm\Pure;
use OK\Client\OkApiError;
use OK\Exceptions\OkApiException;

class ExceptionMapper
{

    #[Pure]
    public static function parse(OkApiError $error) : OkApiException
    {
        return match ($error->getErrorCode()) {
            100 => new OkApiMissingRequiredOrInvalidParamException($error),
            104 => new OkApiSignatureException($error),
            default => new OkApiException($error->getErrorCode(), $error->getErrorMsg(), $error),
        };
    }

}
