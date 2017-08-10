<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Activity;

class Activities extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->multipleRequestWithStorefront('catalog/{storefront}/activities', $id);

        return $this->hydrateResponse($response, Activity::class);
    }
}