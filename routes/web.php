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
    return view('welcome');
});

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function(){
        Route::post('follow','UserFollowController@store')->name('user.follow');
        Route::delete('unfollow','UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings','UsersController@followings')->name('user.followings');
        Route::get('followers','UsersController@followers')->name('user.followers');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    
});

Route::group(['prefix' => 'microposts/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        
    });
        
    Route::resource('users', 'UsersController', ['only' => ['edit', 'update', 'show', 'destroy']]);
    Route::resource('microposts', 'MicropostsController', ['only' => ['create','store', 'destroy','show','index']]);
    
    Route::get('followmicroposts', 'MicropostsController@followindex')->name('microposts.followindex');
    
    
    Route::get('search','SearchController@search')->name('search.search');
    Route::get('searchindex','SearchController@index')->name('search.searchindex');
    
});

Route::get('confirmation', 'UsersController@confirm')->name('user.confirm');

Route::get('test', function(){
   return view('test'); 
});