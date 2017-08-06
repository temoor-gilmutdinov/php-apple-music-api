<?php

namespace Seriy\AppleMusicApi\ResourceObjects;


use Seriy\AppleMusicApi\AbstractObject;

class Recommendation extends AbstractObject
{

    public $attributes;
    public $id;
    public $next;
    public $href;
    public $relationships;
    public $type;

    //todo много параметров, только смотреть
}