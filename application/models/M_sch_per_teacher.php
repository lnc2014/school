<?php
/**
 * Description：绩效填写数据模型
 * Author: LNC
 * Date: 2016/9/21
 * Time: 22:20
 */
include_once "BaseModel.php";
class M_sch_per_teacher extends BaseModel{
    protected $_tablename = 'sch_per_teacher';
    public function __construct()
    {
        parent::__construct();
    }
}