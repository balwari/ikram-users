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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/show', 'UserController@show')->name('show');
    Route::post('/create', 'UserController@create')->name('create');  
    Route::get('/updateproduct/{id}', 'UserController@update_user')->name('updateuser');
    Route::post('/update/{id}', 'UserController@update')->name('update');
    Route::get('/deactivate/{id}', 'UserController@deactivate')->name('deactivate');
    Route::get('/delete/{id}', 'UserController@delete')->name('delete');    
});
