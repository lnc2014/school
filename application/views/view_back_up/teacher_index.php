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
        <li><a href="#">教师首页</a></li>
    </ul>
</div>

<div class="mainindex">
    <div class="welinfo">
        <span><img src="/template/images/sun.png" alt="天气" /></span>
        <b><?php echo $_SESSION['name']?>,您好！欢迎使用绩效考核管理系统</b>
    </div>
    <div class="xline"></div>

    <table class="tablelist">
        <?php if(empty($teacher_point)){
        echo '<tr>暂无历史记录</tr>';
        }else{ ?>
        <thead>
        <tr>
            <th>年度<i class="sort"><img src="/template/images/px.gif" /></i></th>
            <th>基本岗位积点</th>
            <th>兼职岗位积点</th>
            <th>奖励性积点</th>
            <th>个人资历积点</th>
            <th>教务处绩效得分</th>
            <th>最后等分</th>
            <th>排名</th>
            <th>状态</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach($teacher_point as $point){ ?>
            <tr>
                <td><?php  echo $point['year']; ?></td>
                <td><?php  echo $point['base_point']; ?></td>
                <td><?php  echo $point['part_time_point']; ?></td>
                <td><?php  echo $point['award_point']; ?></td>
                <td><?php  echo $point['person_point']; ?></td>
                <td><?php  echo $point['per_point']; ?></td>
                <td><?php  echo $point['all_point']; ?></td>
                <td>暂无</td>
                <td><?php
                    if($point['status'] == 6){
                        echo '已公布';
                    }else{
                        echo '待公布';
                    }
                    ?></td>
            </tr>
        <?php }
        ?>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>

