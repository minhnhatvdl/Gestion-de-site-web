<?php
	class Page extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper(array('form','url'));
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->library('mypage');
			$this->load->database();
			$this->load->model('Page_model');
			$this->load->library('pagination');
		}
		//page general
		public function index(){
			$data['title'] = 'Page';
			$data['root'] = 'page';
			$this->load->view('index-backend.php', isset($data)? $data:NULL);
		}
		//page add an Page
		public function add(){
			//click submit
			if($this->input->post('submittt')){
				//test input
				$this->form_validation->set_rules('title','title','trim|required');
				$this->form_validation->set_rules('link','link','trim|required');
				$this->form_validation->set_rules('txt_content','content','trim');
				//model error
				$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
						<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>', '</div></div>');
				if ($this->form_validation->run())	
					{
						$data['valid'] = "true";
						$result = $this->Page_model->add();
						$this->session->set_flashdata('flash_data',$result);
						redirect('page/view');
					}
			}
			
			$data['title'] = 'Add a page';
			$data['current'] = 'add-a-page';
			$data['root'] = 'page';
			$data['template'] = 'add-a-page';
			$this->load->view('index-backend.php', isset($data)? $data:NULL);
		}
		//page view
		public function view($page = 1){
			//select all databse
			$data['list_page'] = $this->Page_model->alldata();
			
			$data['title'] = 'View all pages';
			$data['current'] = 'all-pages';
			$data['root'] = 'page';
			$data['template'] = 'view-all-pages';
			$this->load->view('index-backend.php', isset($data)? $data:NULL);
		}
		//page edit
		public function edit($id = 0){
			//click submit
			if($this->input->post('submittt')){
				//test input
				$this->form_validation->set_rules('title','title','trim|required');
				$this->form_validation->set_rules('link','link','trim|required');
				$this->form_validation->set_rules('txt_content','content','trim');
				//model error
				$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
						<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>', '</div></div>');
				if ($this->form_validation->run())	
					{
						$data['valid'] = "true";
						$result = $this->Page_model->update($id);
						$this->session->set_flashdata('flash_data', $result);
						redirect('page/view');
					}
			}
			//select a page fromm id
			$page = $this->Page_model->get($id);
			if(!empty($page)){
				$data['page'] = $page;
				if(strpos($data['page']['link'], "-") == 0) $data['page']['link'] = "";
					else $data['page']['link'] = substr($data['page']['link'], strpos($data['page']['link'], "-") + 1);
			} else redirect('page/view');

			$data['title'] = 'Edit a page';
			$data['current'] = 'edit-a-page';
			$data['root'] = 'page';
			$data['template'] = 'edit-a-page';
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
						$result = $this->Page_model->delete($id);
						$this->session->set_flashdata('flash_data', $result);
						redirect('page/view');
					}
			}
			//select a page fromm id
			$page = $this->Page_model->get($id);
			(empty($page))? redirect('page/view'):$data['page'] = $page;
		
			$data['title'] = 'Delete a page';
			$data['current'] = 'delete-a-page';
			$data['root'] = 'page';
			$data['template'] = 'delete-a-page';
			$this->load->view('index-backend.php', isset($data)? $data:NULL);
		}
	//end	
	}
?>