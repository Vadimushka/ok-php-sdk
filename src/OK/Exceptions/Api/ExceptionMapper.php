<?php


namespace OK\Exceptions\Api;

use OK\Client\OKApiError;
use OK\Exceptions\OKApiException;

class ExceptionMapper
{

    /**
     * @param OKApiError $error
     * @return \Exception
     */
    public static function parse(OKApiError $error) {
        switch ($error->getErrorCode()) {
            case 1:
                return new OKApiUnknownException($error);
            case 2:
                return new OKApiDisabledException($error);
            case 3:
                return new OKApiMethodException($error);
            case 4:
                return new OKApiSignatureException($error);
            case 5:
                return new OKApiAuthException($error);
            case 6:
                return new OKApiTooManyException($error);
            case 7:
                return new OKApiPermissionException($error);
            case 8:
                return new OKApiRequestException($error);
            case 9:
                return new OKApiFloodException($error);
            case 10:
                return new OKApiServerException($error);
            case 11:
                return new OKApiEnabledInTestException($error);
            case 14:
                return new OKApiCaptchaException($error);
            case 15:
                return new OKApiAccessException($error);
            case 16:
                return new OKApiAuthHttpsException($error);
            case 17:
                return new OKApiAuthValidationException($error);
            case 18:
                return new OKApiUserDeletedException($error);
            case 20:
                return new OKApiMethodPermissionException($error);
            case 21:
                return new OKApiMethodAdsException($error);
            case 23:
                return new OKApiMethodDisabledException($error);
            case 24:
                return new OKApiNeedConfirmationException($error);
            case 25:
                return new OKApiNeedTokenConfirmationException($error);
            case 27:
                return new OKApiGroupAuthException($error);
            case 28:
                return new OKApiAppAuthException($error);
            case 29:
                return new OKApiRateLimitException($error);
            case 30:
                return new OKApiPrivateProfileException($error);
            case 100:
                return new OKApiParamException($error);
            case 101:
                return new OKApiParamApiIdException($error);
            case 113:
                return new OKApiParamUserIdException($error);
            case 150:
                return new OKApiParamTimestampException($error);
            case 200:
                return new OKApiAccessAlbumException($error);
            case 201:
                return new OKApiAccessAudioException($error);
            case 203:
                return new OKApiAccessGroupException($error);
            case 300:
                return new OKApiAlbumFullException($error);
            case 500:
                return new OKApiVotesPermissionException($error);
            case 600:
                return new OKApiAdsPermissionException($error);
            case 603:
                return new OKApiAdsSpecificException($error);
            default:
                return new OKApiException($error->getErrorCode(), $error->getErrorMsg(), $error);}
    }

}