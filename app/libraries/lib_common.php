<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Common{

	private $CI;

	public function __construct(){
		$this->CI =& get_instance();
	}
	
	public function js_redirect($url = '', $alert = ''){
		$alert = !empty($alert)?'alert(\''.$alert.'\'); ':'';
		return CMS_META.'<script type="text/javascript">'.$alert.'location.href=\''.CMS_URL.$url.'\';</script>';
	}
	
	public function php_redirect($url = '', $alert = ''){
		header("Location:".CMS_URL.$url);
		die;
	}
	
	public function sort_field($module = ''){
		$field = $this->CI->session->userdata($module.'_field');
		if($field == NULL){
			$field = 'id';
			$this->CI->session->set_userdata($module.'_field', 'id');
		}
		$sort = $this->CI->session->userdata($module.'_sort');
		if($sort == NULL){
			$sort = 'desc';
			$this->CI->session->set_userdata($module.'_sort', 'desc');
		}
		return array(
			'field' => $field,
			'sort' => $sort,
		);
	}

}