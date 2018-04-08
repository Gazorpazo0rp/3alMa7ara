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

Route::get('/', 'PagesController@Home');
Route::get('/Register', 'PagesController@Register');
Route::post('/Login', 'UserController@Login');
Route::get('/profile', 'UserController@View_Profile');
Route::get('/logout', 'UserController@logout');
Route::post('/SubmitRegistration', 'UserController@Register');
Route::post('/EditProfile', 'UserController@EditPersonalInfo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
