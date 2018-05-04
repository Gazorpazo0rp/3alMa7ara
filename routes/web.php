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
Route::post('/Login', 'UserController@Login');

Route::get('/logout', 'UserController@logout');
Route::post('/SubmitRegistration', 'UserController@Register');
Route::post('/EditProfile', 'UserController@EditPersonalInfo');
Route::post('/EditApartment', 'UserController@EditApartments');
Route::post('/JoinUs', 'PagesController@Submit_Request');

//URL
Route::get('/Reservation','PagesController@Reservation');
Route::get('/Simulator','PagesController@Simulator');
Route::get('/profile', 'UserController@View_Profile');
Route::get('/Register', 'PagesController@Register');
//Sections.
Route::get('/Designs','ImagesController@Designs');
Route::get('/Refurbishment','ImagesController@Refubishmement');
Route::get('/Decor&Art','ImagesController@Decor_and_art');
Route::get('/FireFighting_Air_Conditioning','ImagesController@Firefighting_and_air_conditioning');
//Admin
Route::get('/adminDashboard','PagesController@Admin');
Route::get('/pendingRequests','PagesController@ajaxTest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
