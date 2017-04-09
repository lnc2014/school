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
        <li><a href="#">修改教师审核状态</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <div class="welinfo">
                 <pre>说明：该功能请谨慎使用，仅限于教师积点审核错误。</pre>
            </div>
            <ul class="forminfo permission" id="point_check">
                <li>
                    <input type="radio"  name="point_status" value="1">教师未提交审核状态
                </li>
                <li>
                    <input  type="radio" name="point_status" value="2">办公室审核中
                </li>
                <li>
                    <input type="radio" name="point_status" value="3">教务处审核中
                </li>
                <li>
                    <input type="radio" name="point_status" value="4">科研处审核中
                </li>
                <li>
                    <input type="radio" name="point_status" value="5">学生处审核中
                </li>
                <li><label>&nbsp;</label><input name="" type="button" class="btn" value="提交" onclick="submit2()"></li>
            </ul>
        </div>
        <input type="hidden" id="is_update" value="<?php echo $is_update?>"/>
    </div>

    <script type="text/javascript">
        function submit2(){
            var point_id = <?php echo $point_id;?>;
            var status = $("input[type='radio']:checked").val();
            $.ajax({
                type: "POST",
                url: "/index.php/system/save_status",
                data: {
                    point_id : point_id,
                    status : status
                },
                dataType: "json",
                success: function(json){
                    if(json.result == '0000'){
                        alert('修改成功');
                        window.location = '/index.php/system/teacher_point';
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
