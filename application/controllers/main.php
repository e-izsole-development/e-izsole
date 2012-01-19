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
        $this->load->model('user_data');
        $this->load->helper('url');
        if ($this->session->userdata("eizsolecurr")==null) $this->session->set_userdata("eizsolecurr","LVL");
    }
    
    function index()
    {
        $data = $this->prepareData();
        $data["items"] = $this->items_data->getAllShortInfo();
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
        $this->load->model('dataValidation');
        $this->load->model('reports');
        $data = $this->prepareData();
        if($this->dataValidation->productIDValidation($id)){
            $data['item'] = $this->items_data->getItemFullInfo($id);
            $this->reports->insertViwedProduct($this->session->userdata('eizsoleuser'), $id);
            $this->load->view('item',$data);
        }
        else{
            $this->load->view('error',$data);
        }
    }
   
    function myProductForSail(){
        $data = $this->prepareData();
        $this->load->model('reports');
        $data['items']=$this->reports->findNotSeldProductByUserID($this->session->userdata('eizsoleuser'));   
        $data['PageName']='E-izsole: My products';
        $this->load->view('report',$data);
    }
    
    function category($id)
    {        
        $data = $this->prepareData();
        
        $data["items"] = $this->items_data->getItemsByCategory($id);
        $this->load->view('main',$data);
    }
    
    function search()
    {
        $data = $this->prepareData();
        
        if (!empty($_POST["parameters"])) $data["items"] = $this->items_data->getItemsForSearch($_POST["parameters"]);
        $this->load->view('main',$data);
    }
    
    function prepareData()
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
        if ($this->session->userdata("eizsoleuser")!=null) $data["userType"] = $this->user_data->getUserType($this->session->userdata("eizsoleuser"));
        else $data["userType"] = 'n';
        
        $data["currencyIndex"] = $currencyIndex;
        return $data;
    }
    function newItem()
    {
        if (isset($_POST))
            unset($_POST);
        $data["categories"] = $this->system_data->getCategories();
        $this->load->view("addItemForm", $data);
    }
    function lastTwenyViewed(){
        $data = $this->prepareData();
        $this->load->model('reports');
        $data['items']=$this->reports->findLastViwedByUserID($this->session->userdata('eizsoleuser'));   
        $data['PageName']='E-izsole: Last viewed';
        $this->load->view('report',$data);
    }
    
}

?>
