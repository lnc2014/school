<?php
/**
 * Description：系统设置首页
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
        <li><a href="#">超级管理员首页</a></li>
    </ul>
</div>

<div class="mainindex">

    <div class="xline"></div>
    <table class="tablelist">
        <thead>
        <tr>
            <th>ID<i class="sort"><img src="/template/images/px.gif" /></i></th>
            <th>积分年度</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($point_list as $point){ ?>
            <tr>
                <td><?php  echo $point['id']; ?></td>
                <td><?php  echo $point['year']; ?></td>
                <td>
                    <a href="/index.php/system/download/<?php  echo $point['year']; ?>" class="tablelink" style="color: cornflowerblue">下载所有教师积点</a>
                </td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>

