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
     * @var Hydrator
     */
    protected $hydrator;

    /**
     * @param Client $httpClient
     * @param Hydrator|null $hydrator
     */
    public function __construct(Client $httpClient, Hydrator $hydrator = null)
    {
        $this->httpClient = $httpClient;
        $this->hydrator = $hydrator;
    }

    /**
     * @param $token
     * @param Hydrator|null $hydrator
     * @return Api
     */
    public static function create($token, Hydrator $hydrator = null)
    {
        $configurator = new Configuration();
        $configurator->setToken($token);

        return self::configure($configurator, $hydrator);
    }

    /**
     * @param Configuration $configurator
     * @param Hydrator|null $hydrator
     * @return Api
     */
    public static function configure(Configuration $configurator, Hydrator $hydrator = null)
    {
        return new self($configurator->createClient(), $hydrator);
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
        return new Api\Storefronts($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Albums
     */
    public function albums()
    {
        return new Api\Albums($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\MusicVideos
     */
    public function musicVideos()
    {
        return new Api\MusicVideos($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Playlists
     */
    public function playlists()
    {
        return new Api\Playlists($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Songs
     */
    public function songs()
    {
        return new Api\Songs($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Stations
     */
    public function stations()
    {
        return new Api\Stations($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Artists
     */
    public function artists()
    {
        return new Api\Artists($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Curators
     */
    public function curators()
    {
        return new Api\Curators($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Activities
     */
    public function activities()
    {
        return new Api\Activities($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\AppleCurators
     */
    public function appleCurators()
    {
        return new Api\AppleCurators($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Charts
     */
    public function charts()
    {
        return new Api\Charts($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Genres
     */
    public function genres()
    {
        return new Api\Genres($this->httpClient, $this->hydrator);
    }

    /**
     * @return Api\Search
     */
    public function search()
    {
        return new Api\Search($this->httpClient, $this->hydrator);
    }
}