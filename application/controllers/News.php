<?php

class News extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('News_model');
    }

    public function index(){
        $data = array();
        $data['news'] = $this->News_model->get_news();
        
        $this->load->view('templates/header');
        $this->load->view('news/index',  $data);
        $this->load->view('templates/footer');
    }
    
    public function create() {
        $this->load->view('news/create');
    }
    
    public function save_news() {
        $title = $this->input->post('title', true);
        $slug = $this->input->post('slug', true);
        $text = $this->input->post('text', true);
        
        $params = array(
            'title' => $title,
            'slug' => $slug,
            'text' => $text,
        );
        
        $insert_id = $this->News_model->saveNews($params);
        
        if ($insert_id > 0) {
            $this->session->set_flashdata('Success', 'Saved Successfully');
            redirect('news/view/' . $insert_id);
        }
        else {
            redirect('news/create/');
            $this->session->set_flashdata('Error', 'Not Saved');
        }
        
    }
    
    public function view($id) {
        
        echo 'INSERTED ID = '.$id;
        //$data = $this->News_model->viewNews($id);
        
        //print_r($data);
//        $this->loadView
    }

}
