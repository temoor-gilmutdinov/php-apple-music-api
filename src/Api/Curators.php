<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Curator;

class Curators extends AbstractApi
{
    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/curators', $id, Curator::class);
    }
}