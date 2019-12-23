<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_default extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    //insert new data to table.
    public function insert_data($tablename,$insertdata){
        $this->db->insert($tablename,$insertdata);
        $return = $this->db->insert_id();
        return $return;
    }

    //count all table data
    public function count_data($tablename,$conduction = NULL){
        $this->db->select('*');
        $this->db->from($tablename);
        if($conduction != ''){
            $this->db->where($conduction);
        }
        $returndata = $this->db->get();
        $num = $returndata->num_rows();
        return $num;
    }

    //select data form database table 
    public function select_data($tablename,$conduction = NULL,$orderby = NULL,$limit_from=NULL,$limit_to=NULL){
        $this->db->select('*');
        $this->db->from($tablename);
		if($conduction != ''){
            $this->db->where($conduction);
        }
        $this->db->order_by($orderby);
        $this->db->limit($limit_from,$limit_to);
        $returndata = $this->db->get();
        return $returndata->result();
    }
    
    //manual query to get data
    public function query($query){
        $dataquery = $this->db->query($query);
        $result = $dataquery->result();
        return $result;
    }

    //update selected data
    public function update_data($tablename,$updatedata,$conduction){
        $this->db->where($conduction);
        $this->db->update($tablename,$updatedata);
        $return = $this->db->affected_rows();
        return $return;
    }
    
    //delete data peramently
    public function delete_data($tablename,$conduction){
        $this->db->where($conduction);
        $this->db->delete($tablename);
        $return = $this->db->affected_rows();
        return $return;
    }

}
