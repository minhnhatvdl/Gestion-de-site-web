<?php
	class Logo_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		//initial data
		public function initial(){
			$data = array(
				'logo' => '../application/views/images/logo.png'
			);
			$this->db->insert('logo', $data);
		}
		//insert a logo
		public function add(){
			$data = array(
				'logo' => $this->input->post('logo')
			);
			
			$this->db->update('logo', $data);
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Update a logo successfully' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Nothing updated' );
			}
		}
		
		//get total rows in table Logo
		public function totalrow(){
			return $this->db->from('logo')->count_all_results();
		}
		public function getlogo(){
			return $this->db->from('logo')->get()->row_array();
		}
	//end    
	}
?>
