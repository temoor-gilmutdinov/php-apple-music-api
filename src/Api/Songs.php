<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Song;

class Songs extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->requestWithStorefront('catalog/{storefront}/songs', $id);

        return $this->hydrateResponse($response, Song::class);
    }
}