<form method="post" action=""><div class="panel-main" style="width: 700px !important; margin: 0px auto; float: none;">	<div class="block">		<div class="main-title"><p>Thông tin thành viên</p></div>		<div class="main-container">			<table cellspacing="0" cellpadding="0" class="form">				<?php				$error = validation_errors();				echo isset($error)?'<tr><td colspan="2"><ul class="cms-error">'.$error.'</ul></td></tr>':'';				?>				<tr>					<td class="label"><label for="txtUsername">Tên sử dụng</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[username]" id="txtUsername" value="<?php echo (isset($post_data['username'])?$post_data['username']:'');?>" class="text" />					</td>				</tr>				<tr>					<td class="label"><label for="txtPassword">Mật khẩu</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[password]" id="txtPassword" value="<?php echo (isset($post_data['password'])?$post_data['password']:'');?>" class="text" />					</td>				</tr>				<tr>					<td class="label"><label for="txtEmail">Email</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[email]" id="txtEmail" value="<?php echo (isset($post_data['email'])?$post_data['email']:'');?>" class="text" />					</td>				</tr>				<tr>					<td class="label"><label for="txtFullname">Tên đầy đủ</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[fullname]" id="txtFullname" value="<?php echo (isset($post_data['fullname'])?$post_data['fullname']:'');?>" class="text" />					</td>				</tr>				<tr>					<td class="label"><label for="txtTitle">Thao tác</label></td>					<td class="content">						<?php echo isset($button_action)?$button_action:'';?>						<input type="reset" value="Thực hiện lại" class="button" />					</td>				</tr>			</table>		</div><!-- .main-container -->		<div class="cms-clear"></div>	</div><!-- .block -->	<div class="cms-clear"></div></div><!-- .panel-main --><div class="panel-info">	<div class="cms-clear"></div></div><!-- .panel-info --></form>