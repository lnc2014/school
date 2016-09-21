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
	}
}
