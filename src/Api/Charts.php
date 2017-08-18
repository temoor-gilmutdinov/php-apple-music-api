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
        $params = [
            'types' => implode(',', $types),
            'chart' => $chart,
            'genre' => $genre,
            'limit' => $limit,
            'offset' => $offset
        ];

        return $this->request('catalog/{storefront}/charts', $params, Chart::class, true);
    }
}