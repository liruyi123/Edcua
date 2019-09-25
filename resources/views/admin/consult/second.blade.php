@extends('admin.first')
@section('title','资讯分类展示')

@section('content')
    <h3>资讯分类展示</h3><br>
    <table class="table table-striped">
        <tr>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">资讯分类名称</th>
            <th style="text-align: center">权重等级</th>
            <th style="text-align: center">添加时间</th>
            <th style="text-align: center">操作</th>
        </tr>

        <?php $num=1;?>
        @foreach($data as $k => $v)
            <tr  style="text-align: center">
                <input type="hidden" class="nid" nid="{{$v->navbar_id}}">
                <td>{{$num++}}</td>
                <td>{{$v->ntitle}}</td>
                <td>
                    @if($v->weight==1)一级权重
                        @elseif($v->weight==2)二级权重
                        @elseif($v->weight==3)三级权重
                        @elseif($v->weight==4)四级权重
                        @elseif($v->weight==5)五级权重
                        @else顶级权重
                    @endif
                </td>
                <td>{{date('Y-m-d H:i',$v['ctime'])}}</td>
                <td>
                    <a href="/admin/updbar/{{$v->navbar_id}}"><button type="button" class="btn btn-link">UPD</button></a> |
                    <input type="submit" class="btn btn-link del" value="DEL" >
                </td>
            </tr>

        @endforeach
    </table>

    <script>
        $(function(){
            $('.del').click(function () {
                var id = $(this).parent('td').siblings('input').attr('nid');
                $.post(
                        '/admin/delbar',
                        {id:id},
                        function(res){
                            if(res.error == 10001){
                                alert(res.msg);
                                location.href = '/admin/navcon'
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            })
        });
    </script>



@endsection