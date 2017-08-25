<?php

namespace AppleMusic\Api;


use AppleMusic\Api;
use AppleMusic\Resources\SearchHint;
use AppleMusic\Resources\Search as SearchResponse;

class Search extends Api
{
    /**
     * @param $term
     * @param array $types
     * @param null $limit
     * @param null $offset
     * @return array|null
     */
    public function query($term, $types = [], $limit = null, $offset = null)
    {
        $params = [
            'term' => urlencode($term),
            'types' => implode(',', $types),
            'limit' => $limit,
            'offset' => $offset,
        ];

        return $this->request('catalog/{storefront}/search', $params, SearchResponse::class);
    }

    /**
     * @param $term
     * @param array $types
     * @param null $limit
     * @return array|null
     */
    public function hints($term, $types = [], $limit = null)
    {
        $params = [
            'term' => urlencode($term),
            'types' => implode(',', $types),
            'limit' => $limit
        ];

        return $this->request('catalog/{storefront}/search/hints', $params, SearchHint::class);
    }

}