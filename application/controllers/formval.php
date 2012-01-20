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
        $this->load->model('inform');
        
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
	$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
	$this->form_validation->set_rules('surname', 'Surname', 'required|xss_clean');
	$this->form_validation->set_rules('country', 'Country', 'required|xss_clean');
        $this->form_validation->set_rules('city', 'City', 'required|xss_clean');
	$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
	$this->form_validation->set_rules('e_mail', 'Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
	$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]|xss_clean');
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
            //run verifications
            $id = $this->users->getUserId1($cloned["username"]);
            if ($cloned['phone_number']!=null)
            {
                $this->session->set_userdata('mobilevercode',$this->generateCode());
                $this->inform->send2phone($id,'verification code',$this->session->userdata('mobilevercode'));
            }
            if ($cloned['e_mail']!=null)
            {
                $this->session->set_userdata('emailvercode',$this->generateCode());
                $this->inform->send2email($id,'verification code',$this->session->userdata('emailvercode'));
            }
            $this->load->view("successReg", $data);
            
	}
	
    }
    
    function editVal()
    {
	$this->form_validation->set_rules('country', 'Country', 'required|xss_clean');
        $this->form_validation->set_rules('city', 'City', 'required|xss_clean');
	$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
	$this->form_validation->set_rules('e_mail', 'Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        if (!empty($_POST["newpassword"]))
	$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]|xss_clean');
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
            $me = $this->users->getMailPhone($this->session->userdata("eizsoleuser"));
            $phoneChanged = ($cloned['phone_number']!=$me->phone_number);
            $emailChanged = ($cloned['e_mail']!=$me->e_mail);
            $this->users->editUser($cloned);
            if  ($phoneChanged)
            {
                $this->session->set_userdata('mobilevercode',$this->generateCode());
                $this->inform->send2phone($this->session->userdata("eizsoleuser"),'verification code',$this->session->userdata('mobilevercode'));
            }
            if ($emailChanged)
            {
                $this->session->set_userdata('emailvercode',$this->generateCode());
                $this->inform->send2email($this->session->userdata("eizsoleuser"),'verification code',$this->session->userdata('emailvercode'));
            }
            $this->load->view("successReg", $data);
	}
    }
    
    function itemVal()
    {
        $data["categories"] = $this->system_data->getCategories();
        $this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
	$this->form_validation->set_rules('short_description', 'Short description', 'required|xss_clean');
	$this->form_validation->set_rules('description', 'Description', 'required|xss_clean');
        $this->form_validation->set_rules('price', 'Price', 'required|xss_clean');
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

			
		}
		else {
                    
                    $tempo = $this->upload->data();
                    $cloned['photo']= $tempo['raw_name'];
                    $configi['image_library'] = 'gd2';
                    $configi['source_image'] = $tempo['full_path'];
                    $configi['create_thumb'] = TRUE;
                    $configi['maintain_ratio'] = TRUE;
                    $configi['width'] = 50;
                    $configi['height'] = 50;

                    $this->load->library('image_lib', $configi);

                    $this->image_lib->resize(); 
                                       
                }
                    $cloned['title'] = $_POST['title'];                     
                    $cloned['price']=$_POST['price'];
                    $cloned['seller_id'] = $_POST['seller_ID'];
                    $cloned['category'] = $_POST['category'];
                    
                    if (isset($_POST['auction']))
                        $cloned['auction'] = $_POST['auction'];
                        else $cloned['auction'] = 0;

                    $clonedToDesc['description'] = $_POST['description'];
                    $clonedToDesc['short_description'] = $_POST['short_description'];

                    $this->items->addItemToDb($cloned, $clonedToDesc);
                    $data['upload_data'] = $this->upload->data();
                    $paramList = $this->items->getParametersByCatId($cloned['category']);
                    if (empty($paramList))
                    {    
                    $this->load->view("itemSuccess", $cloned);
                    } 
                    else
                    {
                    $data['parameters'] = $paramList;
                    $this->load->view('enterParam', $data);
                    }
            
	}
    }
    
    function inputVerCode()
    {
        $this->load->view('enterVerCode');
    }
    
    function checkEmailCode()
    {
        var_dump($this->session->userdata('emailvercode'));
        var_dump($_POST['code']);
        if ($_POST['code'] == $this->session->userdata('emailvercode')) echo 'good'; else echo 'bad';
    }
    
    function generateCode()
    {
        return rand(10000,99999);
    }
    function enterParameters()
    {
        $param = $_POST;
        $lastID = $this->items->getLastItemId();
        $arkeys = array_keys($param);
        $counter=0;
        foreach ($param as $one)
        {
            
            $finalData['parameter'] = $arkeys[$counter];
            
            $finalData['value'] = $param[$arkeys[$counter]];
            $counter += 1;
            $this->items->insertParam($finalData, $lastID);
        }
        $this->load->view('itemSuccess');
    }
}
?>
