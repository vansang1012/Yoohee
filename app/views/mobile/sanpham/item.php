<!-- CONTENT CONTAINER -->
<div class="content-container">
	
	<!-- Product Header -->
	<div class="content-header">

		<div class="breadcrumbs animated fadeIn"><!-- Product breadcrumb -->
			<a href="<?=CMS_URL?>">Trang chủ</a>
			<a class="active"><?=$category['title']?></a>
		</div><!-- End Product breadcrumb -->

		<h2 class="product-title animated fadeIn"><?=$item['title']?></h2><!-- Product title -->

		<!-- Product thumbnail slider -->
		<ul class="product-slider animated fadeInRight"><!-- Single thumbnail -->
			<li>

				<img src="<?=helper_string_image(240,240,$item['image'])?>" alt="img" />
			</li>
		</ul><!-- End single thumbnail -->
		
		<!-- End Product thumbnail slider -->

		<!-- You can also use static thumbnail (without slider) via HTML tag below
		---------------------------------------------------		
		<div class="big-thumb">
			<img src="images/1.jpg" alt="">
		</div>
		-------------------------------------------------
		-->

		<!-- Product meta -->
		<div class="product-meta animated fadeInUp">
			<div class="price">
				<?=number_format($item['price'])?> VNĐ
			</div>
			<!-- Beside .in-stock class, you can also use .out-of-stock class -->
			
		</div>
		<!-- End Product meta -->

	</div>
	<!-- End Product Header -->
	
	<!-- Product tabs -->
	<div class="product-tabs">
		<ul class="tabs">
			<li class="tab"><a class="active" href="#detail">Mô tả</a></li>
			<!--<li class="tab"><a href="#review">Chi tiết</a></li>
			<li class="tab"><a href="#hd">Hướng dẫn</a></li>-->
		</ul>
	</div>
	<!-- End Product tabs -->
	
	<!-- Product content -->
	<div class="product-content">
		
		<!-- Product detail tabs -->
		<div class="tab-content" id="detail">
			<?=$item['description']?>
			<?=$item['content']?>
			<img style="max-width:100%;height:auto;" src="upload/hd.jpg">
		</div>
		<!-- End Product detail tabs -->

		<!-- Product review list tabs -->
		<div class="tab-content" id="review">
			
			<?=$item['content']?>
		</div>
		<div class="tab-content" id="hd">
			
			<img style="max-width:100%;height:auto;" src="upload/hd.jpg">
		</div>
		<!-- End Product review list tabs -->

	</div>
	<!-- End Product content -->
	
	<!-- Product navigation -->
	<div class="product-action margin-bottom">
		<a class="btn green btn-block margin-bottom_low" href="<?=CMS_URL?>frontend/sanpham/addtocart/<?php echo $item['id']; ?>.html?redirect=<?php echo base64_encode(CMS_URL.'gio-hang.html');?>">Mua ngay</a>
		<a class="btn grey btn-block" href="<?=CMS_URL?>frontend/sanpham/addtocart/<?php echo $item['id']; ?>.html?redirect=<?php echo base64_encode(CMS_URL.'gio-hang.html');?>">Thêm vào giỏ hàng</a>
	</div>
	<!-- End Product navigation -->

	<!-- Product share -->
	<div class="product-share">
		<a href="#" class="fb"><i class="fa fa-facebook"></i></a>
		<a href="#" class="tw"><i class="fa fa-twitter"></i></a>
		<a href="#" class="gplus"><i class="fa fa-google-plus"></i></a>
		<a href="#" class="pint"><i class="fa fa-pinterest"></i></a>
	</div>
	<!-- End Product share -->

	<div class="line"></div>
	
	<!-- Related product section -->
	<div class="page-block">
		
		<h2 class="block-title">
			<span>Các sản phẩm khác</span>
		</h2>

		<ol class="product-list-slider">
<?php $list=$this->db->select('*')->from('sanpham_item')->where(array('publish'=>1))->order_by('id desc')->get()->result_array();?>
<?php if(isset($list) && count($list)){ foreach($list as $key => $val){ ?>	
			<li>
				<div class="thumb">
					<a href="<?=helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX?>">
						<img src="<?=helper_string_image(240,240,$val['image'])?>" alt="">
					</a>
				</div>
				<div class="product-ctn">
					<div class="product-name">
						<a href="<?=helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX?>">
							<?=$val['title']?>
						</a>
					</div>
					<div class="price">
						<span class="price-current"><?=number_format($val['price'],0,'.','.')?> VNĐ</span>
					</div>
				</div>
			</li>
<?php } }?>			
		</ol>

		<div class="clear"></div><!-- Use this class (.clear) to clearing float -->

	</div>
	<!-- End Related product section -->

</div>
<!-- END CONTENT CONTAINER -->