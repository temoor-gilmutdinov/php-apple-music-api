<?php

namespace Seriy\AppleMusicApi\ResourceObjects;


use Seriy\AppleMusicApi\AbstractObject;

class Station extends AbstractObject
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

}