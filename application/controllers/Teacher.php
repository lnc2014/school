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
        $this->data['teacher_point']= $this->M_sch_point->get_list(array('id' => $_SESSION['teacher_id']));
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
        $this->data['teacher'] = $this->Teacher_sch->get_one(array('teacher_id' => $_SESSION['teacher_id']));
        $this->load->view('teacher_input_point', $this->data);
    }
    //修改教师录入的积点
    public function edit_point(){
        $point_id = $this->input->get('point_id', true);
        if(empty($point_id)){
            show_error('/school/home', 500,'积点ID不能为空!');
        }
        $this->load->model('M_sch_point');
        $teacher_point = $this->M_sch_point->get_one(array('teacher_id' => $_SESSION['teacher_id'], 'id' => $point_id));
        if(empty($teacher_point)){
            show_error('/school/home', 500,'非法请求');
        }
        $this->data['teacher_point'] = $teacher_point;
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
        $today_month = date('Y-09', time());
        $today_work = date('Y-09-01', time());
        $work_year_month = $this->getMonthNum($today_month, $post['work_year']);
        $city_year_month = $this->getMonthNum($today_work, $post['city_year']);
        $school_work_days = $this->diffBetweenTwoDays($today_work, $post['city_year']);
        $job_title_month = $this->getMonthNum($today_month, $post['job_title']);

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
        $total_point = round($post['base_point'] + $post['part_time_point'] + $post['award_point'] + $person_point, 2);

        $post['teacher_id'] = $_SESSION['teacher_id'];
        $post['total_point'] = $total_point;
        $post['person_point'] = $person_point;
        $post['year'] = $system_year['year'];
        $post['status'] = 1;//1为待审核，2为教务处审核中，3办公室审核中，4评审委员会审核中，5校长是否公布，6已完成
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
     * 获取当两个日期相差的月数
     * @param $date1
     * @param $date2
     * @return number
     */
    private function getMonthNum($date1,$date2){
        $date1_stamp=strtotime($date1);
        $date2_stamp=strtotime($date2);
        if ($date1 < $date2) {
            $tmp = $date2;
            $date2 = $date1;
            $date1 = $tmp;
        }
        list($date_1['y'],$date_1['m']) = explode("-",date('Y-m',$date1_stamp));
        list($date_2['y'],$date_2['m']) = explode("-",date('Y-m',$date2_stamp));
        return abs($date_1['y']-$date_2['y'])*12 +$date_2['m']-$date_1['m'];
    }
    /**
     * 求两个日期之间相差的天数
     * (针对1970年1月1日之后，求之前可以采用泰勒公式)
     * @param string $day1
     * @param string $day2
     * @return number
     */
    private  function diffBetweenTwoDays($day1, $day2) {
        $second1 = strtotime($day1);
        $second2 = strtotime($day2);
        if ($second1 < $second2) {
            $tmp = $second2;
            $second2 = $second1;
            $second1 = $tmp;
        }
        return ($second1 - $second2) / 86400;
    }
}