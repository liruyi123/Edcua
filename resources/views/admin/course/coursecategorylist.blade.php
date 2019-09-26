@extends('admin.first')
@section('title','课程分类列表')
@section('content')

    <body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h1>课程分类列表</h1>
                    </div>
                    <br>
                    <br>
                    <form action="/admin/courseCategoryListselect" method="post">
                        <div class="col-sm-5">
                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Keyword search for course name" value="{{$keyword}}">
                        </div>
                        <div class="col-sm-7 control-label">
                            <input type="submit" id="btn" value="搜&nbsp;&nbsp;&nbsp;&nbsp;所"  class="btn btn-primary  block full-width m-b">
                        </div>
                    </form>

                    <br>
                    <br>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>课程分类id</th>
                                    <th>课程分类名称</th>
                                    <th>是否展示</th>
                                    <th>父分类</th>
                                    <th>权重</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody id="type0">
                                @foreach($arr as $k=>$v)
                                    <tr >
                                        <input type="hidden" class="cate_id" cid="{{$v['cate_id']}}">
                                        <td>{{$v['cate_id']}}</td>
                                        <td>{{$v['cate_name']}}</td>
                                        <td>
                                            @if($v['is_show'] == 1)
                                                展示
                                            @elseif($v['is_show'] == 2)
                                                隐藏
                                            @endif
                                        </td>
                                        <td>{{$v['pid']}}</td>
                                        <td>{{$v['cate_weight']}}</td>
                                        <td>{{date('Y-m-d H:i:s',$v['ctime'])}}</td>
                                        <td>
                                            <a href="javascript:;"  class="del"><svg t="1569304953314" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2253" width="20" height="20"><path d="M517.59 21.609c-100.299 0-181.703 79.514-185.167 179.34H98.603c-25.979 0-47.235 21.099-47.235 47.236 0 25.98 21.099 47.237 47.236 47.237h52.117v528.416c0 99.196 67.233 180.285 150.37 180.285h423.55c82.98 0 150.37-80.616 150.37-180.285V295.737h47.236c25.98 0 47.236-21.1 47.236-47.237 0-25.98-21.099-47.236-47.236-47.236H702.441C699.449 101.124 617.888 21.61 517.59 21.61z m-96.677 179.34c3.464-51.172 45.19-90.85 96.834-90.85s93.37 39.835 96.362 90.85H420.913z m-119.98 714.842c-29.444 0-61.88-37.789-61.88-91.953V295.737h547.311V824.31c0 54.007-32.436 91.954-61.88 91.954H300.933v-0.473z m0 0" p-id="2254"></path><path d="M364.387 802.267c21.57 0 39.363-21.571 39.363-48.653V476.022c0-27.082-17.635-48.654-39.363-48.654-21.572 0-39.364 21.572-39.364 48.654v277.592c0 26.924 17.32 48.653 39.364 48.653z m142.496 0c21.571 0 39.363-21.571 39.363-48.653V476.022c0-27.082-17.635-48.654-39.363-48.654-21.571 0-39.364 21.572-39.364 48.654v277.592c0 26.924 17.793 48.653 39.364 48.653z m149.896 0c21.571 0 39.364-21.571 39.364-48.653V476.022c0-27.082-17.635-48.654-39.364-48.654-21.571 0-39.363 21.572-39.363 48.654v277.592c0 26.924 17.162 48.653 39.363 48.653z m0 0" p-id="2255"></path></svg></a>
                                            &nbsp;&nbsp;<a href="CCGUpd?id={{$v['cate_id']}}"><svg t="1569305067736" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2960" width="20" height="20"><path d="M785.58642379 380.11891358l-189.57606811-184.8471198-405.15164288 404.71926707-70.61447363 258.30569403v0.42719763l257.87072917-71.73683832z m-30.8954504-343.19115758l-101.54358202 101.37658659 190.18320655 184.15971999 98.53248601-98.44963556c51.71939303-51.63265897 51.71939303-135.45012844 0-187.08408193-51.63136443-51.6339535-135.53945157-51.6339535-187.17211054-0.00258909zM50.16440983 903.15768415h930.48821887v122.64067223h-930.48821887z" fill="#2C2C2C" p-id="2961"></path></svg></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$arr->appends(['keyword'=>$keyword])->render()}}
                </div>
            </div>

        </div>
    </div>


    <script src="/admin/js/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            layui.use('layer', function () {
                var layer = layui.layer;
                $('.del').click(function () {
                    var cid = $(this).parents('td').siblings('input').attr('cid');
                    // console.log(nid);
                    $.ajax({
                        url:"/admin/CCGDel",
                        type:"post",
                        data:{cid:cid},
                        dataType:"json",
                        success:function (res) {
                            // console.log(res)
                            if(res.code == '200'){
                                layer.msg(res.message,{icon:6});
                                window.location.href = "courseCategoryList";
                            }else{
                                layer.msg(res.message,{icon:2});
                            }
                        }
                    })
                })
            });
        });
    </script>

@endsection