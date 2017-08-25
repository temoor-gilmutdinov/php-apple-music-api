<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\AppleCurator;

class AppleCurators extends Api
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