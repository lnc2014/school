<?php
/**
 * Description：教务处管理控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class Academic extends BaseController{

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
        $this->data['title'] = '教务处审核首页';
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
        $this->data['first_teacher_check'] = $this->M_sch_point->get_all_point(3, $year, $limit, $offset);
        $all_point = $this->M_sch_point->get_all_point(3, $year);
        $this->data['all_pages'] = count($all_point);
        $this->data['current_page'] = $page;
        $this->data['pages'] = ceil($this->data['all_pages']/$page_size);
        $this->load->view('academic_index', $this->data);
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
        $ponit_info = $this->M_sch_point->get_one(array('id' => $ponit_id),'teacher_id, status, year');
        if(empty($ponit_info)){
            echo $this->apiReturn('0200', new stdClass(), $this->response_msg["0200"]);
            return;
        }
        $status = 4;
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
                    'refuse_status' => 3,
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
        $this->load->model('Teacher_sch');
        $this->data['teacher'] = $this->Teacher_sch->get_one(array('teacher_id' => $teacher_point['teacher_id']), 'name');
        $this->data['teacher_point'] = $teacher_point;
        $this->data['title'] = '修改积点';
        $this->load->view('academic_show_teacher_point', $this->data);
    }
    /**
     *  添加教师绩效得分
     */
    public function add_performance_point($teacher_id){
        if(empty($teacher_id)){
            show_error('academic/index', 500,'非法操作');
        }
        //教师ID数据校验
        $this->load->model('Teacher_sch');
        $this->load->model('M_sch_per_teacher');
        $is_exit_teacher = $this->Teacher_sch->get_one(array('teacher_id' => $teacher_id), 'name');
        if(empty($is_exit_teacher)){
            show_error('academic/index', 500,'非法操作');
        }
        $per_point_list = $this->M_sch_per_teacher->get_list(array('teacher_id' => $teacher_id, 'year' => $this->data['year']));
        if(!empty($per_point_list)){
            $this->data['is_update'] = 1;
        }
        $this->data['per_point_list'] = $per_point_list;
        $this->data['title'] = '修改积点';
        $this->data['teacher_id'] = $teacher_id;
        $this->load->model('M_sch_teaching_performance');
        //第一类教学绩效
        $this->data['teaching_per'] = $this->M_sch_teaching_performance->get_all_per_type(1, $this->data['year']);
        $this->data['profession'] = $this->M_sch_teaching_performance->get_all_per_type(2, $this->data['year']);
        $this->data['education'] = $this->M_sch_teaching_performance->get_all_per_type(3, $this->data['year']);
        $this->load->view('add_performance_point', $this->data);
    }
    //将积点添加到数据库
    public function add_per_point(){
        $teacher_id = $this->input->get('teacher_id', true);
        $is_update = $this->input->get('is_update', true);

        $post = $this->input->post(NULL, true);
        if(empty($post)){
            show_error('academic/index', 500,'数据传递不正确');
        }
        if(empty($teacher_id)){
            show_error('academic/index', 500,'非法操作');
        }
        $this->load->model('Teacher_sch');
        //教师ID数据校验
        $is_exit_teacher = $this->Teacher_sch->get_one(array('teacher_id' => $teacher_id), 'name');
        if(empty($is_exit_teacher)){
            show_error('academic/index', 500,'非法操作');
        }

        $this->load->model('M_sch_per_teacher');
        $this->load->model('M_sch_teaching_performance');
        $this->load->model('M_sch_point');
        if(!empty($is_update) && $is_update == 1){ //修改不需要校验
            $this->M_sch_per_teacher->delete(array('year' => $this->data['year'], 'teacher_id' => $teacher_id)); //删除之前的
        }
        $per_point = 0;
        while (list($key, $val) = each($post))
        {
            if(is_numeric(strpos($key, 'is_'))){
                $add_data['answer'] = $val;
            }else{
                $question = $this->M_sch_teaching_performance->get_one(array('alias' => $key), '');
                $point = 0;
                if($add_data['answer'] == 1){
                    $point = $question['point'];
                }
                $per_point = bcadd($per_point, $point);
                $add_data['get_point'] = $point;
                $add_data['teacher_id'] = $teacher_id;
                $add_data['check_id'] = $_SESSION['teacher_id'];
                $add_data['explain'] = $val;
                $add_data['per_id'] = $key;
                $add_data['year'] = $this->data['year'];
                $add_data['create_time'] = date('Y-m-d H:i:s', time());
                $this->M_sch_per_teacher->add($add_data);
            }
        }
        //更新积分表
        $teacher_point = $this->M_sch_point->get_one(array('teacher_id' => $teacher_id, 'year' => $this->data['year']),'total_point,per_point,all_point');

        $data['per_point'] = $per_point;
        $data['all_point'] = bcadd(round(0.8*$teacher_point['total_point']), round(0.2*$per_point));
        $this->M_sch_point->update($data, array('teacher_id' => $teacher_id, 'year' => $this->data['year']));
        echo '<script>alert("添加成功");window.location = "/index.php/academic/index"</script>';
    }
}