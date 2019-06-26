<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TopController@index')->name('top');

Route::name('restaurant.')->prefix('restaurant')->group(function (){
    Route::get('/search', 'SearchController@result')->name('search');
    Route::get('/details/{id}', 'SearchController@details')->name('details');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
