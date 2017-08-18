<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Playlist;

class Playlists extends AbstractApi
{
    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/playlists', $id, Playlist::class);
    }
}