<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sanpham extends MY_Controller{

		public function category($parentid = 0, $page = 1){
			
			if(!isset($_SESSION['sort'])) {
		      	$_SESSION['sort'] = 'id_desc';
		   	}
		   	if(isset($_POST['sort'])){
		   		$_SESSION['sort'] = $_POST['sort'];
		   		header('Location: '.CMS_URL.trim($_SERVER['REQUEST_URI'],'/'));
		   	}
			$parentid = (int)$parentid;
			$page = (int)$page;
			$category = $this->db->from('sanpham_category')->where(array('id' => $parentid, 'publish' => 1))->get()->row_array();
			$items = $this->db->from('sanpham_item')->where(array('parentid' => $category['id'], 'publish' => 1))->get()->result_array();
			if(count($items)==1){
				header("Location:".CMS_URL.helper_string_alias($items[0]['title']).'-ap'.$items[0]['id'].CMS_SUFFIX);die;
				}
			if(!isset($category) || count($category) == 0) die($this->lib_common->js_redirect(CMS_URL));
			
			$config['use_page_numbers'] = TRUE;
			if($category['rgt'] - $category['lft'] > 1){
				$children = $this->lib_nestedset->children('sanpham_category', array('lft >=' => $category['lft'], 'rgt <=' => $category['rgt']));
				$config['total_rows'] = $this->db->from('sanpham_item')->where(array('publish' => 1))->where_in('parentid', $children)->count_all_results();
			}
			else{
				$config['total_rows'] = $this->db->from('sanpham_item')->where(array('parentid' => $parentid, 'publish' => 1))->count_all_results();
			}
			$alias = $this->lib_string->alias($category['title']);
			$config['base_url'] = $alias.'-cp'.$category['id'].'-';
			$config['per_page'] = 20;
			$total = ceil($config['total_rows']/$config['per_page']);
			$page = ($page <= 0)?1:$page;
			$page = ($page >= $total)?$total:$page;
			$config['cms_cur_page'] = $page;
			if($total > 0){
				$page = $page - 1;
				$this->pagination->initialize($config);
				if($category['rgt'] - $category['lft'] > 1){
					$data['data']['list'] = $this->db->from('sanpham_item')->where(array('publish' => 1))->where_in('parentid', $children)->limit($config['per_page'], $page * $config['per_page'])->order_by(str_replace('_', ' ', $_SESSION['sort']))->get()->result_array();
				}
				else{
					$data['data']['list'] = $this->db->from('sanpham_item')->where(array('parentid' => $parentid, 'publish' => 1))->limit($config['per_page'], $page * $config['per_page'])->order_by(str_replace('_', ' ', $_SESSION['sort']))->get()->result_array();
				}
				$data['data']['pagination'] = $this->pagination->create_links();
				$data['data']['total_rows'] = $config['total_rows'];
				$data['data']['per_page'] = $config['per_page'];
				$data['data']['page'] = $page;
			}
			$data['data']['category'] = $category;
			$data['data']['meta_title'] = (!empty($category['meta_title'])?$category['meta_title']:$category['title']).(($page > 0)?' - trang '.($page+1):'');
			$data['data']['meta_keywords'] = $category['meta_keyword'];
			$data['data']['meta_description'] = (!empty($category['meta_description'])?$category['meta_description']:$this->lib_string->cutnchar(strip_tags($category['description']), 200)).(($page > 0)?' - trang '.($page+1):'');
			$data['data']['canonical'] = CMS_URL.(($page == 0)?$alias.'-cp'.$category['id']:$alias.'-sp'.$category['id'].'-p'.($page+1)).CMS_SUFFIX;
			$data['data']['rel_prev'] = ($page > 0)?CMS_URL.$alias.'-cp'.$category['id'].'-p'.($page).CMS_SUFFIX:'';
			$data['data']['rel_next'] = ($page < ($total - 1))?CMS_URL.$alias.'-c'.$category['id'].'-p'.($page+2).CMS_SUFFIX:'';
			$data['data']['children'] = ($category['rgt'] - $category['lft'] > 1)?$this->db->select('id, title')->from('sanpham_category')->where(array('parentid' => $parentid, 'publish' => 1))->get()->result_array():NULL;

				$data['template'] = 'frontend/sanpham/category';
				$this->load->view('frontend/layouts/category', $data);

	}
	public function GetImageFromUrl($link)

		{

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_POST, 0);

		curl_setopt($ch,CURLOPT_URL,$link);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$result=curl_exec($ch);

		curl_close($ch);

		return $result;

		}
	public function item($id = 0){
		$id = (int)$id;
		$item = $this->db->from('sanpham_item')->where(array('id' => $id, 'publish' => 1))->get()->row_array();
		if(!isset($item) || count($item) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$category = $this->db->from('sanpham_category')->where(array('id' => $item['parentid'], 'publish' => 1))->get()->row_array();
		if(!isset($category) || count($category) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$user = $this->db->select('username, fullname, author')->from('user')->where(array('id' => $item['userid_created']))->get()->row_array();
		if(!isset($user) || count($user) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$view_sanpham_item = $this->session->userdata('view_sanpham_item_'.$item['id']);
		$item['title'] = html_entity_decode($item['title'], ENT_QUOTES, 'UTF-8');
		$item['description'] = html_entity_decode($item['description'], ENT_QUOTES, 'UTF-8');
		$item['content'] = html_entity_decode($item['content'], ENT_QUOTES, 'UTF-8');
		$alias = $this->lib_string->alias($item['title']);
		if(!empty($item['image'])){
			$temp = substr($item['image'], 0, 7);
			if(in_array($temp, array('http://', 'https:/')) == TRUE){
				$ext = end(explode('.', $item['image']));
				$contents=$this->GetImageFromUrl($item['image']);
				$savefile = fopen('upload/crawler/'.$alias.'-a'.$item['id'].'.'.$ext, 'w');
				fwrite($savefile, $contents);
				fclose($savefile);
				$file = $alias.'-a'.$item['id'].'.'.$ext;
				//file_put_contents('crawler/'.$file, file_get_contents($item['image']));
				$this->db->where(array('id' => $item['id']))->update('sanpham_item', array('image' => 'upload/crawler/'.$file));
			}
		}
		if(!isset($view_sanpham_item) || empty($view_sanpham_item)){
			$this->session->set_userdata('view_sanpham_item_'.$item['id'], 'ok');
			$rand = rand(0, 5);
			$value = rand(3, 5);
			if($rand == 5){
				$this->db->set('rate_value', 'rate_value + '.$value, FALSE)->set('rate_total', 'rate_total + 1', FALSE)->where(array('id' => $id))->update('sanpham_item');
				$item['rate_value'] = $item['rate_value'] + $value;
				$item['rate_total'] = $item['rate_total'] + 1;
			}
			$this->db->set('viewed', 'viewed + 1', FALSE)->where(array('id' => $item['id']))->update('sanpham_item');
			$item['viewed']++;
		}
		if(!empty($item['tags'])){
			$tags = $this->lib_tags->tags($item['tags']);
			if(isset($tags) && count($tags)){
				$field = '';
				$query_param = NULL;
				$count = count($tags);
				foreach($tags as $key => $val){
					if($count == $key+1){
						$field = $field.'`tags` LIKE ?';
					}
					else{
						$field = $field.'`tags` LIKE ? OR ';
					}
					$query_param[] = '%'.$val.'%';
				}
				$query_sql = 'SELECT * FROM '.CMS_PREFIX.'sanpham_item WHERE ('.$field.') AND `id` != '.$item['id'].' LIMIT 0, 10';
				$data['data']['related'] = $this->db->query($query_sql, $query_param)->result_array();
			}
		}
		$data['data']['item'] = $item;
		$data['data']['category'] = $category;
		$data['data']['meta_title'] = (!empty($item['meta_title'])?$item['meta_title']:$item['title']);
		$data['data']['meta_keywords'] = $item['meta_keyword'];
		$data['data']['meta_description'] = (!empty($item['meta_description'])?$item['meta_description']:$this->lib_string->cutnchar(strip_tags($item['description']), 200));
		$data['data']['image'] = $item['image'];
		$data['data']['canonical'] = CMS_URL.$alias.'-a'.$item['id'].CMS_SUFFIX;
		$data['data']['children'] = ($category['rgt'] - $category['lft'] > 1)?$this->db->select('id, title')->from('sanpham_category')->where(array('parentid' => $category['id'], 'publish' => 1))->get()->result_array():NULL;
		$data['data']['same'] = $this->db->select('id, title, image')->from('sanpham_item')->where(array('id !=' => $item['id'], 'parentid' => $category['id'], 'publish' => 1))->limit(10, 0)->order_by('id desc')->get()->result_array();
		$data['data']['user'] = $user;
		$data['data']['google_authorship'] = $user['author'];

			$data['template'] = 'frontend/sanpham/item';
			$this->load->view('frontend/layouts/detail', $data);

	}



	public function tags_detail($page = 1){
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $this->db->from('tags')->where(array('publish' => 1))->count_all_results();
		$config['base_url'] = 'chu-de-';
		$config['per_page'] = 68;
		$total = ceil($config['total_rows']/$config['per_page']);
		$page = ($page <= 0)?1:$page;
		$page = ($page >= $total)?$total:$page;
		$config['cms_cur_page'] = $page;
		if($total > 0){
			$page = $page - 1;
			$this->pagination->initialize($config);
			$data['data']['list'] = $this->db->from('tags')->where(array('publish' => 1))->limit($config['per_page'], $page * $config['per_page'])->order_by('id desc')->get()->result_array();
			$data['data']['pagination'] = $this->pagination->create_links();
			$data['data']['total_rows'] = $config['total_rows'];
			$data['data']['per_page'] = $config['per_page'];
			$data['data']['page'] = $page;
		}
		$data['data']['meta_title'] = 'Danh sách các chủ đề đang có tại website '.$this->system['name'].(($page > 0)?' - trang '.($page+1):'');
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = 'Danh sách các chủ đề đang có tại website '.$this->system['name'].', hiện website đang có '.$config['total_rows'].' chủ đề'.(($page > 0)?' - trang '.($page+1):'');;
		$data['data']['canonical'] = CMS_URL.(($page == 0)?'chu-de':'chu-de-p'.($page+1)).CMS_SUFFIX;
		$data['data']['rel_prev'] = ($page > 0)?CMS_URL.'chu-de-p'.($page).CMS_SUFFIX:'';
		$data['data']['rel_next'] = ($page < ($total - 1))?CMS_URL.'chu-de-p'.($page+2).CMS_SUFFIX:'';
		$data['template'] = 'frontend/sanpham/tags_detail';
		$this->load->view('frontend/layouts/home', $data);
	}


	public function tags($alias = '', $page = 1){
		$alias = preg_replace('/[^a-z0-9-]+/i', '', $alias);
		$page = (int)$page;
		$tag = $this->db->from('tags')->where(array('alias' => $alias, 'publish' => 1))->get()->row_array();
		if(!isset($tag) || count($tag) == 0) die($this->lib_common->js_redirect(CMS_URL));
		$config['use_page_numbers'] = TRUE;
		$query_sql = 'SELECT * FROM '.CMS_PREFIX.'sanpham_item WHERE (`tags` LIKE ?)';
		$query_param = array('%'.$tag['title'].'%');
		$config['total_rows'] = $this->db->query($query_sql, $query_param)->num_rows();
		$config['base_url'] = 'chu-de/'.$alias.'-';
		$config['per_page'] = 10;
		$total = ceil($config['total_rows']/$config['per_page']);
		$page = ($page <= 0)?1:$page;
		$page = ($page >= $total)?$total:$page;
		$config['cms_cur_page'] = $page;
		if($total > 0){
			$page = $page - 1;
			$this->pagination->initialize($config);
			$query_sql = 'SELECT * FROM '.CMS_PREFIX.'sanpham_item WHERE (`tags` LIKE ?) AND `publish` = 1 ORDER BY `id` DESC LIMIT '.($page * $config['per_page']).', '.$config['per_page'];
			$query_param = array('%'.$tag['title'].'%');
			$data['data']['list'] = $this->db->query($query_sql, $query_param)->result_array();
			$data['data']['pagination'] = $this->pagination->create_links();
			$data['data']['total_rows'] = $config['total_rows'];
			$data['data']['per_page'] = $config['per_page'];
			$data['data']['page'] = $page;
		}
		$data['data']['tag'] = $tag;
		$data['data']['meta_title'] = (!empty($tag['meta_title'])?$tag['meta_title']:mb_convert_case($tag['title'], MB_CASE_TITLE, 'UTF-8').' | Tags bài viết').(($page > 0)?' - trang '.($page+1):'');
		$data['data']['meta_keywords'] = !empty($tag['meta_keyword'])?$tag['meta_keyword']:$tag['title'];
		$data['data']['meta_description'] = (!empty($tag['meta_description'])?$tag['meta_description']:'Tổng hợp bài viết thuộc chủ đề '.$tag['title'].', những bài viết hay về chủ đề '.$tag['title'].' dành cho bạn.').(($page > 0)?' - trang '.($page+1):'');
		$data['data']['canonical'] = CMS_URL.(($page == 0)?'chu-de/'.$alias:'chu-de/'.$alias.'-p'.($page+1)).CMS_SUFFIX;
		$data['data']['rel_prev'] = ($page > 0)?CMS_URL.'chu-de/'.$alias.'-p'.($page).CMS_SUFFIX:'';
		$data['data']['rel_next'] = ($page < ($total - 1))?CMS_URL.'chu-de/'.$alias.'-p'.($page+2).CMS_SUFFIX:'';
		$data['template'] = 'frontend/sanpham/tags';
		$this->load->view('frontend/layouts/home', $data);
	}
	public function addtocart($itemid = NULL){
		$itemid = (int)$itemid;
		$products_item = $this->db->from('sanpham_item')->where(array('id' => $itemid))->get()->row_array();
		if(!isset($products_item)){
			$this->session->set_flashdata('message_error_flash', 'Dữ liệu không tồn tại.');
			header('Location: '.base64_decode($this->input->get('redirect')));
			die;
		}
		$item = array(
			'id' => $products_item['id'],
			'title' => $products_item['title'],
			'price' => $products_item['price'],
			'number' => 1,
		);
		if(!isset($_COOKIE['cms_cookie_cart_'.CMS_CODE])){
			$cart = array();
			$cart[] = $item;
			setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
			$this->session->set_flashdata('message_successful_flash', 'Thêm sản phẩm '.$products_item['title'].' thành công.');
			header('Location: '.base64_decode($this->input->get('redirect')));
			die;
		}
		else{
			$cart = json_decode($_COOKIE['cms_cookie_cart_'.CMS_CODE], true);
			if(isset($cart)){
				foreach($cart as $key => $val){
					if($val['id'] == $item['id']){
						$cart[$key]['number'] = $cart[$key]['number'] + 1;
						setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
						$this->session->set_flashdata('message_successful_flash', 'Cập nhật số lượng sản phẩm '.$products_item['title'].' thành công. Số lượng hiện tại là: '.$cart[$key]['number']);
						header('Location: '.base64_decode($this->input->get('redirect')));
						die;
					}
				}
				$cart[] = $item;
				setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
				$this->session->set_flashdata('message_successful_flash', 'Thêm sản phẩm '.$products_item['title'].' thành công.');
				header('Location: '.base64_decode($this->input->get('redirect')));
				die;
			}
		}
	}
	public function cart(){
		$data['data']['meta_title'] = 'Giỏ hàng';
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = $this->system['meta_description'];
		$data['data']['menu_active'] = NULL;
		$data['data']['full_data'] = NULL;
		if(isset($_COOKIE['cms_cookie_cart_'.CMS_CODE])){
			$cart = json_decode($_COOKIE['cms_cookie_cart_'.CMS_CODE], true);
			if($this->input->post('btnNumber')){
				$number = $this->input->post('number');
				if(isset($number) && isset($cart)){
					foreach($number as $keyNumber => $valNumber){
						foreach($cart as $keyCart => $valCart){
							if($keyNumber == $valCart['id']){
								$cart[$keyCart]['number'] = preg_replace('/[^0-9]+/i', '', $valNumber);
							}
						}
					}
					setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
					$this->session->set_flashdata('message_successful_flash', 'Cập nhật số lượng thành công.');
					header('Location: '.CMS_URL.'frontend/sanpham/cart'.CMS_SUFFIX);
					die;
				}
			}
			$data['data']['full_data'] = $cart;

			$data['template'] = 'frontend/sanpham/cart';
			$this->load->view('frontend/layouts/home', $data);

		}else{
			die('<script type="text/javascript">alert(\'Chưa có sản phẩm trong giỏ hàng của bạn!\');location.href=\''.CMS_URL.'\';</script>');
		}

	}
	public function payment(){
		$data['data']['meta_title'] = 'Thanh toán';
		$data['data']['meta_keywords'] = $this->system['meta_keywords'];
		$data['data']['meta_description'] = $this->system['meta_description'];
		$data['data']['menu_active'] = NULL;
		$data['data']['full_data'] = NULL;
		if(isset($_COOKIE['cms_cookie_cart_'.CMS_CODE])){
			$cart = json_decode($_COOKIE['cms_cookie_cart_'.CMS_CODE], true);

			if($this->input->post('btnNumber')){
				$number = $this->input->post('number');
				if(isset($number) && isset($cart)){
					foreach($number as $keyNumber => $valNumber){
						foreach($cart as $keyCart => $valCart){
							if($keyNumber == $valCart['id']){
								$cart[$keyCart]['number'] = preg_replace('/[^0-9]+/i', '', $valNumber);
							}
						}
					}
					setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
					$this->session->set_flashdata('message_successful_flash', 'Cập nhật số lượng thành công.');
					header('Location: '.CMS_URL.'frontend/sanpham/cart'.CMS_SUFFIX);
					die;
				}
			}

			$data['data']['full_data'] = $cart;
			if($this->input->post('submit')){
				$data['data']['post_data'] = $this->input->post('data');
				$this->form_validation->set_rules('data[fullname]', 'Họ tên', 'trim|required');
				$this->form_validation->set_rules('data[phone]', 'Điện thoại', 'trim|required');
				$this->form_validation->set_rules('data[email]', 'Email', 'trim|required');
				$this->form_validation->set_rules('data[address]', 'Địa chỉ', 'trim|required');
				if($this->form_validation->run() == TRUE){
					$data['data']['post_data']['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
					$data['data']['post_data']['online'] = 0;
					$data['data']['post_data']['cod'] = 1;
					$data['data']['post_data']['data'] = $_COOKIE['cms_cookie_cart_'.CMS_CODE];
					$this->db->insert('payment', $data['data']['post_data']);
					setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()-(7*24*3600), '/');
					$donhang=$this->db->from('payment')->where(array('phone'=>$data['data']['post_data']['phone']))->order_by('id desc')->get()->row_array();

					$total = 0;
					$chitietdon='';
					$full_data=json_decode($donhang['data'],true);
					if(isset($full_data) && count($full_data)){
						foreach($full_data as $key => $val){
							$total_temp = 0;
							$total_temp = $val['price'] * $val['number'];
							$total = $total + $total_temp;
							$product_cart = $this->db->from('sanpham_item')->where(array('id'=>$val['id']))->get()->row_array();

							$chitietdon.='<tr>
												<td style="font-family:tahoma;font-size:14px">'.htmlspecialchars($val['title']).'</td>
												<td style="font-family:tahoma;font-size:14px;text-align:left">'.$val['number'].'</td>
												<td style="text-align:right;font-family:tahoma;font-size:14px">'.number_format($total_temp).' VNĐ</td>
											</tr>';
					} }
					///XÁC NHẬN


					$email_body='<div id=":zv" class="ii gt adP adO">
					<div id=":1k2" class="a3s aXjCH m15e266d50c22d048">
					<div>
					<div class="adM"> </div>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:1.5em">
					<tbody>
					<tr>
					<td bgcolor="#00918c" style="border-top:#007773 2px solid">
					<table width="700" border="0" cellspacing="0" cellpadding="0" align="center" style="border-top:#00918c 10px solid;border-bottom:#00918c 10px solid">
						<tbody>
							<tr>
								<td>
									<h1 style="font-family:tahoma;color:#ffffff;font-size:24px">Xác nhận thông tin đơn hàng số #VIVIBEAUTY'.$donhang['id'].'</h1> </td>
							</tr>
						</tbody>
					</table>
					</td>
					</tr>
					<tr>
					<td bgcolor="#efefef">
					<table width="700" border="0" cellspacing="0" cellpadding="3" align="center" style="border-bottom:20px solid #ffffff;background:#fff;padding:15px">
						<tbody>
							<tr>
								<td height="18" valign="top"></td>
							</tr>
							<tr>
								<td height="18" valign="top" style="border-bottom:20px #ffffff solid">
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Kính chào '.$data['data']['post_data']['fullname'].' !</p>
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Cảm ơn quý khách đã gửi thông tin cho '.$this->system['meta_title'].'. Sau đây là thông tin của quý khách:</p>
								</td>
							</tr>
							<tr>
								<td valign="top">
									<h1 style="font-family:tahoma;margin:0;color:#000000;font-size:20px;border-top:1px solid #efefef;padding-bottom:15px;padding-top:15px">Thông tin chi tiết số #VIVIBEAUTY'.$donhang['id'].'</h1> </td>
							</tr>
							<tr>
								<td>
									<table width="700" border="1" cellspacing="0" cellpadding="5" align="center" style="border:1px solid #efefef;border-collapse:collapse">
										<thead>
											<tr style="background:#00918c">
												<td style="text-align:center;font-family:tahoma;font-size:14px;color:#fff">Sản phẩm</td>
												<td style="text-align:center;font-family:tahoma;font-size:14px;color:#fff">Số lượng</td>

											</tr>
										</thead>
										<tbody>
											'.$chitietdon.'
											<tr>
												<td style="font-family:tahoma;font-size:14px">Tổng cộng</td>
												<td style="font-family:tahoma;font-size:14px;text-align:left"></td>

											</tr>
										</tbody>
									</table>
									<p></p>
								</td>
							</tr>
							<tr>
								<td height="18" valign="top" style="border-bottom:20px #ffffff solid">
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Địa chỉ: '.$data['data']['post_data']['address'].'</p>
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Số điện thoại: '.$data['data']['post_data']['phone'].'</p>
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Email: '.$data['data']['post_data']['email'].'</p>
									<p style="font-family:tahoma;font-size:14px;font-weight:700;color:#363636;line-height:1.5em">Ghi chú: '.$data['data']['post_data']['notes'].'</p>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
					</tr>
					</tbody>
					</table>
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
					<tbody>
					<tr>
					<td bgcolor="#2d2b2b">
					<table cellspacing="0" cellpadding="0" border="0" align="center" width="700" style="border-bottom:#2d2b2b 10px solid">
						<tbody>
							<tr>
								<td height="50" colspan="5">
									<p style="font-family:tahoma;font-size:14px;color:#b8b8b8"> Mọi thắc mắc cần hỗ trợ Quý khách vui lòng liên hệ bộ phận hỗ trợ của chúng tôi: <a href="mailto:'.$this->system['email'].'" target="_blank">'.$this->system['email'].'</a></p>
								</td>
							</tr>
							<tr>
								<td height="50" colspan="5">
									<p style="font-family:tahoma;font-size:13px;color:#b8b8b8;padding-top:5px;font-style:italic"> Thông báo email này được gửi tự động xác nhận đơn hàng và không phải email spam</p>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
					</tr>
					</tbody>
					</table>
					</div>
					</div>
					<div class="yj6qo"></div>
					</div>';
					// Send the e-mail by phpmailer
					require APPPATH.'third_party/PHPMailer/class.phpmailer.php';
					require APPPATH.'third_party/PHPMailer/class.smtp.php';
					$mail = new PHPMailer();
					$mail->IsSMTP(); // set mailer to use SMTP
					$mail->Host = "smtp.gmail.com"; // specify main and backup server
					$mail->Port = 465; // set the port to use
					$mail->SMTPAuth = true; // turn on SMTP authentication
					$mail->SMTPSecure = 'ssl';
					$mail->Username = "no.reply.email.192@gmail.com"; // your SMTP username or your gmail username
					$mail->Password = "yutfsjdzqbjfoolo"; // your SMTP password or your gmail password

					$mail->FromName = ''.$this->system['meta_title'].''; // Name to indicate where the email came from when the recepient received
					//End Setting
					$mail->AddCC('ng.viet96@gmail.com', 'Mr Viet');
					$mail->AddCC(''.$this->system['email'].'', ''.$this->system['meta_title'].'');
					$mail->CharSet = "utf-8";
					$mail->From = $data['data']['post_data']['email'];
					$mail->AddAddress($data['data']['post_data']['email']);
					//$mail->AddReplyTo('depraiketao@gmail.com','日本はいいね');
					$mail->WordWrap = 50; // set word wrap
					$mail->IsHTML(true); // send as HTML
					$mail->Subject = '['.$this->system['meta_title'].'] Thông tin báo giá số #VIVIBEAUTY'.$donhang['id'];
					$mail->Body = $email_body;
					$mail->AltBody = ""; //Text Body
					$mail->SMTPDebug = 0;
					$mail->Send();

					//END XÁC NHẬN
					die('<script type="text/javascript">alert(\'Đặt hàng thành công. Cảm ơn bạn, chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất!\');location.href=\''.CMS_URL.'\';</script>');
				}
			}
			if($this->input->post('submit_online')){
				$data['data']['post_data'] = $this->input->post('data');
				$this->form_validation->set_rules('data[fullname]', 'Họ tên', 'trim|required');
				$this->form_validation->set_rules('data[phone]', 'Điện thoại', 'trim|required');
				$this->form_validation->set_rules('data[email]', 'Email', 'trim|required');
				$this->form_validation->set_rules('data[address]', 'Địa chỉ', 'trim|required');
				if($this->form_validation->run() == TRUE){
					$data['data']['post_data']['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
					$data['data']['post_data']['online'] = 1;
					$data['data']['post_data']['cod'] = 0;
					$data['data']['post_data']['data'] = $_COOKIE['cms_cookie_cart_'.CMS_CODE];
					$this->db->insert('payment', $data['data']['post_data']);
					setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()-(7*24*3600), '/');
					die('<script type="text/javascript">alert(\'Đặt hàng thành công. Cảm ơn bạn, chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất!\');location.href=\''.CMS_URL.'\';</script>');
				}
			}
		}
		else{
			die('<script type="text/javascript">alert(\'Chưa có sản phẩm trong giỏ hàng của bạn!\');location.href=\''.CMS_URL.'\';</script>');
		}

			$data['template'] = 'frontend/sanpham/payment';
			$this->load->view('frontend/layouts/home', $data);


	}
	public function removetocart($itemid = 0){
		$itemid = (int)$itemid;
		$products_item = $this->db->from('sanpham_item')->where(array('id' => $itemid))->get()->row_array();
		if(!isset($products_item)){
			$this->session->set_flashdata('message_error_flash', 'Dữ liệu không tồn tại.');
			header('Location: '.base64_decode($this->input->get('redirect')));
			die;
		}


		if(!isset($_COOKIE['cms_cookie_cart_'.CMS_CODE])){
			$this->session->set_flashdata('message_error_flash', 'Không có sản phẩm trong giỏ hàng.');
			header('Location: '.base64_decode($this->input->get('redirect')));
			die;
		}
		else{
			$cart = json_decode($_COOKIE['cms_cookie_cart_'.CMS_CODE], true);
			if(isset($cart)){
				foreach($cart as $key => $val){
					if($val['id'] == $itemid){
						unset($cart[$key]);
						$cart = array_values($cart);
						setcookie('cms_cookie_cart_'.CMS_CODE, json_encode($cart), time()+(7*24*3600), '/');
						$this->session->set_flashdata('message_successful_flash', 'Xóa sản phẩm khỏi giỏ hàng thành công.');
						header('Location: '.base64_decode($this->input->get('redirect')));
						die;
					}
				}
			}
		}
	}
}
