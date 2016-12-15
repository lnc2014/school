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
        <li><a href="#">教师绩效添加</a></li>
    </ul>
</div>

<div id="first_div">
    <b>当前页面：</b><?php echo $year; ?>年度教务处添加绩效页面
    <button href="#" class="btn_primary" onclick = "javascript:window.location.href='/index.php/academic/index' ">返回</button>
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

                                <form action="/index.php/academic/add_per_point?teacher_id=<?php echo $teacher_id; ?>&is_update=<?php echo $is_update?>" method="post">
                                <div id="question-box" class="ui-sortable">

                                    <div class="survey-title">
                                        <div class="title-content edit-area"   tabindex="1" style="background: rgb(255, 255, 255);">教学绩效类(50分)</div>
                                    </div>
                                    <?php foreach($teaching_per as $per){ ?>
                                        <div class="topic-type-content topic-type-question after-clear" id="<?php echo $per['alias']?>">
                                            <div class="question-title">
                                                <span class="question-id"><?php echo $per['topic']?>：</span>
                                                <span class="question-id" style="float: right;margin-top: -9px;"><b><?php echo $per['point']?>分</b></span>
                                            </div>
                                            <input type="hidden" name="is_<?php echo $per['alias']?>" value="<?php
                                            if(!empty($per_point_list)){
                                                foreach($per_point_list as $value){
                                                    if($value['per_id'] == $per['alias']){
                                                        $answer = !empty($value['answer'])?$value['answer']:0;
                                                        $explain = !empty($value['explain'])?$value['explain']:'';
                                                    }
                                                }
                                            } ?>" id="is_<?php echo $per['alias']?>"/>
                                            <ul class="question-choice">
                                                <li class="choice">
                                                    <input type="checkbox" style="width: 16px;height: 16px" value="1" <?php echo ($answer == 1)?'checked':''; ?> class="yes"/>
                                                    <div class="position-relative">
                                                        <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                    <div class="option-tips"></div>
                                                </li>
                                                <li class="choice">
                                                    <input type="checkbox" style="width: 16px;height: 16px"  value="0" <?php echo isset($answer)&&($answer == 0)?'checked':''; ?> class="no"/>
                                                    <div class="position-relative">
                                                        <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                    <div class="option-tips"></div>
                                                </li>
                                                <li class="choice">
                                                    <div class="position-relative">
                                                        <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                            <b style="color: red">情况说明：</b><input type="text" value="<?php echo $explain; ?>" name="<?php echo $per['alias']?>">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="survey-title">
                                        <div class="title-content edit-area"   tabindex="1" style="background: rgb(255, 255, 255);">专业发展类(10分)</div>
                                    </div>
                                    <?php foreach($profession as $per){ ?>
                                        <div class="topic-type-content topic-type-question after-clear" id="<?php echo $per['alias']?>">
                                            <div class="question-title">
                                                <span class="question-id"><?php echo $per['topic']?>：</span>
                                                <span class="question-id" style="float: right;margin-top: -9px;"><b><?php echo $per['point']?>分</b></span>
                                            </div>
                                            <input type="hidden" name="is_<?php echo $per['alias']?>" value="<?php
                                            if(!empty($per_point_list)){
                                                foreach($per_point_list as $value){
                                                    if($value['per_id'] == $per['alias']){
                                                        $answer = !empty($value['answer'])?$value['answer']:0;
                                                        $explain = !empty($value['explain'])?$value['explain']:'';
                                                    }
                                                }
                                            } ?>" id="is_<?php echo $per['alias']?>"/>
                                            <ul class="question-choice">
                                                <li class="choice">
                                                    <input type="checkbox" style="width: 16px;height: 16px" <?php echo ($answer == 1)?'checked':''; ?>  value="1" class="yes"/>
                                                    <div class="position-relative">
                                                        <div class="edit-area edit-child-element"  style="background: rgb(255, 255, 255);">是</div></div>
                                                    <div class="option-tips"></div>
                                                </li>
                                                <li class="choice">
                                                    <input type="checkbox" style="width: 16px;height: 16px"  <?php echo isset($answer)&&($answer == 0)?'checked':''; ?>  value="0" class="no"/>
                                                    <div class="position-relative">
                                                        <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                    <div class="option-tips"></div>
                                                </li>
                                                <li class="choice">
                                                    <div class="position-relative">
                                                        <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                            <b style="color: red">情况说明：</b><input type="text" value="<?php echo $explain; ?>" name="<?php echo $per['alias']?>">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    <div class="survey-title">
                                        <div class="title-content edit-area"   tabindex="1" style="background: rgb(255, 255, 255);">教育与管理类（40分）</div>
                                    </div>
                                    <?php foreach($education as $per){ ?>
                                        <div class="topic-type-content topic-type-question after-clear" id="<?php echo $per['alias']?>">
                                            <div class="question-title">
                                                <span class="question-id"><?php echo $per['topic']?>：</span>
                                                <span class="question-id" style="float: right;margin-top: -9px;"><b><?php echo $per['point']?>分</b></span>
                                            </div>
                                            <input type="hidden" name="is_<?php echo $per['alias']?>" value="<?php
                                            if(!empty($per_point_list)){
                                                foreach($per_point_list as $value){
                                                    if($value['per_id'] == $per['alias']){
                                                        $answer = !empty($value['answer'])?$value['answer']:0;
                                                        $explain = !empty($value['explain'])?$value['explain']:'';
                                                    }
                                                }
                                            } ?>" id="is_<?php echo $per['alias']?>"/>
                                            <ul class="question-choice">
                                                <li class="choice">
                                                    <input type="checkbox" style="width: 16px;height: 16px" <?php echo ($answer == 1)?'checked':''; ?> value="1" class="yes"/>
                                                    <div class="position-relative">
                                                        <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                    <div class="option-tips"></div>
                                                </li>
                                                <li class="choice">
                                                    <input type="checkbox" style="width: 16px;height: 16px"  <?php echo isset($answer)&&($answer == 0)?'checked':''; ?> value="0" class="no"/>
                                                    <div class="position-relative">
                                                        <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                    <div class="option-tips"></div>
                                                </li>
                                                <li class="choice">
                                                    <div class="position-relative">
                                                        <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                            <b style="color: red">情况说明：</b><input type="text" value="<?php echo $explain; ?>" name="<?php echo $per['alias']?>">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    <div id="survey-tail">
                                        <ul>
                                            <li style="height: 40px;">
                                                <div id="survey-op" class="after-clear">
                                                    <div class="preview-survey dib">
                                                        <button class="btn_primary" style="margin-left: 20px" id = "submit_check">保存</button>
<!--                                                        <button class="btn_primary" style="margin-left: 20px" id = "submit_check2">保存并提交</button>-->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/template/js/zepto.min.js"></script>
        <script type="text/javascript" src="/template/js/add_per.js"></script>
</body>
</html>