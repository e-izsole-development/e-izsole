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
        $this->load->model('system_data');
        
        $config['upload_path'] = './application/views/images/Uploads/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '100';
        $config['max_width'] = '800';
        $config['max_height'] = '600';

        $this->load->library('upload', $config);
        
        
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
    
    function editVal()
    {
	$this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
	$this->form_validation->set_rules('address', 'Address', 'required');
	$this->form_validation->set_rules('e_mail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if (!empty($_POST["newpassword"]))
	$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
        //$this->form_validation->set_rules('termsAgreement', 'Terms and Agreement', 'greater_than[1]');
        
        //$this->form_validation->set_message('greater_than[1]', 'You must accept user agreement and privacy policy');
        

	if ($this->form_validation->run() == FALSE)
	{
            $data = array();
            $data['names'] = $this->users->getNames();
            $this->load->view('editProfile',$data);
	}
	else
	{
            $cloned = $_POST;
            unset($cloned["repassword"]);
            $data["cloned"] = $cloned;
            if (!empty($_POST["newpassword"]))
            {
                $cloned["password"] = $cloned["newpassword"];
            }
            unset($cloned["newpassword"]);
            $this->users->editUser($cloned);
            $this->load->view("successReg", $data);
	}
    }
    
    function itemVal()
    {
        $data["categories"] = $this->system_data->getCategories();
        $this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('short_description', 'Short description', 'required');
	$this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        //$this->form_validation->set_rules('termsAgreement[]', 'Terms and Agreement', 'required');
        

	if ($this->form_validation->run() == FALSE)
	{
            $this->load->view('addItemForm', $data);
	}
	else
	{
            if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();

			$this->load->view('addItemForm', $data);
		}
		else {
                    $cloned['title'] = $_POST['title'];
                    $tempo = $this->upload->data();
                    $cloned['photo']= $tempo['raw_name'];
                    $cloned['price']=$_POST['price'];
                    $cloned['seller_id'] = $_POST['seller_ID'];
                    $cloned['category'] = $_POST['category'];
                    
                    $configi['image_library'] = 'gd2';
                    $configi['source_image'] = $tempo['full_path'];
                    $configi['create_thumb'] = TRUE;
                    $configi['maintain_ratio'] = TRUE;
                    $configi['width'] = 50;
                    $configi['height'] = 50;

                    $this->load->library('image_lib', $configi);

                    $this->image_lib->resize(); 
                    
                    
                    
                    if (isset($_POST['auction']))
                        $cloned['auction'] = $_POST['auction'];
                        else $cloned['auction'] = 0;

                    $clonedToDesc['description'] = $_POST['description'];
                    $clonedToDesc['short_description'] = $_POST['short_description'];

                    $this->items->addItemToDb($cloned, $clonedToDesc);
                    $data['upload_data'] = $this->upload->data();
                    $this->load->view("itemSuccess", $cloned);
                }
            
	}
    }
    
}
?>
