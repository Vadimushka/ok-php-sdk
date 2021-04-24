<?php

namespace OK\Client;

use GuzzleHttp\Client;
use OK\Exceptions\Api\ExceptionMapper;

class OKApiRequest
{

    private Client $http_client;

    public function __construct(private string $application_key, private string $application_key_secret)
    {
        $this->http_client = new Client([
            'base_uri' => 'https://api.ok.ru/fb.do',
        ]);
    }

    /**
     * Makes post request.
     *
     * @param string $method
     * @param string $access_token
     * @param array $params
     * @return \stdClass|array|bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \OK\Exceptions\OkApiException
     */
    public function post(string $method, string $access_token, array $params = []): \stdClass|array|bool
    {
        $params = ['__online' => false, 'application_key' => $this->application_key]  + $params;
        $params['format'] = "json";
        $params['method'] = $method;
        $params = array_map(fn($param) => is_bool($param) ? ($param ? 1 : 0) : $param, $params);
        $params['sig'] = $this->calcSignature($params, $access_token);
        $params['access_token'] = $access_token;
        $contents = json_decode($this->http_client->get('', ['query' => $params])->getBody()->getContents());
        if(isset($contents->error_code)){
            throw ExceptionMapper::parse(new OkApiError($contents));
        }
        return $contents;
    }

    private function calcSignature(array $params, string $access_token): string
    {
        ksort($params);
        $signStr = "";
        foreach ($params as $key => $value) {
            $signStr .= $key . "=" . $value;
        }
        return md5($signStr . md5($access_token . $this->application_key_secret));
    }

    /**
     * Uploads data by its path to the given url.
     *
     * @param string $upload_url
     * @param string $parameter_name
     * @param string $path
     *
     * @return mixed
     *
     */
    public function upload(string $upload_url, string $parameter_name, string $path): mixed
    {
        //TODO https://docs.guzzlephp.org/en/stable/quickstart.html#uploading-data
        $response = $this->http_client->upload($upload_url, $parameter_name, $path);
    }

}
