<?php

namespace Seriy\AppleMusicApi\ResourceObjects;


use Seriy\AppleMusicApi\AbstractObject;

class Storefront extends AbstractObject
{
    /**
     * @var string The localized name of the storefront.
     */
    public $name;

    /**
     * @var integer The numeric ID of the storefront.
     */
    public $storefrontId;

    /**
     * @var array The localizations that the storefront supports, represented as an array of language tags.
     */
    public $supportedLanguageTags;

    /**
     * @var array The default language for the storefront, represented as a language tag.
     */
    public $defaultLanguageTag;

}