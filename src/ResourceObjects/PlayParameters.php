<?php

namespace Seriy\AppleMusicApi\ResourceObjects;


use Seriy\AppleMusicApi\AbstractObject;

class PlayParameters extends AbstractObject
{
    /**
     * @var string The ID of the content to use for playback.
     */
    public $id;

    /**
     * @var string The kind of the content to use for playback.
     */
    public $kind;

}