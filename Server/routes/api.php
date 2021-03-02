<?php

use Illuminate\Support\Facades\Route;

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

/* auth */
Route::post('register', 'RegisterController@register')->name('register');
Route::post('login', 'LoginController@login')->name('login');
Route::post('logout', 'LoginController@logout')->name('logout');
/* auth */

/* profile */
Route::resource('profiles','ProfileController')->except(['create', 'edit','index',]);
/* profile */

/* content */
Route::resource('contents', 'ContentController')->except(['create', 'edit',]);
/* content */

/* search */
Route::get('search', 'SearchController@search')->name('search');
/* search */

/* rating */
Route::resource('contents.ratings', 'RatingController')->only(['index', 'store', 'update',]);
/* rating */

/* comments */
Route::resource('contents.genres', "GenreController")->except(['create', 'edit',]);
/* comments */

Route::resource('profiles.favorites', 'FavoritesController')->except(['create', 'edit', 'show', 'update',]);

/* friends */
//Route::resource('friends', 'FriendController');
/* friends */

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
