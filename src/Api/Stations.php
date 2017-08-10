<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Station;

class Stations extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->requestWithStorefront('catalog/{storefront}/stations', $id);

        return $this->hydrateResponse($response, Station::class);
    }
}