<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    //首页操作->题库页面
    public function question()
    {
        return view("index.question");
    }
}
