<?php
	class Element_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		public function ini(){
			$data = array(
				'tag' => 'html',
				'parentid' => 0
			);
			$this->db->insert('element', $data);
		}
		//insert an element into table element
		public function add(){
			$data = array(
				'tag' => $this->input->post('tag'),
				'parentid' => $this->input->post('parentid')
			);
			$this->db->insert('element', $data);
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Insert an element successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Error' );
			}
		}
		//get data from database
		public function view($per_page, $page){
			return $this->db->select('id, tag, parentid')->from('element')->limit($per_page, $per_page*($page-1))->order_by('id desc')->get()->result_array();
		}
		//get id element
		public function get($id = 0){
			return $this->db->select('id, tag, parentid')->from('element')->where('id', $id)->get()->row_array();
		}
		//get total rows in table element
		public function totalrow(){
			return $this->db->from('element')->count_all_results();
		}
		//get all database
		public function alldata(){
			return $this->db->select('id, tag, parentid')->from('element')->get()->result_array();
		}
	//end    
	}
?>
