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
Route::post('/SubmitComment', 'UserController@Submit_comment');
Route::get('/rate/{rating}/{id}', 'UserController@rate');

//URL
Route::get('/Reservation','UserController@Reservation');
Route::get('/Simulator','PagesController@Simulator');
Route::get('/profile', 'UserController@View_Profile');
Route::get('/Register', 'PagesController@Register');
Route::get('/worker/{id}', 'PagesController@Worker_Profile');
//Sections.
Route::get('/Section/{id}','UserController@View_all_Projects');
Route::get('/viewProject/{id}','UserController@View_Project');
//Admin
Route::post('/adminLogin', 'AdminController@admin_auth');
Route::get('/admin','PagesController@admin_auth');
Route::get('/adminDashboard','AdminController@Admin');
Route::get('/JoinUsRequests','AdminController@View_Requests');
Route::get('/acceptRequest/{id}','AdminController@Accept_Request');
Route::get('/rejectRequest/{id}','AdminController@Reject_Request');
Route::get('/pendingReservations/{read}','AdminController@View_Reservations');
Route::get('/viewStaff','AdminController@View_Staff');
Route::get('/EditWorker/{id}','AdminController@Edit_Staff');
Route::post('/SubmitEditWorker', 'AdminController@Submit_Edit_worker');
Route::get('/viewClients','AdminController@view_clients');
Route::get('/blockClient/{id}','AdminController@block_client');
Route::get('/editPages','AdminController@edit_pages');
Route::get('/viewEditSection/{id}','AdminController@view_edit_section');
Route::get('/deleteSectionImage/{path}/{id}','AdminController@delete_section_image');
Route::post('/AddSectionImages', 'AdminController@add_section_images');
Route::get('/acceptReservation/{customerId}/{formId}','AdminController@accept_reservation');
Route::get('/rejectReservation/{customerId}/{formId}','AdminController@reject_reservation');
Route::get('/onGoingTasks','AdminController@view_tasks');
Route::get('/updateTask/{id}','AdminController@update_task');
Route::get('/questions','AdminController@viewQuestions');
Route::get('/editQues/{name}','AdminController@edit_Ques');
Route::post('/AddProject', 'AdminController@Add_Project');
Route::get('/deleteProject/{id}', 'AdminController@delete_project');
Route::get('/homepageSlider', 'AdminController@edit_Slider');
Route::post('/addHomepageSliderImage', 'AdminController@Homepage_slider_image');





Route::get('/adminLogout','AdminController@logout');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
