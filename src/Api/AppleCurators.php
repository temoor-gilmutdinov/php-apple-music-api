<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\AppleCurator;

class AppleCurators extends AbstractApi
{
    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/apple-curators', $id, AppleCurator::class);
    }
}