<div id="cms-tab">
	<p class="title">Hệ thống danh mục dữ liệu</p>
	<ul class="main">
		<li class="main"><a href="<?php echo CMS_BACKEND.'/craw/item'.CMS_SUFFIX;?>" class="main">Quản lý dữ liệu</a></li>
		<li class="main"><a href="<?php echo CMS_BACKEND.'/craw/additem'.CMS_SUFFIX;?>" class="main">Thêm dữ liệu mới</a></li>
	</ul>
	<div class="cms-clear"></div>
</div><!-- #cms-tab -->

<div id="cms-container">
	<div id="cms-form">
		<?php
		$data['post_data'] = isset($post_data)?$post_data:NULL;
		$data['button_action'] = '<input type="submit" name="add" value="Thay đổi thông tin dữ liệu" class="button" />';
		$this->load->view('backend/craw/_formitem', $data);
		?>
		<div class="cms-clear"></div>
	</div><!-- #cms-form -->
	<div class="cms-clear"></div>
</div><!-- #cms-container -->