<?php
	class Admin extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}

		//admin
		public function index(){
			$data['title'] = 'Admin';
			$data['current'] = 'admin';
			$this->load->view('index-backend.php', isset($data)? $data:NULL);
		}

	}
?>