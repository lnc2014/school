<?php
/**
 * Description：评审委员会管理控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class Committee extends BaseController{
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
     * 评审委员会首页
     * 展示评审委员会应该要审核的教师。积点审核第三步【等到所有的记录提交过来就可以进行审核】
     */
    public function index(){
        $this->data['title'] = '评审委员会审核首页';
        $this->load->model('M_sch_point');
        $year = $this->get_fill_point_year();
        $this->data['first_teacher_check'] = $this->M_sch_point->get_list(array('year' => $year, 'status' => 4));
        $this->load->view('committee_index', $this->data);
    }
    //审核通过
    public function submit_check(){
        $ponit_id = $this->input->post('ponit_id', true);
        $no_pass = $this->input->post('no_pass', true);
        $status = 5;
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
        $this->load->view('committee_show_teacher_point', $this->data);
    }
}