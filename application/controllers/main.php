<?php

class main extends CI_Controller
{
    function main()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata("eizsoleuser") == null) $this->session->set_userdata("eizsoleuser","nr");
        
    }
    
    function index()
    {
        $dati = array();

        if ($this->session->userdata("eizsoleuser") != null) $this->load->view('main');
        else $this->load->view('mainguest');
    }
}

?>
