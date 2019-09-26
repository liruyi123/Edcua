<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>后台 @yield('title')</title>

    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- 全局js -->
    <script src="/layui/layui.js"></script>
    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/js/jquery-1.8.0.min.js"></script>
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="margin-top: 3%">
<div class="container">
    @yield('content')
</div>
</body>
@yield("js")

</html>

