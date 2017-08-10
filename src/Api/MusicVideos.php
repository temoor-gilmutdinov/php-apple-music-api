<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\MusicVideo;

class MusicVideos extends AbstractApi
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        $response = $this->requestWithStorefront('catalog/{storefront}/music-videos', $id);

        return $this->hydrateResponse($response, MusicVideo::class);
    }
}