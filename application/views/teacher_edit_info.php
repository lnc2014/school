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
        <li><a href="#">修改教师个人信息页面</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <ul class="forminfo">
                <li><label>姓名<b>*</b></label><input id="name" type="text" class="dfinput" value="<?php echo $teacher['name'] ?>"  style="width:200px;"/></li>
                <li><label>电话<b>*</b></label><input id="mobile" type="text" class="dfinput" value="<?php echo $teacher['mobile'] ?>"  maxlength="11" style="width:200px;"/></li>
                <li><label>所教学科<b>*</b></label>
                    <div class="vocation" style="width: 200px;">
<!--                        1为语文，2为数学，3为英语，4为计算机，5为音乐（后面扩展），0为没有学科-->
                        <select class="select2" id="subject">
                            <option value="1" <?php if($teacher['subject'] == 1){ echo 'selected';} ?>>语文</option>
                            <option value="2" <?php if($teacher['subject'] == 2){ echo 'selected';} ?>>数学</option>
                            <option value="3" <?php if($teacher['subject'] == 3){ echo 'selected';} ?>>英语</option>
                            <option value="4" <?php if($teacher['subject'] == 4){ echo 'selected';} ?>>计算机</option>
                            <option value="5" <?php if($teacher['subject'] == 5){ echo 'selected';} ?>>音乐</option>
                            <option value="0" <?php if($teacher['subject'] == 0){ echo 'selected';} ?>>管理人员</option>
                        </select>
                    </div>
                </li>
                <li><label>居住地<b>*</b></label><input id="address" type="text" class="dfinput" value="<?php echo $teacher['address'] ?>"  style="width:200px;"/></li>
                <li><label>所属部门<b>*</b></label>
                    <div class="vocation">
                        <select class="select2" id="department">
<!--                            1为教师队伍，没有所属部门，2为教务处成员，3办公室成员，4为评审委员会成员,5为校长-->
                            <option value="1" <?php if($teacher['department'] == 1){ echo 'selected';} ?>>教师队伍</option>
                            <option value="2" <?php if($teacher['department'] == 2){ echo 'selected';} ?>>教务处</option>
                            <option value="3" <?php if($teacher['department'] == 3){ echo 'selected';} ?>>办公室</option>
                            <option value="4" <?php if($teacher['department'] == 4){ echo 'selected';} ?>>评审委员会成员</option>
                            <option value="5" <?php if($teacher['department'] == 5){ echo 'selected';} ?>>校长</option>
                        </select>
                    </div>
                </li>
                <li><label>&nbsp;</label><input name="" type="button" class="btn" value="提交" onclick="submit2()"></li>
            </ul>
        </div>
    </div>

    <script type="text/javascript">
        function submit2(){
            var mobile = $('#mobile').val();
            var name = $('#name').val();
            var subject = $('#subject').val();
            var address = $('#address').val();
            var department = $('#department').val();
            if(!mobile){
                alert('手机号码不能为空！');
                return;
            }
            if (!check_phone(mobile)) {
                alert('请输入正确的手机号码');
                return false;
            }
            if(!name){
                alert('姓名不能为空！');
                return;
            }
            if(!address){
                alert('姓名不能为空！');
                return;
            }
            $.ajax({
                type: "POST",
                url: "/index.php/teacher/save_info",
                data: {
                    mobile : mobile,
                    name : name,
                    subject : subject,
                    address : address,
                    department : department,
                },
                dataType: "json",
                success: function(json){
                    if(json.result == '0000'){
                        alert('修改成功');
                        window.location = '/index.php/teacher/info';
                    }else {
                        alert(json.info);
                    }
                },
                error: function(){
                    alert("加载失败");
                }
            });
        }
        function check_phone(number){
            var pattern = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1})|(14[0-9]{1}))+\d{8})$/;
            return pattern.test(number) ? true : false;
        }
    </script>
</div>
</body>
</html>
