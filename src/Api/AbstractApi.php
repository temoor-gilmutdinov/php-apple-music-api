<?php

namespace AppleMusic\Api;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use AppleMusic\Hydrator;

abstract class AbstractApi
{
    const API_VERSION = 'v1';
    const API_URL = 'https://api.music.apple.com';

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var Hydrator|null
     */
    private $hydrator;

    public function __construct($httpClient, $hydrator)
    {
        $this->httpClient = $httpClient;
        $this->hydrator = $hydrator;
    }

    /**
     * @param $path
     * @param array $params
     * @return mixed|ResponseInterface
     */
    protected function requestWithStorefront($path, $params = [])
    {
        $url = strtr($path, [
            '{storefront}' => 'us'
        ]);

        // todo storefront

        return $this->httpGet($url, $params);
    }

    /**
     * @param $path
     * @param $id
     * @param array $params
     * @return mixed|ResponseInterface
     */
    protected function multipleRequestWithStorefront($path, $id, $params = [])
    {
        if (is_array($id)) {
            $params['ids'] = $id;

            return $this->httpGet($path, $params);
        } else
            return $this->httpGet($path . '/' . $id, $params);
    }

    /**
     * @param ResponseInterface $response
     * @param $entity
     * @return mixed|ResponseInterface
     */
    protected function hydrateResponse(ResponseInterface $response, $entity)
    {
        if (!$this->hydrator) {
            return $response;
        }

        if ($response->getStatusCode() !== 200 && $response->getStatusCode() !== 201) {
//            $this->handleErrors($response);

            // todo handle errors
        }

        return $this->hydrator->hydrate($response, $entity);
    }

    /**
     * @param array $params
     * @return array
     */
    protected function prepareParams($params = [])
    {
        $result = [];
        foreach ($params as $param => $value) {
            if (!is_null($value)) {
                $result[$param] = $value;
            }
        }

        return $result;
    }

    /**
     * @param $path
     * @param array $parameters
     * @return mixed|ResponseInterface
     */
    protected function httpGet($path, array $parameters = [])
    {
        if (count($parameters) > 0) {
            $path .= '?' . http_build_query($parameters);
        }

        return $this->httpClient->request('GET', $path);
    }
}