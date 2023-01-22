<?php

namespace Vadimushka\OK\TransportClient\Guzzle;

use Vadimushka\OK\TransportClient\TransportClient;
use Vadimushka\OK\TransportClient\TransportClientResponse;

class GuzzleHttpClient implements TransportClient
{

    public function __construct(int $connection_timeout)
    {

    }


    public function post(string $url, ?array $payload = null): TransportClientResponse
    {

    }

    public function get(string $url, ?array $payload = null): TransportClientResponse
    {

    }

    public function upload(string $url, string $parameter_name, string $path): TransportClientResponse
    {

    }
}
