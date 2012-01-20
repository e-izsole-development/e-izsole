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
        $username = $_POST["username"];
        $type = $_POST["type"];
        $this->user_data->changeType($username,$type);
        $this->index();
    }
    
    function sendAll()
    {
        $this->load->model('inform');
        $this->inform->send2AllPhones($_POST["subject"],$_POST["message"]);
        $this->inform->send2AllEmails($_POST["subject"],$_POST["message"]);
        $this->load->view('successReg');
    }
}

?>
