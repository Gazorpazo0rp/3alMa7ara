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
Route::post('/SubmitReservation', 'UserController@Submit_Reservation');

//URL
Route::get('/Reservation','UserController@Reservation');
Route::get('/Simulator','PagesController@Simulator');
Route::get('/profile', 'UserController@View_Profile');
Route::get('/Register', 'PagesController@Register');
//Sections.
Route::get('/Designs','PagesController@Designs');
Route::get('/Refurbishment','PagesController@Refurbishment');
Route::get('/Decor&Art','PagesController@Decor_and_art');
Route::get('/FireFighting_Air_Conditioning','PagesController@Firefighting_and_air_conditioning');
//Admin
Route::get('/adminDashboard','PagesController@Admin');
Route::get('/JoinUsRequests','AdminController@View_Requests');
Route::get('/acceptRequest/{id}','AdminController@Accept_Request');
Route::get('/rejectRequest/{id}','AdminController@Reject_Request');
Route::get('/pendingReservations','AdminController@View_Reservations');
Route::get('/viewStaff','AdminController@View_Staff');
Route::get('/EditWorker/{id}','AdminController@Edit_Staff');
Route::post('/SubmitEditWorker', 'AdminController@Submit_Edit_worker');
Route::get('/viewClients','AdminController@view_clients');
Route::get('/blockClient/{id}','AdminController@block_client');
Route::get('/editPages','AdminController@edit_pages');
Route::get('/viewEditSection/{id}','AdminController@view_edit_section');
Route::get('/deleteSectionImage/{path}/{id}','AdminController@delete_section_image');
Route::post('/AddSectionImages', 'AdminController@add_section_images');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
