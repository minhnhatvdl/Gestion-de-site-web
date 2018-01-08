<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Social extends CI_Controller{ 

	public function __construct(){ 
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Social_model');
		$this->load->database();
		//initial data
		if($this->Social_model->totalrow() == 0){
			$this->Social_model->initial();
		}

	} 
//page general
	public function index(){
		$data['title'] = 'Social';
		$data['root'] = 'social';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
	//add a social
	public function add(){
		//click submit
		if($this->input->post('submit')){
			//test input
			$this->form_validation->set_rules('facebook','facebook','trim');
			$this->form_validation->set_rules('twitter','twitter','trim');
			$this->form_validation->set_rules('google','google','trim');
			$this->form_validation->set_rules('linkedin','linkedin','trim');
			//model error
			$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
					<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>', '</div></div>');
			if ($this->form_validation->run())	
				{
					$data['valid'] = "true";
					$result = $this->Social_model->add();
					$this->session->set_flashdata('flash_data',$result);
					redirect('page/view');
				}
		}
		$data['social'] = $this->Social_model->getsocial();

		$data['title'] = 'Social';
		$data['current'] = 'add-social';
		$data['root'] = 'social';
		$data['template'] = 'add-social';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
} 
?>