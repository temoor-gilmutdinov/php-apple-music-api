<?php

namespace AppleMusic;


use GuzzleHttp\Client;

class Configuration
{
    const API_VERSION = 'v1';
    const API_URL = 'https://api.music.apple.com';

    /**
     * @var string
     */
    private $token;

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @return Client
     */
    public function createClient()
    {
        $this->httpClient = new Client([
            'base_uri' => self::API_URL . '/' . self::API_VERSION . '/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token
            ]
        ]);

        return $this->getHttpClient();
    }

    /**
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }
}