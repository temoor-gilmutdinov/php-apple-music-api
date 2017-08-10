<?php

namespace AppleMusic;


use Psr\Http\Message\ResponseInterface;

class Hydrator
{
    public function hydrate(ResponseInterface $response, $class)
    {
        $body = $response->getBody()->__toString();

        $data = json_decode($body, true);

        return new $class($data);
    }
}