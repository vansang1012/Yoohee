<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function admin(){
		$data['data']['meta_title'] = $this->system['meta_title'];
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = $this->system['meta_description'];
		$data['data']['canonical'] = CMS_URL;
		$data['data']['google_authorship'] = $this->system['google_authorship'];
		if (isset($_POST['submit'])) {
			if ($_POST['pass']=='admin2014') die($this->lib_common->js_redirect('admin-global-security',''));
		}
		$data['template'] = 'frontend/home/index';
		$this->load->view('frontend/index', $data);
	}

}