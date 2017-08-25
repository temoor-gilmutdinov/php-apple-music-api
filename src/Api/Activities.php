<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Activity;

class Activities extends Api
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/activities', $id, Activity::class, [
            'include' => implode(',', $include)
        ]);
    }
}