<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', function () {
  return view('welcome');
});
Route::get('/login', function () {
  return view('auth.login');
});
Route::get('/register', function () {
  return view('auth.register');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  Route::resource('post', 'PostController');
  Route::post('post/confirm_post','PostController@confirm_post')->name('confirm_post');
  Route::post('post/{post}/edit_confirm','PostController@edit_confirm')->name('edit_confirm');
  
  Route::resource('user', 'User\UserController');
  Route::get('user/{user}/profile','User\UserController@profile')->name('profile'); 
  Route::post('user/register_confirm','User\UserController@register_confirm')->name('register_confirm');
  
  Route::get('user/{user}/change_password','User\UserController@change_password')->name('change_password');  
  Route::post('user/{user}/update_password','User\UserController@update_password')->name('update_password'); 
  
  Route::get('export', 'PostController@export')->name('export');
  Route::get('importExportView', 'PostController@fileImportExport')->name('importExportView');
  Route::post('import', 'PostController@import')->name('import');
});