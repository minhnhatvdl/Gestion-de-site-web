<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MyMenu {
	public function __construct() {
        $CI =& get_instance();
        $CI->load->model('Menu_model');
        $html = "";
    }
	//get all pages
	public function getallpage($data = NULL){
		$this->getallpage[0] = "[Select a page]";
		if (isset($data) && !empty($data)) {
			foreach ($data as $key => $value) {
				$this->getallpage[$value['id']] = $value['title'];
			}
		return $this->getallpage;
		}
	}
	//get all pages title
	public function getallmenu($data = NULL){
		$this->getallmenu[0] = "[Select a menu]";
		if (isset($data) && !empty($data)) {
			foreach ($data as $key => $value) {
				$this->getallmenu[$value['id']] = $value['title'];
			}
		return $this->getallmenu;
		}
	}
	//get all pages link
	public function getalllink($data = NULL){
		$this->getalllink[0] = "[]";
		if (isset($data) && !empty($data)) {
			foreach ($data as $key => $value) {
				$this->getalllink[$value['id']] = $value['link'];
			}
		return $this->getalllink;
		}
	}
	//recursive category
	public function recursive($parentid = 0, $data = NULL, $text = "|----"){
		$this->recursive[0] = "[Choose a parent category]";
		if (isset($data) && !empty($data)) {
			foreach ($data as $key => $value) {
				if($value['parentid'] == $parentid){
					$this->recursive[$value['idcat']] = $text.$value['title'];
					$id = $value['idcat'];
					unset($data[$key]);
					$this->recursive($id, $data, $text."|----");
				}
			}
		}
		return $this->recursive;
	}

		//recursive data in view
	public function recursive_view($parentid = 0, $data = NULL, $text = "|----"){
		if (isset($data) && !empty($data)) {
			foreach ($data as $key => $value) {
				if($value['parentid'] == $parentid){
					$this->recursive[$value['idcat']] = $value;
					$this->recursive[$value['idcat']]['title'] = $text.$value['title'];
					$id = $value['idcat'];
					unset($data[$key]);
					$this->recursive_view($id, $data, $text."|----");
				}
			}
		return $this->recursive;
		}
	}
	//end
}

/* End of file Someclass.php */