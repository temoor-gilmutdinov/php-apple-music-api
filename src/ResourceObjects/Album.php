<?php

namespace AppleMusic\ResourceObjects;


class Album
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

    // todo artists, genres, tracks Relationships

    public function __construct($content)
    {
        $this->artistName = $content['artistName'];
        $this->artwork = new Artwork($content['artwork']);
        $this->contentRating = $content['contentRating'];
        $this->copyright = $content['copyright'];
        $this->editorialNotes = new EditorialNotes($content['editorialNotes']);
        $this->genreNames = $content['genreNames'];
        $this->isComplete = $content['isComplete'];
        $this->isSingle = $content['isSingle'];
        $this->name = $content['name'];
        $this->releaseDate = $content['releaseDate'];
        $this->playParams = new PlayParameters($content['playParams']);
        $this->trackCount = $content['trackCount'];
        $this->url = $content['url'];
    }
}