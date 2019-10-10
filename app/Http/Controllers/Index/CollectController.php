<?php

namespace App\Http\Controllers\Index;

use App\Model\Collect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
    //  添加收藏
    public function index(Request $request)
    {
        //  判断是否登陆
        if(!$this->is_login()){
            $res = [
                'error' =>  20011,
                'msg'   =>  '登陆后才可以收藏呢'
            ];
            return json_encode($res);
        }

        $cou_id = $request->input('cou_id');
        $user_id = $this->getUserId();
        $where= [
            'user_id' => $user_id,
            'cate_id' => $cou_id,
        ];
        //  查看数据库是否收藏
        $yes = Collect::where($where)->first();
        if($yes){
            // 如果收藏 修改状态
            $upd =  Collect::where(['cate_id'=>$cou_id])->delete();
            if($upd){
                $res = [
                    'error' =>  20001,
                    'msg'   =>  '取消收藏'
                ];
                return json_encode($res);
            }
        }else{
            //  如果没收藏 添加数据库
            $where = [
                'user_id' => $user_id,
                'cate_id' => $cou_id,
                'is_show' =>  1,
                'ctime'   =>  time(),
                'status'  =>  1
            ];
            $add = Collect::insert($where);
            if($add){
                $res = [
                    'error' =>  10001,
                    'msg'   =>  '添加收藏'
                ];
                return json_encode($res);
            }
        }
    }

    //是否登陆
    public function is_login()
    {
        return session('user_id');
    }

    //  用户ID
    public function getUserId()
    {
        return session('user_id');
    }
}
