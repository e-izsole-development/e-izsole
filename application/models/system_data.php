<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of system_data
 *
 * @author Vitalij
 */
class system_data extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getCategories()
    {
        $this->db->select('title,id');
        return $this->db->get('dbo_categories')->result();
    }
}

?>
