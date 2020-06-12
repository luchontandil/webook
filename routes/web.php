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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search/{username}', 'HomeController@search')->name('search');
Route::get('/profile/{username}', 'HomeController@profile')->name('profile');

Route::get('/user', 'UserController@user')->name('user');
Route::get('/getID', 'UserController@getID')->name('getID');
Route::get('/getFollowers', 'UserController@getFollowers')->name('getFollowers');
Route::get('/getFollowers/{username}', 'UserController@getFollowers')->name('getFollowers');
Route::get('/getFollowing', 'UserController@getFollowing')->name('getFollowing');
Route::get('/getFollowing/{username}', 'UserController@getFollowing')->name('getFollowing');
Route::get('/getPosts', 'UserController@getPosts')->name('getPosts');
Route::get('/getPosts/{username}', 'UserController@getPosts')->name('getPosts');

Route::post('/updateBio','UserController@changeBio');
Route::post('/updatePFP','UserController@changePFP');
Route::post('/follow','UserController@follow');
Route::post('/post','UserController@post');
Route::post('/comment','UserController@comment');
