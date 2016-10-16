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
                <input id="point_id" type="hidden" value="<?php echo $point['id']; ?>">
                <td><?php  echo $point['year']; ?></td>
                <td><?php  echo $point['base_point']; ?></td>
                <td><?php  echo $point['part_time_point']; ?></td>
                <td><?php  echo $point['award_point']; ?></td>
                <td><?php  echo $point['person_point']; ?></td>
                <td><?php  echo 0; ?></td>
                <td><?php  echo $point['total_point']; ?></td>
                <td style="width: 350px">
                    <a href="/index.php/office/show_teacher_point?point_id=<?php echo $point['id'];?>"  class="tablelink" style="color: black">查看</a>
                    <a href="#" id="check" class="tablelink" style="color: red">通过审核</a>
                </td>
            </tr>
        <?php }
        ?>
        <?php } ?>
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
<script type="text/javascript" src="/template/js/zepto.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#check").click(function(){
            if(confirm('审核通过之后，将不可以修改！')){
                var ponit_id = $('#point_id').val();
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

