<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends CI_Controller {
	public function __construct() {
	parent::__construct();
		$this->load->model('Upload_model');
		$config['upload_path'] = realpath(APPPATH.'../upload');
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '204800';
		$this->load->library('upload', $config);
	}
	public function index()
		{
			$this->load->view('upload_form',array('error' => ' ' ));
			//                
			//                echo realpath(APPPATH).'\upload';
			//                exit;
		}
	public function do_upload(){
	if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			foreach ($error as $item => $value){
			echo'<ol class="alert alert-danger"><li>'.$value.'</ol></li>';
			}
			exit;
		}else{
			$upload_data = array('upload_data' => $this->upload->data());
			foreach ($upload_data as $key=> $value){
			$image =  $value['file_name'];
			$name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $value['file_name']);
			$data = array(
			'path' => $image,
			'name'=>$name
			);
			//$this->db->insert('gallery', $data);
			}
			echo'<h4 style="color:green">Image uploaded Succesfully</h4>';
			exit;
		}
	}
	function fillGallery(){
		$uploadpath = base_url().'upload/';
		$rs = $this->db->get('gallery');
		foreach ($rs->result() as $row) {
		$src= $uploadpath.$row->path;
		$alt = $row->name;
		$lid = $row->id.'g';
		echo "<li class='thumbnail' id='$lid'>
		<span id='$row->id' class='btn btn-info btn-block btn-delete'><i class='glyphicon glyphicon-remove'></i>&nbsp;&nbsp;&nbsp;Delete</span>
		<img src='$src' alt='$alt' style='height: 150px; width: 150px'>
		<span class='btn btn-warning btn-block'>$alt</span></li>";
		}
	}
	function deleteimg(){
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('gallery'); 
		echo'<h4 style="color:green">This image deleted successfully</h4>';
		exit;
	}
}