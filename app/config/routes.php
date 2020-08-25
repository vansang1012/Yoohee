<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'frontend/home/index';
//$route['default_controller'] = CMS_BACKEND.'/home/index';
$route[CMS_BACKEND] = CMS_BACKEND.'/home/index';

// frontend
$route['admin$'] = 'frontend/home/admin';
$route['login$'] = 'frontend/home/login';
$route['about$'] = 'frontend/home/about';
$route['novasol-curcumin$'] = 'frontend/home/nova';
$route['san-pham$'] = 'frontend/home/sanpham';
$route['trai-nghiem-nguoi-dung$'] = 'frontend/home/trainghiem';
$route['loc-du-an$'] = 'frontend/home/locduan';
$route['fb-callback$'] = 'frontend/home/fbcallback';
$route['lien-he$'] = 'frontend/contact/index';
$route['([a-zA-Z0-9/-]+)-t(\d+)$'] = 'frontend/home/trainghiem_item/$2';
$route['bai-viet-moi-dang-p(\d+)$'] = 'frontend/home/newpost/$1';
$route['active/([a-zA-Z0-9/-/.]+)$'] = 'frontend/active/index/$1';
$route['activekey/([a-zA-Z0-9/-/.]+)$'] = 'frontend/active/key/$1';
$route['activemes/([a-zA-Z0-9/-/.]+)$'] = 'frontend/active/mes/$1';
$route['bai-viet-moi-dang$'] = 'frontend/home/newpost/1';
$route['([a-zA-Z0-9/-]+)-c(\d+)-p(\d+)$'] = 'frontend/articles/category/$2/$3';
$route['([a-zA-Z0-9/-]+)-c(\d+)$'] = 'frontend/articles/category/$2';
$route['([a-zA-Z0-9/-]+)-a(\d+)$'] = 'frontend/articles/item/$2';
$route['chu-de/([a-zA-Z0-9/-]+)-p(\d+)$'] = 'frontend/articles/tags/$1/$2';
$route['chu-de/([a-zA-Z0-9/-]+)$'] = 'frontend/articles/tags/$1';
$route['chu-de-p(\d+)$'] = 'frontend/articles/tags_detail/$1';
$route['chu-de$'] = 'frontend/articles/tags_detail/';
$route['([a-zA-Z0-9/-]+)-cp(\d+)-p(\d+)$'] = 'frontend/sanpham/category/$2/$3';
$route['([a-zA-Z0-9/-]+)-cp(\d+)$'] = 'frontend/sanpham/category/$2';
$route['([a-zA-Z0-9/-]+)-ap(\d+)$'] = 'frontend/sanpham/item/$2';

$route['dat-hang$'] = 'frontend/home/dathang';

$route['gio-hang$'] = 'frontend/sanpham/cart';
$route['thanh-toan$'] = 'frontend/sanpham/payment';
$route['404_override'] = '';

$route['dong-trung-ha-thao-tuoi$'] = 'frontend/articles/item/47';
$route['dong-trung-ha-thao-thien-phuc'] = 'frontend/articles/item/50';
$route['dong-trung-ha-thao'] = 'frontend/articles/item/53';
$route['dong-trung-ha-thao-kho'] = 'frontend/articles/item/54';
$route['dong-trung-ha-thao-chua-benh-gi'] = 'frontend/articles/item/56';
$route['dong-trung-ha-thao-gia-bao-nhieu'] = 'frontend/articles/item/60';
$route['cach-dung-dong-trung-ha-thao'] = 'frontend/articles/item/61';
$route['dong-trung-ha-thao-viet-nam-gia-bao-nhieu'] = 'frontend/articles/item/59';
$route['mua-dong-trung-ha-thao-tai-ha-noi'] = 'frontend/articles/item/62';
$route['gia-dong-trung-ha-thao-kho'] = 'frontend/articles/item/63';
$route['dong-trung-ha-thao-viet-nam-mua-o-dau'] = 'frontend/articles/item/64';
$route['dong-trung-ha-thao-la-gi'] = 'frontend/articles/item/65';
$route['dong-trung-ha-thao-qua-the-kho'] = 'frontend/articles/item/67';
$route['dong-trung-ha-thao-tuoi-dang-soi'] = 'frontend/articles/item/68';
$route['dong-trung-ha-thao-viet-nam'] = 'frontend/articles/item/69';
$route['dong-trung-ha-thao-tuoi-dang-con'] = 'frontend/articles/item/70';
$route['chao-dong-trung-ha-thao'] = 'frontend/articles/item/71';
$route['dong-trung-ha-thao-nguyen-con'] = 'frontend/articles/item/73';
$route['dong-trung-ha-thao-tuoi-viet-nam'] = 'frontend/articles/item/75';
$route['cach-trong-nam-dong-trung-ha-thao'] = 'frontend/articles/item/76';
$route['dong-trung-ha-thao-the-nhong-kho'] = 'frontend/articles/item/77';
$route['dong-trung-ha-thao-the-nhong-tuoi'] = 'frontend/articles/item/78';
$route['dong-trung-ha-thao-thai-lat'] = 'frontend/articles/item/79';
$route['dong-trung-ha-thao-vinh-phuc'] = 'frontend/articles/item/80';
$route['dong-trung-ha-thao-bac-ninh'] = 'frontend/articles/item/81';
$route['dong-trung-ha-thao-bac-giang'] = 'frontend/articles/item/83';
$route['tra-dong-trung-ha-thao'] = 'frontend/articles/item/85';
$route['tra-tui-loc-dong-trung-ha-thao'] = 'frontend/articles/item/87';
$route['dong-trung-ha-thao-qua-the-kho-say-lanh'] = 'frontend/articles/item/88';
$route['dong-trung-ha-thao-bot-sinh-khoi'] = 'frontend/articles/item/89';
$route['dong-trung-ha-thao-kho-bot-nghien-min'] = 'frontend/articles/item/91';
$route['dong-trung-ha-thao-thai-nguyen'] = 'frontend/articles/item/92';
$route['nam-duoc-lieu-dong-trung-ha-thao'] = 'frontend/articles/item/93';
$route['dong-trung-ha-thao-ngan-ngua-ung-thu'] = 'frontend/articles/item/95';
$route['dong-trung-ha-thao-ho-tro-tri-than'] = 'frontend/articles/item/104';



/* End of file routes.php */
/* Location: ./application/config/routes.php */