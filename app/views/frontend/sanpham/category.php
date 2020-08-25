<div class="banner_hd">
    <li id="media_image-2" class="widget widget_media_image">
        <?php if(strlen($category['image']) > 10) { ?>
        <img width="1599" height="262" src="<?php echo $category['image']; ?>" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
        <?php } else { ?>
        <img width="1599" height="262" src="upload/image/bannerhd.jpg" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
        <?php } ?>
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
                <nav class="woocommerce-breadcrumb breadcrumbs"><?php echo $category['title']; ?></nav>
            </div>
        </div>
        <!-- .flex-center -->
        <div class="flex-col flex-right text-right medium-text-center form-flat">
            <p class="woocommerce-result-count hide-for-medium">
                Hiển thị một kết quả duy nhất</p>
            <form class="woocommerce-ordering" method="post" action="">
                <select name="sort" id="" class="select-third" onchange="this.form.submit()">
                    <option value="id_desc" <?php if($_SESSION[ 'sort']=='id_desc' ){ echo "selected"; }?>> Hiển thị sắp xếp </option>
                    <option value="price_asc" <?php if($_SESSION[ 'sort']=='price_asc' ){ echo "selected"; }?>>Giá tăng dần</option>
                    <option value="price_desc" <?php if($_SESSION[ 'sort']=='price_desc' ){ echo "selected"; }?>>Giá giảm dần</option>
                    <option value="title_asc" <?php if($_SESSION[ 'sort']=='title_asc' ){ echo "selected"; }?>>Theo tên A->Z</option>
                    <option value="title_desc" <?php if($_SESSION[ 'sort']=='title_desc' ){ echo "selected"; }?>>Theo tên Z->A</option>
                    <option value="viewed_desc" <?php if($_SESSION[ 'sort']=='viewed_desc' ){ echo "selected"; }?>>Xem nhiều nhất</option>
                    <option value="id_desc">Hiển thị mặc định</option>
                </select>
                
            </form>
        </div>
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
                  <p>Đang cập nhật sản phẩm...</p>
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