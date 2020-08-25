<div id="cms-tab">
	<p class="title">Hệ thống nguồn dữ liệu</p>
	<ul class="main">
		<li class="main"><a href="<?php echo CMS_BACKEND.'/craw/site'.CMS_SUFFIX;?>" class="main">Quản lý nguồn cấp dữ liệu</a></li>
		<li class="main"><a href="<?php echo CMS_BACKEND.'/craw/addsite'.CMS_SUFFIX;?>" class="main main-select">Thêm mới</a></li>
	</ul>
	<div class="cms-clear"></div>
</div><!-- #cms-tab -->

<div id="cms-container">
	<div id="cms-form">
		<?php
		$data['post_data'] = isset($post_data)?$post_data:NULL;
		$data['button_action'] = '<input type="submit" name="add" value="Thêm nguồn dữ liệu mới" class="button" />';
		$this->load->view('backend/craw/_formsite', $data);
		?>
		<div class="cms-clear"></div>
	</div><!-- #cms-form -->
	<div class="cms-clear"></div>
</div><!-- #cms-container -->