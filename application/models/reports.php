<?php
/**
 * Description of items_data
 *
 * @author Tatjana
 */

class reports extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function findNotSeldProductByUserID($userID){
        $this->db->from('dbo_items as i');
        $this->db->join('dbo_item_description as d', 'i.id=d.id');
        $this->db->where('i.seller_id', $userID);
        $this->db->select('i.id, i.title, i.photo, i.auction, i.price, d.description, d.short_description');  
        return $this->db->get();
    }
    
    function findLastViwedByUserID($userID){
        $this->db->from('dbo_items as i');
        $this->db->join('dbo_item_description as d', 'i.id=d.id');
        $this->db->join('dbo_recently_watched w','i.id=w.item_id');
        $this->db->where('w.user_id', $userID);
        $this->db->select('i.id, i.title, i.photo, i.auction, i.price, d.description, d.short_description');  
        return $this->db->get();
    }
}
?>
