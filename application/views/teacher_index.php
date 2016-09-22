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
            <td>12</td>
        </tr>
        <tr>
            <td>2015</td>
            <td>20</td>
            <td>50</td>
            <td>63</td>
            <td>23</td>
            <td>52</td>
            <td>126</td>
            <td>12</td>
        </tr>
        <tr>
            <td>2014</td>
            <td>20</td>
            <td>50</td>
            <td>63</td>
            <td>23</td>
            <td>52</td>
            <td>126</td>
            <td>12</td>
        </tr>

        </tbody>
    </table>
    <div class="pagin">
        <div class="message">共<i class="blue">3</i>条记录，当前显示第&nbsp;<i class="blue">1&nbsp;</i>页</div>
        <ul class="paginList">
            <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
            <li class="paginItem"><a href="javascript:;">1</a></li>
            <li class="paginItem current"><a href="javascript:;">2</a></li>
            <li class="paginItem"><a href="javascript:;">3</a></li>
            <li class="paginItem"><a href="javascript:;">4</a></li>
            <li class="paginItem"><a href="javascript:;">5</a></li>
            <li class="paginItem more"><a href="javascript:;">...</a></li>
            <li class="paginItem"><a href="javascript:;">10</a></li>
            <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
        </ul>
    </div>
</div>
</body>
</html>

