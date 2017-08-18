<?php

namespace AppleMusic\ResourceObjects;


class Storefront
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

    public function __construct($content)
    {
        $this->name = $content['name'];
        $this->supportedLanguageTags = $content['supportedLanguageTags'];
        $this->defaultLanguageTag = $content['defaultLanguageTag'];
    }
}