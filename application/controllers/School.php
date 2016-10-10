<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class School
 * 绩效考核系统基础类
 */
include_once "BaseController.php";
class School extends BaseController {

	private $data;

	public function index()
	{
		$this->load->view('welcome_message');
	}
	/**
	 * 登录
	 */
	public function login(){
		$this->data['title'] = '欢迎登录深圳市第二外国语学校绩效考核系统';
		$this->load->view('login', $this->data);
	}
	//登录验证
	public function login_check(){
		$username = $this->input->post('username');
		$psw = $this->input->post('psw');
		if(empty($username) || empty($psw)){
			echo $this->api_return("0000", new stdClass(), $this->response_msg["0003"]);
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
			$this->load->view('teacher_index', $this->data);
		}
		if($_SESSION['auth'] == 2){
			$this->load->view('system_index', $this->data);
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
		if(session_destroy()){
			redirect('school/login');
		}
	}
}
