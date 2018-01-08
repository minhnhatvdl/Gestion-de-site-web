<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Logo extends CI_Controller{ 

	public function __construct(){ 
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Logo_model');
		$this->load->database();
		//initial data
		if($this->Logo_model->totalrow() == 0){
			$this->Logo_model->initial();
		}

	} 
//page general
	public function index(){
		$data['title'] = 'Logo';
		$data['root'] = 'logo';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
	//add a logo
	public function add(){
		//click submit
		if($this->input->post('submit')){
			//test input
			$this->form_validation->set_rules('logo','logo','trim|required');
			//model error
			$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
					<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>', '</div></div>');
			if ($this->form_validation->run())	
				{
					$data['valid'] = "true";
					$result = $this->Logo_model->add();
					$this->session->set_flashdata('flash_data',$result);
					redirect('page/view');
				}
		}

		$data['title'] = 'Add a logo';
		$data['current'] = 'add-a-logo';
		$data['root'] = 'logo';
		$data['template'] = 'add-a-logo';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
} 
?>