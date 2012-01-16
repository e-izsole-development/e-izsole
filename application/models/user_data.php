<?php

class User_data extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getUserId($login,$pass)
    {
        $this->db->select("id FROM dbo_users WHERE username = '" . $login . "' AND password = '" . $pass . "';");
        $obj = $this->db->get()->result();        
        return $obj[0]->id;
    }
}
?>
