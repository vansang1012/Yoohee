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
<link href="template/backend/css_old/style.css?<?php echo time();?>" rel="stylesheet"/>
<script type="text/javascript" src="template/backend/js/jquery-1.10.2.min.js"></script>
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
    <div class="top-menu">
	<p class="navbar-text" style="color: #fff;" id="clock"></p>
		<script>
		var updateClock = function() {
    function pad(n) {
        return (n < 10) ? '0' + n : n;
    }

    var now = new Date();
    var s = pad(now.getUTCHours()) + ':' +
            pad(now.getUTCMinutes()) + ':' +
            pad(now.getUTCSeconds());

    $('#clock').html(s);

    var delay = 1000 - (now % 1000);
    setTimeout(updateClock, delay);
};
		</script>

        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true">
                    <i class="fa fa-bullseye"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="external">
                            <h3>Không có thông báo mới nào</h3>
                    </li>
                </ul>
            </li>
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN INBOX DROPDOWN -->
            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                    <i class="fa fa-envelope"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="external">
                            <h3>Không có email mới nào</h3>
                    </li>
                </ul>
            </li>
            <!-- END INBOX DROPDOWN -->
            <!-- BEGIN TODO DROPDOWN -->
            <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                    <i class="fa fa-tasks"></i>
                </a>
                <ul class="dropdown-menu extended tasks">
                    <li class="external">
                            <h3>Không có hoạt động mới nào</h3>
                    </li>
                </ul>
            </li>
            <!-- END TODO DROPDOWN -->
            <!-- BEGIN USER LOGIN DROPDOWN -->

                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                        <img alt="Avatar" class="img-circle" src="/template/backend/images/default_avatar.png">
                        <span class="username">
Xin chào, <?php $cookie = helper_string_decode_cookie($_COOKIE['cms_cookie_login_'.CMS_CODE]); echo $cookie['fullname'];?>
                        </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo CMS_BACKEND.'/account/password'.CMS_SUFFIX;?>">
                                <i class="fa fa-key"></i> Đổi mật khẩu
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo CMS_BACKEND.'/authentication/logout'.CMS_SUFFIX;?>">
                                <i class="fa fa-sign-out"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>
        </ul>
    </div>
<!-- END TOP NAVIGATION MENU -->

    </div>
</header>
    <header class="bg-header container-fluid">
    <div class="container">

<!-- BEGIN TOP NAVIGATION MENU -->
<!-- END TOP NAVIGATION MENU -->

    </div>
</header>
<!--end header-->
<!--start navigation-->
<div class="container-fluid bg-nav">
    <nav class="navbar navbar-default custom-navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#automation-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand custom-navbar-brand" href="<?php echo CMS_BACKEND;?>">Admin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php $this->load->view('backend/common/menu');?>

            <!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<!--end navigation-->
<article class="container-fluid" style="min-height: 542px;">
<?php $data = isset($data)?$data:NULL; $this->load->view($template, $data);?>
</article>
<!--start footer
<footer class="bg-footer container-fluid">
    <div class="container">
        <p class="text-center copy-right-text">
            POWERED BY vTPlatform Basic
        </p>
    </div>
</footer>


<!--end footer -->
<!--start javascript-->
<div id="cms-mask">
	<div class="container">
		<img src="template/backend/images/process.gif" alt="Đang tải dữ liệu..." title="Đang tải dữ liệu..."/>
		<span>Đang tải dữ liệu...</span>
	</div>
</div><!-- .cms-mask -->
<script type="text/javascript">
var cms_url = '<?php echo CMS_URL;?>';
var cms_backend = '<?php echo CMS_BACKEND;?>';
var menu_active = '<?php echo isset($menu_active)?$menu_active:'';?>';
</script>

<script type="text/javascript" src="template/plugins/depraiketao/global.js?<?php echo time();?>"></script>
<?php $this->load->view('backend/common/tinymce_358');?>
<script src="template/backend/js/bootstrap.js"></script>
</body>
</html>
