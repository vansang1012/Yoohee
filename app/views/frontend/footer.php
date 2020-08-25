<footer id="footer" class="footer-wrapper">
<!-- FOOTER 1 -->
<div class="footer-widgets footer footer-1">
    <div class="row large-columns-4 mb-0">
        <div id="custom_html-7" class="widget_text col pb-0 widget widget_custom_html">
            <div class="logo-footer">
                    <img src="<?php echo $this->system['logo']; ?>" alt="">
            </div>
            <div class="textwidget custom-html-widget">
                    <?php echo $this->system['about']; ?>
            </div>
        </div>
        <div id="nav_menu-3" class="col pb-0 widget widget_nav_menu"><span class="widget-title">Liên kết website</span>
            <div class="is-divider small"></div>
            <div class="menu-lien-ket-website-container">
                <ul id="menu-lien-ket-website" class="menu">
                  <?php $lienket = $this->db->select('*')->from('articles_item')->where(array('publish'=>1,'parentid'=>12))->order_by('created desc')->limit(4)->get()->result_array(); ?>
                  <?php  if(isset($lienket) && count($lienket)){ foreach ($lienket as $key => $item) { ?>
                    <li id="menu-item-537" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-537">
                      <a href="<?php echo helper_string_alias($item['title']).'-a'.$item['id'].CMS_SUFFIX; ?>"><?php echo $item['title']; ?></a>
                    <?php }} ?>
                    <li id="menu-item-1002" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1002"><a href="lien-he.html">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="nav_menu-4" class="col pb-0 widget widget_nav_menu"><span class="widget-title">Tầm nhìn</span>
            <div class="is-divider small"></div>
            <div class="menu-dich-vu-container">
                <ul id="menu-dich-vu" class="menu">
                     <?php $tamnhin = $this->db->select('*')->from('articles_item')->where(array('publish'=>1,'parentid'=>13))->order_by('created desc')->limit(5)->get()->result_array(); ?>
                     <?php if(isset($tamnhin) && count($tamnhin)){ foreach ($tamnhin as $key => $value) {?>
                    <li id="menu-item-542" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-542">
                      <a href="<?php echo helper_string_alias($value['title']).'-a'.$value['id'].CMS_SUFFIX; ?>"><?php echo $value['title'] ?></a>
                    </li>
                  <?php }} ?>
                </ul>
            </div>
        </div>
        <div id="custom_html-4" class="widget_text col pb-0 widget widget_custom_html"><span class="widget-title">Gửi email</span>
            <div class="is-divider small"></div>
            <div class="textwidget custom-html-widget">
                <p>Gửi email nhận khuyến mãi</p>
                <div role="form" class="wpcf7"  lang="vi" dir="ltr">
                    <div class="screen-reader-response"></div>
                    <form action="" method="post"  novalidate="novalidate">
                        
                        <div class="form_dk">
                            <span class="wpcf7-form-control-wrap email-613">
                              <input type="email" name="email-613" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email của bạn" />
                            </span>
                            <input type="submit" value="Gửi" class="wpcf7-form-control wpcf7-submit" />
                        </div>
                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                    </form>
                </div>
                <h2 class="widget-title widget-title-p">Kết nối</h2>
                <div class="rt_icon">
                    <a href="<?php echo $this->system['tiwtter']; ?>">
                      <img src="template/frontend/img/i13.png">
                    </a>
                    <a href="<?php echo $this->system['facebook']; ?>">
                      <img src="template/frontend/img/i14.png">
                    </a>
                    <a href="<?php echo $this->system['instagram']; ?>">
                      <img src="template/frontend/img/i15.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- footer 1 -->


<!-- FOOTER 2 -->
<div class="footer-widgets footer footer-2 dark">
        <div class="row dark large-columns-1 mb-0">
            <div id="text-3" class="col pb-0 widget widget_text">           
              <div class="textwidget"><p>© Bản quyền thuộc về VNBRAIN</p>
</div>
        </div>        
        </div><!-- end row -->
</div><!-- end footer 2 -->



<div class="absolute-footer dark medium-text-center small-text-center">
  <div class="container clearfix">

    
    <div class="footer-primary pull-left">
            <div class="copyright-footer">
              </div>
          </div><!-- .left -->
  </div><!-- .container -->
</div><!-- .absolute-footer -->
<a href="#top" class="back-to-top button invert plain is-outline hide-for-medium icon circle fixed bottom z-1" id="top-link"><i class="icon-angle-up" ></i></a>

</footer><!-- .footer-wrapper -->
<script type="text/javascript">
    jQuery("document").ready(function($){

        $('.noidung4 .block-product-2').slick({
          infinite: true,
          speed: 300,
          slidesToShow: 4,
          slidesToScroll: 4,
          dots:true,
          arrows:true,
          autoplay: true,
          autoplaySpeed: 2000,
          prevArrow:
                      '<div class="slick-prev"><i class="fas fa-angle-left"></i></div>',
          nextArrow:
                      '<div class="slick-next"><i class="fas fa-angle-right"></i></div>',
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        });

        $('.noidung7_box > .col-inner').slick({
          infinite: true,
          speed: 300,
          slidesToShow: 2,
          slidesToScroll: 1,
          dots:true,
          arrows:true,
          autoplay: true,
          autoplaySpeed: 2000,
          prevArrow:
                      '<div class="slick-prev"><i class="fas fa-angle-left"></i></div>',
          nextArrow:
                      '<div class="slick-next"><i class="fas fa-angle-right"></i></div>',
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        });
            
    });
</script>
<link rel="stylesheet" type="text/css" href="template/frontend/css/slick.css"/>
 <script type="text/javascript" src="template/frontend/js/slick.min.js"></script>
</div><!-- #wrapper -->

<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
              <li class="header-search-form search-form html relative has-icon">
    <div class="header-search-form-wrapper">
        <div class="searchform-wrapper ux-search-box relative form-flat is-normal"><form role="search" method="get" class="searchform" action="">
        <div class="flex-row relative">
                                    <div class="flex-col flex-grow">
              <input type="search" class="search-field mb-0" name="s" value="" placeholder="Tìm kiếm sản phẩm..." />
            <input type="hidden" name="post_type" value="product" />
                    </div><!-- .flex-col -->
            <div class="flex-col">
                <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                    <i class="icon-search" ></i>                </button>
            </div><!-- .flex-col -->
        </div><!-- .flex-row -->
     <div class="live-search-results text-left z-top"></div>
</form>
</div>  </div>
</li><li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-514"><a href="\" class="nav-top-link">Trang chủ</a></li>

<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-515"><a href="gioi-thieu-a69.html" class="nav-top-link">Giới thiệu</a></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-project menu-item-1112"><a href="dich-vu-cp33.html" class="nav-top-link">Dịch vụ</a></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-1120"><a href="san-pham-cp32.html" class="nav-top-link">Sản phẩm</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1000"><a href="khach-hang-c10.html" class="nav-top-link">Khách hàng</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1001"><a href="lien-he.html" class="nav-top-link">Liên hệ</a></li>
        </ul>
    </div><!-- inner -->
</div><!-- #mobile-menu -->
        <div class="hotline-phone-ring-wrap">
            <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
              <a href="tel:<?php echo $this->system['hotline']; ?>" class="pps-btn-img">
                                <img src="template/frontend/img/icon-2.png" alt="Số điện thoại" width="50" />
              </a>
            </div>
          </div>
                  <div class="hotline-bar">
            <a href="tel:<?php echo $this->system['hotline']; ?>">
              <span class="text-hotline"><?php echo $this->system['hotline']; ?></span>
            </a>
          </div>
                  </div>
      <script id="lazy-load-icons">
    /* Lazy load icons css file */
    var fl_icons = document.createElement('link');
    fl_icons.rel = 'stylesheet';
    fl_icons.href = 'template/frontend/css/fl-icons.css';
    fl_icons.type = 'text/css';
    var fl_icons_insert = document.getElementsByTagName('link')[0];
    fl_icons_insert.parentNode.insertBefore(fl_icons, fl_icons_insert);
  </script>
      
    <script type="text/javascript">
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;
    </script>
    <link rel='stylesheet' id='metaslider-flex-slider-css'  href='template/frontend/css/flexslider5829.css' type='text/css' media='all' property='stylesheet' />

<script type='text/javascript' src='template/frontend/js/scripts58e0.js'></script>
<script type='text/javascript' src='template/frontend/js/jquery.validate.min001e.js'></script>
<script type='text/javascript' src='template/frontend/js/jquery.bpopup.min001e.js'></script>
<script type='text/javascript' src='template/frontend/js/underscore.min4511.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpUtilSettings = {"ajax":{"url":"\/wp-admin\/admin-ajax.php"}};
/* ]]> */
</script>
<script type='text/javascript' src='template/frontend/js/wp-util.minca80.js'></script>
<script type='text/javascript' src='template/frontend/js/jquery.blockUI.min44fd.js?ver=2.70'></script>

<script type='text/javascript' src='template/frontend/js/add-to-cart-variation.min9e95.js'></script>

<script type='text/javascript' src='template/frontend/js/devvn-quick-buy001e.js'></script>
<script type='text/javascript' src='template/frontend/js/ot-vertical-menu.min1576.js'></script>

<script type='text/javascript' src='template/frontend/js/add-to-cart.min9e95.js'></script>

<script type='text/javascript' src='template/frontend/js/js.cookie.min6b25.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='template/frontend/js/woocommerce.min9e95.js'></script>

<script type='text/javascript' src='template/frontend/js/cart-fragments.min9e95.js'></script>
<script type='text/javascript' src='template/frontend/js/flatsome-live-search822f.js'></script>
<script type='text/javascript' src='template/frontend/js/hoverIntent.minc245.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var flatsomeVars = {"rtl":"","sticky_height":"70","user":{"can_edit_pages":false}};
/* ]]> */
</script>
<script type='text/javascript' src='template/frontend/js/flatsome822f.js'></script>
<script type='text/javascript' src='template/frontend/js/flatsome-lazy-load5152.js'></script>
<script type='text/javascript' src='template/frontend/js/woocommerce822f.js'></script>
<script type='text/javascript' src='template/frontend/js/wp-embed.minca80.js'></script>
<script type='text/javascript' src='template/frontend/js/jquery.flexslider.min5829.js'></script>
<script type='text/javascript'>
var metaslider_1004 = function($) {$('#metaslider_1004').addClass('flexslider');
            $('#metaslider_1004').flexslider({ 
                slideshowSpeed:3000,
                animation:"fade",
                controlNav:true,
                directionNav:true,
                pauseOnHover:true,
                direction:"horizontal",
                reverse:false,
                animationSpeed:600,
                prevText:"Previous",
                nextText:"Next",
                fadeFirstSlide:false,
                slideshow:true
            });
            $(document).trigger('metaslider/initialized', '#metaslider_1004');
        };
        var timer_metaslider_1004 = function() {
            var slider = !window.jQuery ? window.setTimeout(timer_metaslider_1004, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_1004, 1) : metaslider_1004(window.jQuery);
        };
        timer_metaslider_1004();
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var _zxcvbnSettings = {"src":"template\/frontend\/js\/zxcvbn.min.js"};
/* ]]> */
</script>
<script type='text/javascript' src='template/frontend/js/zxcvbn-async.min5152.js'></script>

<script type='text/javascript' src='template/frontend/js/password-strength-meter.minca80.js'></script>

<script type='text/javascript' src='template/frontend/js/password-strength-meter.min9e95.js'></script>