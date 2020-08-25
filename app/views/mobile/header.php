	<!-- LEFT SIDEBAR -->
	<div id="slide-out-left" class="side-nav">
		
		<!-- Form Search -->
		<div class="top-left-nav">
				<img style="width:200px;margin-top:30px;" src="upload/image/logo/logo.png" alt="">
		</div>
		<!-- End Form Search -->
		
		<!-- App/Site Menu -->
		<div id="main-menu">
			<ul>
				<li><a href="<?=CMS_URL?>">TRANG CHỦ</a></li>
				<li><a href="<?=CMS_URL?>san-pham-cp1.html">SẢN PHẨM</a>
					<ul>
<?php $list=$this->db->select('*')->from('sanpham_item')->where(array('publish'=>1))->order_by('order desc')->get()->result_array();?>
<?php if(isset($list) && count($list)){ foreach($list as $key => $val){ ?>
						<li><a href="<?=helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX?>"><?=$val['title']?></a></li>
<?php } }?>
					</ul>
				</li>
				
<?php 
$menu=$this->db->select('*')->from('articles_category')->where(array('publish'=>1,'parentid'=>1))->order_by('order desc')->get()->result_array();
foreach($menu as $key =>$val){
?>
				<li><a href="<?=helper_string_alias($val['title']).'-c'.$val['id'].CMS_SUFFIX?>"><?=$val['title']?></a></li>
<?php } ?>
				
			</ul>
		</div>
		<!-- End Site/App Menu -->

	</div>
	<!-- END LEFT SIDEBAR -->

	<!-- RIGHT SIDEBAR -->
	
	<!-- END RIGHT SIDEBAR -->
	<!-- MAIN PAGE -->
	<div id="page">
			<!-- FIXED Top Navbar -->
		<div class="top-navbar">
			<div class="top-navbar-left">
				<a href="#" id="menu-left" data-activates="slide-out-left">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			
			<div class="site-title">
				<h1><a href="<?=CMS_URL?>"><img style="width:145px;margin-top:-5px;" src="upload/image/logo/logo.png" alt="Đông Trùng Hạ Thảo Thiên Phúc"></a></h1>
			</div>
		</div>
		<!-- End FIXED Top Navbar -->