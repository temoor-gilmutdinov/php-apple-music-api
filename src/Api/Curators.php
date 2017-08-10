<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Curator;

class Curators extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->requestWithStorefront('catalog/{storefront}/curators', $id);

        return $this->hydrateResponse($response, Curator::class);
    }
}