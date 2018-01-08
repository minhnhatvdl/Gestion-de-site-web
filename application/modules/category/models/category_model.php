<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Category_model extends CI_Model
{
    function get_category($parentid = 0, $menuid = 1){
        $this->db->where('parentid',$parentid);
        $this->db->where('menuid',$menuid);
        $query = $this->db->get('category');
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function get_subcategory($idcat = 0, $menuid = 1){
        $this->db->where('parentid',$idcat);
        $this->db->where('menuid',$menuid);
        $query = $this->db->get('category');
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
        
    }
}