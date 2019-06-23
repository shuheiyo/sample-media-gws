<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantSearchRequest;
use App\Services\SearchResult;

class SearchController extends Controller
{
    public function index()
    {
        //
    }

    public function result(RestaurantSearchRequest $request)
    {
        // dd($request->range, $request->latitude, $request->longitude);
        $result = SearchResult::search($request,'50');

        return view('search.result', compact('result'));
    }
}