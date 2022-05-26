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

use Illuminate\Support\Facades\Route;

Route::get('/', 'AdminController@check');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/show_clients', 'ClientController@show_clients'); 
    Route::get('/show_create_client', 'ClientController@show_create_client'); 
    Route::post('/create_client', 'ClientController@create_client'); 
    Route::get('/show_users', 'AdminController@show_users');
    Route::get('/show_create_user', 'AdminController@show_create_user'); 
    Route::post('/create_user', 'AdminController@create_user'); 
    Route::get('/show_update_user/{id}', 'AdminController@show_update_user');
    Route::post('/update_user/{id}', 'AdminController@update_user');
    Route::get('/toggle_user/{id}', 'AdminController@toggle_user');
    Route::get('/delete_user/{id}', 'AdminController@delete_user');
    Route::get('/show_vendors', 'VendorController@show_vendors'); 
    Route::get('/show_projects', 'ProjectController@show_projects'); 
});
