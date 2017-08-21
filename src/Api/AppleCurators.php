<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\AppleCurator;

class AppleCurators extends AbstractApi
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/apple-curators', $id, AppleCurator::class, [
            'include' => implode(',', $include)
        ]);
    }
}