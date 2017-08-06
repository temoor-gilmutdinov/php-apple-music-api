<?php

namespace Seriy\AppleMusicApi\ResourceObjects;


use Seriy\AppleMusicApi\AbstractObject;

class Song extends AbstractObject
{
    /**
     * @var string The artist’s name.
     */
    public $artistName;

    /**
     * @var Artwork The album artwork.
     */
    public $artwork;

    /**
     * todo тут должно быть Composer вместо array
     * @var array (Optional) The song’s composer.
     */
    public $composerName;

    /**
     * @var string (Optional) The RIAA rating of the content. The possible values for this rating are clean and explicit. No value means no rating.
     */
    public $contentRating;

    /**
     * @var integer The disc number the song appears on.
     */
    public $discNumber;

    /**
     * @var integer (Optional) The duration of the song in milliseconds.
     */
    public $durationInMillis;

    /**
     * @var EditorialNotes (Optional) The notes about the song that appear in the iTunes Store.
     */
    public $editorialNotes;

    /**
     * @var array The genre names the song is associated with.
     */
    public $genreNames;

    /**
     * @var integer (Optional, classical music only) The movement count of this song.
     */
    public $movementCount;

    /**
     * @var string (Optional, classical music only) The movement name of this song.
     */
    public $movementName;

    /**
     * @var string (Optional, classical music only) The movement number of this song.
     */
    public $movementNumber;

    /**
     * @var string The localized name of the song.
     */
    public $name;

    /**
     * @var PlayParameters (Optional) The parameters to use to playback the song.
     */
    public $playParams;

    /**
     * @var string The release date of the song in YYYY-MM-DD format.
     */
    public $releaseDate;

    /**
     * @var integer The number of the song in the album’s track list.
     */
    public $trackNumber;

    /**
     * @var string The URL for sharing a song in the iTunes Store.
     */
    public $url;

    /**
     * @var string (Optional, classical music only) The name of the associated work.
     */
    public $workName;

    //todo albums, artists, genres relations
}