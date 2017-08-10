<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Album;

class Albums extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->multipleRequestWithStorefront('catalog/{storefront}/albums', $id);

        return $this->hydrateResponse($response, Album::class);
    }

}