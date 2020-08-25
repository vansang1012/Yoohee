<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends MY_Controller {

	public $auth;

	public function __construct(){
		parent::__construct();
		$this->auth = $this->lib_authentication->check();
		if($this->auth == NULL) die($this->lib_common->js_redirect(CMS_BACKEND.'/authentication/login'.CMS_SUFFIX));
	}

	// Tinh chỉnh đối tượng
	public function set($table = '', $field = '', $id){
		$row = $this->db->select($field)->where(array('id' => $id))->from($table)->get()->row_array();
		$value = ($row[$field] == 0)?1:0;
		$this->db->where(array('id' => $id))->update($table, array($field => $value));
		echo $value;
	}
	//THỬ NGHIỆM TRUYỀN DỮ LIỆU BẰNG HEADER THỦ CÔNG THAY THẾ CHO PHƯƠNG THỨC AJAX
	public function picsaca($table = '', $id){
		$row = $this->db->where(array('id' => $id))->from($table)->get()->row_array();
					if(preg_match('/googleusercontent/',$row['image']))
					{
						$value=1;
					}else $value=0;
		$this->load->library('lib_google');
		$this->lib_google->chemgio($id);
		echo $value;
	}
	public function picsacas($table = '', $id){
		$row = $this->db->where(array('id' => $id))->from($table)->get()->row_array();
		$val=$this->lib_craw->do_upload($row['image']);
		$this->db->where(array('id' => $id))->update($table, array('image' => $val));
	}

	// Sắp xếp đối tượng
	public function order($table = ''){
		$order = $this->input->post('order');
		if(isset($order) && count($order)){
			foreach($order as $key => $val){
				$this->db->where(array('id' => $key))->update($table, array('order' => $val));
			}
		}
	}

	// Xuất bản đối tượng
	public function publish($table = ''){
		$checkbox = $this->input->post('checkbox');
		if(isset($checkbox) && count($checkbox)){
			foreach($checkbox as $key => $val){
				$this->db->where(array('id' => $val))->update($table, array('publish' => 1));
			}
		}
	}

	// Dừng xuất bản đối tượng
	public function unpublish($table = ''){
		$checkbox = $this->input->post('checkbox');
		if(isset($checkbox) && count($checkbox)){
			foreach($checkbox as $key => $val){
				$this->db->where(array('id' => $val))->update($table, array('publish' => 0));
			}
		}
	}

	// Xóa đối tượng
	public function delete($table = ''){
		$checkbox = $this->input->post('checkbox');
		if(isset($checkbox) && count($checkbox)){
			foreach($checkbox as $key => $val){
					
				$this->db->delete($table, array('id' => $val));
			}
		}
	}
	// Xóa dữ liệu
	public function delete_craw($table = ''){
		$checkbox = $this->input->post('checkbox');
		if(isset($checkbox) && count($checkbox)){
			foreach($checkbox as $key => $val){
			$linkanh=$this->db->select('image')->from(CMS_PREFIX.'craw_item')->where(array('id'=>$val))->get()->result_array();
				$dir = $linkanh;
				unlink($dir);
				$this->db->delete($table, array('id' => $val));
				
			}
		}
	}
	//THỬ NGHIỆM TRUYỀN DỮ LIỆU BẰNG HEADER THỦ CÔNG THAY THẾ CHO PHƯƠNG THỨC AJAX
	public function craw_picsaca($table = ''){
		$checkbox = $this->input->post('checkbox');
		if(isset($checkbox) && count($checkbox)){
			foreach($checkbox as $key => $val){
				$this->load->library('lib_google');
				$this->lib_google->chemgio($val);
				
			}
		}
	}
	// Xóa dữ liệu
	public function delete_picsaca($ts){
		$checkbox = $this->input->post('checkbox');
		if(isset($checkbox) && count($checkbox)){
				$this->load->library('lib_google');
				$this->lib_google->picsaca_delete_photo($checkbox);
		}
		if($ts==1){
			$this->load->library('lib_google');
			$this->lib_google->picsaca_feed_photo('5987655189048433073','10');
				}
	}
	// cào dữ liệu
	public function caodulieu($table = ''){
		$checkbox = $this->input->post('checkbox');
		if(isset($checkbox) && count($checkbox)){
			foreach($checkbox as $key => $val){
				$this->lib_craw->craw($val);
			}
			//header('Location:'.CMS_URL.CMS_BACKEND.'/picsaca/chemgiovl.html');
		}
		
		
	}
	
	// Ghi đối tượng vào đâu đó
	public function ghidulieu($table = ''){
		$checkbox = $this->input->post('checkbox');
		if(isset($checkbox) && count($checkbox)){
			foreach($checkbox as $key => $val){
				//$this->db->delete($table, array('id' => $val));
			}
		}
	}

	// Xóa đối tượng category
	public function deletecategory($table = ''){
		$checkbox = $this->input->post('checkbox');
		if(isset($checkbox) && count($checkbox)){
			$error = '';
			foreach($checkbox as $key => $val){
				$data = $this->db->select('title, lft, rgt')->from($table)->where(array('id' => $val))->get()->row_array();
				if(isset($data) && count($data)){
					$chidren = $this->db->select('id')->from($table)->where(array('lft >' => $data['lft'], 'lft <' => $data['rgt']))->get()->result_array();
					if(isset($chidren) && count($chidren)){
						$error = $error . 'Không thể xóa '.$data['title'].' vì danh mục vẫn còn node con.'."\n";
					}
					else{
						$this->db->delete($table, array('id' => $val));
						$this->db->delete(str_replace('category', 'item', $table), array('parentid' => $val));
					}
				}
			}
			echo $error;
		}
	}
}