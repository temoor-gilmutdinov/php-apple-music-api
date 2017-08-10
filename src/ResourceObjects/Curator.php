<?php

namespace AppleMusic\ResourceObjects;


class Curator
{
    /**
     * @var Artwork The curator artwork.
     */
    public $artwork;

    /**
     * @var EditorialNotes (Optional) The notes about the curator.
     */
    public $editorialNotes;

    /**
     * @var string The localized name of the curator.
     */
    public $name;

    /**
     * @var string The URL for sharing a curator in Apple Music.
     */
    public $url;

    //todo playlists relation
}