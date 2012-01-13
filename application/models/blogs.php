<?php

class Blogs extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function loadAll()
    {
        $this->db->order_by('id','desc');
        return $this->db->get('blog')->result();
    }
    
    function getTitle($id)
    {
        $this->db->select('title');
        $a = $this->db->get_where('blog',array('id' => $id))->result();
        return $a[0]->title;
    }
    
    function getContents($id)
    {
        $this->db->select('contents');
        $a = $this->db->get_where('blog',array('id' => $id))->result();
        return $a[0]->contents;
    }
    
    function getCategory($id)
    {
        $this->db->select('category_id');
        $a = $this->db->get_where('blog',array('id' => $id))->result();
        return $a[0]->category_id;
    }
    
    function insertNew($values)
    {
        $this->db->insert('blog', $values);
        redirect('blog');
    }
    
    function modifyPost($id,$values)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $values); 
        redirect('blog');
    }
}

?>
