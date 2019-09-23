<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index.index');
});

//前台
Route::get('/index/courselist','Index\IndexController@course');
Route::get('/index/login','Index\LoginController@login');
Route::get('/index/register','Index\LoginController@register');
Route::get('/index/coursecont','Index\CourseController@coursecont');
Route::get('/index/study','Index\CourseController@study');
Route::get('/index/video','Index\CourseController@video');
Route::get('/index/article','Index\AdvisoryController@article');
Route::get('/index/articlelist','Index\AdvisoryController@articlelist');
Route::get('/index/teacherlist','Index\TeacherController@teacherlist');
Route::get('/index/teacher','Index\TeacherController@teacher');


//后台
Route::get('/admin/index','Admin\IndexController@index');