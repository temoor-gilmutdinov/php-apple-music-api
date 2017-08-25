<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Album;

class Albums extends Api
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/albums', $id, Album::class, [
            'include' => implode(',', $include),
            'limit' => 100
        ]);
    }
}