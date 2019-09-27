@extends('admin.first')
@section('title','目录展示')

@section('content')
    <h3>目录展示</h3><br>
    <table class="table table-striped">
        <tr>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">目录名称</th>
            <th style="text-align: center">所属课程</th>
            <th style="text-align: center">PID</th>
            <th style="text-align: center">添加时间</th>
            <th style="text-align: center">操作</th>
        </tr>

        <?php $num=1?>
        @foreach($data as $k => $v)
            <tr align="center">
                <input type="hidden" class="cid" cid="{{$v->cata_id}}">
                <td>{{$num++}}</td>
                <td>{{$v->cata_name}}</td>
                <td>{{$v->cou_name}}</td>
                <td>
                    @if($v->pid==0)父级
                    @elseif($v->pid==1)子级
                        @else孙级
                    @endif
                </td>
                <td>{{date('Y-m-d H:i',$v['c_time'])}}</td>
                <td>
                    <a href="/admin/updcata/{{$v->cata_id}}"><svg t="1569305067736" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2960" width="20" height="20"><path d="M785.58642379 380.11891358l-189.57606811-184.8471198-405.15164288 404.71926707-70.61447363 258.30569403v0.42719763l257.87072917-71.73683832z m-30.8954504-343.19115758l-101.54358202 101.37658659 190.18320655 184.15971999 98.53248601-98.44963556c51.71939303-51.63265897 51.71939303-135.45012844 0-187.08408193-51.63136443-51.6339535-135.53945157-51.6339535-187.17211054-0.00258909zM50.16440983 903.15768415h930.48821887v122.64067223h-930.48821887z" fill="#2C2C2C" p-id="2961"></path></svg></a>

                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <a href="" class="del"><svg t="1569304953314" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2253" width="20" height="20"><path d="M517.59 21.609c-100.299 0-181.703 79.514-185.167 179.34H98.603c-25.979 0-47.235 21.099-47.235 47.236 0 25.98 21.099 47.237 47.236 47.237h52.117v528.416c0 99.196 67.233 180.285 150.37 180.285h423.55c82.98 0 150.37-80.616 150.37-180.285V295.737h47.236c25.98 0 47.236-21.1 47.236-47.237 0-25.98-21.099-47.236-47.236-47.236H702.441C699.449 101.124 617.888 21.61 517.59 21.61z m-96.677 179.34c3.464-51.172 45.19-90.85 96.834-90.85s93.37 39.835 96.362 90.85H420.913z m-119.98 714.842c-29.444 0-61.88-37.789-61.88-91.953V295.737h547.311V824.31c0 54.007-32.436 91.954-61.88 91.954H300.933v-0.473z m0 0" p-id="2254"></path><path d="M364.387 802.267c21.57 0 39.363-21.571 39.363-48.653V476.022c0-27.082-17.635-48.654-39.363-48.654-21.572 0-39.364 21.572-39.364 48.654v277.592c0 26.924 17.32 48.653 39.364 48.653z m142.496 0c21.571 0 39.363-21.571 39.363-48.653V476.022c0-27.082-17.635-48.654-39.363-48.654-21.571 0-39.364 21.572-39.364 48.654v277.592c0 26.924 17.793 48.653 39.364 48.653z m149.896 0c21.571 0 39.364-21.571 39.364-48.653V476.022c0-27.082-17.635-48.654-39.364-48.654-21.571 0-39.363 21.572-39.363 48.654v277.592c0 26.924 17.162 48.653 39.363 48.653z m0 0" p-id="2255"></path></svg></a>
                </td>
            </tr>
        @endforeach
    </table>

    <script>
        $(document).ready(function(){
            layui.use('layer', function () {
                var layer = layui.layer;
                $('.del').click(function () {
                    var id = $(this).parent('td').siblings('input').attr('cid');
//                alert(id);
                    $.post(
                            '/admin/delcata',
                            {id: id},
                            function (res) {
                                if (res.error == 10001) {
                                    layer.msg(res.msg,{icon:6});
                                    location.href = '/admin/consult'
                                } else {
                                    layer.msg(res.msg,{icon:2});
                                }
                            }, 'json'
                    );
                });
            });
        });
    </script>

@endsection