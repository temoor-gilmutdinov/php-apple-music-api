<?php

namespace AppleMusic\ResourceObjects;


class Station extends Resource
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

    public function attributes($data)
    {
        $this->artwork = new Artwork($data['artwork']);
        $this->isLive = $data['isLive'];
        $this->name = $data['name'];
        $this->url = $data['url'];

        if(isset($data['durationInMillis'])) {
            $this->durationInMillis = $data['durationInMillis'];
        }

        if(isset($data['editorialNotes'])) {
            $this->editorialNotes = new EditorialNotes($data['editorialNotes']);
        }

        if(isset($data['episodeNumber'])) {
            $this->episodeNumber = $data['episodeNumber'];
        }
    }

}