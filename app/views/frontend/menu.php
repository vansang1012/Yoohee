<div class="main_menu">
    <div class="container">
        <a title="<?=$this->system['meta_title']?>" href="<?=CMS_URL?>"><img src="<?php echo $this->system['logo']; ?>" alt="MyShoes" class="img-logo-menu" style="width: 150px;padding: 5px 0 5px 0;"></a>
        <ul class="ul_main_menu sf-menu superfish">
            <li class="li_main_menu">
                <a class="a_main_menu" href="<?php echo CMS_URL; ?>">Trang chủ</a>
            </li>
            <li class="li_main_menu">
                <a class="a_main_menu" href="<?php echo CMS_URL; ?>san-pham-cp1.html">Sản phẩm</a>
            </li>
            <?php $menu = $this->db->select('*')->from('articles_category')->where(array('publish' =>1, 'parentid' => 1))->order_by('id desc')->get()->result_array(); ?>
            <?php if(isset($menu) && count($menu)) { foreach ($menu as $key => $value) { ?>
            <li class="li_main_menu">
                <a class="a_main_menu" href="<?php echo helper_string_alias($value['title']).'-c'.$value['id'].CMS_SUFFIX; ?>"><?php echo $value['title']; ?></a>
                <?php $menu_child = $this->db->select('*')->from('articles_category')->where(array('publish' => 1, 'parentid' => $value['id']))->get()->result_array();if(isset($menu_child) && count($menu_child)) { ?>
                <ul class="menu_tour_ul_0">
                    
                    <?php  foreach ($menu_child as $key => $val) { ?>
                    <li class="li_tour_1"><a class="a_sub_menu" href="<?php echo helper_string_alias($value['title']).'-c'.$value['id'].CMS_SUFFIX; ?>"><?php echo $val['title']; ?></a></li>
                    <?php }?>
                </ul>
                 <?php } ?>
            </li>
            <?php }} ?>
        </ul>
        <div class="support">
            <a href="tel:0912-489-925"><span class="hotline" style="color: #fff; border: 1px solid #fff;">0913-489-925</span></a>
        </div>
        <div class="box_search">
            <div class="">
                <a href="tel:0912-489-925"><span class="" style="color: #fff; font-size: 25px; font-family: MyriadPro-BoldCond;">0913-489-925</span></a>
                    
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="menu-m clearfix">
    <a class="navbar-toggle visible-xs visible-sm" href="#menu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <div class="box_search">
        <form method="GET" action="">
            <input type="text" class="input-search" name="keyword" placeholder="Nhập từ khóa">
            <input type="submit" value="" class="btn-search">
        </form>
    </div>
    <span class="span-shop"><i class="fa fa-shopping-cart"></i></span>
    <link type="text/css" rel="stylesheet" href="<?php echo CMS_URL; ?>template/frontend/css/jquery.mmenu.all.css" />
    <script type="text/javascript" src="<?php echo CMS_URL; ?>template/frontend/js/jquery.mmenu.min.all.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery("#menu").mmenu({
                "offCanvas": {
                    "zposition": "front"
                },
                "footer": {
                    "add": true,
                    "title": "duocthaothienphuc.vn"
                },
                "slidingSubmenus": false
            }, {
                pageSelector: ""
            });
            jQuery("nav#menu").find(".mm-subopen").addClass("mm-fullsubopen ");
        });
    </script>
    <nav id="menu" class="mm-menu mm-vertical mm-offcanvas mm-front mm-hasfooter">
        <ul class="ul_main_menu sf-menu superfish">
            <li class="li_main_menu">
                <a class="a_main_menu" href="<?php echo CMS_URL; ?>">Trang chủ</a>
            </li>
            <li class="li_main_menu">
                <a class="a_main_menu" href="<?php echo CMS_URL; ?>san-pham-cp1.html">Sản phẩm</a>
            </li>
            <?php $menu = $this->db->select('*')->from('articles_category')->where(array('publish' =>1, 'parentid' => 1))->order_by('id desc')->get()->result_array(); ?>
            <?php if(isset($menu) && count($menu)) { foreach ($menu as $key => $value) { ?>
            <li class="li_main_menu">
                <a class="a_main_menu" href="<?php echo helper_string_alias($value['title']).'-c'.$value['id'].CMS_SUFFIX; ?>"><?php echo $value['title']; ?></a>
                <?php $menu_child = $this->db->select('*')->from('articles_category')->where(array('publish' => 1, 'parentid' => $value['id']))->get()->result_array();if(isset($menu_child) && count($menu_child)) { ?>
                <ul class="menu_tour_ul_0">
                    
                    <?php  foreach ($menu_child as $key => $val) { ?>
                    <li class="li_tour_1"><a class="a_sub_menu" href="<?php echo helper_string_alias($value['title']).'-c'.$value['id'].CMS_SUFFIX; ?>"><?php echo $val['title']; ?></a></li>
                    <?php }?>
                </ul>
                 <?php } ?>
            </li>
            <?php }} ?>
        </ul>
        <div class="support">
            <span class="hotline" style="color: #fff;">0912-489-925</span>
        </div>
    </nav>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#dvBackToTop').hide();
        jQuery(window).unbind("scroll");
        jQuery(window).bind("scroll", function() {
            var t = document.documentElement.scrollTop || document.body.scrollTop;
            currentScrollTop = jQuery(window).scrollTop();
            if (currentScrollTop > 0) jQuery('#dvBackToTop').show();
            else jQuery('#dvBackToTop').hide();
            if (jQuery(".main_menu").length > 0) {
                if (jQuery(this).scrollTop() > 1) {
                    jQuery('.main_menu').addClass("sticky");
                } else {
                    jQuery('.main_menu').removeClass("sticky");
                }
            }
        });
        jQuery('#dvBackToTop').click(function() {
            jQuery('html, body').animate({
                scrollTop: 0
            }, 'slow');
        });
    });
</script>