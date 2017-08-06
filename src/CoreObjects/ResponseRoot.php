<?php

namespace Seriy\AppleMusicApi\CoreObjects;


class ResponseRoot
{
    /**
     * @var null|Resource The primary data for a request or response. If data exists, an array of one or more resource objects. If no data exists, an empty array or null.
     */
    public $data;

    /**
     * @var array The results of the operation. If there are results, the object contains contents; otherwise, it is empty or null.
     */
    public $results;

    /**
     * @var array An array of one or more errors that occurred executing the operation.
     */
    public $errors;

    /**
     * @var array Information about the request or response. The members may be any of the endpoint parameters.
     */
    public $meta;

    /**
     * @var string Link to the next page of data or results. Contains the offset query parameter that specifies the next page.
     */
    public $next;

    /**
     * @var string Link to the request that generated the response data or results. Not present in a request.
     */
    public $href;

}