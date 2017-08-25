<?php

namespace AppleMusic\Resources;


class Search
{
    public $songs = [];
    public $albums = [];
    public $artists = [];
    public $musicVideos = [];

    public function __construct($data)
    {
        if (isset($data['songs'])) {
            foreach ($data['songs']['data'] as $song) {
                $this->songs[] = new Song($song);
            }
        }
        if (isset($data['albums'])) {
            foreach ($data['albums']['data'] as $album) {
                $this->albums[] = new Album($album);
            }
        }

        if (isset($data['artists'])) {
            foreach ($data['artists']['data'] as $artist) {
                $this->artists[] = new Artist($artist);
            }
        }

        if (isset($data['music-videos'])) {
            foreach ($data['music-videos']['data'] as $musicVideo) {
                $this->musicVideos[] = new MusicVideo($musicVideo);
            }
        }
    }
}