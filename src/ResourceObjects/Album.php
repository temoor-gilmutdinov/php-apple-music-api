<?php

namespace AppleMusic\ResourceObjects;


class Album extends Resource
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
     * @var string (Optional) The RIAA rating of the content. The possible values for this rating are clean and explicit. No value means no rating.
     */
    public $contentRating;

    /**
     * @var string The copyright text.
     */
    public $copyright;

    /**
     * @var EditorialNotes (Optional) The notes about the album that appear in the iTunes Store.
     */
    public $editorialNotes;

    /**
     * @var array The names of the genres associated with this album.
     */
    public $genreNames;

    /**
     * @var boolean Indicates whether the album is complete. If true, the album is complete; otherwise, it is not. An album is complete if it contains all its tracks and songs.
     */
    public $isComplete;

    /**
     * @var boolean Indicates whether the album contains a single song.
     */
    public $isSingle;

    /**
     * @var string The localized name of the album.
     */
    public $name;

    /**
     * @var string The release date of the album in YYYY-MM-DD format.
     */
    public $releaseDate;

    /**
     * @var PlayParameters (Optional) The parameters to use to playback the tracks of the album.
     */
    public $playParams;

    /**
     * @var integer The number of tracks.
     */
    public $trackCount;

    /**
     * @var string The URL for sharing an album in the iTunes Store.
     */
    public $url;

    /**
     * @var array The artists associated with the album.
     */
    public $artists = [];

    /**
     * @var array The genres for the album.
     */
    public $genres = [];

    /**
     * @var array The songs and music videos on the album.
     */
    public $songs = [];

    public function attributes($data)
    {
        $this->artistName = $data['artistName'];
        $this->artwork = new Artwork($data['artwork']);
        $this->copyright = $data['copyright'];
        $this->genreNames = $data['genreNames'];
        $this->isComplete = $data['isComplete'];
        $this->isSingle = $data['isSingle'];
        $this->name = $data['name'];
        $this->releaseDate = $data['releaseDate'];
        $this->trackCount = $data['trackCount'];
        $this->url = $data['url'];

        if (isset($data['contentRating'])) {
            $this->contentRating = $data['contentRating'];
        }

        if (isset($data['editorialNotes'])) {
            $this->editorialNotes = new EditorialNotes($data['editorialNotes']);
        }

        if (isset($data['playParams'])) {
            $this->playParams = new PlayParameters($data['playParams']);
        }
    }

    public function relationships($data)
    {
        if (isset($data['artists'])) {
            foreach ($data['artists']['data'] as $artist) {
                $this->artists[] = new Artist($artist);
            }
        }

        if (isset($data['tracks'])) {
            foreach ($data['tracks']['data'] as $track) {
                $this->songs[] = new Song($track);
            }
        }

        if (isset($data['genres'])) {
            foreach ($data['genres']['data'] as $genre) {
                $this->genres[] = new Genre($genre);
            }
        }
    }
}