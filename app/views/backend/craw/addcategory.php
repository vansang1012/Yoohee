<div id="cms-tab">
	<p class="title">Hệ thống danh mục dữ liệu</p>
	<ul class="main">
		<li class="main"><a href="<?php echo CMS_BACKEND.'/craw/category'.CMS_SUFFIX;?>" class="main">Quản lý danh mục dữ liệu</a></li>
		<li class="main"><a href="<?php echo CMS_BACKEND.'/craw/addcategory'.CMS_SUFFIX;?>" class="main main-select">Thêm danh mục dữ liệu mới</a></li>
	</ul>
	<div class="cms-clear"></div>
</div><!-- #cms-tab -->

<div id="cms-container">
	<div id="cms-form">
		<?php
		$data['post_data'] = isset($post_data)?$post_data:NULL;
		$data['button_action'] = '<input type="submit" name="add" value="Thêm danh mục dữ liệu mới" class="button" />';
		$this->load->view('backend/craw/_formcategory', $data);
		?>
		<div class="cms-clear"></div>
	</div><!-- #cms-form -->
	<div class="cms-clear"></div>
</div><!-- #cms-container -->