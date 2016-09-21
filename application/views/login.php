<?php
/**
 * Description:登录页面
 * Author: LNC
 * Date: 2016/9/21
 * Time: 22:05
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php  echo $title; ?></title>
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/template/js/jquery.js"></script>
    <script src="/template/js/cloud.js" type="text/javascript"></script>
    <script language="javascript">
        $(function(){
            $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
            $(window).resize(function(){
                $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
            });
            $('#login').click(function(){
                var username = $('.loginuser').val();
                var password = $('.loginpwd').val();
                if(!username) {
                    alert('账号不能为空！');
                    return;
                }
                if(!password){
                    alert('密码不能为空！');
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "/index.php/school/login_check",
                    data: {
                        username : username,
                        psw : password
                    },
                    dataType: "json",
                    success: function(json){
                        if(json.result == '0000'){
                            alert('登录成功');
                            window.location = '/index.php/school/home';
                        }else {
                            alert(json.info);
                        }
                    },
                    error: function(){
                        alert("加载失败");
                    }
                });
            });

        });
    </script>
</head>
<body style="background-color:#1c77ac; background-image:url(/template/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
<div id="mainBody">
    <div id="cloud1" class="cloud"></div>
    <div id="cloud2" class="cloud"></div>
</div>
<div class="logintop">
    <span><?php echo $title;?></span>
</div>
<div class="loginbody">
    <span class="systemlogo"></span>
    <div class="loginbox">
        <ul>
            <li><input  type="text" class="loginuser"  placeholder="账号"  maxlength="11"/></li>
            <li><input type="password" class="loginpwd"  placeholder="密码" /></li>
            <li><input id="login" type="button" class="loginbtn" value="登录" /><label><input name="" type="checkbox" value="" checked="checked" />记住密码</label><label><a href="#">忘记密码？</a></label></li>
        </ul>
    </div>

</div>
<div class="loginbm">版权所有@2016 深圳市第二外国语学校</div>
</body>
</html>

