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
    var workload = 0;
    var section_leader = 0;
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
    var attendance_award = 0;
    var school_teacher;
    var finish_goal = 0;
    var college;
    var middle;
    var super_workload;
    var school_class;
    var city_class;
    var courses;
    var exam_pro;
    var exam_rank;
    var outstand_sub;
    var select_outstand_school;
    var select_outstand_year;
    var select_outstand_person;
    var expert;

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
            $('#part_time_magazine_upload').removeClass('none');
        }else{
            part_time_magazine_point = 0;
            part_time_magazine = 0;
            $('#part_time_magazine').find(".no").attr('checked', true);
            $('#part_time_magazine').find(".yes").attr('checked', false);
            $('#part_time_magazine_upload').addClass('none');
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
            $('#substitute_upload').removeClass('none');
        }else{
            substitute = 0;
            $('#substitute').find(".no").attr('checked', true);
            $('#substitute_num').val('');
            $('#substitute_num').attr('disabled', true);
            $('#substitute_data').attr('disabled', true);
            $('#substitute').find(".yes").attr('checked', false);
            $('#substitute_upload').addClass('none');
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
            $('#attendance_award_upload').removeClass('none');
        }else{
            attendance_award = 0;
            $('#attendance_award_num').attr('disabled', false);
            $('#attendance_award_data').attr('disabled', true);
            $('#attendance_award').find(".no").attr('checked', true);
            $('#attendance_award').find(".yes").attr('checked', false);
            $('#attendance_award_upload').addClass('none');
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

    //是否完成高考（中考）预定指标，奖励积点5个
    var finish_goal_point = 0;
    $("#finish_goal input[type='checkbox']").live('click', function(e){
        var is_finish_goal = $(this).val();
        if($(this).is(':checked') && is_finish_goal == 1){
            finish_goal_point = 5;
            finish_goal = 1;
            $('#finish_goal').find(".no").attr('checked', false);
            $('#finish_goal').find(".yes").attr('checked', true);
        }else{
            finish_goal_point = 0;
            finish_goal = 0;
            $('#finish_goal').find(".no").attr('checked', true);
            $('#finish_goal').find(".yes").attr('checked', false);
        }
    });

    //本科生超出指标数量，一个增加6个积点
    var college_point = 0;
    $("#college input[type='checkbox']").live('click', function(e){
        var is_college = $(this).val();
        if($(this).is(':checked') && is_college == 1){
            college = 1;
            $('#college_num').attr('disabled', false);
            $('#college').find(".no").attr('checked', false);
            $('#college').find(".yes").attr('checked', true);
        }else{
            college = 0;
            $('#college').find(".no").attr('checked', true);
            $('#college_num').val('');
            $('#college_num').attr('disabled', true);
            $('#college').find(".yes").attr('checked', false);
        }
    });
    //重点高中生超出指标数量，一个增加10个积点
    var middle_point = 0;
    $("#middle input[type='checkbox']").live('click', function(e){
        var is_middle = $(this).val();
        if($(this).is(':checked') && is_middle == 1){
            middle = 1;
            $('#middle_num').attr('disabled', false);
            $('#middle').find(".no").attr('checked', false);
            $('#middle').find(".yes").attr('checked', true);
        }else{
            middle = 0;
            $('#middle').find(".no").attr('checked', true);
            $('#middle_num').val('');
            $('#middle_num').attr('disabled', true);
            $('#middle').find(".yes").attr('checked', false);
        }
    });
    //超出工作量的上课节数，每节课增加0.5个积点
    var super_workload_point = 0;
    $("#super_workload input[type='checkbox']").live('click', function(e){
        var is_super_workload = $(this).val();
        if($(this).is(':checked') && is_super_workload == 1){
            super_workload = 1;
            $('#super_workload_num').attr('disabled', false);
            $('#super_workload').find(".no").attr('checked', false);
            $('#super_workload').find(".yes").attr('checked', true);
        }else{
            super_workload = 0;
            $('#super_workload').find(".no").attr('checked', true);
            $('#super_workload_num').val('');
            $('#super_workload_num').attr('disabled', true);
            $('#super_workload').find(".yes").attr('checked', false);
        }
    });
    //校级公开课实验课，每节课增加5个积点
    var school_class_point = 0;
    $("#school_class input[type='checkbox']").live('click', function(e){
        var is_school_class= $(this).val();
        if($(this).is(':checked') && is_school_class == 1){
            school_class = 1;
            $('#school_class_num').attr('disabled', false);
            $('#school_class').find(".no").attr('checked', false);
            $('#school_class').find(".yes").attr('checked', true);
        }else{
            super_workload = 0;
            $('#school_class').find(".no").attr('checked', true);
            $('#school_class_num').val('');
            $('#school_class_num').attr('disabled', true);
            $('#school_class').find(".yes").attr('checked', false);
        }
    });
    //市级公开课实验课，每节课增加10个积点
    var city_class_point = 0;
    $("#city_class input[type='checkbox']").live('click', function(e){
        var is_city_class = $(this).val();
        if($(this).is(':checked') && is_city_class == 1){
            city_class = 1;
            $('#city_class_num').attr('disabled', false);
            $('#city_class').find(".no").attr('checked', false);
            $('#city_class').find(".yes").attr('checked', true);
        }else{
            city_class = 0;
            $('#city_class').find(".no").attr('checked', true);
            $('#city_class_num').val('');
            $('#city_class_num').attr('disabled', true);
            $('#city_class').find(".yes").attr('checked', false);
        }
    });
    //八大学堂精品课程，获得精品课程的次数，每学年最多2次，每次可以增加3个积点
    var courses_point = 0;
    $("#courses input[type='checkbox']").live('click', function(e){
        var is_courses = $(this).val();
        if($(this).is(':checked') && is_courses == 1){
            courses = 1;
            $('#courses_num').attr('disabled', false);
            $('#courses').find(".no").attr('checked', false);
            $('#courses').find(".yes").attr('checked', true);
        }else{
            courses = 0;
            $('#courses').find(".no").attr('checked', true);
            $('#courses_num').val('');
            $('#courses_num').attr('disabled', true);
            $('#courses').find(".yes").attr('checked', false);
        }
    });
    //一等试卷可获得3个积点，二等试卷2个积点，三等试卷1个积点
    var exam_pro_point = 0;
    $("#exam_pro").live('change', function(e){
        exam_pro = $(this).find("option:selected").val();
        if(exam_pro == 1){
            exam_pro_point = 3;
        }else if(exam_pro == 2){
            exam_pro_point = 2;
        }else if(exam_pro == 3){
            exam_pro_point = 1;
        }else{
            exam_pro_point = 0
        }
    });
    //以教务处学段考考试简报为依据，学段考试成绩综合排名（参考B值，均分）在同备课组内位列前50%的，奖励科任老师6个积点。1为是。
    var exam_rank_point = 0;
    $("#exam_rank input[type='checkbox']").live('click', function(e){
        var is_exam_rank = $(this).val();
        if($(this).is(':checked') && is_exam_rank == 1){
            exam_rank = 1;
            exam_rank_point = 6;
            $('#exam_rank_data').attr('disabled', false);
            $('#exam_rank').find(".no").attr('checked', false);
            $('#exam_rank').find(".yes").attr('checked', true);
            $('#exam_rank_upload').removeClass('none');
        }else{
            exam_rank = 0;
            exam_rank_point = 0;
            $('#exam_rank_data').attr('disabled', true);
            $('#exam_rank').find(".no").attr('checked', true);
            $('#exam_rank').find(".yes").attr('checked', false);
            $('#exam_rank_upload').addClass('none');
        }
    });
    //以市教科院文件为准，市级以上科组成员人均获得2个积点。科组长另奖励5个积点
    var outstand_sub_point = 0;
    $("#outstand_sub").live('change', function(e){
        outstand_sub = $(this).find("option:selected").val();
        if(outstand_sub == 1){
            $('#outstand_sub_upload').removeClass('none');
            outstand_sub_point = 2;
        }else if(outstand_sub == 2){
            $('#outstand_sub_upload').removeClass('none');
            outstand_sub_point = 7;
        }else{
            $('#outstand_sub_upload').addClass('none');
            outstand_sub_point = 0
        }
    });
    //含优秀班主任或工作人员或优秀课题组主持人或课题组科研骨干 校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点
    var select_outstand_school_point = 0;
    $("#select_outstand_school").live('change', function(e){
        select_outstand_school = $(this).find("option:selected").val();
        if(select_outstand_school == 1){
            select_outstand_school_point = 5;
        }else if(select_outstand_school == 2){
            select_outstand_school_point = 10;
        }else if(select_outstand_school == 3){
            select_outstand_school_point = 15;
        }else if(select_outstand_school == 4){
            select_outstand_school_point = 20;
        }else{
            select_outstand_school_point = 0
        }
    });
    //考核优秀 校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点
    var select_outstand_year_point = 0;
    $("#select_outstand_year").live('change', function(e){
        select_outstand_year = $(this).find("option:selected").val();
        if(select_outstand_year == 1){
            select_outstand_year_point = 5;
        }else if(select_outstand_year == 2){
            select_outstand_year_point = 10;
        }else if(select_outstand_year == 3){
            select_outstand_year_point = 15;
        }else if(select_outstand_year == 4){
            select_outstand_year_point = 20;
        }else{
            select_outstand_year_point = 0
        }
    });
    //教育系统表彰高考工作先进个人（学科先进个人） 校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点
    var select_outstand_person_point = 0;
    $("#select_outstand_person").live('change', function(e){
        select_outstand_person = $(this).find("option:selected").val();
        if(select_outstand_person == 1){
            select_outstand_person_point = 5;
        }else if(select_outstand_person == 2){
            select_outstand_person_point = 10;
        }else if(select_outstand_person == 3){
            select_outstand_person_point = 15;
        }else if(select_outstand_person == 4){
            select_outstand_person_point = 20;
        }else{
            select_outstand_person_point = 0
        }
    });
    //教育系统表彰高考工作先进个人（学科先进个人） 校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点
    var expert_point = 0;
    $("#expert").live('change', function(e){
        expert = $(this).find("option:selected").val();
        if(expert == 1){
            expert_point = 5;
        }else if(expert == 2){
            expert_point = 10;
        }else if(expert == 3){
            expert_point = 15;
        }else if(expert == 4){
            expert_point = 20;
        }else{
            expert_point = 0
        }
    });
    //教育系统表彰高考工作先进个人（学科先进个人） 校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点
    var expert_point = 0;
    $("#expert").live('change', function(e){
        expert = $(this).find("option:selected").val();
        if(expert == 1){
            expert_point = 5;
        }else if(expert == 2){
            expert_point = 10;
        }else if(expert == 3){
            expert_point = 15;
        }else if(expert == 4){
            expert_point = 20;
        }else{
            expert_point = 0
        }
    });
    $('#submit2').click(function(){
        var part_time_point = 0; //兼职岗位积点
        var award_point = 0; //奖励性积点
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
        substitute_num = 0;
        if(substitute == 1){
            var substitute_num = $('#substitute_num').val();
            if(!substitute_num || substitute_num < 0){
                substitute_num = 0;
            }
            substitute_point = substitute_num * 0.5;
        }
        if(attendance_award == 1){
        }else{
            var attendance_award_num = $('#attendance_award_num').val();
            if(attendance_award_num < 0 || !attendance_award_num){
                alert('缺席的次数不能为空！');
                return;
            }
            var attendance_all_award_point = 20;
            var quexi = attendance_award_num * 1;
            attendance_award_point = accSubtr(attendance_all_award_point, quexi);
            if(attendance_award_point < 0 ){
                attendance_award_point = 0;
            }
        }
        college_num = 0;
        if(college == 1){
            var college_num = $('#college_num').val();
            if(!college_num || college_num < 0){
                college_num = 0;
            }
            college_point = college_num * 6;
        }
        middle_num = 0;
        if(middle == 1){
            var middle_num = $('#middle_num').val();
            if(!middle_num || middle_num < 0){
                middle_num = 0;
            }
            middle_point = middle_num * 10;
        }
        super_workload_num = 0;
        if(super_workload == 1){
            var super_workload_num = $('#super_workload_num').val();
            if(!super_workload_num || super_workload_num < 0){
                super_workload_num = 0;
            }
            super_workload_point = super_workload_num * 0.5;
        }
        school_class_num = 0;
        if(school_class == 1){
            var school_class_num = $('#school_class_num').val();
            if(!school_class_num || school_class_num < 0){
                school_class_num = 0;
            }
            school_class_point = school_class_num * 5;
        }
        city_class_num = 0;
        if(city_class == 1){
            var city_class_num = $('#city_class_num').val();
            if(!city_class_num || city_class_num < 0){
                city_class_num = 0;
            }
            city_class_point = city_class_num * 10;
        }
        courses_num = 0;
        if(courses == 1){
            var courses_num = $('#courses_num').val();
            if(!courses_num || courses_num < 0){
                courses_num = 0;
            }
            if(courses_num > 2){
                alert('八大学堂精品课程,每学年最多2次');
                return;
            }
            courses_point = courses_num * 3;
        }

        var country_match = $('#country_match_num').val();
        if(!country_match || country_match < 0){
            country_match = 0;
        }
        var province_match = $('#province_match_num').val();
        if(!province_match || province_match < 0){
            province_match = 0;
        }
        var city_match = $('#city_match_num').val();
        if(!city_match || city_match < 0){
            city_match = 0;
        }
        var country_point = country_match * 5;
        var province_point = province_match * 3;
        var city_point = city_match * 1;

        var part_time_magazine_data = $('#part_time_magazine_upload_data').val();
        if(!part_time_magazine_data && part_time_magazine == 1){
            alert('请上传兼职证明文件');
            return;
        }
        var substitute_data = $('#substitute_upload_data').val();
        if(!substitute_data && substitute == 1){
            alert('请上传代课文件');
            return;
        }
        var attendance_award_data = $('#attendance_award_upload_data').val();
        if(!attendance_award_data && attendance_award == 1){
            alert('请上传出勤记录');
            return;
        }
        var exam_rank_data = $('#exam_rank_upload_data').val();
        if(!exam_rank_data && exam_rank == 1){
            alert('请上传考试成绩单');
            return;
        }
        var outstand_sub_data = $('#outstand_sub_upload_data').val();
        if(!outstand_sub_data && outstand_sub != 0){
            alert('请上传市教科院文件');
            return;
        }
        award_point = accAdd(award_point, substitute_point);
        award_point = accAdd(award_point, satisfaction_survey_point);
        award_point = accAdd(award_point, attendance_award_point);
        award_point = accAdd(award_point, school_teacher_point);
        award_point = accAdd(award_point, finish_goal_point);
        award_point = accAdd(award_point, college_point);
        award_point = accAdd(award_point, middle_point);
        award_point = accAdd(award_point, super_workload_point);
        award_point = accAdd(award_point, school_class_point);
        award_point = accAdd(award_point, city_class_point);
        award_point = accAdd(award_point, courses_point);
        award_point = accAdd(award_point, country_point);
        award_point = accAdd(award_point, province_point);
        award_point = accAdd(award_point, city_point);
        award_point = accAdd(award_point, exam_pro_point);
        award_point = accAdd(award_point, exam_rank_point);
        award_point = accAdd(award_point, outstand_sub_point);
        award_point = accAdd(award_point, exam_rank_point);
        award_point = accAdd(award_point, select_outstand_school_point);
        award_point = accAdd(award_point, select_outstand_year_point);
        award_point = accAdd(award_point, select_outstand_person_point);
        award_point = accAdd(award_point, expert_point);
        //个人资历积点
        var work_year = $('#work_year').val();
        var city_year = $('#city_year').val();
        var job_title_time = $('#job_title_time').val();
        var postgraduate = $('#postgraduate').val();
        if(!work_year){
            alert('工龄不能为空');
            return;
        }
        if(!city_year){
            alert('市龄不能为空');
            return;
        }
        if(!job_title_time){
            alert('职称资格时间不能为空');
            return;
        }
        //校验完毕，提交
        $.ajax({
            type: "POST",
            url: "/index.php/teacher/add_point_to_db",
            data: {
                workload : workload,
                section_leader : section_leader,
                director : director,
                officer : officer,
                school_leader : school_leader,
                part_time_magazine : part_time_magazine,
                part_time_magazine_data : part_time_magazine_data,
                academic : academic,
                education_case : education_case,
                paper : paper,
                counselor : counselor,
                substitute : substitute,
                substitute_data : substitute_data,
                substitute_num : substitute_num,
                satisfaction_survey : satisfaction_survey,
                attendance_award : attendance_award,
                attendance_award_data : attendance_award_data,
                school_teacher : school_teacher,
                finish_goal : finish_goal,
                college_num : college_num,
                middle_num : middle_num,
                super_workload : super_workload,
                school_class : school_class,
                city_class : city_class,
                courses : courses,
                country_match : country_match,
                province_match : province_match,
                city_match : city_match,
                exam_pro : exam_pro,
                exam_rank : exam_rank,
                exam_rank_data : exam_rank_data,
                outstand_sub : outstand_sub,
                outstand_sub_data : outstand_sub_data,
                select_outstand_school : select_outstand_school,
                select_outstand_year : select_outstand_year,
                select_outstand_person : select_outstand_person,
                expert : expert,
                work_year : work_year,
                city_year : city_year,
                job_title : job_title_time,
                postgraduate : postgraduate,
                eight_teacher : eight_teacher,
                league_teacher : league_teacher,
                tutor : tutor,
                union : union,
                join_festival : join_festival,
                base_point :base_point,
                part_time_point :part_time_point,
                award_point :award_point,
            },
            dataType: "json",
            success: function(json){
                if(json.result == '0000'){
                    alert('录入成功');
                    window.location = '/index.php/teacher/input_point_index';
                }else {
                    alert(json.info);
                }
            },
            error: function(){
                alert("加载失败");
            }
        });
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