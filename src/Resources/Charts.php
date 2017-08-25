<?php

namespace AppleMusic\Resources;


class Charts
{
    /**
     * @var array
     */
    public $songs = [];

    /**
     * @var array
     */
    public $albums = [];

    public function __construct($data)
    {
        foreach ($data['albums'] as $album) {
            $this->albums[] = new Chart($album, Album::class);
        }

        foreach ($data['songs'] as $song) {
            $this->songs[] = new Chart($song, Song::class);
        }
    }
}