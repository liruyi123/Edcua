
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
            <div class="col-sm-6">
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
                            <div class="form-group">
                                <label class="col-sm-3 control-label">题目名称：</label>
                                <div class="col-sm-8">
                                    <input id="cname q_name" name="q_name" minlength="2" type="text" class="form-control q_name" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">题目答案：</label>
                                <div class="col-sm-8">
                                    <input id="cemail q_answer" type="text" class="form-control q_answer" name="q_answer" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">题库权重：</label>
                                <div class="col-sm-8">
                                    <input id="q_weight" name="q_weight" class="form-control q_weight" type="number" aria-required="true" aria-invalid="false" class="valid">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <button class="btn btn-primary" onclick="displayDate()" type="submit">提交</button>
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
<script>
    function displayDate()
    {
       var q_name=document.querySelector('.q_name').value;
       var q_answer=document.querySelector('.q_answer').value;
       var q_weight=document.querySelector('.q_weight').value;
       if(q_name==""){
           alert('注意，题目名称不能为空！');
           return false;
       }else if(q_answer==""){
           alert('注意，题目答案不能为空！');
           return false;
       }else if(q_weight==""){
           alert('注意，权重不能为空！');
           return false;
       }
       $.ajax({
           url:"/admin/questiondo",
           type:"POST",
           data:{q_name:q_name,q_answer:q_answer,q_weight:q_weight},
           dataType:"",
           async:true,
           success:function(res){
                if(res==200){
                    alert('恭喜您，添加成功！');
                }else{
                    alert('很遗憾，添加失败！')
                }
           }
       })
    }
</script>
