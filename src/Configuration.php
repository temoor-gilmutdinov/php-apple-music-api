<?php

namespace AppleMusic;


use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

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
     * @var
     */
    private $logger;

    /**
     * @return Client
     */
    public function createClient()
    {
        $config = [
            'base_uri' => self::API_URL . '/' . self::API_VERSION . '/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token
            ]
        ];

        $handler = $this->getHandlerStack();
        if($handler) {
            $config['handler'] = $handler;
        }

        $this->httpClient = new Client($config);

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

    /**
     * @param $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return mixed
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @return bool|HandlerStack
     */
    protected function getHandlerStack()
    {
        if (!$this->logger) {
            return false;
        } else {
            $handler = HandlerStack::create();
            $handler->push(Middleware::log($this->logger, new MessageFormatter(MessageFormatter::SHORT)));

            return $handler;
        }
    }
}