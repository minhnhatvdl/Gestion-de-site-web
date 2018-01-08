<?php

class Category extends CI_Controller
{
    public function __construct(){ 
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Category_model');
        $this->load->database();
    } 
    public function index()
    {
        $data['menu2']   = $this->get_menu(1, "haha");
        //call category
        $this->load->view('common/header');
        $this->load->view('category',$data); 
        $this->load->view('common/footer');
    }
    
    function get_menu($menuid = 1, $class = ""){
        $menu = $this->get_category($menuid, $class);
        return $menu;
    }

    function get_category($menuid = 1, $class = "")
    {
        $str = "";
        $categorys  =   $this->Category_model->get_category(0, $menuid);
        $str .= "<ul class=".$class.">";
        foreach ($categorys as $category)
        { 
            $str .= "<li class='has-sub'>";
            $str .= "<a href=".$category->link."><span>".$category->title."</span></a>";
            $str .= $this->get_subcategory($category->idcat, $i = 0, $menuid);
            $str .= "</li>";
           
        }
        $str .= "</ul>";
        return $str;
    }
    function get_subcategory($idcats = 0, $i = 0, $menuid = 1)
    {
        $str = "";
        $sub_categorys  =   $this->Category_model->get_subcategory($idcats, $menuid);
        //kiem tra get subcategory co ton tai hay khong
        if($sub_categorys){
           $str .= "<ul>";
                foreach ($sub_categorys as $sub_category)
                {
                    //kiem tra con parent hay ko
                    $str .= "<li class='".$this->check_parent_menu($sub_category->idcat)."'>";
                    $str .= "<a href=".$sub_category->link."><span>".$sub_category->title."</span></a>";
                    if($sub_category->idcat)
                    {
                        $str .= $this->get_subcategory($sub_category->idcat, $i++, $menuid);
                    }
                    $str .= "</li>";

                }
           $str .= "</ul>";
        }
        return $str;
    }
    function check_parent_menu($idcat = 0, $menuid = 1)
    {
        if($this->Category_model->get_subcategory($idcat, $menuid)){
            $str = "has-sub";
        }else{
            $str = "last";
        }
        return $str;
    }
 
    
}

