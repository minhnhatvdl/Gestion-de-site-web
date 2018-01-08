<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Menu extends CI_Controller{ 

	public function __construct(){ 
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Menu_model');
		$this->load->library('mymenu');
		$this->load->model('Page/Page_model');
		$this->load->database();
	} 
	public function index(){ 
		$data['title'] = 'Menu';
		$data['root'] = 'menu';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	} 
	//add a new menu
	public function add(){
		//click submit
		if($this->input->post('submit')){
			//test input
			$this->form_validation->set_rules('title','title','trim|required');
			//model error
			$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
					<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>', '</div></div>');
			if ($this->form_validation->run())	
				{
					$data['valid'] = "true";
					$result = $this->Menu_model->add();
					$this->session->set_flashdata('flash_data',$result);
					redirect('menu/view');
				}
		}
		
		$data['title'] = 'Add a new menu';
		$data['current'] = 'add-a-menu';
		$data['root'] = 'menu';
		$data['template'] = 'add-a-menu';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
	//page view
	public function view($page = 1){
		//select all databse
		$data['list_menu'] = $this->Menu_model->allmenu();
		
		$data['title'] = 'View all menus';
		$data['current'] = 'all-menus';
		$data['root'] = 'menu';
		$data['template'] = 'view-all-menus';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
	//end
	public function addcat(){
		//select all pages
		$allpage =  $this->Page_model->alldata();
		$data['list_page'] = $this->mymenu->getallpage($allpage);
		$data['list_link'] = $this->mymenu->getalllink($allpage);
		//click submit menu
		if($this->input->post('submit1')){

			//test input
			$this->form_validation->set_rules('menuid','menu','trim|required|is_natural_no_zero');
			//model error
			$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
					<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>', '</div></div>');
			if ($this->form_validation->run())	
				{
					//get menuid
					$menuid = $this->input->post('menuid');
					redirect("menu/addcat?menuid=$menuid");
				}
		}
		//click submit
		if($this->input->post('submit2')){
			//test input
			$this->form_validation->set_rules('title','title','trim|required|is_natural_no_zero');
			$this->form_validation->set_rules('parentid','parent category','trim|required');
			//model error
			$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
					<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>', '</div></div>');
			if ($this->form_validation->run())	
				{
					$data['valid'] = "true";
					$title = $data['list_page'][$this->input->post('title')];
					$link = $data['list_link'][$this->input->post('title')];

					$result = $this->Menu_model->addcat($title,$link);
					$this->session->set_flashdata('flash_data',$result);
					redirect('menu/view');
				}
		}
		//click submit
		if($this->input->post('submit3')){
			//test input
			$this->form_validation->set_rules('title','title','trim|required');
			$this->form_validation->set_rules('link','link','trim|required');
			$this->form_validation->set_rules('parentid','parent category','trim|required');
			//model error
			$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
					<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>', '</div></div>');
			if ($this->form_validation->run())	
				{
					$data['valid'] = "true";
					$title = $this->input->post('title');
					$link = $this->input->post('link');

					$result = $this->Menu_model->addcat($title,$link);
					$this->session->set_flashdata('flash_data',$result);
					redirect('menu/view');
				}
		}
		//select all menus
		$allmenu =  $this->Menu_model->allmenu();
		$data['list_menu'] = $this->mymenu->getallmenu($allmenu);
		//select all category
		$allcat = $this->Menu_model->allcat($this->input->get('menuid'));
		$data['recursive'] = $this->mymenu->recursive(0, $allcat, "|----");

		$data['title'] = 'Add a category';
		$data['current'] = 'add-a-cat';
		$data['root'] = 'menu';
		$data['template'] = 'add-a-cat';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
	//page delete
	public function delete($id = 0){
		//click submit
		if($this->input->post('submit')){
			//test input
			$this->form_validation->set_rules('title','title','trim|required');
			//model error
			$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
					<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>', '</div></div>');
			if ($this->form_validation->run())	
				{
					$data['valid'] = "true";
					$result = $this->Menu_model->delete($id);
					$this->session->set_flashdata('flash_data', $result);
					redirect('menu/view');
				}
		}
		//select a menu fromm id
		$menu = $this->Menu_model->get($id);
		(empty($menu))? redirect('menu/view'):$data['menu'] = $menu;
	
		$data['title'] = 'Delete a menu';
		$data['current'] = 'delete-a-menu';
		$data['root'] = 'menu';
		$data['template'] = 'delete-a-menu';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
	//page view
	public function viewcat($menuid = 1){
		//select all category
		$allcat = $this->Menu_model->allcat($menuid);
		$data['list_category'] = $this->mymenu->recursive_view(0, $allcat, "|----");

		$data['title'] = 'View all categorys';
		$data['current'] = 'all-categorys';
		$data['root'] = 'menu';
		$data['template'] = 'view-all-categorys';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
	//page delete
	public function deletecat($menuid = 1, $idcat = 0){
		//click submit
		if($this->input->post('submit')){
			//test input
			$this->form_validation->set_rules('title','title','trim|required');
			//model error
			$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
					<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>', '</div></div>');
			if ($this->form_validation->run()){
					$data['valid'] = "true";
					$result = $this->Menu_model->deletecat($menuid, $idcat);
					$this->session->set_flashdata('flash_data', $result);
					redirect('menu/view');
				}
		}
		//select a category
		$cat = $this->Menu_model->getcat($idcat);
		(empty($cat))? redirect('menu/view'):$data['cat'] = $cat;
	
		$data['title'] = 'Delete a category';
		$data['current'] = 'delete-a-category';
		$data['root'] = 'menu';
		$data['template'] = 'delete-a-category';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
	//page edit
	public function editcat($menuid = 1, $idcat = 0){
		//click submit
		if($this->input->post('submit')){
			//test input
			$this->form_validation->set_rules('title','title','trim|required');
			$this->form_validation->set_rules('link','link','trim|required');
			$this->form_validation->set_rules('parentid','parent category','trim|required');
			//model error
			$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
					<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>', '</div></div>');
			if ($this->form_validation->run())	
				{
					$data['valid'] = "true";

					$result = $this->Menu_model->updatecat($idcat);
					$this->session->set_flashdata('flash_data',$result);
					redirect('menu/view');
				}
		}
		//select a category
		$cat = $this->Menu_model->getcat($idcat);
		(empty($cat))? redirect('menu/view'):$data['cat'] = $cat;
		//select all category
		$allcat = $this->Menu_model->allcat($menuid);
		$data['recursive'] = $this->mymenu->recursive(0, $allcat, "|----");
	
		$data['title'] = 'Edit a category';
		$data['current'] = 'edit-a-category';
		$data['root'] = 'menu';
		$data['template'] = 'edit-a-category';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
} 
?>