@extends('index.ments')
<link rel="stylesheet" href="/index/css/style.css"/>
<link rel="stylesheet" href="/index/css/tab.css" media="screen">
<link rel="stylesheet" type="text/css" href="/index/css/main.css" id="main-css">
<link rel="stylesheet" type="text/css" href="/rs-plugin/css/settings.css" id="main-css">

@section('content')
		<!--课程选项卡-->
<script type="text/javascript">
function nTabs(thisObj,Num){
	if(thisObj.className == "current")return;
	var tabObj = thisObj.parentNode.id;
	var tabList = document.getElementById(tabObj).getElementsByTagName("li");
	for(i=0; i <tabList.length; i++)
		{
		if (i == Num)
		{
		   thisObj.className = "current"; 
		   document.getElementById(tabObj+"_Content"+i).style.display = "block";
		}else{
		   tabList[i].className = "normal"; 
		   document.getElementById(tabObj+"_Content"+i).style.display = "none";
		}
		} 
}
</script>

	<div class="content">
		<div class="fullwidthbanner-container">
			<div id="revolution-slider" style="max-height:500px !important; background:#46B0AC">
				<ul>
					<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="images-slider/thumbs/thumb1.jpg">
						<!--  BACKGROUND IMAGE -->
						<img src="/index/images-slider/wide2.jpg" alt="" />

						<!-- THE CAPTIONS IN THIS SLIDE -->
						<div class="tp-caption sfl"
							 data-x="-130"
							 data-y="100"
							 data-speed="300"
							 data-start="300"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/rb.png" alt="">
						</div>

						<div class="caption sfb"
							 data-x="0"
							 data-y="130"
							 data-speed="300"
							 data-start="800"
							 data-easing="easeOutExpo">
							<h2>谋刻网全新上线</h2>
						</div>

						<div class="tp-caption med-white sfl"
							 data-x="0"
							 data-y="220"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutExpo" style="font-size:20px;">
							请自备小板凳，强势围观。
						</div>

						<div class="tp-caption small-white sfr"
							 data-x="0"
							 data-y="260"
							 data-speed="300"
							 data-start="1200"
							 data-easing="easeOutExpo">
							<a href="#" class="btn btn-large btn-primary">在线测评</a>
						</div>

						<div class="tp-caption small-white lfb"
							 data-x="300"
							 data-y="90"
							 data-speed="1000"
							 data-start="1400"
							 data-easing="easeOutExpo">
							<img src="/index/images-slider/slider-10.png" alt="" />
						</div>
					</li>
					<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="images-slider/thumbs/thumb1.jpg">
						<!--  BACKGROUND IMAGE -->
						<img src="/index/images-slider/wide3.jpg" alt="" />

						<!-- THE CAPTIONS IN THIS SLIDE -->
						<div class="tp-caption sfl"
							 data-x="-130"
							 data-y="150"
							 data-speed="300"
							 data-start="300"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/rb.png" alt="">
						</div>

						<div class="tp-caption med-white lfl"
							 data-x="0"
							 data-y="200"
							 data-speed="300"
							 data-start="800"
							 data-easing="easeOutExpo" style="font-size:18px; line-height:25px;">
							<p>我们一直致力于优秀的职业教育，<br/>为你搭建成就梦想的舞台。</p>
						</div>

						<div class="caption sfb very-big-white"
							 data-x="700"
							 data-y="230"
							 data-speed="300"
							 data-start="1200"
							 data-easing="easeOutExpo">
							<i>winner</i>
						</div>
						<div class="tp-caption med-white lfl"
							 data-x="0"
							 data-y="150"
							 data-speed="300"
							 data-start="800"
							 data-easing="easeOutExpo" style="font-size:22px; line-height:30px;">
							<h2 style="font-size:30px">职业教育在线测评与学习平台</h2>
						</div>

						<div class="tp-caption small-white lfr"
							 data-x="0"
							 data-y="280"
							 data-speed="300"
							 data-start="1600"
							 data-easing="easeOutExpo">
							<a href="#" class="btn btn-large btn-primary">在线学习</a>
						</div>


						<div class="tp-caption lfb"
							 data-x="390"
							 data-y="90"
							 data-speed="1000"
							 data-start="2000"
							 data-easing="easeOutExpo"
							 data-endeasing="fade" style="left:700px"
						>
							<img src="/index/images-slider/guy-shadow.png" alt="">
						</div>

						<div class="tp-caption small-white lft"
							 data-x="240"
							 data-y="0"
							 data-speed="2000"
							 data-start="2600"
							 data-easing="easeOutExpo">
							<img src="/index/images-slider/spotlight.png" alt="">
						</div>

						<div class="tp-caption fade"
							 data-x="390"
							 data-y="90"
							 data-speed="2000"
							 data-start="2600"
							 data-easing="easeOutExpo">
							<img src="/index/images-slider/guy.png" alt="">
						</div>
					</li>
					<!-- THE FIRST SLIDE -->
					<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-thumb="images-slider/thumbs/thumb1.jpg">
						<!--  BACKGROUND IMAGE -->
						<img src="/index/images-slider/wide1.jpg" alt="" />

						<!-- THE CAPTIONS IN THIS SLIDE -->
						<div class="caption large_text sfb"
							 data-x="300"
							 data-y="207"
							 data-speed="300"
							 data-start="800"
							 data-easing="easeOutExpo">
							<img src="/index/images-slider/our-features.png" alt="">
						</div>

						<div class="tp-caption sfr"
							 data-x="220"
							 data-y="115"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/lu.png" alt="">
						</div>

						<div class="tp-caption sfr"
							 data-x="-50"
							 data-y="110"
							 data-speed="300"
							 data-start="1200"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/clean.png" alt="">
						</div>

						<div class="tp-caption sfr"
							 data-x="180"
							 data-y="217"
							 data-speed="300"
							 data-start="1400"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/lm.png" alt="">
						</div>

						<div class="tp-caption sfr"
							 data-x="-20"
							 data-y="230"
							 data-speed="300"
							 data-start="1600"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/responsive.png" alt="">
						</div>

						<div class="tp-caption sfr"
							 data-x="220"
							 data-y="285"
							 data-speed="300"
							 data-start="1800"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/lb.png" alt="">
						</div>

						<div class="tp-caption sfr"
							 data-x="40"
							 data-y="360"
							 data-speed="300"
							 data-start="2000"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/bootstrap.png" alt="">
						</div>

						<div class="tp-caption sfl"
							 data-x="625"
							 data-y="115"
							 data-speed="300"
							 data-start="2200"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/ru.png" alt="">
						</div>

						<div class="tp-caption sfl"
							 data-x="730"
							 data-y="85"
							 data-speed="300"
							 data-start="2400"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/solid.png" alt="">
						</div>

						<div class="tp-caption sfl"
							 data-x="650"
							 data-y="217"
							 data-speed="300"
							 data-start="2600"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/rm.png" alt="">
						</div>

						<div class="tp-caption sfl"
							 data-x="770"
							 data-y="217"
							 data-speed="300"
							 data-start="2800"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/lightweight.png" alt="">
						</div>

						<div class="tp-caption sfl"
							 data-x="625"
							 data-y="285"
							 data-speed="300"
							 data-start="3000"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/rb.png" alt="">
						</div>

						<div class="tp-caption sfl"
							 data-x="730"
							 data-y="345"
							 data-speed="300"
							 data-start="3200"
							 data-easing="easeOutBack">
							<img src="/index/images-slider/fresh.png" alt="">
						</div>
					</li>
				</ul>
			</div>
		</div>

		<div class="td1">
			<div class="tdcont">
				<span class="tdimg"><img src="/index/images/ico4.jpg" width="450"></span>
				<span class="tdtext">
        	<h3>完全免费课程</h3>
            <p>精心录制视频课程与讲解，全部课程完全免费。</p><br/>
            <p><a href="/index/courselist" class="btninto">开始学习</a></p>
        </span>
				<div style="clear:both"></div>
			</div>
		</div>
		<div class="td2">
			<div class="tdcont">
				<span class="tdimg1"><img src="/index/images/ico5.jpg" width="500"></span>
				<span class="tdtext1">
        	<h3 class="co1">智能评估题库</h3>
            <p>智能能力评估，学员可以通过具体题目，匹配相
关知识点,文字解析与视频解析相结合。</p><br/>
			<p><a href="/index/question" class="btninto">点击测评</a></p>
        </span>
				<div style="clear:both"></div>
			</div>
		</div>
		<div class="td1">
			<div class="tdcont np">
				<span class="tdimg" style="margin-top:80px"><img src="/index/images/ico6.jpg" width="550"></span>
				<span class="tdtext" style="margin-top:120px">
        	<h3 class="co2">智能匹配练习</h3>
            <p class="tex1">跟随视频课程同步练习，紧扣重点难
点，点点精通。</p><br/>
			<p><a href="training.html" class="btninto">开始练习</a></p>
        </span>
				<div style="clear:both"></div>
			</div>
		</div>
		<div class="td2 np">
			<div class="tdcont np">
				<span class="tdimg1 ni"><img src="/index/images/ico7.png" width="300"></span>
				<span class="tdtext1" style="margin-top:100px;">
        	<h3 class="co3">全天答疑解惑</h3>
            <p class="tex1">谋刻答疑社区，老师学员共同交流，我们的讲师更是倾囊相授，有问必答。</p><br/>
            <p><a href="#" class="btninto">提问问题</a></p>
        </span>
				<div style="clear:both"></div>
			</div>
		</div>

		<div class="crdiv">

			<div class="course">
				<h2 style="text-align:center; font-weight:normal; font-size:34px">精品课程</h2>
				<div class="clearh" style="height:20px;"></div>

				<div>
					<ul id="myTab3">
						<li class="current" onClick="nTabs(this,0);">{{$data[0]['cate_name']}}</li>
						<li class="norma3" onClick="nTabs(this,1);">{{$data[1]['cate_name']}}</li>
						<li class="norma3" onClick="nTabs(this,2);">{{$data[2]['cate_name']}}</li>
						<li class="norma3" onClick="nTabs(this,3);">{{$data[3]['cate_name']}}</li>
					</ul>
					<div class="clearh"></div>
					<div>
						<ul class="courseul" id="myTab3_Content0" style="display: block;">
							<li>
								<div class="courselist">
								<a href="/index/coursecont/{{$data[0]['cou_id']}}"><img width="263" style="border-radius:3px 3px 0 0;" src="{{$data[0]['path']}}" ></a>
									<p class="courTit">HTTP下载课程</p>
									<div class="gray">
										<span>{{$data[1]['cou_duration']}}分钟前更新</span>
										<span class="sp1">{{$data[0]['user_id']}}人学习</span>
										<div style="clear:both"></div>
									</div>
								</div>
							</li>
							<li>
								<div class="courselist">
								<a href="/index/coursecont/{{$data[1]['cou_id']}}"><img width="263" style="border-radius:3px 3px 0 0;" src="{{$data[0]['path']}}" ></a>
									<p class="courTit">HTTP下载课程</p>
									<div class="gray">
										<span>{{$data[2]['cou_duration']}}分钟前更新</span>
										<span class="sp1">{{$data[1]['user_id']}}人学习</span>
										<div style="clear:both"></div>
									</div>
								</div>
							</li>
							<div class="clearh"></div>
						</ul>
					</div>
					<div>
						<ul class="courseul" id="myTab3_Content1" style="display: none;">
						<li>
								<div class="courselist">
								<a href="/index/coursecont/{{$data[2]['cou_id']}}"><img width="263" style="border-radius:3px 3px 0 0;" src="{{$data[0]['path']}}" ></a>
									<p class="courTit">HTTP下载课程</p>
									<div class="gray">
										<span>{{$data[0]['cou_duration']}}分钟前更新</span>
										<span class="sp1">{{$data[0]['user_id']}}人学习</span>
										<div style="clear:both"></div>
									</div>
								</div>
							</li>
							<li>
								<div class="courselist">
								<a href="/index/coursecont/{{$data[3]['cou_id']}}"><img width="263" style="border-radius:3px 3px 0 0;" src="{{$data[0]['path']}}" ></a>
									<p class="courTit">HTTP下载课程</p>
									<div class="gray">
										<span>{{$data[0]['cou_duration']}}分钟前更新</span>
										<span class="sp1">{{$data[0]['user_id']}}人学习</span>
										<div style="clear:both"></div>
									</div>
								</div>
							</li>
							<li>
								<div class="courselist">
								<a href="/index/coursecont/{{$data[0]['cou_id']}}"><img width="263" style="border-radius:3px 3px 0 0;" src="{{$data[0]['path']}}" ></a>
									<p class="courTit">HTTP下载课程</p>
									<div class="gray">
										<span>{{$data[1]['cou_duration']}}分钟前更新</span>
										<span class="sp1">{{$data[0]['user_id']}}人学习</span>
										<div style="clear:both"></div>
									</div>
								</div>
							</li>
							<div class="clearh"></div>
						</ul>
					</div>
					<div>
						<ul class="courseul" id="myTab3_Content2" style="display: none;">
						<li>
								<div class="courselist">
								<a href="/index/coursecont/{{$data[2]['cou_id']}}"><img width="263" style="border-radius:3px 3px 0 0;" src="{{$data[0]['path']}}" ></a>
									<p class="courTit">HTTP下载课程</p>
									<div class="gray">
										<span>{{$data[3]['cou_duration']}}分钟前更新</span>
										<span class="sp1">{{$data[0]['user_id']}}人学习</span>
										<div style="clear:both"></div>
									</div>
								</div>
							</li>
							<div class="clearh"></div>
						</ul>
					</div>
					<div>
						<ul class="courseul" id="myTab3_Content3" style="display: none;">
						<li>
								<div class="courselist">
								<a href="/index/coursecont/{{$data[3]['cou_id']}}"><img width="263" style="border-radius:3px 3px 0 0;" src="{{$data[0]['path']}}" ></a>
									<p class="courTit">HTTP下载课程</p>
									<div class="gray">
										<span>{{$data[1]['cou_duration']}}分钟前更新</span>
										<span class="sp1">{{$data[0]['user_id']}}人学习</span>
										<div style="clear:both"></div>
									</div>
								</div>
							</li>
							<div class="clearh"></div>
						</ul>
					</div>
				</div>
				<div class="line no"></div>
			</div>
			<span class="morecourse"><a href="/index/courselist" class="btnlink">更多课程</a></span>
		</div>
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
	</div>

	<!--右侧浮动-->
	<div class="rmbar">
	<span class="barico qq" style="position:relative">
	<div  class="showqq">
	   <p>官方客服QQ:<br>335049335</p>
	</div>
	</span>
		<span class="barico em" style="position:relative">
	  <img src="/index/images/num.png" width="75" class="showem">
	</span>
		<span class="barico wb" style="position:relative">
	  <img src="/index/images/wb.png" width="75" class="showwb">
	</span>
		<span class="barico top" id="top">置顶</span>
	</div>

	</body>
@endsection
<script src="/index/js/jquery-1.8.0.min.js"></script>
<script>
function logmine(){
	document.getElementById("lne").style.display="block";
}
function logclose(){
	document.getElementById("lne").style.display="none";	
}

 /*右侧客服飘窗*/
	$(".label_pa li").click(function() {
		$(this).siblings("li").find("span").css("background-color", "#fff").css("color", "#666");
		$(this).find("span").css("background", "#fb5e55").css("color", "#fff");
	});
	$(".em").hover(function() {
		$(".showem").toggle();
	});
	$(".qq").hover(function() {
		$(".showqq").toggle();
	});
	$(".wb").hover(function() {
		$(".showwb").toggle();
	});
	$("#top").click(function() {
		if (scroll == "off") return;
		$("html,body").animate({
			scrollTop: 0
		},
		600);
	});
</script>
