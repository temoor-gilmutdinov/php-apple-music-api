<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Album;

class Albums extends AbstractApi
{
    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/albums', $id, Album::class);
    }
}