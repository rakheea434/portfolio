<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@HomeIndex')->middleware('loginCheck');
Route::get('/visitor', 'VisitorController@VisitorIndex')->middleware('loginCheck');


//Admin Pannel Service Management
Route::get('/service', 'ServicesController@ServicesIndex')->middleware('loginCheck');
Route::get('/getServicesData', 'ServicesController@servicesData')->middleware('loginCheck');
Route::post('/ServiceDelete', 'ServicesController@serviceDelete')->middleware('loginCheck');
Route::post('/ServiceDetails', 'ServicesController@getServiceDetails')->middleware('loginCheck');
Route::post('/ServiceUpdate', 'ServicesController@serviceUpdate')->middleware('loginCheck');
Route::post('/ServiceAdd', 'ServicesController@ServiceAdd')->middleware('loginCheck');


// Admin Pannel Courses Management

Route::get('/courses', 'CoursesController@CoursesIndex')->middleware('loginCheck');
Route::get('/getCoursesData', 'CoursesController@getCoursesData')->middleware('loginCheck');
Route::post('/CoursesDelete', 'CoursesController@CoursesDelete')->middleware('loginCheck');
Route::post('/CoursesDetails', 'CoursesController@getCoursesDetails')->middleware('loginCheck');
Route::post('/CoursesUpdate', 'CoursesController@CoursesUpdate')->middleware('loginCheck');
Route::post('/CoursesAdd', 'CoursesController@CoursesAdd')->middleware('loginCheck');


// Admin Pannel Project Management

Route::get('/project', 'ProjectController@ProjectIndex')->middleware('loginCheck');
Route::get('/getProjectData', 'ProjectController@getProjectData')->middleware('loginCheck');
Route::post('/projectDelete', 'ProjectController@ProjectDelete')->middleware('loginCheck');
Route::post('/projectDetails', 'ProjectController@getProjectDetails')->middleware('loginCheck');
Route::post('/projectUpdate', 'ProjectController@projectUpdate')->middleware('loginCheck');
Route::post('/addProject', 'ProjectController@projectAdd')->middleware('loginCheck');




// Admin Pannel Contact Management

Route::get('/contact', 'contactController@contactIndex')->middleware('loginCheck');
Route::get('/getContactData', 'contactController@getContactData')->middleware('loginCheck');
Route::post('/contactDelete', 'contactController@contactDelete')->middleware('loginCheck');



// Admin Pannel Testimonial Management

Route::get('/testimonial', 'testimonialController@testimonialIndex')->middleware('loginCheck');
Route::get('/getTestimonialData', 'testimonialController@getTestimonialData')->middleware('loginCheck');
Route::post('/testimonialDelete', 'testimonialController@testimonialDelete')->middleware('loginCheck');
Route::post('/TestimonialDetails', 'testimonialController@getTestimonialDetails')->middleware('loginCheck');
Route::post('/testimonialUpdate', 'testimonialController@testimonialUpdate')->middleware('loginCheck');
Route::post('/addTestimonial', 'testimonialController@testimonialAdd')->middleware('loginCheck');


//Photo Gallery
Route::get('/Photo', 'PhotoController@photoIndex')->middleware('loginCheck');
Route::get('/PhotoUpload', 'PhotoController@PhotoUpload')->middleware('loginCheck');
Route::get('/PhotoJSON', 'PhotoController@PhotoJSON')->middleware('loginCheck');




//login Router
Route::get('/Login', 'LoginController@LoginIndex');
Route::post('/onLogin', 'LoginController@onLogin');
Route::get('/Logout', 'LoginController@onLogout');
