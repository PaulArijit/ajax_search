<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PagesController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('page_model');
    }
    
    public function view ($page = 'home'){
        
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function search(){
        $search_data = $this->input->post('search_data');
        
        if (trim($search_data) == '') {
            echo json_encode([]);
            return;
        }
        
        $reasult = $this->page_model->get_search_result($search_data);
        $name_arr = [];
        foreach ($reasult as $key => $value) {
            $name_arr[] = $value['name'];
        }
        echo json_encode($reasult);
    }
    
    
}



?>
