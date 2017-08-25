<?php

namespace AppleMusic\Resources;


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

    public function __construct($data)
    {
        if (isset($data['standard'])) {
            $this->standard = $data['standard'];
        }

        if (isset($data['short'])) {
            $this->short = $data['short'];
        }
    }
}