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
    <div class="welinfo">
        <input name="" class="btn" value="发布新的积点" onclick="javascript:window.location='/index.php/system/add_point'" type="button">
    </div>
    <div class="xline"></div>
    <table class="tablelist">
        <thead>
        <tr>
            <th>ID<i class="sort"><img src="/template/images/px.gif" /></i></th>
            <th>积分年度</th>
            <th>积分说明</th>
            <th>填写开始时间</th>
            <th>填写截止时间</th>
            <th>添加时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($point_list as $point){ ?>
            <tr>
                <td><?php  echo $point['id']; ?></td>
                <td><?php  echo $point['year']; ?></td>
                <td><?php  echo $point['description']; ?></td>
                <td><?php  echo $point['start_time']; ?></td>
                <td><?php  echo $point['end_time']; ?></td>
                <td><?php  echo $point['create_time']; ?></td>
                <td><?php
                    if($point['status'] == 1){
                       echo '开启';
                    }else{
                        echo '关闭';
                    } ?></td>
                <td>
                    <a href="/index.php/system/add_point/<?php echo $point['id']?>" class="tablelink" style="color: cornflowerblue">修改</a>
                    <?php
                    if($point['status'] == 1){
                        ?>
                    <a href="#" onclick="operate(<?php echo $point['id']?>, 0)" class="tablelink" style="color: red">关闭</a>
                    <?php }else{ ?>
                        <a href="#" onclick="operate(<?php echo $point['id']?>, 1)" class="tablelink" style="color: red">开启</a>
                    <?php }
                    ?>

                </td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="/template/js/zepto.min.js"></script>
<script type="text/javascript">

    function operate(point_id, status){
        $.ajax({
            type: "POST",
            url: "/index.php/system/operate",
            data: {
                point_id : point_id,
                status : status
            },
            dataType: "json",
            success: function(json){
                if(json.result == '0000'){
                    alert('修改成功');
                    window.location = '/index.php/system/point';
                }else {
                    alert(json.info);
                }
            },
            error: function(){
                alert("加载失败");
            }
        });
    }

</script>
</body>
</html>

