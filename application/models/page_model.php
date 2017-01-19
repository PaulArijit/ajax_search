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
        return $query->result_array();

    }

}
