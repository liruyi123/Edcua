@extends('index.ments')

<link rel="stylesheet" href="/index/css/course.css"/>
<script src="/index/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<script src="/index/js/jquery.tabs.js"></script>
<script src="/index/js/mine.js"></script>

@section('content')
<body>

<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
<div class="coursepic tecti">
	<div class="teaimg">
    <img src="{{$data['lect_img']}}" width="150"> 
    </div>
    <div class="teachtext">
    	<h3>{{$data['lect_name']}}</h3>
        <h4>个人简介</h4>
        <p>{{$data['lect_resume']}}</p>
        <h4>授课风格</h4>
        <p>{{$data['lect_style']}}</p>
    </div>
    <div class="clearh"></div>
</div>
<div class="clearh"></div>
<div class="tcourselist">
<h3 class="righttit" style="padding-left:50px;">在教课程</h3>
<ul class="tcourseul">
@if($res==null)
该讲师还未上传对应的课程
@else
	@foreach($res as $k=>$v)
	<li>
	    <span class="courseimg tcourseimg"><a href="/index/coursecont"><img width="230" src="{{$v['path']}}"></a></span>
	    <span class="tcoursetext">
	       <h4><a href="/index/coursecont/{{$v['cou_id']}}">{{$v['cou_name']}}</a><a class="state">
					@if($v['status']==1)
						已完成
					@else
						更新中
					@endif
				 </a></h4>
	       <p class="teadec">{{$v['cou_text']}}</p>
	       <p class="courselabel clock">{{$v['cou_duration']}}分钟</p>
	   </span>
		 <div style="height:0" class="clearh"></div>
@endforeach
@endif
<div class="clearh"></div>
</ul>
</div>
<div class="clearh"></div>
</div>
<!-- InstanceEndEditable -->


<div class="clearh"></div>
<div class="foot">
<div class="fcontainer">
      <div class="fwxwb"> 
	       <div class="fwxwb_1">
		       <span>关注微信</span><img width="95" alt="" src="/index/images/num.png">
		   </div>
           <div>
               <span>关注微博</span><img width="95" alt="" src="/index/images/wb.png">
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
