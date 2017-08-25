<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Charts as ChartsResponse;

class Charts extends Api
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

        return $this->request('catalog/{storefront}/charts', $params, ChartsResponse::class);
    }
}