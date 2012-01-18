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
    }
    
    function index()
    {
        $this->load->view('admin');
    }
}

?>
