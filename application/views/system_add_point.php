<?php
/**
 * Description：新增年度积点页面
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
        <li><a href="#">增加年度积分页面</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <div class="welinfo">
                 <pre>说明：新增年度积分有填写积点有效期，逾期将不可以填写。</pre>
            </div>
            <ul class="forminfo">
                <li><label>年度<b>*</b></label><input  id="year" class="dfinput" type="text"  value="<?php echo $point['year'] ?>" onClick="WdatePicker({dateFmt:'yyyy'})" style="width:200px;"/></li>
                <li><label>填写开始时间<b>*</b></label><input id="start_time" type="text" class="dfinput" value="<?php echo $point['start_time'] ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" maxlength="11" style="width:200px;"/></li>
                <li><label>填写截止时间<b>*</b></label><input id="end_time" type="text" class="dfinput" value="<?php echo $point['end_time'] ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" maxlength="11" style="width:200px;"/></li>
                <li><label>积点填写说明<b>*</b></label>
                    <textarea id="description" name="" cols="" rows="" class="textinput"></textarea>
                </li>

                <li><label>&nbsp;</label><input name="" type="button" class="btn" value="提交" onclick="submit2()"></li>
            </ul>
        </div>
        <input type="hidden" id="is_update" value="<?php echo $is_update?>"/>
    </div>
    <script type="text/javascript" src="/template/js/DatePicker/WdatePicker.js"></script>
    <script type="text/javascript">
        function submit2(){
            var year = $('#year').val();
            var is_update = $('#is_update').val();//判断是不是更新
            var start_time = $('#start_time').val();
            var end_time = $('#end_time').val();
            var description = $('#description').val();

            if(!year){
                alert('年度不能为空！');
                return;
            }
            if(!start_time){
                alert('开始填写时间不能为空！');
                return;
            }
            if(!end_time){
                alert('截止时间不能为空！');
                return;
            }
            if(start_time > end_time){
                alert('截止时间不能比开始时间早！');
                return;
            }
            $.ajax({
                type: "POST",
                url: "/index.php/system/add_point_by_ajax",
                data: {
                    is_update : is_update,
                    year : year,
                    start_time : start_time,
                    end_time : end_time,
                    description : description
                },
                dataType: "json",
                success: function(json){
                    if(json.result == '0000'){
                        if(is_update > 0){
                            alert('修改成功');
                        }else {
                            alert('添加成功');
                        }
                        window.location = '/index.php/system/point';
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
