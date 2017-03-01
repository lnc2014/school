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
        <table class="imgtable" style="    margin-left: 200px; width: 50%;font-size: 50px">
            <tbody>


            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">姓名</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"> <?php echo $teacher['name'] ?></a></td>
            </tr>

            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">性别</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"> <?php echo ($teacher['sex'] == 1)?'男':'女'; ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">人员状态</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo ($teacher['teacher_status'] == 1)?'在职':'不在职'; ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">出生日期</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['born'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">学历</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php
                        if($teacher['education'] == 1){
                            echo '大学本科';
                        }elseif($teacher['education'] == 1){
                            echo '研究生';
                        }else{
                            echo '硕士研究生';
                        }
                        ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">现聘岗位</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['now_level_info'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">岗位级别</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['now_level'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">现聘岗位起始时间</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['work_start_time'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">现任职务名称</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['now_work_duty'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">现任职务层次</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['now_work_level'] ?></a></td>
            </tr>            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">现任职务层次起始时间</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['now_work_time'] ?></a></td>
            </tr>            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">参加工作时间</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['work_time'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">工作年限</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['work_year'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">来校时间</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['school_work_time'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">来校年限</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['school_work_year'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">二外入编时间</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['er_school_time'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">入编年限</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['er_school_year'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">职称取得时间</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['qua_time'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">职称年限</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['qua_year'] ?></a></td>
            </tr>
            <tr class="odd">
                <td class="imgtd" style="line-height: 36px; text-indent: 24px;font-size: 16px;">职称</td>
                <td><a href="#" style="line-height: 36px; text-indent: 24px;font-size: 16px;"><?php echo $teacher['qua_name'] ?></a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

