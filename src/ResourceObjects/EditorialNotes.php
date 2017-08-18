<?php

namespace AppleMusic\ResourceObjects;


class EditorialNotes
{
    /**
     * @var string Notes shown when the content is being prominently displayed.
     */
    public $standard;

    /**
     * @var string Abbreviated notes shown in-line or when the content is shown alongside other content.
     */
    public $short;

    public function __construct($content)
    {
        $this->standard = $content['standard'];
        $this->short = $content['short'];
    }
}