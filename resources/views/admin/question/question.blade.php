@extends('admin.first')
@section('title','添加课程')

@section('content')

    <div class="col-md-12">
        <div class="form-group">
            <h3>题目名称：</h3>
            <div class="col-sm-5">
                <input type="text" id="topic" class="form-control" placeholder="The name of the topic">
            </div>
        </div>
        <br>
        <br>
        <h3>所属课程分类：</h3>
        <div class="col-sm-5">
            <select class="form-control" name="" id="type">
                <option value="0">Please select the topic type</option>
                <option value="1">判断题</option>
                <option value="2">选择题</option>
                <option value="3">回答题</option>
            </select>
        </div>
        <br>
        <br>
        {{--选择题模块--}}
        <div id="choice">
            <div class="form-group">
                <h3>选项A：</h3>
                <div class="col-sm-5">
                    <input type="text" id="choiceA" class="form-control" placeholder="ChoiceA As String">
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <h3>选项B：</h3>
                <div class="col-sm-5">
                    <input type="text" id="choiceB" class="form-control" placeholder="ChoiceB As String">
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <h3>选项C：</h3>
                <div class="col-sm-5">
                    <input type="text" id="choiceC" class="form-control" placeholder="ChoiceC As String">
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <h3>选项D：</h3>
                <div class="col-sm-5">
                    <input type="text" id="choiceD" class="form-control" placeholder="ChoiceD As String">
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <h3>真确答案：</h3>
                <div class="col-sm-5">
                    <input type="text" id="answer" class="form-control" placeholder="The correct answer">
                </div>
            </div>
        </div>
        {{--填空题--}}
        <div id="cloze">
            <div class="form-group">
                <h3>真确答案：</h3>
                <div id="editor"></div>
            </div>
        </div>
        {{--判断题--}}
        <div id="TF">
            <div class="form-group">
                <h3>真确答案：</h3>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" value="1" id="radio" name="optionsRadios">正确
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="2" id="radio" name="optionsRadios">错误
                    </label>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="form-group">
            <h3>分值：</h3>
            <div class="col-sm-5">
                <input type="text" id="score" class="form-control" placeholder="Subject score">
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>

        <div class="form-group">
            <div class="col-sm-5">
                <button type="button" id="btn" class="btn btn-primary block full-width m-b btn-lg">提&nbsp;&nbsp;&nbsp;交</button>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="/Editor/release/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
    </script>
    <script src="/admin/js/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            layui.use('layer', function () {
                var layer = layui.layer;
                size = 1024*100;
                index=1;
                totalPage=0;
                var per=0;
                $("input[name='btn']").click(function(){
                    upload(index);
                });
                function upload(index){
                    var objfile = document.getElementById("img").files[0];
                    var filesize = objfile.size;//文件大小
                    var filename = objfile.name;
                    var start = (index-1) * size;
                    per =((start/filesize)*100).toFixed(2);
                    var end = start+size;
                    totalPage = Math.ceil(filesize/size);//多少页
                    var chunk = objfile.slice(start,end);
                    var form = new FormData();
                    form.append("file",chunk,filename);
                    $.ajax({
                        type : "post",
                        data: form,
                        url : "uploadinfo",
                        processData: false,
                        contentType: false,
                        cache:false,
                        dataType : "json",
                        async:true,//同步
                        success:function(msg){

                            if(index < totalPage ){
                                index++;
                                upload(index);
                            }else{
                                layer.msg('上传成功',{icon:6});
                                $("#imgs").attr('src',msg.msg);
                            }
                        }
                    });
                }

                $("#choice").hide();
                $("#TF").hide();
                $("#cloze").hide();

                $('#type').change(function () {
                    var type = $("#type").find("option:selected").val();
                    if(type == 1){
                        // 判断题
                        // 展示判断题部分
                        $("#choice").hide();
                        $("#TF").show();
                        $("#cloze").hide();

                    }else if(type == 2){
                        //选择题
                        // 展示选择题部分
                        $("#choice").show();
                        $("#TF").hide();
                        $("#cloze").hide();
                    }else if(type == 3){
                        // 填空题
                        // 展示填空题部分
                        $("#choice").hide();
                        $("#TF").hide();
                        $("#cloze").show();
                    }
                })


            });
        });
    </script>

@endsection