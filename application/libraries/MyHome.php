<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MyHome {
	public function __construct() {
        $CI =& get_instance();
        $CI->load->model('Home_model');
        $CI->load->model('Category/Category_model');
        $CI->load->model('Logo/Logo_model');
        $CI->load->model('Social/Social_model');
    }
    //get menu
    public function get_menu($menuid = 1, $class = "", $id = 1){
        $menu = $this->get_category($menuid, $class, $id);
        return $menu;
    }

    public function get_category($menuid = 1, $class = "", $id = 1)
    {
    	$CI =& get_instance();
        $str = "";
        $categorys  =   $CI->Category_model->get_category(0, $menuid);

        $str .= "<ul class=".$class.">";

        foreach ($categorys as $category){   
            $str .= "<li class='has-sub";
            ($id == $category->pageid)? $str .= " active": $str .= "";
            $str .= "'>";
            $str .= "<a href=".$category->link."><span>".$category->title."</span></a>";
            $str .= $this->get_subcategory($category->idcat, $i = 0, $menuid, $id);
            $str .= "</li>";
           
        }
        $str .= "</ul>";
        return $str;
    }

    public function get_subcategory($idcats = 0, $i = 0, $menuid = 1, $id = 1)
    {
    	$CI =& get_instance();
        $str = "";
        $sub_categorys  =   $CI->Category_model->get_subcategory($idcats, $menuid);
        //kiem tra get subcategory co ton tai hay khong
        if($sub_categorys){
           $str .= "<ul>";
                foreach ($sub_categorys as $sub_category)
                {
                    //kiem tra con parent hay ko
                    $str .= "<li class='".$this->check_parent_menu($sub_category->idcat)."";
                    ($id == $sub_category->pageid && $sub_category->parentid != 0)? $str .= " active": $str .= "";
                    $str .= "'>";
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

    public function check_parent_menu($idcat = 0, $menuid = 1)
    {
    	$CI =& get_instance();
        if($CI->Category_model->get_subcategory($idcat, $menuid)){
            $str = "has-sub";
        }else{
            $str = "last";
        }
        return $str;
    }
    //get a logo
    public function get_logo($width = 100, $height = 48)
    {
        $CI =& get_instance();
        $html = "";

        $logo =   $CI->Logo_model->getlogo();
        $html .= '<a href="../../" title="logo"><img class="logo" src="'.$logo['logo'].'" style="width:'.$width.'px;height:'.$height.'px"></a>';
        return $html;
    }
     //get social network
    public function get_social()
    {
        $CI =& get_instance();
        $html = "";

        $social =   $CI->Social_model->getsocial();

      

        if($social['facebook'] != ''){
            $html .= '<a class="facebook" target="_blank" href="'.$social['facebook'].'">';
            $html .= '<span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                      </span>';
            $html .= '</a>';
 
        }
       
        if($social['twitter'] != ''){
            $html .= '<a class="twitter" target="_blank" href="'.$social['twitter'].'">';
            $html .= '<span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                      </span>';
            $html .= '</a>';
 
        }
        if($social['linkedin'] != ''){
            $html .= '<a class="linkedin" target="_blank" href="'.$social['linkedin'].'">';
            $html .= '<span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                      </span>';
            $html .= '</a>';
 
        }
        if($social['google'] != ''){
            $html .= '<a class="google" target="_blank" href="'.$social['google'].'">';
            $html .= '<span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                      </span>';
            $html .= '</a>';
 
        }
        return $html;
    }
	//end
}

