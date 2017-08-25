<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Curator;

class Curators extends Api
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