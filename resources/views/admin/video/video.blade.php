@extends('admin.first')
@section('title','资讯分类添加')
<link rel="stylesheet" href="/static/build/layui.css" media="all">
@section('content')
    <h3>课程视频添加</h3><br/>
    <form>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">选择课程</label>
            <select class="form-control" name="weight" id="weight">
                <option value="">请选择课程</option>
                @foreach($cour as $k => $v)
                <option value="1">{{$v->cou_name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择视频</label>
            <p>
                <button type="button" class="layui-btn" id="test1">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
            </p>

        </div>



        <button type="button" class="btn btn-success" >创建分类</button>
    </form>
    @endsection
@section("js")
    <script src="/static/build/layui.js"></script>
    <script>
        layui.use('upload', function(){
            var upload = layui.upload;

            //执行实例
            var uploadInst = upload.render({
                elem: '#test1' //绑定元素
                ,url: '/admin/upload' //上传接口
                ,accept : "images,video,audio,file"
                ,exts : 'mp4'
                ,data : "entity"
                ,done: function(res){
                    console.log(res);
                    //上传完毕回调
                }
                ,error: function(arr){
                    console.log(arr);
                    //请求异常回调
                }
            });
        });
    </script>
@endsection