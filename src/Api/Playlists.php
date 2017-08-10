<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\Playlist;

class Playlists extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->requestWithStorefront('catalog/{storefront}/playlists', $id);

        return $this->hydrateResponse($response, Playlist::class);
    }
}