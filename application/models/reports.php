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
        
    }
}
?>
