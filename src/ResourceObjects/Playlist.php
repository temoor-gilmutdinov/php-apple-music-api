<?php

namespace AppleMusic\ResourceObjects;


class Playlist
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

    //todo curator, tracks relation
}