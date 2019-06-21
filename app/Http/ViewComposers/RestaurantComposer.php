<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Requests\RestaurantSearchRequest;

class RestaurantComposer
{
    /** @var RestaurantSearchRequest  */
    private $request;

    public function __construct(RestaurantSearchRequest $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $form = [];
        foreach (RestaurantSearchRequest::Fields as $key){
            $form[$key] = $this->request->get($key, session()->get("search", ''));
            session()->flash("search.".$key, $form[$key]);
        }

        $distance_list = RestaurantSearchRequest::RANGE;

        $data = compact('distance_list', 'form');

        $view->with($data);
    }
}