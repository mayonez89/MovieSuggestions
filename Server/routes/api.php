<?php

use Illuminate\Http\Request;
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
Route::get('register', 'RegisterController@register')->name('register');
Route::post('register', 'RegisterController@registerAction')->name('registerAction');

Route::get('login', 'LoginController@login')->name('login');
Route::post('login', 'LoginController@loginAction')->name('loginAction');

Route::post('logout', 'LoginController@logoutAction')->name('logoutAction');
/* auth */

/* profile */
Route::get('profile/delete', 'ProfileController@delete')->name('deleteProfile');
Route::resource('profile','ProfileController')->except(['index']);
/* profile */

/* content */
Route::resource('content', 'ContentController')->except(['index']);
/* content */

/* search */
Route::get('search', 'SearchController@search')->name('search');
Route::get('search-action', 'SearchController@searchAction')->name('search-action');
/* search */

/* rating */
Route::get('rating/{content}', "RatingController@rating")->name('rating');
Route::post('rate/{content}', "RatingController@rate")->name('rate');
/* rating */

/* comments */
Route::get('comment/{content}', "CommentController@index")->name('comments');
Route::post('comment/{content}', 'CommentController@store')->name('comment.store');
/* comments */

/* friends */
Route::resource('friends', 'FriendController');
/* friends */

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
