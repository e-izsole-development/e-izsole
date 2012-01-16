<?php
/**
 * Description of items_data
 *
 * @author Tatjana
 */

class items_data extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function findNotSeldProductByUserID($userID){
        $this->db->from('dbo_user_items');
        $this->db->where('user', $userID);
        $query = $this->db->get();
        $this->db->from('dbo_items as i');
        $this->db->join('dbo_item_description as d', 'i.id=d.id');
        $this->db->like('i.id',$query->result());
        $this->db->select('i.id, i.title, i.photo, i.auction, i.price, d.description, d.short_description');       
        return $this->db->get()->resut();
    }
}
?>
