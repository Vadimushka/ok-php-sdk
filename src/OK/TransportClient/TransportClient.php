<?php

namespace OK\TransportClient;

interface TransportClient {

    public function post(string $url, ?array $payload = null): TransportClientResponse;

    public function get(string $url, ?array $payload = null): TransportClientResponse;

    public function upload(string $url, string $parameter_name, string $path): TransportClientResponse;

}