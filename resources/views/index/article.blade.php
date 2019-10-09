@extends('index.ments')
<link rel="stylesheet" href="/index/css/article.css">
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script src="/index/js/mine.js"></script>
@section('content')
<body>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
<div class="coursepic">
	<h3 class="righttit">全部资讯</h3>
    <div class="clearh"></div>
    <span class="bread nob">

        @foreach($data as $k=>$v)
        <a class="fombtn cur" href="{{$v->url}}">{{$v->ntitle}}</a>
        @endforeach
    </span>
    
</div>
<div class="clearh"></div>
<div class="coursetext">
    @foreach($arr as $k=>$v)
	<div class="articlelist">
    	<h3><a class="artlink" href="{{$v->url}}/{{$v->consult_id}}">{{$v->title}}</a></h3>
        <p>{{$v->count}}</p>
        <p class="artilabel">
            @if($v->navbar == 1)
                <span class="ask_label">全部咨询</span>
                @else
                <span class="ask_label">热门资讯</span>
            @endif
        <b class="labtime">{{date("Y-m-d",$v->c_time)}}</b>
        </p>
        <div class="clearh"></div>
    </div>
    @endforeach
	<div class="clearh" style="height:20px;"></div>
	<span class="pagejump">
    	<p class="userpager-list">
       	   <a href="#" class="page-number">首页</a>
           <a href="#" class="page-number">上一页</a>
           <a href="#" class="page-number">1</a>
           <a href="#" class="page-number pageractive">2</a>
           <a href="#" class="page-number">3</a>
            <a href="#" class="page-number">...</a>
            <a href="#" class="page-number">10</a>
           <a href="#" class="page-number">下一页</a>
           <a href="#" class="page-number">末页</a>
        </p>
    </span>
    <div class="clearh" style="height:10px;"></div>
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">热门资讯</h3>
    <div class="gonggao">
	<ul class="hotask">

        @foreach($hotask as $key=>$val)
        	<li><a class="ask_link" href="{{$val->url}}/{{$val->consult_id}}"><strong>●</strong>{{$val->title}}?</a></li>
            @endforeach
        </ul>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">推荐课程</h3>
    <div class="teacher">
        @foreach($course as $ka => $va)
    <div class="teapic">
        <a href="#"  target="_blank"><img src="{{$va->path}}" height="60" title="{{$va->cou_name}}"></a>
        <h3 class="courh3"><a href="#" class="ask_link" target="_blank">{{$va->cou_name}}</a></h3>
    </div>
    <div class="clearh"></div>
            @endforeach

    </div>
    </div>
</div>
   
</div>



<div class="clearh"></div>
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
	     <p><a href="#">关于我们</a> | <a href="#">联系我们</a> | <a href="#">优秀讲师</a> | <a href="#">帮助中心</a> | <a href="#">意见反馈</a> | <a href="#">加入我们</a></p>
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
