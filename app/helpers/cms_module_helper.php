<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('helper_module_get_category_info')){
	function helper_module_get_category_info($table = '', $id = 0){
		$CI =& get_instance();
		$user = $CI->db->select('id, title, parentid')->where(array('id' => $id))->from($table)->get()->row_array();
		if(isset($user) && count($user)){
			return $user;
		}
		else{
			return NULL;
		}
	}
}
if (!function_exists('helper_mobile')){
	function helper_mobile(){
		$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
		//$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
		$OperaMini = strpos($_SERVER['HTTP_USER_AGENT'],"Opera Mini");
		if($iphone || $android || $palmpre || $ipod || $berry  || $OperaMini == true) return TRUE;
		else return FALSE;
	}
}
if (!function_exists('helper_module_count_item')){
	function helper_module_count_item($table = '', $parentid = 0){
		$CI =& get_instance();
		$count = $CI->db->where(array('parentid' => $parentid))->from($table)->count_all_results();
		return $count;
	}
}

if (!function_exists('helper_module_count_comment_item')){
	function helper_module_count_comment_item($parentid = ''){
		$CI =& get_instance();
		$count = $CI->db->where(array('parentid' => $parentid))->from('comment')->count_all_results();
		return $count;
	}
}


if (!function_exists('helper_module_menu')){
	function helper_module_menu($parentid = 0){
		$CI =& get_instance();
		$menu = '';
		$data = $CI->db->select('id, title, module, moduleid, url, extensions')->from('menu_item')->where(array('parentid' => $parentid, 'publish' => 1))->order_by('order asc')->get()->result_array();
		if(isset($data) && count($data)){
			foreach($data as $key => $val){
				if(!empty($val['url'])){
					$menu = $menu.'<li class="main"><a class="main" href="'.$val['url'].'" title="'.htmlspecialchars($val['title']).'" '.$val['extensions'].'>'.$val['title'].'</a></li>';
				}
				else if(!empty($val['module']) && $val['moduleid'] > 0){
					$menu = $menu.helper_module_menu_item($val['module'].'_category', $val['moduleid'], '', 'li');
				}
			}
		}
		$menu = !empty($menu)?'<ul class="main">'.$menu.'</ul>':$menu;
		return $menu;
	}
}

if(!function_exists('helper_module_menu_item')){
	function helper_module_menu_item($table = '', $parentid = 0, $module = '', $type = 'ul'){
		$CI =& get_instance();
		$data = $CI->db->select('id, title, parentid, lft, rgt')->from($table)->where(array('publish' => 1))->get()->result_array();
		$menu = '';
		$tempMain = '';
		// Main menu
		if(isset($data) && count($data)){
			foreach($data as $keyMain => $valMain){
				if($type == 'li'){
					$temp = 'id';
				}
				else if($type == 'ul'){
					$temp = 'parentid';
				}
				if($valMain[$temp] == $parentid){
					$tempMain = $tempMain . '<li class="main"><a class="main" href="'.helper_string_alias($valMain['title']).'-c'.$valMain['id'].CMS_SUFFIX.'" title="'.htmlspecialchars($valMain['title']).'">'.$valMain['title'].'</a>';
					// Item menu
					if($valMain['rgt'] - $valMain['lft'] > 1){
						$tempItem = '';
						foreach($data as $keyItem => $valItem){
							if($valItem['parentid'] == $valMain['id']){
								$tempItem = $tempItem . '<li class="item"><a class="item" href="'.helper_string_alias($valItem['title']).'-c'.$valItem['id'].CMS_SUFFIX.'" title="'.htmlspecialchars($valItem['title']).'">'.$valItem['title'].'</a>';
								// Children menu
								if($valItem['rgt'] - $valItem['lft'] > 1){
									$tempChildren = '';
									foreach($data as $keyChildren => $valChildren){
										if($valChildren['parentid'] == $valItem['id']){
											$tempChildren = $tempChildren . '<li class="children"><a class="children" href="'.helper_string_alias($valChildren['title']).'-c'.$valChildren['id'].CMS_SUFFIX.'" title="'.htmlspecialchars($valChildren['title']).'">'.$valChildren['title'].'</a>';
											// Grandchildren menu
											if($valItem['rgt'] - $valItem['lft'] > 1){
												$tempGrandchildren = '';
												foreach($data as $keyGrandchildren => $valGrandchildren){
													if($valGrandchildren['parentid'] == $valChildren['id']){
														$tempGrandchildren = $tempGrandchildren . '<li class="grandchildren"><a class="grandchildren" href="'.helper_string_alias($valGrandchildren['title']).'-c'.$valGrandchildren['id'].CMS_SUFFIX.'" title="'.htmlspecialchars($valGrandchildren['title']).'">'.$valGrandchildren['title'].'</a>';
														$tempGrandchildren = $tempGrandchildren . '</li>';
													}
												}
												$tempChildren = !empty($tempGrandchildren)? $tempChildren.'<ul class="grandchildren">'.$tempGrandchildren.'</ul>':$tempChildren;
											}
											$tempChildren = $tempChildren . '</li>';
										}
									}
									$tempItem = !empty($tempChildren)? $tempItem.'':$tempItem;
								}
								$tempItem = $tempItem . '</li>';
							}
						}
						$tempMain = !empty($tempItem)? $tempMain.'':$tempMain;
					}
					$tempMain = $tempMain . '</li>';
				}
			}
		}
		if($type == 'li'){
			$menu = !empty($tempMain)?$tempMain:'';
		}
		else if($type == 'ul'){
			$menu = !empty($tempMain)?'<ul class="main">'.$tempMain.'</ul>':'';
		}
		return $menu;
	}
}

if (!function_exists('helper_module_list_category')){
	function helper_module_list_category($table = '', $param = NULL, $orderby = 'id desc', $limit = 5){
		$CI =& get_instance();
		if($param == NULL){
			$data = $CI->db->select('id, title')->from($table)->where(array('publish' => 1))->order_by($orderby)->limit($limit, 0)->get()->result_array();
		}
		else{
			$data = $CI->db->select('id, title')->from($table)->where($param)->where(array('publish' => 1))->order_by($orderby)->limit($limit, 0)->get()->result_array();
		}
		return $data;
	}
}

if (!function_exists('helper_module_list_item')){
	function helper_module_list_item($table = '', $select = 'id, title, parentid, image, description, viewed, created, updated', $param = NULL, $orderby = 'id desc', $limit = 5, $recursive = FALSE){
		$CI =& get_instance();
		if($param == NULL){
			$data = $CI->db->select($select)->from($table)->where(array('publish' => 1))->order_by($orderby)->limit($limit, 0)->get()->result_array();
		}
		else{
			if($recursive == FALSE){
				$data = $CI->db->select($select)->from($table)->where($param)->where(array('publish' => 1))->order_by($orderby)->limit($limit, 0)->get()->result_array();
			}
			else{
				$children = helper_module_children(str_replace('_item', '_category', $table), $param['parentid']);
				$data = $CI->db->select($select)->from($table)->where_in('parentid', $children)->where(array('publish' => 1))->order_by($orderby)->limit($limit, 0)->get()->result_array();
			}
		}
		return $data;
	}
}

if (!function_exists('helper_module_children')){
	function helper_module_children($table = '', $id = 0){
		$CI =& get_instance();
		$temp = NULL;
		$category = $CI->db->select('id, lft, rgt')->from($table)->where(array('id' => $id))->get()->row_array();
		if(isset($category) && count($category)){
			$children = $CI->db->select('id')->from($table)->where(array('lft >=' => $category['lft'], 'rgt <=' => $category['rgt']))->get()->result_array();
			if(isset($children) && count($children)){
				foreach($children as $key => $val){
					$temp[] = $val['id'];
				}
			}
		}
		return $temp;
	}
}

if (!function_exists('helper_module_breadcrumb')){
	function helper_module_breadcrumb($table = '', $param = NULL, $type = 'category'){
		$CI =& get_instance();
		$breadcrumb = '';
		$category = $CI->db->select('id, title')->where($param)->order_by('lft', 'asc')->from($table)->get()->result_array();
		$breadcrumb = '';
		$breadcrumb = $breadcrumb.'<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a rel="nofollow" href="'.CMS_URL.'" title="Trang chủ" itemprop="url"><span itemprop="title">Trang chủ</span></a></li>';
		if(isset($category) && count($category)){
			$total = count($category);
			foreach($category as $key => $val){
				$breadcrumb = $breadcrumb.'<li class="spacebar">&raquo;</li>';
				if($type == 'category') $h = ($total - $key);
				else if($type == 'item') $h = ($total - $key + 1);
				$h = ($h > 6)?'6':$h;
				$breadcrumb = $breadcrumb . '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.(helper_string_alias($val['title']).'-c'.$val['id'].CMS_SUFFIX).'" title="'.htmlspecialchars($val['title']).'" itemprop="url"><span itemprop="title">'.htmlspecialchars($val['title']).'</span></a></li>';
			}
		}
		$breadcrumb = $breadcrumb.'';
		return $breadcrumb;
	}
}

if (!function_exists('helper_module_tags')){
	function helper_module_tags($data = NULL){
		$tags = '';
		$data = explode(',', $data);
		if(isset($data) && count($data)){
			foreach($data as $key => $val){
				$val = trim($val);
				if(empty($val)) continue;
				$tags = $tags.'<a href="chu-de/'.helper_string_alias($val).CMS_SUFFIX.'" title="'.htmlspecialchars($val).'">'.htmlspecialchars($val).'</a>';
				$tags = $tags.'<span>,</span>';
			}
		}
		return $tags;
	}
}
