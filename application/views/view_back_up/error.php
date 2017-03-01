<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>错误页面</title>
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/template/js/jquery.js"></script>

    <script language="javascript">
        $(function(){
            $('.error').css({'position':'absolute','left':($(window).width()-490)/2});
            $(window).resize(function(){
                $('.error').css({'position':'absolute','left':($(window).width()-490)/2});
            })
        });
    </script>
</head>
<body style="background:#edf6fa;">

<div class="error">
    <h2><?php echo $error_msg?></h2>
    <p>看到这个提示，就自认倒霉吧!</p>
    <div class="reindex"><a href="/index.php/school/home" target="_parent">返回首页</a></div>
</div>
</body>

</html>
