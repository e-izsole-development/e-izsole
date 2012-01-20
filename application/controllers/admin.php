<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Vitalij
 */
class admin extends CI_Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('system_data');
        $this->load->model('user_data');
        $this->load->helper('form');
    }
    
    function index()
    {
        $data = $this->system_data->getStatistics();
        $this->load->view('admin',$data);
    }
    
    function changeUserType()
    {
        $data=$this->prepareData();
        $username = $_POST["username"];
        $type = $_POST["type"];
        $this->user_data->changeType($username,$type);
        $this->index();
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
    
    function sendAll()
    {
        $data=$this->prepareData();
        $this->load->model('inform');
        $this->inform->send2AllPhones($_POST["subject"],$_POST["message"]);
        $this->inform->send2AllEmails($_POST["subject"],$_POST["message"]);
        $this->load->view('successReg',$data);
    }
}

?>
