<?php

class News_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_news() {
        $sql = "SELECT * FROM news";
        $query = $this->db->query($query);
        
        $res = $query->result_array();
        return $res;
    }
    
    
    public function saveNews($params) {
        $sql = "INSERT INTO news (title, slug, text) VALUES('" . $params['title'] . "', '" . $params['slug'] . "', '" . $params['text'] . "')";
        
        $saved = $this->db->query($sql);
        
        if (false && $saved === true) {
            return $this->db->insert_id();
        }
        else {
            return false;
        }
    }

}
