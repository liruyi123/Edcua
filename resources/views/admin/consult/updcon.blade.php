@extends('admin.first')
@section('title','资讯修改')

@section('content')
    <h3>资讯修改</h3><br/>
    <form>
        <input type="hidden" id="consult_id" value="{{$data->consult_id}}">
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">资讯名称</label>
            <input type="text" class="form-control" id="title" value="{{$data->title}}">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择父级导航栏</label>
            <select class="form-control" name="consult_id" id="nid">
                @foreach($info as $k => $v)
                    @if($data['navbar_id'] == $v['navbar_id'])
                        <option value="{{$v->navbar_id}}" selected>{{$v->ntitle}}</option>
                    @else
                        <option value="{{$v->navbar_id}}">{{$v->ntitle}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">资讯内容</label>
            <div id="editor">
                <p>{{$data->count}}</p>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">是否展示</label>
            <div>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="show" value="0" @if($data->show==0)checked @endif> 是
                </label>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="show" value="1" @if($data->show==1)checked @endif> 否
                </label>
            </div>
        </div>

        <button type="button" class="btn btn-success">修改资讯</button>
    </form>

    <script type="text/javascript" src="/Editor/release/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
    </script>

    <script>
        $(function(){
            layui.use('layer', function () {
                $(".btn-success").click(function () {
                    var id = $("#consult_id").val();
                    var title = $("#title").val();
                    var nid = $("#nid").val();
                    var text = $(".w-e-text").children("p").text();
                    var show = $('input:radio:checked').val();

                    $.post(
                            '/admin/updcon',
                            {title: title, nid: nid, text: text, show: show, id: id},
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