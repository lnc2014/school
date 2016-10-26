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

    /**
     * 获取所有的绩效问题和答案
     * @param $type
     * @param $year
     */
    public function get_all_per_type($type, $year){
        $this->db->select()->from('sch_teaching_performance AS p');
        $this->db->join('sch_per_teacher AS t', "p.`alias` = t.`per_id` and t.year = $year", 'left');
        $this->db->where('p.`type`', $type);
//        $this->db->where('t.`year`', $year);
        $query = $this->db->get();
        return $query->result_array();
    }
}