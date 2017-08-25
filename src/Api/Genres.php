<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Genre;

class Genres extends Api
{
    /**
     * @param null $limit
     * @param null $offset
     * @return array|null
     */
    public function top($limit = null, $offset = null)
    {
        $params = [
            'limit' => $limit,
            'offset' => $offset
        ];

        return $this->request('catalog/{storefront}/genres', $params, Genre::class, true);
    }

    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/genres', $id, Genre::class);
    }
}