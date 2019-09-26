
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>题库添加</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">

</head>
@extends('admin.first')
@section('title','添加上下导航栏')
@section('content')
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>题库添加</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" id="commentForm">
                        <input id="cname q_id" name="q_id" value="{{$data['q_id']}}" minlength="2" type="hidden" class="form-control q_id" required="" aria-required="true">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">题目名称：</label>
                                <div class="col-sm-8">
                                    <input id="cname q_name" name="q_name" value="{{$data['q_name']}}" minlength="2" type="text" class="form-control q_name" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">题目答案：</label>
                                <div class="col-sm-8">
                                    <input id="cemail q_answer" type="text" value="{{$data['q_answer']}}" class="form-control q_answer" name="q_answer" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">题库权重：</label>
                                <div class="col-sm-8">
                                    <input id="q_weight" name="q_weight" class="form-control q_weight" value="{{$data['q_weight']}}" type="number" aria-required="true" aria-invalid="false" class="valid">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <button class="btn btn-primary" id="btn" type="button">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
<script src="/admin/js/jquery-1.8.0.min.js"></script>
<script>
   $(document).ready(function () {
    layui.use('layer', function () {
        var layer = layui.layer;
        $("#btn").click(function()
        {
            var q_name=document.querySelector('.q_name').value;
            var q_answer=document.querySelector('.q_answer').value;
            var q_weight=document.querySelector('.q_weight').value;
            var q_id=document.querySelector('.q_id').value;
            if(q_name==""){
                layer.msg('注意，题目名称不能为空！',{icon:2});
                return false;
            }else if(q_answer==""){
                layer.msg('注意，题目答案不能为空！',{icon:2});
                return false;
            }else if(q_weight==""){
                layer.msg('注意，权重不能为空！',{icon:2});
                return false;
            }
            $.ajax({
                url:"/admin/qupdatedo",
                type:"POST",
                data:{q_name:q_name,q_answer:q_answer,q_weight:q_weight,q_id:q_id},
                dataType:"json",
                async:true,
                success:function(res){
                    if(res.code==200){
                        layer.msg(res.message,{icon:1});
                        location.href="{{url('/admin/questionlist')}}";
                    }else{
                        layer.msg(res.message,{icon:2});
                    }
                }
            })
            
        })    
    });
})
</script>
