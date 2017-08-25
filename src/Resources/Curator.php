<?php

namespace AppleMusic\Resources;


use AppleMusic\Resource;

class Curator extends Resource
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

    /**
     * @var array The playlists associated with the curator.
     */
    public $playlists = [];

    public function attributes($data)
    {
        $this->artwork = new Artwork($data['artwork']);
        $this->name = $data['name'];
        $this->url = $data['url'];

        if(isset($data['editorialNotes'])) {
            $this->editorialNotes = new EditorialNotes($data['editorialNotes']);
        }
    }

    public function relationships($data)
    {
        if (isset($data['playlists'])) {
            foreach ($data['playlists']['data'] as $artist) {
                $this->playlists[] = new Playlist($artist);
            }
        }
    }
}