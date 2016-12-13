<?php
/**
 * Description：积点审核轨迹
 * Author: LNC
 * Date: 2016/9/21
 * Time: 22:20
 */
include_once "BaseModel.php";
class M_sch_point_check extends BaseModel{
    protected $_tablename = 'sch_point_check';
    public function __construct()
    {
        parent::__construct();
    }
    public function find_is_no_check($point_id){
        $this->db->select('*');
        $this->db->where('point_id', $point_id);
        $this->db->order_by('create_time DESC');
        $query = $this->db->get($this->_tablename);
        return $query->row_array();
    }
}