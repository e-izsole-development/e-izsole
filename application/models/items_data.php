<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of items_data
 *
 * @author Vitalij
 */
class items_data extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getAllShortInfo()
    {
        $this->db->select("i.id, i.title, i.photo, i.auction, i.price, d.description, d.short_description FROM dbo_items i, dbo_item_description d WHERE i.id=d.id"); 
        return $this->db->get()->result();
    }
    
    function getItemFullInfo($id)
    {
        $this->db->select(" i.title, i.photo, i.auction, i.price, d.description FROM dbo_items i, dbo_item_description d WHERE (i.id=d.id) AND (i.id=$id)"); 
        $data = $this->db->get()->result();
        $data = $data[0];
        $this->db->select("pv.value, p.title FROM dbo_parameters p, dbo_parameter_values pv WHERE ((pv.item_id=$id) AND (pv.parameter=p.id))");
        $params = $this->db->get()->result();
        $data->parameters = $params;
        return $data;
    }
}

?>
