<?php

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

Route::get('/', function () {
    return view('homepage');
})->name("homepage");

// ----BLOG ROUTES----
Route::group(['prefix' => 'blog'], function () {

  Route::get('/', 'BlogController@index');
  Route::post('/', 'BlogController@store');

  Route::get('/writepost', 'BlogController@new');
  Route::get('/{id}', 'BlogController@show');
});
