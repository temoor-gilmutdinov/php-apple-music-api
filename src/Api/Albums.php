<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Album;

class Albums extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/albums', $id, Album::class);
    }
}