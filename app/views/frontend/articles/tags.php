<!--=== BEGIN: CONTENT ===-->
<div id="vnt-content">
	
	<!--=== BEGIN: PRODUCT ===-->
	<div class="vnt-product white-bg">
		<div class="wrapper">
			<div class="vp-title wow fadeInRight"><h2><span>Tags</span></h2></div>
			<!--===BEGIN GIRD-PRODUCT==-->
			<div class="gird-product">
				<div class="container">
<?php if(isset($list) && count($list)){ ?>
					<div class="row">
<?php foreach($list as $key => $val){ ?>
						<div class="col-md-4 col-xs-12 col-sm-4 wow fadeInUp">
							<div class="thumbnail ">
									<div class="news_img">													
										<a href="<?=helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX?>" class="hover_icon hover_icon_link">
											<img src="<?=helper_string_image(360,270,$val['image'])?>" alt="<?=$val['title']?>">
										</a>
									</div>
								<div class="caption wow fadeInLeft">
									<h4><?=$val['title']?></h4>
								</div>
							</div>
						</div>
						
<?php } ?>							
					</div>
<?php }?>	


				</div><!--CONTAINER-->
				
			</div><!--GIRD-PRODUCT-->
		</div>

	</div>	<!--=== END: PRODUCT ===-->
	<div class="clear"></div>
<div class="pagination-wrapper">
	<?php echo (isset($pagination) && count($pagination) > 1)?'<div class="pagination">'.helper_string_pagination_frontend($pagination, $total_rows).'</div><!-- .pagination -->':'';?>
</div>
	


</div>  <!--=== END: CONTENT ===-->