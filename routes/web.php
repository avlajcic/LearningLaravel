<?php
URL::forceScheme("https");
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

  Route::post('/article/search', 'BlogController@search');
  Route::get('/article/{id}', 'BlogController@show')->name('article');
  Route::get('/deleteArticle/{id}', 'BlogController@destroy')->name('deleteArticle');
  Route::post('/comment', 'CommentsController@store')->name('storeComment');
});

  Route::get('/uhp', 'UhpController@index');
  Route::post('/uhp', 'UhpController@solve')->name('solveUhpTask');

// ----TO DO ROUTES----
Route::group(['prefix' => 'todo'], function () {

  Route::get('/', 'TodoController@index')->name('todoIndex');
  Route::post('/create', 'TodoController@store')->name('addTask');
  Route::post('/register', 'Auth\RegisterController@register')->name('register');
  Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
  Route::post('/login', 'Auth\LoginController@login')->name('login');
});
//Auth::routes();
