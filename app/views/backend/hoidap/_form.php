<form method="post" action=""><div class="panel-main">	<div class="block">		<div class="main-title"><p>Thông tin câu hỏi</p></div>		<div class="main-container">			<table cellspacing="0" cellpadding="0" class="form">				<?php				$error = validation_errors();				echo isset($error)?'<tr><td colspan="2"><ul class="cms-error">'.$error.'</ul></td></tr>':'';				?>				<tr>					<td class="label"><label for="txtFullname">Tên khách hàng</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[fullname]" class="text" id="txtFullname" value="<?php echo (isset($post_data['fullname'])?$post_data['fullname']:'');?>" />					</td>				</tr>				<tr>					<td class="label"><label for="txtAddress">Địa chỉ</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[address]" class="text" id="txtAddress" value="<?php echo (isset($post_data['address'])?$post_data['address']:'');?>" />					</td>				</tr>				<tr>					<td class="label"><label for="txtPhone">Điện thoại</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[phone]" class="text" id="txtPhone" value="<?php echo (isset($post_data['phone'])?$post_data['phone']:'');?>" />					</td>				</tr>				<tr>					<td class="label"><label for="txtEmail">Email</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[email]" class="text" id="txtEmail" value="<?php echo (isset($post_data['email'])?$post_data['email']:'');?>" />					</td>				</tr>				<tr>					<td class="label"><label for="txtNotes">Nội dung câu hỏi</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[notes]" class="textarea" id="txtNotes" style="height: 168px;"><?php echo (isset($post_data['notes'])?$post_data['notes']:'');?></textarea></td>				</tr>				<tr>					<td class="label"><label for="txtNotes">Nội dung trả lời</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[traloi]" class="textarea" id="txttraloi" style="height: 168px;"><?php echo (isset($post_data['traloi'])?$post_data['traloi']:'');?></textarea></td>				</tr>				<tr>					<td class="label"><label for="txtTitle">Thao tác</label></td>					<td class="content">						<?php echo isset($button_action)?$button_action:'';?>						<input type="reset" value="Thực hiện lại" class="button" />					</td>				</tr>			</table>		</div><!-- .main-container -->		<div class="cms-clear"></div>	</div><!-- .block -->	<div class="cms-clear"></div></div><!-- .panel-main --><div class="panel-info">	<div class="block">		<div class="main-title"><p>Tùy chọn</p></div>		<div class="main-container">			<table cellspacing="0" cellpadding="0" class="form">				<tr>					<td class="label label-option"><label for="">Xuất bản</label></td>					<td class="content" style="padding: 0px 0px 0px 0px;">						<input type="radio" name="data[publish]" value="0" class="radio" id="rbPublish_0" <?php echo ((isset($post_data['publish']) && $post_data['publish'] == 0)?'checked':'');?>/><label for="rbPublish_0">Không</label>						<input type="radio" name="data[publish]" value="1" class="radio" id="rbPublish_1" <?php echo ((isset($post_data['publish']) && $post_data['publish'] == 1)?'checked':'');?>/><label for="rbPublish_1">Có</label>					</td>				</tr>			</table>		</div>		<div class="cms-clear"></div>	</div><!-- .block -->	<div class="cms-clear"></div></div><!-- .panel-info --></form>