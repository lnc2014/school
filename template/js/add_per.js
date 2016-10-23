/**
 * 添加教师js，主要处理积点的问题。
 * 分模块化
 * Created by admin on 2016/9/26.
 */

$(function(){
    //第一个问题
    var work_load = $('#is_work_load').val();
    $("#work_load input[type='checkbox']").live('click', function(e){
        var is_work_load = $(this).val();
        if($(this).is(':checked') && is_work_load == 1){
            $("#is_work_load").val(1);
            $('#work_load').find(".no").attr('checked', false);
            $('#work_load').find(".yes").attr('checked', true);
        }else{
            $("#is_work_load").val(0);
            $('#work_load').find(".no").attr('checked', true);
            $('#work_load').find(".yes").attr('checked', false);
        }
    });
    //第二个问题
    var teaching_good = $('#is_teaching_good').val();
    $("#teaching_good input[type='checkbox']").live('click', function(e){
        var is_teaching_good = $(this).val();
        if($(this).is(':checked') && is_teaching_good == 1){
            $("#is_teaching_good").val(1);
            $('#teaching_good').find(".no").attr('checked', false);
            $('#teaching_good').find(".yes").attr('checked', true);
        }else{
            $("#is_teaching_good").val(0);
            $('#teaching_good').find(".no").attr('checked', true);
            $('#teaching_good').find(".yes").attr('checked', false);
        }
    });
    //第三个问题
    var teaching_behavior = $('#is_teaching_behavior').val();
    $("#teaching_behavior input[type='checkbox']").live('click', function(e){
        var is_teaching_behavior = $(this).val();
        if($(this).is(':checked') && is_teaching_behavior == 1){
            $("#is_teaching_behavior").val(1);
            $('#teaching_behavior').find(".no").attr('checked', false);
            $('#teaching_behavior').find(".yes").attr('checked', true);
        }else{
            $("#is_teaching_behavior").val(0);
            $('#teaching_behavior').find(".no").attr('checked', true);
            $('#teaching_behavior').find(".yes").attr('checked', false);
        }
    });
    //第四个问题
    var student_statis = $('#is_student_statis').val();
    $("#student_statis input[type='checkbox']").live('click', function(e){
        var is_student_statis = $(this).val();
        if($(this).is(':checked') && is_student_statis == 1){
            $("#is_student_statis").val(1);
            $('#student_statis').find(".no").attr('checked', false);
            $('#student_statis').find(".yes").attr('checked', true);
        }else{
            $("#is_student_statis").val(0);
            $('#student_statis').find(".no").attr('checked', true);
            $('#student_statis').find(".yes").attr('checked', false);
        }
    });
    //第五个问题
    var subject_good = $('#is_subject_good').val();
    $("#subject_good input[type='checkbox']").live('click', function(e){
        var is_subject_good = $(this).val();
        if($(this).is(':checked') && is_subject_good == 1){
            $("#is_subject_good").val(1);
            $('#subject_good').find(".no").attr('checked', false);
            $('#subject_good').find(".yes").attr('checked', true);
        }else{
            $("#is_subject_good").val(0);
            $('#subject_good').find(".no").attr('checked', true);
            $('#subject_good').find(".yes").attr('checked', false);
        }
    });
    //第六个问题
    var academic = $('#is_academic').val();
    $("#academic input[type='checkbox']").live('click', function(e){
        var is_academic = $(this).val();
        if($(this).is(':checked') && is_academic == 1){
            $("#is_academic").val(1);
            $('#academic').find(".no").attr('checked', false);
            $('#academic').find(".yes").attr('checked', true);
        }else{
            $("#is_academic").val(0);
            $('#academic').find(".no").attr('checked', true);
            $('#academic').find(".yes").attr('checked', false);
        }
    });
    //第七个问题
    var organ_sub = $('#is_organ_sub').val();
    $("#organ_sub input[type='checkbox']").live('click', function(e){
        var is_organ_sub = $(this).val();
        if($(this).is(':checked') && is_organ_sub == 1){
            $("#is_organ_sub").val(1);
            $('#organ_sub').find(".no").attr('checked', false);
            $('#organ_sub').find(".yes").attr('checked', true);
        }else{
            $("#is_organ_sub").val(0);
            $('#organ_sub').find(".no").attr('checked', true);
            $('#organ_sub').find(".yes").attr('checked', false);
        }
    });
    //第八个问题
    var school_forum = $('#is_school_forum').val();
    $("#school_forum input[type='checkbox']").live('click', function(e){
        var is_school_forum = $(this).val();
        if($(this).is(':checked') && is_school_forum == 1){
            $("#is_school_forum").val(1);
            $('#school_forum').find(".no").attr('checked', false);
            $('#school_forum').find(".yes").attr('checked', true);
        }else{
            $("#is_school_forum").val(0);
            $('#school_forum').find(".no").attr('checked', true);
            $('#school_forum').find(".yes").attr('checked', false);
        }
    });
    //第九个问题
    var backtone_teacher = $('#is_backtone_teacher').val();
    $("#backtone_teacher input[type='checkbox']").live('click', function(e){
        var is_backtone_teacher = $(this).val();
        if($(this).is(':checked') && is_backtone_teacher == 1){
            $("#is_backtone_teacher").val(1);
            $('#backtone_teacher').find(".no").attr('checked', false);
            $('#backtone_teacher').find(".yes").attr('checked', true);
        }else{
            $("#is_backtone_teacher").val(0);
            $('#backtone_teacher').find(".no").attr('checked', true);
            $('#backtone_teacher').find(".yes").attr('checked', false);
        }
    });
    //第10个问题
    var teach_intern = $('#is_teach_intern').val();
    $("#teach_intern input[type='checkbox']").live('click', function(e){
        var is_teach_intern = $(this).val();
        if($(this).is(':checked') && is_teach_intern == 1){
            $("#is_teach_intern").val(1);
            $('#teach_intern').find(".no").attr('checked', false);
            $('#teach_intern').find(".yes").attr('checked', true);
        }else{
            $("#is_teach_intern").val(0);
            $('#teach_intern').find(".no").attr('checked', true);
            $('#teach_intern').find(".yes").attr('checked', false);
        }
    });
    //第11个问题
    var person_write = $('#is_person_write').val();
    $("#person_write input[type='checkbox']").live('click', function(e){
        var is_person_write = $(this).val();
        if($(this).is(':checked') && is_person_write == 1){
            $("#is_teach_intern").val(1);
            $('#person_write').find(".no").attr('checked', false);
            $('#person_write').find(".yes").attr('checked', true);
        }else{
            $("#is_person_write").val(0);
            $('#person_write').find(".no").attr('checked', true);
            $('#person_write').find(".yes").attr('checked', false);
        }
    });
    //第12个问题
    var semester = $('#is_semester').val();
    $("#semester input[type='checkbox']").live('click', function(e){
        var is_semester = $(this).val();
        if($(this).is(':checked') && is_semester == 1){
            $("#is_teach_intern").val(1);
            $('#semester').find(".no").attr('checked', false);
            $('#semester').find(".yes").attr('checked', true);
        }else{
            $("#is_semester").val(0);
            $('#semester').find(".no").attr('checked', true);
            $('#semester').find(".yes").attr('checked', false);
        }
    });
    //第13个问题
    var head_teacher = $('#is_head_teacher').val();
    $("#head_teacher input[type='checkbox']").live('click', function(e){
        var is_head_teacher = $(this).val();
        if($(this).is(':checked') && is_head_teacher == 1){
            $("#is_head_teacher").val(1);
            $('#head_teacher').find(".no").attr('checked', false);
            $('#head_teacher').find(".yes").attr('checked', true);
        }else{
            $("#is_head_teacher").val(0);
            $('#head_teacher').find(".no").attr('checked', true);
            $('#head_teacher').find(".yes").attr('checked', false);
        }
    });

    //第14个问题
    var learning_exper = $('#is_learning_exper').val();
    $("#learning_exper input[type='checkbox']").live('click', function(e){
        var is_learning_exper = $(this).val();
        if($(this).is(':checked') && is_learning_exper == 1){
            $("#is_learning_exper").val(1);
            $('#learning_exper').find(".no").attr('checked', false);
            $('#learning_exper').find(".yes").attr('checked', true);
        }else{
            $("#is_learning_exper").val(0);
            $('#learning_exper').find(".no").attr('checked', true);
            $('#learning_exper').find(".yes").attr('checked', false);
        }
    });
    //第15个问题
    var class_meeting = $('#is_class_meeting').val();
    $("#class_meeting input[type='checkbox']").live('click', function(e){
        var is_class_meeting = $(this).val();
        if($(this).is(':checked') && is_class_meeting == 1){
            $("#is_class_meeting").val(1);
            $('#class_meeting').find(".no").attr('checked', false);
            $('#class_meeting').find(".yes").attr('checked', true);
        }else{
            $("#is_class_meeting").val(0);
            $('#class_meeting').find(".no").attr('checked', true);
            $('#class_meeting').find(".yes").attr('checked', false);
        }
    });
    //第16个问题
    var good_head_teacher = $('#is_good_head_teacher').val();
    $("#good_head_teacher input[type='checkbox']").live('click', function(e){
        var is_good_head_teacher = $(this).val();
        if($(this).is(':checked') && is_good_head_teacher == 1){
            $("#is_good_head_teacher").val(1);
            $('#good_head_teacher').find(".no").attr('checked', false);
            $('#good_head_teacher').find(".yes").attr('checked', true);
        }else{
            $("#is_good_head_teacher").val(0);
            $('#good_head_teacher').find(".no").attr('checked', true);
            $('#good_head_teacher').find(".yes").attr('checked', false);
        }
    });
    //第17个问题
    var fes_activity = $('#is_fes_activity').val();
    $("#fes_activity input[type='checkbox']").live('click', function(e){
        var is_fes_activity = $(this).val();
        if($(this).is(':checked') && is_fes_activity == 1){
            $("#is_fes_activity").val(1);
            $('#fes_activity').find(".no").attr('checked', false);
            $('#fes_activity').find(".yes").attr('checked', true);
        }else{
            $("#is_fes_activity").val(0);
            $('#fes_activity').find(".no").attr('checked', true);
            $('#fes_activity').find(".yes").attr('checked', false);
        }
    });
    //第18个问题
    var work_for_school = $('#is_work_for_school').val();
    $("#work_for_school input[type='checkbox']").live('click', function(e){
        var is_work_for_school = $(this).val();
        if($(this).is(':checked') && is_work_for_school == 1){
            $("#is_work_for_school").val(1);
            $('#work_for_school').find(".no").attr('checked', false);
            $('#work_for_school').find(".yes").attr('checked', true);
        }else{
            $("#is_work_for_school").val(0);
            $('#work_for_school').find(".no").attr('checked', true);
            $('#work_for_school').find(".yes").attr('checked', false);
        }
    });
    //第19个问题
    var manange_school = $('#is_manange_school').val();
    $("#manange_school input[type='checkbox']").live('click', function(e){
        var is_manange_school = $(this).val();
        if($(this).is(':checked') && is_manange_school == 1){
            $("#is_manange_school").val(1);
            $('#manange_school').find(".no").attr('checked', false);
            $('#manange_school').find(".yes").attr('checked', true);
        }else{
            $("#is_manange_school").val(0);
            $('#manange_school').find(".no").attr('checked', true);
            $('#manange_school').find(".yes").attr('checked', false);
        }
    });
    //第20个问题
    var research_school = $('#is_research_school').val();
    $("#research_school input[type='checkbox']").live('click', function(e){
        var is_research_school = $(this).val();
        if($(this).is(':checked') && is_research_school == 1){
            $("#is_research_school").val(1);
            $('#research_school').find(".no").attr('checked', false);
            $('#research_school').find(".yes").attr('checked', true);
        }else{
            $("#is_research_school").val(0);
            $('#research_school').find(".no").attr('checked', true);
            $('#research_school').find(".yes").attr('checked', false);
        }
    });
});
