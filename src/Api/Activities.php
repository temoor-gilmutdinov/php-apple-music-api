<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Activity;

class Activities extends AbstractApi
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