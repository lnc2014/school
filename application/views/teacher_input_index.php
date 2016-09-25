<?php
/**
 * Description：教师录入积点首页
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
    <link href="/template/css/lnc.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">教师积点录入首页</a></li>
    </ul>
</div>
<div class="mainindex">
    <?php
    if($is_fill_point == 1){
        //已经填写了本年度
    ?>
        <div class="welinfo">
            <span><img src="/template/images/sun.png" alt="天气" /></span>
            <b><?php echo $_SESSION['name']?>,您好！你已经填写了本年度的积点，如若确定无误，可以提交审核。</b>
        </div>
        <div class="xline"></div>
        <table class="tablelist">
            <thead>
            <tr>
                <th>年度<i class="sort"><img src="/template/images/px.gif" /></i></th>
                <th>基本岗位积点</th>
                <th>兼职岗位积点</th>
                <th>奖励性积点</th>
                <th>个人资历积点</th>
                <th>教务处绩效得分</th>
                <th>最后等分</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>2016</td>
                <td>20</td>
                <td>50</td>
                <td>63</td>
                <td>23</td>
                <td>52</td>
                <td>126</td>
                <td>
                    <a href="#" class="tablelink">修改</a>&nbsp;&nbsp;
                    <a href="#" class="tablelink" style="color: red"> 提交审核</a>
                </td>
            </tr>
            </tbody>
        </table>
    <?php }else{ ?>
        <div class="welinfo">
            <span><img src="/template/images/sun.png" alt="天气" /></span>
            <b><?php echo $_SESSION['name']?>,您好！你尚未填写本年度积点，请尽快填写。
                <a href="/index.php/teacher/input_point" class="btn_primary" style="color: #fff;">填写积点</a>
            </b>
        </div>

    <?php
    }
    ?>

</div>
</body>
</html>

