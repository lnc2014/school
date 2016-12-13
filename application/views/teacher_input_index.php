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
    if($have_point == 1){ //如果有积点填写
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
                <input type="hidden" id="point_id" value="<?php echo $teacher_total_point['id']?>">
                <td><?php echo $teacher_total_point['year']?></td>
                <td><?php echo $teacher_total_point['base_point']?></td>
                <td><?php echo $teacher_total_point['part_time_point']?></td>
                <td><?php echo $teacher_total_point['award_point']?></td>
                <td><?php echo $teacher_total_point['person_point']?></td>
                <td><?php echo $teacher_total_point['per_point']?></td>
                <td><?php echo $teacher_total_point['all_point']?></td>
                <td>
                    <?php
                    if($teacher_total_point['status'] == 1){ ?>
                        <a href="/index.php/teacher/edit_point?point_id=<?php echo $teacher_total_point['id']?>"  class="tablelink">修改</a>&nbsp;&nbsp;
                        <?php
                        if(!empty($teacher_total_point['refuse_reason'])){ ?>

                            <a href="#" class="tablelink" style="color: red"> 审核不通过：<?php echo $teacher_total_point['refuse_reason']; ?></a>
                            <a href="#" id = "submit_check" class="tablelink" style="color: blue"> 重新提交审核</a>
                        <?php }else{ ?>
                            <a href="#" id = "submit_check" class="tablelink" style="color: red"> 提交审核</a>
                        <?php }
                    }else{
                        ?>
                        <a href="#" class="tablelink">审核中</a>
                    <?php } ?>
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
    }else{ ?>
        <div class="welinfo">
            <span><img src="/template/images/sun.png" alt="天气" /></span>
            <b><?php echo $_SESSION['name']?>,您好！暂无可以填写积点。</b>
        </div>
    <?php }
    ?>
</div>
<script type="text/javascript" src="/template/js/zepto.min.js"></script>
<script type="text/javascript">
$(function(){
    $("#submit_check").click(function(){
        if(confirm('提交审核之后，将不可以修改！')){
            var ponit_id = $('#point_id').val();
            if(!ponit_id){
                alert('操作错误，请联系管理员');
                return;
            }
            $.ajax({
                async:false,
                type : 'POST',
                url: '/index.php/teacher/submit_check',
                data : {
                    ponit_id:ponit_id
                },
                dataType : 'json',
                success: function (data)
                {
                    if (data.result == '0000') {
                        alert('提交审核成功');
                        location.reload();
                    } else {
                        alert(data.info);
                    }
                }
            });

        }
    });
});
</script>
</body>
</html>

