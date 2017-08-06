<?php

namespace Seriy\AppleMusicApi;


class Client
{
    private $_api_url = 'https://api.music.apple.com/v1/';
    private $_access_token;
    private $_storefront;
    private $_localization;

    /**
     * @param $access_token
     * @param $storefront
     * @param null $localization
     */
    public function __construct($access_token, $storefront = null, $localization = null)
    {
        $this->_access_token = $access_token;
        $this->_storefront = $storefront ? $storefront : 'us';

        $this->setLocalization($localization);
    }

    /**
     * @param $access_token
     */
    public function setAccessToken($access_token)
    {
        $this->_access_token = $access_token;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->_access_token;
    }

    /**
     * @param $storefront
     */
    public function setStorefront($storefront)
    {
        $this->_storefront = $storefront;
    }

    /**
     * @return string
     */
    public function getStorefront()
    {
        return $this->_storefront;
    }

    /**
     * @param $localization
     */
    public function setLocalization($localization)
    {
        if (empty($localization))
            return null;

        if (array_key_exists($localization, LanguageCodes::$languages))
            $this->_localization = $localization;
        else
            throw new \Exception('Unknown localization. Available languages see in "LanguageCodes.php"');
    }

    /**
     * @return string
     */
    public function getLocalization()
    {
        return $this->_localization;
    }

    /**
     * @return mixed
     */
    public function storefronts()
    {
        return $this->get('storefronts');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function storefront($id)
    {
        return $this->multiple('storefronts', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function album($id)
    {
        return $this->multiple('catalog/{storefront}/albums', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function musicVideo($id)
    {
        return $this->multiple('catalog/{storefront}/music-videos', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function playlist($id)
    {
        return $this->multiple('catalog/{storefront}/playlists', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function song($id)
    {
        return $this->multiple('catalog/{storefront}/songs', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function station($id)
    {
        return $this->multiple('catalog/{storefront}/stations', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function artist($id)
    {
        return $this->multiple('catalog/{storefront}/artists', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function curator($id)
    {
        return $this->multiple('catalog/{storefront}/curators', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function activity($id)
    {
        return $this->multiple('catalog/{storefront}/activities', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function appleCurator($id)
    {
        return $this->multiple('catalog/{storefront}/apple-curators', $id);
    }

    /**
     * @param $types
     * @return mixed
     */
    public function charts($types)
    {
        return $this->get('catalog/{storefront}/charts', ['types' => $types]);
    }

    /**
     * @return mixed
     */
    public function genres()
    {
        return $this->get('catalog/{storefront}/genres');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function genre($id)
    {
        return $this->multiple('catalog/{storefront}/genres', $id);
    }

    /**
     * @param $term
     * @return mixed
     */
    public function search($term)
    {
        return $this->get('catalog/{storefront}/search', [
            'term' => urlencode($term)
        ]);
    }

    /**
     * @param $term
     * @return mixed
     */
    public function searchHints($term)
    {
        return $this->get('catalog/{storefront}/search/hints', [
            'term' => urlencode($term)
        ]);
    }

    /**
     * @param $method
     * @param $id
     * @param array $params
     * @return mixed
     */
    protected function multiple($method, $id, $params = [])
    {
        if (is_array($id)) {
            $params['ids'] = $id;

            return $this->get($method, $params);
        } else
            return $this->get($method . '/' . $id, $params);
    }

    /**
     * @param $method
     * @param array $params
     * @return mixed
     */
    protected function get($method, $params = [])
    {
        $url = $this->_api_url . $method;

        $url = strtr($url, [
            '{storefront}' => $this->_storefront
        ]);

        if ($this->_localization)
            $params['l'] = $this->_localization;

        if ($params) {
            $url = $url . '?' . http_build_query($params);
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->_access_token
        ]);

        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data);
    }
}