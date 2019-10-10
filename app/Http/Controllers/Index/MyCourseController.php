<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NavbarModel;
use App\Model\UserModel;

class MyCourseController extends Controller
{
    //  个人中心
    public function index()
    {
        $ments = NavbarModel::where(['status'=>1,'nav_type'=>1])->orderBy('nav_weight','desc')->get();
        return view('index.mycourse',compact('ments'));
    }

    //  用户ID
    public function getUserId()
    {
        return session('user_id');
    }
}
