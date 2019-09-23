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
    return view('index');
});
route::get('courselist',"IndexController@course");
route::get("login","LoginController@login");
route::get("register","LoginController@register");
route::get("coursecont","CourseController@coursecont");
route::get("study","CourseController@study");
route::get("video","CourseController@video");
route::get("article","AdvisoryController@article");
route::get("articlelist","AdvisoryController@articlelist");
route::get("teacherlist","TeacherController@teacherlist");
route::get("teacher","TeacherController@teacher");