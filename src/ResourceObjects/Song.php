<?php

namespace AppleMusic\ResourceObjects;


class Song extends Resource
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

    /**
     * @var array The albums associated with the song.
     */
    public $albums = [];

    /**
     * @var array The artists associated with the song.
     */
    public $artists = [];

    /**
     * @var array The genres associated with the song.
     */
    public $genres = [];

    public function attributes($data)
    {
        // todo как быть с $data['previews']

        $this->artistName = $data['artistName'];
        $this->artwork = new Artwork($data['artwork']);
        $this->discNumber = $data['discNumber'];
        $this->genreNames = $data['genreNames'];
        $this->name = $data['genreNames'];
        $this->releaseDate = $data['releaseDate'];
        $this->trackNumber = $data['trackNumber'];
        $this->url = $data['url'];

        if (isset($data['composerName'])) {
            $this->composerName = $data['composerName'];
        }

        if (isset($data['contentRating'])) {
            $this->contentRating = $data['contentRating'];
        }

        if (isset($data['durationInMillis'])) {
            $this->durationInMillis = $data['durationInMillis'];
        }

        if (isset($data['editorialNotes'])) {
            $this->editorialNotes = new EditorialNotes($data['editorialNotes']);
        }

        if (isset($data['movementCount'])) {
            $this->movementCount = $data['movementCount'];
        }

        if (isset($data['movementName'])) {
            $this->movementName = $data['movementName'];
        }

        if (isset($data['movementNumber'])) {
            $this->movementNumber = $data['movementNumber'];
        }

        if (isset($data['playParams'])) {
            $this->playParams = new PlayParameters($data['playParams']);
        }

        if (isset($data['workName'])) {
            $this->workName = $data['workName'];
        }
    }

    public function relationships($data)
    {
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

        if (isset($data['genres'])) {
            foreach ($data['genres']['data'] as $genre) {
                $this->genres[] = new Genre($genre);
            }
        }
    }
}