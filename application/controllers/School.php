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
		$this->load->view('welcome_message');
	}
}
