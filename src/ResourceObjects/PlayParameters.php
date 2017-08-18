<?php

namespace AppleMusic\ResourceObjects;


class PlayParameters
{
    /**
     * @var string The ID of the content to use for playback.
     */
    public $id;

    /**
     * @var string The kind of the content to use for playback.
     */
    public $kind;

    public function __construct($content)
    {
        $this->id = $content['id'];
        $this->kind = $content['kind'];
    }
}