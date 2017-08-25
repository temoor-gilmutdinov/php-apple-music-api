<?php

namespace AppleMusic\Resources;


use AppleMusic\Resource;

class Storefront extends Resource
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

    public function attributes($data)
    {
        $this->name = $data['name'];
        $this->supportedLanguageTags = $data['supportedLanguageTags'];
        $this->defaultLanguageTag = $data['defaultLanguageTag'];
    }
}