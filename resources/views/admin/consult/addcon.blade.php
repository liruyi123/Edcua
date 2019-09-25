@extends('admin.first')
@section('title','资讯添加')

@section('content')
    <h3>资讯添加</h3><br/>
    <form>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputEmail1">资讯名称</label>
            <input type="text" class="form-control" id="title" placeholder="请填写资讯名称">
        </div>
        <div class="form-group" style="width: 300px">
            <label for="exampleInputPassword1">选择父级导航栏</label>
            <select class="form-control" name="consult_id" id="nid">
                <option value="">请选择对应资讯导航栏</option>
                @foreach($data as $k => $v)
                    <option value="{{$v->navbar_id}}">{{$v->ntitle}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">资讯内容</label>
            <div id="editor"></div>
        </div>

        <button type="button" class="btn btn-success">创建资讯</button>
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
            $(".btn-success").click(function () {
                var title = $("#title").val();
                var nid = $("#nid").val();
                var text = $(".w-e-text").children("p").text();

                $.post(
                        '/admin/addcon',
                        {title:title,nid:nid,text:text},
                        function(res){
                            if(res.error==10001){
                                alert(res.msg);
                                location.href=''
                            }else{
                                alert(res.msg);
                            }
                        },'json'
                );
            })
        });
    </script>
@endsection