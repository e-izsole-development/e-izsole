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
    
    function getUserMail($id)
    {
        $this->db->select('e_mail FROM dbo_users WHERE id='.$id);
        $t=$this->db->get()->result();
        $t =$t[0];
        return $t->e_mail;
    }
}

?>