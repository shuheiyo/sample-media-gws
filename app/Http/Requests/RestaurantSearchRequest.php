<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantSearchRequest extends FormRequest
{
    //検索範囲
    const RANGE_300 = '1';
    const RANGE_500 = '2';
    const RANGE_1000 = '3';
    const RANGE_2000 = '4';
    const RANGE_3000 = '5';

    public const RANGE = [
        self::RANGE_300 => '300m',
        self::RANGE_500 => '500m',
        self::RANGE_1000 => '1000m',
        self::RANGE_2000 => '2000m',
        self::RANGE_3000 => '3000m',
    ];

    const Fields = ['distance'];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
