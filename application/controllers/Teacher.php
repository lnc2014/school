<?php
/**
 * Description：教师管理控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class Teacher extends BaseController{
    private $data;
    /**
     * 教师个人信息
     */
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
        $this->load->view('teacher_index');
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
        $teacher_point = $this->M_sch_point->get_one(array('teacher_id' => $_SESSION['teacher_id']));
        $this->data['is_fill_point'] = 0;//是不是已经填写本年度的积点,默认为没有填写
        if(!empty($teacher_point)){
            //TODO 填写了积点要通过算法计算其积点的排名
            $this->data['is_fill_point'] = 1;
        }
        $this->load->view('teacher_input_index', $this->data);
    }

    /**
     * 教师录入积点的页面，还要是录入年度
     */
    public function input_point(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->load->view('teacher_input_point');
    }

}