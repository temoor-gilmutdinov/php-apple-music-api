<?php

namespace AppleMusic;

use GuzzleHttp\Client;

class Api
{
    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var
     */
    protected $logger;

    /**
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param $token
     * @return Api
     */
    public static function create($token)
    {
        $configurator = new Configuration();
        $configurator->setToken($token);

        return self::configure($configurator);
    }

    /**
     * @param Configuration $configurator
     * @return Api
     */
    public static function configure(Configuration $configurator)
    {
        return new self($configurator->createClient());
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @return Api\Storefronts
     */
    public function storefronts()
    {
        return new Api\Storefronts($this->httpClient);
    }

    /**
     * @return Api\Albums
     */
    public function albums()
    {
        return new Api\Albums($this->httpClient);
    }

    /**
     * @return Api\MusicVideos
     */
    public function musicVideos()
    {
        return new Api\MusicVideos($this->httpClient);
    }

    /**
     * @return Api\Playlists
     */
    public function playlists()
    {
        return new Api\Playlists($this->httpClient);
    }

    /**
     * @return Api\Songs
     */
    public function songs()
    {
        return new Api\Songs($this->httpClient);
    }

    /**
     * @return Api\Stations
     */
    public function stations()
    {
        return new Api\Stations($this->httpClient);
    }

    /**
     * @return Api\Artists
     */
    public function artists()
    {
        return new Api\Artists($this->httpClient);
    }

    /**
     * @return Api\Curators
     */
    public function curators()
    {
        return new Api\Curators($this->httpClient);
    }

    /**
     * @return Api\Activities
     */
    public function activities()
    {
        return new Api\Activities($this->httpClient);
    }

    /**
     * @return Api\AppleCurators
     */
    public function appleCurators()
    {
        return new Api\AppleCurators($this->httpClient);
    }

    /**
     * @return Api\Charts
     */
    public function charts()
    {
        return new Api\Charts($this->httpClient);
    }

    /**
     * @return Api\Genres
     */
    public function genres()
    {
        return new Api\Genres($this->httpClient);
    }

    /**
     * @return Api\Search
     */
    public function search()
    {
        return new Api\Search($this->httpClient);
    }
}