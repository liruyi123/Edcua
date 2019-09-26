@extends('admin.first')
@section('title','目录添加')

@section('content')
    <h3>目录添加</h3><br/>
    <form>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">目录名称</label>
            <input type="text" class="form-control" id="c_name" placeholder="请填写目录名称">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择课程</label>
            <select class="form-control" name="cou_id" id="cou_id">
                <option value="">请选择对应课程</option>
                @foreach($data as $k => $v)
                    <option value="{{$v->cou_id}}">{{$v->cou_name}}</option>
                @endforeach    
            </select>
        </div>

        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">父级目录</label>
            <select class="form-control" name="pid" id="pid">
                <option value="0">选择父级目录</option>
                @foreach($a as $k => $v)
                    <option value="{{$v['cata_id']}}">{{$v['cata_name']}}</option>
                    @foreach($v['son'] as $key => $val)
                        <option value="{{$val['cata_id']}}">|——{{$val['cata_name']}}</option>
                        @foreach($val['son'] as $kk => $vv)
                            <option value="{{$vv['cata_id']}}">|——|——{{$vv['cata_name']}}</option>
                        @endforeach
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">目录描述</label>
            <div id="editor"></div>
        </div>

        <button type="button" class="btn btn-success" >创建目录</button>
    </form>


    <script type="text/javascript" src="/Editor/release/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
    </script>

    <script>
        $(document).ready(function(){
            layui.use('layer', function () {
                var layer = layui.layer;
                    $(".btn").click(function () {
                        var c_name = $("#c_name").val();
                        var cou_id = $("#cou_id").val();
                        var pid = $("#pid").val();
                        var text = $(".w-e-text").children("p").text();

                        $.post(
                                '/admin/addcata',
                                {c_name:c_name,cou_id:cou_id,pid:pid,text:text},
                                function (res) {
                                    if (res.error == 10001) {
                                        layer.msg(res.msg,{icon:6});
                                        location.href = ''
                                    } else {
                                        layer.msg(res.msg,{icon:2});
                                    }
                                },'json'
                        );
                    })

            });
        });
    </script>
@endsection