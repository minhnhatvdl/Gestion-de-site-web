<?php
	class Page_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->library('mypage');
		}
		//insert a page into table Page
		public function add(){
			//find idmax in database
			$idlink =  (string)($this->mypage->idmax() + 1);
			$data = array(
				'title' => $this->input->post('title'),
				'link' => '../../index.php/home/'.$idlink.'-'.$this->input->post('link'),
				'content' => $this->input->post('txt_content')
			);
			$this->db->insert('page', $data);
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Insert a page successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Error' );
			}
		}
		//insert a page into table Page
		public function update($id = 0){
			$data = array(
				'title' => $this->input->post('title'),
				'link' => '../../index.php/home/'.$id.'-'.$this->input->post('link'),
				'content' => $this->input->post('txt_content')
			);
			$data2 = array(
				'link' => '../../index.php/home/'.$id.'-'.$this->input->post('link')
			);
			
			$this->db->update('category', $data2, array('pageid' => $id));
			$this->db->update('page', $data, array('id' => $id));
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Update a page successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Nothing updated' );
			}
		}
		//delete a page into table Page
		public function delete($id = 0){
			//delete a page
			$this->db->delete('page', array('id' => $id)); 
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Delete a page successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Error' );
			}
		}
		//get data from database
		public function view($per_page, $page){
			return $this->db->select('id, link, title, content')->from('page')->limit($per_page, $per_page*($page-1))->order_by('id desc')->get()->result_array();
		}
		//get id page
		public function get($id = 0){
			return $this->db->select('id, link, title, content')->from('page')->where('id', $id)->get()->row_array();
		}
		//get total rows in table Page
		public function totalrow(){
			return $this->db->from('page')->count_all_results();
		}
		//get all database
		public function alldata(){
			return $this->db->select('id, link, title, content')->from('page')->get()->result_array();
		}
	//end    
	}
?>
