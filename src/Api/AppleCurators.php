<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\AppleCurator;

class AppleCurators extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->multipleRequestWithStorefront('catalog/{storefront}/apple-curators', $id);

        return $this->hydrateResponse($response, AppleCurator::class);
    }
}