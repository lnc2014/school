<?php
/**
 * Description：教师管理控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class Teacher extends BaseController{
    /**
     * 教师个人信息
     */
    public function show_error(){
        $today_month = date('Y-09', time());
        show_error('/school/home', 500, '您的权限不足。');
    }
    public function info(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->load->model('Teacher_sch');
        $teacher = $this->Teacher_sch->get_one(array('teacher_id' => $_SESSION['teacher_id']));
        if(empty($teacher)){
            redirect('teacher/error');
        }
        $this->data['teacher'] = $teacher;
        $this->load->view('teacher_info', $this->data);
    }
    //修改教师个人信息
    public function edit_info(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->load->model('Teacher_sch');
        $teacher = $this->Teacher_sch->get_one(array('teacher_id' => $_SESSION['teacher_id']));
        if(empty($teacher)){
            redirect('teacher/error');
        }
        $this->data['teacher'] = $teacher;
        $this->load->view('teacher_edit_info', $this->data);
    }
    //保存修改的信息
    public function save_info(){
        if(!$this->check_login()){
            echo $this->apiReturn('0005', new stdClass(), $this->response_msg["0005"]);
            return;
        }
        $post = $this->input->post(null , true);
        if(empty($post)){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        $this->load->model('Teacher_sch');
        $update = $this->Teacher_sch->update($post, array('teacher_id' => $_SESSION['teacher_id']));
        if($update){
            echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
            return;
        }else{
            echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
            return;
        }
    }
    /**
     * 教师首页
     */
    public function index(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->load->model('M_sch_point');
        $this->data['teacher_point']= $this->M_sch_point->get_list(array('teacher_id' => $_SESSION['teacher_id']));
        $this->load->view('teacher_index', $this->data);
    }

    /**
     * 教师录入积点首页,具有新增、修改的功能
     */
    public function input_point_index(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->load->model('M_sch_point');
        //查找需要填写的年度
        $this->load->model('M_sch_system_point');
        $system_year = $this->M_sch_system_point->get_one(array('status' => 1));
        $this->data['have_point'] = 1;
        if(empty($system_year)){
            $this->data['have_point'] = 0;
        }
        if(!empty($system_year)){
            $teacher_point = $this->M_sch_point->get_one(array('teacher_id' => $_SESSION['teacher_id'], 'year' => $system_year['year']));
        }
        $this->data['is_fill_point'] = 0;//是不是已经填写本年度的积点,默认为没有填写
        if(!empty($teacher_point)){
            $this->data['is_fill_point'] = 1;
            //计算教师是不是已经审核过，如果是审核过的要查找到审核原因并且显示出来
            $this->load->model('M_sch_point_check');
            $refuse_reason = $this->M_sch_point_check->find_is_no_check($teacher_point['id']);
            $teacher_point['refuse_reason'] = $refuse_reason['reason'];
            $this->data['teacher_total_point'] = $teacher_point;
        }
        $this->load->view('teacher_input_index', $this->data);
    }
    //提交审核
    public function submit_check(){
        $ponit_id = $this->input->post('ponit_id', true);
        if(empty($ponit_id)){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        $this->load->model('M_sch_point');
        $ponit_info = $this->M_sch_point->get_one(array('id' => $ponit_id),'teacher_id, status, year');
        if(empty($ponit_info)){
            echo $this->apiReturn('0200', new stdClass(), $this->response_msg["0200"]);
            return;
        }
        $status = 2;
        //增加一个审核的跳转的问题
        $this->load->model('M_sch_point_check');
        $refuse_reason = $this->M_sch_point_check->find_is_no_check($ponit_id);
        if(!empty($refuse_reason)){
            $status = $refuse_reason['refuse_status'];
        }
        $update = $this->M_sch_point->update(array('status' => $status), array(
            'id' => $ponit_id
        ));
        if($update){
            echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
            return;
        }else{
            echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
            return;
        }
    }
    /**
     * 教师录入积点的页面，还要是录入年度
     */
    public function input_point(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->load->model('Teacher_sch');
        $teacher = $this->Teacher_sch->get_one(array('teacher_id' => $_SESSION['teacher_id']));
        //处理下时间
        $teacher['work_time'] = substr($teacher['work_time'], 0, 4).'-'.substr($teacher['work_time'], 4, 2).'-01';
        $teacher['school_work_time'] = substr($teacher['school_work_time'], 0, 4).'-'.substr($teacher['school_work_time'], 4, 2).'-01';//校龄
        $teacher['qua_time'] = substr($teacher['qua_time'], 0, 4).'-'.substr($teacher['qua_time'], 4, 2).'-01';
        $teacher['er_school_time'] = substr($teacher['er_school_time'], 0, 4).'-'.substr($teacher['er_school_time'], 4, 2).'-01';//市龄
        $this->data['teacher'] = $teacher;
        $this->load->view('teacher_input_point', $this->data);
    }
    //修改教师录入的积点
    public function edit_point(){
        $point_id = $this->input->get('point_id', true);
        if(empty($point_id)){
            show_error('/school/home', 500,'积点ID不能为空!');
        }
        $this->load->model('M_sch_point');
//        $teacher_point = $this->M_sch_point->get_one(array('teacher_id' => $_SESSION['teacher_id'], 'id' => $point_id));
        $teacher_point = $this->M_sch_point->get_one(array('id' => $point_id));
        if(empty($teacher_point)){
            show_error('/school/home', 500,'非法请求');
        }
        $this->load->model('Teacher_sch');
        $teacher = $this->Teacher_sch->get_one(array('teacher_id' => $teacher_point['teacher_id']));
        $this->data['teacher_point'] = $teacher_point;
        $this->data['teacher'] = $teacher;
        $this->data['title'] = '修改积点';
        $this->load->view('teacher_input_point', $this->data);
    }
    /**
     * 教师积点录入接口
     */
    public function add_point_to_db(){
        //检验是不是登录
        if(!$this->check_login()){
            echo $this->apiReturn('0005', new stdClass(), $this->response_msg["0005"]);
            return;
        }
        $post = $this->input->post(NULL, true);
        if(empty($post)){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        //查找需要填写的年度
        $this->load->model('M_sch_system_point');
        $system_year = $this->M_sch_system_point->get_one(array('status' => 1));
        if(empty($system_year)){
            $system_year['year'] = date('Y', time()); //默认为今年
        }
        $this->load->model('M_sch_point');
        if($post['point_id'] == 0){
            $teacher_point = $this->M_sch_point->get_one(array('teacher_id' => $_SESSION['teacher_id'], 'year' => $system_year['year'])); //获取积点的年份
            if(!empty($teacher_point) || !empty($teacher_total_point)){
                echo $this->apiReturn('0004', new stdClass(), $this->response_msg["0004"]);
                return;
            }
        }

        if(empty($post['work_year']) || empty($post['city_year']) || empty($post['job_title'])){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        $work_year_month = $this->getMonthNum($post['work_year']);
        $city_year_month = $this->getMonthNum($post['city_year']);
        $school_work_days = $this->getMonthNum($post['school_year']);
//        $school_work_days = $this->diffBetweenTwoDays($today_work, $post['school_year']);
        $job_title_month = $this->getMonthNum($post['job_title']);

        $work_year_point = round(0.4 * $work_year_month, 2);
        $city_year_point = round(0.6 * $city_year_month, 2);
        $school_work_days_point = round(0.2 * $school_work_days, 2);
        $job_title_point = round(0.8 * $job_title_month, 2);

        $postgraduate_point = 0;
        if($post['postgraduate'] == 1){
            $postgraduate_point = 9;
        }elseif($post['postgraduate'] == 2){
            $postgraduate_point = 15;
        }
        $person_point = round($work_year_point +  $city_year_point + $school_work_days_point + $job_title_point + $postgraduate_point, 2);
        //后端计算兼职积点分数、奖励性分数 
        $total_point = round($post['base_point'] + $post['part_time_point'] + $post['award_point'] + $person_point, 2);
        $result = $this->sub_point($post);
        if($post['teacher_id'] == 0){
            $post['teacher_id'] = $_SESSION['teacher_id'];
        }
        $post['total_point'] = $result['total_point'];
        $post['person_point'] = $result['person_point'];
        $post['part_time_point'] = $result['part_time_point'];
        $post['award_point'] = $result['award_point'];
        $post['year'] = $system_year['year'];
        if($post['status'] < 1){
            $post['status'] = 1;//1为待审核，2为教务处审核中，3办公室审核中，4评审委员会审核中，5校长是否公布，6已完成
        } 
        if($post['point_id'] >0 ){
            $id = $post['point_id'];
            unset($post['point_id']);
            $update = $this->M_sch_point->update($post, array('id' => $id));
        }else{
            unset($post['point_id']);
            $point_id = $this->M_sch_point->add($post);
        }

        if($point_id > 0 || $update){
            echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
            return;
        }else{
            echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
            return;
        }
    }
    /**
     * 更新所有老师的个人积点信息
     */
    public function update_teacher_point(){
        $this->load->model('M_sch_point');
        $this->load->model('Teacher_sch');
        $all_points = $this->M_sch_point->get_list();//找出所有的积点，已经填写了的
        $all_teachers = $this->Teacher_sch->get_list();//找出所有的老师基本资料
        //找出所有填过的积点，并且把所有的老师的基本资料都查找出来
        foreach ($all_points as $all_teacher) {
            foreach($all_teachers as $value){
                if($value['teacher_id'] == $all_teacher['teacher_id']){
                    //更新两个时间，一个为校龄，一个市龄  校龄为入校时间，市龄为二外入编时间
//                    qua_time 自取得拟竞聘的专业技术职称资格时间计起（以证书为准），每月0.8分。日期job_title
//                    er_school_time 自竞聘人员正式调入我市工作当月计起（以到主管部门报到时间为准），每月0.6分。精确到日期city_year
//                    school_work_time 加入学校日期，校龄分每月加0.5 school_year
//                    work_time 自竞聘人员参加工作之月计起（以人事档案的第一份履历表为准），每月0.4分。研究生工龄从上研究生之日进行计算。开始工作的日期。 work_year
                    $school_year = substr($value['school_work_time'], 0, 4).'-'.substr($value['school_work_time'], 4, 2).'-01';//校龄
                    $city_year = substr($value['er_school_time'], 0, 4).'-'.substr($value['er_school_time'], 4, 2).'-01';//市龄
                    $job_title = substr($value['qua_time'], 0, 4).'-'.substr($value['qua_time'], 4, 2).'-01';//职称资格
                    $work_year = substr($value['qua_time'], 0, 4).'-'.substr($value['qua_time'], 4, 2).'-01';//职称资格
                    if($value['qua_time'] == '无'){
                        $job_title = 0;
                    }
                    $this->M_sch_point->update(array(
                        'school_year' => $school_year,
                        'city_year' => $city_year,
                        'job_title' => $job_title,
                        'work_year' => $work_year
                    ), array('teacher_id' => $all_teacher['teacher_id']));
                }
            } 
        }
        foreach ($all_points as $all_point) {
            //重新计算积点
            $result = $this->sub_point($all_point);
            $this->M_sch_point->update(array(
                'base_point' => $result['base_point'],
                'part_time_point' => $result['part_time_point'],
                'award_point' => $result['award_point'],
                'person_point' => $result['person_point'],
                'total_point' => $result['total_point'],
            ), array('teacher_id' => $all_point['teacher_id']));
        }
    }
    public function sub_point($post){
        //基本岗位积点数
        $base_point = 0;
        if(1 <= $post['subject'] && $post['subject'] <= 3){
            $base_point = bcmul(bcdiv($post['subject_num'], 10, 4), 100, 2);
        }
        if(4 <= $post['subject'] && $post['subject'] <= 9){
            $base_point = bcmul(bcdiv($post['subject_num'], 12, 4), 100, 2);
        }
        if(10 <= $post['subject'] && $post['subject'] <= 14){
            $base_point = bcmul(bcdiv($post['subject_num'], 14, 4), 100, 2);
        }
        //兼职岗位积点数
        $part_time_point = 0;
        if($post['section_leader'] == 1){
            $part_time_point = bcadd($part_time_point, 45, 2);
        }elseif($post['section_leader'] == 2){
            $part_time_point = bcadd($part_time_point, 30, 2);
        }
        if($post['director'] == 1){
            $part_time_point = bcadd($part_time_point, 45, 2);
        }
        if($post['officer'] == 1){
            $part_time_point = bcadd($part_time_point, 40, 2);
        }
        if($post['school_leader'] == 1){
            $part_time_point = bcadd($part_time_point, 60, 2);
        }
        if($post['part_time_magazine'] == 1){
            $part_time_point = bcadd($part_time_point, 12, 2);
        }
        if($post['academic'] == 1){
            $part_time_point = bcadd($part_time_point, 15, 2);
        }
        if($post['education_case'] == 1){
            $part_time_point = bcadd($part_time_point, 7, 2);
        }elseif($post['education_case'] == 2){
            $part_time_point = bcadd($part_time_point, 4, 2);
        }elseif($post['education_case'] == 3){
            $part_time_point = bcadd($part_time_point, 2, 2);
        }elseif($post['education_case'] == 4){
            $part_time_point = bcadd($part_time_point, 11, 2);
        }elseif($post['education_case'] == 5){
            $part_time_point = bcadd($part_time_point, 6, 2);
        }elseif($post['education_case'] == 6){
            $part_time_point = bcadd($part_time_point, 3, 2);
        }
        if($post['education_case2'] == 1){
            $part_time_point = bcadd($part_time_point, 7, 2);
        }elseif($post['education_case2'] == 2){
            $part_time_point = bcadd($part_time_point, 4, 2);
        }elseif($post['education_case2'] == 3){
            $part_time_point = bcadd($part_time_point, 2, 2);
        }elseif($post['education_case2'] == 4){
            $part_time_point = bcadd($part_time_point, 11, 2);
        }elseif($post['education_case2'] == 5){
            $part_time_point = bcadd($part_time_point, 6, 2);
        }elseif($post['education_case2'] == 6){
            $part_time_point = bcadd($part_time_point, 3, 2);
        }
        if($post['paper'] == 1){
            $part_time_point = bcadd($part_time_point, 5, 2);
        }elseif($post['paper'] == 2){
            $part_time_point = bcadd($part_time_point, 10, 2);
        }elseif($post['paper'] == 3){
            $part_time_point = bcadd($part_time_point, 15, 2);
        }elseif($post['paper'] == 4){
            $part_time_point = bcadd($part_time_point, 20, 2);
        }
        if($post['eight_teacher'] == 1){
            $part_time_point = bcadd($part_time_point, 5, 2);
        }
        if($post['league_teacher'] == 1){
            $part_time_point = bcadd($part_time_point, 5, 2);
        }
        if($post['tutor'] == 1){
            $part_time_point = bcadd($part_time_point, 5, 2);
        }
        if($post['woman'] == 1){
            $part_time_point = bcadd($part_time_point, 5, 2);
        }elseif($post['woman'] == 2){
            $part_time_point = bcadd($part_time_point, 4, 2);
        }
        if($post['union'] == 1){
            $part_time_point = bcadd($part_time_point, 5, 2);
        }elseif($post['union'] == 2){
            $part_time_point = bcadd($part_time_point, 4, 2);
        }
        if($post['counselor'] == 1){
            $part_time_point = bcadd($part_time_point, 5, 2);
        }
        if($post['join_festival'] == 1){
            $part_time_point = bcadd($part_time_point, 4, 2);
        }
        //奖励性积点
        $award_point = 0;
        if($post['substitute'] == 1){
            $award_point = bcadd($award_point, bcmul($post['substitute_num'], 0.5, 2), 2);
        } 
        if($post['satisfaction_survey'] == 1){
            $award_point = bcadd($award_point, 5, 2);
        }

        if($post['attendance_award'] == 1){
            $award_point = bcadd($award_point, 20, 2);
        }else{
            $left_attend_point = bcsub(20, $post['attendance_award_num'], 2);
            if($left_attend_point < 0){
                $left_attend_point = 0;
            }
            $award_point = bcadd($award_point, $left_attend_point, 2);
        }

        if($post['school_teacher'] == 1){
            $award_point = bcadd($award_point, 30, 2);
        }

        if($post['finish_goal'] == 1){
            $award_point = bcadd($award_point, 5, 2);
        } 
        if($post['college_num'] > 0){
            $award_point = bcadd($award_point, $post['college_num']*6, 2);
        } 
        if($post['middle_num'] > 0){
            $award_point = bcadd($award_point, $post['middle_num']*10, 2);
        } 
        if($post['super_workload'] > 0){
            $award_point = bcadd($award_point, $post['super_workload']*0.5, 2);
        } 
        if($post['school_class'] > 0){
            $award_point = bcadd($award_point, $post['school_class']*5, 2);
        } 
        if($post['city_class'] > 0){
            $award_point = bcadd($award_point, $post['city_class']*10, 2);
        } 
        if($post['courses'] > 0){
            if($post['courses'] > 2){
                $post['courses'] = 2;
            }
            $award_point = bcadd($award_point, $post['courses']*3, 2);
        } 
        if($post['country_match'] > 0){
            $award_point = bcadd($award_point, $post['country_match']*5, 2);
        } 
        if($post['province_match'] > 0){
            $award_point = bcadd($award_point, $post['province_match']*3, 2);
        } 
        if($post['city_match'] > 0){
            $award_point = bcadd($award_point, $post['city_match']*1, 2);
        } 
        if($post['exam_pro'] == 1){
            $award_point = bcadd($award_point, 3, 2);
        }elseif($post['exam_pro'] == 2){
            $award_point = bcadd($award_point, 2, 2);
        }elseif($post['exam_pro'] == 3){
            $award_point = bcadd($award_point, 1, 2);
        } 
        if($post['exam_rank'] == 1){
            $award_point = bcadd($award_point, 6, 2);
        } 
        if($post['outstand_sub'] == 1){
            $award_point = bcadd($award_point, 2, 2);
        }elseif($post['outstand_sub'] == 2){
            $award_point = bcadd($award_point, 7, 2);
        }
        if($post['select_outstand_school'] == 1){
            $award_point = bcadd($award_point, 5, 2);
        }elseif($post['select_outstand_school'] == 2){
            $award_point = bcadd($award_point, 10, 2);
        }elseif($post['select_outstand_school'] == 3){
            $award_point = bcadd($award_point, 15, 2);
        }elseif($post['select_outstand_school'] == 4){
            $award_point = bcadd($award_point, 20, 2);
        } 
        if($post['select_outstand_year'] == 1){
            $award_point = bcadd($award_point, 5, 2);
        }elseif($post['select_outstand_year'] == 2){
            $award_point = bcadd($award_point, 10, 2);
        }elseif($post['select_outstand_year'] == 3){
            $award_point = bcadd($award_point, 15, 2);
        }elseif($post['select_outstand_year'] == 4){
            $award_point = bcadd($award_point, 20, 2);
        } 
        if($post['select_outstand_person'] == 1){
            $award_point = bcadd($award_point, 5, 2);
        }elseif($post['select_outstand_person'] == 2){
            $award_point = bcadd($award_point, 10, 2);
        }elseif($post['select_outstand_person'] == 3){
            $award_point = bcadd($award_point, 15, 2);
        }elseif($post['select_outstand_person'] == 4){
            $award_point = bcadd($award_point, 20, 2);
        } 
        if($post['expert'] == 1){
            $award_point = bcadd($award_point, 10, 2);
        }elseif($post['expert'] == 2){
            $award_point = bcadd($award_point, 15, 2);
        }elseif($post['expert'] == 3){
            $award_point = bcadd($award_point, 20, 2);
        } 
        //个人资历积点数
        $work_year_month = $this->getMonthNum($post['work_year']);//工龄
        $city_year_month = $this->getMonthNum($post['city_year']);//市龄
        $school_work_days = $this->getMonthNum($post['school_year']);//校龄
        $job_title_month = $this->getMonthNum($post['job_title']);//职称
        if($post['job_title'] == '0000-00-00'){
            $job_title_month = 0;
        }
        $work_year_point = round(0.4 * $work_year_month, 2);
        $city_year_point = round(0.6 * $city_year_month, 2);
        $school_work_days_point = round(0.2 * $school_work_days, 2);
        $job_title_point = round(0.8 * $job_title_month, 2);

        $postgraduate_point = 0;
        if($post['postgraduate'] == 1){
            $postgraduate_point = 9;
        }elseif($post['postgraduate'] == 2){
            $postgraduate_point = 15;
        }
        $person_point = round($work_year_point +  $city_year_point + $school_work_days_point + $job_title_point + $postgraduate_point, 2);
        //var_dump($person_point);
        $total_point = round($base_point + $part_time_point + $award_point + $person_point, 2);
        return array(
            'base_point' => $base_point,
            'part_time_point' => $part_time_point,
            'award_point' => $award_point,
            'person_point' => $person_point,
            'total_point' => $total_point,
        );
    }
}