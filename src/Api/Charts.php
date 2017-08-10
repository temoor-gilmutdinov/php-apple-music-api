<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Chart;

class Charts extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($types, $chart = null, $genre = null, $limit = null, $offset = null)
    {
        $params = $this->prepareParams([
            'types' => $types,
            'chart' => $chart,
            'genre' => $genre,
            'limit' => $limit,
            'offset' => $offset
        ]);

        $response = $this->requestWithStorefront('catalog/{storefront}/charts', $params);

        return $this->hydrateResponse($response, Chart::class);
    }
}