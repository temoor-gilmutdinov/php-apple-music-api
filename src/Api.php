<?php

namespace AppleMusic;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

abstract class Api
{
    const API_VERSION = 'v1';
    const API_URL = 'https://api.music.apple.com';

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $storefront;

    /**
     * @var string
     */
    private $localization;

    /**
     * @var array raw response
     */
    private $result = [];

    /**
     * @return array
     */
    public function __toString()
    {
        return $this->result;
    }

    public function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
        $this->storefront = 'us';
    }

    /**
     * @return string
     */
    public function getStorefront()
    {
        return $this->storefront;
    }

    /**
     * @param $storefront
     */
    public function setStorefront($storefront)
    {
        $this->storefront = $storefront;
    }

    /**
     * @return string
     */
    public function getLocalization()
    {
        return $this->localization;
    }

    /**
     * @param $localization
     */
    public function setLocalization($localization)
    {
        $this->localization = $localization;
    }

    /**
     * @param $path
     * @param $id
     * @param $entity
     * @param array $params
     * @return array|null|string
     */
    public function multiple($path, $id, $entity, $params = [])
    {
        if (is_array($id)) {
            $params['ids'] = implode(',', $id);

            return $this->request($path, $params, $entity, true);
        } else {
            return $this->request($path . '/' . $id, $params, $entity);
        }
    }

    /**
     * @param $path
     * @param $params
     * @param $entity
     * @param bool $multiple
     * @return array|null|string
     */
    protected function request($path, $params, $entity, $multiple = false)
    {
        try {
            $response = $this->httpGet($path, $params);

            return $this->response($response, $entity, $multiple);
        } catch (RequestException $exception) {
            return $this->handleErrors($exception);
        }
    }

    /**
     * @param RequestException $exception
     * @return Error
     */
    protected function handleErrors(RequestException $exception)
    {
        $contents = $exception->getResponse()->getBody()->getContents();

        $result = json_decode($contents, true);

        return new Error($result['errors'][0]);
    }

    /**
     * @param ResponseInterface $response
     * @param $entity
     * @param bool $multiple
     * @return array|null
     */
    protected function response(ResponseInterface $response, $entity, $multiple = false)
    {
        $contents = $response->getBody()->getContents();

        $this->result = json_decode($contents, true);

        if ($multiple) {
            $data = [];

            foreach ($this->result['data'] as $item) {
                $data[] = new $entity($item);
            }
        } elseif (isset($this->result['results'])) {
            $data = new $entity($this->result['results']);
        } else {
            $data = new $entity($this->result['data'][0]);
        }

        return $data;
    }

    /**
     * @param $path
     * @param array $params
     * @return mixed|ResponseInterface
     */
    protected function httpGet($path, array $params = [])
    {
        if ($this->localization) {
            $params['l'] = $this->localization;
        }

        $params = array_filter($params);
        if (count($params) > 0) {
            $path .= '?' . http_build_query($params);
        }

        $path = strtr($path, [
            '{storefront}' => $this->storefront
        ]);

        return $this->httpClient->request('GET', $path);
    }
}