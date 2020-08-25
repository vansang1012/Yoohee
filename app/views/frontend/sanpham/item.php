<?php $slide= $this->db->select('*')->from('slide')->order_by('created desc')->limit(1)->get()->row_array(); ?>
 <?php $image = json_decode($item['gallery'], TRUE); ?>
<div class="banner_hd">
      <li id="media_image-2" class="widget widget_media_image">
        <?php if(strlen($category['image']) > 10) { ?>
        <img width="1599" height="262" src="<?php echo $category['image']; ?>" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
        <?php } else { ?>
        <img width="1599" height="262" src="upload/image/bannerhd.jpg" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
        <?php } ?>
    </li>
</div>
<main id="main" class="">

    <div class="shop-container">

        <div class="container">
            <div class="woocommerce-notices-wrapper"></div>
        </div>
        <!-- /.container -->
        <div id="product-1193" class="product type-product post-1193 status-publish first instock product_cat-san-pham product_cat-san-pham-noi-bat has-post-thumbnail shipping-taxable product-type-simple">
            <div class="product-container">
                <div class="product-main">
                    <div class="row content-row mb-0">

                        <div class="product-gallery large-5 col">

                            <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">

                                <div class="badge-container is-larger absolute left top z-1">
                                </div>
                                <div class="image-tools absolute top show-on-hover right z-3">
                                </div>

                                <figure class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half" data-flickity-options='{
                                    "cellAlign": "center",
                                    "wrapAround": true,
                                    "autoPlay": false,
                                    "prevNextButtons":true,
                                    "adaptiveHeight": true,
                                    "imagesLoaded": true,
                                    "lazyLoad": 1,
                                    "dragThreshold" : 15,
                                    "pageDots": false,
                                    "rightToLeft": false       }'>
                                     <?php $image = json_decode($item['gallery'], TRUE); ?>
                                    <?php if(isset($image) && count($image) > 1) {
                                      $count = 1;
                                      foreach ($image as $key => $val) {
                                    ?>
                                    <div data-thumb="<?php helper_string_image(800,800,$val); ?>" class="woocommerce-product-gallery__image slide first">
                                        <a href="<?php echo  helper_string_image(800,800,$val); ?>"><img width="800" height="800" src="<?php echo helper_string_image(800,800,$val); ?>" class="wp-post-image" alt="" title="54" data-caption=""  data-large_image_width="720" data-large_image_height="960" />
                                        </a>
                                    </div>
                                    <?php }} else { ?>
                                    <div data-thumb="<?php helper_string_image(100,100,$item['image']); ?>" class="woocommerce-product-gallery__image slide first">
                                        <a href="<?php echo helper_string_image(800,800,$item['image']); ?>"><img width="600" height="800" src="<?php echo helper_string_image(800,800,$item['image']); ?>" class="wp-post-image" alt="" title="54" data-caption=""  data-large_image_width="720" data-large_image_height="960" />
                                        </a>
                                    </div>
                                <?php } ?>
                                </figure>

                                <div class="image-tools absolute bottom left z-3">
                                    <a href="#product-zoom" class="zoom-button button is-outline circle icon tooltip hide-for-small" title="Zoom">
                                        <i class="icon-expand"></i> </a>
                                </div>
                            </div>

                            <div class="product-thumbnails thumbnails slider-no-arrows slider row row-small row-slider slider-nav-small small-columns-4" data-flickity-options='{
                                  "cellAlign": "left",
                                  "wrapAround": false,
                                  "autoPlay": false,
                                  "prevNextButtons": true,
                                  "asNavFor": ".product-gallery-slider",
                                  "percentPosition": true,
                                  "imagesLoaded": true,
                                  "pageDots": false,
                                  "rightToLeft": false,
                                  "contain": true
                              }'>   

                                <?php $image = json_decode($item['gallery'], TRUE); ?>
                                    <?php if(isset($image) && count($image) > 1) {
                                      $count = 1;
                                      foreach ($image as $key => $val) {
                                    ?>
                                    <div class="col is-nav-selected first">

                                    <a>
                                        <img src="<?php echo helper_string_image(800,800,$val); ?>" width="600" height="600" class="attachment-woocommerce_thumbnail" /> </a>
                                </div>
                                <?php }} ?>
                            </div>
                            <!-- .product-thumbnails -->
                        </div>

                        <div class="product-info summary col-fit col entry-summary product-summary text-left">

                            <h1 class="product-title entry-title"><?php echo $item['title']; ?></h1>

                            <div class="rt_woocommerce_single_product_summary clearfix">
                                <div>
                                    
                                    <?php 
                                        if($item['price'] == 0) { 
                                            echo '<p class="price2"><span>Giá: Liên hệ</span></p>'; 
                                        } else { 
                                            echo '<p class="price2"><span>'.number_format($item['price'], 0, '.', '.').'đ</span></p>';  } 
                                    ?>
               
                                    <div class="product-short-description">
                                        <p><?php echo $item['title'] ?></p>
                                    </div>
                                    <div class="Hotline_single">
                                        <div>
                                            Hotline hỗ trợ 24/7: <?php echo $this->system['hotline']; ?>
                                        </div>
                                        <div>
                                            <div id="fb-root"></div>
                                            <script async defer crossorigin="anonymous" src="<?php echo $item['image']; ?>"></script>
                                            <div class="fb-like" data-href="<?php echo helper_string_alias($item['title']).'-ap'.$item['id'].CMS_SUFFIX; ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                        </div>
                                    </div>

                                    <div class="devvn_quickbuy_p">
                                        <a href="<?php echo CMS_URL; ?>frontend/sanpham/addtocart/<?php echo $item['id'].CMS_SUFFIX; ?>?redirect=<?=base64_encode(CMS_URL.'gio-hang.html')?>" class="devvn_buy_now devvn_buy_now_style" data-id="1193">
                                            <strong>Mua ngay</strong>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo CMS_URL; ?>frontend/sanpham/addtocart/<?php echo $item['id'].CMS_SUFFIX; ?>?redirect=<?=base64_encode(CMS_URL.'gio-hang.html')?>" class="devvn_buy_now devvn_buy_now_style" data-id="1193">
                                <strong>Mua ngay</strong>
                                <span></span>
                            </a>

                        </div>
                        <!-- .summary -->

                        <div id="product-sidebar" class="mfp-hide">
                            <div class="sidebar-inner">
                            </div>
                            <!-- .sidebar-inner -->
                        </div>

                    </div>
                    <!-- .row -->
                </div>
                <!-- .product-main -->

                <div class="product-footer">
                    <div class="container">

                        <div class="woocommerce-tabs container tabbed-content">
                            <ul class="product-tabs  nav small-nav-collapse tabs nav nav-uppercase nav-tabs nav-normal nav-left">
                                <li class="description_tab  active">
                                    <a href="#tab-description">Chi tiết sản phẩm</a>
                                </li>
                                <li class="reviews_tab  ">
                                    <a href="#tab-reviews">Đánh giá (0)</a>
                                </li>
                            </ul>
                            <div class="tab-panels">

                                <div class="panel entry-content active" id="tab-description">


                                    <div class="chat-message wrap-message rotate-container ">
                                        <div class="">
                                            <div class="card  card--text admin">
                                                <div><span class="text">
                                                    <?php echo $item['content']; ?>
                                                </span>
                                                </div>

                                            <div class="chat-message__actionholder "></div>
                                        </div>
                                    </div>
                                    <div class="chat-message  rotate-container ">
                                        <div class="">
                                            <div class="card  pin-react  admin card--group-photo">
                                                <div class="card--group-photo__row ">
                                                    <div class="card--group-photo__row__item">
                                                        <div class="chat-message-picture__photooverlay no-shadow-border card--picture__high-definition-group"></div>
                                                    </div>
                                                    <div class="card--group-photo__row__item">
                                                        <div class="chat-message-picture__photooverlay no-shadow-border card--picture__high-definition-group"></div>
                                                    </div>
                                                    <div class="card--group-photo__row__item">
                                                        <div class="chat-message-picture__photooverlay no-shadow-border card--picture__high-definition-group"></div>
                                                    </div>
                                                </div>
                                                <div class="message-reaction-container  always-display  img-no-title ">
                                                    <div>
                                                        <div class="msg-reaction-icon">
                                                            <div class="default-react-icon-thumb"></div>
                                                        </div>
                                                        <div class="emoji-list-wrapper  hide-elist">
                                                            <div class="reaction-emoji-list ">
                                                                <div class="reaction-emoji-icon"></div>
                                                                <div class="reaction-emoji-icon"></div>
                                                                <div class="reaction-emoji-icon"></div>
                                                                <div class="reaction-emoji-icon"></div>
                                                                <div class="reaction-emoji-icon"></div>
                                                                <div class="reaction-emoji-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-message__photogroup  pin-react ">
                                                <div class="chat-message__actionholder photo-group  pin-react "></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-message wrap-message rotate-container ">
                                        <div class="">
                                            <div class="card  card--text admin"></div>
                                        </div>
                                    </div>
                                    <div class="rt-social"><a class="rt-link rt-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo helper_string_alias($item['title']).'-ap'.$item['id'].CMS_SUFFIX; ?>" target="_blank">Facebook</a><a class="rt-link rt-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $item['title']; ?>&amp;url=<?php echo helper_string_alias($item['title']).'-ap'.$item['id'].CMS_SUFFIX; ?>&amp;via=rt" target="_blank">Twitter</a><a class="rt-link rt-googleplus" href="https://plus.google.com/share?url=<?php echo helper_string_alias($item['title']).'-ap'.$item['id'].CMS_SUFFIX; ?>" target="_blank">Google+</a><a class="rt-link rt-pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo helper_string_alias($item['title']).'-ap'.$item['id'].CMS_SUFFIX; ?>&amp;media=<?php echo $item['image']; ?>&amp;description=<?php echo $item['title']; ?>" data-pin-custom="true" target="_blank">Pin It</a>
                                    </div>
                                    <div class="rt-cmfb"></div>
                                </div>


                                <div class="panel entry-content " id="tab-reviews">
                                    <div class="row" id="reviews">
                                        <div class="col large-12" id="comments">
                                            <h3 class="normal">Đánh giá</h3>


                                            <p class="woocommerce-noreviews">Chưa có đánh giá nào.</p>

                                        </div>



                                    </div>
                                </div>

                            </div>
                            <!-- .tab-panels -->
                        </div>
                        <!-- .tabbed-content -->

                        <div id="fb-root"></div>
                        <script>
                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <div class="fb-comments" data-href="<?php echo helper_string_alias($item['title']).'-ap'.$item['id'].CMS_SUFFIX; ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>

                        <div class="related related-products-wrapper product-section">

                            <h3 class="heading">
                                <span>Sản phẩm liên quan</span>
                            </h3>

                            <div class="row large-columns-4 medium-columns- small-columns-2 row-small">
                                 <?php $product = $this->db->select('*')->from('sanpham_item')->where(array('publish'=>1,'parentid'=>$category['id']))->limit(4)->order_by('RAND()')->get()->result_array(); ?>
                                        <?php if(isset($product) && count($product)){ foreach ($product as $key => $value) {?>
                                <div class="product-small col has-hover product type-product post-1214 status-publish instock product_cat-san-pham product_cat-san-pham-noi-bat has-post-thumbnail shipping-taxable product-type-simple">
       
                                    <div class="col-inner">
                                       
                                        <div class="product-small box">
                                            <div class="box-image">
                                    <div class="image-zoom-fade">
                                        <a href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>">
                                            <img width="600" height="600" src="<?php echo helper_string_image(600,600,$value['image']); ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""  sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                    </div>
                                    
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                        <a class="quick-view" data-prod="1197" href="#quick-view">Xem nhanh</a> </div>
                                </div>
                                            <!-- box-image -->

                                            <div class="box-text box-text-products">
                                                <div class="title-wrapper">
                                                    <p class="name product-title"><a href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>"><?php echo $value['title']; ?></a>
                                                    </p>
                                                </div>
                                                <div class="price-wrapper">
                                                </div><a href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>" rel="nofollow" data-product_id="1214" class="ajax_add_to_cart  product_type_simple button primary is-flat mb-0 is-small">Mua hàng</a> </div>
                                            <!-- box-text -->
                                        </div>
                                        <!-- box -->
                                       
                                    </div>
                                    <!-- .col-inner -->

                                    
                                </div>
                            <?php }} ?>
                                <!-- col -->
                         
                            </div>
                        </div>

                    </div>
                    <!-- container -->
                </div>
                <!-- product-footer -->
            </div>
            <!-- .product-container -->
            
    </div>
    <!-- shop container -->

</main>
<!-- #main -->