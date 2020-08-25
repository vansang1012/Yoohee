<div id="wrapper">
    <div class="banner_top_bar">
    </div>

    <header id="header" class="header has-sticky sticky-jump">
        <div class="header-wrapper">
            <div id="masthead" class="header-main ">
                <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">

                    <!-- Logo -->
                    <div id="logo" class="flex-col logo">
                        <!-- Header logo -->
                        <a href="" title="yooheebeauty" rel="home">
    <img width="170" height="100" src="<?php echo $this->system['logo']; ?>" class="header_logo header-logo" alt="yooheebeauty"/>

          </div>

          <!-- Mobile Left Elements -->
          <div class="flex-col show-for-medium flex-left">
            <ul class="mobile-nav nav nav-left ">
              <li class="nav-icon has-icon">
        <a href="#" data-open="#main-menu" data-pos="right" data-bg="main-menu-overlay" data-color="" class="is-small" aria-controls="main-menu" aria-expanded="false">
        
          <i class="icon-menu" ></i>
                </a>
                        </li>
                        </ul>
                    </div>

                    <!-- Left Elements -->
                    <div class="flex-col hide-for-medium flex-left
            flex-grow">
                        <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                            <li id="menu-item-514" class="menu-item menu-item-type-custom menu-item-object-custom current_page_item menu-item-home  menu-item-514"><a href="\" class="nav-top-link">Trang chủ</a>
                            </li>
                            <?php $menus= $this->db->select('*')->from('articles_category')->where(array('publish'=>1,'parentid'=>1, 'show_menu' => 1))->order_by('order asc')->get()->result_array(); ?>
                            <?php if(isset($menus) && count($menus)) { foreach ($menus as $key => $menu) { if($key <1){ ?>                      
                            <li id="menu-item-1000" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-1000"><a href="<?php echo helper_string_alias($menu['title']).'-c'.$menu['id'].CMS_SUFFIX; ?>" class="nav-top-link"><?php echo $menu['title'] ?></a>
                            </li>
                            <?php }}} ?>
                             </li>
                            <?php $menus_sp= $this->db->select('*')->from('sanpham_category')->where(array('publish'=>1,'parentid'=>1))->order_by('order asc')->get()->result_array(); ?>
                            <?php if(isset($menus_sp) && count($menus_sp)) { foreach ($menus_sp as $key => $value) { ?>                      
                            <li id="menu-item-1000" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-1000"><a href="<?php echo helper_string_alias($value['title']).'-cp'.$value['id'].CMS_SUFFIX; ?>" class="nav-top-link"><?php echo $value['title'] ?></a>
                            </li>
                            <?php }} ?>
                            <?php if(isset($menus) && count($menus)) { foreach ($menus as $key => $menu) {if($key>0){ ?>                      
                            <li id="menu-item-1000" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-1000"><a href="<?php echo helper_string_alias($menu['title']).'-c'.$menu['id'].CMS_SUFFIX; ?>" class="nav-top-link"><?php echo $menu['title'] ?></a>
                            </li>
                            <?php }}}?>



                            <li id="menu-item-1001" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-1001"><a href="lien-he.html" class="nav-top-link">Liên hệ</a>
                            </li>
                            <li class="header-search header-search-dropdown has-icon has-dropdown menu-item-has-children">
                                <a href="#" class="is-small"><i class="icon-search" ></i></a>
                                <ul class="nav-dropdown nav-dropdown-default">
                                    <li class="header-search-form search-form html relative has-icon">
                                        <div class="header-search-form-wrapper">
                                            <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                                <form role="search" method="get" class="searchform" action="<?php echo CMS_URL; ?>">
                                                    <div class="flex-row relative">
                                                        <div class="flex-col flex-grow">
                                                            <input type="search" class="search-field mb-0" name="s" value="" placeholder="Tìm kiếm sản phẩm..." />
                                                            
                                                        </div>
                                                        <!-- .flex-col -->
                                                        <div class="flex-col">
                                                            <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                                                <i class="icon-search"></i> </button>
                                                        </div>
                                                        <!-- .flex-col -->
                                                    </div>
                                                    <!-- .flex-row -->
                                                    <div class="live-search-results text-left z-top"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- .nav-dropdown -->
                            </li>
                        </ul>
                    </div>

                    <!-- Right Elements -->
                    <div class="flex-col hide-for-medium flex-right">
                        <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                            <li class="html custom html_topbar_left">
                                <p>Hotline: <?php echo $this->system['hotline']; ?></p>
                            </li>
                        </ul>
                    </div>

                    <!-- Mobile Right Elements -->
                    <div class="flex-col show-for-medium flex-right">
                        <ul class="mobile-nav nav nav-right ">
                            <li class="cart-item has-icon">

                                <a href="cart" class="header-cart-link off-canvas-toggle nav-top-link is-small" data-open="#cart-popup" data-class="off-canvas-cart" title="Giỏ hàng" data-pos="right">

                                    <i class="icon-shopping-cart" data-icon-label="0">
  </i>
                                </a>


                                <!-- Cart Sidebar Popup -->
                                <div id="cart-popup" class="mfp-hide widget_shopping_cart">
                                    <div class="cart-popup-inner inner-padding">
                                        <div class="cart-popup-title text-center">
                                            <h4 class="uppercase">Giỏ hàng</h4>
                                            <div class="is-divider"></div>
                                        </div>
                                        <div class="widget_shopping_cart_content">


                                            <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ hàng.</p>


                                        </div>
                                        <div class="cart-sidebar-content relative"></div>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>

                </div>
                <!-- .header-inner -->

                <!-- Header divider -->
                <div class="container">
                    <div class="top-divider full-width"></div>
                </div>
            </div>
            <!-- .header-main -->
            <div class="header-bg-container fill">
                <div class="header-bg-image fill"></div>
                <div class="header-bg-color fill"></div>
            </div>
            <!-- .header-bg-container -->
        </div>
        <!-- header-wrapper-->
    </header>