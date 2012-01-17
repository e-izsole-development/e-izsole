<?php

class main extends CI_Controller
{
    function main()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('items_data');
        $this->load->model('system_data');
        $this->load->helper('url');
        if ($this->session->userdata("eizsolecurr")==null) $this->session->set_userdata("eizsolecurr","LVL");
    }
    
    function index()
    {
        $this->system_data->calculateCurrency();
        if (!empty($_POST["currency"])) $this->session->set_userdata("eizsolecurr",$_POST["currency"]);
        
        $data = array();
        $data["categories"] = $this->system_data->getCategories();
        
        $data["currency"] = $this->system_data->getCurrency();
        
        $currencyIndex = array();
        foreach($data["currency"] as $oneOfCurrencies)
        {
            $currencyIndex[$oneOfCurrencies->id] = $oneOfCurrencies->Rate;
        }
        
        $data["currencyIndex"] = $currencyIndex;
        
        $data["items"] = $this->items_data->getAllShortInfo();
        $data["username"] = "asd";
        $this->load->view('main',$data);
    }
    
    function login()
    {
        
        $this->load->model('user_data');
        $id = $this->user_data->getUserId($_POST["login"],$_POST["password"]);
        $this->session->set_userdata("eizsoleuser",$id);
        if ($id!=null) $this->session->set_userdata("eizsoleusername",$_POST['login']);
        $this->index();
    }
    
    function logout()
    {
        $this->session->unset_userdata('eizsoleuser');
        $this->session->unset_userdata('eizsoleusername');
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
   
    function myProductForSail(){
        $this->load->model('reports');
        $data=$this->reports->findNotSeldProductByUserID($this->session->userdata('eizsoleuser'));
        $this->load->view('reports',$data);
    }
    
    function category($id)
    {
        $this->load->model('items_data');
        $this->load->model('system_data');
        $this->load->helper('url');
        
        $data = array();
        $data["categories"] = $this->system_data->getCategories();
        
        $data["items"] = $this->items_data->getItemsByCategory($id);
        $this->load->view('main',$data);
    }
    
    function search()
    {
        $this->load->model('items_data');
        $this->load->model('system_data');
        $this->load->helper('url');
        
        $data = array();
        $data["categories"] = $this->system_data->getCategories();
        
        $data["items"] = $this->items_data->getItemsForSearch($_POST["parameters"]);
        $this->load->view('main',$data);
    }
    
    function lastTenViewed(){
        
    }
    
}

?>
