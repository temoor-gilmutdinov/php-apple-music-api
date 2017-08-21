<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Song;

class Songs extends AbstractApi
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/songs', $id, Song::class, [
            'include' => implode(',', $include)
        ]);
    }
}