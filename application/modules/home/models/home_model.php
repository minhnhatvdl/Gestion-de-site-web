<?php
	class Home_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		//get page from id
		public function get($id = 1){
			return $this->db->select('id, title, content')->from('page')->where('id', $id)->get()->row_array();
		}
		//get total rows in table page
		public function totalrow(){
			return $this->db->from('page')->count_all_results();
		}
		//get all database
		public function alldata(){
			return $this->db->select('id, title, content')->from('page')->get()->result_array();
		}
		
	//end    
	}
?>
