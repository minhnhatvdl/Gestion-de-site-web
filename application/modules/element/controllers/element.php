<?php
	class Element extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->library('myelement');
			$this->load->database();
			$this->load->model('Element_model');
			$this->load->library('pagination');
			//inital database
			if($this->Element_model->totalrow() == 0) $this->Element_model->ini();
		}
		//page general
		public function index(){
			$data['title'] = 'Element';
			$data['root'] = 'element';
			$this->load->view('index.php', isset($data)? $data:NULL);
		}
		//page add an element
		public function add(){
			//click submit
			if($this->input->post('submit')){
				//test input
				$this->form_validation->set_rules('tag','tag','trim|required');
				$this->form_validation->set_rules('parentid','parent tag','trim|required|is_natural_no_zero');
				//model error
				$this->form_validation->set_error_delimiters('<div class="notification error png_bg">
						<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>', '</div></div>');
				if ($this->form_validation->run())	
					{
						$data['valid'] = "true";
						$result = $this->Element_model->add();
						$this->session->set_flashdata('flash_data',$result);
						redirect('element/view');
					}
			}
			
			//select all databse
			$alldata = $this->Element_model->alldata();
			//call recursive from library MyElement and send to view
			$data['recursive'] = $this->myelement->recursive(0, $alldata, "|----");

			$data['title'] = 'Add an element';
			$data['current'] = 'add-an-element';
			$data['root'] = 'element';
			$data['template'] = 'add-an-element';
			$this->load->view('index.php', isset($data)? $data:NULL);
		}
		//page view
		public function view($page = 1){
			//select all databse
			$alldata = $this->Element_model->alldata();
			
			//call function pagination from library MyElement
			$per_page = $this->myelement->pagination($page);
			//sent data to view
			//get data pagination
			$data['pagination'] = $this->pagination->create_links();
			/*
			//load data from model and send to view with pagination
			$data['list_tag'] = $this->Element_model->view($per_page, $page);
			print_r($data['list_tag']);
			*/
			//select all databse
			$alldata = $this->Element_model->alldata();
			//call recursive from library MyElement and send to view
			$data['list_tag'] = $this->myelement->recursive_view(0, $alldata, "|----");
			
			$data['title'] = 'View all elements';
			$data['current'] = 'all-elements';
			$data['root'] = 'element';
			$data['template'] = 'view-all-elements';
			$this->load->view('index.php', isset($data)? $data:NULL);
		}
	//end	
	}
?>