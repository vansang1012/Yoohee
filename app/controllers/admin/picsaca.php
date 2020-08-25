<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class picsaca extends MY_Controller{

	public $auth;
	public $menu_active;

	public function __construct(){
		parent::__construct();
		$this->auth = $this->lib_authentication->check();
		if($this->auth == NULL) die($this->lib_common->js_redirect(CMS_BACKEND.'/home/index'.CMS_SUFFIX));
		$this->load->database();
		//$this->load->library('lib_picsaca');
		$this->load->helper(array('form', 'url'));
		$this->menu_active = 'menu-picsaca';
	}

	public function item(){
		$data['meta_title'] = 'Quản lý dữ liệu picsaca';
		$data['meta_keywords'] = '';
		$data['meta_description'] = '';
		$albumId = "6112207780960157217";
		require APPPATH .'cache/temp_picsaca.php';
		$data['data']=$DATA;
		$data['menu_active'] = $this->menu_active;
		$data['template'] = 'backend/picsaca/item';
		$this->load->view('backend/layouts/home', $data);
	}
	public function update()
	{
		$this->load->library('lib_google');
		$this->lib_google->picsaca_feed_photo('6112207780960157217','77');
		header('Location: '.CMS_URL.CMS_BACKEND.'/picsaca/item.html');
		
	}
	public function chemgiovl()
	{		
		header('Location:'.CMS_URL.CMS_BACKEND.'/picsaca/headers/0');
		//echo "<pre>";
		//print_r($DATA);
	}
	public function craw_update()
	{
		require APPPATH .'cache/temp_data.craw.image.php';
		foreach($DATA_IMAGE as $k=>$value)
		{
			require APPPATH .'cache/temp_data.craw.php';
			foreach($DATA_CONTENT as $key=>$val)
			{
				if($value['his']==$val['image'])
				{
				$DATA_CONTENT[$key]['image']=str_replace($value['his'],$value['url'],$val['image']);
				}else{
				$DATA_CONTENT[$key]['content']=str_replace($value['his'],$value['url'],$val['content']);
				}
				$path = APPPATH .'cache/temp_data.craw.php';
				$DATA_ITEM_A = var_export($DATA_CONTENT,true);
				$cont = '<?php $DATA_CONTENT = '.$DATA_ITEM_A.';?>';
				$handler = fopen($path,'w+');
				fwrite($handler,$cont);
				fclose($handler);
			}
		}
		header('Location: '.CMS_URL.CMS_BACKEND.'/picsaca/craw_update_data.html');
		
	}
	public function craw_update_data()
	{
		require APPPATH .'cache/temp_data.craw.php';
		foreach($DATA_CONTENT as $key=>$val)
		{
		$data['title']=$val['title'];
		$data['parentid']=$val['parentid'];
		$data['description']=$val['description'];
		$data['content']=$val['content'];
		$data['publish']='1';
		$data['image']=$val['image'];
		$data['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
		$data['userid_created'] = $this->auth['id'];
		$count=$this->db->select('*')->from(CMS_PREFIX.'craw_item')->where(array('title'=>$val['title']))->get()->result_array();
		if(!$count){
		$this->db->insert(CMS_PREFIX.'craw_item', $data);
		}
		}
		$dir = APPPATH .'cache/temp_data.craw.php';
		$dir_img = APPPATH .'cache/temp_data.craw.image.php';
		@unlink($dir);
		@unlink($dir_img);
		header('Location: '.CMS_URL.CMS_BACKEND.'/picsaca/update.html');
		
	}
	public function header($id)
	{
		require APPPATH .'cache/temp_header.php';
		$sl=count($DATA)-1;
		$DATA=$DATA[$id];
		if($id<=$sl)
		{
			$dl=$this->do_uploads($DATA['url']);
			$dulieu=$this->db->from(CMS_PREFIX.'craw_item')->where(array('id'=>$DATA['id']))->get()->row_array();
			$content=str_replace($DATA['url'],$dl,$dulieu[$DATA['table']]);
			$updates[$DATA['table']]=$content;
			$this->db->where('id', $DATA['id']);
			$this->db->update(CMS_PREFIX.'craw_item', $updates);
			$id=$id+1;
			header('Location:'.CMS_URL.CMS_BACKEND.'/picsaca/header/'.$id);
		}else{
			header('Location:'.CMS_URL.CMS_BACKEND.'/picsaca/update');
		}
				
	}
	public function headers($idsss)
	{
		require APPPATH .'cache/temp_data.craw.image.php';
		$sl=count($DATA_IMAGE)-1;
		if($idsss<=$sl)
		{
			$DATA_IMAGE[$idsss]['url']=$this->do_uploads($DATA_IMAGE[$idsss]['his']);
			$path = APPPATH .'cache/temp_data.craw.image.php';
			$ITEM_A = var_export($DATA_IMAGE,true);
			$con = '<?php $DATA_IMAGE = '.$ITEM_A.';?>';
			$handler = fopen($path,'w+');
			fwrite($handler,$con);
			fclose($handler);
			$idsss++;
			die(header('Location:'.CMS_URL.CMS_BACKEND.'/picsaca/headers/'.$idsss));
		}else{
			header('Location:'.CMS_URL.CMS_BACKEND.'/picsaca/craw_update');
		}
				
	}
	function do_uploads($DKM)
	{
		$albumId = "6112207780960157217";
		$sitename = $_SERVER['HTTP_HOST'];
		$images_in_slide = 20;
		$max_images_size = 100; //100 = 100MB
		//$dir=$this->input->get_post('dir',TRUE);
		//if($dir=='')$dir='./upload';
		//echo $this->uploadftp($dir.'/');
		$tempfolder='./upload/';
$isWatermark = true;
$transfer = false;
if($DKM){
    $_url = $_urlc = urldecode($DKM);
    if(!preg_match('#^https?:\/\/(.*)\.(gif|png|jpg)$#i', $_url)) die(header('Location: '.CMS_URL.CMS_BACKEND.'/picsaca/item.html'));
    while(stripos($_url,'%')!==false){
        $_url = rawurldecode($_url);
    }
    $filePath = $tempfolder . basename($_url);
    $img = @file_get_contents($_urlc);
    $f = fopen($filePath,"w");
    fwrite($f,$img);
    fclose($f);

    if (!isset($error) && !($size = @getimagesize($filePath) ) )
    {
        $error = 'Please transfer only images, no other files are supported.';
    }

    if (!isset($error) && !in_array($size[2], array(1, 2, 3, 7, 8) ) )
    {
        $error = 'Please transfer only images of type JPEG, GIF or PNG.';
    }

    if(isset($error)) {
        @unlink($filePath);
        die(header('Location: '.CMS_URL.CMS_BACKEND.'/picsaca/update.html'));
    }
    $_FILES['Filedata'] = array(
        'name' => $filePath,
        'tmp_name' => $filePath
    );
    $transfer = true;
    unset($_POST,$_REQUEST,$_GET);
}else{
	$_FILES['Filedata'] = array(
        'name' => $_FILES["nfile"]["name"],
        'tmp_name' => $_FILES["nfile"]["tmp_name"]
    );
}
if($_FILES['Filedata']){
    $error = false;
    $file = $_FILES['Filedata'];
    if (!isset($filePath)) $filePath = $tempfolder . $_SERVER['HTTP_HOST'] . time().'.'.end(explode('.',basename($file['name'])));
    if(!$transfer){
        if (!isset($file) || !is_uploaded_file($file['tmp_name'])) {
            $error = 'Invalid Upload';
        }

        //if (!$error && $file['size'] > $max_images_size * 1024 * 1024)
        //{
        //    $error = 'Please upload only files smaller than 10Mb!';
        //}

        if (!$error && !($size = @getimagesize($file['tmp_name']) ) )
        {
            $error = 'Please upload only images, no other files are supported.';
        }

        if (!$error && !in_array($size[2], array(1, 2, 3, 7, 8) ) )
        {
            $error = 'Please upload only images of type JPEG, GIF or PNG.';
        }

        if($error) die('image='.$error);

        move_uploaded_file($file['tmp_name'], $filePath);
    }
    //watermark_text($filePath,'Hosting by Google - Upload by Trung',$filePath);
    if($isWatermark){
        $watermark_path = $tempfolder. 'logo.png';
        $watermark_id = imagecreatefrompng($watermark_path);
        imagealphablending($watermark_id, false);
        imagesavealpha($watermark_id, true);

        $info_wtm = getimagesize($watermark_path);
        $fileType = strtolower($size['mime']);

        $image_w        = $size[0];
        $image_h        = $size[1];
        $watermark_w    = $info_wtm[0];
        $watermark_h    = $info_wtm[1];
        $is_gif = false;
        switch($fileType)
        {
            case    'image/gif':    $is_gif = true;break;
            case    'image/png':    $image_id = imagecreatefrompng($filePath);imagealphablending($image_id, true);
        imagesavealpha($image_id, true);    break;
            default:                $image_id = imagecreatefromjpeg($filePath); break;
        }
        if(!$is_gif){
            /* Watermark in the bottom right of image*/
            $dest_x  = ($image_w - $watermark_w);
            $dest_y  = ($image_h  - $watermark_h);

            /* Watermark in the middle of image*/
            //$dest_x = round(( $image_h / 2 ) - ( $watermark_h / 2+25 ));
            //$dest_y = round(( $image_w / 2 ) - ( $watermark_w / 2 ));
            
            imagecopy($image_id, $watermark_id, $dest_x, $dest_y, 0, 0, $watermark_w, $watermark_h);
            if($transfer){
                @unlink($filePath);
                $filePath = $tempfolder . basename($file['name']);
            }
            //override to image
            switch($fileType)
            {
                case    'image/png':    @imagepng ($image_id, $filePath);       break;
                default:                @imagejpeg($image_id, $filePath, 100);      break;
            }
            imagedestroy($image_id);
            imagedestroy($watermark_id);
        }
    }
    // load classes
	$this->load->library('lib_google');
	$gp=$this->lib_google->auth_google();

    // update the second argument to be CompanyName-ProductName-Version
    $username = "default";
    $filename = $filePath;
    $xname = preg_replace('/\s+/','_',basename($file['name']));
    if(!preg_match('/^'. preg_quote($_SERVER['HTTP_HOST']) .'/i',$xname)) $photoName = $_SERVER['HTTP_HOST'].'-'.$xname; //$sitename.'-'.
    else $photoName = $xname;
    $photoCaption = $photoName;
    $photoTags = "";


    $fd = $gp->newMediaFileSource($filename);
    $fd->setContentType(strtolower($size['mime']));

    // Create a PhotoEntry
    $photoEntry = $gp->newPhotoEntry();

    $photoEntry->setMediaSource($fd);
    $photoEntry->setTitle($gp->newTitle($photoName));
    $photoEntry->setSummary($gp->newSummary($photoCaption));

    // add some tags
    $keywords = new Zend_Gdata_Media_Extension_MediaKeywords();
    $keywords->setText($photoTags);
    $photoEntry->mediaGroup = new Zend_Gdata_Media_Extension_MediaGroup();
    $photoEntry->mediaGroup->keywords = $keywords;

    // We use the AlbumQuery class to generate the URL for the album
    $albumQuery = $gp->newAlbumQuery();

    $albumQuery->setUser($username);
    $albumQuery->setAlbumId($albumId);

    // We insert the photo, and the server returns the entry representing
    // that photo after it is uploaded
    $insertedEntry = $gp->insertPhotoEntry($photoEntry, $albumQuery->getQueryUrl());
    $contentUrl = "";
    //$firstThumbnailUrl = "";

    if ($insertedEntry->getMediaGroup()->getContent() != null) {
      $mediaContentArray = $insertedEntry->getMediaGroup()->getContent();
      $contentUrl = $mediaContentArray[0]->getUrl();
    }
    if(file_exists($filePath))
    {
        unlink($filePath);
    }
    if($contentUrl) echo 'image=' . $contentUrl;
    else echo 'image=Upload failed.';
}
return $contentUrl;
//header('Location: '.CMS_URL.CMS_BACKEND.'/picsaca/update.html');
	}
	function do_upload()
	{
		$albumId = "5987655189048433073";
		$sitename = $_SERVER['HTTP_HOST'];
		$images_in_slide = 20;
		$max_images_size = 100; //100 = 100MB
		//$dir=$this->input->get_post('dir',TRUE);
		//if($dir=='')$dir='./upload';
		//echo $this->uploadftp($dir.'/');
		$tempfolder=$this->input->get_post('dir',TRUE);
		if($tempfolder=='')$tempfolder='./upload/';
$isWatermark = true;
$transfer = false;
if($_POST['url']){
    $_url = $_urlc = urldecode($_POST['url']);
    if(!preg_match('#^https?:\/\/(.*)\.(gif|png|jpg)$#i', $_url)) die(header('Location: '.CMS_URL.CMS_BACKEND.'/picsaca/item.html'));
    while(stripos($_url,'%')!==false){
        $_url = rawurldecode($_url);
    }
    $filePath = $tempfolder . basename($_url);
    $img = @file_get_contents($_urlc);
    $f = fopen($filePath,"w");
    fwrite($f,$img);
    fclose($f);

    if (!isset($error) && !($size = @getimagesize($filePath) ) )
    {
        $error = 'Please transfer only images, no other files are supported.';
    }

    if (!isset($error) && !in_array($size[2], array(1, 2, 3, 7, 8) ) )
    {
        $error = 'Please transfer only images of type JPEG, GIF or PNG.';
    }

    if(isset($error)) {
        @unlink($filePath);
        die(header('Location: '.CMS_URL.CMS_BACKEND.'/picsaca/update.html'));
    }
    $_FILES['Filedata'] = array(
        'name' => $filePath,
        'tmp_name' => $filePath
    );
    $transfer = true;
    unset($_POST,$_REQUEST,$_GET);
}else{
	$_FILES['Filedata'] = array(
        'name' => $_FILES["nfile"]["name"],
        'tmp_name' => $_FILES["nfile"]["tmp_name"]
    );
}
if($_FILES['Filedata']){
    $error = false;
    $file = $_FILES['Filedata'];
    if (!isset($filePath)) $filePath = $tempfolder . $_SERVER['HTTP_HOST'] . time().'.'.end(explode('.',basename($file['name'])));
    if(!$transfer){
        if (!isset($file) || !is_uploaded_file($file['tmp_name'])) {
            $error = 'Invalid Upload';
        }

        //if (!$error && $file['size'] > $max_images_size * 1024 * 1024)
        //{
        //    $error = 'Please upload only files smaller than 10Mb!';
        //}

        if (!$error && !($size = @getimagesize($file['tmp_name']) ) )
        {
            $error = 'Please upload only images, no other files are supported.';
        }

        if (!$error && !in_array($size[2], array(1, 2, 3, 7, 8) ) )
        {
            $error = 'Please upload only images of type JPEG, GIF or PNG.';
        }

        if($error) die('image='.$error);

        move_uploaded_file($file['tmp_name'], $filePath);
    }
    //watermark_text($filePath,'Hosting by Google - Upload by Trung',$filePath);
    if($isWatermark){
        $watermark_path = $tempfolder. 'logo.png';
        $watermark_id = imagecreatefrompng($watermark_path);
        imagealphablending($watermark_id, false);
        imagesavealpha($watermark_id, true);

        $info_wtm = getimagesize($watermark_path);
        $fileType = strtolower($size['mime']);

        $image_w        = $size[0];
        $image_h        = $size[1];
        $watermark_w    = $info_wtm[0];
        $watermark_h    = $info_wtm[1];
        $is_gif = false;
        switch($fileType)
        {
            case    'image/gif':    $is_gif = true;break;
            case    'image/png':    $image_id = imagecreatefrompng($filePath);imagealphablending($image_id, true);
        imagesavealpha($image_id, true);    break;
            default:                $image_id = imagecreatefromjpeg($filePath); break;
        }
        if(!$is_gif){
            /* Watermark in the bottom right of image*/
            $dest_x  = ($image_w - $watermark_w);
            $dest_y  = ($image_h  - $watermark_h);

            /* Watermark in the middle of image*/
            //$dest_x = round(( $image_h / 2 ) - ( $watermark_h / 2+25 ));
            //$dest_y = round(( $image_w / 2 ) - ( $watermark_w / 2 ));
            
            imagecopy($image_id, $watermark_id, $dest_x, $dest_y, 0, 0, $watermark_w, $watermark_h);
            if($transfer){
                @unlink($filePath);
                $filePath = $tempfolder . basename($file['name']);
            }
            //override to image
            switch($fileType)
            {
                case    'image/png':    @imagepng ($image_id, $filePath);       break;
                default:                @imagejpeg($image_id, $filePath, 100);      break;
            }
            imagedestroy($image_id);
            imagedestroy($watermark_id);
        }
    }
    // load classes
	$this->load->library('lib_google');
	$gp=$this->lib_google->auth_google();

    // update the second argument to be CompanyName-ProductName-Version
    $username = "default";
    $filename = $filePath;
    $xname = preg_replace('/\s+/','_',basename($file['name']));
    if(!preg_match('/^'. preg_quote($_SERVER['HTTP_HOST']) .'/i',$xname)) $photoName = $_SERVER['HTTP_HOST'].'-'.$xname; //$sitename.'-'.
    else $photoName = $xname;
    $photoCaption = $photoName;
    $photoTags = "";


    $fd = $gp->newMediaFileSource($filename);
    $fd->setContentType(strtolower($size['mime']));

    // Create a PhotoEntry
    $photoEntry = $gp->newPhotoEntry();

    $photoEntry->setMediaSource($fd);
    $photoEntry->setTitle($gp->newTitle($photoName));
    $photoEntry->setSummary($gp->newSummary($photoCaption));

    // add some tags
    $keywords = new Zend_Gdata_Media_Extension_MediaKeywords();
    $keywords->setText($photoTags);
    $photoEntry->mediaGroup = new Zend_Gdata_Media_Extension_MediaGroup();
    $photoEntry->mediaGroup->keywords = $keywords;

    // We use the AlbumQuery class to generate the URL for the album
    $albumQuery = $gp->newAlbumQuery();

    $albumQuery->setUser($username);
    $albumQuery->setAlbumId($albumId);

    // We insert the photo, and the server returns the entry representing
    // that photo after it is uploaded
    $insertedEntry = $gp->insertPhotoEntry($photoEntry, $albumQuery->getQueryUrl());
    $contentUrl = "";
    //$firstThumbnailUrl = "";

    if ($insertedEntry->getMediaGroup()->getContent() != null) {
      $mediaContentArray = $insertedEntry->getMediaGroup()->getContent();
      $contentUrl = $mediaContentArray[0]->getUrl();
    }
    if(file_exists($filePath))
    {
        unlink($filePath);
    }
    if($contentUrl) echo 'image=' . $contentUrl;
    else echo 'image=Upload failed.';
}
//return $contentUrl;
header('Location: '.CMS_URL.CMS_BACKEND.'/picsaca/update.html');
	}
	public function uploadftp($remote_dir)
	{
		$ftp_server = "trung.name.vn";
		$ftp_user_name = "trung.name.vn";
		$ftp_user_pass = "d3K0DA2Qdjy";
		$conn_id = ftp_connect($ftp_server);
		$login_result = @ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
		$file_url = "";
		if($login_result) {
			ftp_pasv($conn_id, true);
			if(!@ftp_chdir($conn_id, $remote_dir)) {
				ftp_mkdir($conn_id, $remote_dir);
				ftp_chdir($conn_id, $remote_dir);
			}		
			$file = $_FILES["nfile"]["tmp_name"];
			$remote_file =$_FILES["nfile"]["name"];		
			$ret = ftp_nb_put($conn_id, $remote_file, $file, FTP_BINARY, FTP_AUTORESUME);
			while(FTP_MOREDATA == $ret)$ret = ftp_nb_continue($conn_id);		
			if($ret == FTP_FINISHED)return 'ok;'.$remote_dir.$remote_file;
			else return "Failed uploading file '" . $remote_file . "'.";
		} else return "Cannot connect to FTP server at " . $ftp_server;
		$file = $_FILES["nfile"]["tmp_name"];
		$remote_file =$_FILES["nfile"]["name"];
		$user = "giundatmail@gmail.com";
		$pass = "trung8995";
		$albumId = "6112207780960157217";
		$sitename = 'FREE';
		$images_in_slide = 20;
		$max_images_size = 100; //100 = 100MB
		require APPPATH . '/third_party/Zend/Loader.php';
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
		Zend_Loader::loadClass('Zend_Gdata_Photos');
		Zend_Loader::loadClass('Zend_Http_Client');

		$serviceName = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
		$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $serviceName);
		    // update the second argument to be CompanyName-ProductName-Version
    $gp = new Zend_Gdata_Photos($client, "Google-DevelopersGuide-1.0");
    $username = "default";
    $filename = $remote_dir.$remote_file;
    $xname = preg_replace('/\s+/','_',$file);
    if(!preg_match('/^'. preg_quote($sitename) .'/i',$xname)) $photoName = $xname; //$sitename.'-'.
    else $photoName = $xname;
    $photoCaption = $photoName;
    $photoTags = "";


    $fd = $gp->newMediaFileSource($filename);
    $fd->setContentType(strtolower($size['mime']));

    // Create a PhotoEntry
    $photoEntry = $gp->newPhotoEntry();

    $photoEntry->setMediaSource($fd);
    $photoEntry->setTitle($gp->newTitle($photoName));
    $photoEntry->setSummary($gp->newSummary($photoCaption));

    // add some tags
    $keywords = new Zend_Gdata_Media_Extension_MediaKeywords();
    $keywords->setText($photoTags);
    $photoEntry->mediaGroup = new Zend_Gdata_Media_Extension_MediaGroup();
    $photoEntry->mediaGroup->keywords = $keywords;

    // We use the AlbumQuery class to generate the URL for the album
    $albumQuery = $gp->newAlbumQuery();

    $albumQuery->setUser($username);
    $albumQuery->setAlbumId($albumId);

    // We insert the photo, and the server returns the entry representing
    // that photo after it is uploaded
    $insertedEntry = $gp->insertPhotoEntry($photoEntry, $albumQuery->getQueryUrl());
    $contentUrl = "";
    //$firstThumbnailUrl = "";

    if ($insertedEntry->getMediaGroup()->getContent() != null) {
      $mediaContentArray = $insertedEntry->getMediaGroup()->getContent();
      $contentUrl = $mediaContentArray[0]->getUrl();
    }
    if(file_exists($filePath))
    {
        unlink($filePath);
    }
	}
	public function reload()
	{
		header('Location: item.html');
	}
}