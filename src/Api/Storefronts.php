<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Storefront;

class Storefronts extends AbstractApi
{
    /**
     * @param null $limit
     * @param null $offset
     * @param null $localization
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function all($limit = null, $offset = null, $localization = null)
    {
        $params = $this->prepareParams([
            'limit' => $limit,
            'offset' => $offset,
            'l' => $localization
        ]);

        $response = $this->httpGet('storefronts', $params);

        return $this->hydrateResponse($response, Storefront::class);
    }

    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->createRequest('storefronts', $id);

        return $this->hydrateResponse($response, Storefront::class);
    }
}