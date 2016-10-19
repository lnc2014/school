<?php
/**
 * Description：教师首页
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:56
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">教师个人信息</a></li>
    </ul>
</div>

<div class="mainindex">
    <div class="formbody">
        <div class="formtitle"><span>教师基本信息</span></div>
        <ul class="forminfo" style="margin-top: -20px;">
            <li><label>姓名</label><cite><?php echo $teacher['name'] ?></cite></li>
            <li><label>电话号码</label><cite><?php echo $teacher['mobile'] ?></cite></li>
            <li><label>所教学科</label><cite><?php
            if($teacher['subject'] == 1){
                echo '语文';
//                1为语文，2为数学，3为英语，4为计算机，5为音乐（后面扩展），0为没有学科
            }elseif($teacher['subject'] == 2){
                echo '数学';
            }elseif($teacher['subject'] == 3){
                echo '计算机';
            }elseif($teacher['subject'] == 4){
                echo '音乐';
            }elseif($teacher['subject'] == 5){
                echo '数学';
            }else{
                echo '管理人员';
            }  ?></cite></li>
            <li><label>居住地</label><cite><?php echo $teacher['address'] ?></cite></li>
            <li><label>所属部门</label><cite><?php
            if($teacher['department'] == 1){
//                所属部门，1为教师队伍，没有所属部门，2为教务处成员，3办公室成员，4为评审委员会成员,5为校长
                echo '教师队伍';
            }elseif($teacher['department'] == 2){
                echo '教务处';
            }elseif($teacher['department'] == 3){
                echo '办公室';
            }elseif($teacher['department'] == 4){
                echo '评审委员会成员';
            }elseif($teacher['department'] == 5){
                echo '校长';
            } ?></cite></li>
            <li><input style="margin-left: 26px;margin-top: 10px;" type="button" class="btn" value="修改" onclick="javascript:window.location='/index.php/teacher/edit_info'"></li>
        </ul>
    </div>
</div>
</body>
</html>

