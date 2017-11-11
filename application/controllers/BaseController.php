<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  基础类
 */
class BaseController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		header("Content-type:text/html;charset=utf-8");
		session_start();
		date_default_timezone_set('PRC'); //设置中国时区
		$this->config->load('common/config_response', TRUE); //统一返回状态码loading
		$this->load->helper('url');
		$this->response_msg = $this->config->item('response', 'common/config_response');
		$this->data['year'] = $this->get_fill_point_year();
	}

	/**
	 * 接口api统一结果处理
	 * @param $result
	 * @param $data
	 * @param $info
	 * @return string
	 */
	public function apiReturn($result, $data, $info)
	{
		$arr["result"] = $result;
		$arr["data"] = $data === null ? '' : $data;
		$arr["info"] = $info;
		$res = json_encode($arr);
		return $res;
	}

	/**
	 * 检测是不是已经登录
	 */
	public function check_login(){
		//检测用户是否已经登录授权过
		if(isset($_SESSION['account']) && isset($_SESSION['auth'])){
			if($_SESSION['auth'] == 2 && empty($_SESSION['teacher_id'])){//如果是超级管理员就不用检测
				return true;
			}else if(isset($_SESSION['department']) && isset($_SESSION['is_admin'])&& isset($_SESSION['teacher_id']) && $_SESSION['auth'] == 1){
				return true;
			}
		}
		return false;
	}
	/**
	 * 错误信息
	 * @param $code
	 * @param $msg
	 */
	public function error($code, $msg){
		$this->load->view('error', array(
			'error_code' => $code,
			'error_msg' => $msg,
		));
	}
	//查找可以填写积点的年份
	public function get_fill_point_year(){
		$this->load->model('M_sch_system_point');
		$system_year = $this->M_sch_system_point->get_one(array('status' => 1));
		if(empty($system_year)){
			$system_year['year'] = date('Y', time()); //默认为今年
		}
		return $system_year['year'];
	}

	/**
	 * 获取当两个日期相差的月数
	 * @param $date1
	 * @param $date2
	 * @return number
	 */
	public function getMonthNum($date){ 
		$last_year = date('Y', strtotime($date)); 
		$now_year = date('Y', time());
		$now_year = 2017;
		$last_month = date('m', strtotime($date));
		$now_month = date('m', time());
		$now_month = 05;
		if($now_year > $last_year){
			$year = bcsub($now_year, $last_year);
		}else{
			$year = bcsub($last_year, $now_year);
		}
		if($now_month > $last_month){
			$month = bcsub($now_month, $last_month);
			$left_month = bcadd($year*12, $month); 
		}else{
			$month = bcsub($last_month, $now_month);
			$left_month = bcsub($year*12, $month); 
		}   
		return $left_month;
	}
	/**
	 * 求两个日期之间相差的天数
	 * (针对1970年1月1日之后，求之前可以采用泰勒公式)
	 * @param string $day1
	 * @param string $day2
	 * @return number
	 */
	public  function diffBetweenTwoDays($day1, $day2) {
		$second1 = strtotime($day1);
		$second2 = strtotime($day2);
		if ($second1 < $second2) {
			$tmp = $second2;
			$second2 = $second1;
			$second1 = $tmp;
		}
		return ($second1 - $second2) / 86400;
	}
}
