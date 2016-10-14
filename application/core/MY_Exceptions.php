<?php
/**
 * Author:LNC
 * Description: 文件描述
 * Date: 2016/10/14 0014
 * Time: 上午 10:19
 */
class MY_Exceptions extends CI_Exceptions{
    //修改show_error方法
    public function show_error($title, $url, $template = 'error_general', $status_code = 500)
    {
        set_status_header($status_code);
        if (ob_get_level() > $this->ob_level + 1)
        {
            ob_end_flush();
        }
        ob_start();
        include(APPPATH.'errors/'.$template.'.php');
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}
