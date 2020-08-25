<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<base href="<?php echo CMS_URL;?>" />
<title><?php echo isset($meta_title)?$meta_title:'';?></title>
<meta name="title" content="<?php echo isset($meta_title)?$meta_title:'';?>" />
<meta name="keywords" content="<?php echo isset($meta_keywords)?$meta_keywords:'';?>" />
<meta name="description" content="<?php echo isset($meta_description)?$meta_description:'';?>" />
<link href="template/backend/css/bootstrap.min.css?<?php echo time();?>" rel="stylesheet"/>
<link href="template/backend/css/font-awesome.min.css?<?php echo time();?>" rel="stylesheet"/>
<link href="template/backend/css/contents/common.css?<?php echo time();?>" rel="stylesheet"/>
<link href="template/backend/css/toastr.css?<?php echo time();?>" rel="stylesheet"/>
<link href="template/backend/css/contents/vps.css?<?php echo time();?>" rel="stylesheet"/>
<style>
	.dropdown:hover .dropdown-menu {
		display: block;
	}
</style>

</head>
<body class="bg-gray">
    <header class="bg-header container-fluid">
    <div class="container">       
        
<!-- BEGIN TOP NAVIGATION MENU -->
<!-- END TOP NAVIGATION MENU -->

    </div>
</header>
<!--end header-->
<?php $data = isset($data)?$data:NULL; $this->load->view($template, $data);?>
<script src="template/backend/js/jquery-1.10.2.min.js"></script>
<script src="template/backend/js/bootstrap.js"></script>
</body>
</html>
