<?php
/**
 * Description：登录数据模型
 * Author: LNC
 * Date: 2016/9/21
 * Time: 22:20
 */
include_once "BaseModel.php";
class Admin extends BaseModel{
    protected $_tablename = 'sch_admin';
    public function __construct()
    {
        parent::__construct();
    }
}