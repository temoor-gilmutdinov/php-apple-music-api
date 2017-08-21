<?php

namespace AppleMusic\ResourceObjects;


class MusicVideo extends Resource
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

    /**
     * @var array The albums associated with the music video.
     */
    public $albums = [];

    /**
     * @var array The artists associated with the music video.
     */
    public $artists = [];

    /**
     * @var array The genres associated with the music video.
     */
    public $genres = [];

    public function attributes($data)
    {
        //todo не совпадают параметры

        $this->artistName = $data['artistName'];
        $this->artwork = new Artwork($data['artwork']);
        $this->genreNames = $data['genreNames'];
        $this->name = $data['name'];
        $this->releaseDate = $data['releaseDate'];
        $this->url = $data['url'];

        if(isset($data['contentRating'])) {
            $this->contentRating = $data['contentRating'];
        }

        if(isset($data['durationInMillis'])) {
            $this->durationInMillis = $data['durationInMillis'];
        }

        if(isset($data['editorialNotes'])) {
            $this->editorialNotes = new EditorialNotes($data['editorialNotes']);
        }

        if(isset($data['playParams'])) {
            $this->playParams = new PlayParameters($data['playParams']);
        }

        if(isset($data['trackNumber'])) {
            $this->trackNumber = $data['trackNumber'];
        }

        if(isset($data['videoSubType'])) {
            $this->videoSubType = $data['videoSubType'];
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