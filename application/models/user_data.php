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
        if (empty($obj)) return null;
        return $obj[0]->id;
    }
    function registerUser($regData)
    {
        $regData["user_type"] = "r";
        $regData["verified"] = "n";
        $regData["currency"] = 1;
        $regData["language"] = 1;
        $this->db->insert('dbo_users', $regData);
    /*    $this->db->insert("ID, name, surname, country, city, address, phone_number, mobile_operator, e_mail, username, password, user_type, verified, currency, language, " .
                            "INTO dbo_users VALUES ( 12, '"  
                . $regData("name") . "', '" 
                . $regData("surname") . "', '" 
                . $regData("country") . "', '" 
                . $regData("city") . "', '" 
                . $regData("address") . "', '" 
                . $regData("phone_number") . "', " 
                . $regData("mobile_operator") . ", '" 
                . $regData("e_mail") . "', '" 
                . $regData("username") . "', '" 
                . $regData("password") . "', 'r', 'n', 1, 1)"); */
    }
}
?>
