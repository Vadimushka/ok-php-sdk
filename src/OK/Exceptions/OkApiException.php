<?php

namespace OK\Exceptions;

use JetBrains\PhpStorm\Pure;
use OK\Client\OkApiError;

class OkApiException extends \Exception
{

    private int $error_code;
    private string $description;
    private mixed $error_message;
    private OkApiError $error;
    private mixed $error_data;

    #[Pure]
    public function __construct(
        int $error_code,
        string $description,
        OkApiError $error
    ) {
        $this->error_code = $error_code;
        $this->description = $description;
        $this->error_message = $error->getErrorMsg();
        $this->error = $error;
        $this->error_data = $error->getErrorData();
        parent::__construct($error->getErrorMsg(), $error_code);
    }


    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->error_code;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage(): mixed
    {
        return $this->error_message;
    }

    /**
     * @return mixed
     */
    public function getErrorData(): mixed
    {
        return $this->error_data;
    }

    /**
     * @return OkApiError
     */
    public function getError(): OkApiError
    {
        return $this->error;
    }

}
