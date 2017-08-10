<?php

namespace AppleMusic\CoreObjects;


class Relationship
{
    /**
     * @var array One or more destination objects.
     */
    public $data;

    /**
     * @var string A URL subpath that fetches the resource as the primary object. This member is only present in responses.
     */
    public $href;

    /**
     * @var string Information about the request or response. The members may be any of the endpoint parameters.
     */
    public $meta;

    /**
     * @var string Link to the next page of resources in the relationship. Contains the offset query parameter that specifies the
     */
    public $next;

}