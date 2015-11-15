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

Route::resource('/api','MyAPI');
Route::resource('/UserTable','UserTableController');
Route::resource('/PictureTable','PictureTableController');
Route::resource('/UserPicture','UserPictureController');
Route::resource('UserTable.PictureTable' , 'PictureUserController');