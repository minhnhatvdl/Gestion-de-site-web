<?php
	class Menu_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->model('Page/Page_model');
		}
		//insert a menu
		public function add(){
			$data = array(
				'title' => $this->input->post('title')
			);
			$this->db->insert('menu', $data);
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Insert a new menu successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Error' );
			}
		}
		//insert a category of a menu
		public function addcat($title = NULL, $link = NULL){
			$data = array(
				'title' => $title,
				'menuid' => $this->input->get('menuid'),
				'link' => $link,
				'pageid' => $this->input->post('title'),
				'parentid' => $this->input->post('parentid')
			);
			$this->db->insert('category', $data);
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Insert a category successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Error' );
			}
		}
		//delete a menu into table Menu
		public function delete($id = 0){
			//delete a menu
			$this->db->delete('category', array('menuid' => $id)); 
			$this->db->delete('menu', array('id' => $id)); 
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Delete a menu successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Error' );
			}
		}
		//delete a category
		public function deletecat($menuid = 1, $idcat = 0){
			//get id category
			$cat = $this->getcat($idcat);
			//get a menu
			$menu = $this->allcat($menuid);
			//delete a category
			$this->db->delete('category', array('idcat' => $idcat));
			foreach ($menu as $key => $value) {
				if($value['parentid'] == $cat['idcat']){
					$value['parentid'] = $cat['parentid'];
					$this->db->update('category', $value, array('idcat' => $value['idcat']));
				}
			}
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Delete a category successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Error' );
			}
		}
		//update a category
		public function updatecat($idcat = 0){
			$data = array(
				'title' => $this->input->post('title'),
				'link' => $this->input->post('link'),
				'parentid' => $this->input->post('parentid')
			);
			$this->db->update('category', $data, array('idcat' => $idcat));
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Update a category successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Nothing updated' );
			}
		}
		//get all database
		public function allmenu(){
			return $this->db->select('*')->from('menu')->get()->result_array();
		}
		//get all database
		public function allcat($menuid = 0){
			return $this->db->select('*')->from('category')->where('menuid', $menuid)->get()->result_array();
		}
		//get id menu
		public function get($id = 0){
			return $this->db->select('*')->from('menu')->where('id', $id)->get()->row_array();
		}
		//get id category
		public function getcat($idcat = 0){
			return $this->db->select('*')->from('category')->where('idcat', $idcat)->get()->row_array();
		}
	//end    
	}
?>
