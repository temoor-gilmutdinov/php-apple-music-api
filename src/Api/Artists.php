<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Artist;

class Artists extends AbstractApi
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