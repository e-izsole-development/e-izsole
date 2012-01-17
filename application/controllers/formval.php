<?php

class Formval extends CI_controller
{
    function Formval()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

	$this->load->library('form_validation');
        $this->load->model('user_data', 'users');
        $this->load->model('items_data', 'items');
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
        //$this->form_validation->set_rules('termsAgreement', 'Terms and Agreement', 'greater_than[1]');
        
        //$this->form_validation->set_message('greater_than[1]', 'You must accept user agreement and privacy policy');
        

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
    function itemVal()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('short_description', 'Short description', 'required');
	$this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        //$this->form_validation->set_rules('termsAgreement[]', 'Terms and Agreement', 'required');
        

	if ($this->form_validation->run() == FALSE)
	{
            $this->load->view('addItemForm');
	}
	else
	{
            $cloned['title'] = $_POST['title'];
            $cloned['photo']=$_POST['photo'];
            $cloned['price']=$_POST['price'];
            $cloned['seller_id'] = $_POST['seller_ID'];
            $cloned['category'] = $_POST['category'];
            if (isset($_POST['auction']))
                $cloned['auction'] = $_POST['auction'];
                else $cloned['auction'] = 0;
                
            $clonedToDesc['description'] = $_POST['description'];
            $clonedToDesc['short_description'] = $_POST['short_description'];
            
            $this->items->addItemToDb($cloned, $clonedToDesc);
            $this->load->view("itemSuccess");
	}
    }
    
}
?>
