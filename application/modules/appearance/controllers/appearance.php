<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Appearance extends CI_Controller{ 

	public function __construct(){ 
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
	} 
	public function index(){ 
		$data['title'] = 'Appearance';
		$data['root'] = 'appearance';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	} 
	public function editor(){
		$data['title'] = 'Editor';
		$data['root'] = 'appearance';
		$data['current'] = 'editor';
		$data['template'] = 'editor';
		$this->load->view('index-backend.php', isset($data)? $data:NULL);
	}
	//end
} 
?>