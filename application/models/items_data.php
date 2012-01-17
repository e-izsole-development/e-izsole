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
    
    function getItemsByCategory($cat)
    {
        $this->db->select("i.id, i.title, i.photo, i.auction, i.price, d.description, d.short_description FROM dbo_items i, dbo_item_description d WHERE (i.id=d.id) AND (i.category='" . $cat ."');"); 
        return $this->db->get()->result();
    }
    
    function getItemsForSearch($param)
    {
        $select = "i.id, i.title, i.photo, i.auction, i.price, d.description, d.short_description ";
        $from = "FROM dbo_items i, dbo_item_description d, dbo_categories c ";
        $where = "WHERE (d.short_description like '%" . $param . "%' OR d.description like '%" . $param . "%' OR i.title like '%" . $param . "%' OR c.title like '%" . $param ."%' ) AND (i.id=d.id) AND (c.id=i.category);";
        $this->db->select($select . $from . $where); 
        return $this->db->get()->result();
    }
    function getCategoriesTitle()
    {
        $this->db->select("title FROM dbo_categories ");
        return $this->db->get()->result();
    }
    function addItemToDb($item, $itemDesc)
    {
        $this->db->insert('dbo_item_description', $itemDesc);
        $this->db->insert('dbo_items', $item);
    }
}

?>
