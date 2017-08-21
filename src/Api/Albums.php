<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Album;

class Albums extends AbstractApi
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/albums', $id, Album::class, [
            'include' => implode(',', $include)
        ]);
    }
}