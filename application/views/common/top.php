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
</head>

<body style="background:url(/template/images/topbg.gif) repeat-x;">

<div class="topleft">
    <a href="/index.php/school/home" target="_parent"><img src="/template/images/logo.png" title="系统首页" /></a>
</div>
<div class="topright">
    <ul>
        <li><a>当前时间：</a><a href="#" id="timetable"></a></li>
        <li><a href="#" ></a></li>
        <li><a href="/index.php/school/login_out" target="_parent">退出</a></li>
    </ul>

    <div class="user">
        <span>欢迎：<?php echo $_SESSION['name']?></span>
        <a style="font-size: 13px;margin-right: 20px;color: #e9f2f7;" href="/index.php/school/change_psw" target="_parent">修改密码</a>
    </div>


</div>
</body>
<script>
    function get_time()
    {
        var date=new Date();
        var year="",month="",day="",week="",hour="",minute="",second="";
        year=date.getFullYear();
        month=add_zero(date.getMonth()+1);
        day=add_zero(date.getDate());
        week=date.getDay();
        switch (date.getDay()) {
            case 0:val="周日";break;
            case 1:val="周一";break;
            case 2:val="周二";break;
            case 3:val="周三";break;
            case 4:val="周四";break;
            case 5:val="周五";break;
            case 6:val="周六";break;
        }
        hour=add_zero(date.getHours());
        minute=add_zero(date.getMinutes());
        second=add_zero(date.getSeconds());
        document.getElementById("timetable").innerHTML=" "+year+"-"+month+"-"+day+" "+hour+":"+minute+":"+second+" "+val;
    }

    function add_zero(temp)
    {
        if(temp<10) return "0"+temp;
        else return temp;
    }
    setInterval("get_time()",1000);
    function change_psw(){
        alert(1);
    }
</script>
</html>

