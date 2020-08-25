          <?php $slide= $this->db->select('*')->from('slide')->order_by('created desc')->limit(1)->get()->row_array(); ?>
<div class="banner_hd">
      <li id="media_image-2" class="widget widget_media_image"><img width="1599" height="262" src="<?php echo $slide['image']; ?>" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" /></li>
</div>
          <main>
            <!-- breadcrumb-area -->
           
            <div class="main-content pt-50 pb-50 mt-50">
              <div class="container">
                  <div class="row">     
                          <form action="" method="post" accept-charset="utf-8" class="form-giohang">
                           
                            <table class="table-bordered">
                              <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Ảnh sản phẩm</th>
                                <th class="text-center">Tên sản phẩm</th> 
                                <th class="text-center">Giá thuê</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Thành tiền</th>
                              </tr>
                              <?php
                              $total = 0;
                              if(isset($full_data) && count($full_data)){
                              foreach($full_data as $key => $val){
                                $total_temp = 0;
                                $total_temp = $val['price'] * $val['number'];
                                $total = $total + $total_temp;
                                //$product_cart = get_item('*', $val['id'], 'products_item');
                                $product_cart = $this->db->from('sanpham_item')->where(array('id'=>$val['id']))->get()->row_array();  
                            ?>
                              <tr>
                                <td colspan="" rowspan="" headers="" class="text-center"><?php echo $key+1; ?></td>
                                <td class="text-center"><a class="image img-scaledown" target="" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>" title="<?php echo htmlspecialchars($val['title']); ?>">
                                <img src="<?php echo helper_string_image(130,130,$product_cart['image'])?>" alt="<?php echo htmlspecialchars($val['title']); ?>" /></a></td>
                                <td class="text-center"><a class="text-product" href="<?php echo helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX; ?>" title="<?php echo htmlspecialchars($val['title']); ?>"><?php echo htmlspecialchars($val['title']); ?></a></td>
                                <td class="text-center"><?php echo number_format($val['price']); ?>₫</td>
                                <td colspan="" rowspan="" headers=""><div class="quantity" style="color:red;"><input class="input-quantity"  type="number" value="<?php echo $val['number']; ?>" name="number[<?php echo $val['id']; ?>]" style="width:50px;text-align:right;" /></div></td>
                                <td colspan="" rowspan="" headers="" class="text-center"><div class="price"><?php echo number_format($total_temp,0,'.','.'); ?>₫</div></td>
                              </tr>
                            <?php }} ?>
                              
                            </table>
                        
                            <div class="cart-footer" style="margin-top: 20px">
                              <input name="btnNumber" type="submit" class="btn update-cart" value="Cập nhật">
                              <a href="thanh-toan.html" class="btn">Thanh toán</a>
                            </div>
                          </form>     

                  </div>
              </div>
            </div>

