<?php
class User extends CI_Controller
{
    function User()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('user_data', 'users', 'system_data');
    }
    
    function index()
    {
        
    }
    
    function prepareData()
    {
        $this->load->model('system_data');
        $this->load->model('user_data');
        $this->system_data->calculateCurrency();
        if (!empty($_POST["currency"])) $this->session->set_userdata("eizsolecurr",$_POST["currency"]);
        
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
    
    function register()
    {
        $data=$this->prepareData();
        $this->load->view('regForm',$data);
    }
    function registerNewUser()
    {
        $data=$this->prepareData();
        $cloned = $_POST;
        $data["cloned"] = $cloned;
        $this->users->registerUser($cloned);
        $this->load->view("successReg", $data);
    }
    
    function editUser()
    {
        $id = $this->session->userdata('eizsoleuser');
        $this->users->getUser2POST($id);
        $data=$this->prepareData();
        $data['names'] = $this->users->getNames();
        $this->load->view('editProfile',$data);
    }
}
?>
