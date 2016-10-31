<?php
/**
 * Description：系统管理员修改密码页面
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
            <div class="welinfo">
                 <pre>说明：此处修改为管理员修改密码，请谨慎操作。</pre>
            </div>
            <ul class="forminfo">
                <li><label>新密码<b>*</b></label>
                    <input  id="psw" class="dfinput" type="password" style="width:200px;"/>
                    <input  id="teacher_id" type="hidden" value="<?php echo $teacher_id; ?>" style="width:200px;"/>
                </li>
                <li><label>&nbsp;</label><input name="" type="button" class="btn" value="修改密码" onclick="submit2()"></li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        function submit2(){
            var psw = $('#psw').val();
            var teacher_id = $('#teacher_id').val();
            if(!psw){
                alert('密码不能为空！');
                return;
            }
            $.ajax({
                type: "POST",
                url: "/index.php/system/save_sys_psw",
                data: {
                    psw : psw,
                    teacher_id : teacher_id
                },
                dataType: "json",
                success: function(json){
                    if(json.result == '0000'){
                        alert('修改成功');
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
