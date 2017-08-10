<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Artist;

class Artists extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->multipleRequestWithStorefront('catalog/{storefront}/artists', $id);

        return $this->hydrateResponse($response, Artist::class);
    }
}