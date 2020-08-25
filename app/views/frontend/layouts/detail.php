<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<base href="<?php echo CMS_URL;?>" />
<link href="<?=$this->system['icon']?>" rel="shortcut icon" type="image/x-icon" />
<link rel="icon" type="image/png" href="<?=$this->system['icon']?>" />
<meta name="robots" content="noodp,index,follow" />
<meta name="revisit-after" content="1 days" />
<meta http-equiv="content-language" content="vi" />
<title><?php echo isset($data['meta_title'])?$data['meta_title']:'';?></title>
<meta name="title" content="<?php echo isset($data['meta_title'])?$data['meta_title']:'';?>" />
<meta name="keywords" content="<?php echo isset($data['meta_keywords'])?$data['meta_keywords']:'';?>" />
<meta name="description" content="<?php echo isset($data['meta_description'])?$data['meta_description']:'';?>" />
<link rel="canonical" href="<?php echo isset($data['canonical'])?$data['canonical']:'';?>"/>
<?php echo (isset($data['rel_prev']) && !empty($data['rel_prev']))?'<link rel="prev" href="'.$data['rel_prev'].'" />':'';?>
<?php echo (isset($data['rel_next']) && !empty($data['rel_next']))?'<link rel="next" href="'.$data['rel_next'].'" />':'';?>
<meta itemprop="description" content="<?php echo isset($data['meta_description'])?$data['meta_description']:'';?>" />
<meta itemprop="url" href="<?php echo isset($data['canonical'])?$data['canonical']:'';?>" />
<meta itemprop="image" content="<?php echo isset($data['image'])?$data['image']:'';?>" />
<meta property="og:image" content="<?php echo isset($data['image'])?$data['image']:'';?>" />
<?php echo (isset($data['google_authorship']) && !empty($data['google_authorship']))?'<link rel="author" href="'.$data['google_authorship'].'"/>':'';?>

	<link rel="stylesheet" href="template/frontend/css/all.css"  crossorigin="anonymous">
<link rel='stylesheet' id='rt-sp-css'  href='template/frontend/css/support8a54.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='template/frontend/css/dashicons.minca80.css?ver=4.9.15' type='text/css' media='all' />
<link rel='stylesheet' id='menu-icons-extra-css'  href='http://web5.trumweb.com/wp-content/plugins/ot-flatsome-vertical-menu/libs/menu-icons/css/extra.min.css?ver=0.10.2' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='template/frontend/css/styles58e0.css?ver=5.1.4' type='text/css' media='all' />
<link rel='stylesheet' id='devvn-quickbuy-style-css'  href='template/frontend/css/devvn-quick-buy001e.css?ver=2.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='ot-vertical-menu-css-css'  href='template/frontend/css/style1576.css?ver=1.2.1' type='text/css' media='all' />

<style id='woocommerce-inline-inline-css' type='text/css'>
.woocommerce form .form-row .required { visibility: visible; }
</style>
<link rel='stylesheet' id='wp-pagenavi-css'  href='template/frontend/css/pagenavi-css44fd.css?ver=2.70' type='text/css' media='all' />
<link rel='stylesheet' id='hpr-style-css'  href='template/frontend/css/style-24c56.css?ver=2.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='ivpa-style-css'  href='template/frontend/css/style.min05da.css?ver=4.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-main-css'  href='template/frontend/css/flatsome822f.css?ver=3.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-shop-css'  href='template/frontend/css/flatsome-shop822f.css?ver=3.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-style-css'  href='template/frontend/css/style822f.css?ver=3.6.2' type='text/css' media='all' />
<script type="text/template" id="tmpl-variation-template">
    <div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
    <div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
    <div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
</script>

<script type="text/javascript">(function(a,d){if(a._nsl===d){a._nsl=[];var c=function(){if(a.jQuery===d)setTimeout(c,33);else{for(var b=0;b<a._nsl.length;b++)a._nsl[b].call(a,a.jQuery);a._nsl={push:function(b){b.call(a,a.jQuery)}}}};c()}})(window);</script><script type='text/javascript' src='template/frontend/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
<script type='text/javascript' src='template/frontend/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>

<style>.bg{opacity: 0; transition: opacity 1s; -webkit-transition: opacity 1s;} .bg-loaded{opacity: 1;}</style> <script type="text/javascript">
    WebFontConfig = {
      google: { families: [ "Muli:regular,regular","Muli:regular,regular","Roboto:regular,500","Arimo:regular,regular", ] }
    };
    (function() {
      var wf = document.createElement('script');
      wf.src = 'template/frontend/js/webfont.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })(); </script>
  <style>.product-gallery img.lazy-load, .product-small img.lazy-load, .product-small img[data-lazy-srcset]:not(.lazyloaded){ padding-top: 100%;}</style>   <noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
    <meta name="generator" content="Improved Variable Product Attributes for WooCommerce"/><style id="custom-css" type="text/css">:root {--primary-color: #cc3e4c;}/* Site Width */.full-width .ubermenu-nav, .container, .row{max-width: 1170px}.row.row-collapse{max-width: 1140px}.row.row-small{max-width: 1162.5px}.row.row-large{max-width: 1200px}.header-main{height: 100px}#logo img{max-height: 100px}#logo{width:170px;}#logo a{max-width:170px;}.header-bottom{min-height: 40px}.header-top{min-height: 37px}.has-transparent + .page-title:first-of-type,.has-transparent + #main > .page-title,.has-transparent + #main > div > .page-title,.has-transparent + #main .page-header-wrapper:first-of-type .page-title{padding-top: 100px;}.header.show-on-scroll,.stuck .header-main{height:70px!important}.stuck #logo img{max-height: 70px!important}.search-form{ width: 35%;}.header-bg-color, .header-wrapper {background-color: rgba(255,255,255,0.9)}.header-bottom {background-color: #f1f1f1}.stuck .header-main .nav > li > a{line-height: 50px }.header-bottom-nav > li > a{line-height: 16px }@media (max-width: 549px) {.header-main{height: 70px}#logo img{max-height: 70px}}.header-top{background-color:#f39402!important;}/* Color */.accordion-title.active, .has-icon-bg .icon .icon-inner,.logo a, .primary.is-underline, .primary.is-link, .badge-outline .badge-inner, .nav-outline > li.active> a,.nav-outline >li.active > a, .cart-icon strong,[data-color='primary'], .is-outline.primary{color: #cc3e4c;}/* Color !important */[data-text-color="primary"]{color: #cc3e4c!important;}/* Background */.scroll-to-bullets a,.featured-title, .label-new.menu-item > a:after, .nav-pagination > li > .current,.nav-pagination > li > span:hover,.nav-pagination > li > a:hover,.has-hover:hover .badge-outline .badge-inner,button[type="submit"], .button.wc-forward:not(.checkout):not(.checkout-button), .button.submit-button, .button.primary:not(.is-outline),.featured-table .title,.is-outline:hover, .has-icon:hover .icon-label,.nav-dropdown-bold .nav-column li > a:hover, .nav-dropdown.nav-dropdown-bold > li > a:hover, .nav-dropdown-bold.dark .nav-column li > a:hover, .nav-dropdown.nav-dropdown-bold.dark > li > a:hover, .is-outline:hover, .tagcloud a:hover,.grid-tools a, input[type='submit']:not(.is-form), .box-badge:hover .box-text, input.button.alt,.nav-box > li > a:hover,.nav-box > li.active > a,.nav-pills > li.active > a ,.current-dropdown .cart-icon strong, .cart-icon:hover strong, .nav-line-bottom > li > a:before, .nav-line-grow > li > a:before, .nav-line > li > a:before,.banner, .header-top, .slider-nav-circle .flickity-prev-next-button:hover svg, .slider-nav-circle .flickity-prev-next-button:hover .arrow, .primary.is-outline:hover, .button.primary:not(.is-outline), input[type='submit'].primary, input[type='submit'].primary, input[type='reset'].button, input[type='button'].primary, .badge-inner{background-color: #cc3e4c;}/* Border */.nav-vertical.nav-tabs > li.active > a,.scroll-to-bullets a.active,.nav-pagination > li > .current,.nav-pagination > li > span:hover,.nav-pagination > li > a:hover,.has-hover:hover .badge-outline .badge-inner,.accordion-title.active,.featured-table,.is-outline:hover, .tagcloud a:hover,blockquote, .has-border, .cart-icon strong:after,.cart-icon strong,.blockUI:before, .processing:before,.loading-spin, .slider-nav-circle .flickity-prev-next-button:hover svg, .slider-nav-circle .flickity-prev-next-button:hover .arrow, .primary.is-outline:hover{border-color: #cc3e4c}.nav-tabs > li.active > a{border-top-color: #cc3e4c}.widget_shopping_cart_content .blockUI.blockOverlay:before { border-left-color: #cc3e4c }.woocommerce-checkout-review-order .blockUI.blockOverlay:before { border-left-color: #cc3e4c }/* Fill */.slider .flickity-prev-next-button:hover svg,.slider .flickity-prev-next-button:hover .arrow{fill: #cc3e4c;}body{font-size: 100%;}@media screen and (max-width: 549px){body{font-size: 100%;}}body{font-family:"Muli", sans-serif}body{font-weight: 0}.nav > li > a {font-family:"Roboto", sans-serif;}.nav > li > a {font-weight: 500;}h1,h2,h3,h4,h5,h6,.heading-font, .off-canvas-center .nav-sidebar.nav-vertical > li > a{font-family: "Muli", sans-serif;}h1,h2,h3,h4,h5,h6,.heading-font,.banner h1,.banner h2{font-weight: 0;}.alt-font{font-family: "Arimo", sans-serif;}.alt-font{font-weight: 0!important;}.header:not(.transparent) .header-bottom-nav.nav > li > a{color: #ffffff;}.header:not(.transparent) .header-bottom-nav.nav > li > a:hover,.header:not(.transparent) .header-bottom-nav.nav > li.active > a,.header:not(.transparent) .header-bottom-nav.nav > li.current > a,.header:not(.transparent) .header-bottom-nav.nav > li > a.active,.header:not(.transparent) .header-bottom-nav.nav > li > a.current{color: #f39402;}.header-bottom-nav.nav-line-bottom > li > a:before,.header-bottom-nav.nav-line-grow > li > a:before,.header-bottom-nav.nav-line > li > a:before,.header-bottom-nav.nav-box > li > a:hover,.header-bottom-nav.nav-box > li.active > a,.header-bottom-nav.nav-pills > li > a:hover,.header-bottom-nav.nav-pills > li.active > a{color:#FFF!important;background-color: #f39402;}@media screen and (min-width: 550px){.products .box-vertical .box-image{min-width: 600px!important;width: 600px!important;}}.absolute-footer, html{background-color: #f0f0f0}.page-title-small + main .product-container > .row{padding-top:0;}.label-new.menu-item > a:after{content:"New";}.label-hot.menu-item > a:after{content:"Hot";}.label-sale.menu-item > a:after{content:"Sale";}.label-popular.menu-item > a:after{content:"Popular";}</style></head>



       <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>

       <style type="text/css">
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 .07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
                }
        </style>

</head>
<body class="product-template-default single single-product postid-1193 ot-vertical-menu woocommerce woocommerce-page woocommerce-no-js lightbox lazy-icons nav-dropdown-has-arrow">

<?php $this->load->view('frontend/header');?>

<?php $data = isset($data)?$data:NULL; $this->load->view($template, $data);?>

<?php $this->load->view('frontend/footer');?>
</body>

</html>
