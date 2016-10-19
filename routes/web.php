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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/review', 'ReviewController@showReviewForm')->middleware('auth');
Route::post('/review', 'ReviewController@review')->middleware('auth');

Route::get('/bares', 'BarController@showList');
Route::get('/bar/{slug}', 'BarController@showBar');
Route::get('/bares/cercanos', 'BarController@getNearby');

Route::get('/cervezas', 'BeerController@showList');
Route::get('/cerveza/{slug}', 'BeerController@showBeer');

Route::get('/fabricacion', function () {
    return view('manufactoring');
});


// Route::get('/post', 'PageController@postForm')->middleware('auth');
