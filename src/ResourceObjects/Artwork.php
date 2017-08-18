<?php

namespace AppleMusic\ResourceObjects;


class Artwork
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

    public function __construct($content)
    {
        $this->width = $content['width'];
        $this->height = $content['height'];
        $this->url = $content['url'];
        $this->bgColor = $content['bgColor'];
        $this->textColor1 = $content['textColor1'];
        $this->textColor2 = $content['textColor2'];
        $this->textColor3 = $content['textColor3'];
        $this->textColor4 = $content['textColor4'];
    }

    /**
     * @param int $width
     * @param int $height
     * @return string
     */
    public function getUrl($width = 1080, $height = 1080)
    {
        return strtr($this->url, [
            '{w}' => $width,
            '{h}' => $height
        ]);
    }

    /**
     * @return string
     */
    public function getBgColor()
    {
        return '#' . $this->bgColor;
    }

    /**
     * @return string
     */
    public function getTextColor1()
    {
        return '#' . $this->textColor1;
    }

    /**
     * @return string
     */
    public function getTextColor2()
    {
        return '#' . $this->textColor2;
    }

    /**
     * @return string
     */
    public function getTextColor3()
    {
        return '#' . $this->textColor3;
    }

    /**
     * @return string
     */
    public function getTextColor4()
    {
        return '#' . $this->textColor4;
    }
}