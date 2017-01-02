<?php
/**
 * Description：系统设置控制器
 * Author: LNC
 * Date: 2016/9/22
 * Time: 21:52
 */
include_once "BaseController.php";
class System extends BaseController{
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
        $this->data['excel_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/upload/excel/批量导入模板.xls';
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

    /**
     * 增加权限页面
     */
    public function add_permissions($teacher_id){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->data['title'] = '增加权限';
        $this->data['teacher_id'] = $teacher_id;
        $this->load->view('system_add_permission', $this->data);
    }
    public function save_permission_info(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $post = $this->input->post(null , true);
        if(empty($post)){
            echo $this->apiReturn('0003', new stdClass(), $this->response_msg["0003"]);
            return;
        }
        $teacher_id = $post['teacher_id'];
        $this->load->model('Teacher_sch');
        $department = trim($post['permission'], ',');
        $update = $this->Teacher_sch->update(array('department' => $department), array('teacher_id' => $teacher_id));
        if($update){
            echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
            return;
        }else{
            echo $this->apiReturn('0002', new stdClass(), $this->response_msg["0002"]);
            return;
        }
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

    //增加年度积分
    public function change_psw($teacher_id = ''){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->data['teacher_id'] = $teacher_id;
        $this->load->view('system_change_psw', $this->data);
    }

    /**
     *  保存新密码
     */
    public function save_sys_psw(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $psw = $this->input->post('psw');
        $teacher_id = $this->input->post('teacher_id');
        if(empty($psw) || empty($teacher_id)){
            echo $this->apiReturn("0003", new stdClass(), '非法操作');
            return;
        }
        $this->load->model('Admin');
        $update = $this->Admin->update(array('psw' => md5($psw)), array('teacher_id' => $teacher_id));
        if($update){
            echo $this->apiReturn("0000", new stdClass(), '修改成功');
            return;
        }else{
            echo $this->apiReturn("0002", new stdClass(), '修改失败');
            return;
        }
    }

    /**
     * 批量导入
     */
    public function add_batch_data(){
        $file_path = $this->check_excel($_FILES);
        //加载工厂类
        include_once(APPPATH."libraries/PHPExcel/IOFactory.php");
        /** 用IOFactory的load方法得到excel操作对象  **/
        $objPHPExcel = PHPExcel_IOFactory::load($file_path);
        //得到当前活动表格，调用toArray方法，得到表格的二维数组
        $sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        unlink($file_path);
        $this->load->model('Admin');
        $this->load->model('Teacher_sch');
        //插入数据库
        foreach ($sheet as $k => $value) {
            if($k == 1 || $k == 2){
                continue;
            }
            //需要导入的教师的信息
            $teacher_data['level'] = $value['B'];
            $teacher_data['name'] = $value['C'];
            $teacher_data['sex'] = ($value['D'] == '男')?1:2;
            $teacher_data['teacher_status'] = ($value['E'] == '在职')?1:0;
            $teacher_data['born'] = $value['F'];
            if($value['G'] == '大学本科'){
                $teacher_data['education'] = 1;
            }elseif($value['G'] == '研究生'){
                $teacher_data['education'] = 2;
            }elseif($value['G'] == '硕士研究生'){
                $teacher_data['education'] = 3;
            }
            $teacher_data['now_level_info'] = $value['H'];
            $teacher_data['now_level'] = $value['I'];
            $teacher_data['work_start_time'] = $value['J'];
            $teacher_data['now_work_duty'] = $value['K'];
            $teacher_data['now_work_time'] = $value['L'];
            $teacher_data['now_work_level'] = $value['M'];
            $teacher_data['work_time'] = $value['N'];
            $teacher_data['work_year'] = $value['O'];
            $teacher_data['school_work_time'] = $value['P'];
            $teacher_data['school_work_year'] = $value['Q'];
            $teacher_data['er_school_time'] = $value['R'];
            $teacher_data['er_school_year'] = $value['S'];
            $teacher_data['qua_time'] = $value['T'];
            $teacher_data['qua_year'] = $value['U'];
            $teacher_data['qua_name'] = $value['V'];
            $teacher_data['point'] = 0;
            $teacher_data['create_time'] = date('Y-m-d H:i:s', time());
            $teacher_id = $this->Teacher_sch->add($teacher_data);
            //中文转拼音
            $this->load->library('pinyin/Pinyin');
            $teacher_name = strtolower($this->pinyin->ChineseToPinyin($value['C']));
            //添加后台登录账号
            $admin_data['teacher_id'] = $teacher_id;
            $admin_data['user_name'] = $value['C'];
            $admin_data['account'] = $teacher_name;
            $admin_data['psw'] = md5($teacher_name);
            $admin_data['flag'] = 1;
            $admin_data['auth'] = 1;
            $admin_data['create_time'] = date('Y-m-d H:i:s', time());
            $this->Admin->add($admin_data);
        }
        echo $this->apiReturn('0000', '', $this->response_msg['0000']);
        return;
    }
    public function check_excel($files)
    {
        $tmp_file = $files['file']['tmp_name'];
        $file_types = explode(".", $files ['file'] ['name']);
        $file_type = $file_types [count($file_types) - 1];
        /*判别是不是.xls文件，判别是不是excel文件*/
        if (!in_array(strtolower($file_type), array('xls', 'xlsx'))) {
            echo $this->apiReturn('9001', '', "不是EXCEL格式文件，请重新上传");
            exit();
        }
        /*设置上传路径*/
        $savePath = FCPATH . '/upload/excel/';
        if (!is_dir($savePath)) {
            mkdir($savePath);
        }
        /*以时间来命名上传的文件*/
        $str = date('YmdHis');
        $file_name = "excel_name_" . $str . "." . $file_type;
        $file_path = $savePath . $file_name;
        /*是否上传成功*/
        $ret = move_uploaded_file($tmp_file, $file_path);
        if (!$ret) {
            echo $this->apiReturn('9002', '', "文件上传失败");
            exit();
        }
        return $file_path;
    }
    /**
     * 打包下载
     */
    public function teacher_download(){
        //检验是不是登录
        if(!$this->check_login()){
            redirect('school/login');
        }
        $this->load->model('M_sch_system_point');
        $this->data['point_list'] = $this->M_sch_system_point->get_list();
        $this->load->view('system_download', $this->data);
    }
    public function download($year){
        //获取列表
        $save_path = ROOTPATH.'teacher'.'/'.$year.'/';
        $datalist = $this->list_dir($save_path);
        $zip_path = ROOTPATH.'teacher'.'/zip/'.$year.'.zip';
        $filename = $zip_path; //最终生成的文件名（含路径）
        if(!file_exists($filename)){
        //重新生成文件
            $zip = new ZipArchive();//使用本类，linux需开启zlib，windows需取消php_zip.dll前的注释
            if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
                exit('无法打开文件，或者文件创建失败');
            }
            foreach( $datalist as $val){
                if(file_exists($val)){
                    $zip->addFile( $val, basename($val));//第二个参数是放在压缩包中的文件名称，如果文件可能会有重复，就需要注意一下
                }
            }
            $zip->close();//关闭
        }
        if(!file_exists($filename)){
            exit("无法找到文件"); //即使创建，仍有可能失败。。。。
        }
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header('Content-disposition: attachment; filename='.basename($filename)); //文件名
        header("Content-Type: application/zip"); //zip格式的
        header("Content-Transfer-Encoding: binary"); //告诉浏览器，这是二进制文件
        header('Content-Length: '. filesize($filename)); //告诉浏览器，文件大小
        @readfile($filename);
    }
    //获取文件列表
    private function list_dir($dir){
        $result = array();
        if (is_dir($dir)){
            $file_dir = scandir($dir);
            foreach($file_dir as $file){
                if ($file == '.' || $file == '..'){
                    continue;
                }
                elseif (is_dir($dir.$file)){
                    $result = array_merge($result, $this->list_dir($dir.$file.'/'));
                }
                else{
                    array_push($result, $dir.$file);
                }
            }
        }
        return $result;
    }


}