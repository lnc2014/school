<?php
/**
 * Description：头部
 * Author: LNC
 * Date: 2016/9/21
 * Time: 23:11
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/template/js/jquery.js"></script>

    <script type="text/javascript">
        $(function(){
            //导航切换
            $(".menuson li").click(function(){
                $(".menuson li.active").removeClass("active");
                $(this).addClass("active");
            });

            $('.title').click(function(){
                var $ul = $(this).next('ul');
                $('dd').find('ul').slideUp();
                if($ul.is(':visible')){
                    $(this).next('ul').slideUp();
                }else{
                    $(this).next('ul').slideDown();
                }
            });
        })
    </script>


</head>
<body style="background:#f0f9fd;">
<div class="lefttop"><span></span></div>
<dl class="leftmenu">
    <dd>
        <div class="title">
            <span><img src="/template/images/leftico01.png"/></span>菜单
        </div>
        <ul class="menuson">
            <li class="active"><cite></cite><a href="/index.php/teacher/index" target="rightFrame">首页</a><i></i></li>
            <li><cite></cite><a href="/index.php/teacher/info" target="rightFrame">教师个人信息</a><i></i></li>
            <li><cite></cite><a href="/index.php/teacher/input_point_index" target="rightFrame">积点录入</a><i></i></li>
        </ul>
    </dd>
</dl>
</body>
</html>


