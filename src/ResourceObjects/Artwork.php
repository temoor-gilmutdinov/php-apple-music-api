<?php

namespace Seriy\AppleMusicApi\ResourceObjects;


use Seriy\AppleMusicApi\AbstractObject;

class Artwork extends AbstractObject
{
    /**
     * @var integer The maximum width available for the image.
     */
    public $width;

    /**
     * @var integer The maximum height available for the image.
     */
    public $height;

    /**
     * @var string The URL to request the image asset. The image file name must be preceded by {w}x{h}, as placeholders for the width and height values described above (for example, {w}x{h}bb.jpg).
     */
    public $url;

    /**
     * @var string The average background color of the image.
     */
    public $bgColor;

    /**
     * @var string The primary text color that may be used if the background color is displayed.
     */
    public $textColor1;

    /**
     * @var string The secondary text color that may be used if the background color is displayed.
     */
    public $textColor2;

    /**
     * @var string The tertiary text color that may be used if the background color is displayed.
     */
    public $textColor3;

    /**
     * @var string The final post-tertiary text color that maybe be used if the background color is displayed.
     */
    public $textColor4;
}