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

    public function __construct($content)
    {
        $this->artwork = new Artwork($content['artwork']);
        $this->name = $content['name'];
        $this->url = $content['url'];

        if(isset($content['editorialNotes'])) {
            $this->editorialNotes = new EditorialNotes($content['editorialNotes']);
        }
    }
}