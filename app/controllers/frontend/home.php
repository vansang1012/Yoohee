<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index(){
		if($this->input->post('submit')){
			$post_data = $this->input->post('data');
			$data['post_data'] = $post_data;
			$this->form_validation->set_rules('data[email]', 'Email', 'trim|valid_email|required');

			$this->form_validation->set_error_delimiters('<li>', '</li>');
			if($this->form_validation->run() == TRUE){
				$post_data['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
				$this->db->insert('email', $post_data);
				die($this->lib_common->js_redirect('', 'Cảm ơn bạn đã đăng ký thành công!'));
			}
		}
		if(isset($_GET['s'])&&count($_GET['s'])){
		$keyword = $_GET['s'];
		$page=0;
		if(isset($_GET['p'])&&count($_GET['p'])){$page = $_GET['p']; $page = isset($page)?(int)$page:0;}
		$query_sql = 'SELECT * FROM '.CMS_PREFIX.'sanpham_item WHERE (`title` LIKE ? OR `description` LIKE ? OR `content` LIKE ?)';
		$query_param = array('%'.$keyword.'%', '%'.$keyword.'%', '%'.$keyword.'%');
		$config['total_rows'] = $this->db->query($query_sql, $query_param)->num_rows();
		$config['base_url'] = CMS_URL.'?s='.urlencode($keyword).'&p=';
		$config['per_page'] = 20;
		$total = ceil($config['total_rows']/$config['per_page']);
		$page = ($page <= 0)?1:$page;
		$page = ($page >= $total)?$total:$page;
		$config['cms_cur_page'] = $page;
		if($total > 0){
			$page = $page - 1;
			$this->pagination->initialize($config);
			$query_sql = 'SELECT * FROM '.CMS_PREFIX.'sanpham_item WHERE (`title` LIKE ? OR `description` LIKE ? OR `content` LIKE ?) LIMIT '.($page * $config['per_page']).', '.$config['per_page'];
			$query_param = array('%'.$keyword.'%', '%'.$keyword.'%', '%'.$keyword.'%');
			$data['data']['list'] = $this->db->query($query_sql, $query_param)->result_array();
			$data['data']['pagination'] = $this->pagination->create_links();
			$data['data']['total_rows'] = $config['total_rows'];
			$data['data']['per_page'] = $config['per_page'];
			$data['data']['page'] = $page;
		}
		$data['data']['keyword']=$keyword;
		$data['data']['meta_title'] = 'Tìm kiếm từ khóa '.$keyword.(($page > 0)?' - trang '.($page+1):'');
		$data['data']['meta_keywords'] = $keyword;
		$data['data']['meta_description'] = 'Tổng hợp bài viết cho từ khóa '.$keyword.', những bài viết hay cho từ khóa '.$keyword.' dành cho bạn.';
		$data['data']['canonical'] =($page > 0)?CMS_URL.'?s='.$keyword.'&p='.($page):CMS_URL.'?s='.$keyword;
		$data['data']['rel_prev'] = ($page > 0)?CMS_URL.'?s='.$keyword.'&p='.($page+1):'';
		$data['data']['rel_next'] = ($page < ($total - 1))?CMS_URL.'?s='.$keyword.'&p='.($page+2):'';
		$data['template'] = 'frontend/sanpham/search';
		$this->load->view('frontend/layouts/home', $data);
		}else{
		// $SSL_test = $_SERVER['HTTPS'];
		// if($SSL_test == false) {
		//     header("Location: ".CMS_URL);die;
		// }
		$data['data']['meta_title'] = $this->system['meta_title'];
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = $this->system['meta_description'];
		$data['data']['canonical'] = CMS_URL;
		$data['data']['google_authorship'] = $this->system['google_authorship'];

			$data['template'] = 'frontend/home/index';
			$this->load->view('frontend/layouts/home', $data);
		}
	}
	public function about(){
		$data['data']['meta_title'] = $this->system['meta_title'];
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = $this->system['meta_description'];
		$data['data']['canonical'] = CMS_URL;

		$data['data']['google_authorship'] = $this->system['google_authorship'];


		$_lang = $this->session->userdata('_lang');
		if($_lang=='jp'){
			$data['template'] = 'frontend_jp/home/about';
			$this->load->view('frontend_jp/layouts/home', $data);
		}else{
			$data['template'] = 'frontend/home/about';
			$this->load->view('frontend/layouts/home', $data);
		}
	}
	public function locduan(){
		$data['data']['meta_title'] = $this->system['meta_title'];
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = $this->system['meta_description'];
		$data['data']['canonical'] = CMS_URL;
		if(isset($_POST['project']) && $_POST['project']!=0){
			//die($this->lib_common->js_redirect('admin-global-security',''));
		}
		$data['data']['google_authorship'] = $this->system['google_authorship'];
		$data['template'] = 'frontend/home/locduan';
		$this->load->view('frontend/layouts/home', $data);
	}
	public function getquanhuyen(){
		$country=$_GET["country"];
		echo '<select name="district" class="form-control">' . "\n";
		echo '<option selected="selected" value="">== Quận/Huyện ==</option>' . "\n";
		$district=$this->db->select('*')->from('district')->where(array('provinceid'=>$country))->order_by('type asc')->get()->result_array();
		if(isset($district) && count($district)){ foreach($district as $key => $val){
		echo '<option value="'.$val['districtid'].'">'.$val['type'].' '.$val['name'].'</option>' . "\n";
		} }
		echo '</select>';
	}
	public function getquanhuyenadmin(){
		$country=$_GET["country"];
		echo '<select name="data[district]" class="select" style="height: 30px;width: 100%;">' . "\n";
		echo '<option selected="selected" value="">== Quận/Huyện ==</option>' . "\n";
		$district=$this->db->select('*')->from('district')->where(array('provinceid'=>$country))->order_by('type asc')->get()->result_array();
		if(isset($district) && count($district)){ foreach($district as $key => $val){
		echo '<option value="'.$val['districtid'].'">'.$val['type'].' '.$val['name'].'</option>' . "\n";
		} }
		echo '</select>';
	}


}
