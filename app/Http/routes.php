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
//Route::resource('/admin/Images' , 'admin\ImagesController');

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

'uses' => 'admin\AdminController@getRegister'
]);
Route::post('admin/register', [

'uses' => 'admin\AdminController@postRegister'
]);
Route::get('/admin/Users/', [
    'middleware' => 'auth',
    'uses' => 'admin\UserController@index'
	
]);
Route::post('/admin/Users/', [
    'middleware' => 'auth',
    'uses' => 'admin\UserController@search'
]);
Route::get('/admin/Users/{UserId?}', [
    'middleware' => 'auth',
    'uses' => 'admin\UserController@show'
	
]);
Route::get('/admin/Images/allInaptImages', [
		'middleware' => 'auth',
	'uses'=> 'admin\ImagesController@allInaptImages'
	]);
Route::get('/admin/Images/allImages', [
		'middleware' => 'auth',
	'uses'=> 'admin\ImagesController@allImages'
	]);
Route::get('/admin/Images/topBeauty', [
		'middleware' => 'auth',
	'uses'=> 'admin\ImagesController@topBeauty'
	]);
Route::get('/admin/Images/topKreepy', [
		'middleware' => 'auth',
	'uses'=> 'admin\ImagesController@topKreepy'
	]);
Route::post('/admin/Images/{PictureID?}/delete', [
		'middleware' => 'auth',
	'uses'=> 'admin\ImagesController@destroy'
	]);

Route::get('/admin/Admins', [
		'middleware' => 'auth',
	'uses'=> 'admin\AdminController@admin'
	]);
Route::get('/admin/Users/{UserId?}', [
    'middleware' => 'auth',
    'uses' => 'admin\UserController@show'
	
]);
Route::post('/admin/Users/{UserId?}/update', [
    'middleware' => 'auth',
    'uses' => 'admin\UserController@update'
	
]);
Route::post('/admin/Users/{UserId?}/delete', [
    'middleware' => 'auth',
    'uses' => 'admin\UserController@destroy'
	
]);
Route::get('/admin/Admins/{userName?}', [
    'middleware' => 'auth',
    'uses' => 'admin\AdminController@show'
]);

Route::post('/admin/Admins/{userName?}/delete', [
    'middleware' => 'auth',
    'uses' => 'admin\AdminController@destroy'
]);
Route::post('/admin/Admins/{userName?}', [
    'middleware' => 'auth',
    'uses' => 'admin\AdminController@update'
]);

Route::post('/admin/Admins/{userName?}/edit', [
    'middleware' => 'auth',
    'uses' => 'admin\AdminController@edit'
]);

Route::get('/admin/Admins/{userName?}/changepwd', [
    'middleware' => 'auth',
    'uses' => 'admin\AdminController@changepwd'
]);
