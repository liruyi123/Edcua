@extends("admin.first")
{{--<link href="css/bootstrap.min.css" rel="stylesheet">--}}
{{--<link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">--}}
{{--<link href="css/animate.css" rel="stylesheet">--}}
<link href="css/style.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
<!--[if lt IE 9]>

<link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css?v=4.1.0" rel="stylesheet">
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

    //注册
    $(document).on("click","#register",function () {
        location.href="/admin/register";
    })
</script>
