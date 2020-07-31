<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@HomeIndex');
Route::post('/contact', 'HomeController@ContactSend');
Route::get('/project', 'ProjectController@projectIndex');
Route::get('/courses', 'CourseController@coursesIndex');
Route::get('/contact', 'ContactController@projectIndex');
Route::get('/terrms', 'TermsController@termsIndex');
Route::get('/privacy', 'PrivacyController@privacyIndex');
