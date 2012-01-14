<?php

class item extends CI_Controller
{
    function item()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata("eizsoleuser") == null) $this->session->set_userdata("eizsoleuser","nr"); 
    }
    
    function index($id)
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
