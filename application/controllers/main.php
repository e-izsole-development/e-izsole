<?php

class main extends CI_Controller
{
    function main()
    {
        parent::__construct();
        if ($_SESSION["eizsoleuser"] == null) $_SESSION["eizsoleuser"] = "nr";
        
    }
    
    function index()
    {
        $dati = array();
        if ($_SESSION["eizsoleuser"] == null) $_SESSION["eizsoleuser"] = "nr";

        if ($_SESSION["eizsoleuser"] != null) $this->load->view('main');
        else $this->load->view('mainguest');
    }
}

?>
