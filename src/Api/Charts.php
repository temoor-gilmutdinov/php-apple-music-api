<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Chart;

class Charts extends AbstractApi
{
    /**
     * @param $types
     * @param null $chart
     * @param null $genre
     * @param null $limit
     * @param null $offset
     * @return array|null
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