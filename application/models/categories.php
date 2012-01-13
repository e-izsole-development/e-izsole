<?php


class Categories extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function loadAll()
    {
        return $this->db->get('category')->result();
    }
    
    function getCategoriesId()
    {
        $categories = $this->loadAll();
        $cat = array();
        foreach ($categories as $category)
        {
            $cat[$category->id] = $category->title;
        }
        return $cat;
    }
    
    function getCategories()
    {
        $categories = $this->loadAll();
        $cat = array();
        foreach ($categories as $category)
        {
            $catItem['title'] = $category->title;
            $catItem['id'] = $category->id;
            $cat[] = $catItem;
        }
        return $cat;
    }
}

?>
