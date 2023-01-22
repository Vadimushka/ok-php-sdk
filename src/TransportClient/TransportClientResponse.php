<?php

namespace Vadimushka\OK\TransportClient;

class TransportClientResponse
{

    /**
     * TransportClientResponse constructor.
     * @param int|null $http_status
     * @param array|null $headers
     * @param null|string $body
     */
    public function __construct(
        private ?int $http_status, private ?array $headers, private ?string $body
    )
    {
    }

    /**
     * @return int|null
     */
    public function getHttpStatus(): ?int
    {
        return $this->http_status;
    }

    /**
     * @return array|null
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

}
