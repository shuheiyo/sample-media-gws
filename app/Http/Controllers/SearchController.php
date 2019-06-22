<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantSearchRequest;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        //
    }

    public function result(RestaurantSearchRequest $request)
    {
        dd($request->range, $request->latitude, $request->longitude);
        return view('search.result');
    }
}