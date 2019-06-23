<?php

namespace App\Services;

use GuzzleHttp\Client;

class SearchResult
{
    public function __construct()
    {
        //
    }

    public static function search($request, $pagination_interval)
    {
        // dd(config('service.gws.key'));
        $params = array(
            'keyid' => config('services.gws.key'),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'range' => $request->range,
            'hit_per_page' => $pagination_interval,
        );

        $base_url = 'https://api.gnavi.co.jp/RestSearchAPI/v3/';
        $uri = $base_url . '?' . http_build_query($params);
        // dd($uri);

        // Guzzle for getting api
        $client = new Client();
        $response = $client->request('GET', $uri);
        $json = $response->getBody()->getContents();

        $result = json_decode($json, true);

        return $result;
    }
}