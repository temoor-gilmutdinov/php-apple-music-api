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

    public function __construct($data)
    {
        $this->width = $data['width'];
        $this->height = $data['height'];
        $this->url = $data['url'];

        if (isset($data['bgColor'])) {
            $this->bgColor = $data['bgColor'];
        }

        if (isset($data['textColor1'])) {
            $this->textColor1 = $data['textColor1'];
        }

        if (isset($data['textColor2'])) {
            $this->textColor2 = $data['textColor2'];
        }

        if (isset($data['textColor3'])) {
            $this->textColor3 = $data['textColor3'];
        }

        if (isset($data['textColor4'])) {
            $this->textColor4 = $data['textColor4'];
        }
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