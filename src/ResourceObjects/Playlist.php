<?php

namespace AppleMusic\ResourceObjects;


class Playlist extends Resource
{
    const PLAYLIST_TYPE_USER_SHARED = 'user-shared';
    const PLAYLIST_TYPE_EDITORIAL = 'editorial';
    const PLAYLIST_TYPE_EXTERNAL = 'external';
    const PLAYLIST_TYPE_PERSONAL_MIX = 'personal-mix';

    /**
     * @var Artwork (Optional) The playlist artwork.
     */
    public $artwork;

    /**
     * @var string (Optional) The display name of the curator.
     */
    public $curatorName;

    /**
     * @var EditorialNotes (Optional) A description of the playlist.
     */
    public $description;

    /**
     * @var string The date the playlist was last modified.
     */
    public $lastModifiedDate;

    /**
     * @var string The localized name of the album.
     */
    public $name;

    /**
     * @var string The type of playlist. The available values for the playlistType: user-shared, editorial, external, personal-mix
     */
    public $playlistType;

    /**
     * @var PlayParameters (Optional) The parameters to use to playback the tracks in the playlist.
     */
    public $playParams;

    /**
     * @var string The URL for sharing an album in the iTunes Store.
     */
    public $url;

    /**
     * @var array The curator that created the playlist.
     */
    public $curator = [];

    /**
     * @var array The songs and music videos included in the playlist.
     */
    public $songs = [];

    public function attributes($data)
    {
        $this->lastModifiedDate = $data['lastModifiedDate'];
        $this->name = $data['name'];
        $this->playlistType = $data['playlistType'];
        $this->url = $data['url'];

        if(isset($data['artwork'])) {
            $this->artwork = new Artwork($data['artwork']);
        }

        if(isset($data['curatorName'])) {
            $this->curatorName = $data['curatorName'];
        }

        if(isset($data['description'])) {
            $this->description = $data['description'];
        }

        if(isset($data['playParams'])) {
            $this->playParams = new PlayParameters($data['playParams']);
        }
    }

    public function relationships($data)
    {
        if (isset($data['curator'])) {
            foreach ($data['albums']['data'] as $album) {
                $this->curator[] = new Album($album);
            }
        }

        if (isset($data['tracks'])) {
            foreach ($data['tracks']['data'] as $song) {
                $this->songs[] = new Song($song);
            }
        }
    }
}