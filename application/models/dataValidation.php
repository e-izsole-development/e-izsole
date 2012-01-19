<?php

/**
 * Description of items_data
 *
 * @author Tatjana
 */

class dataValidation extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function productIDValidation($id){
        if(is_numeric($id)){
            $this->db->from('dbo_items');
            $this->db->where('id', $id);
            if($this->db->count_all_results()==1){
                return true; 
            }
        return false;
        }
    }
}

?>
