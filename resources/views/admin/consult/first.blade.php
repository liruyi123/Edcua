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
                <td>{{$num++}}</td>
                <td>{{$v->ntitle}}</td>
                <td>{{$v->title}}</td>
                <td>
                    @if($v->show==0)展示
                        @else隐藏
                    @endif
                </td>
                <td>{{date("Y-m-d H:i",$v['ctime'])}}</td>
                <td>
                    <a href=""><button type="button" class="btn btn-link">UPD</button></a> |
                    <input type="submit" class="btn btn-link" value="DEL" >
                </td>
            </tr>
        @endforeach
    </table>


@endsection