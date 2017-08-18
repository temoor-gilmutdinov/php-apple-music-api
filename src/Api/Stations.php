<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Station;

class Stations extends AbstractApi
{
    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/stations', $id, Station::class);
    }
}