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

Route::get('/', 'HomeController@HomeIndex');
Route::get('/visitor', 'VisitorController@VisitorIndex');


//Admin Pannel Service Management
Route::get('/service', 'ServicesController@ServicesIndex');
Route::get('/getServicesData', 'ServicesController@servicesData');
Route::post('/ServiceDelete', 'ServicesController@serviceDelete');
Route::post('/ServiceDetails', 'ServicesController@getServiceDetails');
Route::post('/ServiceUpdate', 'ServicesController@serviceUpdate');
Route::post('/ServiceAdd', 'ServicesController@ServiceAdd');


// Admin Pannel Courses Management

Route::get('/courses', 'CoursesController@CoursesIndex');
Route::get('/getCoursesData', 'CoursesController@getCoursesData');
Route::post('/CoursesDelete', 'CoursesController@CoursesDelete');
Route::post('/CoursesDetails', 'CoursesController@getCoursesDetails');
Route::post('/CoursesUpdate', 'CoursesController@CoursesUpdate');
Route::post('/CoursesAdd', 'CoursesController@CoursesAdd');


// Admin Pannel Project Management

Route::get('/project', 'ProjectController@ProjectIndex');
Route::get('/getProjectData', 'ProjectController@getProjectData');
Route::post('/projectDelete', 'ProjectController@ProjectDelete');
Route::post('/projectDetails', 'ProjectController@getProjectDetails');
Route::post('/projectUpdate', 'ProjectController@projectUpdate');
Route::post('/projectAdd', 'ProjectController@projectAdd');





