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
        <?php
        if($_SESSION['auth'] == 1 ){
            //权限更改一下
            $department = explode(',', $_SESSION['department']);
            if(in_array(1, $department)){
            ?>
                <!--教师菜单栏-->
                <ul class="menuson">
                    <li class="active"><cite></cite><a href="/index.php/teacher/index" target="rightFrame">教师首页</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/info" target="rightFrame">教师个人信息</a><i></i></li>
                    <li><cite></cite><a href="/index.php/teacher/input_point_index" target="rightFrame">积点录入</a><i></i></li>
                </ul>
            <?php } ?>
            <?php if(in_array(2, $department)){
                ?>
                <!--办公室成员-->
                <ul class="menuson">
                    <li><cite></cite><a href="/index.php/office/index" target="rightFrame">办公室审核首页</a><i></i></li>
                </ul>
            <?php } ?>
           <?php if(in_array(3, $department)){
            ?>
            <!--教务处成员-->
            <ul class="menuson">
                <li><cite></cite><a href="/index.php/academic/index" target="rightFrame">教务处审核首页</a><i></i></li>
            </ul>
            <?php } ?>

            <?php if(in_array(4, $department)){
                ?>
                <!--科研处-->
                <ul class="menuson">
                    <li><cite></cite><a href="/index.php/committee/index" target="rightFrame">科研处审核首页</a><i></i></li>
                </ul>
            <?php } ?>
            <?php if(in_array(5, $department)){
                ?>
                <!--学生处审核人员-->
                <ul class="menuson">
                    <li><cite></cite><a href="/index.php/affairs/index" target="rightFrame">学生处审核人员首页</a><i></i></li>
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


