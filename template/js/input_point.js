/**
 * 添加教师积点js，主要处理积点的问题。
 * 分模块化
 * Created by admin on 2016/9/26.
 */

$(function(){
    /************四个项目总的积分**************/
    var base_point = 0; //基本岗位积点
    var part_time_point = 0; //兼职岗位积点
    var award_point = 0; //奖励性积点
    var person_point = 0; //个人积点

    /************各个项目的分开得分**************/
    var workload;
    var section_leader;
    var director;
    var officer;
    var school_leader;
    var part_time_magazine;
    var academic;
    var education_case;
    var paper;
    var eight_teacher;
    var league_teacher;
    var tutor;
    var union;
    var join_festival;
    var counselor;
    var substitute;
    var satisfaction_survey;
    var attendance_award;
    var school_teacher;

    //获取基本岗位的积分，用于前台计算
    $("#base_point input[type='checkbox']").live('click', function(e){
        var is_base_point = $(this).val();
        if($(this).is(':checked') && is_base_point == 1){
            base_point = 100;
            workload = 1;
            $('#base_point').find(".no").attr('checked', false);
            $('#base_point').find(".yes").attr('checked', true);
        }else{
            base_point = 0;
            workload = 0;
            $('#base_point').find(".no").attr('checked', true);
            $('#base_point').find(".yes").attr('checked', false);
        }
    });
    /*********************兼职岗位积点**************************/
    //科组长45、备课组长30
    var section_leader_point = 0;
    $("#is_section_leader").live('change', function(e){
        section_leader = $(this).find("option:selected").val();
        if(section_leader == 1){
            section_leader_point = 45;
        }else if(section_leader == 2){
            section_leader_point = 30;
        }else {
            section_leader_point = 0;
        }
    });
    //主任、副主任、部门干事 、年级长、副级长、班主任。积点45。1为是
    var director_point = 0;
    $("#director input[type='checkbox']").live('click', function(e){
        var is_director = $(this).val();
        if($(this).is(':checked') && is_director == 1){
            director_point = 45;
            director = 1;
            $('#director').find(".no").attr('checked', false);
            $('#director').find(".yes").attr('checked', true);
        }else{
            director_point = 0;
            director = 0;
            $('#director').find(".no").attr('checked', true);
            $('#director').find(".yes").attr('checked', false);
        }
    });
    //部门干事，积点为40。1是
    var officer_point = 0;
    $("#officer input[type='checkbox']").live('click', function(e){
        var is_officer = $(this).val();
        if($(this).is(':checked') && is_officer == 1){
            officer_point = 40;
            officer = 1;
            $('#officer').find(".no").attr('checked', false);
            $('#officer').find(".yes").attr('checked', true);
        }else{
            officer_point = 0;
            officer = 0;
            $('#officer').find(".no").attr('checked', true);
            $('#officer').find(".yes").attr('checked', false);
        }
    });
    //校级领导，积点为60。1是
    var school_leader_point = 0;
    $("#school_leader input[type='checkbox']").live('click', function(e){
        var is_school_leader = $(this).val();
        if($(this).is(':checked') && is_school_leader == 1){
            school_leader_point = 60;
            school_leader = 1;
            $('#school_leader').find(".no").attr('checked', false);
            $('#school_leader').find(".yes").attr('checked', true);
        }else{
            school_leader_point = 0;
            school_leader = 0;
            $('#school_leader').find(".no").attr('checked', true);
            $('#school_leader').find(".yes").attr('checked', false);
        }
    });
    //兼职校刊、校报编辑工作、青蓝工程指导教师,积点为12。1是
    var part_time_magazine_point = 0;
    $("#part_time_magazine input[type='checkbox']").live('click', function(e){
        var is_part_time_magazine = $(this).val();
        if($(this).is(':checked') && is_part_time_magazine == 1){
            part_time_magazine_point = 12;
            part_time_magazine = 1;
            $('#part_time_magazine').find(".no").attr('checked', false);
            $('#part_time_magazine').find(".yes").attr('checked', true);
        }else{
            part_time_magazine_point = 0;
            part_time_magazine = 0;
            $('#part_time_magazine').find(".no").attr('checked', true);
            $('#part_time_magazine').find(".yes").attr('checked', false);
        }
    });
    //学术委员、学堂干事,积点15。1为是。
    var academic_point = 0;
    $("#academic input[type='checkbox']").live('click', function(e){
        var is_academic = $(this).val();
        if($(this).is(':checked') && is_academic == 1){
            academic_point = 12;
            academic = 1;
            $('#academic').find(".no").attr('checked', false);
            $('#academic').find(".yes").attr('checked', true);
        }else{
            academic_point = 0;
            academic = 0;
            $('#academic').find(".no").attr('checked', true);
            $('#academic').find(".yes").attr('checked', false);
        }
    });
    //为在研的校级课题：主持人7，成员排序前三位4，其他成员2；在研的市级及市级以上课题：主持人11，成员排序前三位6，其他成员3。
    var education_case_point = 0;
    $("#education_case").live('change', function(e){
        education_case = $(this).find("option:selected").val();
        if(education_case == 1){
            education_case_point = 7;
        }else if(education_case == 2){

            education_case_point = 4;
        }else if(education_case == 3){

            education_case_point = 2;
        }else if(education_case == 4){

            education_case_point = 11;
        }else if(education_case == 5){

            education_case_point = 6;

        }else if(education_case == 6){
            education_case_point = 3;
        }else{
            education_case_point = 0;
        }
    });
    //1为校级，2为市级，3为省级，4为国家级。每年提交一项最高级别的发表论文：校级5点、市级10点、省级15点、国家级20点。
    var paper_point = 0;
    $("#paper").live('change', function(e){
        paper = $(this).find("option:selected").val();
        if(paper == 1){
            paper_point = 5;
        }else if(paper == 2){
            paper_point = 10;
        }else if(paper == 3){
            paper_point = 15;
        }else if(paper == 4){
            paper_point = 20;
        }else{
            paper_point = 0;
        }
    });
    //八大学堂选修课主讲教师,1为是。5个积点
    var eight_teacher_point = 0;
    $("#eight_teacher input[type='checkbox']").live('click', function(e){
        var is_eight_teacher = $(this).val();
        if($(this).is(':checked') && is_eight_teacher == 1){
            eight_teacher_point = 5;
            eight_teacher = 1;
            $('#eight_teacher').find(".no").attr('checked', false);
            $('#eight_teacher').find(".yes").attr('checked', true);
        }else{
            eight_teacher_point = 0;
            eight_teacher = 0;
            $('#eight_teacher').find(".no").attr('checked', true);
            $('#eight_teacher').find(".yes").attr('checked', false);
        }
    });
    //社团指导老师,1为是。5个积点
    var league_teacher_point = 0;
    $("#league_teacher input[type='checkbox']").live('click', function(e){
        var is_league_teacher = $(this).val();
        if($(this).is(':checked') && is_league_teacher == 1){
            league_teacher_point = 5;
            league_teacher = 1;
            $('#league_teacher').find(".no").attr('checked', false);
            $('#league_teacher').find(".yes").attr('checked', true);
        }else{
            league_teacher_point = 0;
            league_teacher = 0;
            $('#league_teacher').find(".no").attr('checked', true);
            $('#league_teacher').find(".yes").attr('checked', false);
        }
    });
    //导师制导师，1为是。5个积点
    var tutor_point = 0;
    $("#tutor input[type='checkbox']").live('click', function(e){
        var is_tutor = $(this).val();
        if($(this).is(':checked') && is_tutor == 1){
            tutor_point = 5;
            tutor = 1;
            $('#tutor').find(".no").attr('checked', false);
            $('#tutor').find(".yes").attr('checked', true);
        }else{
            tutor_point = 0;
            tutor = 0;
            $('#tutor').find(".no").attr('checked', true);
            $('#tutor').find(".yes").attr('checked', false);
        }
    });
    //是不是工会成员，1为工会委员，2为工会组长。工会委员增加5个积点，工会组长增加9个积点。
    var union_point = 0;
    $("#union").live('change', function(e){
        union = $(this).find("option:selected").val();
        if(union == 1){
            union_point = 5;
        }else if(union == 2){
            union_point = 9;
        }else {
            union_point = 0;
        }
    });
    //参与学校重大节日的专业教师加4分,1为参加。
    var join_festival_point = 0;
    $("#join_festival input[type='checkbox']").live('click', function(e){
        var is_join_festival = $(this).val();
        if($(this).is(':checked') && is_join_festival == 1){
            join_festival_point = 4;
            join_festival = 1;
            $('#join_festival').find(".no").attr('checked', false);
            $('#join_festival').find(".yes").attr('checked', true);
        }else{
            join_festival_point = 0;
            join_festival = 0;
            $('#join_festival').find(".no").attr('checked', true);
            $('#join_festival').find(".yes").attr('checked', false);
        }
    });
    //心理咨询师。1是，积点为5
    var counselor_point = 0;
    $("#counselor input[type='checkbox']").live('click', function(e){
        var is_counselor = $(this).val();
        if($(this).is(':checked') && is_counselor == 1){
            counselor_point = 4;
            counselor = 1;
            $('#counselor').find(".no").attr('checked', false);
            $('#counselor').find(".yes").attr('checked', true);
        }else{
            counselor_point = 0;
            counselor = 0;
            $('#counselor').find(".no").attr('checked', true);
            $('#counselor').find(".yes").attr('checked', false);
        }
    });
    /*********************奖励性积点**************************/
    //是不是有代课，1为有。代课的节数，1节课0.5个积点
    var substitute_point = 0;
    $("#substitute input[type='checkbox']").live('click', function(e){
        var is_substitute = $(this).val();
        if($(this).is(':checked') && is_substitute == 1){
            substitute = 1;
            $('#substitute_num').attr('disabled', false);
            $('#substitute_data').attr('disabled', false);
            $('#substitute').find(".no").attr('checked', false);
            $('#substitute').find(".yes").attr('checked', true);
        }else{
            substitute = 0;
            $('#substitute').find(".no").attr('checked', true);
            $('#substitute_num').val('');
            $('#substitute_num').attr('disabled', true);
            $('#substitute_data').attr('disabled', true);
            $('#substitute').find(".yes").attr('checked', false);
        }
    });
    //每学年进行2次满意度调查，每次满意度达80%以上，可获得5个积点奖励。1达到条件
    var satisfaction_survey_point = 0;
    $("#satisfaction_survey input[type='checkbox']").live('click', function(e){
        var is_satisfaction_survey = $(this).val();
        if($(this).is(':checked') && is_satisfaction_survey == 1){
            satisfaction_survey = 1;
            satisfaction_survey_point = 5;
            $('#satisfaction_survey').find(".no").attr('checked', false);
            $('#satisfaction_survey').find(".yes").attr('checked', true);
        }else{
            satisfaction_survey = 0;
            satisfaction_survey_point = 0;
            $('#satisfaction_survey').find(".no").attr('checked', true);
            $('#satisfaction_survey').find(".yes").attr('checked', false);
        }
    });
    //缺席次数，每缺席一次扣除1点积点，如果不填写则为全勤。要提供考勤记录。总的积点20点
    var attendance_award_point = 20;
    $("#attendance_award input[type='checkbox']").live('click', function(e){
        var is_attendance_award= $(this).val();
        if($(this).is(':checked') && is_attendance_award == 1){
            attendance_award = 1;
            $('#attendance_award_num').attr('disabled', true);
            $('#attendance_award_data').attr('disabled', false);
            $('#attendance_award_num').val('');
            $('#attendance_award').find(".no").attr('checked', false);
            $('#attendance_award').find(".yes").attr('checked', true);
        }else{
            attendance_award = 0;
            $('#attendance_award_num').attr('disabled', false);
            $('#attendance_award_data').attr('disabled', true);
            $('#attendance_award').find(".no").attr('checked', true);
            $('#attendance_award').find(".yes").attr('checked', false);
        }
    });
    //是不是别聘为高三、初三老师、多语种班项目，1为聘用。积点30个
    var school_teacher_point = 0;
    $("#school_teacher input[type='checkbox']").live('click', function(e){
        var is_school_teacher = $(this).val();
        if($(this).is(':checked') && is_school_teacher == 1){
            school_teacher_point = 30;
            school_teacher = 1;
            $('#school_teacher').find(".no").attr('checked', false);
            $('#school_teacher').find(".yes").attr('checked', true);
        }else{
            school_teacher_point = 0;
            school_teacher = 0;
            $('#school_teacher').find(".no").attr('checked', true);
            $('#school_teacher').find(".yes").attr('checked', false);
        }
    });
    $('#submit').click(function(){
        //兼职积点分数
        part_time_point = accAdd(part_time_point, section_leader_point);
        part_time_point = accAdd(part_time_point, director_point);
        part_time_point = accAdd(part_time_point, officer_point);
        part_time_point = accAdd(part_time_point, school_leader_point);
        part_time_point = accAdd(part_time_point, part_time_magazine_point);
        part_time_point = accAdd(part_time_point, academic_point);
        part_time_point = accAdd(part_time_point, education_case_point);
        part_time_point = accAdd(part_time_point, paper_point);
        part_time_point = accAdd(part_time_point, eight_teacher_point);
        part_time_point = accAdd(part_time_point, league_teacher_point);
        part_time_point = accAdd(part_time_point, tutor_point);
        part_time_point = accAdd(part_time_point, union_point);
        part_time_point = accAdd(part_time_point, join_festival_point);
        part_time_point = accAdd(part_time_point, counselor_point);
        //奖励性积点分数
        if(substitute == 1){
            var substitute_num = $('#substitute_num').val();
            if(!substitute_num || substitute_num < 0){
                substitute_num = 0;
            }
            substitute_point = substitute_num * 0.5;
        }
        if(attendance_award == 1){
            attendance_award = 0;
        }else{
            attendance_award = $('#attendance_award_num').val();
            if(attendance_award < 0 || !attendance_award){
                alert('缺席的次数不能为空！');
                return;
            }
            var attendance_all_award_point = 20;
            var quexi = attendance_award * 1;
            attendance_award_point = accSubtr(attendance_all_award_point, quexi);
            if(attendance_award_point < 0 ){
                attendance_award_point = 0;
            }
        }
        award_point = accAdd(award_point, substitute_point);
        award_point = accAdd(award_point, satisfaction_survey_point);
        award_point = accAdd(award_point, attendance_award_point);
        award_point = accAdd(award_point, school_teacher_point);
        alert(attendance_award_point);
    });
});
//加法函数，用来得到精确的加法结果
//说明：javascript的加法结果会有误差，在两个浮点数相加的时候会比较明显。这个函数返回较为精确的加法结果。
//调用：accAdd(arg1,arg2)
//返回值：arg1加上arg2的精确结果
function accAdd(arg1,arg2){
    var r1,r2,m;
    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
    m=Math.pow(10,Math.max(r1,r2));
    return (arg1*m+arg2*m)/m
}
//减法函数，用来得到精确的减法结果
//说明：javascript的减法结果会有误差，在两个浮点数相加的时候会比较明显。这个函数返回较为精确的减法结果。
//调用：accSubtr(arg1,arg2)
//返回值：arg1减去arg2的精确结果
function accSubtr(arg1,arg2){
    var r1,r2,m,n;
    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
    m=Math.pow(10,Math.max(r1,r2));
    //动态控制精度长度
    n=(r1>=r2)?r1:r2;
    return ((arg1*m-arg2*m)/m).toFixed(n);
}