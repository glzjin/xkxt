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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');



Route::group(['prefix' => 'teacher'], function () {
    Route::get('students', 'Teacher\StudentsController@index');
    Route::get('students/ajax', 'Teacher\StudentsController@ajax');

    Route::get('courses', 'Teacher\CoursesController@index');
    Route::get('courses/ajax', 'Teacher\CoursesController@ajax');
    Route::get('courses/add', 'Teacher\CoursesController@add_view');
    Route::post('courses/add', 'Teacher\CoursesController@add');
    Route::get('courses/{id}/edit', 'Teacher\CoursesController@edit_view');
    Route::post('courses/{id}/edit', 'Teacher\CoursesController@edit');
    Route::get('courses/{id}/delete', 'Teacher\CoursesController@delete');
    Route::get('courses/{id}/selected', 'Teacher\CoursesController@select_view');
    Route::get('courses/{id}/selected/ajax', 'Teacher\CoursesController@selected_ajax');
});

Route::group(['prefix' => 'student'], function () {
    Route::get('selected', 'Student\SelectedController@index');
    Route::get('selected/ajax', 'Student\SelectedController@ajax');

    Route::get('courses', 'Student\CoursesController@index');
    Route::get('courses/ajax', 'Student\CoursesController@ajax');
    Route::get('courses/{id}/add', 'Student\CoursesController@add');
    Route::get('courses/{id}/delete', 'Student\CoursesController@delete');
});
