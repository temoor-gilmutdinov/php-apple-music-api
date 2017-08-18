<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Song;

class Songs extends AbstractApi
{
    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/songs', $id, Song::class);
    }
}