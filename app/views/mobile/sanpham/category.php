<!-- CONTENT CONTAINER -->
<div class="content-container">

	<h1 class="page-title animated fadeIn"><?=$category['title']?></h1>
	<!-- Product List -->	
	<ol class="product-list animated fadeInLeft">
<?php if(isset($list) && count($list)){ foreach($list as $key => $val){ ?>		
		<li><!-- Item #1 -->
			<div class="thumb">
				<a href="<?=helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX?>">
					<img src="<?=helper_string_image(240,240,$val['image'])?>" alt="<?=$val['title']?>">
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
		</li><!-- End Item #1 -->
<?php } }?>
		

	</ol>
	<!-- End Product List -->

	<div class="clear"></div><!-- Use this class (.clear) to clearing float -->


</div>
<!-- END CONTENT CONTAINER -->