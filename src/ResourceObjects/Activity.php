<?php

namespace AppleMusic\ResourceObjects;


class Activity extends Resource
{
    /**
     * @var Artwork The activity artwork.
     */
    public $artwork;

    /**
     * @var EditorialNotes (Optional) The notes about the activity that appear in the iTunes Store.
     */
    public $editorialNotes;

    /**
     * @var string The localized name of the activity.
     */
    public $name;

    /**
     * @var string The URL for sharing an activity in the iTunes Store.
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