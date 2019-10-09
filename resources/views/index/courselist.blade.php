@extends('index.ments')
<link rel="stylesheet" href="css/course.css"/>
<link rel="stylesheet" href="css/tab.css" media="screen">
<script src="js/jquery-1.8.0.min.js"></script>
<script src="js/jquery.tabs.js"></script>
<script src="js/mine.js"></script>
@section('content')
<body>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
    <div class="courseleft">
	<span class="select">
      <input type="text" value="请输入关键字" class="pingjia_con"/>
      <a href="#" class="sellink"></a>
    </span>
        <ul class="courseul">
            <li class="curr" style="border-radius:3px 3px 0 0;background:#fb5e55;"><h3 style="color:#fff;"><a href="#" class="whitea">全部课程</a></h3>
            @foreach($res as $key=>$val)
            <li>
                <h4>{{$val['cate_name']}}</h4>
                <ul class="sortul">
                    @foreach($val['son'] as $k => $v)
                        {{--class="course_curr"--}}
                    <li><a href="/index/catenews?id={{$v['cate_id']}}">{{$v['cate_name']}}</a></li>
                        @endforeach
                </ul>
                <div class="clearh"></div>
            </li>
            @endforeach
        </ul>
        <div style="height:20px;border-radius:0 0 5px 5px; background:#fff;box-shadow:0 2px 4px rgba(0, 0, 0, 0.1)"></div>
    </div>
    <div class="courseright">
        <div class="clearh"></div>
        <ul class="courseulr">
            @foreach($data as $k=>$v)
            <li>
                <div class="courselist">
                    <a href="/index/coursecont/{{$v['cou_id']}}" target="_blank"><img style="border-radius:3px 3px 0 0;" width="240" src="{{$v->path}}" title="{{$v->cou_name}}"></a>
                    <p class="courTit"><a href="/index/coursecont/{{$v['cou_id']}}" target="_blank">{{$v->cou_name}}</a></p>
                    <div class="gray">
                        <span>30课时 600分钟</span>
                        <span class="sp1">1255555人学习</span>
                        <div style="clear:both"></div>
                    </div>
                </div>
            </li>
                @endforeach
        </ul>
    </div>
    <div class="clearh"></div>
</div>
</div>
<!-- InstanceEndEditable -->


<div class="clearh"></div>
<div class="foot">
    <div class="fcontainer">
        <div class="fwxwb">
            <div class="fwxwb_1">
                <span>关注微信</span><img width="95" alt="" src="images/num.png">
            </div>
            <div>
                <span>关注微博</span><img width="95" alt="" src="images/wb.png">
            </div>
        </div>
        <div class="fmenu">
        <p>
            @foreach($date as $k=>$v)
                <a href="{{$v['nav_url']}}">{{$v['nav_name']}}</a> | 
            @endforeach
                <a href="https://www.mobantu.com/advertisement">广告合作</a> 
        </p>
        </div>
        <div class="copyright">
            <div><a href="/">谋刻网</a>所有&nbsp;晋ICP备12006957号-9</div>
        </div>
    </div>
</div>
<!--右侧浮动-->
<div class="rmbar">
	<span class="barico qq" style="position:relative">
	<div  class="showqq">
	   <p>官方客服QQ:<br>335049335</p>
	</div>
	</span>
    <span class="barico em" style="position:relative">
	  <img src="images/num.png" width="75" class="showem">
	</span>
    <span class="barico wb" style="position:relative">
	  <img src="images/wb.png" width="75" class="showwb">
	</span>
    <span class="barico top" id="top">置顶</span>
</div>
</body>
@endsection

