<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ykien extends MY_Controller{

	public $auth;
	public $menu_active;

	public function __construct(){
		parent::__construct();
		$this->auth = $this->lib_authentication->check();
		if($this->auth == NULL) die($this->lib_common->js_redirect(CMS_BACKEND.'/home/index'.CMS_SUFFIX));
		$this->menu_active = 'menu-caidat';
	}

	public function add(){
		$data['meta_title'] = 'Thêm ý kiến mới';
		$data['meta_keywords'] = '';
		$data['meta_description'] = '';
		if($this->input->post('add')){
			$post_data = $this->input->post('data');
			$post_data = $this->lib_post->allows($post_data, array('fullname','image', 'notes', 'address', 'phone', 'email', 'publish'));
			$data['data']['post_data'] = $post_data;
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			$this->form_validation->set_rules('data[fullname]', 'Tên chuyên gia', 'trim|required');
			$this->form_validation->set_rules('data[address]', 'Chức danh', 'trim|required');
			$this->form_validation->set_rules('data[notes]', 'Nội dung', 'trim|required');
			$this->form_validation->set_rules('data[image]', 'Hình ảnh', 'trim|required');
			if($this->form_validation->run() == TRUE){
				$post_data['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
				$post_data['userid_created'] = $this->auth['id'];
				$this->db->insert('ykien', $post_data);
				die($this->lib_common->js_redirect(CMS_BACKEND.'/ykien/index'.CMS_SUFFIX, 'Thêm ý kiến mới thành công.'));
			}
		}
		$data['menu_active'] = $this->menu_active;
		$data['template'] = 'backend/ykien/add';
		$this->load->view('backend/layouts/home', $data);
	}

	public function edit($id = 0){
		$id = (int)$id;
		$ykien = $this->db->select('fullname,image, notes, address, phone, email, publish')->where(array('id' => $id))->from('ykien')->get()->row_array();
		if(!isset($ykien) || count($ykien) == 0) die($this->lib_common->js_redirect(CMS_BACKEND.'/ykien/index'.CMS_SUFFIX, 'ý kiến không tồn tại.'));
		$data['meta_title'] = 'Thay đổi thông tin ý kiến';
		$data['meta_keywords'] = '';
		$data['meta_description'] = '';
		if($this->input->post('add')){
			$post_data = $this->input->post('data');
			$post_data = $this->lib_post->allows($post_data, array('fullname','image', 'notes', 'address', 'phone', 'email', 'publish'));
			$data['data']['post_data'] = $post_data;
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			$this->form_validation->set_rules('data[fullname]', 'Tên chuyên gia', 'trim|required');
			if($this->form_validation->run() == TRUE){
				$post_data['updated'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
				$post_data['userid_updated'] = $this->auth['id'];
				$this->db->where(array('id' => $id))->update('ykien', $post_data);
				die($this->lib_common->js_redirect(CMS_BACKEND.'/ykien/index'.CMS_SUFFIX, 'Thay đổi thông tin ý kiến thành công.'));
			}
		}
		else{
			$data['data']['post_data'] = $ykien;
		}
		$data['menu_active'] = $this->menu_active;
		$data['template'] = 'backend/ykien/edit';
		$this->load->view('backend/layouts/home', $data);
	}

	public function index(){
		$data['meta_title'] = 'Quản lý ý kiến';
		$data['meta_keywords'] = '';
		$data['meta_description'] = '';
		$sort = $this->lib_common->sort_field('ykien');
		$page = $this->input->get('page'); $page = isset($page)?(int)$page:0;
		$keyword = $this->input->get('keyword');
		$config['use_page_numbers'] = TRUE;
		if(!empty($keyword)){
			$query_sql = 'SELECT * FROM '.CMS_PREFIX.'ykien WHERE (`fullname` LIKE ? OR `notes` LIKE ? OR `address` LIKE ? OR `phone` LIKE ? OR `email` LIKE ?)';
			$query_param = array('%'.$keyword.'%', '%'.$keyword.'%', '%'.$keyword.'%', '%'.$keyword.'%', '%'.$keyword.'%');
			$config['total_rows'] = $this->db->query($query_sql, $query_param)->num_rows();
			$config['base_url'] = CMS_BACKEND.'/ykien/index'.CMS_SUFFIX.'?keyword='.urlencode($keyword).'&';
		}
		else{
			$config['total_rows'] = $this->db->from('ykien')->count_all_results();
			$config['base_url'] = CMS_BACKEND.'/ykien/index'.CMS_SUFFIX.'?';
		}
		$config['per_page'] = 10000;
		$total = ceil($config['total_rows']/$config['per_page']);
		$page = ($page <= 0)?1:$page;
		$page = ($page >= $total)?$total:$page;
		$config['cms_cur_page'] = $page;
		if($total > 0){
			$page = $page - 1;
			$this->pagination->initialize($config);
			if(!empty($keyword)){
				$data['data']['full_data'] = $this->db->query($query_sql, $query_param)->result_array();
			}
			else{
				$data['data']['full_data'] = $this->db->from('ykien')->limit($config['per_page'], $page * $config['per_page'])->order_by($sort['field'].' '.$sort['sort'])->get()->result_array();
			}
			$data['data']['full_page'] = $this->pagination->create_links();
			$data['data']['total_rows'] = $config['total_rows'];
			$data['data']['per_page'] = $config['per_page'];
			$data['data']['page'] = $page;
		}
		$data['data']['keyword'] = $keyword;
		$data['data']['sort'] = $sort;
		$data['menu_active'] = $this->menu_active;
		$data['template'] = 'backend/ykien/index';
		$this->load->view('backend/layouts/home', $data);
	}

}