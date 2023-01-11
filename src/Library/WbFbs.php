<?php

namespace WbFbs\Library;

use GuzzleHttp\Client;

class WbFbs
{
    private string $auth_key;

    public function __construct(
        private Client $http ,
    ){}

    public function setAuth(string $auth_key): void
    {
        $this->auth_key = $auth_key;
    }

    public function get(string $path = '', array $data = []){
        $request = $this->http->request("GET",$path, [
            'query' => $data,
            'headers' => [
                'Authorization' => $this->auth_key
            ]
        ])->getBody();

        return json_decode($request,true);
    }
}