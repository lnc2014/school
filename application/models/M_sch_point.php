<?php
/**
 * Description：积点数据模型
 * Author: LNC
 * Date: 2016/9/21
 * Time: 22:20
 */
include_once(FCPATH.'application/models/BaseModel.php');
class M_sch_point extends BaseModel{
    protected $_tablename = 'sch_point';
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_teacher_rank($limit= '', $offset = '', $year){
        $sql = "SELECT rank.*,@rownum:=@rownum+1 AS rownum FROM ((SELECT p.*,t.`name`,t.`address`,t.`mobile`,t.`subject`,t.`department` FROM sch_point AS p LEFT JOIN sch_teacher AS t ON p.`teacher_id` = t.`teacher_id` WHERE p.status = 5 and p.year = ".$year." ORDER BY p.total_point DESC  LIMIT ".$offset.",".$limit.") rank, (SELECT @rownum:=0) r);";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * 找出所有的积点
     */
    public function get_all_point($status, $year, $limit = '', $offset = ''){
        $this->db->select()->from('sch_point AS p , sch_teacher AS t');
        $this->db->where('p.`status`', $status);
        $this->db->where(array(
            'p.last_year' => $year['last_year'],
            'p.first_year' => $year['first_year'],
        ));
        $this->db->where('p.`teacher_id` = t.`teacher_id`');
        if(!empty($where)){
            $this->db->where($where);
        }
        $this->db->order_by('p.id', 'DESC');
        if(!empty($limit)){
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        return $query->result_array();

    }
}