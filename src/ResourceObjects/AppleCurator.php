<?php

namespace AppleMusic\ResourceObjects;


class AppleCurator
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
     * @var string The URL for sharing an curator in the iTunes Store.
     */
    public $url;

    //todo playlist relation
}