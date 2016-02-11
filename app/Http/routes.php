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
Route::get('/', [
    'middleware' => 'auth',
    'uses' => 'admin\AdminController@index'
]);
Route::get('/home', [
    'middleware' => 'auth',
    'uses' => 'admin\AdminController@index'
]);
Route::get('/admin', [
    'middleware' => 'auth',
    'uses' => 'admin\AdminController@index'
]);
Route::resource('/api','MyAPI');
Route::resource('/UserTable','UserTableController');
Route::resource('/PictureTable','PictureTableController');
Route::resource('/UserPicture','UserPictureController');
Route::resource('UserTable.PictureTable' , 'PictureUserController');
Route::post('/PictureTable/{PictureID?}/Action/{action?}/{uid?}', 'PictureTableController@action');
Route::get('/PictureRank/TopRating/{type?}','PictureTableController@rating');
Route::get('/Pictures/getPictures','PictureTableController@getPictures');
Route::get('/Pictures/getAllPictures','PictureTableController@getAllPictures');
Route::get('/TestGallery','PictureTableController@testgallery');
Route::post('/FlagInApt','PictureUserController@reportImage');
Route::post('/UserTable/ChangeDistance','UserTableController@changeDistance');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//Route::get('admin', ['middleware' => 'auth', function() {
    // Only authenticated users may enter...
//	Route::get('admin', 'PageController@show');
//}]);
// Registration routes...
Route::get('admin/register', [
	'middleware' => 'auth',
'uses' => 'admin\AdminController@getRegister'
]);
Route::post('admin/register', [
'middleware' => 'auth',
'uses' => 'admin\AdminController@postRegister'
]);