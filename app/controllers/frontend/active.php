<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Active extends CI_Controller{

	public function index($param = ''){
		$trangthai=$this->db->SELECT('web,publish')->FROM('active')->WHERE(array('web' => $param, ))->get()->row_array();
		if (isset($trangthai) && count($trangthai)>0) {
			echo $trangthai['publish'];
		}else echo '0';
	}
	public function key($param = ''){
		$trangthai=$this->db->SELECT('web,code')->FROM('active')->WHERE(array('web' => $param, ))->get()->row_array();
		if (isset($trangthai) && count($trangthai)>0) {
			echo $trangthai['code'];
		}else echo '0';
	}
	public function mes($param = ''){
		$trangthai=$this->db->SELECT('web,status')->FROM('active')->WHERE(array('web' => $param, ))->get()->row_array();
		if (isset($trangthai) && count($trangthai)>0) {
			echo $trangthai['status'];
		}else echo '<p><span style="font-size: large;"><strong>Trang web của bạn chưa được đăng ký trên hệ thống của chúng tôi, vui lòng liên hệ bộ phận kỹ thuật.</strong></span></p>
<p><span style="font-size: large; color: red;"><strong>HOTLINE : 0986.051.575</strong></span></p>';
	}
}