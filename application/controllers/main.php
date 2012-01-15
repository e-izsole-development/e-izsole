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
        $data = array();
        $categories = array();
        $categories[] = "toys";
        $categories[] = "jewerly";
        $categories[] = "cars";
        $categories[] = "books";
        $categories[] = "electronics";
        $data['categories'] = $categories;
        
        $items = array();
        $item = array();
        $item["pic"] = "none";
        $item["title"] = "Title";
        $item["description"] = "It is a small description";
        $item["price"] = 5;
        $items[] = $item;
        $items[] = $item;
        $items[] = $item;
        $items[] = $item;
        $items[] = $item;
        
        $data["items"] = $items;
        $this->load->view('item',$data);
    }
    
}

?>
