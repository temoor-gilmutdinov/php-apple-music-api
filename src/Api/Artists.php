<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\Artist;
use AppleMusic\Resources\MusicVideo;

class Artists extends Api
{
    /**
     * @param $id
     * @param array $include
     * @return array|null
     */
    public function get($id, $include = [])
    {
        return $this->multiple('catalog/{storefront}/artists', $id, Artist::class, [
            'include' => implode(',', $include),
        ]);
    }

    /**
     * Artist albums relation
     *
     * @param $id
     * @param null $limit
     * @return array|null|string
     */
    public function getAlbums($id, $limit = null)
    {
        $params = [
            'limit' => $limit
        ];

        return $this->request('catalog/{storefront}/artists/' . $id . '/albums', $params, Albums::class, true);
    }

    /**
     * Artist music videos relation
     *
     * @param $id
     * @param null $limit
     * @return array|null|string
     */
    public function getMusicVideos($id, $limit = null)
    {
        $params = [
            'limit' => $limit
        ];

        return $this->request('catalog/{storefront}/artists/' . $id . '/music-videos', $params, MusicVideo::class, true);
    }
}