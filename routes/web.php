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
Route::get('/admin/courseCategoryAdd','Admin\CourseController@courseCategoryAdd');//课程分类的添加页面
Route::post('/admin/courseCategoryAdd_do','Admin\CourseController@courseCategoryAdd_do');//课程分类的添加执行
Route::get('/admin/courseCategoryList','Admin\CourseController@courseCategoryList');//课程分类的展示页面
Route::get('/admin/CCGDel','Admin\CourseController@CCGDel');//课程分类的展示页面

//后台 --- 资讯模块
Route::get('/admin/infor','Admin\InforController@first');   //展示资讯
Route::get('/admin/information','Admin\InforController@add');  //添加资讯页面
Route::post('/admin/information','Admin\InforController@doAdd');    //执行添加资讯
Route::get('/admin/upinfor/{id}','Admin\InforController@upInfor');   //修改资讯页面
Route::post('/admin/upinfor','Admin\InforController@inforUp');   //执行修改资讯


Route::get('/admin/courseAdd','Admin\CourseController@courseAdd');// 课程添加页面
Route::get('/admin/courseCategoryAdd','Admin\CourseController@courseCategoryAdd');//课程分类的添加页面
Route::post('/admin/courseCategoryAdd_do','Admin\CourseController@courseCategoryAdd_do');//课程分类的添加执行
Route::get('/admin/courseCategoryList','Admin\CourseController@courseCategoryList');//课程分类的展示页面
Route::get('/admin/CCGDel','Admin\CourseController@CCGDel');//课程分类的删除
Route::get('/admin/CCGUpd','Admin\CourseController@CCGUpd');//课程分类的修改
Route::get('/admin/CCGUpd_do','Admin\CourseController@CCGUpd_do');//课程分类的修改


Route::get("/admin/lecturer","Admin\LecturerController@lecturer");//讲师添加页面
Route::post("/admin/lecturerAdd","Admin\LecturerController@lecturerAdd");//讲师添加执行
Route::get("/admin/lecturerList","Admin\LecturerController@lecturerList");//讲师列表页面
Route::get("/admin/lecturerLists","Admin\LecturerController@lecturerLists");//讲师列表页面数据


//资讯模块----资讯
Route::get('/admin/consult','Admin\ConsultController@first');   //资讯列表页
Route::get('/admin/addcon','Admin\ConsultController@consultAdd');   //资讯添加页
Route::post('/admin/addcon','Admin\ConsultController@consultDo');   //执行资讯添加
Route::get('/admin/updcon/{id}','Admin\ConsultController@consultUpd');   //资讯修改页
Route::post('/admin/updcon','Admin\ConsultController@consultDoUp');   //资讯修改页
Route::post('/admin/delcon','Admin\ConsultController@consultDel');   //软删
//资讯模块----资讯导航栏分类
Route::get('/admin/navcon','Admin\ConsultController@second');   //资讯分类列表页
Route::get('/admin/addbar','Admin\ConsultController@barAdd');   //资讯分类添加页
Route::post('/admin/addbar','Admin\ConsultController@barDo');   //资讯分类执行添加
Route::get('/admin/updbar/{id}','Admin\ConsultController@navUpd');   //资讯分类修改页
Route::post('/admin/updbar','Admin\ConsultController@navDo');   //资讯分类执行修改
Route::post('/admin/delbar','Admin\ConsultController@barDel');   //资讯分类执行删除





Route::get('/admin/navbar','Admin\NavbarController@navbar');//导航栏添加静态页面
Route::post('/admin/navbardo','Admin\NavbarController@navbardo');//导航栏添加静态页面
Route::get('/admin/navbarlist','Admin\NavbarController@navlist');//导航栏添加静态页面
Route::get('/admin/navdelete/{nav_id}','Admin\NavbarController@navdelete');//导航栏删除执行
Route::get('/admin/navupdate/{nav_id}','Admin\NavbarController@navupdate');//导航栏修改静态页面
Route::post('/admin/navupdatedo','Admin\NavbarController@navupdatedo');//导航栏修改执行


Route::get("/admin/lecturerDel","Admin\LecturerController@lecturerDel");//讲师列表数据删除
Route::get("/admin/lecturerUpdate","Admin\LecturerController@lecturerUpdate");//讲师数据修改页面
Route::post("/admin/lecturerUpdateDo","Admin\LecturerController@lecturerUpdateDo");//讲师数据修改执行

Route::get('/admin/question','Admin\QuestionController@question');//题库添加静态页面
Route::post('/admin/questiondo','Admin\QuestionController@questiondo');//题库添加执行页面
Route::get('/admin/questionlist','Admin\QuestionController@questionlist');//题库的展示列表页面
Route::get('/admin/qdelete/{q_id}','Admin\QuestionController@qdelete');//题库的执行删除方法
Route::get('/admin/qupdate/{q_id}','Admin\QuestionController@qupdate');//题库的修改静态页面
Route::post('/admin/qupdatedo','Admin\QuestionController@qupdatedo');//题库的修改静态页面

