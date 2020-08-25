<main id="main" class="">
    <div id="content" role="main" class="content-area">
        <section class="section sec_slide" id="section_245642542">
            <div class="bg section-bg fill bg-fill  bg-loaded">
            </div>
            <!-- .section-bg -->
            <div class="section-content relative">
                <div id="metaslider-id-1004" style="width: 100%;" class="ml-slider-3-15-1 metaslider metaslider-flex metaslider-1004 ml-slider">
                    <div id="metaslider_container_1004">
                        <div id="metaslider_1004">
                            <ul aria-live="polite" class="slides">
                                <?php $slide = $this->db->select('*')->from('slide')->where(array('publish'=>1))->order_by('created asc')->get()->result_array(); ?>
                                <?php if(isset($slide) && count($slide)) { foreach ($slide as $key => $value) { ?>
                                <li style="display: block; width: 100%;" class="slide-1006 ms-image"><img src="<?php echo $value['image'] ?>" height="614" width="1600" alt="" class="slider-1004 slide-1006" title="slide" />
                                </li>
                                <?php }} ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- .section-content -->

            <style scope="scope">
                #section_245642542 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
            </style>
        </section>
        
        <?php $why_cate = $this->db->select('*')->from('articles_category')->where(array('publish'=>1, 'id'=>11))->order_by('created desc')->get()->result_array(); ?>
        <?php if(isset($why_cate) && count($why_cate)) { foreach ($why_cate as $key => $value) { ?>
        <section class="section noidung1" id="section_1986319704">
            <div class="bg section-bg fill bg-fill  bg-loaded">
            </div>
            <!-- .section-bg -->

            <div class="section-content relative">

                <div class="row" id="row-443301762">
                    <div class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1043238442">
                                <div class="img-inner dark">
                                    <img width="613" height="578" src="<?php echo $value['image']; ?>" class="attachment-large size-large" alt="" />
                                </div>

                                <style scope="scope">
                                    #image_1043238442 {
                                        width: 100%;
                                    }
                                </style>
                            </div>

                        </div>
                    </div>
                    <div class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <h2 class="div1_tit"><?php echo $value['title']; ?></h2>
                            <div class="div1">
                                <?php $why_item = $this->db->select('*')->from('articles_item')->where(array('publish'=>1, 'parentid'=>$value['id']))->order_by('created desc')->limit(4)->get()->result_array(); ?>
                                <?php if(isset($why_item) && count($why_item)) { foreach ($why_item as $key => $val) { ?>
                                <div>
                                    <h3><?php echo $val['title']; ?></h3>
                                    <p><?php echo helper_string_cutnchar(strip_tags($val['description']), 170); ?></p>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .section-content -->


            <style scope="scope">
                #section_1986319704 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
            </style>
        </section>
        <?php }} ?>

        <?php $dichvu_baiviet = $this->db->select('*')->from('articles_category')->where(array('publish'=>1, 'id'=>8))->order_by('created desc')->get()->result_array(); ?>
        <?php if(isset($dichvu_baiviet) && count($dichvu_baiviet)) { foreach ($dichvu_baiviet as $key => $value) { ?>
        <section class="section noidung2" id="section_228573741">
            <div class="bg section-bg fill bg-fill  bg-loaded">
            </div>
            <!-- .section-bg -->

            <div class="section-content relative">

                <div class="row" id="row-639688117">
                    <div class="col small-12 large-12">
                        <div class="col-inner">
                            <div class="div1">
                                <h2><a href="<?php echo helper_string_alias($value['title']).'-c'.$value['id'].CMS_SUFFIX; ?>"><?php echo $value['title']; ?></a></h2>
                                <p><?php echo $value['description']; ?></p>
                            </div>
                        </div>
                    </div>

                    <style scope="scope">
                    </style>
                </div>
                <div class="row" id="row-1146009899">
                    <?php $service = $this->db->select('*')->from('articles_item')->where(array('publish'=>1, 'parentid'=> $value['id']))->order_by('id desc')->limit(4)->get()->result_array(); ?>
                    <?php if(isset($service) && count($service)) { foreach ($service as $key => $val) { ?>
                    <div class="col medium-3 small-6 large-3">
                        <div class="col-inner">
                            <div class="div2"><img src="<?php echo helper_string_image(800,600,$val['image']); ?>">
                                </p>
                                <h2><?php echo $val['title'] ?></h2>
                                <h3><?php echo $val['title_korea'] ?></h3>
                                <p class="tit"><?php echo helper_string_cutnchar(strip_tags($val['description']),100); ?></p>
                                <p><a href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX; ?>">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
                    
                    <style scope="scope">
                    </style>
                </div>
            </div>
            <!-- .section-content -->


            <style scope="scope">
                #section_228573741 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
            </style>
        </section>
        <?php }} ?>
        <section class="section noidung3" id="section_23440488">
            <div class="bg section-bg fill bg-fill  bg-loaded">
            </div>
            <!-- .section-bg -->

            <div class="section-content relative">

                <div class="row" id="row-1316881126">
                    <div class="col small-12 large-12">
                        <div class="col-inner">
                            <h2 class="div1"><span style="color: #ff0000;">Bảng giá dịch vụ nổi bật</span></h2>
                        </div>
                    </div>

                    <style scope="scope">
                    </style>
                </div>
                <div class="row" id="row-1260187641">
                    <?php $dichvunoibat = $this->db->select('*')->from('sanpham_item')->where(array('publish'=>1,'parentid'=>33, 'highlight' => 1))->order_by('created desc')->limit(8)->get()->result_array(); ?>
                    <?php if(isset($dichvunoibat) &&count($dichvunoibat)){ foreach ($dichvunoibat as $key => $value) { ?>
                       
                    <div class="col medium-3 small-6 large-3">
                        <div class="col-inner">
                            <div class="div2">
                                <img src="<?php echo helper_string_image(800,600,$value['image']) ?>">
                                <br />
                                <span>Dịch vụ</span>
                                </p>
                                <h2><?php echo $value['title']; ?></h2>
                                <h3><?php 
                                        if($value['price'] == 0) { 
                                            echo 'Liên hệ'; 
                                        } else { 
                                            echo number_format($value['price'], 0, '.', '.').'đ/<span>Buổi</span>';  } 
                                    ?></h3>
                                <p><a href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
                    
                    <style scope="scope">
                    </style>
                </div>
            </div>
            <!-- .section-content -->


            <style scope="scope">
                #section_23440488 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
            </style>
        </section>

        <section class="section noidung4" id="section_1609598905">
            <div class="bg section-bg fill bg-fill  bg-loaded">

            </div>
            <!-- .section-bg -->

            <div class="section-content relative">

                <div class="row" id="row-931949439">
                    <div class="col small-12 large-12">
                        <div class="col-inner">
                            <h2 class="heading clear"><a> Sản phẩm nổi bật </a> </h2>
                            <div class="block-product-2">
                                <?php $products = $this->db->select('*')->from('sanpham_item')->where(array('publish'=>1,'parentid'=>32,'highlight'=>1))->order_by('created desc')->limit(6)->get()->result_array(); ?>
                                <?php if(isset($products) && count($products)){ foreach ($products as $key => $value) {?>
                                 
                                <div class="product-small col col-4 has-hover product type-product post-1214 status-publish first instock product_cat-san-pham product_cat-san-pham-noi-bat has-post-thumbnail shipping-taxable product-type-simple">
                                    <div class="col-inner">

                                        <div class="badge-container absolute left top z-1">
                                        </div>
                                        <div class="product-small ">
                                            <div class="box-image">
                                                <div class="">
                                                    <a href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>">
                                                        <img width="720" height="960" src="<?php echo helper_string_image(800,800,$value['image']); ?>" class="attachment- size-" alt=""  sizes="(max-width: 720px) 100vw, 720px" /> </a>
                                                </div>
                                                <div class="image-tools top right show-on-hover">
                                                </div>
                                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                    <a class="quick-view" data-prod="1214" href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>">Xem nhanh</a> </div>
                                         
                                            </div>
                                            <!-- box-image -->

                                            <div class="box-text ">
                                                <div class="title-wrapper">
                                                    <p class="name product-title"><a href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>"><?php echo $value['title']; ?></a>
                                                    </p>
                                                </div>
                                                <div class="price-wrapper">
                                                    <?php 
                                                        if($value['price'] == 0) { 
                                                            echo 'Liên hệ'; 
                                                        } else { 
                                                            echo number_format($value['price'], 0, '.', '.').'đ';  } 
                                                    ?>
                                                </div>
                                            </div>
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
                </div>
            </div>
            <!-- .section-content -->


            <style scope="scope">
                #section_1609598905 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
            </style>
        </section>
        
        <?php $thuvienanh = $this->db->select('*')->from('articles_category')->where(array('publish'=>1, 'id'=>23))->order_by('created desc')->get()->result_array(); ?>
        <?php if(isset($thuvienanh) && count($thuvienanh)) { foreach ($thuvienanh as $key => $value) { ?>
        <section class="section noidung5" id="section_547648682">
            <div class="bg section-bg fill bg-fill  bg-loaded">
            </div>
            <!-- .section-bg -->

            <div class="section-content relative">

                <div class="row" id="row-1529400637">
                    <div class="col small-12 large-12">
                        <div class="col-inner">
                            <div class="div1">
                                <h2><span><?php echo $value['title']; ?></h2>
                                <p><?php echo $value['description']; ?></p>
                            </div>


                            <div class="row large-columns-3 medium-columns- small-columns-2">
                                <?php $thuvienanh_item = $this->db->select('*')->from('articles_item')->where(array('publish'=>1,'parentid'=> $value['id']))->order_by('created desc')->limit(6)->get()->result_array(); ?>
                                <?php if(isset($thuvienanh_item) && count($thuvienanh_item)){ foreach ($thuvienanh_item as $key => $val) {?>
                                <div class="gallery-col col">
                                    <div class="col-inner">
                                        <a class="image-lightbox lightbox-gallery" href="<?php echo helper_string_image(800, 600, $val['image']); ?>" title="">
                                            <div class="box has-hover gallery-box box-overlay dark">
                                                <div class="box-image">
                                                    <img width="385" height="266" src="<?php echo helper_string_image(800, 600, $val['image']); ?>" class="attachment-medium size-medium" alt="" ids="1078,1079,1080,1081,1082,1083" columns="3" />
                                                    <div class="overlay fill" style="background-color: rgba(0,0,0,.15)">
                                                    </div>
                                                </div>
                                                <!-- .image -->
                                                <div class="box-text text-left">
                                                    <p></p>
                                                </div>
                                                <!-- .text -->
                                            </div>
                                            <!-- .box -->
                                        </a>
                                    </div>
                                    <!-- .col-inner -->
                                </div>
                                <!-- .col -->
                                <?php }} ?>
                                <!-- .col -->
                            </div>
                        </div>
                    </div>

                    <style scope="scope">
                    </style>
                </div>
            </div>
            <!-- .section-content -->


            <style scope="scope">
                #section_547648682 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
            </style>
        </section>
        <?php }} ?>

        <?php $tuvan_baiviet = $this->db->select('*')->from('articles_category')->where(array('publish'=>1, 'id'=>9))->order_by('created desc')->get()->result_array(); ?>
        <?php if(isset($tuvan_baiviet) && count($tuvan_baiviet)) { foreach ($tuvan_baiviet as $key => $value) { ?>

        <section class="section noidung6" id="section_1399292238">
            <div class="bg section-bg fill bg-fill  bg-loaded">
            </div>
            <!-- .section-bg -->
            
                <div class="section-content relative">

                    <div class="row" id="row-1049331945">
                        <div class="col small-12 large-12">
                            <div class="col-inner">

                                <h2 class="heading"><a href="<?php echo helper_string_alias($value['title']).'-c'.$value['id'].CMS_SUFFIX; ?>"><?php echo $value['title']; ?></a></h2>
                                <div class="description_rt">
                                    <p><?php echo $value['description']; ?></p>
                                </div>
                                <div class="news-widget-style-5">
                                    <?php $articles = $this->db->select('*')->from('articles_item')->where(array('publish'=>1,'parentid'=> $value['id']))->order_by('created desc')->limit(6)->get()->result_array(); ?>
                                    <?php if(isset($articles) && count($articles)){ foreach ($articles as $key => $val) {?>
                                        
                                    <div class="news-item-clear">
                                        <div class="boxx__innner">
                                            <div class="news-thumb">
                                                <a href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX; ?>">
                                                    <img width="600" height="400" src="<?php echo helper_string_image(600,600,$val['image']); ?>" class="lazy-load attachment-large size-large wp-post-image" alt="" title="<?php echo $val['title']; ?>" />
                                                </a>
                                            </div>
                                            <div class="box__slider">
                                                <h4><a class="news-title" href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX; ?>"><?php echo $val['title']; ?></a></h4>
                                                <div class="box__description">
                                                    <p class="date">
                                                        Ngày đăng <?php $time = ($val['updated'] != '0000-00-00 00:00:00')?$val['created']:$val['created']; ?>
                                                                <?php echo gmdate('d/m/Y', strtotime($time) + 7*3600)?> </p>
                                                    <p><?php echo helper_string_cutnchar(strip_tags($val['description']),200); ?></p>
                                                </div>
                                                <!-- <div class="views__all">
                                       <a href="http://web5.trumweb.com/mach-ban-thiet-ke-goc-an-uong-nho-xinh-cho-ban-cong-can-ho-chung-cu-4/">Xem thêm</a>
                                     </div> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php }} ?> 
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- .section-content -->

            <!-- .section-content -->


            <style scope="scope">
                #section_1399292238 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
            </style>
        </section>
        <?php }} ?>
        <section class="section noidung7" id="section_1616633264">
            <div class="bg section-bg fill bg-fill  bg-loaded">
            </div>
            <!-- .section-bg -->

            <div class="section-content relative">

                <div class="row box7_bg" id="row-634002432">
                    <div class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="div1">
                                <h2>Giờ mở cửa</h2>
                                <p>Thời gian hoạt động 9h-20h30 tất cả các ngày trong tuần
                                    <br />VIVIBEAUTY Center rất hân hạnh được đón tiếp quý khách</p>
                            </div>
                        </div>
                    </div>
                    <div class="col medium-6 small-12 large-6">
                        <div class="col-inner">
                            <div class="div2">
                                <h2>Ý kiến khách hàng</h2>
                                <p>Những ý kiến của khách hàng về chất lượng sản phẩm và dịch vụ của VIVIBEAUTY Center . Những chia sẻ từ nhũng khách hàng thực tế sử dụng dich vụ tại spa của chúng tôi!</p>
                            </div>
                        </div>
                    </div>

                    <style scope="scope">
                    </style>
                </div>
                <div class="row" id="row-581828642">
                    <div class="col noidung7_box small-12 large-12">
                        <div class="col-inner">
                            <?php $comment = $this->db->select('*')->from('ykien')->where(array('publish' => 1))->order_by('created desc')->limit(4)->get()->result_array(); ?>
                            <?php if(isset($comment) && count($comment)){ foreach ($comment as $key => $value) {?>
                            <div class="icon-box testimonial-box icon-box-left text-left">
                                <div class="icon-box-img testimonial-image circle" style="width: 138px">
                                    <img width="138" height="138" src="<?php echo helper_string_image(200,200,$value['image']); ?>" class="attachment-thumbnail size-thumbnail" alt="" /> </div>
                                <div class="icon-box-text p-last-0">
                                    <div class="star-rating"><span style="width:100%"><strong class="rating"></strong></span>
                                    </div>
                                    <div class="testimonial-text line-height-small italic test_text first-reset last-reset is-italic">

                                        <p><?php echo helper_string_cutnchar(strip_tags($value['notes']),200);  ?></p>
                                        <h3><?php echo $value['fullname']; ?></h3>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- .icon-box -->
                        <?php }} ?>

                        </div>
                    </div>

                    <style scope="scope">
                    </style>
                </div>
            </div>
            <!-- .section-content -->

            <style scope="scope">
                #section_1616633264 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                }
            </style>
        </section>
    </div>
</main>
<!-- #main -->