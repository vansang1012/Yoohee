<!-- CONTENT CONTAINER -->
<div class="content-container">

	<h1 class="page-title">Xác nhận thông tin</h1>
	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="" enctype="multipart/form-data">
	<?php
		$error = validation_errors();
		echo (isset($error) && !empty($error))?'<div class="error" style="color:red">'.$error.'</div>':NULL;
	?>
	<!-- Custom (selli) form container -->
	<div class="selli-form">

		<div class="input-field">
			<input type="text" name="data[fullname]" placeholder="Họ và tên">
		</div>

		<div class="input-field">
			<input type="text" name="data[phone]" placeholder="Số điện thoại">
		</div>
		<div class="input-field">
			<input type="text" name="data[email]" placeholder="Email">
		</div>
		<div class="input-field">
			<input type="text" name="data[address]" placeholder="Địa chỉ nhận hàng">
		</div>
		<div class="input-field">
			<input type="text" name="data[notes]" placeholder="Ghi chú đơn hàng">
		</div>

		
		<input type="submit" class="btn block green margin-top" name="submit" id="place_order" value="Đặt hàng" /> 
		<a href="<?=CMS_URL?>gio-hang.html" class="btn orange block">Quay lại giỏ hàng</a>
	</div>
	<!-- End Custom Form -->
	</form>
	<ol class="cart-item">
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
		<li><!-- Cart Item #1 -->
			<div class="thumb">
				<img src="<?=helper_string_image(50,50,$product_cart['image'])?>" alt="">
			</div>
			
			<div class="cart-detail">
				<h3 class="product-name"><a href="<?=helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX?>"><?php echo htmlspecialchars($val['title']); ?></a></h3>
				<div class="price">
					<span>Giá</span> <?php echo number_format($val['price'],0,'.','.'); ?> VNĐ
				</div>
				<div class="qty">
					<span>Số lượng</span> <input type="number" name="number[<?php echo $val['id']; ?>]" value="<?php echo $val['number']; ?>">
				</div>
			</div>
		</li><!-- End Cart Item #1 -->
<?php } }else{
		die('<script type="text/javascript">alert(\'Chưa có sản phẩm trong giỏ hàng của bạn!\');location.href=\''.CMS_URL.'\';</script>');
	}
?>
		

		
	</ol>
	<!-- End Cart Item List -->

	<!-- Shopping cart action (total amount & button nav) -->
	<div class="cart-action">
		<div class="total">
			<span class="title">Tổng cộng</span>
			<span class="price"><?php echo number_format($total); ?> VNĐ</span>
		</div>
	</div>
	<!-- End Shopping cart action -->
</div>
<!-- END CONTENT CONTAINER -->