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
        <input name="" class="btn" value="新增账号" onclick="javascript:window.location='/index.php/system/add_teacher'" type="button">
    </div>
    <div class="xline"></div>
    <div id="tab2" class="tabson" style="display: block;">
        <ul class="seachform">
            <li><label>教师姓名或者手机号码</label><input id="search_data" type="text" class="scinput"></li>
            <li><label>&nbsp;</label><input  onclick="search_data()" type="button" class="scbtn" value="搜索"></li>
        </ul>
    </div>
    <table class="tablelist">
        <thead>
        <tr>
            <th>ID<i class="sort"><img src="/template/images/px.gif" /></i></th>
            <th>名字</th>
            <th>账号</th>
            <th>手机号码</th>
            <th>所属部门</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($teacher_list as $teacher){ ?>
            <tr>
                <td><?php  echo $teacher['teacher_id']; ?></td>
                <td><?php  echo $teacher['user_name']; ?></td>
                <td><?php  echo $teacher['account']; ?></td>
                <td><?php  echo $teacher['mobile']; ?></td>
                <td><?php
                    if($teacher['department'] == 1){
                        echo '教师队伍';
                    }elseif($teacher['department'] == 2){
                        echo '教务处成员';
                    }elseif($teacher['department'] == 3){
                        echo '办公室成员';
                    }elseif($teacher['department'] == 4){
                        echo '评审委员会成员';
                    }elseif($teacher['department'] == 5){
                        echo '校长';
                    }
                    ?></td>
                <td>
                    <a href="/index.php/system/add_teacher/<?php echo $teacher['teacher_id']?>" id="edit" class="tablelink">修改</a>&nbsp;&nbsp;
                    <a href="/index.php/system/change_psw/<?php echo $teacher['teacher_id']?>" id="edit" class="tablelink">修改密码</a>&nbsp;&nbsp;
                    <a href="#" onclick="del_teacher(<?php echo $teacher['teacher_id']?>)" class="tablelink" style="color: red">删除</a>
                </td>
            </tr>
        <?php }
        ?>

        </tbody>
    </table>
    <?php
    if(empty($search_data)){?>
    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo $all_teachers;?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo $current_page?>&nbsp;</i>页</div>
        <ul class="paginList">
            <?php
            for($i=1;$i<=$pages;$i++){ ?>
                <li class="paginItem <?php if($i == $current_page){ echo 'current'; } ?>"><a href="/index.php/system/index?search_data=<?php echo $search_data?>&page=<?php echo $i?>"><?php echo $i;?></a></li>
            <?php }
            ?>
        </ul>
    </div>
    <?php
    }
    ?>
</div>
<script type="text/javascript" src="/template/js/zepto.min.js"></script>
<script type="text/javascript">

    function del_teacher(teacher_id){
        if(confirm('删除为不可恢复操作！')){
            $.ajax({
                type: "POST",
                url: "/index.php/system/del_teacher",
                data: {
                    teacher_id : teacher_id
                },
                dataType: "json",
                success: function(json){
                    if(json.result == '0000'){
                        alert('删除成功');
                        window.location = '/index.php/system/index';
                    }else {
                        alert(json.info);
                    }
                },
                error: function(){
                    alert("加载失败");
                }
            });
        }
    }
    function search_data(){
        var search_data = $("#search_data").val();
        window.location = '/index.php/system/index?search_data='+search_data;
    }
</script>
</body>
</html>

