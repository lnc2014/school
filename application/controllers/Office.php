<?php
/**
 * Description：教务处管理控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class Office extends BaseController{
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
     * 办公室审核首页
     * 展示办公室应该要审核的教师。办公室审核第一步【等到所有的记录提交过来就可以进行审核】
     */
    public function index(){
        $this->data['title'] = '办公室审核首页';
        $this->load->model('M_sch_point');
        $year = $this->get_fill_point_year();
        $page = $this->input->get('page', true);
        if(empty($page)){
            $page = 1;
        }
        $page_size = 2;//每页十条记录
        if(empty($page) || $page == 1){
            $page = 1;
            $limit = $page_size;
            $offset = 0;
        }else{
            $limit = $page_size;
            $offset =  ($page-1)*$page_size;
        }
        //1为待审核，2办公室审核中，3教务处审核中，4科研处审核中，5学生处审核中，6已完成',
        $this->data['teacher_check'] = $this->M_sch_point->get_all_point(2, $year, $limit, $offset);
        $all_point = $this->M_sch_point->get_all_point(2, $year);
        $this->data['all_pages'] = count($all_point);
        $this->data['current_page'] = $page;
        $this->data['pages'] = ceil($this->data['all_pages']/$page_size);
        $this->load->view('office_index', $this->data);
    }
    //审核通过
    public function submit_check(){
        $ponit_id = $this->input->post('ponit_id', true);
        $no_pass = $this->input->post('no_pass', true);
        $refuse_reason = $this->input->post('refuse_reason', true);
        $status = 3;
        if($no_pass == 1){
            $status = 1;
        }
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
        $update = $this->M_sch_point->update(array('status' => $status), array(
            'id' => $ponit_id
        ));
        if($update){
            if($no_pass == 1){
                $this->load->model('M_sch_point_check');
                $check_data = array(
                    'point_id' => $ponit_id,
                    'reason' => $refuse_reason,
                    'refuse_status' => 2,
                    'create_time' => date('Y-m-d H:i:s'),
                    'update_time' => date('Y-m-d H:i:s'),
                );
                $this->M_sch_point_check->add($check_data);
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
        $this->data['teacher_point'] = $teacher_point;
        $this->data['title'] = '修改积点';
        $this->load->view('office_show_teacher_point', $this->data);
    }

}