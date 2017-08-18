<?php

namespace AppleMusic\ResourceObjects;


class Genre
{
    /**
     * @var string The localized name of the genre.
     */
    public $name;

    public function __construct($content)
    {
        $this->name = $content['name'];
    }
}