<?php

namespace App\Services;

use App\Http\Requests\RestaurantSearchRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchResult
{
    public function __construct()
    {
        //
    }

    public static function search(RestaurantSearchRequest $request, $pagination_interval)
    {
        if ($request->page && $request->page > 1) {
            $offset_num = ($request->page - 1) * $pagination_interval + 1;
        } else {
            $offset_num = 1;
        }

        $params = array(
            'keyid' => config('services.gws.key'),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'range' => $request->range,
            'offset' => $offset_num,
            'hit_per_page' => $pagination_interval,
        );

        $base_url = 'https://api.gnavi.co.jp/RestSearchAPI/v3/';
        $uri = $base_url . '?' . http_build_query($params);

        // Guzzle for getting api
        $client = new Client();
        $response = $client->request('GET', $uri);
        $json = $response->getBody()->getContents();

        $result = json_decode($json, true);

        $pagination = new LengthAwarePaginator($result['total_hit_count'], $result['total_hit_count'], $pagination_interval, $request->page, array('path' => $request->url()));
        $pagination = $pagination->appends($request->toArray())->links();
        $result['pagination'] = $pagination;

        return $result;
    }
}