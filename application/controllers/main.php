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
        $this->load->library('form_validation');
     if ($this->session->userdata("eizsolecurr")==null)
        {
            $this->session->set_userdata("eizsolecurr","LVL");
        }
        if ($this->session->userdata("language")==null)
        {
           $this->session->set_userdata("language","LV");
        }
    }
    
    function index()
    {
        $data = $this->prepareData();
        $data["items"] = $this->items_data->getAllShortInfo();
        $this->load->view('fullMenu',$data);
        $this->load->view('main',$data);
    }
    
    function login()
    {
        
        $this->load->model('user_data');
        $id = $this->user_data->getUserId($_POST["login"],$_POST["password"]);
        $this->session->set_userdata("eizsoleuser",$id);
        $this->session->set_userdata("language",$this->user_data->getUserLanguage($id));
        $this->lang->load('main', $this->session->userdata("language"));
        if ($id!=null) $this->session->set_userdata("eizsoleusername",$_POST['login']);
        $this->index();
    }
    
    function logout()
    {
        $this->session->unset_userdata('eizsoleuser');
        $this->session->unset_userdata('eizsoleusername');
        $this->session->set_userdata("language","LV");
        $this->index();
    }
    
    function item($id)
    {
        $this->load->model('items_data');
        $this->load->model('system_data');
        $this->load->model('dataValidation');
        $this->load->model('reports');
        $data = $this->prepareData();
        $data['auction'] = $this->items_data->ifAuction($id);
        if($this->dataValidation->productIDValidation($id)){
            $data['item'] = $this->items_data->getItemFullInfo($id);
            $this->reports->insertViwedProduct($this->session->userdata('eizsoleuser'), $id);
            $this->load->view('fullMenu',$data);
            $this->load->view('item',$data);
        }
        else{
            $data['errors']= "This product does not exist!";
            $this->load->view('fullMenu',$data);
            $this->load->view('error',$data);
        }
    }
   
    function myProductForSail(){
        $data = $this->prepareData();
        $this->load->model('reports');
        $data['items']=$this->reports->findNotSeldProductByUserID($this->session->userdata('eizsoleuser'))->result();   
        $data['PageName']='E-izsole: My products';
        $this->load->view('registeredMenu',$data);
        $this->load->view('main',$data);
    }
    
    function category($id)
    {        
        $data = $this->prepareData();
        
        $data["items"] = $this->items_data->getItemsByCategory($id);
        $this->load->view('fullMenu',$data);
        $this->load->view('main',$data);
    }
    
    function search()
    {
        $data = $this->prepareData();
        
        if (!empty($_POST["parameters"])) $data["items"] = $this->items_data->getItemsForSearch($_POST["parameters"]);
        $this->load->view('fullMenu',$data);
        $this->load->view('main',$data);
    }
    
    function prepareData()
    {
        $this->system_data->calculateCurrency();
        if (!empty($_POST["currency"])) $this->session->set_userdata("eizsolecurr",$_POST["currency"]);
        
        $data = array();
        $data["categories"] = $this->system_data->getCategories();
        $data["languages"] = $this->system_data->getLanguages();
              
        $data["currency"] = $this->system_data->getCurrency();
        $this->lang->load('main', $this->session->userdata("language"));
        $data['login']=$this->lang->line('login');
        $data['kategory']=$this->lang->line('kategory');
        $data['menu']=$this->lang->line('menu');
        
        $currencyIndex = array();
        foreach($data["currency"] as $oneOfCurrencies)
        {
            $currencyIndex[$oneOfCurrencies->id] = $oneOfCurrencies->Rate;
        }
        if ($this->session->userdata("eizsoleuser")!=null) $data["userType"] = $this->user_data->getUserType($this->session->userdata("eizsoleuser"));
        else $data["userType"] = 'n';
        if ($this->session->userdata('eizsoleuser')!=null) $data['verificationStatus'] = $this->user_data->getVerificationStatus($this->session->userdata('eizsoleuser'));
        $data["currencyIndex"] = $currencyIndex;
        return $data;
    }
    function newItem()
    {
        if (isset($_POST))
            unset($_POST);
        $data= $this->preparedata();
        $data["categories"] = $this->system_data->getCategories();
        
        $this->load->view('registeredMenu',$data);
        $this->load->view("addItemForm", $data);
    }
    function lastTwenyViewed(){
        $data = $this->prepareData();
        $this->load->model('reports');
        $data['items']=$this->reports->findLastViwedByUserID($this->session->userdata('eizsoleuser'))->result();   
        $data['PageName']='E-izsole: Last viewed';
        $this->load->view('registeredMenu',$data);
        $this->load->view('main',$data);
    }
    
    function upadteLanguage(){
        $this->session->set_userdata("language",$_POST['languagechoise']);
        If($this->session->userdata("eizsolecurr")!=null){
            $this->load->model('system_data');
            $this->system_data->updateLanguage($this->session->userdata("eizsolecurr"),$_POST['languagechoise']);
        }
        $this->index();
    }
    
    function bidVal($id)
    {
       
        $this->form_validation->set_rules('new_bid', 'New bid', 'required');
        $newBid = $_POST['new_bid'];
        $oldBid = $_POST['old_bid'];
        $bidder = $this->session->userdata('eizsoleuser');
        $bid['price'] = $newBid;
        $bid['id'] = $id;;
        $bid['winner'] = $bidder;
        if ($this->form_validation->run() == FALSE)
         {
                    $data = $this->preparedata();
                    $data['bidError'] = 'New bid is required and must be decimal!  (example: 5.00, 4.20, 3.12)';
                    $data['item'] = $this->items_data->getItemFullInfo($id);
                    $this->load->view('item',$data);
         }
        else
        {
            
            
            if ($newBid > $oldBid) 
            {
                $this->items_data->setNewBid($bid);
                $data = $this->preparedata();
                $data['test'] = array($id, $newBid, $bidder);
                $data['item'] = $this->items_data->getItemFullInfo($id);
                $data['success'] = '<script> alert("Your bid( '. $newBid . ' ) was successfully added")</script>';
                $this->load->view('item',$data);
            }
            else 
            {
                
                $data = $this->preparedata();
                $data['bidError'] = 'New bid must be higher than old bid';
                $data['item'] = $this->items_data->getItemFullInfo($id);
                $this->load->view('item',$data);
            }
        }
    }
}

?>
