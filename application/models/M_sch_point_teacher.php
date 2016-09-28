<?php
/**
 * Description：积点总数数据模型
 * Author: LNC
 * Date: 2016/9/21
 * Time: 22:20
 */
include_once "BaseModel.php";
class M_sch_point_teacher extends BaseModel{
    protected $_tablename = 'sch_point_teacher';
    public function __construct()
    {
        parent::__construct();
    }
}