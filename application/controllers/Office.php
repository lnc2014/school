<?php
/**
 * Description：教务处管理控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class Office extends BaseController{
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
     * 办公室审核首页
     * 展示办公室应该要审核的教师。办公室审核第二步【等到所有的记录提交过来就可以进行审核】
     */
    public function index(){
        $this->data['title'] = '办公室审核首页';
        $this->load->model('M_sch_point');
        $year = $this->get_fill_point_year();
        $this->data['teacher_check'] = $this->M_sch_point->get_list(array('year' => $year, 'status' => 3));
        $this->load->view('office_index', $this->data);
    }
    //审核通过
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
        $update = $this->M_sch_point->update(array('status' => 4), array(
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

}