<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MyPage {
	public function __construct() {
        $CI =& get_instance();
        $CI->load->model('Page_model');
    }
    //take a link continu
   	public function full_url(){
		$ssl = (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')? true:false;
		$sp = strtolower($_SERVER['SERVER_PROTOCOL']);
		$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl)? 's':'');

		$port = $_SERVER['SERVER_PORT'];
		$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
		$host = (isset($use_forwarded_host) && isset($_SERVER['HTTP_X_FORWARDED_HOST'])) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null);
		$host = isset($host) ? $host : $_SERVER['SERVER_NAME'] . $port;

		return $protocol . '://'. $host . $_SERVER['REQUEST_URI'];
	}
	//congiguration pagination
	public function pagination($page = 1){
		$CI =& get_instance();
		//total records
		$totalrow = $CI->Page_model->totalrow();

		$config['base_url'] = 'http://localhost/codeigniter-2.2.2/index.php/page/view/';
		$config['total_rows'] = $totalrow;
		$config['per_page'] = 5; 
		$config['num_links'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['cur_page'] = $page;

		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<a href="#" title="First Page">';
		$config['first_tag_close'] = '</a>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<a href="#" title="Last Page">';
		$config['last_tag_close'] = '</a>';

		$config['next_link'] = 'Next &raquo;';
		$config['next_tag_open'] = '<a href="#" title="Next Page">';
		$config['next_tag_close'] = '</a>';
		$config['prev_link'] = '&laquo; Previous';
		$config['prev_tag_open'] = '<a href="#" title="Previous Page">';
		$config['prev_tag_close'] = '</a>';

		$config['cur_tag_open'] = '<a href="#" class="number current">';
		$config['cur_tag_close'] = '</a>';
		//total page
		$totalpage = ceil($totalrow/$config['per_page']);

		if($page > $totalpage) $page = $totalpage;
			elseif($page < 1) $page = 1;
		//initial configuration
		$CI->pagination->initialize($config);
		return $config['per_page'];
	}
	
	public function idmax(){
		$CI =& get_instance();
		$data = $CI->Page_model->alldata();
		$idmax = 0;
		if (isset($data) && !empty($data)) {
			foreach ($data as $key => $value) {
				if($value['id'] >= $idmax) $idmax = $value['id'];
			}
		}
		return $idmax;
	}
	public function toUrl($str, $delimiter='-') {
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;
	}
	//end
}

/* End of file Someclass.php */