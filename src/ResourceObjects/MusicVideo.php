<?php

namespace AppleMusic\ResourceObjects;


class MusicVideo
{
    /**
     * @var string The artist’s name.
     */
    public $artistName;

    /**
     * @var Artwork The artwork for the music video’s associated album.
     */
    public $artwork;

    /**
     * @var string (Optional) The RIAA rating of the content. The possible values for this rating are clean and explicit. No value means no rating.
     */
    public $contentRating;

    /**
     * @var integer (Optional) The duration of the music video in milliseconds.
     */
    public $durationInMillis;

    /**
     * @var EditorialNotes (Optional) The editorial notes for the music video.
     */
    public $editorialNotes;

    /**
     * @var array The music video’s associated genres.
     */
    public $genreNames;

    /**
     * @var string The localized name of the music video.
     */
    public $name;

    /**
     * @var PlayParameters (Optional) The parameters to use to playback the music video.
     */
    public $playParams;

    /**
     * @var string The release date of the music video in YYYY-MM-DD format.
     */
    public $releaseDate;

    /**
     * @var integer (Optional) The number of the music video in the album’s track list.
     */
    public $trackNumber;

    /**
     * @var string A clear url directly to the music video.
     */
    public $url;

    /**
     * @var string (Optional) The video subtype associated with the content.
     */
    public $videoSubType;

    //todo albums, artists, genres

    public function __construct($content)
    {
        //todo не совпадают параметры

        $this->artistName = $content['artistName'];
        $this->artwork = new Artwork($content['artwork']);
        $this->genreNames = $content['genreNames'];
        $this->name = $content['name'];
        $this->releaseDate = $content['releaseDate'];
        $this->url = $content['url'];

        if(isset($content['contentRating'])) {
            $this->contentRating = $content['contentRating'];
        }

        if(isset($content['durationInMillis'])) {
            $this->durationInMillis = $content['durationInMillis'];
        }

        if(isset($content['editorialNotes'])) {
            $this->editorialNotes = new EditorialNotes($content['editorialNotes']);
        }

        if(isset($content['playParams'])) {
            $this->playParams = new PlayParameters($content['playParams']);
        }

        if(isset($content['trackNumber'])) {
            $this->trackNumber = $content['trackNumber'];
        }

        if(isset($content['videoSubType'])) {
            $this->videoSubType = $content['videoSubType'];
        }

    }
}