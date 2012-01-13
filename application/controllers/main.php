<?php

class main extends CI_Controller
{
    function main()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->load->view('mainguest');
    }
}

?>
