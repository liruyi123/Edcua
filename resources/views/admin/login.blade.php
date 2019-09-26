@extends("admin.first")
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
<!--[if lt IE 9]>
<meta http-equiv="refresh" content="0;ie.html" />
<![endif]-->
<script>
    if (window.top !== window.self) {
        window.top.location = window.location;
    }
</script>

<body class="signin">
@section("content")
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-12">
                <h4 class="no-margins">登录：</h4>
                <p class="m-t-md"></p>
                <input type="text" class="form-control uname" id="name" placeholder="用户名" />
                <input type="password" class="form-control pword m-b" id="pwd" placeholder="密码" />
                <a href="">忘记密码了？</a>
                <button class="btn btn-danger btn-block" id="register">注册</button>
                <button class="btn btn-success btn-block" id="btn">登录</button>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; hAdmin
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
        });
    })

    //登陆
    $(document).on("click","#btn",function () {


        var name = $("#name").val();
        var pwd = $("#pwd").val();
        if(name ==""){
            // layer.alert('见到你真的很高兴', {icon: 6});
            layer.msg('用户名不能为空!',{icon:2});
            return false;
            // alert("用户名不能为空!");
        }
        if(pwd == ""){
            layer.msg("密码不能为空!",{icon:2});
            return false;
        }
        $.ajax({
            url : "/admin/loginDo",
            type : "POST",
            data : {name:name,pwd:pwd},
            dataType : "JSON",
            success : function (res) {
                if(res.code == "200"){
                    alert(res.message);
                    location.href="/admin/index";
                }else{
                    alert(res.message);
                }
            }
        });
    })
    //注册
    $(document).on("click","#register",function () {
        location.href="/admin/register";
    })
</script>
