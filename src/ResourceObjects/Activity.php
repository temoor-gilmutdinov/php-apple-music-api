<?php

namespace Seriy\AppleMusicApi\ResourceObjects;


use Seriy\AppleMusicApi\AbstractObject;

class Activity extends AbstractObject
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

    // todo have a Relationships

}