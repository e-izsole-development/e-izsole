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
    
    function getUserId1($login)
    {
        $this->db->select("id FROM dbo_users WHERE username = '" . $login . "';");
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
    
    function changeType($username,$type)
    {
        if ($username == $this->session->userdata("eizsoleusername")) return;
        $uid = $this->getUserId1($username);
        
        $this->db->update('dbo_users',array('user_type' => $type),"id = ".$uid);
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
        $this->db->where('id',$this->session->userdata("eizsoleuser"));
        $this->db->update('dbo_users', $regData);
    }
    
    function getUserLanguage($id){
        $this->db->from('dbo_users');
        $this->db->join('dbo_languages', 'dbo_users.language=dbo_languages.id');
        $this->db->where('dbo_users.id', $id);
        $this->db->select('dbo_languages.title');
        $query = $this->db->get();
        foreach ($query->result() as $row){
            $language = $row->title;
        }
        return $language;
    }
    
    
    function getMailPhone($id)
    {
        
        $this->db->select('phone_number , mobile_operator , e_mail FROM dbo_users WHERE id = '.$id);
        
        $t = $this->db->get()->result();
        $t = $t[0];
        return $t;
    }
    
    function getVerificationStatus($id)
    {
        $this->db->select('verified FROM dbo_users WHERE id='.$id);
        $t = $this->db->get()->result();
        $t = $t[0];
        if ($t->verified == null) return 'n';
        return $t->verified;
    }
    
    function setVerificationStatus($id,$s)
    {
        $this->db->where('id',$id);
        $this->db->update('dbo_users',array('verified' => $s));
    }
    
    function getAllIdForMail()
    {
        $this->db->select("id FROM dbo_users WHERE (verified = 'a') OR (verified = 'e')");
        return $this->db->get()->result();
    }
    
    function getAllIdForPhone()
    {
        $this->db->select("id FROM dbo_users WHERE (verified = 'a') OR (verified = 'p')");
        return $this->db->get()->result();
    }
    
    function getUsersToInform($params)
    {
        
        $this->db->select("id, query, verified FROM dbo_users WHERE query <> '' AND (verified = 'a' OR verified = 'p' OR verified = 'e')");
        
        $t = $this->db->get()->result();
        $forres = array();
        foreach ($t as $tt)
        {
            foreach ($params as $p)
            {
                if (strpos($p, $tt->query) !== false)
                {
                    $elem = array('id' => $tt->id, 'ver' => $tt->verified);
                    $forres[] = $elem;
                }
            }
        }
        return $forres;
    }
}
?>
