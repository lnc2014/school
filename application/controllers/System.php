<?php
/**
 * Description：系统设置控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class System extends BaseController{
    private $data;
    public function __construct()
    {
        parent::__construct();
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
    }
    /**
     * 系统设置首页
     */
    public function index(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $search_data = $this->input->get('search_data', true);
        $where = "";
        if(!empty($search_data)){
            $where = $where."and (a.`user_name` LIKE '%".$search_data."%' OR a.account LIKE '%".$search_data."%' OR t.name LIKE '%".$search_data."%' OR t.mobile LIKE '%".$search_data."%')";
        }
        $where = trim($where, 'and');
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
        $this->load->model('Admin');
        $teacher_list = $this->Admin->find_all_teacher($limit, $offset, $where);
        $final_teacher = count($teacher_list);
        $all_teachers = $this->Admin->find_all_teacher();
        $this->data['all_teachers'] = count($all_teachers);//总记录
        $this->data['pages']  = ceil($this->data['all_teachers']/$page_size);//前台展示的页数
        $this->data['teacher_list']  = $teacher_list;
        $this->data['current_page']  = $page;
        $this->data['search_data']  = $search_data;
        $this->data['title'] = '系统设置';
        $this->load->view('system_index', $this->data);
    }
    /**
     * 新增教师
     */
    public function add_teacher($teacher_id = ''){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->data['title'] = '新增账号';
        $teacher = array();
        $this->data['is_update'] = 0;
        if(!empty($teacher_id)){
            $this->load->model('Teacher_sch');
            $teacher = $this->Teacher_sch->get_one(array('teacher_id' => $teacher_id));
            $this->data['is_update'] = $teacher_id;
        }
        $this->data['teacher'] = $teacher;
        $this->load->view('system_add_teacher', $this->data);
    }
    //保存新增教师信息
    public function save_teacher_info(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $post = $this->input->post(null , true);
        if(empty($post)){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        if(!empty($post['is_update'])){//修改
            $teacher_id = $post['is_update'];
            unset($post['is_update']);
            $this->load->model('Teacher_sch');
            $admin_data['user_name'] = $post['name'];
            $admin_data['account'] = $post['mobile'];
            $this->load->model('Admin');
            $update = $this->Teacher_sch->update($post, array('teacher_id' => $teacher_id));
            $this->Admin->update($admin_data, array('teacher_id' => $teacher_id));
            if($update){
                echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
                return;
            }else{
                echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
                return;
            }
        }elseif(empty($post['is_update'])){//增加
            unset($post['is_update']);
            $post['point'] = 0;
            $post['create_time'] = date('Y-m-d H:i:s', time());
            $this->load->model('Admin');
            $this->load->model('Teacher_sch');
            $teacher_id = $this->Teacher_sch->add($post);

            if($teacher_id > 0){
                $admin_data['teacher_id'] = $teacher_id;
                $admin_data['user_name'] = $post['name'];
                $admin_data['account'] = $post['mobile'];
                $admin_data['psw'] = md5($post['mobile']);
                $admin_data['flag'] = 1;
                $admin_data['auth'] = 1;
                $admin_data['create_time'] = date('Y-m-d H:i:s', time());
                $admin_id = $this->Admin->add($admin_data);
                if($admin_id > 0){
                    echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
                    return;
                }else{
                    echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
                    return;
                }
            }else{
                echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
                return;
            }
        }
    }
    //删除教师信息
    public function del_teacher(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $teacher_id = $this->input->post('teacher_id' , true);
        if(empty($teacher_id)){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        $this->load->model('Admin');
        $this->load->model('Teacher_sch');
        $this->Admin->del_data(array('teacher_id' => $teacher_id));
        $del = $this->Teacher_sch->del_data(array('teacher_id' => $teacher_id));
        if($del){
            echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
            return;
        }else{
            echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
            return;
        }
    }
    //积点列表
    public function point(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->load->model('M_sch_system_point');
        $this->data['point_list'] = $this->M_sch_system_point->get_list();
        $this->load->view('system_point', $this->data);
    }
    //增加年度积分
    public function add_point($point_id = ''){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->data['title'] = '新增账号';
        $point = array();
        $this->data['is_update'] = 0;
        if(!empty($point_id)) {
            $this->load->model('M_sch_system_point');
            $point = $this->M_sch_system_point->get_one(array('id' => $point_id));
            $this->data['is_update'] = $point_id;
        }
        $this->data['point'] = $point;
        $this->load->view('system_add_point', $this->data);
    }

    /**
     * 增加年度积分到db
     */
    public function add_point_by_ajax(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $post = $this->input->post(null , true);
        if(empty($post)){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        if(!empty($post['is_update'])){//修改
            $point_id = $post['is_update'];
            unset($post['is_update']);
            $this->load->model('M_sch_system_point');
            $is_new_point = $this->M_sch_system_point->get_one(array('year' => $post['year']));
            if(!empty($is_new_point)){
                echo $this->apiReturn('0301', new stdClass(), $this->response_msg["0301"]);
                return;
            }
            $update = $this->M_sch_system_point->update($post, array('id' => $point_id));
            if($update){
                echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
                return;
            }else{
                echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
                return;
            }
        }elseif(empty($post['is_update'])){//增加
            unset($post['is_update']);
            $post['status'] = 1;
            $post['create_time'] = date('Y-m-d H:i:s', time());
            $this->load->model('M_sch_system_point');
            $is_new_point = $this->M_sch_system_point->get_one(array('year' => $post['year']));
            if(!empty($is_new_point)){
                echo $this->apiReturn('0301', new stdClass(), $this->response_msg["0301"]);
                return;
            }
            $point_id = $this->M_sch_system_point->add($post);
            if($point_id > 0){
                echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
                return;
            }else{
                echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
                return;
            }
        }
    }
    //操作年度积分
    public function operate(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $point_id = $this->input->post('point_id' , true);
        $status = $this->input->post('status' , true);
        if(empty($point_id)){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        $this->load->model('M_sch_system_point');
        $system_point = $this->M_sch_system_point->get_one(array('id' => $point_id));
        if(empty($system_point)){
            echo $this->apiReturn('0300', new stdClass(), $this->response_msg["0300"]);
            return;
        }
        //做一个检验，年度里面只允许开启一个
        $all_system_setting = $this->M_sch_system_point->get_list(array('status' => 1));
        if(count($all_system_setting) >= 1 && $status != 0){
            echo $this->apiReturn('0302', new stdClass(), $this->response_msg["0302"]);
            return;
        }
        //如果是一样的话，就不用修改
        if($status == $system_point['status']){
            echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
            return;
        }
        $update = $this->M_sch_system_point->update(array('status' => $status), array('id' => $point_id));
        if($update){
            echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
            return;
        }else{
            echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
            return;
        }
    }


}