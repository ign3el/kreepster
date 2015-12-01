<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});


Route::resource('/api','MyAPI');
Route::resource('/UserTable','UserTableController');
Route::resource('/PictureTable','PictureTableController');
Route::resource('/UserPicture','UserPictureController');
Route::resource('UserTable.PictureTable' , 'PictureUserController');
Route::post('/PictureTable/{PictureID?}/Action/{action?}/{uid?}', 'PictureTableController@action');
Route::get('/PictureRank/TopRating/{type?}','PictureTableController@rating');
Route::get('/PictureTable/getPictures/{uid?}/{ulat?}/{ulong?}','PictureTableController@getPictures');
Route::get('/TestGallery','PictureTableController@testgallery');
Route::post('/FlagInApt','PictureUserController@reportImage');
Route::post('/UserTable/ChangeDistance','UserTableController@changeDistance');