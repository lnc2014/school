<?php
/**
 * Description：教师权限增加页面
 * Author: LNC
 * Date: 2016/12/3
 * Time: 21:56
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/template/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/template/js/jquery.js"></script>
    <script type="text/javascript" src="/template/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/template/js/select-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 200
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">增加权限页面</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <div class="welinfo">
                 <pre>说明：增加权限是指给教师的账号增加审核积点的权限功能。如若勾选下面多个，则该教师具有多个审核的功能，如教务处、学生处、科研处多个审核功能。</pre>
            </div>
            <ul class="forminfo permission">
                <li>
                    <input type="checkbox" id="room" >办公室
                </li>
                <li>
                    <input  type="checkbox" id="study">教务处
                </li>
                <li>
                    <input type="checkbox" id="search">科研处
                </li>
                <li>
                    <input type="checkbox" id="student">学生处
                </li>
                <li><label>&nbsp;</label><input name="" type="button" class="btn" value="提交" onclick="submit2()"></li>
            </ul>
        </div>
        <input type="hidden" id="is_update" value="<?php echo $is_update?>"/>
    </div>

    <script type="text/javascript">
        function submit2(){
            var teacher_id = <?php echo $teacher_id;?>;
            var permission = '1,';
            if($('#room').is(':checked')){
                permission = permission + '2,';
            }
            if($('#study').is(':checked')){
                permission = permission + '3,';
            }
            if($('#search').is(':checked')){
                permission = permission + '4,';
            }
            if($('#student').is(':checked')){
                permission = permission + '5,';
            }
            $.ajax({
                type: "POST",
                url: "/index.php/system/save_permission_info",
                data: {
                    permission : permission,
                    teacher_id : teacher_id
                },
                dataType: "json",
                success: function(json){
                    if(json.result == '0000'){
                        if(is_update > 0){
                            alert('修改成功');
                        }else {
                            alert('添加成功');
                        }
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
    </script>
</div>
</body>
</html>
