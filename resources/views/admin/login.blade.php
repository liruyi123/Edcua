@extends("admin.first")
<link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">

<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css?v=4.1.0" rel="stylesheet">
<!--[if lt IE 9]>
<meta http-equiv="refresh" content="0;ie.html" />
<![endif]-->
<script>if(window.top !== window.self){ window.top.location = window.location;}</script>

<body class="gray-bg">
@section("content")
<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">h</h1>

        </div>
        <h3>欢迎使用 hAdmin</h3>

        <form class="m-t" role="form" action="index.html">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="用户名" required="" id="name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="密码" required="" id="pwd">
            </div>
            <button type="button" class="btn btn-primary block full-width m-b" id="btn">登 录</button>


            <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="/admin/register">注册一个新账号</a>
            </p>

        </form>
    </div>
</div>
@endsection
<!-- 全局js -->
<script src="js/jquery.min.js?v=2.1.4"></script>
<script src="js/bootstrap.min.js?v=3.3.6"></script>
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
                    layer.msg(res.message,{icon:1,time:3000},function () {
                        location.href="/admin/index";
                    });
                }else{
                    alert(res.message);
                }
            }
        });
    })
</script>



</body>

</html>
