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
    <b>当前页面：</b>办公室查看教师积点详情页面
    <button href="#" class="btn_primary" onclick = "javascript:window.history.go(-1)' ">返回</button>
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
                                <div id="question-box" class="ui-sortable">

                                    <div class="survey-title">
                                        <div class="title-content edit-area"   tabindex="1" style="background: rgb(255, 255, 255);">兼职岗位积点</div>
                                    </div>

                                    <div class="topic-type-content topic-type-question after-clear" id="director">
                                        <div class="question-title">
                                            <span class="question-id">3、主任、副主任、年级长、副级长、班主任：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：45</b></span>
                                        </div>
                                        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['director'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['director'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
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
                                    <div class="topic-type-content topic-type-question after-clear" id="officer">
                                        <div class="question-title">
                                            <span class="question-id">4、部门干事：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：40</b></span>
                                        </div>
                                        <input type="hidden" id="officer_value" value="<?php echo $teacher_point['officer'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['officer'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['officer'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
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
                                    <div class="topic-type-content topic-type-question after-clear" id="school_leader">
                                        <div class="question-title">
                                            <span class="question-id">5、校级领导：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：60</b></span>
                                        </div>
                                        <input type="hidden" id="school_leader_value" value="<?php echo $teacher_point['school_leader'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['school_leader'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['school_leader'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
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
                                    <div class="topic-type-content topic-type-question after-clear" id="attendance_award">
                                        <div class="question-title">
                                            <span class="question-id">19、出勤，是否全勤：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：20</b></span>
                                        </div>
                                        <input type="hidden" id="attendance_award_value" value="<?php echo $teacher_point['attendance_award'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['attendance_award'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <div style="width: 200px;position: absolute;z-index: 99;margin-top: -40px;margin-left: 150px;"> </div>&nbsp;
                                                        <?php if(!empty($teacher_point['attendance_award_data'])){
                                                            echo '<a target="_blank" id="attendance_award_url" style="margin-left: 150px;color:red;width: 100px;z-index:99;position:absolute;" href="http://'.$_SERVER['HTTP_HOST']."/".$teacher_point['attendance_award_data'].'">点击预览附件</a>';
                                                        }?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['attendance_award'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否
                                                        <input type="text" disabled placeholder="缺席次数" class="input_text" style="width: 82px" id="attendance_award_num" value="<?php echo $teacher_point['attendance_award_num'];?>"/>
                                                    </div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 全校集会、部门会议、科组、备课组、班主任例会等缺席一次扣除1个积点，扣完为止。部门负责人负责考勤，提供考勤记录。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >33、年度考核优秀：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select4" id="select_outstand_year" disabled>
                                            <option value="0" selected>不是</option>
                                            <option value="1" <?php if($teacher_point['select_outstand_year'] == 1){ echo 'selected';}?>>校级</option>
                                            <option value="2" <?php if($teacher_point['select_outstand_year'] == 2){ echo 'selected';}?>>市级</option>
                                            <option value="3" <?php if($teacher_point['select_outstand_year'] == 3){ echo 'selected';}?>>省级</option>
                                            <option value="4" <?php if($teacher_point['select_outstand_year'] == 4){ echo 'selected';}?>>国家级</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点。
                                            </div>
                                        </div>
                                    </div>

                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >35、专家、特级教师名师、名班主任、骨干教师、教坛新秀：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select4" id="expert" disabled>
                                            <option value="0" selected>不是</option>
                                            <option value="1" <?php if($teacher_point['expert'] == 1){ echo 'selected';}?>>市级</option>
                                            <option value="2" <?php if($teacher_point['expert'] == 2){ echo 'selected';}?>>省级</option>
                                            <option value="3" <?php if($teacher_point['expert'] == 3){ echo 'selected';}?>>特级</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>教育科研专家工作室主持人、名师工作室主持人、名班主任、骨干教师、教坛新秀等市级奖励10个积点，省级奖励15个积点。特级教师奖励20个积点。
                                            </div>
                                        </div>
                                    </div>
                                    <div class="survey-title">
                                        <div class="title-content edit-area"   tabindex="1" style="background: rgb(255, 255, 255);">个人资历积点</div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="super_workload">
                                        <div class="question-title">
                                            <span class="question-id">36、工龄：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <input disabled class="input_text" id="work_year" value="<?php echo $teacher_point['work_year']?>" type="text" placeholder="竞聘人员参加工作之月" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>自竞聘人员参加工作之月计起（以人事档案的第一份履历表为准），每月0.4分。研究生工龄从上研究生之日进行计算。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="super_workload">
                                        <div class="question-title">
                                            <span class="question-id">37、市龄：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <input disabled class="input_text" id="city_year" value="<?php echo $teacher_point['city_year']?>" type="text" placeholder="竞聘人员正式调入我市工作之月" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 自竞聘人员正式调入我市工作当月计起（以到主管部门报到时间为准），每月0.6分。校龄分每日加0.2分。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="super_workload">
                                        <div class="question-title">
                                            <span class="question-id">38、校龄：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <input class="input_text" id="school_year" disabled value="<?php
                                                        if(!empty($teacher_point['school_year'])){
                                                            echo $teacher_point['school_year'];
                                                        }?>" type="text" placeholder="竞聘人员正式调入我市工作之月" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 自竞聘人员正式调入我市工作当月计起（以到主管部门报到时间为准），校龄分每月加0.2分。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="super_workload">
                                        <div class="question-title">
                                            <span class="question-id">39、职称资格：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <input disabled class="input_text" id="job_title_time" value="<?php echo $teacher_point['job_title']?>" type="text" placeholder="专业技术职称资格时间" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>自取得拟竞聘的专业技术职称资格时间计起（以证书为准），每月0.8分。
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

        <div class="tip" id="check_reason" style="display: none;top: 100%; left: 45%">
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
                            url: '/index.php/office/submit_check',
                            data : {
                                ponit_id:ponit_id
                            },
                            dataType : 'json',
                            success: function (data)
                            {
                                if (data.result == '0000') {
                                    alert('审核成功');
                                    location.href = "/index.php/office/index" ;
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
                    url: '/index.php/office/submit_check',
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
                            location.href = "/index.php/office/index" ;
                        } else {
                            alert(data.info);
                        }
                    }
                });
            }
        </script>
</body>
</html>