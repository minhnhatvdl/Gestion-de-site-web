<?php
	class Social_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		//initial data
		public function initial(){
			$data = array(
				'facebook' => '',
				'twitter' => '',
				'linkedin' => '',
				'google' => ''
			);
			$this->db->insert('social', $data);
		}
		//insert social
		public function add(){
			$data = array(
				'facebook' => $this->input->post('facebook'),
				'twitter' => $this->input->post('twitter'),
				'linkedin' => $this->input->post('linkedin'),
				'google' => $this->input->post('google')
			);
			
			$this->db->update('social', $data);
			//test data insert
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type' => 'success',
					'message' => 'Social network created' );
			} else {
				return array(
					'type' => 'error',
					'message' => 'Nothing updated' );
			}
		}
		//get total rows in table Logo
		public function totalrow(){
			return $this->db->from('social')->count_all_results();
		}
		public function getsocial(){
			return $this->db->from('social')->get()->row_array();
		}
	//end    
	}
?>
