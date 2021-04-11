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

/* content */
Route::resource('contents', 'ContentController')->except(['create', 'edit',]);
/* content */

/* search */
Route::get('search', 'SearchController@search')->name('search');
/* search */

/* comments */
Route::resource('contents.genres', "ContentGenreController")->only(['index',]);
Route::resource('genres', "GenreController")->only(['show', 'index',]);
/* comments */


/* friends */
//Route::resource('friends', 'FriendController');
/* friends */

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware([\App\Http\Middleware\LoggedInMiddleware::class])->group(function () {


    Route::resource('genres', "GenreController")->only(['store', 'update', 'destroy',]);
    Route::put('contents/{content}/genres', "ContentGenreController@update")->name('contents.genres.update');

    Route::get('test-login', 'LoginController@test');

    /* profile */
    Route::resource('profiles','ProfileController')->except(['create', 'edit','index',]);
    /* profile */

    /* favorites */
    Route::resource('profiles.favorites', 'FavoritesController')->except(['create', 'edit', 'show', 'update',]);
    /* favorites */

    /* rating */
    Route::resource('contents.ratings', 'RatingController')->only(['index', 'store', 'update',]);
    /* rating */
});