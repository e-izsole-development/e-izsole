<?php

class Formval extends CI_controller
{
    function Formval()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

	$this->load->library('form_validation');
        $this->load->model('user_data', 'users');
    }
    
    
    function index()
    {
        
	
    }
    function regVal()
    {
	$this->form_validation->set_rules('name', 'Name', 'required');
	$this->form_validation->set_rules('surname', 'Surname', 'required');
	$this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
	$this->form_validation->set_rules('address', 'Address', 'required');
	$this->form_validation->set_rules('e_mail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
        //$this->form_validation->set_rules('termsAgreement[]', 'Terms and Agreement', 'required');
        

	if ($this->form_validation->run() == FALSE)
	{
            $this->load->view('regForm');
	}
	else
	{
            $cloned = $_POST;
            unset($cloned["repassword"]);
            $data["cloned"] = $cloned;
            $this->users->registerUser($cloned);
            $this->load->view("successReg", $data);
	}
	
    }
    
}
?>
