@extends('admin.first')
@section('title','添加上下导航栏')
@section('content')


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 表单验证 jQuery Validation</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>公告添加</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" id="commentForm">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公告所对应的课程：</label>
                                <div class="col-sm-9">
                                <div class="col-sm-10">
                                    <select class="form-control m-b cou_id" name="account cou_id">
                                    @foreach($data as $v)
                                    @if($res['cou_id'] == $v['cou_id'])
                                        <option value="{{$v['cou_id']}}" selected>{{$v['cou_name']}}</option>
                                    @else
                                        <option value="{{$v['cou_id']}}">{{$v['cou_name']}}</option>
                                    @endif
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">公告内容：</label>
                                <div class="col-sm-8">
                                    <div id="editor" class="notice_text"><p>{{$res['notice_text']}}</p></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导航栏权重：</label>
                                <div class="col-sm-8">
                                    <input id="not_weight" value="{{$res['not_weight']}}" name="not_weight" class="form-control not_weight" type="number" aria-required="true" aria-invalid="false" class="valid">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <button class="btn btn-primary"  id="btn" type="button">修改</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input id="not_id" value="{{$res['not_id']}}" name="not_id" class="form-control not_id" type="number" aria-required="true" aria-invalid="false" class="valid">
</body>
</html>
<script type="text/javascript" src="/Editor/release/wangEditor.min.js"></script>
<script type="text/javascript">
    var E = window.wangEditor
    var editor = new E('#editor')
    // 或者 var editor = new E( document.getElementById('editor') )
    editor.create()
</script>
@endsection
<script src="/admin/js/jquery-1.8.0.min.js"></script>
<script>
     $(document).ready(function () {
    layui.use('layer', function () {
        var layer = layui.layer;
        $("#btn").click(function()
        {
            var cou_id=document.querySelector('.cou_id').value;
            var not_id=document.querySelector('.not_id').value;
            var notice_text = $(".w-e-text").children("p").text();
            var not_weight=document.querySelector('.not_weight').value;
            if(notice_text=="" || notice_text==undefined || notice_text==null || (notice_text.length>0 && notice_text.trim().length==0)){
                layer.msg('公告内容不能为空,不能全是空格！',{icon:2});
                return false;
            }else if(not_weight==""){
                layer.msg('公告权重不能为空！',{icon:2});
                return false;
            }
            $.ajax({
                url:"/admin/nupdatedo",
                type:"POST",
                data:{cou_id:cou_id,notice_text:notice_text,not_weight:not_weight,not_id:not_id},
                datatype:"json",
                async:true,
                success:function(res){
                    console.log(res);
                    if(res==200){
                        layer.msg('恭喜您，公告修改成功！',{icon:1});
                        location.href="{{url('/admin/noticelist')}}";
                    }else{
                        layer.msg('很遗憾，公告修改失败！',{icon:2});
                    }
                }
            })
        })    
    });
})
</script>