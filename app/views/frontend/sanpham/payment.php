<div class="banner_hd">
      <li id="media_image-2" class="widget widget_media_image"><img width="1599" height="262" src="upload/image/bannerhd.jpg" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" /></li>
</div>
        <main>
            <!-- breadcrumb-area -->
            
            <!-- breadcrumb-area-end -->

            
            <!-- contact-form -->
            <section class="contact-form pb-50 pt-50">
                <div class="container">
                    <div class="row">
                        <div class="small-12 large-12 text-center">
                            <div class="contact-form-title">
                                <h2>Thông tin đặt hàng</h2>
                                <p>Gửi thông tin liên hệ cho chúng tôi. Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col small-12 large-6">
                            <?php
                            $error = validation_errors();
                            echo isset($error)?'<ul class="cms-error">'.$error.'</ul>':'';
                            ?>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="small-12 large-12 form-group">
                                        <input type="text" name="data[fullname]" value="<?php echo isset($post_data['fullname'])?htmlspecialchars($post_data['fullname']):'';?>" class="form-control" placeholder="Họ tên của bạn">
                                    </div>
                                    <div class="small-12 large-6 form-group">
                                        <input type="text" name="data[email]" value="<?php echo isset($post_data['email'])?htmlspecialchars($post_data['email']):'';?>" class="form-control" placeholder="Địa chỉ email của bạn">
                                    </div>
                                    <div class="small-12 large-6 form-group">
                                        <input type="text" name="data[phone]" value="<?php echo isset($post_data['phone'])?htmlspecialchars($post_data['phone']):'';?>" class="form-control" placeholder="Số điện thoại của bạn">
                                    </div>
                                    <div class="small-12 large-12 form-group">
                                        <input type="text" name="data[address]" value="<?php echo isset($post_data['address'])?htmlspecialchars($post_data['address']):'';?>" class="form-control" placeholder="Địa chỉ của bạn">
                                    </div>
                                    <div class="small-12 large-12 form-group">

                                        <textarea name="data[notes]" class="form-control" placeholder="Nội dung" id="text-message" cols="30" rows="10" ><?php echo isset($post_data['content'])?htmlspecialchars($post_data['content']):'';?></textarea>
                                    </div>
                                    
                                    <div class="col-xl-12 text-center">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Đặt hàng" style="color: #000;">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col small-12 large-6">
                            <div class="maps-area">
                
                                <?php echo $this->system['map']; ?>
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
        </main>
        <!-- main-area-end -->

