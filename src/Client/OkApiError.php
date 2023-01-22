<?php

namespace Vadimushka\OK\Client;

class OkApiError
{

    protected const KEY_ERROR_CODE = 'error_code';
    protected const KEY_ERROR_MSG = 'error_msg';

    protected const KEY_ERROR_DATA = 'error_data';

    protected const KEY_ERROR_FIELD = 'error_field';

    private ?int $error_code;
    private ?string $error_msg;
    private mixed $error_data;
    private mixed $error_field;

    public function __construct(array $error)
    {
        $this->error_code = $error['error_code'] ?? null;
        $this->error_msg = $error['error_msg'] ?? null;
        $this->error_data = $error['error_data'] ?? null;
        $this->error_field = $error['error_field'] ?? null;
    }

    /**
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->error_code;
    }

    /**
     * @return string|null
     */
    public function getErrorMsg(): ?string
    {
        return $this->error_msg;
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

}
