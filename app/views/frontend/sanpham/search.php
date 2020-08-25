<div class="banner_hd">
    <li id="media_image-2" class="widget widget_media_image">

      <img width="1599" height="262" src="upload/image/bannerhd.jpg" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
    </li>
</div>
<div class="shop-page-title category-page-title dark featured-title page-title ">

    <div class="page-title-bg fill">
        <div class="title-bg fill bg-fill" data-parallax-fade="true" data-parallax="-2" data-parallax-background data-parallax-container=".page-title"></div>
        <div class="title-overlay fill"></div>
    </div>

    <div class="page-title-inner flex-row container medium-flex-wrap flex-has-center">
        <div class="flex-col">
            &nbsp;
        </div>
        <div class="flex-col flex-center text-center">
            <div class="is-medium">
                <nav class="woocommerce-breadcrumb breadcrumbs">Bạn đang tìm kiếm: <?php echo $keyword; ?></nav>
            </div>
        </div>
        <!-- .flex-center -->

    </div>
    <!-- flex-row -->
</div>
<!-- .page-title -->
<main id="main" class="">
    <div class="row category-page-row">

        <div class="col large-12">
            <div class="shop-container">

                <div class="woocommerce-notices-wrapper"></div>
                <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-shadow row-box-shadow-1 row-box-shadow-2-hover">
                   <?php if(isset($list) && count($list)){ foreach ($list as $key => $value) {?>
                    <div class="product-small col has-hover product type-product post-1197 status-publish first instock product_cat-san-pham product_cat-san-pham-noi-bat has-post-thumbnail shipping-taxable product-type-simple">
                        <div class="col-inner">

                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
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
                                        <p class="name product-title"><a href="<?php echo helper_string_alias($value['title'].'-ap'.$value['id']).CMS_SUFFIX; ?>"><?php echo $value['title']; ?></a>
                                        </p>
                                    </div>
                                    <div class="price-wrapper">
                                    </div><a href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>" rel="nofollow" data-product_id="1197" class="ajax_add_to_cart  product_type_simple button primary is-flat mb-0 is-small">Mua hàng</a> </div>
                                <!-- box-text -->
                            </div>
                            <!-- box -->
                        </div>
                        <!-- .col-inner -->
                    </div>
                    <!-- col -->
                  <?php }} else { ?>
                <div class="col-xl-12 col-lg-12 col-sm-12">
                  <p>Không tìm thấy sản phẩm của bạn...</p>
                </div>
                <?php } ?>

 
                </div>
                <!-- row -->
            </div>
            <!-- shop container -->
        </div>
        <div class="row">
            <div class="col-12">
              <?php if(isset($pagination) && !empty($pagination) && count($pagination)){ ?>
              <div class="pagination-wrap text-center">
                  <?php echo helper_string_pagination_frontend($pagination, $total_rows, 'Trang'); ?>
                  <div class="clear-both"></div>
              </div>
              <?php } ?>
                
            </div>
        </div>
        <!-- .large-12  -->
    </div>
    <!-- .row -->

</main>
<!-- #main -->