<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Curator;

class Curators extends AbstractApi
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/curators', $id, Curator::class, [
            'include' => implode(',', $include)
        ]);
    }
}