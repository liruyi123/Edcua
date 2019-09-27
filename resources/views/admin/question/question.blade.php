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
        <h3>所属课程目录：</h3>
        <div class="col-sm-5">
            <select class="form-control" name="" id="catalog">
                <option value="0">The course directory to which it belongs</option>
                @foreach($data as $k => $v)
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
        <br>
        <br>
        <h3>题库类型：</h3>
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
        {{--回答题--}}
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
        var E = window.wangEditor;
        var editor = new E('#editor');
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.create()
    </script>
    <script src="/admin/js/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            layui.use('layer', function () {
                var layer = layui.layer;
                $("#choice").hide();
                $("#TF").hide();
                $("#cloze").hide();

                // 改变事件
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
                        // 回答题
                        // 展示填空题部分
                        $("#choice").hide();
                        $("#TF").hide();
                        $("#cloze").show();
                    }
                })

                // 点击事件
                $("#btn").click(function () {
                    var topic = $("#topic").val();
                    var catalog = $("#catalog").find("option:selected").val();
                    var type = $("#type").find("option:selected").val();
                    var choiceA = $("#choiceA").val();
                    var choiceB = $("#choiceB").val();
                    var choiceC = $("#choiceC").val();
                    var choiceD = $("#choiceD").val();
                    var choice_answer = $("#answer").val();
                    var score = $("#score").val();
                    var cloze = $(".w-e-text").children("p").text();
                    var TF = $('input:radio:checked').val();

                    $.ajax({
                        type : 'post',
                        url : 'question_do',
                        dataType:"json",
                        data:{topic:topic,catalog:catalog,choiceA:choiceA,type:type,choiceB:choiceB,choiceC:choiceC,choiceD:choiceD,score:score,cloze:cloze,TF:TF,choice_answer:choice_answer},
                        success : function (msg) {
                            // console.log(msg);
                            if(msg.code == '200'){
                                layer.msg(msg.message,{icon:6});
                                window.location.href = "questionlist";
                            }else{
                                layer.msg(msg.message,{icon:2});
                            }
                        }
                    })
                })
            });
        });
    </script>

@endsection