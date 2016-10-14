<?php
/**
 * Author:LNC
 * Description: CI核心公共函数库
 * Date: 2016/10/14 0014
 * Time: 上午 10:19
 */
/**
 * 错误页面展示
 */
if(!function_exists('show_error')){
    function show_error($url, $status_code = 500, $title = '')
    {
        $_error =& load_class('Exceptions', 'core');
        echo $_error->show_error($title, $url, 'error_general', $status_code);
        exit();
    }
}
