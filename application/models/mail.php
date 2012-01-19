<?php

class Mail extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    
    function getUserPhone($id)
    {
        $this->db->select('phone_number , mobile_operator FROM dbo_users WHERE id='.$id);
        $t=$this->db->get()->result();
        return ($t[0]);
    }
}

?>