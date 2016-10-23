<?php
/**
 * Description：校长管理控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class SchoolMaster extends BaseController{
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
     *校长首页，必须等到所有的教师审核完成之后才能发布
     *
     */
    public function index(){
        $this->data['title'] = '校长审核首页';
        $this->load->model('M_sch_point');
        $year = $this->get_fill_point_year();
        $page = $this->input->get('page', true);
        if(empty($page)){
            $page = 1;
        }
        $page_size = 200;//每页十条记录
        if(empty($page) || $page == 1){
            $page = 1;
            $limit = $page_size;
            $offset = 0;
        }else{
            $limit = $page_size;
            $offset =  ($page-1)*$page_size;
        }
//        $this->data['first_teacher_check'] = $this->M_sch_point->get_list(array('year' => $year, 'status' => 5), '*', $limit, $offset);
        $this->data['first_teacher_check'] = $this->M_sch_point->get_all_teacher_rank($limit, $offset, $year);
        $all_teacher = $this->M_sch_point->get_list(array('year' => $year, 'status' => 5));
        $this->data['all_teacher'] = count($all_teacher);
        $this->data['current_page'] = $page;
        $this->data['pages'] = ceil(count($all_teacher)/$page_size);

        $this->load->view('schoolmaster_index', $this->data);
    }
    //发布本年度考核
    public function rank(){
        $year = $this->get_fill_point_year();
        $this->load->model('M_sch_point');
        $this->load->model('M_sch_system_point');
        $update = $this->M_sch_point->update(array('status' => 6), array(
            'year' => $year
        ));
        $this->M_sch_system_point->update(array(
            'is_public' => 1
        ),array(
            'year' => $year
        ));
        if($update){
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
        $this->data['teacher_point'] = $teacher_point;
        $this->data['title'] = '修改积点';
        $this->load->view('schoolmaster_show_teacher_point', $this->data);
    }

}