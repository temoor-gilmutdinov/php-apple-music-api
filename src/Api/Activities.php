<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Activity;

class Activities extends AbstractApi
{
    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/activities', $id, Activity::class);
    }
}