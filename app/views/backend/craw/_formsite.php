<form method="post" action="">
<div class="panel-main">
	<div class="block">
		<div class="main-title"><p>Thông tin nguồn dữ liệu</p></div>
		<div class="main-container">
			<table cellspacing="0" cellpadding="0" class="form">
				<?php
				$error = validation_errors();
				echo isset($error)?'<tr><td colspan="2"><ul class="cms-error">'.$error.'</ul></td></tr>':'';
				?>
				<tr>
					<td class="label"><label for="txtTitle">Đặt tên nguồn dữ liệu</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[title]" class="text" id="txtTitle" value="<?php echo (isset($post_data['title'])?$post_data['title']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtParentid">Danh mục cha</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<?php echo form_dropdown('data[parentid]', (isset($show_data['parentid'])?$show_data['parentid']:NULL), (isset($post_data['parentid'])?(int)$post_data['parentid']:0),' id="txtParentid" class="select"');?>
					</td>
				</tr>
				<tr>
				<tr>
					<td class="label"><label for="txtHost">Host request</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[host]" class="text" id="txtHost" value="<?php echo (isset($post_data['host'])?$post_data['host']:'');?>" />
					</td>
				</tr>
				
				<tr>
					<td class="label"><label for="txtUrl">URL</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[url]" class="text" id="txtUrl" value="<?php echo (isset($post_data['url'])?$post_data['url']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtpattern_bound">Mẫu bao ngoài</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[pattern_bound]" class="text" id="txtpattern_bound" value="<?php echo (isset($post_data['pattern_bound'])?$post_data['pattern_bound']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtextra">Mẫu liên kết 1 tin</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[extra]" class="text" id="txtextra" value="<?php echo (isset($post_data['extra'])?$post_data['extra']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtimage_pattern">Mẫu chứa ảnh đại diện</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[image_pattern]" class="text" id="txtimage_pattern" value="<?php echo (isset($post_data['image_pattern'])?$post_data['image_pattern']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtpage_num">Số trang cần lấy</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[page_num]" class="text" id="txtpage_num" value="<?php echo (isset($post_data['page_num'])?$post_data['page_num']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtImage">Thư mục chứa ảnh</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[image_dir]" class="text" id="txtImage" value="<?php echo (isset($post_data['image_dir'])?$post_data['image_dir']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtBegin">Vùng bắt đầu</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[begin]" class="text" id="txtBegin" value="<?php echo (isset($post_data['begin'])?$post_data['begin']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtEnd">==> Kết thúc</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[end]" class="text" id="txtEnd" value="<?php echo (isset($post_data['end'])?$post_data['end']:'');?>" />
					</td>
				</tr>
				
				<tr>
					<td class="label"><label for="txtTitle">Thao tác</label></td>
					<td class="content">
						<?php echo isset($button_action)?$button_action:'';?>
						<input type="reset" value="Thực hiện lại" class="button" />
					</td>
				</tr>
			</table>
		</div><!-- .main-container -->
		<div class="cms-clear"></div>
	</div><!-- .block -->
	<div class="cms-clear"></div>
</div><!-- .panel-main -->
<div class="panel-info">
	<div class="block">
		<div class="main-title"><p>Chi tiết bài viết</p></div>
		<div class="main-container">
			<table cellspacing="0" cellpadding="0" class="form">
			<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtimage_content_left">Thay thế ảnh từ</label></td>
					</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[image_content_left]" class="text" id="txtimage_content_left" value="<?php echo (isset($post_data['image_content_left'])?$post_data['image_content_left']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtimage_content_right">==>> Thành</label></td>
					</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[image_content_right]" class="text" id="txtimage_content_right" value="<?php echo (isset($post_data['image_content_right'])?$post_data['image_content_right']:'');?>" />
					</td>
				</tr>
				<tr>
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtname_extra">FORM TITLE</label></td>
					</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[name_extra]" class="text" id="txtname_extra" value="<?php echo (isset($post_data['name_extra'])?$post_data['name_extra']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtname_element_delete">FORM TITLE DELETE</label></td>
					</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[name_element_delete]" class="text" id="txtname_element_delete" value="<?php echo (isset($post_data['name_element_delete'])?$post_data['name_element_delete']:'');?>" />
					</td>
				</tr>				
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtbrief_extra">FORM DESCRIPTION</label></td>
					</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[brief_extra]" class="text" id="txtbrief_extra" value="<?php echo (isset($post_data['brief_extra'])?$post_data['brief_extra']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtbrief_element_delete">FORM DESCRIPTION DELETE</label></td>
					</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[brief_element_delete]" class="text" id="txtbrief_element_delete" value="<?php echo (isset($post_data['brief_element_delete'])?$post_data['brief_element_delete']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtdescription_extra">FORM CONTENT</label></td>
					</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[description_extra]" class="text" id="txtdescription_extra" value="<?php echo (isset($post_data['description_extra'])?$post_data['description_extra']:'');?>" />
					</td>
				</tr>
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtdescription_element_delete">FORM CONTENT DELETE</label></td>
					</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[description_element_delete]" class="text" id="txtdescription_element_delete" value="<?php echo (isset($post_data['description_element_delete'])?$post_data['description_element_delete']:'');?>" />
					</td>
				</tr>
			</table>
		</div>
		<div class="cms-clear"></div>
	</div><!-- .block -->
	<div class="cms-clear"></div>
</div><!-- .panel-info -->
</form>