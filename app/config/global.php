<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

define('CMS_HOST', 'localhost');
define('CMS_USER', 'thudo_yoohee');
define('CMS_PASS', '12345678');
define('CMS_DB', 'thudo_yoohee');
define('CMS_PREFIX', 'cms_trung_ci_');

if(strpos($_SERVER['REQUEST_URI'], 'admin')){
	define('CMS_URL', 'http://yoohee.thudo.org/');
}else{
	define('CMS_URL', 'http://yoohee.thudo.org/');
}
define('CMS_CODE', preg_replace('/[^a-zA-Z0-9]+/i', '', base64_encode(CMS_URL)));
define('CMS_SUFFIX', '.html');

define('CMS_BACKEND', 'admin');

define('KEY_ACTIVE', '26b562a8f96c68a4ec67be9cee8a227c'); //Nhập key "e97c9f55838632b4dd64a5ffe3892ed3" chỉ để chạy trên

define('CMS_META', '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />');
