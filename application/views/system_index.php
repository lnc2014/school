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
        <div id="picker" class="webuploader-container" style="float: right; margin-right: 1050px;margin-top: -13px;">
            <div class="webuploader-pick" style="padding: 0px 0px;">批量导入</div>
        </div>
        <input name="" class="btn" value="导入模板" style="float: right;margin-right: -250px;" onclick="javascript:window.location='<?php echo $excel_url; ?>'" type="button">
        <div style="float: right;margin-right: -630px;color: red">注：批量导入的时候严格按照所给的模板导入，不然会导致不成功！</div>
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
        var search_data = $("#search_data").val();
        window.location = '/index.php/system/index?search_data='+search_data;
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

