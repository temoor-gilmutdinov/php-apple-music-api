<?php

namespace AppleMusic\Resources;


class SearchHint
{
    /**
     * @var array search hints
     */
    public $terms = [];

    public function __construct($data)
    {
        $this->terms = $data['terms'];
    }
}