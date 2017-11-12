<?php
/**
 * Description 办公室首页
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
        <li><a href="#">办公室首页</a></li>
    </ul>
</div>

<div class="mainindex">
    <div class="welinfo">
        <span><img src="/template/images/sun.png" alt="天气" /></span>
        <b><?php echo $_SESSION['name']?>,您好！欢迎使用绩效考核管理系统。本年度积点审核已经提交的教师如下表：</b>
    </div>
    <div class="xline"></div>

    <table class="tablelist">
        <?php if(empty($teacher_check)){
            echo '<tr>暂无可以审核的记录</tr>';
        }else{ ?>
        <thead>
        <tr>
            <th>年度<i class="sort"><img src="/template/images/px.gif" /></i></th>
            <th>教师名字</th>
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
        <?php
        foreach($teacher_check as $point){ ?>
            <tr>
                <td><?php  echo $point['first_year'].'-'.$point['last_year']; ?></td>
                <td><?php  echo $point['name']; ?></td>
<!--                <td>--><?php
//                    if($point['subject'] == 1){
//                        echo '语文';
//                    }elseif($point['subject'] == 2){
//                        echo '数学';
//                    }elseif($point['subject'] == 3){
//                        echo '英语';
//                    }elseif($point['subject'] == 4){
//                        echo '计算机';
//                    }elseif($point['subject'] == 5){
//                        echo '音乐';
//                    }else{
//                        echo '管理人员';
//                    }
//                    ?><!--</td>-->
                <td><?php  echo $point['base_point']; ?></td>
                <td><?php  echo $point['part_time_point']; ?></td>
                <td><?php  echo $point['award_point']; ?></td>
                <td><?php  echo $point['person_point']; ?></td>
                <td><?php  echo $point['per_point']; ?></td>
                <td><?php  echo $point['all_point']; ?></td>
                <td style="width: 350px">
                    <a href="/index.php/office/show_teacher_point?point_id=<?php echo $point['id'];?>"  class="tablelink" style="color: black">查看</a>
<!--                    <a href="/index.php/teacher/edit_point?point_id=--><?php //echo $point['id'];?><!--"  class="tablelink" style="color: blue">修改</a>-->
                    <a href="#" id="check" class="tablelink" style="color: red" onclick="pass(<?php echo $point['id']; ?>)">通过审核</a>
                    <a href="#" onclick="no_pass(<?php echo $point['id'];?>)" class="tablelink" style="color: red">不通过审核</a>
                </td>
            </tr>
        <?php }
        ?>
        <?php } ?>
        </tbody>
    </table>
    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo $all_pages; ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo $current_page ?>&nbsp;</i>页</div>
        <ul class="paginList">
            <?php
            for($i=1;$i<=$pages;$i++){ ?>
                <li class="paginItem <?php if($i == $current_page){ echo 'current'; } ?>"><a href="/index.php/office/index?page=<?php echo $i?>"><?php echo $i;?></a></li>
            <?php }
            ?>
        </ul>
    </div>
</div>
<div class="tip" id="check_reason" style="display: none;">
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
<script type="text/javascript" src="/template/js/zepto.min.js"></script>
<script type="text/javascript">
    var point_id;
    function pass(ponit_id){
        if(confirm('审核通过之后，将不可以修改！')){
            if(!ponit_id){
                alert('操作错误，请联系管理员');
                return;
            }
            $.ajax({
                async:false,
                type : 'POST',
                url: '/index.php/office/submit_check',
                data : {
                    ponit_id:ponit_id
                },
                dataType : 'json',
                success: function (data)
                {
                    if (data.result == '0000') {
                        alert('审核成功');
                        location.href = "/index.php/office/index" ;
                    } else {
                        alert(data.info);
                    }
                }
            });

        }
    }
    function cancel(){
        $('#check_reason').hide();
        $('#refuse_reason').val('');

    }
    function no_pass(ponit_id){
        point_id = ponit_id;//全局变量暂时封装为现有的
        if(!ponit_id){
            alert('程序出错，请联系管理员!');
            return;
        }
        $('#check_reason').show();
    }
    function is_no_pass(){
        var refuse_reason = $('#refuse_reason').val();
        if(!refuse_reason){
            alert('审核拒绝原因不能为空!');
            return;
        }
        $.ajax({
            async:false,
            type : 'POST',
            url: '/index.php/office/submit_check',
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
                    location.href = "/index.php/office/index" ;
                } else {
                    alert(data.info);
                }
            }
        });
    }
</script>
</body>
</html>

