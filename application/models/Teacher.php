<?php
/**
 * Description：教师数据模型
 * Author: LNC
 * Date: 2016/9/21
 * Time: 22:20
 */
include_once "BaseModel.php";
class Teacher extends BaseModel{
    protected $_tablename = 'sch_teacher';
    public function __construct()
    {
        parent::__construct();
    }
}