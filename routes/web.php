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


Route::get('/','Index\IndexController@index');//首页

//前台

Route::get('/index/courselist','Index\CourseController@course');//课程页面
Route::get('/index/login','Index\LoginController@login');//登陆页面
Route::post("/index/loginAdd","Index\LoginController@loginAdd");//登陆执行
Route::get('/index/register','Index\LoginController@register');//注册页面
Route::post("/index/registerAdd","Index\LoginController@registerAdd");//注册执行
Route::post("/index/uploads","Index\LoginController@uploads");//注册执行
Route::post("/index/exit","Index\LoginController@exit");//退出操作
Route::get("/index/pwd","Index\LoginController@pwd");//修改密码页面
Route::post("/index/pwdCode","Index\LoginController@pwdCode");//获取验证码
Route::post("/index/pwdAdd","Index\LoginController@pwdAdd");//修改密码执行
Route::get('/index/coursecont/{id}','Index\CourseController@coursecont');//课程介绍，目录
Route::get("/index/coursecont1/{id}","Index\CourseController@coursecont1");//课程详情
Route::post("/index/reply","Index\CourseController@reply");
Route::post("/index/tiwen_con","Index\CourseController@tiwen_con");
Route::post("/index/btnlink","Index\CourseController@btnlink");
Route::any("/index/down","Index\IndexController@down");//下载

Route::post("/index/lect","Index\CourseController@lect");
Route::get('/index/study','Index\CourseController@study');
Route::get('/index/video','Index\CourseController@video');
Route::get('/index/article','Index\AdvisoryController@article');
Route::get('/index/articlelist/{id}','Index\AdvisoryController@articlelist');
Route::get('/index/teacherlist','Index\TeacherController@teacherlist');
Route::get('/index/teacher/{id}','Index\TeacherController@teacher');
Route::get('/index/question','Index\QuestionController@question'); // 题库页面
Route::post('/index/review','Index\QuestionController@review');
Route::get('/index/ments','Index\NavbarController@ments');
Route::get('/index/catenews','Index\CourseController@news');
Route::post('/index/coursecontadd','Index\CourseController@coursecontadd');//前台课程评论页面

Route::post('/index/collect','Index\CollectController@index');  // 添加收藏

Route::get('/index/my','Index\MyCourseController@index');   //  个人中心首页
Route::post('/index/coldel','Index\MyCourseController@colDel'); //  移除收藏
Route::get('/index/myask','Index\MyCourseController@myAsk');    //  我的问答
Route::get('/index/mynote','Index\MyCourseController@myNote');    //  我的笔记
Route::get('/index/myhomework','Index\MyCourseController@myHomework');    //  我的作业
Route::get('/index/training_list','Index\MyCourseController@trainingList');    //  我的题库
Route::get('/index/mynoteadd','Index\MyCourseController@myAdd');    //  添加笔记
Route::post('/index/mynoteadd','Index\MyCourseController@myDo');    //  执行添加笔记
Route::get('/index/updMessage','Index\UpdMessageController@updMessage');    //  修改信息
Route::post('/index/updMessage_do','Index\UpdMessageController@updMessagedo');    //  修改信息
Route::post('/index/uploadinfo','Index\UpdMessageController@uploadinfo');    //  修改信息

//后台
Route::get('/admin/index','Admin\IndexController@index');
Route::get('/admin/indexV1','Admin\IndexController@indexV1');


Route::get("/admin/login","Admin\LoginController@login");//登陆页面
Route::post("admin/loginDo","Admin\LoginController@LoginDo");//登陆执行
Route::get("/admin/register","Admin\LoginController@register");//注册页面
Route::post("/admin/registerDo","Admin\LoginController@registerDo");//注册执行
Route::get("/admin/forgetpwd","Admin\LoginController@forgetpwd");//忘记密码页面
Route::post("/admin/codes","Admin\LoginController@codes");//获取验证码
Route::post("/admin/userFindPwd","Admin\LoginController@userFindPwd");//修改密码执行
Route::get('/admin/index','Admin\IndexController@index');//后台首页

////后台 --- 资讯模块
//Route::get('/admin/infor','Admin\InforController@first');   //展示资讯
//Route::get('/admin/information','Admin\InforController@add');  //添加资讯页面
//Route::post('/admin/information','Admin\InforController@doAdd');    //执行添加资讯
//Route::get('/admin/upinfor/{id}','Admin\InforController@upInfor');   //修改资讯页面
//Route::post('/admin/upinfor','Admin\InforController@inforUp');   //执行修改资讯

// 课程的模块
Route::get('/admin/courseAdd','Admin\CourseController@courseAdd');// 课程添加页面
Route::get('/admin/courseList','Admin\CourseController@courseList');// 课程展示页面
Route::post('/admin/courseAdd_do','Admin\CourseController@courseAdd_do');// 课程添加执行
Route::post('/admin/couserDel','Admin\CourseController@couserDel');// 课程删除
Route::get('/admin/courseUpd','Admin\CourseController@courseUpd');// 课程修改页面
Route::post('/admin/courseUpd_do','Admin\CourseController@courseUpd_do');// 课程修改执行
Route::post('/admin/uploadinfo','Admin\CourseController@uploadinfo');// 课程封面的文件上传

// 课程分类的模块
Route::get('/admin/courseCategoryAdd','Admin\CourseController@courseCategoryAdd');//课程分类的添加页面
Route::post('/admin/courseCategoryAdd_do','Admin\CourseController@courseCategoryAdd_do');//课程分类的添加执行
Route::get('/admin/courseCategoryList','Admin\CourseController@courseCategoryList');//课程分类的展示页面
Route::any('/admin/courseCategoryListselect','Admin\CourseController@courseCategoryListselect');//课程分类的展示搜索
Route::get('/admin/CCGDel','Admin\CourseController@CCGDel');//课程分类的删除
Route::get('/admin/CCGUpd','Admin\CourseController@CCGUpd');//课程分类的修改
Route::post('/admin/CCGUpd_do','Admin\CourseController@CCGUpd_do');//课程分类的修改


Route::get('/admin/video','Admin\CourseController@video');//课时的视频上传



Route::get("/admin/lecturer","Admin\LecturerController@lecturer");//讲师添加页面
Route::post("/admin/lecturerAdd","Admin\LecturerController@lecturerAdd");//讲师添加执行
Route::get("/admin/lecturerList","Admin\LecturerController@lecturerList");//讲师列表页面
Route::get("/admin/lecturerLists","Admin\LecturerController@lecturerLists");//讲师列表页面数据
Route::post("/admin/upload","Admin\LecturerController@upload");//讲师照片上传

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
//课程目录----目录
Route::get('/admin/catalog','Admin\CatalogController@catalog');   //目录列表页
Route::get('/admin/addcata','Admin\CatalogController@catalogAdd');   //目录添加页
Route::post('/admin/addcata','Admin\CatalogController@catalogDo');   //目录执行添加
Route::get('/admin/updcata/{id}','Admin\CatalogController@catalogUpd');   //目录修改页
Route::post('/admin/updcata','Admin\CatalogController@catalogUpdDo');   //目录执行修改
Route::post('/admin/delcata','Admin\CatalogController@catalogDel');   //目录执行删除


Route::get('/admin/navbar','Admin\NavbarController@navbar');//导航栏添加静态页面
Route::post('/admin/navbardo','Admin\NavbarController@navbardo');//导航栏添加静态页面
Route::get('/admin/navbarlist','Admin\NavbarController@navlist');//导航栏展示页面
Route::get('/admin/navdelete/{nav_id}','Admin\NavbarController@navdelete');//导航栏删除执行
Route::get('/admin/navupdate/{nav_id}','Admin\NavbarController@navupdate');//导航栏修改静态页面
Route::post('/admin/navupdatedo','Admin\NavbarController@navupdatedo');//导航栏修改执行


Route::get("/admin/lecturerDel","Admin\LecturerController@lecturerDel");//讲师列表数据删除
Route::get("/admin/lecturerUpdate","Admin\LecturerController@lecturerUpdate");//讲师数据修改页面
Route::post("/admin/lecturerUpdateDo","Admin\LecturerController@lecturerUpdateDo");//讲师数据修改执行

Route::get('/admin/question','Admin\QuestionController@question');//题库添加静态页面
Route::post('/admin/question_do','Admin\QuestionController@question_do');//题库添加执行页面
Route::get('/admin/questionlist','Admin\QuestionController@questionlist');//题库的展示列表页面
Route::post('/admin/Qdel','Admin\QuestionController@Qdel');//题库的执行删除方法
Route::get('/admin/QUpd','Admin\QuestionController@QUpd');//题库的修改静态页面
Route::post('/admin/qupdatedo','Admin\QuestionController@qupdatedo');//题库的修改静态页面


Route::get('/admin/notice','Admin\NoticeController@notice');//公告添加静态页面
Route::post('/admin/noticedo','Admin\NoticeController@noticedo');//公告添加执行页面
Route::get('/admin/noticelist','Admin\NoticeController@noticelist');//公告展示列表面
Route::post('/admin/ndelete','Admin\NoticeController@ndelete');//公告删除执行页面
Route::get('/admin/nupdate/{not_id}','Admin\NoticeController@nupdate');//公告修改静态页面
Route::post('/admin/nupdatedo','Admin\NoticeController@nupdatedo');//公告修改执行页面

/*======================RBAC(权限管理)=======================*/
Route::get('/admin/adminadd','Admin\AdminController@adminadd');// 后台管理员的添加
Route::post('/admin/adminadd_do','Admin\AdminController@adminadd_do');// 后台管理员的添加执行
Route::get('/admin/adminlist','Admin\AdminController@adminlist');// 后台管理员的添加执行

Route::get('/admin/nodeadd','Admin\NodeController@nodeadd');// 后台节点的添加
Route::post('/admin/nodeadd_do','Admin\NodeController@nodeadd_do');// 后台节点的添加执行
Route::get('/admin/nodelist','Admin\NodeController@nodelist');// 后台节点的展示
Route::post('/admin/NodeDel','Admin\NodeController@NodeDel');// 后台节点的隐藏
Route::get('/admin/NodeUpd','Admin\NodeController@NodeUpd');// 后台节点的修改页面
Route::post('/admin/NodeUpd_do','Admin\NodeController@NodeUpd_do');// 后台节点的修改执行

Route::get('/admin/roleadd','Admin\RoleController@roleadd');// 后台角色的添加
Route::post('/admin/roleadd_do','Admin\RoleController@roleadd_do');// 后台角色添加的执行
Route::get('/admin/rolelist','Admin\RoleController@rolelist');// 后台角色展示
Route::post('/admin/RoleDel','Admin\RoleController@RoleDel');// 后台角色删除

/*======================video(视频上传)=======================*/
Route::get("/admin/video","Admin\VideoController@video");//上传页面
Route::post("/admin/upload","Admin\VideoController@videoAdd");//上传视频
Route::post("/admin/videoDo","Admin\VideoController@videoDo");//上传执行