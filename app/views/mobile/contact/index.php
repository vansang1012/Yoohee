<!--=== BEGIN: CONTENT ===-->
<div id="vnt-content">
	
	<!--=== BEGIN: PRODUCT ===-->
	<div class="vnt-product white-bg">
		<div class="wrapper">
			<div class="vp-title wow fadeInRight"><h2><span>Liên hệ</span></h2></div>
			<!--===BEGIN GIRD-PRODUCT==-->
			<div class="gird-product">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-xs-12 col-sm-6 wow fadeInUp">
							<div id="content-page">
							<div class="map" style="margin-bottom: 30px">
											<iframe src="https://maps.google.com/maps?q=C%C3%B4ng%20Ty%20TNHH%20Gi%E1%BA%A3i%20Ph%C3%A1p%20N%C4%83ng%20L%C6%B0%E1%BB%A3ng%20To%C3%A0n%20Di%E1%BB%87n%2C%20Hanoi%2C%20Vietnam&t=&z=17&ie=UTF8&iwloc=&output=embed" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
										</div>
							
							</div>
						</div>	


					<div class="col-md-6 col-xs-12 col-sm-6 wow fadeInUp">
							<div class="vv-contact">
				<?php
				$error = validation_errors();
				echo isset($error)?'<ul class="cms-error">'.$error.'</ul>':'';
				?>
					<form id="frmContact" method="post" action="">
						<table>
							<tr>
								<td style="width: 120px;"><label>Họ và tên</label></td>
								<td><input type="text" name="data[fullname]" value="<?php echo isset($post_data['fullname'])?htmlspecialchars($post_data['fullname']):'';?>" class="validate[required] text" /></td>
							</tr>
							<tr>
								<td><label>Số điện thoại</label></td>
								<td><input type="text" name="data[phone]" value="<?php echo isset($post_data['phone'])?htmlspecialchars($post_data['phone']):'';?>" class="validate[required] text" /></td>
							</tr>
							<tr>
								<td><label>Địa chỉ</label></td>
								<td><input type="text" name="data[address]" value="<?php echo isset($post_data['address'])?htmlspecialchars($post_data['address']):'';?>" class="validate[required] text" /></td>
							</tr>
							<tr>
								<td><label>Email</label></td>
								<td><input type="text" name="data[email]" value="<?php echo isset($post_data['email'])?htmlspecialchars($post_data['email']):'';?>" class="validate[required,custom[email]] text" /></td>
							</tr>
							<tr>
								<td><label>Nội dung liên hệ</label></td>
								<td><textarea name="data[notes]" class="validate[required]" rows="5" cols="5"><?php echo isset($post_data['content'])?htmlspecialchars($post_data['content']):'';?></textarea></td>
							</tr>
							<tr>
								<td><img src="frontend/contact/captcha" class="img-capcha" title="Mã xác nhận" alt="Mã xác nhận"/>
										</td>
								<td>
									<div class="submit">
										
										<input type="text" name="txtCaptcha" value="" class="input-capcha" placeholder="Mã xác nhận" />
										<input type="submit" name="sent" value="Gửi liên hệ" class="btnSubmit" />
									</div>
								</td>
							</tr>
						</table>
					</form>
				</div>
						</div>								
					</div>


				</div><!--CONTAINER-->
				
			</div><!--GIRD-PRODUCT-->
		</div>

	</div>	<!--=== END: PRODUCT ===-->
	<div class="clear"></div>
	


</div>  <!--=== END: CONTENT ===-->

