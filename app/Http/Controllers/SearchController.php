<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantSearchRequest;
use App\Models\Restaurant;
use App\Services\SearchResult;
use Illuminate\Support\Facades\Request;

class SearchController extends Controller
{
    public function index()
    {
        //
    }

    public function result(RestaurantSearchRequest $request)
    {
        $result = SearchResult::search($request,'50');

        $restaurants = new Restaurant();
        foreach ($result['rest'] as $rest){
            $category_name = $rest['code']['category_name_s'][0];

            $restaurants->updateOrCreate(
                ['restaurant_id' => $rest['id']],
                ['name' => $rest['name'], 'name_kana' => $rest['name_kana'], 'category' => $rest['category'], 'url' => $rest['url'], 'shop_image1' => $rest['image_url']['shop_image1'], 'shop_image2' => $rest['image_url']['shop_image2'], 'address' => $rest['address'], 'telephone' => $rest['tel'], 'open_time' => $rest['opentime'], 'holiday' => $rest['holiday'], 'line' => $rest['access']['line'], 'station' => $rest['access']['station'], 'station_exit' => $rest['access']['station_exit'], 'walk' => $rest['access']['walk'], 'pr_short' => $rest['pr']['pr_short'], 'pr_long' => $rest['pr']['pr_long'], 'category_name' => $category_name, 'budget' => $rest['budget']]
            );
        }

        return view('search.result', compact('result'));
    }

    public function details($rest_id)
    {
        $query = Restaurant::query()
            ->where('restaurant_id', $rest_id)
            ->firstOrFail();
        $data = $query;

        return view('search.details', compact('data'));
    }
}