<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Station;

class Stations extends Api
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