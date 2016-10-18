<?php
/**
 * Description：教师录入积点的页面
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:56
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
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
</head>

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
<div class="formtitle"></div>
<div class="div_border">
    <div class="div_title">
        基本岗位积点
    </div>
    <hr class="hr"/>
    <input type="hidden" id="point_id" value="<?php echo $teacher_point['id'];?>"/>
    <div class="option" id="base_point" >
        <label class="label">基本工作量：</label>
        <label class="label">是</label>
        <input type="hidden" id="workload_value" value="<?php echo $teacher_point['workload'];?>"/>
        <input type="checkbox" <?php if($teacher_point['workload'] == 1){ echo 'checked';}?> value="1" class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" <?php if($teacher_point['workload'] == 0 && !empty($teacher_point)){ echo 'checked';}?> value="0" class="no"/>
        <label class="label2">积点数：100</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>语文、数学、英语10节/周；物理、化学、生物、政治、历史、地理12节/周；体育、艺术、通用技术、信息技术、心理健康14节/周。高三高考科目10节/周，高三高考综合科目两个班为满工作量。</span>
    </div>
    <div class="div_title">
        兼职岗位积点
    </div>
    <hr class="hr"/>
    <div class="option">
        <label class="label" style="float: left;">科组长、备课组长：</label>
        <div class="vocation">
            <select class="select4" id="is_section_leader" style="width: 250px">
                <option value="0"  selected>不是</option>
                <option value="1" <?php if($teacher_point['section_leader'] == 1){ echo 'selected';}?> >科组长</option>
                <option value="2" <?php if($teacher_point['section_leader'] == 2){ echo 'selected';}?>>备课组长</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：科组长45、备课组长30</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>按照学校制定的岗位职责进行考评、科组长、备课组长竞争上岗。</span>
    </div>
    <div class="option" id="director">
        <label class="label">主任、副主任、部门干事 、年级长、副级长、班主任：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['director'] == 1){ echo 'checked';}?> class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['director'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> class="no"/>
        <label class="label2">积点数：45</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>按照学校岗位需求情况，实行竞争上岗。</span>
    </div>
    <div class="option" id="officer">
        <label class="label">部门干事：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['officer'] == 1){ echo 'checked';}?>  class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0"  <?php if($teacher_point['officer'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> class="no"/>
        <label class="label2">积点数：40</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>按照学校岗位需求情况，实行竞争上岗。</span>
    </div>
    <div class="option" id="school_leader">
        <label class="label">校级领导：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['school_leader'] == 1){ echo 'checked';}?> class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['school_leader'] == 0 && !empty($teacher_point) ){ echo 'checked';}?>  class="no"/>
        <label class="label2">积点数：60</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>按照学校岗位需求情况，实行竞争上岗。</span>
    </div>
    <div class="option" id="part_time_magazine">
        <label class="label">兼职校刊、校报编辑工作、青蓝工程指导教师：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['part_time_magazine'] == 1){ echo 'checked';}?>  class="yes"/>
        <div id="part_time_magazine_upload" style="width: 200px;position: absolute;z-index: 99;margin-top: -30px;margin-left: 465px;"><?php if(!empty($teacher_point['part_time_magazine_data'])){ echo '重新上传';}else{ echo '上传兼职证明文件';}?></div>&nbsp;
<!--        --><?php //if(!empty($teacher_point['part_time_magazine'])){
//            echo '<a target="_blank" style="margin-left: 200px" href="http://'.$_SERVER['HTTP_HOST']."/".$teacher_point['part_time_magazine_data'].'">点击预览</a>';
//        }?>
        <input type="hidden" id="part_time_magazine_upload_data" value="<?php echo $teacher_point['part_time_magazine_data'];?>"/>
        <label class="label" style="margin-left: 200px">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['part_time_magazine'] == 0 && !empty($teacher_point) ){ echo 'checked';}?>  class="no"/>
        <label class="label2"  >积点数：12</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>提供工作量记录和指导记录。</span>
    </div>
    <div class="option" id="academic">
        <label class="label">学术委员、学堂干事：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['academic'] == 1){ echo 'checked';}?>  class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['academic'] == 0 && !empty($teacher_point)){ echo 'checked';}?> class="no"/>
        <label class="label2">积点数：15</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>无。</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">教科研情况：</label>
        <div class="vocation">
            <select class="select2" id="education_case" style="width: 250px">
                <option value="0"  selected>不是</option>
                <option value="1" <?php if($teacher_point['education_case'] == 1){ echo 'selected';}?>>在研的校级课题主持人</option>
                <option value="2" <?php if($teacher_point['education_case'] == 2){ echo 'selected';}?>>在研的校级课题成员排序前三位</option>
                <option value="3" <?php if($teacher_point['education_case'] == 3){ echo 'selected';}?>>在研的校级课题其他成员</option>
                <option value="4" <?php if($teacher_point['education_case'] == 4){ echo 'selected';}?>>在研的市级及市级以上课题主持人</option>
                <option value="5" <?php if($teacher_point['education_case'] == 5){ echo 'selected';}?>>在研的市级及市级以上课题成员排序前三位</option>
                <option value="6" <?php if($teacher_point['education_case'] == 6){ echo 'selected';}?>>在研的市级及市级以上课题其他成员</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>在研的校级课题：主持人7，成员排序前三位4，其他成员2；在研的市级及市级以上课题：主持人11，成员排序前三位6，其他成员3。校，市、省、全国教育行政部门或直属学会立项的课题，（含子课题）。不同级别的相同课题，按一个计，取最高分。每人每学年最多计两个课题</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">每年提交一项最高级别的发表论文：</label>
        <div class="vocation">
            <select class="select2" id="paper" style="width: 250px">
                <option value="0" selected >无</option>
                <option value="1" <?php if($teacher_point['paper'] == 1){ echo 'selected';}?>>校级</option>
                <option value="2" <?php if($teacher_point['paper'] == 2){ echo 'selected';}?>>市级</option>
                <option value="3" <?php if($teacher_point['paper'] == 3){ echo 'selected';}?>>省级</option>
                <option value="4" <?php if($teacher_point['paper'] == 4){ echo 'selected';}?>>国家级</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>校级5点、市级10点、省级15点、国家级20点。</span>
    </div>
    <div class="option" id="eight_teacher">
        <label class="label">八大学堂选修课主讲教师：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['eight_teacher'] == 1){ echo 'checked';}?> class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['eight_teacher'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> class="no" />
        <label class="label2">积点数：5</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>无</span>
    </div>
    <div class="option" id="league_teacher">
        <label class="label">社团指导老师：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['league_teacher'] == 1){ echo 'checked';}?> class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['league_teacher'] == 0 && !empty($teacher_point)  ){ echo 'checked';}?> class="no"/>
        <label class="label2">积点数：5</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>无</span>
    </div>
    <div class="option" id="tutor">
        <label class="label">导师制导师：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox"  value="1" <?php if($teacher_point['tutor'] == 1){ echo 'checked';}?> class="yes"/>
        <label class="label">否</label>
        <input type="checkbox"  value="0" <?php if($teacher_point['tutor'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> class="no"/>
        <label class="label2">积点数：5</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>无</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">工会委员会：</label>
        <div class="vocation">
            <select class="select2" id="union" style="width: 250px">
                <option value="0" selected>不是</option>
                <option value="1" <?php if($teacher_point['union'] == 1){ echo 'selected';}?> >工会委员会成员</option>
                <option value="2" <?php if($teacher_point['union'] == 2){ echo 'selected';}?>>工会委员会组长</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>工会委员增加5个积点，工会组长增加9个积点。</span>
    </div>
    <div class="option" id="join_festival">
        <label class="label">参与学校重大节日：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['join_festival'] == 1){ echo 'checked';}?> class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['join_festival'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> class="no"/>
        <label class="label2">积点数：4</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>无</span>
    </div>
    <div class="option" id="counselor">
        <label class="label">心理咨询师：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['counselor'] == 1){ echo 'checked';}?> class="yes" />
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['counselor'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> class="no" />
        <label class="label2">积点数：5</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>无</span>
    </div>
    <div class="div_title">
        奖励性积点
    </div>
    <hr class="hr"/>
    <div class="option" id="substitute">
        <label class="label">替公假、事假、病假、婚假老师顶岗代课：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['substitute'] == 1){ echo 'checked';}?> class="yes"/>
        <input type="text" placeholder="代课节数" class="input_text" style="width: 82px" id="substitute_num" value="<?php if($teacher_point['substitute_num'] > 0){echo $teacher_point['substitute_num'];} ?>" />
        <div id="substitute_upload" style="width: 200px;position: absolute;z-index: 99;margin-top: -40px;margin-left: 550px;"> <?php if(!empty($teacher_point['substitute_data'])){ echo '重新上传';} else{ echo '上传代课证明文件';}?> </div>&nbsp;
        <input type="hidden" id="substitute_upload_data" value=""/>
        <label class="label" style="margin-left: 200px" <?php if($teacher_point['substitute'] == 0 && !empty($teacher_point) ){ echo 'checked';}?>>否</label>
        <input type="checkbox" value="0" class="no"/>
        <label class="label2">积点数：见积点说明</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>每带一节加0.5积点。以教务处调课单据为依据</span>
    </div>
    <div class="option" id="satisfaction_survey">
        <label class="label">学生满意度调查,满意度达80%以上：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['satisfaction_survey'] == 1){ echo 'checked';}?> class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['satisfaction_survey'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> class="no"/>
        <label class="label2">积点数：5</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>每学年进行2次满意度调查，每次满意度达80%以上，可获得5个积点奖励。</span>
    </div>
    <div class="option" id="attendance_award">
        <label class="label">出勤，是否全勤：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" class="yes" <?php if($teacher_point['attendance_award'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> />
        <div id="attendance_award_upload" style="width: 200px;position: absolute;z-index: 99;margin-top: -40px;margin-left: 220px;"><?php if(!empty($teacher_point['attendance_award_data'])){ echo '重新上传';} else{ echo '上传出勤文件';}?></div>&nbsp;
        <input type="hidden" id="attendance_award_upload_data" value=""/>
        <label class="label" style="margin-left: 200px">否</label>
        <input type="checkbox" value="0" class="no" <?php if($teacher_point['attendance_award'] > 0){ echo 'checked';}?> />
        <input type="text" placeholder="缺席次数" class="input_text" style="width: 82px" id="attendance_award_num" value="<?php echo $teacher_point['attendance_award'];?>"/>
        <label class="label2">积点数：20</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>全校集会、部门会议、科组、备课组、班主任例会等缺席一次扣除1个积点，扣完为止。部门负责人负责考勤，提供考勤记录。</span>
    </div>
    <div class="option" id="school_teacher">
        <label class="label">高三（初三）教师、多语种班项目：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['school_teacher'] == 1){ echo 'checked';}?> class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['school_teacher'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> class="no" />
        <label class="label2">积点数：30</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>多语种班和毕业班教师不重复计算。</span>
    </div>
    <div class="option" id="finish_goal">
        <label class="label">完成高考（中考）预定指标：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" <?php if($teacher_point['finish_goal'] == 1){ echo 'checked';}?> class="yes"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['finish_goal'] == 0 && !empty($teacher_point) ) { echo 'checked';}?> class="no"/>
        <label class="label2">积点数：5</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>完成高考（中考）预定指标另加5个奖励积点。</span>
    </div>
    <div class="option" id="college">
        <label class="label">本科生超出指标数量：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" class="yes" <?php if($teacher_point['college_num'] > 0){ echo 'checked';}?>  />
        <input type="text" placeholder="超出指标数量" class="input_text" style="width: 150px" id="college_num" value="<?php if($teacher_point['college_num'] > 0){ echo $teacher_point['college_num'];}?>"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" class="no" <?php if($teacher_point['college_num'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> />
        <label class="label2">积点数：见积点说明</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>本科生超出指标数量，一个增加6个积点。</span>
    </div>
    <div class="option" id="middle">
        <label class="label">重点高中生超出指标数量：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1"  <?php if($teacher_point['middle_num'] > 0){ echo 'checked';}?>  class="yes"/>
        <input type="text" placeholder="超出指标数量" class="input_text" style="width: 100px" id="middle_num" value="<?php if($teacher_point['middle_num'] > 0){ echo $teacher_point['middle_num'];}?>" />
        <label class="label">否</label>
        <input type="checkbox" value="0" <?php if($teacher_point['middle_num'] == 0 && !empty($teacher_point) ){ echo 'checked';}?>  class="no"/>
        <label class="label2">积点数：见积点说明</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>重点生指标每多超一个，加10个点。</span>
    </div>
    <div class="option" id="super_workload">
        <label class="label">超出工作量：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" class="yes" <?php if($teacher_point['super_workload'] > 0){ echo 'checked';}?> />
        <input type="text" placeholder="超出节课数" class="input_text" style="width: 100px" id="super_workload_num" value="<?php if($teacher_point['super_workload'] > 0){ echo $teacher_point['super_workload'];}?>" />
        <label class="label">否</label>
        <input type="checkbox" value="0" class="no" <?php if($teacher_point['super_workload'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> />
        <label class="label2">积点数：见积点说明</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>超出工作量的上课节数，每节课增加0.5个积点。</span>
    </div>
    <div class="option" id="school_class">
        <label class="label">校级公开课实验课：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" class="yes" <?php if($teacher_point['school_class'] > 0){ echo 'checked';}?> />
        <input type="text" placeholder="节课数" class="input_text" style="width: 100px" id="school_class_num" value="<?php if($teacher_point['school_class'] > 0){ echo $teacher_point['school_class'];}?>" />
        <label class="label">否</label>
        <input type="checkbox" value="0" class="no" <?php if($teacher_point['school_class'] == 0 && !empty($teacher_point) ){ echo 'checked';}?>  />
        <label class="label2">积点数：见积点说明</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>校级公开课实验课，每节课增加5个积点。</span>
    </div>
    <div class="option" id="city_class">
        <label class="label">市级公开课实验课：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" class="yes" <?php if($teacher_point['city_class'] > 0){ echo 'checked';}?>/>
        <input type="text" placeholder="节课数" class="input_text" style="width: 100px" id="city_class_num" value="<?php if($teacher_point['city_class'] > 0){ echo $teacher_point['city_class'];}?>"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" class="no" <?php if($teacher_point['city_class'] == 0 && !empty($teacher_point) ){ echo 'checked';}?> />
        <label class="label2">积点数：见积点说明</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>校级公开课实验课，每节课增加10个积点。</span>
    </div>
    <div class="option" id="courses">
        <label class="label">八大学堂精品课程：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" class="yes" <?php if($teacher_point['courses'] > 0){ echo 'checked';}?>/>
        <input type="text" placeholder="节课数" class="input_text" style="width: 100px" id="courses_num" value="<?php if($teacher_point['courses'] > 0){ echo $teacher_point['courses'];}?>"/>
        <label class="label">否</label>
        <input type="checkbox" value="0" class="no" <?php if($teacher_point['courses'] == 0 && !empty($teacher_point) ){ echo 'checked';}?>/>
        <label class="label2">积点数：见积点说明</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>八大学堂精品课程，获得精品课程的次数，每学年最多2次，每次可以增加3个积点。</span>
    </div>
    <div class="option">
        <label class="label">中学生奥林匹克竞赛、学科竞赛、外语竞赛、综合、通用类比赛：</label><br><br>
        <input type="text" placeholder="学生进入国家集训队的个数" class="input_text" style="width: 200px" id="country_match_num" value="<?php echo $teacher_point['country_match'];?>" />
        <input type="text" placeholder="学生进入省级的个数" class="input_text" style="width: 150px" id="province_match_num" value="<?php echo $teacher_point['province_match'];?>" />
        <input type="text" placeholder="学生进入市级的个数" class="input_text" style="width: 150px" id="city_match_num" value="<?php echo $teacher_point['city_match'];?>" />
        <label class="label2">积点数：见积点说明</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>学生进入国家集训队或以上，可获得5×（学生数）个积点。省级以上3×（学生数），市级以上1×（学生数）。</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">学段考的试卷是否优秀试卷：</label>
        <div class="vocation">
            <select class="select2" id="exam_pro">
                <option value="0" selected>无</option>
                <option value="1" <?php if($teacher_point['exam_pro'] == 1){ echo 'selected';}?> >一等试卷</option>
                <option value="2" <?php if($teacher_point['exam_pro'] == 2){ echo 'selected';}?>>二等试卷</option>
                <option value="3" <?php if($teacher_point['exam_pro'] == 3){ echo 'selected';}?>>三等试卷</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>一等试卷可获得3个积点，二等试卷2个积点，三等试卷1个积点。命题不合格试卷，除追究责任之外，取消任何积点奖励。</span>
    </div>
    <div class="option" id="exam_rank">
        <label class="label">学段考试成绩综合排名同备课组内位列前50%：</label>
        <label class="label">是</label>
        <input type="hidden" id="director_value" value="<?php echo $teacher_point['director'];?>"/>
        <input type="checkbox" value="1" class="yes" <?php if($teacher_point['exam_rank'] == 1){ echo 'checked';}?>/>
        <div id="exam_rank_upload" style="width: 200px;position: absolute;z-index: 99;margin-top: -30px;margin-left: 480px;"><?php if(!empty($teacher_point['exam_rank_data'])){echo '重新上传';}else{ echo '上传考试成绩单';} ?></div>&nbsp;
        <input type="hidden" id="exam_rank_upload_data" value="<?php if(!empty($teacher_point['exam_rank_data'])){ echo $teacher_point['exam_rank_data'];}?>"/>
        <label class="label" style="margin-left: 200px" <?php if($teacher_point['exam_rank'] == 0 && !empty($teacher_point) ){ echo 'checked';}?>>否</label>
        <input type="checkbox" value="0" class="no"/>
        <label class="label2">积点数：6</label>
        <span style="margin-top: 20px"><b style="color: red">积点说明：</b>以教务处学段考考试简报为依据，学段考试成绩综合排名（参考B值，均分）在同备课组内位列前50%的，奖励科任老师6个积点。</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">优秀特色学科组：</label>
        <div class="vocation">
            <select class="select6" id="outstand_sub" style="width: 250px">
                <option value="0" selected>不是</option>
                <option value="1" <?php if($teacher_point['outstand_sub'] == 1){ echo 'selected';}?>>市级以上科组成员</option>
                <option value="2" <?php if($teacher_point['outstand_sub'] == 2){ echo 'selected';}?>>市级以上科组组长</option>
            </select>
        </div>
        &nbsp; &nbsp; &nbsp; &nbsp;
        <div id="outstand_sub_upload"  style="width: 200px;position: absolute;z-index: 99;margin-left: 350px;margin-top: -18px;"><?php if(!empty($teacher_point['outstand_sub_data'])){echo '重新上传';}else{ echo '上传证明文件';}?></div>&nbsp;
        <input type="hidden" id="outstand_sub_upload_data" value="<?php echo $teacher_point['outstand_sub_data'];?>"/>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>以市教科院文件为准，市级以上科组成员人均获得2个积点。科组长另奖励5个积点。</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">优秀班主任或工作人员或优秀课题组主持人或课题组科研骨干：</label>
        <div class="vocation">
            <select class="select4" id="select_outstand_school" >
                <option value="0" selected>不是</option>
                <option value="1" <?php if($teacher_point['select_outstand_school'] == 1){ echo 'selected';}?>>校级</option>
                <option value="2" <?php if($teacher_point['select_outstand_school'] == 2){ echo 'selected';}?>>市级</option>
                <option value="3" <?php if($teacher_point['select_outstand_school'] == 3){ echo 'selected';}?>>省级</option>
                <option value="4" <?php if($teacher_point['select_outstand_school'] == 4){ echo 'selected';}?>>国家级</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点。</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">年度考核优秀：</label>
        <div class="vocation">
            <select class="select4" id="select_outstand_year">
                <option value="0" selected>不是</option>
                <option value="1" <?php if($teacher_point['select_outstand_year'] == 1){ echo 'selected';}?>>校级</option>
                <option value="2" <?php if($teacher_point['select_outstand_year'] == 2){ echo 'selected';}?>>市级</option>
                <option value="3" <?php if($teacher_point['select_outstand_year'] == 3){ echo 'selected';}?>>省级</option>
                <option value="4" <?php if($teacher_point['select_outstand_year'] == 4){ echo 'selected';}?>>国家级</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点。</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">教育系统表彰高考工作先进个人（学科先进个人）：</label>
        <div class="vocation">
            <select class="select4" id="select_outstand_person">
                <option value="0" selected>不是</option>
                <option value="1" <?php if($teacher_point['select_outstand_person'] == 1){ echo 'selected';}?>>校级</option>
                <option value="2" <?php if($teacher_point['select_outstand_person'] == 2){ echo 'selected';}?>>市级</option>
                <option value="3" <?php if($teacher_point['select_outstand_person'] == 3){ echo 'selected';}?>>省级</option>
                <option value="4" <?php if($teacher_point['select_outstand_person'] == 4){ echo 'selected';}?>>国家级</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点。</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">专家、特级教师名师、名班主任、骨干教师、教坛新秀：</label>
        <div class="vocation">
            <select class="select4" id="expert">
                <option value="0" selected>不是</option>
                <option value="1" <?php if($teacher_point['expert'] == 1){ echo 'selected';}?>>市级</option>
                <option value="2" <?php if($teacher_point['expert'] == 2){ echo 'selected';}?>>省级</option>
                <option value="3" <?php if($teacher_point['expert'] == 3){ echo 'selected';}?>>特级</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>教育科研专家工作室主持人、名师工作室主持人、名班主任、骨干教师、教坛新秀等市级奖励10个积点，省级奖励15个积点。特级教师奖励20个积点。</span>
    </div>
    <div class="div_title">
        个人资历积点
    </div>
    <hr class="hr"/>
    <div class="option">
        <label class="label" style="float: left;">工龄：</label>
        <input class="input_text" id="work_year" value="<?php echo $teacher_point['work_year']?>" type="text" placeholder="竞聘人员参加工作之月" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>自竞聘人员参加工作之月计起（以人事档案的第一份履历表为准），每月0.4分。研究生工龄从上研究生之日进行计算。</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">市龄：</label>
        <input class="input_text" id="city_year" value="<?php echo $teacher_point['city_year']?>" type="text" placeholder="竞聘人员正式调入我市工作之月" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b> 自竞聘人员正式调入我市工作当月计起（以到主管部门报到时间为准），每月0.6分。校龄分每日加0.2分。</span>
    </div>
    <div class="option">
        <label class="label" style="float: left;">职称资格：</label>
        <input class="input_text" id="job_title_time" value="<?php echo $teacher_point['job_title']?>" type="text" placeholder="专业技术职称资格时间" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>自取得拟竞聘的专业技术职称资格时间计起（以证书为准），每月0.8分。</span>
    </div>
    <div style="margin-bottom: 20px">
        <label class="label" style="float: left;">研究生学历（位）：</label>
        <div class="vocation">
            <select class="select5" id="postgraduate">
                <option value="0" selected>不是</option>
                <option value="1" <?php if($teacher_point['postgraduate'] == 1){ echo 'selected';}?>>全日制研究生学历和硕士学位</option>
                <option value="2" <?php if($teacher_point['postgraduate'] == 2){ echo 'selected';}?>>全日制研究生学历和博士学位</option>
            </select>
        </div>
        <br>
        <label class="label2" >积点数：见积点说明</label>
        <br>
        <span style="margin-top: 20px;z-index: 1000"><b style="color: red">积点说明：</b>获得全日制研究生学历和硕士学位者加9分；获得全日制研究生学历和博士学位者加15分。有研究生学位者视为研究生对待。</span>
    </div>
    <button class="btn_primary" style="margin-left: 20px" id = "submit2" >确认</button>
    <button class="btn_primary" style="margin-left: 20px" id = "submit_check">提交审核</button>
</div>
<script type="text/javascript" src="/template/js/DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/template/js/zepto.min.js"></script>
<script type="text/javascript" src="/template/js/input_point.js"></script>
<script type="text/javascript" src="/template/webuploader/js/webuploader.js"></script>
<script type="text/javascript" src="/template/js/upload.js"></script>
</body>
</html>
