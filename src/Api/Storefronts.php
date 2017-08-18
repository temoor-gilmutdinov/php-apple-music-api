<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Storefront;

class Storefronts extends AbstractApi
{
    /**
     * @param null $limit
     * @param null $offset
     * @return array|null
     */
    public function all($limit = null, $offset = null)
    {
        $params = [
            'limit' => $limit,
            'offset' => $offset
        ];

        return $this->request('storefronts', $params, Storefront::class, true);
    }

    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->request('storefronts/' . $id, [], Storefront::class);
    }
}