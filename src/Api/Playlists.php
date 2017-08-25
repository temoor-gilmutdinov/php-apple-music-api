<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Playlist;

class Playlists extends Api
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/playlists', $id, Playlist::class, [
            'include' => implode(',', $include)
        ]);
    }
}