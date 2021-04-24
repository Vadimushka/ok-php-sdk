<?php

namespace OK\Actions;

use OK\Client\OKApiRequest;

abstract class BaseAction
{

    public function __construct(protected OKApiRequest $request)
    {
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \OK\Exceptions\OkApiException
     */
    public function __call(string $name, array $arguments = [])
    {
        $methodName = strtolower(str_replace('OK\Actions\\', '', static::class)) . ".$name";
        return $this->request->post($methodName, $arguments[0], !empty($arguments[1]) ? $arguments[1] :  []);
    }

}
