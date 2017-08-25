<?php

namespace AppleMusic;


class Error
{
    /**
     * @var string A unique identifier for this occurrence of the error.
     */
    public $id;

    /**
     * @var string A link to more information about this occurrence.
     */
    public $about;

    /**
     * @var string The HTTP status code for this problem.
     */
    public $status;

    /**
     * @var string The code for this error
     */
    public $code;

    /**
     * @var string A short description of the problem that may be localized.
     */
    public $title;

    /**
     * @var string A long description of the problem that may be localized.
     */
    public $detail;

    public function __construct($data)
    {
        $this->id = $data['id'];

        if (isset($data['about'])) {
            $this->about = $data['about'];
        }

        if (isset($data['status'])) {
            $this->status = $data['status'];
        }

        if (isset($data['code'])) {
            $this->code = $data['code'];
        }

        if (isset($data['title'])) {
            $this->title = $data['title'];
        }

        if (isset($data['detail'])) {
            $this->detail = $data['detail'];
        }
    }
}