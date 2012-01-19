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
        $this->db->order_by('w.date', 'desc');
        $this->db->limit(20);
        $this->db->select('i.id, i.title, i.photo, i.auction, i.price, d.description, d.short_description');  
        return $this->db->get();
    }
    
    function insertViwedProduct($userID, $itemID){
        $this->db->from('dbo_recently_watched');
        $this->db->where('user_id', $userID);
        $this->db->where('item_id', $itemID);
        if($this->db->count_all_results()==0){
           $data = array(
               'user_id' => $userID,
               'item_id' => $itemID
            );
            $this->db->insert('dbo_recently_watched', $data);  
        }
        else{
            $this->db->where('user_id', $userID);
            $this->db->where('item_id', $itemID);
            $this->load->helper('date');
            date_default_timezone_set('Europe/Riga');
            $this->db->update('dbo_recently_watched', array('date' => date('Y-m-d H:i:s')));
        } 
    }
}
?>
