@extends("index.ments")


<link rel="stylesheet" href="css/course.css"/>
<script src="js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="css/tab.css" media="screen">
<script src="js/jquery.tabs.js"></script>
<script src="js/mine.js"></script>
@section("content")
<body>


<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont" style="background: none repeat scroll 0 0 #fff;border-radius: 3px;box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);" >
		<h3 class="righttit" style="padding-left:50px;">优秀讲师</h3>
		@foreach($data as $k=>$v)
	<div class="coursepic tecti">
		<div class="teaimg">
		<a href="/index/teacher/{{$v['lect_id']}}" ><img src="{{$v['lect_img']}}" width="150"></a>
		</div>
		<div class="teachtext">
			<h3><a href="/index/teacher/{{$v['lect_id']}}"  class="teatt">{{$v['lect_name']}}</a>&nbsp;&nbsp;</h3>
			<h4>个人简介</h4>
			<p>{{$v['lect_resume']}}</p>
			<h4>授课风格</h4>
			<p>{{$v['lect_style']}}</p>
		</div>
		<div class="clearh"></div>
	</div>
	@endforeach
	<div class="coursepic tecti">	
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
				@foreach($res as $k=>$v)
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
