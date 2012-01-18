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
    
    function getCurrency()
    {
        return $this->db->get('dbo_currency')->result();
    }
    
    function calculateCurrency()
    {
        $xml = file_get_contents('http://www.bank.lv/vk/xml.xml');
        if (!(empty($xml)))
        {
            $doc = new DOMDocument();
            $doc->loadXML($xml);
            
            $val = $this->getCurrency();
            //finding EUR
            foreach ($doc->getElementsByTagName('Currency') as $item)
            {
                if ($item->getElementsByTagName('ID')->item(0)->nodeValue == 'EUR')
                {
                    $euro = $item->getElementsByTagName('Rate')->item(0)->nodeValue;
                }
            }
            
            //Updating LVL
            $data = array('Rate' => 1*($euro));
            $where = "id = 'LVL'";
            $query = $this->db->update_string('dbo_currency', $data, $where); 
            $this->db->query($query);
            
            //Updating others
            foreach ($doc->getElementsByTagName('Currency') as $item)
            {
                foreach ($val as $foo)
                {
                    if ($item->getElementsByTagName('ID')->item(0)->nodeValue == $foo->id)
                    {
                        $data = array('Rate' => ($euro / $item->getElementsByTagName('Rate')->item(0)->nodeValue));
                        $where = "id = '" . $foo->id . "'";
                        $query = $this->db->update_string('dbo_currency', $data, $where); 
                        $this->db->query($query);
                    }
                }
            }
        }
    }
    
    function getStatistics()
    {
        $data = array();
        $data["usersCount"] = $this->db->count_all('dbo_users');
        $data["itemsCount"] = $this->db->count_all('dbo_items');
        return $data;
    }
}

?>
