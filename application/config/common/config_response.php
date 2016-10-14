<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

//通用 0000-0099
$config['response']['0000'] = "操作成功";
$config['response']['0001'] = "未知错误";
$config['response']['0002'] = "内部错误";
$config['response']['0003'] = "非法参数";
$config['response']['0004'] = "非法请求";
$config['response']['0005'] = "未登录";

//登录 0100-0199
$config['response']['0010'] = "密码不正确";

//教师 0200-0299
$config['response']['0200'] = "年度积分信息不存在";

//年度积分 0300-0399
$config['response']['0300'] = "系统设置年度积分信息不存在";
$config['response']['0301'] = "该年度已经存在";
$config['response']['0302'] = "只能开启一个年度";