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
    <link href="/template/webuploader/css/webuploader.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/template/js/DatePicker/WdatePicker.js"></script>
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
    <div id="tab2" class="tabson" style="display: block;">
        <ul class="seachform">
            <li><label>积点年度</label><input  id="year" class="dfinput" type="text"  onClick="WdatePicker({dateFmt:'yyyy'})" style="width:60px;"/></li>
            <li><label>审核状态</label>
            <select id="status">
                <option <?php if($status == 1){ echo 'selected';}?> value="1">待审核，尚未提交</option>
                <option <?php if($status == 2){ echo 'selected';}?> value="2">办公室审核中</option>
                <option <?php if($status == 3){ echo 'selected';}?> value="3">教务处审核中</option>
                <option <?php if($status == 4){ echo 'selected';}?> value="4">科研处审核中</option>
                <option <?php if($status == 5){ echo 'selected';}?> value="5">学生处审核中</option>
                <option <?php if($status == 6){ echo 'selected';}?> value="6">已完成</option>
            </select>
            </li>
            <li><label>&nbsp;</label><input  onclick="search_data()" type="button" class="scbtn" value="搜索"></li>
        </ul>
    </div>
    <table class="tablelist">
        <thead>
        <tr>
            <th>积点ID</th>
            <th>积点年度<i class="sort"><img src="/template/images/px.gif" /></i></th>
            <th>教师名字</th>
            <th>基本岗位积点数</th>
            <th>兼职岗位积点数</th>
            <th>奖励岗位积点数</th>
            <th>个人资历积点数</th>
            <th>积点总分</th>
            <th>审核状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($teacher_list as $teacher){ ?>
            <tr>
                <td><?php  echo $teacher['id']; ?></td>
                <td><?php  echo $teacher['year']; ?></td>
<td><?php  echo $teacher['name']; ?></td>
                <td><?php  echo $teacher['base_point']; ?></td>
                <td><?php  echo $teacher['part_time_point']; ?></td>
                <td><?php  echo $teacher['award_point']; ?></td>
                <td><?php  echo $teacher['person_point']; ?></td>
                
                <td><?php  echo $teacher['total_point']; ?></td>
                <td><?php
                    if($teacher['status'] == 1) {
                        echo '待审核，尚未提交';
                    }elseif($teacher['status'] == 2) {
                        echo '办公室审核中';
                    }elseif($teacher['status'] == 3) {
                        echo '教务处审核中';
                    }elseif($teacher['status'] == 4) {
                        echo '科研处审核中';
                    }elseif($teacher['status'] == 5) {
                        echo '学生处审核中';
                    }elseif($teacher['status'] == 6) {
                        echo '已完成';
                    }
                    ?></td>
                <td>
                    <a href="/index.php/system/change_point_status/<?php echo $teacher['id']?>" id="edit" class="tablelink">修改审核状态</a>&nbsp;&nbsp;
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
                <li class="paginItem <?php if($i == $current_page){ echo 'current'; } ?>"><a href="/index.php/system/teacher_point?year=<?php echo $year?>&status=<?php echo $status ?>&page=<?php echo $i?>"><?php echo $i;?></a></li>
            <?php }
            ?>
        </ul>
    </div>
    <?php
    }
    ?>
</div>
<script type="text/javascript" src="/template/js/jquery.1.8.js"></script>
<script type="text/javascript" src="/template/webuploader/js/webuploader.js"></script>
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
        var year = $("#year").val();
        var status = $("#status").val();
        window.location = '/index.php/system/teacher_point?year='+ year + '&status='+status;
    }
     $(function() {
        upload();
    });
    /**
     * 上传函数
     */
    function upload(){
        var uploader;
        // 初始化Web Uploader
        uploader = WebUploader.create({
            // 自动上传。
            auto: true,
            // swf文件路径
            swf: 'Uploader.swf',
            // 文件接收服务端。
            server: '/index.php/system/add_batch_data',
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#picker'
            // 只允许选择文件，可选。
        });
        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on( 'uploadSuccess', function( file, data ) {
            console.log(data);
            if(data.result == '0000'){
                alert('导入成功');
                location.reload();
            }else{
                alert(data.info);
                location.reload();
            }
        });
        // 文件上传失败，现实上传出错。
        uploader.on( 'uploadError', function( file, data) {

        });

    }
</script>
</body>
</html>

