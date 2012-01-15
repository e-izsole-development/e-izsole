<?php

class main extends CI_Controller
{
    function main()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata("eizsoleuser") == null) $this->session->set_userdata("eizsoleuser","nr");
        
    }
    
    function index()
    {
        $this->load->model('items_data');
        $this->load->model('system_data');
        
        $data = array();
        $data["categories"] = $this->system_data->getCategories();
        
        
        
        $data["items"] = $this->items_data->getAllShortInfo();
        
        if ($this->session->userdata("eizsoleuser") != null) $this->load->view('main',$data);
        else $this->load->view('mainguest',$data);
    }
    
    function item($id)
    {
        $this->load->model('items_data');
        $this->load->model('system_data');
        
        
        $data = array();
        $data['categories'] = $this->system_data->getCategories();
        $data['item'] = $this->items_data->getItemFullInfo($id);
        
        $this->load->view('item',$data);
    }
    
}

?>
