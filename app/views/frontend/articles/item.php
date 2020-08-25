<div class="banner_hd">
    <li id="media_image-2" class="widget widget_media_image">
        <?php if(strlen($category['image']) > 10) { ?>
        <img width="1599" height="262" src="<?php echo $category['image']; ?>" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
        <?php } else { ?>
        <img width="1599" height="262" src="upload/image/bannerhd.jpg" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
        <?php } ?>
    </li>
</div>
<!-- main-area -->
<main id="main" class="">

    <div id="content" class="blog-wrapper blog-single page-wrapper">

        <div class="row align-center">
            <div class="large-10 col">

                <article id="post-1183" class="post-1183 project-post type-project-post status-publish format-standard has-post-thumbnail hentry project-dich-vu-noi-bat">
                    <div class="article-inner ">
                        <header class="entry-header">
                            <div class="entry-header-text entry-header-text-top text-left">
                                <h6 class="entry-category is-xsmall"></h6>

                                <h1 class="entry-title"><?php echo $item['title']; ?></h1>
                                <div class="entry-divider is-divider small"></div>

                            </div>
                            <!-- .entry-header -->

                        </header>
                        <!-- post-header -->
                        <div class="entry-content single-page" style="padding-top:0px;">

                            <div class="chat-message wrap-message rotate-container ">
                                <div class="">
                                    <div class="card card--text admin">
                                        
                                       <?php if($item['content'] == '') { ?>
                                      <?php echo 'Đang cập nhật nội dung'; ?>
                                    <?php } else { ?>
                                        <div><span class="text"><?php echo $item['content']; ?></span>
                                        </div>                                    
                                    <?php } ?>
                                       
                                    </div>
                                    <div class="chat-message__actionholder "></div>
                                </div>
                            </div>
                            <div class="chat-message rotate-container ">
                                <div class="">
                                    <div class="card pin-react admin card--group-photo">
                                        <div class="card--group-photo__row ">
                                            <div class="card--group-photo__row__item">
                                                <div class="chat-message-picture__photooverlay no-shadow-border card--picture__high-definition-group"></div>
                                            </div>
                                        </div>
                                        <div class="card--group-photo__row ">
                                            <div class="card--group-photo__row__item">
                                                <div class="chat-message-picture__photooverlay no-shadow-border card--picture__high-definition-group"></div>
                                            </div>
                                        </div>
                                        <div class="message-reaction-container always-display img-no-title ">
                                            <div>
                                                <div class="msg-reaction-icon">
                                                    <div class="default-react-icon-thumb"></div>
                                                </div>
                                                <div class="emoji-list-wrapper hide-elist">
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
                                    <div class="chat-message__photogroup pin-react ">
                                        <div class="chat-message__actionholder photo-group pin-react "></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="rt-social">
                                        <a class="rt-link rt-facebook" href="<?php echo $this->system['facebook'] ?>" target="_blank">Facebook</a>
                                        <a class="rt-link rt-twitter" href="<?php echo $this->system['tiwtter'] ?>" target="_blank">Twitter</a>
                                        <a class="rt-link rt-googleplus" href="<?php echo $this->system['email'] ?>" target="_blank">Google+</a>
                                        <a class="rt-link rt-pinterest" href="#" data-pin-custom="true" target="_blank">Pin It</a>
                                    </div>
                            </div>
                        </div>
                        <!-- .entry-content2 -->
                    </div>
                    <!-- .article-inner -->
                </article>
                <!-- #-1183 -->
            </div>
            <!-- .large-9 -->

        </div>
        <!-- .row -->

    </div>
    <!-- #content .page-wrapper -->

</main>
<!-- #main -->
        <!-- main-area-end -->
