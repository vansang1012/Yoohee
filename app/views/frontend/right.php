                <div class="right-content">
                    <div class="box-right">
                        <h4 class="text-center h2-about h2-product">
                        <span>Sản phẩm mới nhất</span>
                        </h4>
                        <div class="box-right-inner">
                            <ul class="ul-right">
                                <?php $products = $this->db->select('*')->from('sanpham_item')->where(array('publish' => 1))->limit(4)->order_by('id desc')->get()->result_array(); ?>
                                <?php if(isset($products) && count($products)) { foreach ($products as $key => $value) { ?>
                                <li class="li-right">
                                    <a class="a-right" href="<?php echo helper_string_alias($value['title']).'-ap'.$value['id'].CMS_SUFFIX; ?>">
                                    <?php echo $value['title']; ?></a>
                                </li>
                            <?php }} ?>
                            </ul>
                        </div>
                    </div>
                    <div class="box-right">
                        <h4 class="text-center h2-about h2-giaohang">
                        <span>Ch&#237;nh s&#225;ch giao h&#224;ng</span>
                        </h4>
                        <div class="box-right-inner box-giaohang">
                            <ul class="ul-right">
                                <li>GIAO H&Agrave;NG TO&Agrave;N QUỐC</li>
                                <li>GIAO H&Agrave;NG BỞI VIETTELPOST,&nbsp;EMS</li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-right">
                        <h4 class="text-center h2-about h2-muahang">
                        <span>Ch&#237;nh s&#225;ch b&#225;n h&#224;ng</span>
                        </h4>
                        <div class="box-right-inner box-muahang">
                            <ul>
                                <li>GIAO H&Agrave;NG MIỄN PH&Iacute; TO&Agrave;N QUỐC</li>
                                <li>NHẬN H&Agrave;NG, THANH TO&Aacute;N</li>
                                <li>KH&Ocirc;NG H&Agrave;I L&Ograve;NG, HO&Agrave;N TIỀN 100%</li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-right">
                        <h4 class="text-center h2-about h2-tuvan-right">
                        <span>Trải nghiệm khách hàng</span>
                        </h4>
                        <div class="box-right-inner" style="padding-top: 15px">
                            <div class="jcarousel-wrapper jcarousel-wrapper-cust">
                                <div class="jcarousel jcarouselCustomer">
                                    <ul>
                                        <li class="li_customer text-center">
                                            <img src="template/frontend/images/khachhang.jpg" alt="Vũ Gương" class="img-customer-right" />
                                            <div class="">
                                                <div class="name_customer">Vũ Gương</div>
                                                <div class="summary-tuvan"><p>"Đông trùng hạ thảo rất có lợi cho sức khỏe, đặc biệt là phụ nữ trước và sau khi sinh. giá cả cũng họp lý vì được nuôi trồng tại việt nam nên cũng không ..."</p></div>
                                            </div>
                                        </li>
                                        <li class="li_customer text-center">
                                            <img src="template/frontend/images/khachhang1.jpg" alt="Phạm Văn Thắng" class="img-customer-right" />
                                            <div class="">
                                                <div class="name_customer">Phạm Văn Thắng</div>
                                                <div class="summary-tuvan"><p>"Tinh hoa của thiên nhiên và vũ Trụ này là LOÀI NGƯỜI ! Tinh hoa của ngũ cốc là hai hạt đậu Chickpeas & Hà lan! Tinh hoa của thảo dược..."</p></div>
                                            </div>
                                        </li>
                                        <li class="li_customer text-center">
                                            <img src="template/frontend/images/khachhang3.jpg" alt="Nguyễn Văn Hải" class="img-customer-right" />
                                            <div class="">
                                                <div class="name_customer">Nguyễn Văn Hải</div>
                                                <div class="summary-tuvan"><p>"Sản phẩm dược thảo của Thiên Phúc đã khẳng định được uy tín chất lượng trong lòng người sử dụng. Điều đó có được không những ..."</p></div>
                                            </div>
                                        </li>
                                        <li class="li_customer text-center">
                                            <img src="template/frontend/images/khachhang4.jpg" alt="Cảnh Trần" class="img-customer-right" />
                                            <div class="">
                                                <div class="name_customer">Cảnh Trần</div>
                                                <div class="summary-tuvan"><p>"Cảm ơn Thiên Phúc đã tạo ra được Đông Trùng Hạ Thảo, bố tôi cao huyết áp, sau khi dùng một thời gian cụ đỡ rất nhiều. Không cần phải ..."</p></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <a class="jcarousel-control-prev jcarousel-control-prev-customer"></a>
                                <a class="jcarousel-control-next jcarousel-control-next-customer"></a>
                                <p class="jcarousel-pagination jcarousel-pagination-customer visible-xs"></p>
                            </div>
                            <script type="text/javascript">
                                (function($) {
                                    $(function() {
                                        var jcarousel = $('.jcarouselCustomer');
                                        jcarousel
                                            .on('jcarousel:reload jcarousel:create', function() {
                                                var carousel = $(this),
                                                    width = carousel.innerWidth();

                                                if (width >= 600) {
                                                    width = width / 2;
                                                } else width = width / 1;
                                                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
                                            })
                                            .jcarousel({
                                                wrap: 'circular'
                                            });
                                        $(".jcarouselCustomer").jcarouselAutoscroll({
                                            autostart: true
                                        });
                                        $('.jcarousel-control-prev-customer')
                                            .jcarouselControl({
                                                target: '-=1'
                                            });

                                        $('.jcarousel-control-next-customer')
                                            .jcarouselControl({
                                                target: '+=1'
                                            });
                                        $('.jcarousel-pagination-customer')
                                            .on('jcarouselpagination:active', 'a', function() {
                                                $(this).addClass('active');
                                            })
                                            .on('jcarouselpagination:inactive', 'a', function() {
                                                $(this).removeClass('active');
                                            })
                                            .on('click', function(e) {
                                                e.preventDefault();
                                            })
                                            .jcarouselPagination({
                                                perPage: 1,
                                                item: function(page) {
                                                    return '<a href="#' + page + '">' + page + '</a>';
                                                }
                                            });
                                    });
                                })(jQuery);
                            </script>
                            <div class="form-cust">
                                <div class="clearfix text-center">
                                    <div class="title-phone" style="padding-bottom: 10px">Gọi cho chúng tôi</div>
                                    <div class="phone" style="display: inline-block"><span></span>0913-489-925</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-right">
                        <h4 class="text-center h2-about h2-kienthuc">
                            <span>Tin tức mới nhất</span>
                        </h4>
                        <div class="box-right-inner">
                            <ul class="ul-right">
                            <?php $tintuc = $this->db->select('*')->from('articles_item')->where(array('publish' => 1))->limit(4)->order_by('id desc')->get()->result_array(); ?>
                            <?php if(isset($tintuc) && count($tintuc)) { foreach ($tintuc as $key => $value) { ?>
                                <li class="li-kienthuc">
                                    <a class="a-kienthuc" href="<?php echo helper_string_alias($value['title']).'-a'.$value['id'].CMS_SUFFIX; ?>">
                                    <?php echo $value['title']; ?></a>
                                </li>
                            <?php }} ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>