<div id="cms-tab">
	<p class="title">Hệ thống quản lý trải nghiệm người dùng</p>
	<ul class="main">
		<li class="main"><a href="<?php echo CMS_BACKEND.'/trainghiem/index'.CMS_SUFFIX;?>" class="main main-select">Quản lý</a></li>
		<li class="main"><a href="<?php echo CMS_BACKEND.'/trainghiem/add'.CMS_SUFFIX;?>" class="main">Thêm mới</a></li>
	</ul>
	<div class="cms-clear"></div>
</div><!-- #cms-tab -->

<div id="cms-container">
	<div id="cms-filter">
		<div class="left">
			<form class="frm-filter" method="get" action="<?php echo CMS_URL.CMS_BACKEND.'/trainghiem/index'.CMS_SUFFIX;?>">
				<input type="text" name="keyword" class="keyword" value="<?php echo isset($keyword)?$keyword:'';?>" />
				<input type="submit" class="search" value="Tìm kiếm" />
			</form>
		</div><!-- .left -->
		<div class="right">
			<input type="submit" class="button cms-publish-ajax" value="Xuất bản" name="trainghiem" />
			<input type="submit" class="button cms-unpublish-ajax" value="Dừng xuất bản" name="trainghiem" />
			<input type="submit" class="button cms-order-ajax" value="Sắp xếp" name="trainghiem" />
			<input type="submit" class="button cms-delete-ajax" value="Xóa nhiều" name="trainghiem" />
		</div><!-- .right -->
		<div class="cms-clear"></div>
	</div><!-- #cms-filter -->
	<div id="cms-table">
		<form id="frmView">
		<table cellspacing="0" cellpadding="0" class="data">
			<tr>
				<th>#</th>
				<th><input type="checkbox" id="check-all" /></th>
				<th class="left"><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/trainghiem/fullname'.CMS_SUFFIX;?>">Tên khách hàng<?php echo cms_common_icon_sort('fullname', $sort);?></a></th>
				<th class="left"><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/trainghiem/notes'.CMS_SUFFIX;?>">Nội dung <?php echo cms_common_icon_sort('notes', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/trainghiem/created'.CMS_SUFFIX;?>">Ngày tạo<?php echo cms_common_icon_sort('created', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/trainghiem/updated'.CMS_SUFFIX;?>">Ngày sửa<?php echo cms_common_icon_sort('updated', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/trainghiem/userid_created'.CMS_SUFFIX;?>">Người tạo<?php echo cms_common_icon_sort('userid_created', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/trainghiem/userid_updated'.CMS_SUFFIX;?>">Người sửa<?php echo cms_common_icon_sort('userid_updated', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/trainghiem/order'.CMS_SUFFIX;?>">Vị trí<?php echo cms_common_icon_sort('order', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/trainghiem/publish'.CMS_SUFFIX;?>">Xuất bản<?php echo cms_common_icon_sort('publish', $sort);?></a></th>
				<th>Thao tác</th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/trainghiem/id'.CMS_SUFFIX;?>">Mã<?php echo cms_common_icon_sort('id', $sort);?></a></th>
			</tr>
			<?php if(isset($full_data) && count($full_data)){ foreach($full_data as $key => $val){ ?>
			<tr <?php echo (($key + 1) == count($full_data))?'class="last"':'';?>>
				<td class="center first"><?php echo ($key+$per_page*$page+1);?></td>
				<td class="center"><input type="checkbox" name="checkbox[]" value="<?php echo $val['id'];?>" class="checkbox check-all" /></td>
				<td class="left title"><?php echo htmlspecialchars($val['fullname']);?></td>
				<td class="left"><?php echo helper_string_cutnchar(strip_tags($val['notes']), 100);?></td>
				<td class="center"><?php echo ($val['created'] != '0000-00-00 00:00:00')?gmdate('H:i d/m/Y', strtotime($val['created']) + 7*3600):'-';?></td>
				<td class="center"><?php echo ($val['updated'] != '0000-00-00 00:00:00')?gmdate('H:i d/m/Y', strtotime($val['updated']) + 7*3600):'-';?></td>
				<td class="center"><?php $user = helper_user_get_info($val['userid_created']); echo ($user == NULL)?'-':(!empty($user['fullname'])?$user['fullname']:$user['username']);?></td>
				<td class="center"><?php $user = helper_user_get_info($val['userid_updated']); echo ($user == NULL)?'-':(!empty($user['fullname'])?$user['fullname']:$user['username']);?></td>
				<td class="center order"><input type="text" name="order[<?php echo $val['id'];?>]" value="<?php echo $val['order'];?>" /></td>
				<td class="center">
					<a class="cms-set-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/common/set/trainghiem/publish/'.$val['id'].CMS_SUFFIX;?>">
						<img src="<?php echo ($val['publish'] == 0)?'template/backend/images/uncheck.png':'template/backend/images/check.png';?>" alt="Xuất bản" title="Xuất bản" />
					</a>
				</td>
				<td class="center">
					<a href="<?php echo CMS_URL.CMS_BACKEND.'/trainghiem/edit/'.$val['id'].CMS_SUFFIX;?>"><img src="template/backend/images/edit.png" /></a>
				</td>
				<td class="center last"><?php echo $val['id'];?></td>
			</tr>
			<?php } } else{ ?>
			<tr class="last"><td class="center first" colspan="11">Không có dữ liệu trải nghiệm người dùng.</td></tr>
			<?php } ?>
		</table>
		</form>
	</div><!-- #cms-table -->
	<?php if(isset($full_page) && !empty($full_page) && count($full_page)){ ?>
	<div id="cms-pagination">
		<?php echo helper_string_pagination_backend($full_page, $total_rows, 'Trang'); ?>
		<div class="cms-clear"></div>
	</div><!-- #cms-pagination -->
	<?php } ?>
	<div class="cms-clear"></div>
</div><!-- #cms-container -->