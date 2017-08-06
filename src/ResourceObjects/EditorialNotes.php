<?php

namespace Seriy\AppleMusicApi\ResourceObjects;


use Seriy\AppleMusicApi\AbstractObject;

class EditorialNotes extends AbstractObject
{
    /**
     * @var string Notes shown when the content is being prominently displayed.
     */
    public $standard;

    /**
     * @var string Abbreviated notes shown in-line or when the content is shown alongside other content.
     */
    public $short;
}