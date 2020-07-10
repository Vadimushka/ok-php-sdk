<?php


namespace OK\Exceptions;

use OK\Client\OKApiError;

class OKApiException extends \Exception
{

    /**
     * @var int
     */
    protected $error_code;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $error_message;

    /**
     * @var OKApiError
     */
    protected $error;

    /**
     * VKApiException constructor.
     * @param int $error_code
     * @param string $description
     * @param OKApiError $error
     */
    public function __construct(int $error_code, string $description, OKApiError $error) {
        $this->error_code = $error_code;
        $this->description = $description;
        $this->error_message = $error->getErrorMsg();
        $this->error = $error;
        parent::__construct($error->getErrorMsg(), $error_code);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int {
        return $this->error_code;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string {
        return $this->error_message;
    }

    /**
     * @return OKApiError
     */
    public function getError(): OKApiError {
        return $this->error;
    }

}