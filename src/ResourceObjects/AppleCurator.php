<?php

namespace AppleMusic\ResourceObjects;


class AppleCurator extends Resource
{
    /**
     * @var Artwork The curator artwork.
     */
    public $artwork;

    /**
     * @var EditorialNotes (Optional) The notes about the curator that appear in the iTunes Store.
     */
    public $editorialNotes;

    /**
     * @var string The localized name of the curator.
     */
    public $name;

    /**
     * @var string The playlists associated with this curator.
     */
    public $url;

    /**
     * @var array The playlists associated with this activity.
     */
    public $playlists = [];

    public function attributes($data)
    {
        $this->artwork = new Artwork($data['artwork']);
        $this->name = $data['name'];
        $this->url = $data['url'];

        if (isset($data['editorialNotes'])) {
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