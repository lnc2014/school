<?php
/**
 * Description 教务处首页
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
        <li><a href="#">校长首页</a></li>
    </ul>
</div>

<div class="mainindex">
    <div class="welinfo">
        <span><img src="/template/images/sun.png" alt="天气" /></span>
        <b><?php echo $_SESSION['name']?>,您好！欢迎使用绩效考核管理系统。
            <?php if(empty($first_teacher_check)){
            echo '本年度还有教师未填完积点或者已经发布';
            }else{ ?>
            本年度积点审核已经提交的教师如下表：</b>
        <button onclick="rank()" class="btn_success">公布排名</button>
        <?php } ?>
    </div>
    <div class="xline"></div>

    <table class="tablelist">
        <?php if(empty($first_teacher_check)){
//            echo '<tr>本年度还有教师未填完积点或者已经发布</tr>';
        }else{ ?>
        <thead>
        <tr>
            <th>排名</th>
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
        foreach($first_teacher_check as $point){ ?>
            <tr>
                <input id="point_id" type="hidden" value="<?php echo $point['id']; ?>">
                <td><?php  echo $point['rownum']; ?></td>
                <td><?php  echo $point['year']; ?></td>
                <td><?php  echo $point['base_point']; ?></td>
                <td><?php  echo $point['part_time_point']; ?></td>
                <td><?php  echo $point['award_point']; ?></td>
                <td><?php  echo $point['person_point']; ?></td>
                <td><?php  echo $point['per_point']; ?></td>
                <td><?php  echo $point['all_point']; ?></td>
                <td style="width: 350px">
                    <a href="/index.php/schoolmaster/show_teacher_point?point_id=<?php echo $point['id'];?>"  class="tablelink" style="color: black">查看</a>
                </td>
            </tr>
        <?php }
        ?>
        <?php } ?>
        </tbody>
    </table>
    <?php
    if(!empty($first_teacher_check)){ ?>
    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo $all_teachers;?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo $current_page?>&nbsp;</i>页</div>
        <ul class="paginList">
            <?php
            for($i=1;$i<=$pages;$i++){ ?>
                <li class="paginItem <?php if($i == $current_page){ echo 'current'; } ?>"><a href="/index.php/schoolmaster/index?page=<?php echo $i?>"><?php echo $i;?></a></li>
            <?php }
            ?>
        </ul>
    </div>
    <?php }
    ?>
</div>
<script type="text/javascript" src="/template/js/zepto.min.js"></script>
<script type="text/javascript">
    function rank(){
        if(confirm('是否发布本年的教师绩效考评成绩，一旦发布，所有教师都将看到本年度绩效排名')){
            $.ajax({
                async:false,
                type : 'POST',
                url: '/index.php/schoolmaster/rank',
                data : {
                    access_token:'NBJSNjskdnajnnsmdnkwnd56231240sdd'
                },
                dataType : 'json',
                success: function (data)
                {
                    if (data.result == '0000') {
                        alert('发布成功');
                        location.reload();
                    } else {
                        alert(data.info);
                    }
                }
            });

        }
    }
</script>
</body>
</html>

