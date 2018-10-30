<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['uses' => 'PageController@index', 'as' => 'pages.index']);
Route::post('pages', ['uses' => 'PageController@setData', 'as' => 'pages.setData']);
Route::post('convert', ['uses' => 'PageController@convert', 'as' => 'convert.data']);
Route::get('pages', ['uses' => 'PageController@chart', 'as' => 'pages.chart']);