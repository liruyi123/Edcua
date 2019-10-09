@extends('index.ments')
<link rel="stylesheet" href="css/course.css"/>
<script src="js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="css/tab.css" media="screen">
<script src="js/jquery.tabs.js"></script>
<script src="js/mine.js"></script>
@section('content')
    <div class="main-container">
    <script src="/index/js/init.js"></script>
    <script src="/index/js/home.js"></script>
    <link rel="stylesheet" href="/index/css/style2.css"/>
    <link rel="stylesheet" href="/index/css/ui1.css"/>
        {{--<link rel="shortcut icon" href="favicon.ico">--}}
        <link href="/index/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
        {{--<link href="/index/css/font-awesome.css?v=4.4.0" rel="stylesheet">--}}
        {{--<link href="/index/css/animate.css" rel="stylesheet">--}}
        {{--<link href="/index/css/style.css?v=4.1.0" rel="stylesheet">--}}
        <div class="uk-grid">
            <div class="uk-width-1-4">
                <div class="pb pb-category">
                    <div class="body">
                        @foreach($type as $k=>$v)
                        <a class="title" href="javascript:;"><i class="uk-icon-circle-o"></i> {{$v['cate_name']}}</a>
                        <div class="title-box">
                            @foreach($v['son'] as $kk=>$vv)
                                <a href="/index/question?id={{$vv['cate_id']}}">{{$vv['cate_name']}}</a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="uk-width-3-4">

                <div class="pb">
                    <div class="body">
                        <div class="pb-search-home">
                            <input type="text" placeholder="搜索 题目" id="keyword" onkeypress="if(event.keyCode==13){window.location.href='/search?keywords='+window.api.util.urlencode($('#keyword').val());}" />
                            <a href="javascript:;" onclick="window.location.href='/index/question?keywords='+window.api.util.urlencode($('#keyword').val());"><span class="uk-icon-search"></span> 搜索</a>
                        </div>
                    </div>
                </div>
                
                <div class="pb pb-question-list">

                    <div class="body">
                        @foreach($data as $k=>$v)

                        <div class="item">
                            <div class="title">
                                <a  href="javascript:;" class="" data-toggle="modal" data-target="#myModal2_{{$v['b_id']}}">
                                    @if($v['b_type'] == 1)
                                        [判断题]
                                    @elseif($v['b_type'] == 2)
                                        [选择题]
                                    @elseif($v['b_type'] == 3)
                                        [回答题]
                                    @endif
                                    {{$v['b_name']}}
                                </a>
                                <div class="modal inmodal" id="myModal2_{{$v['b_id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content animated flipInY">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title">{{$v['b_name']}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                @if($v['b_type'] == 1)
                                                    <label class="radio-inline">
                                                        <input type="radio" value="1" id="radio" name="optionsRadios">√
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" value="2" id="radio" name="optionsRadios">×
                                                    </label>
                                                @elseif($v['b_type'] == 2)
                                                    <label class="radio-inline">
                                                        <input type="radio" value="A" id="radio" name="optionsRadios">{{$v['b_choiceA']}}
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" value="B" id="radio" name="optionsRadios">{{$v['b_choiceB']}}
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" value="C" id="radio" name="optionsRadios">{{$v['b_choiceC']}}
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" value="D" id="radio" name="optionsRadios">{{$v['b_choiceD']}}
                                                    </label>
                                                @elseif($v['b_type'] == 3)
                                                    <input type="text" id="c_answer" class="form-control" placeholder="简要回答">
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" aid="{{$v['b_id']}}">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                                <button type="button" class="btn bbb btn-primary">提交</button>
                                                <input type="hidden"  bid="{{$v['b_type']}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tags">
                                {{--<div class="right">--}}
                                    {{--<span>正确率 81%</span>--}}
                                    {{--|--}}
                                    {{--<span>评论 1</span>--}}
                                    {{--|--}}
                                    {{--<span>点击 370</span>--}}
                                {{--</div>--}}
                                {{--<a href="/question/list/1" target="_blank">Java工程师</a>--}}
                            </div>
                        </div>
                        @endforeach

                        <a class="more" href="/index/question">查看更多 <i class="uk-icon-angle-double-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="main-container">
            <div class="articles">
                <a href="/article/1">关于我们</a>
                <a href="/article/2">联系我们</a>
            </div>
            <div class="copyright">
                <a href="http://www.miitbeian.gov.cn" target="_blank">沪ICP备09061954号-8</a>
                &copy;
                demo-tiku.tecmz.com
            </div>
        </div>
    </footer>
    <!-- 全局js -->
    <script src="/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- 自定义js -->
    <script src="/admin/js/content.js?v=1.0.0"></script>


    <script src="/layui/layui.js"></script>
    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/js/jquery-1.8.0.min.js"></script>
    <script src="http://tecmz-demo-tiku.c.ecuster.com/assets/main/default/home.js?1015598456"></script>
    <script>
        $(document).ready(function () {
            layui.use('layer', function () {
                var layer = layui.layer;

                $('.bbb').click(function () {

                    var answer = $('input:radio:checked').val();
                    var b_id = $(this).siblings(":first").attr("aid");
                    var type = $(this).next().attr("bid");
                    var c_answer = $("#c_answer").val();
                    // alert(b_id);
                    $.ajax({
                        type : 'post',
                        url : 'review',
                        dataType:"json",
                        data:{answer:answer,c_answer:c_answer,b_id:b_id,type:type},
                        success : function (msg) {
                            // console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                            }else{
                                layer.msg(msg.message,{icon:2});
                            }
                        }
                    })

                })


            });
        });
    </script>
@endsection