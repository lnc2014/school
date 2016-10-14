<?php
/**
 * Description：积点数据模型
 * Author: LNC
 * Date: 2016/9/21
 * Time: 22:20
 */
include_once "BaseModel.php";
class M_sch_point extends BaseModel{
    protected $_tablename = 'sch_point';
    public function __construct()
    {
        parent::__construct();
    }
    //查找所有的待审核的教师的功能
    public function get_all_teacher_check(){

    }
}