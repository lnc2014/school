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
    <b>当前页面：</b>2016年度积点录入页面
    <button href="#" class="btn_primary" onclick = "javascript:window.location.href='/index.php/teacher/input_point_index' ">返回</button>
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

                                <div class="survey-title">
                                    <div class="title-content edit-area" contenteditable="true" tabindex="1" style="background: rgb(255, 255, 255);">基本岗位积点</div>
                                </div>
                                <div id="question-box" class="ui-sortable">

                                    <div class="topic-type-content topic-type-question after-clear" id="base_point">
                                        <div class="question-title">
                                            <span class="question-id">基本工作量：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：100</b></span>
                                        </div>
                                        <input type="hidden" id="point_id" value="<?php echo $teacher_point['id'];?>"/>
                                        <input type="hidden" id="workload_value" value="<?php echo $teacher_point['workload'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['workload'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['workload'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>语文、数学、英语10节/周；物理、化学、生物、政治、历史、地理12节/周；体育、艺术、通用技术、信息技术、心理健康14节/周。高三高考科目10节/周，高三高考综合科目两个班为满工作量。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="survey-title">
                                        <div class="title-content edit-area" contenteditable="true" tabindex="1" style="background: rgb(255, 255, 255);">兼职岗位积点</div>
                                    </div>

                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >科组长、备课组长：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：科组长45、备课组长30</b></span>
                                        </div>
                                        <select class="select4 " id="is_section_leader"   style="width: 250px">
                                            <option value="0"  selected>不是</option>
                                            <option value="1" <?php if($teacher_point['section_leader'] == 1){ echo 'selected';}?> >科组长</option>
                                            <option value="2" <?php if($teacher_point['section_leader'] == 2){ echo 'selected';}?>>备课组长</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b> 按照学校制定的岗位职责进行考评、科组长、备课组长竞争上岗。
                                            </div>
                                        </div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="director">
                                        <div class="question-title">
                                            <span class="question-id">主任、副主任、部门干事 、年级长、副级长、班主任：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：45</b></span>
                                        </div>
                                        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['director'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['director'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 按照学校岗位需求情况，实行竞争上岗。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="officer">
                                        <div class="question-title">
                                            <span class="question-id">部门干事：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：40</b></span>
                                        </div>
                                        <input type="hidden" id="officer_value" value="<?php echo $teacher_point['officer'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['officer'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['officer'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 按照学校岗位需求情况，实行竞争上岗。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="school_leader">
                                        <div class="question-title">
                                            <span class="question-id">校级领导：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：60</b></span>
                                        </div>
                                        <input type="hidden" id="school_leader_value" value="<?php echo $teacher_point['school_leader'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['school_leader'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['school_leader'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 按照学校岗位需求情况，实行竞争上岗。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="part_time_magazine">
                                        <div class="question-title">
                                            <span class="question-id">兼职校刊、校报编辑工作、青蓝工程指导教师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：12</b></span>
                                        </div>
                                        <input type="hidden" id="part_time_magazine_value" value="<?php echo $teacher_point['part_time_magazine'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['part_time_magazine'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['part_time_magazine'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div id="part_time_magazine_upload" ><?php if(!empty($teacher_point['part_time_magazine_data'])){ echo '重新上传';}else{ echo '上传兼职证明文件';}?></div>
                                                <?php if(!empty($teacher_point['part_time_magazine_data'])){
                                                    echo '<a target="_blank" id="part_time_magazine_upload_url" style="margin-left: 150px;margin-top:-25px;width: 100px;z-index:99;position:absolute;" href="http://'.$_SERVER['HTTP_HOST']."/".$teacher_point['part_time_magazine_data'].'">点击预览</a>';
                                                }?>
                                                <input type="hidden" id="part_time_magazine_upload_data" value="<?php echo $teacher_point['part_time_magazine_data'];?>"/>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 按照学校岗位需求情况，实行竞争上岗。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="academic">
                                        <div class="question-title">
                                            <span class="question-id">学术委员、学堂干事：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：15</b></span>
                                        </div>
                                        <input type="hidden" id="academic_value" value="<?php echo $teacher_point['academic'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['academic'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['academic'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 按照学校岗位需求情况，实行竞争上岗。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >教科研情况：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select2" id="education_case" style="width: 250px">
                                            <option value="0"  selected>不是</option>
                                            <option value="1" <?php if($teacher_point['education_case'] == 1){ echo 'selected';}?>>在研的校级课题主持人</option>
                                            <option value="2" <?php if($teacher_point['education_case'] == 2){ echo 'selected';}?>>在研的校级课题成员排序前三位</option>
                                            <option value="3" <?php if($teacher_point['education_case'] == 3){ echo 'selected';}?>>在研的校级课题其他成员</option>
                                            <option value="4" <?php if($teacher_point['education_case'] == 4){ echo 'selected';}?>>在研的市级及市级以上课题主持人</option>
                                            <option value="5" <?php if($teacher_point['education_case'] == 5){ echo 'selected';}?>>在研的市级及市级以上课题成员排序前三位</option>
                                            <option value="6" <?php if($teacher_point['education_case'] == 6){ echo 'selected';}?>>在研的市级及市级以上课题其他成员</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>在研的校级课题：主持人7，成员排序前三位4，其他成员2；在研的市级及市级以上课题：主持人11，成员排序前三位6，其他成员3。校，市、省、全国教育行政部门或直属学会立项的课题，（含子课题）。不同级别的相同课题，按一个计，取最高分。每人每学年最多计两个课题
                                            </div>
                                        </div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >每年提交一项最高级别的发表论文：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select2" id="paper" style="width: 250px">
                                            <option value="0" selected >无</option>
                                            <option value="1" <?php if($teacher_point['paper'] == 1){ echo 'selected';}?>>校级</option>
                                            <option value="2" <?php if($teacher_point['paper'] == 2){ echo 'selected';}?>>市级</option>
                                            <option value="3" <?php if($teacher_point['paper'] == 3){ echo 'selected';}?>>省级</option>
                                            <option value="4" <?php if($teacher_point['paper'] == 4){ echo 'selected';}?>>国家级</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>>校级5点、市级10点、省级15点、国家级20点。
                                            </div>
                                        </div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="eight_teacher">
                                        <div class="question-title">
                                            <span class="question-id">八大学堂选修课主讲教师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="eight_teacher_value" value="<?php echo $teacher_point['eight_teacher'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['eight_teacher'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['eight_teacher'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 按照学校岗位需求情况，实行竞争上岗。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="league_teacher">
                                        <div class="question-title">
                                            <span class="question-id">社团指导老师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="league_teacher_value" value="<?php echo $teacher_point['league_teacher'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['league_teacher'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['league_teacher'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 按照学校岗位需求情况，实行竞争上岗。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="league_teacher">
                                        <div class="question-title">
                                            <span class="question-id">导师制导师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="tutor_value" value="<?php echo $teacher_point['tutor'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['tutor'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['tutor'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 按照学校岗位需求情况，实行竞争上岗。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >工会委员会：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select2" id="union" style="width: 250px">
                                            <option value="0" selected>不是</option>
                                            <option value="1" <?php if($teacher_point['union'] == 1){ echo 'selected';}?> >工会委员会成员</option>
                                            <option value="2" <?php if($teacher_point['union'] == 2){ echo 'selected';}?>>工会委员会组长</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>>工会委员增加5个积点，工会组长增加9个积点。
                                            </div>
                                        </div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="league_teacher">
                                        <div class="question-title">
                                            <span class="question-id">参与学校重大节日：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：4</b></span>
                                        </div>
                                        <input type="hidden" id="join_festival_value" value="<?php echo $teacher_point['join_festival'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['join_festival'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['join_festival'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 无
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="league_teacher">
                                        <div class="question-title">
                                            <span class="question-id">心理咨询师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="counselor_value" value="<?php echo $teacher_point['counselor'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['counselor'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['counselor'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 无
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="survey-title">
                                        <div class="title-content edit-area" contenteditable="true" tabindex="1" style="background: rgb(255, 255, 255);">奖励性积点</div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="league_teacher">
                                        <div class="question-title">
                                            <span class="question-id">替公假、事假、病假、婚假老师顶岗代课：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <input type="hidden" id="counselor_value" value="<?php echo $teacher_point['counselor'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['counselor'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips">
                                                    <input type="text" class="other-content" style="width: 120px;height: 30px;vertical-align: middle;">
                                                    <input type="text" placeholder="代课节数" class="input_text" style="width: 82px" id="substitute_num" value="<?php if($teacher_point['substitute_num'] > 0){echo $teacher_point['substitute_num'];} ?>" />
                                                    <div id="substitute_upload" style="width: 200px;position: absolute;z-index: 99;margin-top: -40px;margin-left: 550px;"> <?php if(!empty($teacher_point['substitute_data'])){ echo '重新上传';} else{ echo '上传代课证明文件';}?> </div>&nbsp;
                                                    <input type="hidden" id="substitute_upload_data" value=""/>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" <?php if($teacher_point['counselor'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" contenteditable="true" style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 每带一节加0.5积点。以教务处调课单据为依据
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
                                                <input type="button" class="common-button survey-button preview-survey" value="确认" onclick="previewSurvey()">
                                                <input type="button" class="common-button survey-button preview-survey" value="提交审核" onclick="previewSurvey()">
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="attach-layer attach-left" style="top: 259px; width: 639.5px; height: 4141px; left: 0px;"></div>
                <div class="attach-layer attach-right" style="top: 259px; right: 0px; width: 473.5px; height: 4141px;"></div>
            </div>
        </div>
    </div>
</div>
        <script type="text/javascript" src="/template/js/DatePicker/WdatePicker.js"></script>
        <script type="text/javascript" src="/template/js/zepto.min.js"></script>
        <script type="text/javascript" src="/template/js/input_point.js"></script>
        <script type="text/javascript" src="/template/webuploader/js/webuploader.js"></script>
        <script type="text/javascript" src="/template/js/upload.js"></script>
</body>
</html>