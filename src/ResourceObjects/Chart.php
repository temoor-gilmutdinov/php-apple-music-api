<?php

namespace AppleMusic\ResourceObjects;


class Chart
{
    /**
     * @var string The localized name for the chart.
     */
    public $name;

    /**
     * @var string The chart identifier.
     */
    public $chart;

    /**
     * @var string The URL for the chart.
     */
    public $href;

    /**
     * @var mixed An array of the objects that were requested ordered by popularity. For example, if songs were specified as the chart type in the request, the array contains Song objects.
     */
    public $data;

    /**
     * @var string (Optional) The URL for the next page.
     */
    public $next;

    public function __construct($content)
    {
        $this->name = $content['name'];
        $this->chart = $content['chart'];
        $this->href = $content['href'];
        $this->data = $content['data'];
        $this->next = $content['next'];
    }
}