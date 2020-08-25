<!-- CONTENT CONTAINER -->
<style>
.entry-content img{
	max-width:100%;
	height: auto;
}
</style>
<div class="content-container">

	<div class="content-article selli-canvas">
		<h1 class="entry-title"><?=$item['title']?></h1>
		<div class="entry-meta">
			<span class="date"><?php $time = ($item['created'] != '0000-00-00 00:00:00')?$item['created']:$item['created']; echo gmdate('d/m/Y - h:i A', strtotime($time) + 7*3600)?></span>
			<span class="separator">-</span>
			<span class="author"><?php echo $item['viewed'];?> viewed</span>
		</div><!-- .entry-meta -->
		<div class="entry-content">
			<?php echo $item['content'];?>
		</div><!-- .entry-content -->

		<div class="entry-footer">
			<div class="social-share">
				<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
				<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
				<a href="#" class="gplus"><i class="fa fa-google-plus"></i></a>
			</div><!-- .social-share -->
		</div><!-- .entry-footer -->
	</div><!-- .content-article -->
<!-- Product (Static) Section -->	
			<div class="page-block">
				
	

				<ol class="product-small-list">
<?php $list=$this->db->select('*')->from('articles_item')->where(array('publish'=>1))->limit(5)->order_by('id','random')->get()->result_array();?>
<?php if(isset($list) && count($list)){ foreach($list as $key => $val){ ?>
					<li>
						<div class="thumb">
							<a href="<?=helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX?>">
								<img src="<?=helper_string_image(240,240,$val['image'])?>" alt="">
							</a>
						</div>
						<div class="product-ctn">
							<div class="product-name">
								<a href="<?=helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX?>">
									<?=$val['title']?>
								</a>
							</div>
							
						</div>
					</li>
<?php } }?>
					
				</ol>
				
				<div class="clear"></div><!-- Use this class (.clear) to clearing float -->

			</div>
			<!-- End Product (Static) Section -->	
</div>
<!-- END CONTENT CONTAINER -->