<script type="text/javascript" src="template/backend/js/jquery-1.7.1.min.js"></script>
<form method="post" action="">
<div class="panel-main">
	<div class="block">
		<div class="main-title"><p>Thông tin sản phẩm</p></div>
		<div class="main-container">
			<table cellspacing="0" cellpadding="0" class="form">
				<?php
				$error = validation_errors();
				echo isset($error)?'<tr><td colspan="2"><ul class="cms-error">'.$error.'</ul></td></tr>':'';
				?>
				<tr>
					<td class="label"><label for="txtTitle">Tiêu đề</label></td>
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
					<td class="label"><label for="txtImage">Ảnh đại diện</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;">
						<input type="text" name="data[image]" class="text" id="txtImage" value="<?php echo (isset($post_data['image'])?$post_data['image']:'');?>" />
						<input type="button" value="Chọn ảnh" class="button" onclick="browseKCFinder('txtImage', 'image')"/>

					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtTitle">Giá mới</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;width:100px;">
						<input style="width:220px;" type="number" name="data[price]" class="text" id="txtprice" value="<?php echo (isset($post_data['price'])?$post_data['price']:'');?>" /> VNĐ
					</td>
				</tr>
        <tr>
					<td class="label"><label for="txtTitle">Giá cũ</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;width:100px;">
						<input style="width:220px;" type="number" name="data[price_market]" class="text" id="txtprice_market" value="<?php echo (isset($post_data['price_market'])?$post_data['price_market']:'');?>" /> VNĐ
					</td>
				</tr>
				<tr>
					<td class="label"><label for="txtDescription">Mô tả ngắn</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[description]" class="textarea wysiwygEditor" id="txtDescription" style="height:168px;"><?php echo (isset($post_data['description'])?htmlspecialchars($post_data['description']):'');?></textarea></td>
				</tr>
				<tr>
					<td class="label"><label for="txtContent">Nội dung chi tiết</label></td>
					<td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[content]" class="textarea wysiwygEditor" id="txtContent" style="height:268px;"><?php echo (isset($post_data['content'])?htmlspecialchars($post_data['content']):'');?></textarea></td>
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
		<div class="main-title"><p>Tùy chọn</p></div>
		<div class="main-container">
			<table cellspacing="0" cellpadding="0" class="form">
				<tr>
					<td class="label label-option"><label for="">Xuất bản</label></td>
					<td class="content" style="padding: 0px 0px 0px 0px;">
						<input type="radio" name="data[publish]" value="0" class="radio" id="rbPublish_0" <?php echo ((isset($post_data['publish']) && $post_data['publish'] == 0)?'checked':'');?>/><label for="rbPublish_0">Không</label>
						<input type="radio" name="data[publish]" value="1" class="radio" id="rbPublish_1" <?php echo ((isset($post_data['publish']) && $post_data['publish'] == 1)?'checked':'');?>/><label for="rbPublish_1">Có</label>
					</td>
				</tr>
			</table>
		</div>
		<div class="cms-clear"></div>
	</div><!-- .block -->
	<div class="block">
		<div class="main-title"><p>Ngày đăng sản phẩm</p></div>
		<div class="main-container">
			<table cellspacing="0" cellpadding="0" class="form">
				<tr>
					<input type="date" name="data[created]" class="text" id="txtDate" value="<?php echo (isset($post_data['created'])?date('Y-m-d',strtotime($post_data['created'])):date('Y-m-d',time()));?>" />
				</tr>
			</table>
		</div>
		<div class="cms-clear"></div>
	</div><!-- .block -->

	<div class="block">
		<div class="main-title"><p>Meta</p></div>
		<div class="main-container">
			<table cellspacing="0" cellpadding="0" class="form">
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtMetaTitle">Meta Title</label></td>
				</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;"><input type="text" name="data[meta_title]" class="text" id="txtMetaTitle" value="<?php echo (isset($post_data['meta_title'])?$post_data['meta_title']:'');?>" /></td>
				</tr>
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtMetaKeyword">Meta Keyword</label></td>
				</tr>
				<tr>
					<td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[meta_keyword]" class="textarea" id="txtMetaKeyword" style="height: 28px;"><?php echo (isset($post_data['meta_keyword'])?$post_data['meta_keyword']:'');?></textarea></td>
				</tr>
				<tr>
					<td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtMetaDescription">Meta Description</label></td>
				</tr>
				<tr>
					<td class="content"><textarea name="data[meta_description]" class="textarea" id="txtMetaDescription"><?php echo (isset($post_data['meta_description'])?$post_data['meta_description']:'');?></textarea></td>
				</tr>
			</table>
		</div>
		<div class="cms-clear"></div>
	</div><!-- .block -->
	<div class="cms-clear"></div>
	<div class="block">
		<div class="main-title"><p>Gallery</p></div>
		<div class="main-container">
			<table border="0" cellspacing="1" cellpadding="0" >
	<tbody class="slide-action">
	<?php if (isset($post_data['gallery'][0]) && count($post_data['gallery'])>0){?>
	<?php foreach($post_data['gallery'] as $key =>$val){?>
	<tr class="slide-item">
		<td style="padding-bottom: 5px;">
			<img src="<?=$val?>" style="width:100%;height:auto;">
		</td>
		<td style="padding-bottom: 5px;position: absolute;right: 30px;">
			<input name="data[gallery][]" value="<?=$val?>" type="hidden" placeholder="" id="txtImage<?=$key+1?>" class="text-input" style="width:150px; margin:0px 5px 0px 0px;">
			<input style="float: left;margin-right: 3px;padding: 5px;font-size: 12px;" type="hidden" value="Chọn ảnh" onclick="browseKCFinder('txtImage<?=$key+1?>','image')" class="button">
			<input style="float: right;margin-left: 1px;padding: 5px;font-size: 12px;" type="button" value="Xóa" class="button btn-delete-slide">
		</td>
	</tr>
	<?php }} ?>
	</tbody>
	</table>
	<table border="0" cellspacing="1" cellpadding="0" >
	<tbody>
		<tr>
			<td style="padding: 5px 2px;">
				<input type="button" value="Thêm ảnh" class="btn-input" id="btn-add-slide">
			</td>
		</tr>
	</tbody>
	</table>

<script type="text/javascript">
$(document).ready(function(){
	var total_item_form_slide = 0;
	var d = new Date();
	var number = d.getTime();
	$('#btn-add-slide').click(function(){
		var total_item = $('tr.slide-item').length;
		var str = '';
		str = str + '<tr class="slide-item" >';
		str = str + '<td style="padding-bottom: 5px;">';
		str = str + '<input name="data[gallery][]" value="" type="text" placeholder="" id="txtImage'+(total_item + number)+'" class="text-input" style="width:150px; margin:0px 5px 0px 0px;">';
		str = str + '<input style="float: left;margin-right: 3px;padding: 5px;font-size: 12px;" type="button" value="Chọn ảnh"  onclick="browseKCFinder(\'txtImage'+(total_item + number)+'\'\,\'image\')" class="button">';
		str = str + '<input style="float: right;margin-left: 1px;padding: 5px;font-size: 12px;" type="button" value="Xóa" class="button btn-delete-slide">';
		str = str + '</td>';
		str = str + '</tr>';
		$('.slide-action').append(str);
		$('.frm tr > td').removeClass('odd');
		$('.frm tr:odd > td').addClass('odd');
		return false;
	});
	$('.btn-delete-slide').live('click', function() {
		var flag = confirm('Bạn có chắc chắn muốn xóa?');
		if(flag == true){
			$(this).parent().parent().remove();
		}
		return false;
	});
});
</script>
		</div>
		<div class="cms-clear"></div>
	</div><!-- .block -->
	<div class="cms-clear"></div>

</div><!-- .panel-info -->
</form>
