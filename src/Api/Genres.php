<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Genre;

class Genres extends AbstractApi
{
    public function top($limit = null, $offset = null)
    {
        $params = $this->prepareParams([
            'limit' => $limit,
            'offset' => $offset
        ]);

        $response = $this->requestWithStorefront('catalog/{storefront}/genres', $params);

        return $this->hydrateResponse($response, Genre::class);
    }

    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->multipleRequestWithStorefront('catalog/{storefront}/genres', $id);

        return $this->hydrateResponse($response, Genre::class);
    }
}