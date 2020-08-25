<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lang extends MY_Controller {

	public function swichlang($langcode='en'){
		$this->session->set_userdata('_lang', $langcode);
		die($this->lib_common->js_redirect(''));
		
	}

}