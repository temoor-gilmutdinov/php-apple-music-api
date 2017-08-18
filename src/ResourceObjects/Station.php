<?php

namespace AppleMusic\ResourceObjects;


class Station
{
    /**
     * @var Artwork The radio station artwork.
     */
    public $artwork;

    /**
     * @var integer (Optional) The duration of the stream. Not emitted for 'live' or programmed stations.
     */
    public $durationInMillis;

    /**
     * @var EditorialNotes (Optional) The notes about the station that appear in Apple Music.
     */
    public $editorialNotes;

    /**
     * @var integer (Optional) The episode number of the station. Only emitted when the station represents an episode of a show or other content.
     */
    public $episodeNumber;

    /**
     * @var boolean Indicates whether the station is a live stream.
     */
    public $isLive;

    /**
     * @var string The localized name of the station.
     */
    public $name;

    /**
     * @var string The URL for sharing a station in Apple Music.
     */
    public $url;

    public function __construct($content)
    {
        $this->artwork = new Artwork($content['artwork']);
        $this->isLive = $content['isLive'];
        $this->name = $content['name'];
        $this->url = $content['url'];

        if(isset($content['durationInMillis'])) {
            $this->durationInMillis = $content['durationInMillis'];
        }

        if(isset($content['editorialNotes'])) {
            $this->editorialNotes = new EditorialNotes($content['editorialNotes']);
        }

        if(isset($content['episodeNumber'])) {
            $this->episodeNumber = $content['episodeNumber'];
        }
    }

}