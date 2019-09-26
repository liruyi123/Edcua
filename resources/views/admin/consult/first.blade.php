@extends('admin.first')
@section('title','资讯展示')

@section('content')
    <h3>资讯展示</h3><br>
    <table class="table table-striped">
        <tr>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">所属资讯栏</th>
            <th style="text-align: center">栏目名称</th>
            <th style="text-align: center">是否显示</th>
            <th style="text-align: center">添加时间</th>
            <th style="text-align: center">操作</th>
        </tr>

        <?php $num=1?>
        @foreach($data as $k => $v)
            <tr align="center">
                <input type="hidden" class="cid" cid="{{$v->consult_id}}">
                <td>{{$num++}}</td>
                <td>{{$v->ntitle}}</td>
                <td>{{$v->title}}</td>
                <td>
                    @if($v->show==0)展示
                        @else隐藏
                    @endif
                </td>
                <td>{{date('Y-m-d H:i',$v['c_time'])}}</td>
                <td>
                    <a href="/admin/updcon/{{$v->consult_id}}"><button type="button" class="btn btn-link">UPD</button></a> |
                    <input type="submit" class="btn btn-link del" value="DEL" >
                </td>
            </tr>
        @endforeach
    </table>
    <div>
        {{$data->appends(10)->links()}}
    </div>

    <script>
        $(function(){
            layui.use('layer', function () {
                var layer = layui.layer;
                $('.del').click(function () {
                    var id = $(this).parent('td').siblings('input').attr('cid');
//                alert(id);
                    $.post(
                            '/admin/delcon',
                            {id: id},
                            function (res) {
                                if (res.error == 10001) {
                                    alert(res.msg);
                                    location.href = '/admin/consult'
                                } else {
                                    alert(res.msg);
                                }
                            }, 'json'
                    );
                });
            });
        });
    </script>

@endsection