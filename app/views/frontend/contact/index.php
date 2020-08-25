<div id="wrapper">
    <div class="banner_hd">
        <li id="media_image-2" class="widget widget_media_image"><img width="1599" height="262" src="upload/image/bannerhd.jpg" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
        </li>
    </div>

    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">



                        <h2><strong>Liên hệ với chúng tôi</strong></h2>
                        <?php
                            $error = validation_errors();
                            echo isset($error)?'<ul class="cms-error">'.$error.'</ul>':'';
                            ?>
                            <form action="" method="post">
                                <p><span class="wpcf7-form-control-wrap text-259">
                                        <input  name="data[fullname]" type="text" value="<?php echo isset($post_data['fullname'])?htmlspecialchars($post_data['fullname']):'';?>" placeholder="Họ và tên" />
                                    </span>
                                    <span class="wpcf7-form-control-wrap tel-736">
                                        <input name="data[phone]" type="tel" value="<?php echo isset($post_data['phone'])?htmlspecialchars($post_data['phone']):'';?>" placeholder="Số điện thoại" /></span>
                                        <span class="wpcf7-form-control-wrap email-288">
                                        <input name="data[email]" type="email" value="<?php echo isset($post_data['email'])?htmlspecialchars($post_data['email']):'';?>" placeholder="Email" /></span>
                                        <span class="wpcf7-form-control-wrap email-288">
                                        <input name="data[address]" type="text" value="<?php echo isset($post_data['address'])?htmlspecialchars($post_data['address']):'';?>" placeholder="Địa chỉ" /></span>
                                        <span class="wpcf7-form-control-wrap textarea-357">
                                           <textarea  cols="21" name="data[notes]" cols="30" rows="10" placeholder="nội dung"><?php echo isset($post_data['content'])?htmlspecialchars($post_data['content']):'';?></textarea>
                                        </span>
                                    <input type="submit" value="Gửi" class="wpcf7-form-control" name="sent" />
                                </p>
                                
                            </form>
                        


                    </div>
                    <!-- .col-inner -->
                </div>
                <!-- .large-12 -->
            </div>
            <!-- .row -->
        </div>


    </main>
    <!-- #main -->

    