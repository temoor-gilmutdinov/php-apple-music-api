<?php

namespace Seriy\AppleMusicApi\ResourceObjects;


use Seriy\AppleMusicApi\AbstractObject;

class Artist extends AbstractObject
{
    /**
     * @var array The names of the genres associated with this artist.
     */
    public $genreNames;

    /**
     * @var EditorialNotes (Optional) The notes about the artist that appear in the iTunes Store.
     */
    public $editorialNotes;

    /**
     * @var string The localized name of the artist.
     */
    public $name;

    /**
     * @var string The URL for sharing an artist in the iTunes Store.
     */
    public $url;

    //todo albums, genres, music-videos, playlists relations
}