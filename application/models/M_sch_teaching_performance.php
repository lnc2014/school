<?php
/**
 * Description：绩效模型
 * Author: LNC
 * Date: 2016/9/21
 * Time: 22:20
 */
include_once "BaseModel.php";
class M_sch_teaching_performance extends BaseModel{
    protected $_tablename = 'sch_teaching_performance';
    public function __construct()
    {
        parent::__construct();
    }
}