<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Home extends CI_Controller{ 

	public function __construct(){ 
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->library('form_validation');
        $this->load->library('myhome');
		$this->load->model('Home_model');
		$this->load->model('Category/Category_model');
		$this->load->database();
	} 
	public function index($page = '1-Home'){ 
        $id = explode('-', $page);
        $id = intval($id[0]);
		//get content of page
		$data['id'] = $id;
		$data['page'] = $this->Home_model->get($id);
		//if no data, comeback to home
		(empty($data['page']))? redirect(''):'';
		//title of page
		$data['title'] = $data['page']['title'];
		//content of page
		$pattern = "/\[\w+\]/";
		$result = preg_match_all($pattern, $data['page']['content'], $matches);
		if($result != 0){
			foreach ($matches[0] as $key => $value) {
				$pattern1 = "/\w+/";
				$result1 = preg_match_all($pattern1, $value, $matches1);
				$str = (string)$matches1[0][0];
				$data['page']['content'] = str_replace($value, '<?php include "plugin/'.$matches1[0][0].'/index.php"; ?>', $data['page']['content']);
			}
		}
		//load to view
		$this->load->view('index.php', isset($data)? $data:NULL);
	} 
	
} 
?>