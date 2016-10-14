<?php
/**
 * Description：教务处管理控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class Academic extends BaseController{
    private $data;
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
     */
    public function index(){
        $this->data['title'] = '教务处审核首页';
        $this->load->model('M_sch_point');
        $this->load->model('M_sch_point_teacher');
        $teacher_point = $this->M_sch_point->get_list(array('year' => 2016));
        $teacher_total_point = $this->M_sch_point_teacher->get_list(array('year' => 2016));
        $this->load->view('academic_index');
    }

}