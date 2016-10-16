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
        <?php
        if($_SESSION['auth'] == 1 ){
            if($_SESSION['department'] == 1){
            ?>
                <!--        教师菜单栏-->
                <ul class="menuson">
                    <li class="active"><cite></cite><a href="/index.php/teacher/index" target="rightFrame">教师首页</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/info" target="rightFrame">教师个人信息</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/input_point_index" target="rightFrame">积点录入</a><i></i></li>
                </ul>
            <?php } ?>
           <?php if($_SESSION['department'] == 2){
            ?>
            <!--        教务处成员-->
            <ul class="menuson">
                <li class="active"><cite></cite><a href="/index.php/academic/index" target="rightFrame">教务处首页</a><i></i></li>
                <li><cite></cite><a href="/index.php/teacher/index" target="rightFrame">教师首页</a><i></i></li>
                <li><cite></cite><a href="/index.php/teacher/info" target="rightFrame">教师个人信息</a><i></i></li>
                <li><cite></cite><a href="/index.php/teacher/input_point_index" target="rightFrame">积点录入</a><i></i></li>
            </ul>
            <?php } ?>
            <?php if($_SESSION['department'] == 3){
                ?>
                <!--        办公室成员-->
                <ul class="menuson">
                    <li class="active"><cite></cite><a href="/index.php/office/index" target="rightFrame">办公室首页</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/info" target="rightFrame">教师个人信息</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/input_point_index" target="rightFrame">积点录入</a><i></i></li>
                </ul>
            <?php } ?>
            <?php if($_SESSION['department'] == 4){
                ?>
                <!--        评审委员会成员-->
                <ul class="menuson">
                    <li class="active"><cite></cite><a href="/index.php/teacher/index" target="rightFrame">评审委员会首页</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/info" target="rightFrame">教师个人信息</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/input_point_index" target="rightFrame">积点录入</a><i></i></li>
                </ul>
            <?php } ?>
            <?php if($_SESSION['department'] == 5){
                ?>
                <!--        校长-->
                <ul class="menuson">
                    <li class="active"><cite></cite><a href="/index.php/teacher/index" target="rightFrame">校长首页</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/info" target="rightFrame">教师个人信息</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/input_point_index" target="rightFrame">积点录入</a><i></i></li>
                </ul>
            <?php } ?>
        <?php } ?>
<!--        系统管理菜单栏-->
        <?php
        if($_SESSION['auth'] == 2){ ?>
            <ul class="menuson">
                <li class="active"><cite></cite><a href="/index.php/system/index" target="rightFrame">账号列表</a><i></i></li>
                <li><cite></cite><a href="/index.php/system/add_teacher" target="rightFrame">新增账号</a><i></i></li>
                <li><cite></cite><a href="/index.php/system/point" target="rightFrame">往年积点管理</a><i></i></li>
                <li><cite></cite><a href="/index.php/system/add_point" target="rightFrame">发布新的积点</a><i></i></li>
            </ul>
        <?php } ?>
    </dd>
</dl>
</body>
</html>


