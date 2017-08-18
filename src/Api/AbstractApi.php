<?php

namespace AppleMusic\Api;


use AppleMusic\CoreObjects\Resource;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractApi
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
     * @return array|null
     */
    public function multiple($path, $id, $entity)
    {
        if (is_array($id)) {
            $ids = implode(',', $id);

            return $this->request($path, ['ids' => $ids], $entity, true);
        } else {
            return $this->request($path . '/' . $id, [], $entity);
        }
    }

    /**
     * @param $path
     * @param $params
     * @param $entity
     * @param $multiple
     * @return array|null
     */
    protected function request($path, $params, $entity, $multiple = false)
    {
        $response = $this->httpGet($path, $params);

        return $this->response($response, $entity, $multiple);
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

        $result = json_decode($contents, true);

        $data = null;

        if ($multiple) {
            $data = [];

            if( isset($result['data'])) {
                foreach ($result['data'] as $item) {
                    $object = new Resource($item);
                    $object->attributes = new $entity($item['attributes']);

                    $data[] = $object;
                }
            } elseif (isset($result['results'])) {

                // todo везде data, а в charts - results
                // todo разобраться с чартами

                print_r($result);
                die;
            }
        } else {
            $data = new Resource($result['data'][0]);
            $data->attributes = new $entity($result['data'][0]['attributes']);
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