<?php

class main extends CI_Controller
{
    function main()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata("eizsoleuser") == null) $this->session->set_userdata("eizsoleuser","nr");
        $this->load->helper('form');
        
    }
    
    function index()
    {
        $this->load->model('items_data');
        $this->load->model('system_data');
        $this->load->helper('url');
        
        $data = array();
        $data["categories"] = $this->system_data->getCategories();
        
        
        
        $data["items"] = $this->items_data->getAllShortInfo();
        $data["username"] = "asd";
        $this->load->view('main',$data);
    }
    
    function login()
    {
        $this->load->model('user_data');
        var_dump($_POST);
        $id = $this->user_data->getUserId($_POST["login"],$_POST["password"]);
        $this->session->set_userdata("eizsoleuser",$id);
        $this->index();
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
