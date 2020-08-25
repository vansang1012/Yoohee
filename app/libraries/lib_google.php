<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Google{

	private $CI;

	public function __construct(){
		$this->CI =& get_instance();
	}
	public function auth_google(){
		require APPPATH . '/third_party/Zend/Loader.php';
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
		Zend_Loader::loadClass('Zend_Gdata_Photos');
		Zend_Loader::loadClass('Zend_Http_Client');
		// Parameters for ClientAuth authentication
		$service = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
		$user = "giundatmail@gmail.com";
		$pass = "trung8995";
		 
		// Create an authenticated HTTP client
		$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
		 
		// Create an instance of the service
		//$service = new Zend_Gdata_Photos($client);
		$service = new Zend_Gdata_Photos($client, "Google-DevelopersGuide-1.0");
		return $service;
	}
	// Làm việc với google picsaca
	//Creating Entries
	public function picsaca_creat_photo($photo,$albumid,$user='default'){
		if(is_array($photo)){
			$service=$this->auth_google();
			$fd = $service->newMediaFileSource($photo["tmp_name"]);
			$fd->setContentType($photo["type"]);
			 
			$entry = new Zend_Gdata_Photos_PhotoEntry();
			$entry->setMediaSource($fd);
			$entry->setTitle($service->newTitle($photo["name"]));
			 
			$albumQuery = new Zend_Gdata_Photos_AlbumQuery;
			$albumQuery->setUser($user);
			$albumQuery->setAlbumId($albumid);
			 
			$albumEntry = $service->getAlbumEntry($albumQuery);
			 
			$service->insertPhotoEntry($entry, $albumEntry);
		}
	}
	public function picsaca_creat_album($album_name){
		$service=$this->auth_google();
		$entry = new Zend_Gdata_Photos_AlbumEntry();
		$entry->setTitle($service->newTitle($album_name));
		$service->insertAlbumEntry($entry);
	}
	public function picsaca_creat_comment($comment,$albumid,$photoid,$user='default'){
		if(is_array($comment)){
			$service=$this->auth_google();
			$entry = new Zend_Gdata_Photos_CommentEntry();
			$entry->setTitle($service->newTitle($comment["title"]));
			$entry->setContent($service->newContent($comment["content"]));
			 
			$photoQuery = new Zend_Gdata_Photos_PhotoQuery;
			$photoQuery->setUser($user);
			$photoQuery->setAlbumId($albumid);
			$photoQuery->setPhotoId($photoid);
			$photoQuery->setType('entry');
			 
			$photoEntry = $service->getPhotoEntry($photoQuery);
			 
			$service->insertCommentEntry($entry, $photoEntry);
		}
	}
	//Deleting Entries
	public function picsaca_delete_album($albumid,$user='default'){
		$service=$this->auth_google();
		$albumQuery = new Zend_Gdata_Photos_AlbumQuery;
		$albumQuery->setUser($user);
		$albumQuery->setAlbumId($albumid);
		$albumQuery->setType('entry');
		 
		$entry = $service->getAlbumEntry($albumQuery);
		 
		$service->deleteAlbumEntry($entry, true);
	}
	public function picsaca_delete_photo($photoid,$user='default'){
		$gp=$this->auth_google();
		$query = $gp->newUserQuery();
		$query->setUser($user);
		$query->setKind("photo");
		$query->setMaxResults(0);
		$userFeed = $gp->getUserFeed(null, $query);
		foreach ($userFeed as $k=>$photoEntry) {
			foreach($photoid as $key=>$va){
			if ($photoEntry->getGphotoId()->getText()==$va) {
			  $photoEntry->delete();
			}
			}
			header('Location: ../../picsaca/update.html');
		}
	}
	//Retrieving Feeds And Entries
	public function picsaca_feed_photo($albumid,$limit=0,$ssl=false,$user='default'){
		$gp=$this->auth_google();
		$query = $gp->newUserQuery();
		$query->setUser($user);
		$query->setKind("photo");
		$query->setMaxResults($limit);
		//$query->setAlbumName('Public');
		$userFeed = $gp->getUserFeed(null, $query);
		foreach ($userFeed as $k=>$photoEntry) {
			if ($photoEntry->getMediaGroup()->getThumbnail() != null) {
			  $mediaThumbnailArray = $photoEntry->getMediaGroup()->getThumbnail();
			  $firstThumbnailUrl = $mediaThumbnailArray[1]->getUrl();
			}
			$title = $photoEntry->getTitle()->getText();
			$anh=explode('/s144/', $firstThumbnailUrl);
			if($ssl){
			$linkgoc=$anh[0].'/'.$anh[1];
			$linkanh=$anh[0].'/s1366/'.$anh[1];
			$linkthumb=$anh[0].'/s100-c/'.$anh[1];
			}else{
			$linkgoc=str_replace('https://','http://',$anh[0].'/'.$anh[1]);
			$linkanh=str_replace('https://','http://',$anh[0].'/s1366/'.$anh[1]);
			$linkthumb=str_replace('https://','http://',$anh[0].'/s100-c/'.$anh[1]);
			}
			$trung[$k+1]['thumb']=$linkthumb;
			$trung[$k+1]['view']=$linkanh;
			$trung[$k+1]['url']=$linkgoc;
			$trung[$k+1]['title']=$title;
			$trung[$k+1]['id']=$photoEntry->getGphotoId()->getText();
		}
			$trung = var_export($trung,true);
			$path = APPPATH .'cache/temp_picsaca.php';
			$content = '<?php $DATA = '.$trung.';?>';
			$handler = fopen($path,'w+');
			fwrite($handler,$content);
			fclose($handler);
	}
	//THỬ NGHIỆM TRUYỀN DỮ LIỆU BẰNG HEADER THỦ CÔNG THAY THẾ CHO PHƯƠNG THỨC AJAX
	
	public function chemgio($id)
	{		
		$data=$this->CI->db->from(CMS_PREFIX.'craw_item')->where(array('id'=>$id))->get()->row_array();
		preg_match_all('/\<img(.+?)src="(.+?)"/',$data['content'],$img);
		//$img[2][]=$data['image'];
		foreach($img[2] as $key=>$val)
		{
			$image[$key]['url']=$val;
			$image[$key]['id']=$id;
			$image[$key]['table']='content';
		}
		//$k=count[$image];
		$image[]=array('url'=>$data['image'],'id'=>$id,'table'=>'image');
		$image = var_export($image,true);
		// Lưu tin đã lấy gần nhất vào file cache
		$path = APPPATH .'cache/temp_header.php';
		$content = '<?php $DATA = '.$image.';?>';
		$handler = fopen($path,'w+');
		fwrite($handler,$content);
		fclose($handler);
		require APPPATH .'cache/temp_header.php';
		die(header('Location:'.CMS_URL.CMS_BACKEND.'/picsaca/header/0'));
		//echo "<pre>";
		//print_r($DATA);
	}
}