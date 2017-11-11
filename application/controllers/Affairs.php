<?php
/**
 * Description：学生处管理控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class Affairs extends BaseController{

    public function __construct()
    {
        parent::__construct();
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        //TODO检测权限
    }
    /**
     * 教务处首页
     * 展示教务处应该要审核的教师。积点审核第一步【不用等到所有的记录提交过来就可以进行审核】
     */
    public function index(){
        $this->data['title'] = '学生处审核首页';
        $this->load->model('M_sch_point');
        $year = $this->get_fill_point_year();
        $page = $this->input->get('page', true);
        if(empty($page)){
            $page = 1;
        }
        $page_size = 20;//每页十条记录
        if(empty($page) || $page == 1){
            $page = 1;
            $limit = $page_size;
            $offset = 0;
        }else{
            $limit = $page_size;
            $offset =  ($page-1)*$page_size;
        }
        $this->data['teacher_check'] = $this->M_sch_point->get_all_point(5, $year, $limit, $offset);
        $all_point = $this->M_sch_point->get_all_point(5, $year);
        $this->data['all_pages'] = count($all_point);
        $this->data['current_page'] = $page;
        $this->data['pages'] = ceil($this->data['all_pages']/$page_size);
        $this->load->view('affairs_index', $this->data);
    }
    //审核通过
    public function submit_check(){
        $ponit_id = $this->input->post('ponit_id', true);
        $no_pass = $this->input->post('no_pass', true);
        $refuse_reason = $this->input->post('refuse_reason', true);
        if(empty($ponit_id)){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        $this->load->model('M_sch_point');
        $this->load->model('Teacher_sch');
        $ponit_info = $this->M_sch_point->get_one(array('id' => $ponit_id));
        $teacher_info = $this->Teacher_sch->get_one(array('teacher_id' => $ponit_info['teacher_id']));
        if(empty($ponit_info)){
            echo $this->apiReturn('0200', new stdClass(), $this->response_msg["0200"]);
            return;
        }
        $status = 6;
        if($no_pass == 1){
            $status = 1;
        }
        $update = $this->M_sch_point->update(array('status' => $status), array(
            'id' => $ponit_id
        ));
        if($update){
            if($no_pass == 1){
                $this->load->model('M_sch_point_check');
                $check_data = array(
                    'point_id' => $ponit_id,
                    'reason' => $refuse_reason,
                    'refuse_status' => 5,
                    'create_time' => date('Y-m-d H:i:s'),
                    'update_time' => date('Y-m-d H:i:s'),
                );
                $this->M_sch_point_check->add($check_data);
            }
            if($status == 6){
                $data_url = $this->save_data_to_word($teacher_info, $ponit_info);
                $this->M_sch_point->update(array('data_url' => $data_url), array(
                    'id' => $ponit_id
                ));
            }
            echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
            return;
        }else{
            echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
            return;
        }
    }
    //教务处查看教师提交过来的积点内容
    public function show_teacher_point(){
        $point_id = $this->input->get('point_id', true);
        if(empty($point_id)){
            show_error('/school/home', 500,'积点ID不能为空!');
        }
        $this->load->model('M_sch_point');
        $teacher_point = $this->M_sch_point->get_one(array('id' => $point_id));
        if(empty($teacher_point)){
            show_error('/school/home', 500,'非法请求');
        }
        $this->load->model('Teacher_sch');
        $this->data['teacher'] = $this->Teacher_sch->get_one(array('teacher_id' => $teacher_point['teacher_id']), 'name');
        $this->data['teacher_point'] = $teacher_point;
        $this->data['title'] = '修改积点';
        $this->load->view('affairs_show_teacher_point', $this->data);
    }
    public function save_data_to_word($teacher, $point){
        if(empty($teacher) || empty($point)){
            return false;
        }
        $this->load->library('PHPWord');
        $PHPWord = new PHPWord();
        $year = $this->get_fill_point_year();
        $save_path = ROOTPATH.'teacher'.'/'.$year.'/'.date('Y-m-d');
        $this->check_path($save_path);
        $document = $PHPWord->loadTemplate(ROOTPATH.'teacher/teacher2.docx');

        $document->setValue('now_level_info',  iconv('utf-8', 'GB2312//IGNORE', $teacher['now_level_info']));
        $document->setValue('qua_name',  iconv('utf-8', 'GB2312//IGNORE', $teacher['qua_name']));
        $document->setValue('name',  iconv('utf-8', 'GB2312//IGNORE', $teacher['name']));
        $document->setValue('year', date('Y'));
        $document->setValue('month', date('m'));
        $document->setValue('day', date('d'));
        $sex = '女';
        $teacher_status = '离职';
        if($teacher['sex'] == 1){
            $sex = '男';
        }
        if($teacher['teacher_status'] == 1){
            $teacher_status = '在职';
        }
        if($teacher['education'] == 1){
            $education = '大学本科';
        }elseif($teacher['education'] == 2){
            $education = '研究生';
        }elseif($teacher['education'] == 3){
            $education = '硕士研究生';
        }
        $document->setValue('sex',  iconv('utf-8', 'GB2312//IGNORE', $sex));
        $document->setValue('born',  iconv('utf-8', 'GB2312//IGNORE', $teacher['born']));
        $document->setValue('teacher_status',  iconv('utf-8', 'GB2312//IGNORE', $teacher_status));
        $document->setValue('education',  iconv('utf-8', 'GB2312//IGNORE', $education));
        $document->setValue('now_level_info',  iconv('utf-8', 'GB2312//IGNORE', $teacher['now_level_info']));
        $document->setValue('now_level',  iconv('utf-8', 'GB2312//IGNORE', $teacher['now_level']));
        $document->setValue('work_start_time',  iconv('utf-8', 'GB2312//IGNORE', $teacher['work_start_time']));
        $document->setValue('now_work_duty',  iconv('utf-8', 'GB2312//IGNORE', $teacher['now_work_duty']));
        $document->setValue('now_work_level',  iconv('utf-8', 'GB2312//IGNORE', $teacher['now_work_level']));
        $document->setValue('now_work_time',  iconv('utf-8', 'GB2312//IGNORE', $teacher['now_work_time']));
        $document->setValue('work_time',  iconv('utf-8', 'GB2312//IGNORE', $teacher['work_time']));
        $document->setValue('er_school_time',  iconv('utf-8', 'GB2312//IGNORE', $teacher['er_school_time']));
        $document->setValue('school_work_time',  iconv('utf-8', 'GB2312//IGNORE', $teacher['school_work_time']));
        $document->setValue('qua_time',  iconv('utf-8', 'GB2312//IGNORE', $teacher['qua_time']));
        $document->setValue('qua_name',  iconv('utf-8', 'GB2312//IGNORE', $teacher['qua_name']));
        //处理积分的问题
        $document->setValue('workload',  iconv('utf-8', 'GB2312//IGNORE', $point['workload']));
        $document->setValue('director',  iconv('utf-8', 'GB2312//IGNORE', (($point['director'] == 1 ) ? 45 : 0)));
        $document->setValue('officer',  iconv('utf-8', 'GB2312//IGNORE', (($point['officer'] == 1 ) ? 40 : 0)));
        $document->setValue('school_leader',  iconv('utf-8', 'GB2312//IGNORE', (($point['school_leader'] == 1 ) ? 60 : 0)));
        $document->setValue('part_time_magazine',  iconv('utf-8', 'GB2312//IGNORE', (($point['part_time_magazine'] == 1 ) ? 12 : 0)) );
        $document->setValue('academic',  iconv('utf-8', 'GB2312//IGNORE', (($point['academic'] == 1 ) ? 15 : 0)));
        $document->setValue('counselor',  iconv('utf-8', 'GB2312//IGNORE', (($point['counselor'] == 1 ) ? 5 : 0)));
        $document->setValue('satisfaction_survey',  iconv('utf-8', 'GB2312//IGNORE', (($point['satisfaction_survey'] == 1 ) ? 5 : 0)));
        $document->setValue('school_teacher',  iconv('utf-8', 'GB2312//IGNORE', (($point['school_teacher'] == 1 ) ? 30 : 0)));
        $exam_rank = 0;
        if($point['exam_rank'] == 1){
            $exam_rank = 6;
        }
        $document->setValue('exam_rank',  iconv('utf-8', 'GB2312//IGNORE', $exam_rank));
        $exam_pro = 0;
        if($point['exam_pro'] == 1){
            $exam_pro = 3;
        }elseif($point['exam_pro'] == 2){
            $exam_pro = 2;
        }elseif ($point['exam_pro'] == 3){
           $exam_pro = 1;
        } 
        $document->setValue('exam_pro',  iconv('utf-8', 'GB2312//IGNORE', $exam_pro));
        $section_leader = 0;
        if($point['section_leader'] == 1){
            $section_leader = 45;
        }elseif($point['section_leader'] == 2){
            $section_leader = 30;
        }
        $document->setValue('section_leader',  iconv('utf-8', 'GB2312//IGNORE', $section_leader));
        $outstand_sub = 0;
        if($point['outstand_sub'] == 1){
            $outstand_sub = 2;
        }elseif($point['outstand_sub'] == 2){
            $outstand_sub = 7;
        }
        $document->setValue('outstand_sub',  iconv('utf-8', 'GB2312//IGNORE', $outstand_sub));
        $education_case_point = 0;
        $education_case = $point['education_case'];
        if($education_case == 1){
            $education_case_point = 7;
        }else if($education_case == 2){
            $education_case_point = 4;
        }else if($education_case == 3){
            $education_case_point = 2;
        }else if($education_case == 4){
            $education_case_point = 11;
        }else if($education_case == 5){
            $education_case_point = 6;
        }else if($education_case == 6){
            $education_case_point = 3;
        }

        $education_case2 = $point['education_case2'];
        $education_case_point2 = 0;
        if($education_case2 == 1){
            $education_case_point2 = 7;
        }else if($education_case2 == 2){
            $education_case_point2 = 4;
        }else if($education_case2 == 3){
            $education_case_point2 = 2;
        }else if($education_case2 == 4){
            $education_case_point2 = 11;
        }else if($education_case2 == 5){
            $education_case_point2 = 6;
        }else if($education_case2 == 6){
            $education_case_point2 = 3;
        }
        $paper = $point['paper'];
        $paper_point = 0;
        if($paper == 1){
            $paper_point = 5;
        }else if($paper == 2){
            $paper_point = 10;
        }else if($paper == 3){
            $paper_point = 15;
        }else if($paper == 4){
            $paper_point = 20;
        }
        $document->setValue('paper',  iconv('utf-8', 'GB2312//IGNORE', $paper_point));
        $education_case_point = bcadd($education_case_point, $education_case_point2, 2);
        $document->setValue('education_case',  iconv('utf-8', 'GB2312//IGNORE', $education_case_point));

        $expert = 0;
        $expert_ = $point['expert'];
        if($expert_ == 1){
            $expert = 10;
        }else if($expert_ == 2){
            $expert = 15;
        }else if($expert_ == 3){
            $expert = 20;
        }
        $document->setValue('expert',  iconv('utf-8', 'GB2312//IGNORE', $expert));
        $select_outstand_school = 0;
        $select_outstand_school_ = $point['select_outstand_school'];
        if($select_outstand_school_ == 1){
            $select_outstand_school = 5;
        }else if($select_outstand_school_ == 2){
            $select_outstand_school = 10;
        }else if($select_outstand_school_ == 3){
            $select_outstand_school = 15;
        } else if($select_outstand_school_ == 4){
            $select_outstand_school = 20;
        }
        $document->setValue('select_outstand_school',  iconv('utf-8', 'GB2312//IGNORE', $select_outstand_school));
        $select_outstand_year = 0;
        $select_outstand_year_ = $point['select_outstand_year'];
        if($select_outstand_year_ == 1){
            $select_outstand_year = 5;
        }else if($select_outstand_year_ == 2){
            $select_outstand_year = 10;
        }else if($select_outstand_year_ == 3){
            $select_outstand_year = 15;
        } else if($select_outstand_year_ == 4){
            $select_outstand_year = 20;
        }
        $document->setValue('select_outstand_year',  iconv('utf-8', 'GB2312//IGNORE', $select_outstand_year));

        $select_outstand_person = 0;
        $select_outstand_person_ = $point['select_outstand_person'];
        if($select_outstand_person_ == 1){
            $select_outstand_person = 5;
        }else if($select_outstand_person_ == 2){
            $select_outstand_person = 10;
        }else if($select_outstand_person_ == 3){
            $select_outstand_person = 15;
        } else if($select_outstand_person_ == 4){
            $select_outstand_person = 20;
        }
        $document->setValue('select_outstand_person',  iconv('utf-8', 'GB2312//IGNORE', $select_outstand_person));
        $eight_teacher_point = 0;
        if($point['eight_teacher'] == 1){
            $eight_teacher_point = 5;
        }
        $document->setValue('eight_teacher',  iconv('utf-8', 'GB2312//IGNORE', $eight_teacher_point));
        $league_teacher_point = 0;
        if($point['league_teacher'] == 1){
            $league_teacher_point = 5;
        }
        $document->setValue('league_teacher',  iconv('utf-8', 'GB2312//IGNORE', $league_teacher_point));
        $tutor_point = 0;
        if($point['tutor'] == 1){
            $tutor_point = 5;
        }
        $document->setValue('tutor',  iconv('utf-8', 'GB2312//IGNORE', $tutor_point));
        $union_point = 0;
        if($point['union'] == 1){
            $union_point = 5;
        }elseif($point['union'] == 2){
            $union_point = 4;
        }
        $document->setValue('union',  iconv('utf-8', 'GB2312//IGNORE', $union_point));
        $woman_point = 0;
        if($point['woman'] == 1){
            $woman_point = 5;
        }elseif($point['woman'] == 2){
            $woman_point = 4;
        }
        $document->setValue('woman',  iconv('utf-8', 'GB2312//IGNORE', $woman_point));
        $join_festival_point = 0;
        if($point['join_festival'] == 1){
            $join_festival_point = 4;
        }
        $document->setValue('join_festival',  iconv('utf-8', 'GB2312//IGNORE', $join_festival_point));
        $finish_goal_point = 0;
        if($point['finish_goal'] == 1){
            $finish_goal_point = 5;
        }
        $document->setValue('finish_goal',  iconv('utf-8', 'GB2312//IGNORE', $finish_goal_point));

        $document->setValue('substitute',  iconv('utf-8', 'GB2312//IGNORE', round($point['substitute_num'] * 0.5, 2)));
        $document->setValue('super_workload',  iconv('utf-8', 'GB2312//IGNORE', round($point['super_workload'] * 0.5, 2)));
        $document->setValue('courses',  iconv('utf-8', 'GB2312//IGNORE', round($point['courses'] * 3, 2)));
        if($point['attendance_award_num'] >= 20){
            $attendance_award_point = 0;
        }else{
            $attendance_award_point = bcsub(20, $point['attendance_award_num'], 2);
        }
        $document->setValue('attendance_award',  iconv('utf-8', 'GB2312//IGNORE', $attendance_award_point));
        $college_num_point = 0;
        if($point['college_num'] > 0){
            $college_num_point = bcmul($point['college_num'], 6, 2);
        }
        $document->setValue('college_num_point',  iconv('utf-8', 'GB2312//IGNORE', $college_num_point));
        $middle_num_point = 0;
        if($point['middle_num'] > 0){
            $middle_num_point = bcmul($point['middle_num'], 10, 2);
        }
        $document->setValue('middle_num_point',  iconv('utf-8', 'GB2312//IGNORE', $middle_num_point));
        $school_class_point = 0;
        if($point['school_class'] > 0){
            $school_class_point = bcmul($point['school_class'], 5, 2);
        }
        $document->setValue('school_class_point',  iconv('utf-8', 'GB2312//IGNORE', $school_class_point));
        $city_class_point = 0;
        if($point['city_class'] > 0){
            $city_class_point = bcmul($point['city_class'], 10, 2);
        }
        $document->setValue('city_class_point',  iconv('utf-8', 'GB2312//IGNORE', $city_class_point));

        $school_class_point = $point['school_class'] * 5 + $point['city_class']*10;
        $document->setValue('school_class',  iconv('utf-8', 'GB2312//IGNORE', $school_class_point));
        $document->setValue('country_match',  iconv('utf-8', 'GB2312//IGNORE',  $point['country_match'] * 5 + $point['province_match']*3 + $point['city_match']));
        $work_year_month = $this->getMonthNum($point['work_year']);
        $job_title_month = $this->getMonthNum($point['job_title']);
        if($point['job_title'] == '0000-00-00'){
            $job_title_month = 0;
        }
        $work_year_point = round(0.4 * $work_year_month, 2);
        $job_title_point = round(0.8 * $job_title_month, 2);
        $document->setValue('work_year',  iconv('utf-8', 'GB2312//IGNORE', $work_year_point));
        $document->setValue('job_title',  iconv('utf-8', 'GB2312//IGNORE', $job_title_point));

        $city_year_month = $this->getMonthNum($point['city_year']);//市龄
        $school_work_days = $this->getMonthNum($point['school_year']);//校龄
        $city_year_point = round(0.6 * $city_year_month, 2);
        $document->setValue('city_year_point',  iconv('utf-8', 'GB2312//IGNORE', $city_year_point));
        $school_work_days_point = round(0.2 * $school_work_days, 2);
        $document->setValue('school_work_days_point',  iconv('utf-8', 'GB2312//IGNORE', $school_work_days_point));
        $postgraduate = 0;
        $postgraduate_ = $point['postgraduate'];
        if($postgraduate_ == 1){
            $postgraduate = 9;
        }else if($postgraduate_ == 2){
            $postgraduate = 15;
        }
        $document->setValue('postgraduate',  iconv('utf-8', 'GB2312//IGNORE', $postgraduate));
        $document->setValue('base_point',  iconv('utf-8', 'GB2312//IGNORE', $point['base_point']));  
        $document->setValue('part_time_point',  iconv('utf-8', 'GB2312//IGNORE', $point['part_time_point'])); 
        $document->setValue('award_point',  iconv('utf-8', 'GB2312//IGNORE', $point['award_point'])); 
        $document->setValue('person_point',  iconv('utf-8', 'GB2312//IGNORE', $point['person_point'])); 
        $document->setValue('total_point',  iconv('utf-8', 'GB2312//IGNORE', $point['total_point'])); 
        $name = iconv('utf-8', 'GB2312//IGNORE', $teacher['name']).'.doc';
        $document->save($save_path.'/'.$name);
        return $save_path.'/'.$name;
    }

    private function check_path($save_path){
        if (!file_exists($save_path) || !is_writable($save_path)) {
            if (!@mkdir($save_path, 0755)) {
                return false;
            }
            return true;
        }
    }
}