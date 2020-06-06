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
Route::get('/getID', 'UserController@getID')->name('getID');
Route::get('/getFollowers', 'UserController@getFollowers')->name('getFollowers');

Route::post('/updateBio','UserController@changeBio');
Route::post('/updatePFP','UserController@changePFP');
Route::post('/follow','UserController@follow');
