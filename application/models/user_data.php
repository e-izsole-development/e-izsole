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
    
    function getUser2POST($id)
    {
        $this->db->select('* FROM dbo_users WHERE id='.$id);
        $user = $this->db->get()->result();
        $user = $user[0];
        $_POST["country"]=$user->country;
        $_POST["city"]=$user->city;
        $_POST["address"]=$user->address;
        $_POST["phone_number"]=$user->phone_number;
        $_POST["e_mail"]=$user->e_mail;
        $_POST["username"]=$user->username;
        $_POST["name"]=$user->name;
        $_POST["surname"]=$user->surname;
    }
    
    function getNames()
    {
        $id = $this->session->userdata('eizsoleuser');
        $this->db->select('name, surname, username FROM dbo_users WHERE id='.$id);
        $t = $this->db->get()->result();
        return $t[0];
    }
    
    function getUserType($id)
    {
        $this->db->select("user_type FROM dbo_users WHERE id=".$id);
        $t = $this->db->get()->result();
        $t = $t[0];
        return $t->user_type;
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
    
    function editUser($regData)
    {
        $this->db->insert('dbo_users', $regData);
    }
}
?>
