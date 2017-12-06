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
    <b>当前页面：</b>科研处查看教师积点详情页面
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

                                    <div class="topic-type-content topic-type-question after-clear" id="part_time_magazine">
                                        <div class="question-title">
                                            <span class="question-id">6、兼职校刊、校报编辑工作、青蓝工程指导教师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：12</b></span>
                                        </div>
                                        <input type="hidden" id="part_time_magazine_value" value="<?php echo $teacher_point['part_time_magazine'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['part_time_magazine'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <div  style="width: 200px;position: absolute;z-index: 99;margin-top: -40px;margin-left: 50px;">
                                                        </div>
                                                        <?php if(!empty($teacher_point['part_time_magazine_data'])){
                                                            echo '<a target="_blank" id="part_time_magazine_upload_url" style="color:red;margin-left: 150px;width: 100px;z-index:99;position:absolute;" href="http://'.$_SERVER['HTTP_HOST']."/".$teacher_point['part_time_magazine_data'].'">点击预览附件</a>';
                                                        }?>
                                                        <input type="hidden" id="part_time_magazine_upload_data" value="<?php echo $teacher_point['part_time_magazine_data'];?>"/>

                                                    </div>
                                                </div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" disabled style="width: 16px;height: 16px" <?php if($teacher_point['part_time_magazine'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">

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
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >8、教科研情况：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select2" id="education_case" style="width: 250px" disabled>
                                            <option value="0"  selected>不是</option>
                                            <option value="1" <?php if($teacher_point['education_case'] == 1){ echo 'selected';}?>>在研的校级课题主持人</option>
                                            <option value="2" <?php if($teacher_point['education_case'] == 2){ echo 'selected';}?>>在研的校级课题成员排序前三位</option>
                                            <option value="3" <?php if($teacher_point['education_case'] == 3){ echo 'selected';}?>>在研的校级课题其他成员</option>
                                            <option value="4" <?php if($teacher_point['education_case'] == 4){ echo 'selected';}?>>在研的市级及市级以上课题主持人</option>
                                            <option value="5" <?php if($teacher_point['education_case'] == 5){ echo 'selected';}?>>在研的市级及市级以上课题成员排序前三位</option>
                                            <option value="6" <?php if($teacher_point['education_case'] == 6){ echo 'selected';}?>>在研的市级及市级以上课题其他成员</option>
                                        </select>
                                        <select class="select2" id="education_case2" style="width: 250px" disabled>
                                            <option value="0"  selected>不是</option>
                                            <option value="1" <?php if($teacher_point['education_case2'] == 1){ echo 'selected';}?>>在研的校级课题主持人</option>
                                            <option value="2" <?php if($teacher_point['education_case2'] == 2){ echo 'selected';}?>>在研的校级课题成员排序前三位</option>
                                            <option value="3" <?php if($teacher_point['education_case2'] == 3){ echo 'selected';}?>>在研的校级课题其他成员</option>
                                            <option value="4" <?php if($teacher_point['education_case2'] == 4){ echo 'selected';}?>>在研的市级及市级以上课题主持人</option>
                                            <option value="5" <?php if($teacher_point['education_case2'] == 5){ echo 'selected';}?>>在研的市级及市级以上课题成员排序前三位</option>
                                            <option value="6" <?php if($teacher_point['education_case2'] == 6){ echo 'selected';}?>>在研的市级及市级以上课题其他成员</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>校级课题主持人7 ，成员2 ，没有成员排序。市级及市级以上课题：主持人11，执笔人8（仅限于校级领导主持的课题），成员排序前三位6，其他成员3。校，市、省、全国教育行政部门或直属学会立项的课题，（含子课题）。不同级别的相同课题，按一个计，取最高分。每人每学年最多计两个课题。</div>
                                        </div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >9、每年提交一项最高级别的发表论文：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select2" id="paper" style="width: 250px" disabled>
                                            <option value="0" selected >无</option>
                                            <option value="1" <?php if($teacher_point['paper'] == 1){ echo 'selected';}?>>校级</option>
                                            <option value="2" <?php if($teacher_point['paper'] == 2){ echo 'selected';}?>>市级</option>
                                            <option value="3" <?php if($teacher_point['paper'] == 3){ echo 'selected';}?>>省级</option>
                                            <option value="4" <?php if($teacher_point['paper'] == 4){ echo 'selected';}?>>国家级</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);" disabled>
                                                <b style="color: red">积点说明：</b>校级5点、市级10点、省级15点、国家级20点。
                                            </div>
                                        </div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >32、优秀班主任或工作人员或优秀课题组主持人或课题组科研骨干：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select4" id="select_outstand_school" disabled >
                                            <option value="0" selected>不是</option>
                                            <option value="1" <?php if($teacher_point['select_outstand_school'] == 1){ echo 'selected';}?>>校级</option>
                                            <option value="2" <?php if($teacher_point['select_outstand_school'] == 2){ echo 'selected';}?>>市级</option>
                                            <option value="3" <?php if($teacher_point['select_outstand_school'] == 3){ echo 'selected';}?>>省级</option>
                                            <option value="4" <?php if($teacher_point['select_outstand_school'] == 4){ echo 'selected';}?>>国家级</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点。
                                            </div>
                                        </div>
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

        <div class="tip" id="check_reason" style="display: none;top: 50%; left: 45%">
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
                            url: '/index.php/committee/submit_check',
                            data : {
                                ponit_id:ponit_id
                            },
                            dataType : 'json',
                            success: function (data)
                            {
                                if (data.result == '0000') {
                                    alert('审核成功');
                                    location.href = "/index.php/committee/index" ;
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
                    url: '/index.php/committee/submit_check',
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
                            location.href = "/index.php/committee/index" ;
                        } else {
                            alert(data.info);
                        }
                    }
                });
            }
        </script>
</body>
</html>