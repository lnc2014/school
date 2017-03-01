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
                                <div class="survey-title">
                                    <div class="title-content edit-area"   tabindex="1" style="background: rgb(255, 255, 255);">基本岗位积点</div>
                                </div>
                                <div id="question-box" class="ui-sortable">
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >1、基本工作量：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：100</b></span>
                                        </div>
                                        <select class="select3 " id="subject"  disabled style="width: 100px">
                                            <option value="1" <?php if($teacher_point['subject'] == 1){ echo 'selected';}?> >语文</option>
                                            <option value="2" <?php if($teacher_point['subject'] == 2){ echo 'selected';}?> >数学</option>
                                            <option value="3" <?php if($teacher_point['subject'] == 3){ echo 'selected';}?> >英语</option>
                                            <option value="4" <?php if($teacher_point['subject'] == 4){ echo 'selected';}?> >物理</option>
                                            <option value="5" <?php if($teacher_point['subject'] == 5){ echo 'selected';}?> >化学</option>
                                            <option value="6" <?php if($teacher_point['subject'] == 6){ echo 'selected';}?> >生物</option>
                                            <option value="7" <?php if($teacher_point['subject'] == 7){ echo 'selected';}?> >政治</option>
                                            <option value="8" <?php if($teacher_point['subject'] == 8){ echo 'selected';}?> >历史</option>
                                            <option value="9" <?php if($teacher_point['subject'] == 9){ echo 'selected';}?> >地理</option>
                                            <option value="10" <?php if($teacher_point['subject'] == 10){ echo 'selected';}?>>体育</option>
                                            <option value="11" <?php if($teacher_point['subject'] == 11){ echo 'selected';}?>>艺术</option>
                                            <option value="12" <?php if($teacher_point['subject'] == 12){ echo 'selected';}?>>通用技术</option>
                                            <option value="13" <?php if($teacher_point['subject'] == 13){ echo 'selected';}?>>信息技术</option>
                                            <option value="14" <?php if($teacher_point['subject'] == 14){ echo 'selected';}?>>心理健康</option>
                                        </select>
                                        <input type="text" placeholder="每周上课节数" disabled id="subject_num" value="<?php echo $teacher_point['subject_num']; ?>" class="input_text" style="float:left;width: 82px;margin-top: -60px;margin-left: 300px;z-index: 9999" />
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>语文、数学、英语10节/周；物理、化学、生物、政治、历史、地理12节/周；体育、艺术、通用技术、信息技术、心理健康14节/周。高三高考科目10节/周，高三高考综合科目两个班为满工作量。
                                            </div>
                                        </div>
                                    </div>
                                    <div class="survey-title">
                                        <div class="title-content edit-area"   tabindex="1" style="background: rgb(255, 255, 255);">兼职岗位积点</div>
                                    </div>

                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >2、科组长、备课组长：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：科组长45、备课组长30</b></span>
                                        </div>
                                        <select class="select4 " id="is_section_leader"   disabled style="width: 250px">
                                            <option value="0"  selected>不是</option>
                                            <option value="1" <?php if($teacher_point['section_leader'] == 1){ echo 'selected';}?> >科组长</option>
                                            <option value="2" <?php if($teacher_point['section_leader'] == 2){ echo 'selected';}?>>备课组长</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b> 按照学校制定的岗位职责进行考评、科组长、备课组长竞争上岗。
                                            </div>
                                        </div>
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
                                    <div class="topic-type-content topic-type-question after-clear" id="academic">
                                        <div class="question-title">
                                            <span class="question-id">7、学术委员、学堂干事：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：15</b></span>
                                        </div>
                                        <input type="hidden" id="academic_value" value="<?php echo $teacher_point['academic'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['academic'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px"  disabled <?php if($teacher_point['academic'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
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
                                                <b style="color: red">积点说明：</b>在研的校级课题：主持人7，成员排序前三位4，其他成员2；在研的市级及市级以上课题：主持人11，成员排序前三位6，其他成员3。校，市、省、全国教育行政部门或直属学会立项的课题，（含子课题）。不同级别的相同课题，按一个计，取最高分。每人每学年最多计两个课题
                                            </div>
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
                                    <div class="topic-type-content topic-type-question after-clear" id="eight_teacher">
                                        <div class="question-title">
                                            <span class="question-id">10、八大学堂选修课主讲教师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="eight_teacher_value" value="<?php echo $teacher_point['eight_teacher'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['eight_teacher'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['eight_teacher'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
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
                                    <div class="topic-type-content topic-type-question after-clear" id="league_teacher">
                                        <div class="question-title">
                                            <span class="question-id">11、社团指导老师：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="league_teacher_value" value="<?php echo $teacher_point['league_teacher'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['league_teacher'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['league_teacher'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
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
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >13、工会委员会：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select2" id="union" style="width: 250px" disabled>
                                            <option value="0" selected>不是</option>
                                            <option value="1" <?php if($teacher_point['union'] == 1){ echo 'selected';}?> >工会委员会成员</option>
                                            <option value="2" <?php if($teacher_point['union'] == 2){ echo 'selected';}?>>工会委员会组长</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>工会委员增加5个积点，工会组长增加4个积点。
                                            </div>
                                        </div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >14、妇女委员会：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select2" id="woman" style="width: 250px" disabled>
                                            <option value="0" selected>不是</option>
                                            <option value="1" <?php if($teacher_point['woman'] == 1){ echo 'selected';}?> >妇女委员会成员</option>
                                            <option value="2" <?php if($teacher_point['woman'] == 2){ echo 'selected';}?>>妇女委员会组长</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>妇女委员会委员增加5个积点，组长增加4个积点。
                                            </div>
                                        </div>
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
                                    <div class="survey-title">
                                        <div class="title-content edit-area" style="background: rgb(255, 255, 255);">奖励性积点</div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="substitute">
                                        <div class="question-title">
                                            <span class="question-id">17、替公假、事假、病假、婚假老师顶岗代课：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <input type="hidden" id="substitute_value" value="<?php echo $teacher_point['substitute'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['substitute'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <input type="text" disabled placeholder="代课节数" class="input_text" style="width: 82px;" id="substitute_num" value="<?php if($teacher_point['substitute_num'] > 0){echo $teacher_point['substitute_num'];} ?>" />
                                                        <div  style="width: 200px;position: absolute;z-index: 99;margin-top: -40px;margin-left: 50px;">
                                                        </div>
                                                        <?php if(!empty($teacher_point['substitute_upload_data'])){
                                                            echo '<a target="_blank" id="substitute_upload_data_url" style="color:red;margin-left: 150px;width: 100px;z-index:99;position:absolute;" href="http://'.$_SERVER['HTTP_HOST']."/".$teacher_point['substitute_upload_data'].'">点击预览附件</a>';
                                                        }?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['substitute'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 每带一节加0.5积点。以教务处调课单据为依据
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="satisfaction_survey">
                                        <div class="question-title">
                                            <span class="question-id">18、学生满意度调查,满意度达80%以上：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="satisfaction_survey_value" value="<?php echo $teacher_point['satisfaction_survey'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['satisfaction_survey'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['satisfaction_survey'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 每学年进行2次满意度调查，每次满意度达80%以上，可获得5个积点奖励。
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
                                                        <input type="text" disabled placeholder="缺席次数" class="input_text" style="width: 82px" id="attendance_award_num" value="<?php echo $teacher_point['attendance_award'];?>"/>
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
                                    <div class="topic-type-content topic-type-question after-clear" id="school_teacher">
                                        <div class="question-title">
                                            <span class="question-id">20、高三教师、多语种班项目：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：30</b></span>
                                        </div>
                                        <input type="hidden" id="school_teacher_value" value="<?php echo $teacher_point['school_teacher'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled  <?php if($teacher_point['school_teacher'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px"  disabled <?php if($teacher_point['school_teacher'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 多语种班和毕业班教师不重复计算。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="finish_goal">
                                        <div class="question-title">
                                            <span class="question-id">21、完成高考预定指标：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：5</b></span>
                                        </div>
                                        <input type="hidden" id="finish_goal_value" value="<?php echo $teacher_point['finish_goal'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['finish_goal'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['finish_goal'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 完成高考（中考）预定指标加5个奖励积点。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="college">
                                        <div class="question-title">
                                            <span class="question-id">22、本科生超出指标数量：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <input type="hidden" id="college_value" value="<?php if($teacher_point['college_num'] > 0){ echo 1;}else{ echo 0;} ?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['college_num'] > 0){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <input type="text" disabled placeholder="超出指标数量" <?php if($teacher_point['college_num'] == 0 && !empty($teacher_point) ){ echo 'disabled';}?> class="input_text" style="width: 100px;" id="college_num" value="<?php if($teacher_point['college_num'] > 0){echo $teacher_point['college_num'];} ?>" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['college_num'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>本科生超出指标数量，一个增加6个积点。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="middle">
                                        <div class="question-title">
                                            <span class="question-id">23、重点高中生超出指标数量：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <input type="hidden" id="middle_value" value="<?php if($teacher_point['middle_num'] > 0){ echo 1;}else{ echo 0;} ?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['middle_num'] > 0){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <input type="text" disabled placeholder="超出指标数量" <?php if($teacher_point['middle_num'] == 0 && !empty($teacher_point) ){ echo 'disabled';}?> class="input_text" style="width: 100px;" id="middle_num" value="<?php if($teacher_point['middle_num'] > 0){echo $teacher_point['middle_num'];} ?>" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['middle_num'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>重点生指标每多超一个，加10个点。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="super_workload">
                                        <div class="question-title">
                                            <span class="question-id">24、超出工作量：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <input type="hidden" id="super_workload_value" value="<?php if($teacher_point['super_workload'] > 0){ echo 1;}else{ echo 0;} ?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['super_workload'] > 0){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <input type="text" disabled placeholder="超出节课数" <?php if($teacher_point['super_workload'] == 0 && !empty($teacher_point) ){ echo 'disabled';}?> class="input_text" style="width: 100px;" id="super_workload_num" value="<?php if($teacher_point['super_workload'] > 0){echo $teacher_point['super_workload'];} ?>" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['super_workload'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>超出工作量的上课节数，每节课增加0.5个积点。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="school_class">
                                        <div class="question-title">
                                            <span class="question-id">25、校级公开课实验课：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <input type="hidden" id="school_class_value" disabled value="<?php if($teacher_point['school_class'] > 0){ echo 1;}else{ echo 0;} ?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['school_class'] > 0){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <input type="text" disabled placeholder="节课数" <?php if($teacher_point['school_class'] == 0 && !empty($teacher_point) ){ echo 'disabled';}?> class="input_text" style="width: 100px;" id="school_class_num" value="<?php if($teacher_point['school_class'] > 0){echo $teacher_point['school_class'];} ?>" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['school_class'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>校级公开课实验课，每节课增加5个积点。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="city_class">
                                        <div class="question-title">
                                            <span class="question-id">26、市级公开课实验课：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <input type="hidden" id="school_class_value" disabled value="<?php if($teacher_point['city_class'] > 0){ echo 1;}else{ echo 0;} ?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['city_class'] > 0){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <input type="text" placeholder="节课数" disabled <?php if($teacher_point['city_class'] == 0 && !empty($teacher_point) ){ echo 'disabled';}?> class="input_text" style="width: 100px;" id="city_class_num" value="<?php if($teacher_point['city_class'] > 0){echo $teacher_point['city_class'];} ?>" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['city_class'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>市级公开课实验课，每节课增加5个积点。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="courses">
                                        <div class="question-title">
                                            <span class="question-id">27、八大学堂精品课程：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <input type="hidden" id="courses_value" value="<?php if($teacher_point['courses'] > 0){ echo 1;}else{ echo 0;} ?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['courses'] > 0){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <input type="text" disabled placeholder="节课数" <?php if($teacher_point['courses'] == 0 && !empty($teacher_point) ){ echo 'disabled';}?> class="input_text" style="width: 100px;" id="courses_num" value="<?php if($teacher_point['courses'] > 0){echo $teacher_point['courses'];} ?>" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['courses'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element" style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>八大学堂精品课程，获得精品课程的次数，每学年最多2次，每次可以增加3个积点。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id">28、中学生奥林匹克竞赛、学科竞赛、外语竞赛、综合、通用类比赛：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <input type="text" disabled placeholder="学生进入国家集训队的个数" class="input_text" style="width: 200px" id="country_match_num" value="<?php echo $teacher_point['country_match'];?>" />
                                                        <input type="text" disabled placeholder="学生进入省级的个数" class="input_text" style="width: 150px" id="province_match_num" value="<?php echo $teacher_point['province_match'];?>" />
                                                        <input type="text" disabled placeholder="学生进入市级的个数" class="input_text" style="width: 150px" id="city_match_num" value="<?php echo $teacher_point['city_match'];?>" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b>学生进入国家集训队或以上，可获得5×（学生数）个积点。省级以上3×（学生数），市级以上1×（学生数）。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >29、学段考的试卷是否优秀试卷：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select2" id="exam_pro" disabled>
                                            <option value="0" selected>无</option>
                                            <option value="1" <?php if($teacher_point['exam_pro'] == 1){ echo 'selected';}?> >一等试卷</option>
                                            <option value="2" <?php if($teacher_point['exam_pro'] == 2){ echo 'selected';}?>>二等试卷</option>
                                            <option value="3" <?php if($teacher_point['exam_pro'] == 3){ echo 'selected';}?>>三等试卷</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b> 一等试卷可获得3个积点，二等试卷2个积点，三等试卷1个积点。命题不合格试卷，除追究责任之外，取消任何积点奖励。
                                            </div>
                                        </div>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear" id="exam_rank">
                                        <div class="question-title">
                                            <span class="question-id">30、学段考试成绩综合排名同备课组内位列前50%：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <input type="hidden" id="exam_rank_value" value="<?php echo $teacher_point['exam_rank'];?>"/>
                                        <ul class="question-choice">
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['exam_rank'] == 1){ echo 'checked';}?> value="1" class="yes"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">是
                                                        <div style="width: 200px;position: absolute;z-index: 99;margin-top: -40px;margin-left: 50px;">
                                                        </div>
                                                        <?php if(!empty($teacher_point['exam_rank_data'])){
                                                            echo '<a target="_blank" id="exam_rank_upload_url" style="margin-left: 150px;width: 100px;z-index:99;position:absolute;" href="http://'.$_SERVER['HTTP_HOST']."/".$teacher_point['exam_rank_data'].'">点击预览</a>';
                                                        }?>
                                                        <input type="hidden" id="exam_rank_upload_data" value="<?php echo $teacher_point['exam_rank_data'];?>"/>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="choice">
                                                <input type="checkbox" style="width: 16px;height: 16px" disabled <?php if($teacher_point['part_time_magazine'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">否</div></div>
                                                <div class="option-tips"></div>
                                            </li>
                                            <li class="choice">
                                                <div class="position-relative">
                                                    <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                        <b style="color: red">积点说明：</b> 以教务处学段考考试简报为依据，学段考试成绩综合排名（参考B值，均分）在同备课组内位列前50%的，奖励科任老师6个积点。
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >31、优秀特色学科组：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select6" id="outstand_sub" style="width: 250px" disabled>
                                            <option value="0" selected>不是</option>
                                            <option value="1" <?php if($teacher_point['outstand_sub'] == 1){ echo 'selected';}?>>市级以上科组成员</option>
                                            <option value="2" <?php if($teacher_point['outstand_sub'] == 2){ echo 'selected';}?>>市级以上科组组长</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>以市教科院文件为准，市级以上科组成员人均获得2个积点。科组长另奖励5个积点。
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
                                            <span class="question-id" >34、教育系统表彰高考工作先进个人（学科先进个人）：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select4" id="select_outstand_person" disabled>
                                            <option value="0" selected>不是</option>
                                            <option value="1" <?php if($teacher_point['select_outstand_person'] == 1){ echo 'selected';}?>>校级</option>
                                            <option value="2" <?php if($teacher_point['select_outstand_person'] == 2){ echo 'selected';}?>>市级</option>
                                            <option value="3" <?php if($teacher_point['select_outstand_person'] == 3){ echo 'selected';}?>>省级</option>
                                            <option value="4" <?php if($teacher_point['select_outstand_person'] == 4){ echo 'selected';}?>>国家级</option>
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

                                    <div class="topic-type-content topic-type-question after-clear">
                                        <div class="question-title">
                                            <span class="question-id" >40、研究生学历（位）：</span>
                                            <span class="question-id" style="float: right;margin-top: -9px;"><b>积点数：见积点说明</b></span>
                                        </div>
                                        <select class="select5" id="postgraduate" disabled>
                                            <option value="0" selected>不是</option>
                                            <option value="1" <?php if($teacher_point['postgraduate'] == 1){ echo 'selected';}?>>全日制研究生学历和硕士学位</option>
                                            <option value="2" <?php if($teacher_point['postgraduate'] == 2){ echo 'selected';}?>>全日制研究生学历和博士学位</option>
                                        </select>
                                        <div class="position-relative choice question-choice">
                                            <div class="edit-area edit-child-element"   style="background: rgb(255, 255, 255);">
                                                <b style="color: red">积点说明：</b>获得全日制研究生学历和硕士学位者加9分；获得全日制研究生学历和博士学位者加15分。有研究生学位者视为研究生对待。
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

        <div class="tip" id="check_reason" style="display: none;top: 900%; left: 45%">
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