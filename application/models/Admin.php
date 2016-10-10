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
    /**
     * 根据条件找出所有的教师列表
     */
    public function find_all_teacher($limit = '', $offset = '', $where = ''){
        $this->db->select('a.`user_name`,a.account, t.*')->from();
        $this->db->where('a.teacher_id = t.teacher_id');
        $this->db->where('a.auth = 1');
        $this->db->order_by('t.create_time', 'DESC');
        if(!empty($where)){
            $this->db->where($where);
        }
        if(empty($limit)){
            $query = $this->db->get('sch_admin AS a ,sch_teacher AS t');
        }else{
            $query = $this->db->get('sch_admin AS a ,sch_teacher AS t', $limit, $offset);
        }
        return $query->result_array();
    }
}