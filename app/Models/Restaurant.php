<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Restaurant extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'name_kana' => '',
        'category' => '',
        'url' => '',
        'shop_image1' => '',
        'shop_image2' => '',
        'address' => '',
        'telephone' => '',
        'open_time' => '',
        'holiday' => '',
        'line' => '',
        'station' => '',
        'station_exit' => '',
        'walk' => '',
        'pr_short' => '',
        'pr_long' => '',
        'category_name' => '',
        'budget' => '',
    ];
}
