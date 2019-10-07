@extends('admin.first')
@section('title','目录修改')

@section('content')
    <h3>目录修改</h3><br/>
    <form>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">目录名称</label>
            <input type="text" class="form-control" id="c_name" value="{{$a[0]['cata_name']}}">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择课程</label>
            <select class="form-control" name="cou_id" id="cou_id">
                @foreach($info as $k => $v)
                    @if($v['cou_id'] == $a[0]['cou_id'])
                        <option value="{{$v->cou_id}}" selected>{{$v->cou_name}}</option>
                    @else
                        <option value="{{$v->cou_id}}">{{$v->cou_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">父级目录</label>
            <select class="form-control" name="pid" id="pid">
                @foreach($data as $k => $v)
                    @if($v['pid'] == $data[0]['pid'])
                        <option value="{{$v['cata_id']}}" selected>{{$v['cata_name']}}</option>
                    @else
                        <option value="{{$v['cata_id']}}">{{$v['cata_name']}}</option>
                    @endif
                    @foreach($v['son'] as $key => $val)
                        @if($val['pid'] == $data[0]['pid'])
                            <option value="{{$val['cata_id']}}" selected>|——{{$val['cata_name']}}</option>
                        @else
                            <option value="{{$val['cata_id']}}">|——{{$val['cata_name']}}</option>
                        @endif
                        @foreach($val['son'] as $kk => $vv)
                            @if($vv['pid'] == $data[0]['pid'])
                                <option value="{{$vv['cata_id']}}" selected>|——|——{{$vv['cata_name']}}</option>
                            @else
                                <option value="{{$vv['cata_id']}}">|——|——{{$vv['cata_name']}}</option>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">目录描述</label>
            <div id="editor">
                <p>{{$a[0]['cata_text']}}</p>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">是否展示</label>
            <div>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="show" value="0" @if($a[0]['show']==1)checked @endif> 是
                </label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="show" value="1" @if($a[0]['show']==2)checked @endif> 否
                </label>
            </div>
        </div>

        <button type="button" class="btn btn-success" >修改目录</button>
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