<!-- CONTENT CONTAINER -->
<div class="content-container">

	<h1 class="page-title">Giỏ hàng</h1>

	<!-- Cart Item List -->
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
			<div class="cart-delete">
				<a href="<?php echo CMS_URL.'frontend/sanpham/removetocart/'.$val['id'].CMS_SUFFIX.'?redirect='.base64_encode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>">
					<i class="fa fa-times"></i>
				</a>
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
			<span class="price"><?php echo number_format($total,0,'.','.'); ?> VNĐ</span>
		</div>
		<a href="<?=CMS_URL?>thanh-toan.html" class="btn orange block">Thanh toán</a>
		<a href="<?=CMS_URL?>san-pham-cp1.html" class="btn blue block">Tiếp tục mua hàng</a>
	</div>
	<!-- End Shopping cart action -->

</div>
<!-- END CONTENT CONTAINER -->