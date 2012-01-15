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
        $this->db->select(" i.title, i.photo, i.auction, i.price, d.description FROM dbo_items i, dbo_item_description d WHERE i.id=d.id");
        return $this->db->get()->result();
    }
}

?>
