<?php

namespace AppleMusic\Api;


use AppleMusic\ResourceObjects\MusicVideo;

class MusicVideos extends AbstractApi
{
    /**
     * @param $id
     * @return array|null
     */
    public function get($id)
    {
        return $this->multiple('catalog/{storefront}/music-videos', $id, MusicVideo::class);
    }
}