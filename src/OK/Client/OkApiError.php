<?php

namespace OK\Client;

class OkApiError
{

    private $error_code;
    private $error_msg;
    private $error_data;

    public function __construct(\stdClass $error)
    {
        $this->error_code = $error->error_code;
        $this->error_msg = $error->error_msg;
        $this->error_data = $error->error_data;
    }

    /**
     * @return mixed
     */
    public function getErrorCode(): mixed
    {
        return $this->error_code;
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
    public function getErrorMsg(): mixed
    {
        return $this->error_msg;
    }

}
