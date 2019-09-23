<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>后台 @yield('title')</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <!--<meta http-equiv="refresh" content="0;ie.html" />-->
    {{--<![endif]-->--}}

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    {{--<link href="/css/font-awesome.css?v=4.4.0" rel="stylesheet">--}}
    {{--<link href="/css/animate.css" rel="stylesheet">--}}
    {{--<link href="/css/style.css?v=4.1.0" rel="stylesheet">--}}

    <!-- 全局js -->
    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="margin-top: 3%">
<div class="container">
    @yield('content')
</div>
</body>

</html>

