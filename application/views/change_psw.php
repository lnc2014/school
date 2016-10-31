<?php
/**
 * Description：教师修改个人信息页面
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
        <li><a href="#">修改密码</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <ul class="forminfo">
                <li><label>旧密码<b>*</b></label><input id="old_psw" type="password" class="dfinput" value=""  style="width:200px;"/></li>
                <li><label>新密码<b>*</b></label><input id="new_psw" type="password" class="dfinput" value=""  maxlength="11" style="width:200px;"/></li>
                <li><label>确认新密码<b>*</b></label><input id="new_psw2" type="password" class="dfinput" value=""  style="width:200px;"/></li>

                <li><label>&nbsp;</label><input name="" type="button" class="btn" value="修改密码" onclick="submit2()"></li>
            </ul>
        </div>
    </div>

    <script type="text/javascript">
        function submit2(){
            var old_psw = $('#old_psw').val();
            var new_psw = $('#new_psw').val();
            var new_psw2 = $('#new_psw2').val();
            if(!old_psw){
                alert('旧密码不能为空！');
                return;
            }
            if (!new_psw) {
                alert('新密码不能为空');
                return false;
            }
            if(new_psw != new_psw2){
                alert('新密码两次输入不一致！');
                return;
            }
            $.ajax({
                type: "POST",
                url: "/index.php/school/save_psw",
                data: {
                    old_psw : old_psw,
                    new_psw : new_psw,
                    new_psw2 : new_psw2
                },
                dataType: "json",
                success: function(json){
                    if(json.result == '0000'){
                        alert('修改成功');
                        window.location = '/index.php/school/main';
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
