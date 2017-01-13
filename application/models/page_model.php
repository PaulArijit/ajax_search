<?php

class page_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_search_result($search_data) {
        $this->db->select('name, id, sku, price');
        $this->db->like('name', $search_data);
        $this->db->from('products');
        
        $query = $this->db->get();
        return $query->result();

//        return $this->db->get('products', 10)->result();
//
//        $this->db->select("name, id, sku, price");
//        $whereCondition = array('id' => $search);
//        $this->db->where($whereCondition);
//        $this->db->from('trn_employee');
//        $query = $this->db->get();
//        return $query->result();
    }

}
