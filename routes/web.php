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


Route::any('/server', 'OfficialAccount\ServerController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/store', 'HomeController@store')->name('subscribe.store');

# 邮箱验证url
Route::get('/register/verify/{token}',['as' => 'email.verify', 'uses' => 'EmailController@verifyW']);

