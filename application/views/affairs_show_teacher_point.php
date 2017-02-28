<!DOCTYPE html>
<!-- saved from url=(0054)http://mtc.baidu.com/survey/home/edit?survey_id=135478 -->
<html class="expanded">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="/template/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/template/css/edit.css">
    <link rel="stylesheet" type="text/css" href="/template/css/survey.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/template/css/lnc.css" rel="stylesheet" type="text/css" />
    <link href="/template/css/select.css" rel="stylesheet" type="text/css" />
    <link href="/template/webuploader/css/webuploader.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/template/js/jquery.1.8.js"></script>
    <script type="text/javascript" src="/template/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/template/js/select-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 300
            });
            $(".select3").uedSelect({
                width : 100
            });
            $(".select4").uedSelect({
                width : 130
            });
            $(".select5").uedSelect({
                width : 250
            });
            $(".select6").uedSelect({
                width : 155
            });
        });
    </script>
    <style>
        .uew-select {
            margin-left: 35px;
        }
    </style>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">教师录入积点</a></li>
    </ul>
</div>

<div id="first_div">
    <b>当前页面：</b>学生处查看教师积点详情页面
    <button href="#" class="btn_primary" onclick = "javascript:window.location.href='/index.php/office/input_point_index' ">返回</button>
</div>
<div id="first_div">
    <b>当前审核的老师名字：</b><?php echo $teacher['name']; ?>
</div>
<div class="formtitle" style="height: 10px"></div>
<div id="page">
    <div id="content-wrapper">
        <input type="hidden" id="project-platform" value="4">
        <div id="bce-main">
            <div class="main" style="position: relative">
                <div class="content common-task-content">
                    <div class="edit-survey-wrap">
                        <div id="edit-survey-content">
                            <div class="rows2">
                                <input id="point_id" value="<?php echo $teacher_point['id'];?>" type="hidden">

                                    <div class="topic-type-content topic-type-question after-clear" id="tutor">
                                        <div class="question-title">
                                            <span class="question-id">12、导师制导师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="tutor_value" value="<?php echo $teacher_point['tutor'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['tutor'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['tutor'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 按照学校岗位需求情况，实行竞争上岗。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="join_festival">
                                        <div class="question-title">
                                            <span class="question-id">15、参与学校重大节日：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：4</b></span>
                                        </div>
                                        <input type="hidden" id="join_festival_value" value="<?php echo $teacher_point['join_festival'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['join_festival'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['join_festival'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 无
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="counselor">
                                        <div class="question-title">
                                            <span class="question-id">16、心理咨询师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="counselor_value" value="<?php echo $teacher_point['counselor'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['counselor'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['counselor'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 无
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="survey-tail">
                                        <ul>
                                            <li style="height: 40px;">
                                                <div id="survey-op" class="after-clear">
                                                    <div class="preview-survey dib">
                                                        <button class="btn_primary" style="margin-left: 20px" id = "submit_check">审核通过</button>
                                                        <button class="btn_primary" style="margin-left: 20px" onclick="no_pass()">审核不通过</button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tip" id="check_reason" style="display: none;top: 20%; left: 45%">
            <div class="tiptop"><span>审核不通过原因</span>
                <a onclick="cancel()"></a>
            </div>

            <div class="tipinfo">
                <div class="tipright">
                    <label>审核不通过原因：</label>
                    <input name="" type="text" class="dfinput" id="refuse_reason">
                </div>
            </div>

            <div class="tipbtn">
                <input onclick="is_no_pass()" type="button" class="sure" value="确定">&nbsp;
                <input onclick="cancel()" type="button" class="cancel" value="取消">
            </div>

        </div>
        <script type="text/javascript" src="/template/js/DatePicker/WdatePicker.js"></script>
        <script type="text/javascript" src="/template/js/zepto.min.js"></script>
        <script type="text/javascript" src="/template/js/input_point.js"></script>
        <script type="text/javascript" src="/template/webuploader/js/webuploader.js"></script>
        <script type="text/javascript" src="/template/js/upload.js"></script>
        <script type="text/javascript">
            var point_id;
            $(function(){
                $("#submit_check").click(function(){
                    if(confirm('审核通过之后，将不可以修改！')){
                        var ponit_id = $('#point_id').val();
                        if(!ponit_id){
                            alert('操作错误，请联系管理员');
                            return;
                        }
                        $.ajax({
                            async:false,
                            type : 'POST',
                            url: '/index.php/affairs/submit_check',
                            data : {
                                ponit_id:ponit_id
                            },
                            dataType : 'json',
                            success: function (data)
                            {
                                if (data.result == '0000') {
                                    alert('审核成功');
                                    location.href = "/index.php/affairs/index" ;
                                } else {
                                    alert(data.info);
                                }
                            }
                        });

                    }
                });
            });
            function cancel(){
                $('#check_reason').hide();
                $('#refuse_reason').val('');

            }
            function no_pass(){
                $('#check_reason').show();
            }
            function is_no_pass(){
                var refuse_reason = $('#refuse_reason').val();
                var  point_id = $('#point_id').val();
                if(!refuse_reason){
                    alert('审核拒绝原因不能为空!');
                    return;
                }
                $.ajax({
                    async:false,
                    type : 'POST',
                    url: '/index.php/affairs/submit_check',
                    data : {
                        ponit_id:point_id,
                        no_pass:1,
                        refuse_reason:refuse_reason
                    },
                    dataType : 'json',
                    success: function (data)
                    {
                        if (data.result == '0000') {
                            alert('审核成功');
                            location.href = "/index.php/affairs/index" ;
                        } else {
                            alert(data.info);
                        }
                    }
                });
            }
        </script>
</body>
</html>