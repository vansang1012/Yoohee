<?php
ob_start ();
ini_set('max_execution_time', 300);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/third_party/simple_html_dom.php';

class Lib_craw{
	static $DATA_ITEM=array();
	private $_DATA_ITEM;
	private $CI;

	public function __construct(){
		$this->CI =& get_instance();
	}
	public function craw($ider='')
	{
		// Lấy tin
			if($sites=$this->CI->db->from(CMS_PREFIX.'craw_site')->where(array('id'=>$ider))->get()->result_array())
			{
				//Feed::debug($sites);
				$value=$this->CI->db->select('*')->from(CMS_PREFIX.'craw_site')->where(array('id'=>$ider))->get()->result_array();
				foreach($sites as $key=>$value)
				{
					$check_page = strpos($value['url'],'*');
					if($check_page===false){
						$this->antrom($value);
					}else{
						if($page_num = $value['page_num']){
							$check_page_num = strpos($page_num,'-');
							if($check_page_num===false){
								$value['url'] = str_replace('*',$page_num,$value['url']);
								$this->antrom($value);
							}else{
								$arr_page = explode('-',$page_num);
								for($i=$arr_page[1];$i>=$arr_page[0];$i--){
									$site = $value;
									$site['url'] = str_replace('*',$i,$value['url']);
									$this->antrom($site);
								}
							}
						}else{
							$value['url'] = str_replace('*','1',$value['url']);
							$this->antrom($value);
						}
					}
				}
				$DATA_ITEM = var_export($this->_DATA_ITEM,true);
				// Lưu tin đã lấy gần nhất vào file cache
				$path = APPPATH .'cache/temp_data.craw.php';
				$content = '<?php $DATA_ITEM_S = '.$DATA_ITEM.';?>';
				$handler = fopen($path,'w+');
				fwrite($handler,$content);
				fclose($handler);
				//Lưu tin vào CSDL
				//Tinh chỉnh dữ liệu vào mảng $DATA_CONTENT
				/*include APPPATH . '/cache/temp_data.craw.php';
				$path = APPPATH .'cache/temp_data.craw.php';
				foreach($DATA_ITEM_S as $key=>$val)
				{
				$DATA_ITEM_D[$key]=array('title'=>$val['name'],'parentid'=>$val['category_id'],'description'=>$val['brief'],'content'=>preg_replace('/(<a(.+?)>)|(<span(.+?)>(.+?)<\/span>)|(<\/a>)|(<script(.+?)>(.+?)<\/script>)/','',$val['description']),'image'=>$val['image_url']);
				}
				$DATA_ITEM_C = var_export($DATA_ITEM_D,true);
				$content = '<?php $DATA_CONTENT = '.$DATA_ITEM_C.';?>';
				$handler = fopen($path,'w+');
				fwrite($handler,$content);
				fclose($handler);
				//Xử lý lấy toàn bộ ảnh vào mảng $DATA_IMAGE
				include APPPATH . '/cache/temp_data.craw.php';
				$path = APPPATH .'cache/temp_data.craw.image.php';
				foreach($DATA_CONTENT as $key=>$value)
				{
					preg_match_all('/\<img(.+?)src="(.+?)"/',$value['content'],$img);
					foreach($img[2] as $key=>$val)
						{
							$array=explode('.',$val);
							$ar=count($array)-1;
							if($array[$ar]=='jpg' OR $array[$ar]=='JPG')$image_a[]=array('url'=>$val,'his'=>$val);							
						}
					$image_a[]=array('url'=>$value['image'],'his'=>$value['image']);
				}
				$ITEM_A = var_export($image_a,true);
				$content = '<?php $DATA_IMAGE = '.$ITEM_A.';?>';
				$handler = fopen($path,'w+');
				fwrite($handler,$content);
				fclose($handler);*/
				//Bắt đầu quá trình chém gió lên google
				//header('Location:'.CMS_URL.CMS_BACKEND.'/picsaca/chemgiovl.html');
				foreach($DATA_ITEM_S as $key=>$val)
				{
				$data['title']=addslashes($val['name']);
				$data['parentid']=$val['category_id'];
				$data['description']=$val['brief'];
				$data['content']=preg_replace('/(<a(.+?)>)|(<span(.+?)>(.+?)<\/span>)|(<\/a>)|(<script(.+?)>(.+?)<\/script>)/','',$val['description']);
				$data['publish']='1';
				$data['image']=$val['image_url'];
				$data['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
				$data['userid_created'] = $this->CI->auth['id'];
				$count=$this->CI->db->select('*')->from(CMS_PREFIX.'craw_item')->where(array('title'=>$val['name']))->get()->result_array();
				if(!$count){
				$this->CI->db->insert(CMS_PREFIX.'craw_item', $data);
				}
				}
				$dir = APPPATH .'cache/temp_data.craw.php';
				@unlink($dir);
			}

			header('Location:'.CMS_BACKEND.'/craw/item'.CMS_SUFFIX);
	}
	
	public function chemgio()
	{		
		header('Location:'.CMS_URL.CMS_BACKEND.'/picsaca/headers/0');
		//echo "<pre>";
		//print_r($DATA);
	}
	public function parse_row($link,$site)
	{
		$html=$this->html_no_comment($link);
		if($html){
			$html = str_get_html($html);
			$item = array();
			$check = false;
			if(isset($site['image_url']) and $site['image_url'])
			{
				$item['image_url'] = $site['image_url'];
			}
			$pattern=array();
			$pattern[0]['field_name']='name';
			$pattern[0]['extra']=$site['name_extra'];
			$pattern[0]['element_delete']=$site['name_element_delete'];
			$pattern[1]['field_name']='brief';
			$pattern[1]['extra']=$site['brief_extra'];
			$pattern[1]['element_delete']=$site['brief_element_delete'];
			$pattern[2]['field_name']='description';
			$pattern[2]['extra']=$site['description_extra'];
			$pattern[2]['element_delete']=$site['description_element_delete'];
			if($pattern)
			{
				foreach($pattern as $key=>$value)
				{
					$element_delete = $value['element_delete'];
					if($detail_pattern = $value['extra']){
						foreach($html->find($detail_pattern) as $element)
						{
							if($element_delete){
								$arr = explode(',',$element_delete);
								for($i=0;$i<count($arr);$i++){
									foreach($element->find($arr[$i]) as $e){
										$e->outertext='';
									}
								}
							}
							if($value['field_name']=='name' or $value['field_name']=='brief'){
								$item[$value['field_name']] = trim($element->plaintext);
							}else{
								$item[$value['field_name']] = $element->innertext;
							}
							break;
						}
					}
				}
				if(isset($item['name']))
				{
					foreach($this->_DATA_ITEM as $key=>$value){
						if($value['name']==$item['name']) $check=true;
					}
					if(!$check){
						// Viết lại đường dẫn ảnh trong nội dung
						if(isset($item['description']) and $item['description']){
							$item['description']=str_replace($site['image_content_left'],$site['image_content_right'],$item['description']);
						}
						$item+= array(
							'category_id'=>$site['parentid']
						);
						$this->_DATA_ITEM[] = $item;
					}
				}
			}
			$html->clear();
			unset($html);
		}
	}

	public function format_link($source,$format=false)
	{
		if($format)
		{
			$source = str_replace(' ','%20',$source);	
		}
		else
		{
			if(strrpos($source,'?')===true)
			{
				$source = substr($source,0,strrpos($source,'?'));
			}
			$source = str_replace(' ','',$source);	
		}
		return $source;
	}
	public function save($sour,$dest)
		{
			$sour = $this->format_link($sour,true);
			if(!file_put_contents($dest, file_get_contents($sour))){
				$dest = '';
			}
		}
	public function antrom($site){
		$html=$this->html_no_comment($site['url']);
		if($html){
			//Feed::debug($html);
			$hd = $site['begin'];
			$ft = $site['end'];
			
			if(!$hd or !($bg = strpos($html,$hd))) $bg = 0;
			if(!$ft or !($end = strpos($html,$ft))) $end = strlen($html);
			
			$html = substr($html,$bg+strlen($hd),$end-$bg-strlen($hd));
			
			$html = str_get_html($html);
			
			$host = $site['host'];
			$pattern_bound = $site['pattern_bound'];
			$pattern_link = $site['extra'];
			$pattern_img = $site['image_pattern'];
			
			$folder=$site['image_dir']; // Thư mục chứa ảnh
			if(!is_dir($folder)) @mkdir($folder,0755,true);
			$num=0;
			$maxitem=1000;
			foreach($html->find($pattern_bound) as $item)
			{
				if($num>=$maxitem) break;
				$num++;
				foreach($item->find($pattern_link) as $link){
					$link = $this->check_link($link->getAttribute('href'),$host);
				}
				if($this->check_url($link)){
					$DATA_ITEM = $item->find($pattern_img);
					if($DATA_ITEM and count($DATA_ITEM)){
						foreach($DATA_ITEM as $img){
							$image_url=$img->src;
						}
						//$image_url=$this->do_upload($image_url);
						$layanhvehost=false;//tùy chọn lấy ảnh về host
						if($layanhvehost){
						$source = $this->check_link($image_url,$site['host']);
						$basename = basename($source);
						$basename='thumbnail.jpg';
						// Thư mục chứa ảnh
						if(file_exists($folder.'/'.$basename)){
							$dest = $folder.'/'.time().'_'.$basename;
						}else{
							$dest = $folder.'/'.$basename;
						}
						$this->save($source,$dest);
						$site['image_url'] = $dest;
						}else $site['image_url'] = $image_url;
					}else{
						$site['image_url'] = '';
					}
					//Feed::debug($site);
					$this->parse_row($link,$site);
				}
			}
		}
		$html->clear();
		unset($html);
	}
	public function check_link($url,$host='')
	{
		if((strpos($url,'http://')===false) and (preg_match_all('/http:\/\/(.*)\.([a-z]+)\//',$host,$matches,PREG_SET_ORDER)))
		{
			while ($url{0}=='/'){
				$url=substr($url,1);
			}
			if($matches[0][0]{strlen($matches[0][0])-1}!='/'){
				$matches[0][0]=$matches[0][0].'/';
			}
			$url = $matches[0][0].$url;
		}
		return $url;
	}
	public function check_url($url=NULL){
		if($url == NULL) return false;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);//lay code tra ve cua http
		curl_close($ch);
		return ($httpcode>=200 && $httpcode<300);
	}
	public function _isCurl(){
		return function_exists('curl_version');
	}
	public function _urlencode($url){
		$output="";
		for($i = 0; $i < strlen($url); $i++) 
		$output .= strpos("/:@&%=?.#", $url[$i]) === false ? urlencode($url[$i]) : $url[$i]; 
		return $output;
	}
	public function file_get_contents_curl($url) {
		//$url=urlencode($url);
		//debug($url);
		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	
		$data = curl_exec($ch);
		curl_close($ch);
	
		return $data;
	}
	public function html_no_comment($url) {
		// create HTML DOM
		$check_curl=$this->CI->lib_craw->_isCurl();
		if(!$html=file_get_html($url)){
			if(!$html=str_get_html($this->file_get_contents_curl($url)) or !$check_curl){
				return false;
			}
		}
		// remove all comment elements
		foreach($html->find('comment') as $e)
		
			$e->outertext = '';
	
		$ret = $html->save();
		
		// clean up memory
		$html->clear();
		unset($html);
		return $ret;
	}
	static function debug($arr){
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
		exit();
	}
}