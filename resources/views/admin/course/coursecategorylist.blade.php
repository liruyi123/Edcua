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
                                            <a href="javascript:;"  class="del">DEL</a>
                                            <a href="CCGUpd?id={{$v['cate_id']}}">UPD</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    {{$arr->links()}}
                </div>
            </div>

        </div>
    </div>


    <script src="/admin/js/jquery.min.js" type="text/javascript"></script>
    <script>
        $(function () {

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
                            alert(res.message);
                            window.location.href = "courseCategoryList";
                        }else{
                            alert(res.message);
                        }
                    }
                })
            })
        })
    </script>

@endsection