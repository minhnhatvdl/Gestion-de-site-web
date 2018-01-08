<?php

/* 
 * Chào mừng các bạn đến với diễn đàn codeigniter.vn
 * Chúng tôi rất mong nhận được nhiều sự đóng góp từ cộng đồng codeigniter để xây dựng.
 *  Người thực hiện: tinhphaistc
 *  Y!H & Skype: tinhphaistc
 *  Email: tinhphaistc@gmail.com
 */

class Zenmenu{
    public function __construct() {
        $CI =& get_instance();
    }
    
    function query_menu($id = 0)
    {   
        //call database
        $CI =& get_instance();
        if($id)
        {
            $CI->db->where('parent_id',$id);
        }        
         
        $result =   $CI->db->get("dyn_menu");
        $menu = array();
        //tra ve array std oject
        $results    =   $result->result();
        //tra ve array not std oject
        $results_array  =   $result->result_array();
        for ($i = 0;count($results) > $i; $i++)
        {
            $menu['items'][$results[$i]->id] = $results_array[$i];
            $menu['parents'][$results[$i]->parent_id][] = $results[$i]->id;
        }
        return $menu;
    }
    function buildMenu($parent, $menu){
        $html = "";
        if (isset($menu['parents'][$parent])){$html .= "<ul>";foreach ($menu['parents'][$parent] as $itemId){
        if($parent == 0) $clsa = ' class="firsrli"';else if(isset($menu['parents'][$itemId])) $clsa = ' class="litems"'; else $clsa = ' class="hayvai"';  
        if(!isset($menu['parents'][$itemId])){$html .= "<li><a href=".$menu['items'][$itemId]['url']."$clsa>".$menu['items'][$itemId]['title']."</a>\n</li> \n";}
        if(isset($menu['parents'][$itemId])){$html .= "<li><a href=".$menu['items'][$itemId]['url']."$clsa>".$menu['items'][$itemId]['title']."</a>\n";
        $html .= $this->buildMenu($itemId, $menu);
        $html .= "</li> \n";}}
        $html .= "</ul> \n";}
        return $html;
    }
    function show_menu ($parent = 0)
    {
        echo $this->buildMenu($parent, $this->query_menu(0));
    }
}