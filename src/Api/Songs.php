<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Song;

class Songs extends Api
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