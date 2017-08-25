<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Artist;

class Artists extends Api
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/artists', $id, Artist::class, [
            'include' => implode(',', $include)
        ]);
    }
}