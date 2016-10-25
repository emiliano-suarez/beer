<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index');

    Auth::routes();

    // Reviews routes
    Route::get('/review', 'ReviewController@showReviewForm');
    Route::post('/review', 'ReviewController@review');
    // Route::get('/post', 'PageController@postForm')->middleware('auth');

    // Bars routes
    Route::get('/bares', 'BarController@showList');
    Route::get('/bar/{slug}', 'BarController@showBar');
    Route::get('/bares/cercanos', 'BarController@getNearby');

    // Beers routes
    Route::get('/cervezas', 'BeerController@showList');
    Route::get('/cerveza/{slug}', 'BeerController@showBeer');

    // Topics routes
    Route::get('/consultas', 'TopicController@getLastOnes');
    Route::post('/topic', 'TopicController@topic')->middleware('auth');

    // Manufactoring routes
    Route::get('/fabricacion', function () {
        return view('manufactoring');
    });

});
