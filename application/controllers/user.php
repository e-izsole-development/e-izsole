<?php
class User extends CI_Controller
{
    function User()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('user_data', 'users');
    }
    
    function index()
    {
        
    }
    function register()
    {
        $this->load->view('regForm');
    }
    function registerNewUser()
    {
        $cloned = $_POST;
        $data["cloned"] = $cloned;
        $this->users->registerUser($cloned);
        $this->load->view("successReg", $data);
    }
    
    function editUser()
    {
        $id = $this->session->userdata('eizsoleuser');
        $this->users->getUser2POST($id);
        $data = array();
        $data['names'] = $this->users->getNames();
        $this->load->view('editProfile',$data);
    }
}
?>