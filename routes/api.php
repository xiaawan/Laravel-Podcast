<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('podcasts/review', 'PodcastController@index')->defaults('status', 'review');
Route::get('podcasts/published', 'PodcastController@index')->defaults('status', 'published');
Route::get('podcasts/{id}', 'PodcastController@show');
Route::post('podcasts', 'PodcastController@store');
Route::put('podcasts/{podcast}', 'PodcastController@update');
Route::put('podcasts/approve/{id}', 'PodcastController@approve');
Route::delete('podcasts/{id}', 'PodcastController@delete');
