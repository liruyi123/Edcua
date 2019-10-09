<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> hAdmin- 主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">hAdmin</strong>
                                    </span>
                                </span>
                        </a>
                    </div>
                    <div class="logo-element">hAdmin
                    </div>
                </li>

                @foreach($data as $k=>$v)
                <li>
                    <a href="{{$v['node_url']}}">
                        <i class="fa fa fa-bar-chart-o"></i>
                        <span class="nav-label">{{$v['node_name']}}</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @foreach($v['son'] as $kk=>$vv)
                        <li>
                            <a class="J_menuItem" href="{{$vv['node_url']}}">{{$vv['node_name']}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach



                {{--<li>--}}
                    {{--<a class="J_menuItem" href="/admin/indexV1">--}}
                        {{--<i class="fa fa-home"></i>--}}
                        {{--<span class="nav-label">主页</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="line dk"></li>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa fa-bar-chart-o"></i>--}}
                        {{--<span class="nav-label">导航栏</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="navbar">导航栏添加</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="navbarlist">导航栏展示</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">课程 </span><span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li><a class="J_menuItem" href="courseCategoryAdd">课程分类添加</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="courseCategoryList">课程分类展示</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="courseAdd">课程添加</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="courseList">课程展示</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-edit"></i> <span class="nav-label">讲师</span><span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li><a class="J_menuItem" href="lecturer">讲师添加</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="lecturerList">讲师列表</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-edit"></i> <span class="nav-label">友链</span><span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li><a class="J_menuItem" href="lecturer">友链添加</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="lecturerList">友链列表</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">资讯</span><span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li><a class="J_menuItem" href="/admin/addbar">资讯分类添加</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="/admin/navcon">资讯分类列表</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="/admin/addcon">资讯添加</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="/admin/consult">资讯列表</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="">活动添加</a>--}}
                        {{--</li>--}}
                        {{--<li><a class="J_menuItem" href="">活动列表</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i><svg t="1569374065195" class="icon" viewBox="0 0 1133 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2733" width="13" height="13"><path d="M0 77.897143v868.205714A77.897143 77.897143 0 0 0 77.897143 1024h977.92A77.897143 77.897143 0 0 0 1133.714286 946.102857V77.897143A77.897143 77.897143 0 0 0 1055.817143 0H77.897143A77.897143 77.897143 0 0 0 0 77.897143z m1045.942857 846.811428H566.857143V91.428571h479.085714z" fill="#999999" p-id="2734"></path><path d="M637.622857 217.965714m42.057143 0l253.257143 0q42.057143 0 42.057143 42.057143l0 0q0 42.057143-42.057143 42.057143l-253.257143 0q-42.057143 0-42.057143-42.057143l0 0q0-42.057143 42.057143-42.057143Z" fill="#999999" p-id="2735"></path><path d="M637.622857 385.645714m42.057143 0l253.257143 0q42.057143 0 42.057143 42.057143l0 0q0 42.057143-42.057143 42.057143l-253.257143 0q-42.057143 0-42.057143-42.057143l0 0q0-42.057143 42.057143-42.057143Z" fill="#999999" p-id="2736"></path><path d="M637.622857 553.325714m42.057143 0l253.257143 0q42.057143 0 42.057143 42.057143l0 0q0 42.057143-42.057143 42.057143l-253.257143 0q-42.057143 0-42.057143-42.057143l0 0q0-42.057143 42.057143-42.057143Z" fill="#999999" p-id="2737"></path></svg></i>--}}
                        {{--<span class="nav-label">题库</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="question">题库添加</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="questionlist">题库展示</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i><svg t="1569374065195" class="icon" viewBox="0 0 1133 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2733" width="13" height="13"><path d="M0 77.897143v868.205714A77.897143 77.897143 0 0 0 77.897143 1024h977.92A77.897143 77.897143 0 0 0 1133.714286 946.102857V77.897143A77.897143 77.897143 0 0 0 1055.817143 0H77.897143A77.897143 77.897143 0 0 0 0 77.897143z m1045.942857 846.811428H566.857143V91.428571h479.085714z" fill="#999999" p-id="2734"></path><path d="M637.622857 217.965714m42.057143 0l253.257143 0q42.057143 0 42.057143 42.057143l0 0q0 42.057143-42.057143 42.057143l-253.257143 0q-42.057143 0-42.057143-42.057143l0 0q0-42.057143 42.057143-42.057143Z" fill="#999999" p-id="2735"></path><path d="M637.622857 385.645714m42.057143 0l253.257143 0q42.057143 0 42.057143 42.057143l0 0q0 42.057143-42.057143 42.057143l-253.257143 0q-42.057143 0-42.057143-42.057143l0 0q0-42.057143 42.057143-42.057143Z" fill="#999999" p-id="2736"></path><path d="M637.622857 553.325714m42.057143 0l253.257143 0q42.057143 0 42.057143 42.057143l0 0q0 42.057143-42.057143 42.057143l-253.257143 0q-42.057143 0-42.057143-42.057143l0 0q0-42.057143 42.057143-42.057143Z" fill="#999999" p-id="2737"></path></svg></i>--}}
                        {{--<span class="nav-label">公告</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="notice">公告添加</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="noticelist">公告展示</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa fa-bar-chart-o"></i>--}}
                        {{--<span class="nav-label">课程目录</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="/admin/catalog">目录展示</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="/admin/addcata">目录添加</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="line dk"></li>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa fa-bar-chart-o"></i>--}}
                        {{--<span class="nav-label">管理员列表</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="/admin/adminadd">管理员添加</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="/admin/adminlist">管理员列表</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa fa-bar-chart-o"></i>--}}
                        {{--<span class="nav-label">节点管理</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="/admin/nodeadd">节点添加</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="/admin/nodelist">节点列表</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa fa-bar-chart-o"></i>--}}
                        {{--<span class="nav-label">角色管理</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="/admin/roleadd">角色添加</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a class="J_menuItem" href="/admin/rolelist">节点列表</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="line dk"></li>--}}


            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li class="m-t-xs">
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a7.jpg">
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right">46小时前</small>
                                        <strong>小四</strong> 是不是只有我死了,你们才不骂爵迹
                                        <br>
                                        <small class="text-muted">3天前 2014.11.8</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a4.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">25小时前</small>
                                        <strong>二愣子</strong> 呵呵
                                        <br>
                                        <small class="text-muted">昨天</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a class="J_menuItem" href="mailbox.html">
                                        <i class="fa fa-envelope"></i> <strong> 查看所有消息</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                        <span class="pull-right text-muted small">4分钟前</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-qq fa-fw"></i> 3条新回复
                                        <span class="pull-right text-muted small">12分钟钱</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a class="J_menuItem" href="notifications.html">
                                        <strong>查看所有 </strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe id="J_iframe" width="100%" height="100%" src="/admin/indexV1?v=4.0" frameborder="0" data-id="/admin/indexV1" seamless></iframe>
        </div>
    </div>
    <!--右侧部分结束-->
</div>

<!-- 全局js -->
<script src="/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/admin/js/plugins/layer/layer.min.js"></script>

<!-- 自定义js -->
<script src="/admin/js/hAdmin.js?v=4.1.0"></script>
<script type="text/javascript" src="/admin/js/index.js"></script>

<!-- 第三方插件 -->
<script src="/admin/js/plugins/pace/pace.min.js"></script>
<div style="text-align:center;">
    <p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>

</html>
