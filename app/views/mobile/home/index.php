		<!-- Featured Slider -->
		<!--<<div class="featured-slider animated fadeInRight">

			<div class="featured-item"><!-- 1. Featured Slider Item -->
		<!--<		<div class="thumb">
					<!--<img src="/upload/image/mobi/2.jpg" alt="">-->
		<!--<		</div>
				<!--<div class="overlay"></div>
				<div class="caption">
					<h2><a href="#">Chúc mừng năm mới 2018</a></h2>
				</div>-->
		<!--<	</div><!-- 1. End Featured Slider Item -->

			

		<!--<</div>-->
		<!-- End Featured Slider -->

		<!-- CONTENT CONTAINER -->
		<div class="content-container animated fadeInUp">
			 

			<!-- Category Section -->	
			<div class="page-block margin-bottom">

				<h2 class="block-title">
					<span>Sản phẩm</span><!-- <span> tag to make blue border on this text only -->
				</h2>

				<!-- Category Listing -->
				<ol class="category-list">
<?php $list=$this->db->select('*')->from('sanpham_item')->where(array('publish'=>1))->limit(8)->order_by('order desc')->get()->result_array();?>
<?php if(isset($list) && count($list)){ foreach($list as $key => $val){ ?>					
					<li><!-- Category list item #1 -->
						<div class="thumb">
							<a href="<?=helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX?>">
								<img src="<?=helper_string_image(300,300,$val['image'])?>" alt="">
							</a>
						</div>
						<div class="category-ctn">
							<div class="cat-name">
								<a href="<?=helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX?>"><?=$val['title']?></a>
							</div>
							<div class="cat-desc">
								<span class="price-current"><?=number_format($val['price'])?> VNĐ</span>
							</div>
						</div>
						
					</li><!-- End Category list item #1 -->
<?php } }?>
					

				</ol>

				<div class="clear"></div><!-- Use this class (.clear) to clearing float -->

			</div>
			<!-- End Category Section -->

			<!-- Product (Static) Section -->	
			<div class="page-block">
				
				<h2 class="block-title">
					<span>Tin tức</span>
					
				</h2>

				<ol class="product-small-list">
<?php $list=$this->db->select('*')->from('articles_item')->where(array('publish'=>1))->limit(4)->order_by('order desc')->get()->result_array();?>
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

			<div class="box_product_index" style="background: #fff;">
		        <div class="container">
		            <h2 class="h1_title text-center" style="border-bottom: 2px solid #000;">TRUYỀN THÔNG NÓI VỀ CHÚNG TÔI</h2>
		            <div class="row row-product">
		                <div class="col-md-3 col-sm-3 col-xs-12 col-product">
		                    <div class="" style="margin: 10px;">
		                        <a href="https://www.youtube.com/watch?v=Y25lJDHGaBM" class="html5lightbox" data-fullscreenmode="true" data-autoslide="true" data-group="set1" title="Đông trùng hạ thảo được nuôi trồng thành công tại Đà Lạt | Chào buổi sáng"><img src="http://duocthaothienphuc.vn/upload/image/video0.jpg" style="width: 100%; height: auto;" alt=""></a>
		                        <h3>Đông trùng hạ thảo được nuôi trồng thành công tại Đà Lạt | Chào buổi sáng</h3>                        
		                    </div>
		                </div>
		                <div class="col-md-3 col-sm-3 col-xs-12 col-product">
		                    <div class="" style="margin: 10px;">                        
		                        <a href="https://www.youtube.com/watch?v=b9wMR5jdle0" class="html5lightbox" data-fullscreenmode="true" data-autoslide="true" data-group="set1" title="Tìm hiểu về nấm đông trùng hạ thảo"><img src="http://duocthaothienphuc.vn/upload/image/video1.jpg" style="width: 100%; height: auto;" alt=""></a>
		                        <h3>Tìm hiểu về nấm đông trùng hạ thảo</h3> 
		                    </div>
		                </div>
		                <div class="col-md-3 col-sm-3 col-xs-12 col-product">
		                    <div class="" style="margin: 10px;">                        
		                        <a href="https://www.youtube.com/watch?v=7MgnrNydEDk" class="html5lightbox" data-fullscreenmode="true" data-autoslide="true" data-group="set1" title="Đông trùng hạ thảo được sản xuất như thế nào?"><img src="http://duocthaothienphuc.vn/upload/image/video2.jpg" style="width: 100%; height: auto;" alt=""></a>
		                        <h3>Đông trùng hạ thảo được sản xuất như thế nào?</h3> 
		                    </div>
		                </div>
		                <div class="col-md-3 col-sm-3 col-xs-12 col-product">
		                    <div class="" style="margin: 10px;">                        
		                        <a href="https://www.youtube.com/watch?v=MbhANuj-NkY" class="html5lightbox" data-fullscreenmode="true" data-autoslide="true" data-group="set1" title="Đông trùng hạ thảo Thiên Phúc"><img src="http://duocthaothienphuc.vn/upload/image/video3.jpg" style="width: 100%; height: auto;" alt=""></a>
		                        <h3>Đông trùng hạ thảo Thiên Phúc</h3> 
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>


		</div>
		<!-- END CONTENT CONTAINER -->