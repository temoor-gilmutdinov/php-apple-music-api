<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Artist;

class Artists extends AbstractApi
{
    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/artists', $id, Artist::class);
    }
}