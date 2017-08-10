<?php

namespace AppleMusic\Api;


class Search extends AbstractApi
{
    /**
     * @param $term
     * @param null $types
     * @param null $limit
     * @param null $offset
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function query($term, $types = null, $limit = null, $offset = null)
    {
        $params = $this->prepareParams([
            'term' => urlencode($term),
            'types' => $types,
            'limit' => $limit,
            'offset' => $offset,
        ]);

        return $this->requestWithStorefront('catalog/{storefront}/search', $params);
    }

    /**
     * @param $term
     * @param null $types
     * @param null $limit
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function hints($term, $types = null, $limit = null)
    {
        $params = $this->prepareParams([
            'term' => urlencode($term),
            'types' => $types,
            'limit' => $limit
        ]);

        return $this->requestWithStorefront('catalog/{storefront}/search/hints', $params);
    }

}