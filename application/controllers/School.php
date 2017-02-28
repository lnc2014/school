<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class School
 * 绩效考核系统基础类
 */
include_once "BaseController.php";
class School extends BaseController {


	public function index()
	{
		redirect('school/home');
	}
	/**
	 * 登录
	 */
	public function login(){
		$this->data['title'] = '欢迎登录深圳第二外国语学校绩效考核系统';
		$this->load->view('login', $this->data);
	}
	//登录验证
	public function login_check(){
		$username = $this->input->post('username');
		$psw = $this->input->post('psw');
		if(empty($username) || empty($psw)){
			echo $this->apiReturn("0000", new stdClass(), $this->response_msg["0003"]);
			return;
		}
		$psw = md5($psw);//使用md5加密
		$this->load->model('Admin');
		$this->load->model('Teacher_sch');
		$admin = $this->Admin->get_one(array('account' => $username, 'psw' => $psw));
		if(empty($admin)){
			echo $this->apiReturn('0010', new stdClass(), $this->response_msg["0010"]);
			return;
		}
		//超级管理校验
		if(empty($admin['teacher_id']) && $admin['auth'] != 2){
			echo $this->apiReturn('0004', new stdClass(), $this->response_msg["0004"]);
			return;
		}
		if(!empty($admin['teacher_id'])){
			$teacher_info = $this->Teacher_sch->get_one(array('teacher_id' => $admin['teacher_id']));
			if(empty($teacher_info)){
				echo $this->apiReturn('0004', new stdClass(), $this->response_msg["0004"]);
				return;
			}
			$_SESSION['department'] = $teacher_info['department'];//老师的部门，用于后台页面的显示问题
			$_SESSION['is_admin'] = $teacher_info['is_admin'];
			$_SESSION['point'] = $teacher_info['point'];
			$_SESSION['name'] = $teacher_info['name'];
			if($teacher_info['is_admin'] == 1){
				$_SESSION['name'] = $teacher_info['name'].'主任';
			}
			if($teacher_info['department'] == 5){
				$_SESSION['name'] = $teacher_info['name'].'校长';
			}
			$_SESSION['teacher_id'] = $teacher_info['teacher_id'];
		}
		//登录成功将id存入session
		$_SESSION['account'] = $admin['account'];
		$_SESSION['auth'] = $admin['auth'];
		echo $this->apiReturn('0000', new stdClass(), $this->response_msg["0000"]);
		return;
	}
	/**
	 * 主页
	 */
	public function home(){
		//检验是不是登录
		if(!$this->check_login()){
			redirect('school/login');
		}

		$this->data['title'] = '深圳市第二外国语学校绩效考核系统';
		$this->load->view('home', $this->data);
	}
	//后台首页头部
	public function top(){
		//检验是不是登录
		if(!$this->check_login()){
			redirect('school/login');
		}
		$this->data['title'] = '深圳市第二外国语学校绩效考核系统';
		$this->load->view('common/top', $this->data);
	}
	//后台首页左边
	/**
	 * 菜单栏设置：教师、教务处、办公室、评审委员会、校长、超级管理员
	 * 教师：
	 */
	public function left(){
		//检验是不是登录
		if(!$this->check_login()){
			redirect('school/login');
		}
		$this->data['title'] = '深圳市第二外国语学校绩效考核系统';
		$this->load->view('common/left', $this->data);
	}
	//后台首页主要内容
	public function main(){
		if(!$this->check_login()){
			redirect('school/login');
		}
		$this->data['title'] = '深圳市第二外国语学校绩效考核系统';
		if($_SESSION['auth'] == 1 && $_SESSION['department'] == 1){
			redirect('teacher/index');
		}
		//教务处
		if($_SESSION['auth'] == 1 && $_SESSION['department'] == 2){
			redirect('academic/index');
		}
		//办公室
		if($_SESSION['auth'] == 1 && $_SESSION['department'] == 3){
			redirect('office/index');
		}
		//评审委员会
		if($_SESSION['auth'] == 1 && $_SESSION['department'] == 4){
			redirect('committee/index');
		}
		//校长
		if($_SESSION['auth'] == 1 && $_SESSION['department'] == 5){
			redirect('schoolmaster/index');
		}
		if($_SESSION['auth'] == 2){
			redirect('system/index');
		}
	}

	/**
	 * 上传通用类
	 */
	public function upload(){
		$this->load->library('upload_image');
		$ret = $this->upload_image->upload('file');
		if($ret['is_success']){
			$ret['path2'] = str_replace(ROOTPATH, '', $ret['path']);//将路径换成相对路径
			$ret['path'] = 'http://'.$_SERVER['HTTP_HOST'].'/'.$ret['path2'];//将路径换成相对路径
			echo $this->apiReturn('0000', $ret, 'success');
			return;
		}
		echo $this->apiReturn('0002', $ret, '上传失败');
		return;
	}
	/**
	 * 退出登录
	 */
	public function login_out(){
		session_unset();
		if(session_destroy()){
			redirect('school/login');
		}
	}
	/**
	 * 修改密码
	 */
	public function change_psw(){
		//检验是不是登录
		if(!$this->check_login()){
			redirect('school/login');
		}
		$this->data['title'] = '修改密码';
		$this->load->view('change_psw_home', $this->data);
	}
	public function change_psw2(){
		//检验是不是登录
		if(!$this->check_login()){
			redirect('school/login');
		}
		$this->data['title'] = '修改密码';
		$this->load->view('change_psw', $this->data);
	}
	public function save_psw(){
		//检验是不是登录
		if(!$this->check_login()){
			redirect('school/login');
		}
		$old_psw = $this->input->post('old_psw');
		$new_psw = $this->input->post('new_psw');
		$new_psw2= $this->input->post('new_psw2');
		if(empty($old_psw) || empty($new_psw) || empty($new_psw2)){
			echo $this->apiReturn("0003", new stdClass(), '密码不能为空');
			return;
		}
		if($new_psw2 != $new_psw){
			echo $this->apiReturn("0002", new stdClass(), '两次密码不一致');
			return;
		}
		$this->load->model('Admin');
		if(empty($_SESSION['teacher_id'])){//超级管理员修改密码
			$_SESSION['teacher_id'] = 0;
		}
		$admin = $this->Admin->get_one(array('teacher_id' => $_SESSION['teacher_id']));
		if(empty($admin) || $admin['psw'] != md5($old_psw)){
			echo $this->apiReturn("0002", new stdClass(), '旧密码不正确');
			return;
		}
		$update = $this->Admin->update(array('psw' => md5($new_psw)), array('teacher_id' => $_SESSION['teacher_id']));
		if($update){
			echo $this->apiReturn("0000", new stdClass(), '修改成功');
			return;
		}else{
			echo $this->apiReturn("0002", new stdClass(), '修改失败');
			return;
		}
	}
}
