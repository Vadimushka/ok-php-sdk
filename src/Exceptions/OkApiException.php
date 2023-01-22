<?php

namespace Vadimushka\OK\Exceptions;

use Vadimushka\OK\Client\OkApiError;

class OkApiException extends \Exception
{

    private mixed $error_message;
    private mixed $error_data;
    private mixed $error_field;


    public function __construct(
        private int        $error_code,
        private string     $description,
        private OkApiError $error
    )
    {
        $this->error_message = $error->getErrorMsg();
        $this->error_data = $error->getErrorData();
        $this->error_field = $error->getErrorField();
        parent::__construct($error->getErrorMsg(), $error_code);
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
     * @return mixed
     */
    public function getErrorField(): mixed
    {
        return $this->error_field;
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
     * @return OkApiError
     */
    public function getError(): OkApiError
    {
        return $this->error;
    }


}
