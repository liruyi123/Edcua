<?php

namespace App\Http\Controllers\Admin;

use App\Model\CourseCategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    //课程分类的添加
    public function courseCategoryAdd(){
        $data = CourseCategoryModel::where(['is_show'=>1,'status'=>1,'pid'=>0])->get()->toArray();
        $data = [
            'data'=>$data
        ];

        return view("admin.course.coursecategoryadd" , $data);
    }

    // 课程分类添加的执行
    public function courseCategoryAdd_do(Request $request){
        $data = $request->input();
        $c_name = $data['c_name'];
        if (empty($c_name)){
            return $this->code(201,"名称不能为空" ,"");
        }
        $pid = $data['navbar'];
        $weight = $data['c_size'];
        if (empty($weight)){
            return $this->code(201,"权重不能为空","");
        }
        $type = $data['type'];

        $data = [
            'cate_name' => $c_name,
            'pid' => $pid,
            'cate_weight' => $weight,
            'is_show' => $type,
            'utime' => time(),
            'ctime' => time(),
            'status' => 1
        ];
        $res = CourseCategoryModel::insert($data);
        if ($res == 1){
            return $this->code(200,"添加成功","");
//            return [
//                'status' => 200,
//                'data' => "添加成功了耶！"
//            ];
        }else{
            return [
                'status' => 101,
                'data' => "很抱歉，添加失败了。。。"
            ];
        }
    }

    // 课程分类的展示
    public function courseCategoryList(){
        $arr = CourseCategoryModel::where(['status'=>1])->select()->paginate(3);


        return view("admin.course.coursecategorylist" , ['arr'=>$arr]);
    }

    // 课程分类的删除
    public function CCGDel(Request $request){
        $cid = $request->input("cid");
        $arr = CourseCategoryModel::where(['pid'=>$cid])->get()->toArray();
        if (!empty($arr)){
            return [
                'status' => 201,
                'data' => "该分类下有子分类，不能删除"
            ];
        }else{
            $res = CourseCategoryModel::where(['cate_id' => $cid])->update(['status'=>2]);
            if ($res == 1){
                return [
                    'status' => 200,
                    'data' => "删除成功"
                ];
            }else{
                return [
                    'status' => 201,
                    'data' => "删除失败"
                ];
            }

        }
    }

    // 课程分类修改页面
    public function CCGUpd(Request $request){
        $cate_id = $request->input("id");

        $arr = CourseCategoryModel::where(['cate_id'=>$cate_id])->first()->toArray();

        // 查询课程分类
        $data = CourseCategoryModel::where(['is_show'=>1,'status'=>1,'pid'=>0])->get()->toArray();

        $data = [
            'arr' => $arr,
            'data' => $data
        ];

        return view("admin.course.coursecategoryupd" , $data);
    }

    // 执行分类修改
    public function CCGUpd_do(Request $request){
        $data = $request->input();
        $id = $request->input("cid");
        $data = [
            'cate_name' => $data['c_name'],
            'is_show' => $data['type'],
            'cate_weight' => $data['c_size'],
            'pid' => $data['category'],
            'utime' => time(),
        ];
        $res = CourseCategoryModel::where(['cate_id'=>$id])->update($data);
        if ($res == 1){
            return [
                'status' => 200,
                'data' => "修改成功"
            ];
        }else{
            return [
                'status' => 201,
                'data' => "修该失败"
            ];
        }
    }

    // 课程添加页面
    public function courseAdd(){
        $res = CourseCategoryModel::where(['status'=>1])->get()->toArray();
        $arr = $this->getIndexCateInfo($res,0);
//        print_r($arr);die;

        return view("admin.course.courseadd" , ['arr'=>$arr]);
    }


    public function code($code="",$msg="",$data=[])
    {
        $data = [
            "code" => $code,
            "message" => $msg,
            "data" => $data
        ];
        echo  json_encode($data,JSON_UNESCAPED_UNICODE);die;
    }

    function getIndexCateInfo($data,$pid=0){
        $cateInfo=[];
        foreach($data as $k=>$v){
            // print_r($v);
            if($v['pid']==$pid){
                $son=$this->getIndexCateInfo($data,$v['cate_id']);
                $v['son']=$son;
                $cateInfo[]=$v;
            }
        }
        return $cateInfo;
    }
}
