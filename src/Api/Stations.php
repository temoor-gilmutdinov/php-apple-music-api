<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Station;

class Stations extends AbstractApi
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/stations', $id, Station::class, [
            'include' => implode(',', $include)
        ]);
    }
}