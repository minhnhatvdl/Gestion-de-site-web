<?php
	class Article extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}

		//admin
		public function index(){
			$this->load->view('article-template.php');
		}

	}
?>