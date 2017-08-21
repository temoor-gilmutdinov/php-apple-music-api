<?php

namespace AppleMusic\ResourceObjects;


class Artist extends Resource
{
    /**
     * @var array The names of the genres associated with this artist.
     */
    public $genreNames;

    /**
     * @var EditorialNotes (Optional) The notes about the artist that appear in the iTunes Store.
     */
    public $editorialNotes;

    /**
     * @var string The localized name of the artist.
     */
    public $name;

    /**
     * @var string The URL for sharing an artist in the iTunes Store.
     */
    public $url;

    /**
     * @var array The albums associated with the artist.
     */
    public $albums = [];

    /**
     * @var array The genres associated with the artist.
     */
    public $genres = [];

    /**
     * @var array The music videos associated with the artist.
     */
    public $musicVideos = [];

    /**
     * @var array The playlists associated with the artist.
     */
    public $playlists = [];

    public function attributes($data)
    {
        $this->genreNames = $data['genreNames'];
        $this->name = $data['name'];
        $this->url = $data['url'];

        if (isset($data['editorialNotes'])) {
            $this->editorialNotes = new EditorialNotes($data['editorialNotes']);
        }
    }

    public function relationships($data)
    {
        if (isset($data['albums'])) {
            foreach ($data['albums']['data'] as $album) {
                $this->albums[] = new Album($album);
            }
        }

        if (isset($data['genres'])) {
            foreach ($data['genres']['data'] as $genre) {
                $this->genres[] = new Genre($genre);
            }
        }

        if (isset($data['music-videos'])) {
            foreach ($data['music-videos']['data'] as $musicVideo) {
                $this->musicVideos[] = new MusicVideo($musicVideo);
            }
        }

        if (isset($data['playlists'])) {
            foreach ($data['playlists']['data'] as $artist) {
                $this->playlists[] = new Playlist($artist);
            }
        }
    }
}