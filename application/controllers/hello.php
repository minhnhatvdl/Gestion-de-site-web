<?php
	class Hello extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
		}
		public function index($id = 0, $name = ''){
			echo "<h1>Hello CodeIgniter Framework!!!</h1>";
			echo '$id = '.$id.' - $name ='.$name;
			
		}
		public function srweb(){
			echo "<h2>Minh Nhat</h2>";
			$data['title'] = "SRWeb";
			$data['user'] = array('name' => "minhnhat", 'password' => "12345", 'level' => "2");
			$this->load->view("read_view",$data);
		}
		public function index1(){
			$this->load->database();
			echo "Database";
			$query = $this->db->query('select * from person');
			$data = $query->row_array();
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			echo $query->num_rows();
		}
	}
?>