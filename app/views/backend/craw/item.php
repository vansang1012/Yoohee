<div id="cms-tab">
	<p class="title">Hệ thống dữ liệu</p>
	<ul class="main">
		<li class="main"><a href="<?php echo CMS_BACKEND.'/craw/item'.CMS_SUFFIX;?>" class="main main-select">Quản lý dữ liệu</a></li>
		<li class="main"><a href="<?php echo CMS_BACKEND.'/craw/additem'.CMS_SUFFIX;?>" class="main">Thêm dữ liệu mới</a></li>
	</ul>
	<div class="cms-clear"></div>
</div><!-- #cms-tab -->

<div id="cms-container">
	<div id="cms-filter">
		<div class="left">
			<form class="frm-filter" method="get" action="<?php echo CMS_URL.CMS_BACKEND.'/craw/item'.CMS_SUFFIX;?>" id="frmFilter">
				<?php echo form_dropdown('parentid', (isset($show_data['parentid'])?$show_data['parentid']:NULL), (isset($post_data['parentid'])?(int)$post_data['parentid']:0),' class="select" id="txtFilterParentid"');?>
				<input type="text" name="keyword" class="keyword" value="<?php echo isset($keyword)?$keyword:'';?>" />
				<input type="submit" class="search" value="Tìm kiếm" />
			</form>
		</div><!-- .left -->
		<div class="right">
			<?php if($this->auth['group'] == 'Người quản lý'){ ?>
			<input type="submit" class="button cms-delete_craw-ajax" value="Xóa DATA" name="craw_item" />
			<input type="submit" class="button cms-ghidulieu-ajax" value="Ghi dữ liệu" name="craw_item" />
			<input type="submit" class="button cms-keke-ajax" value="Picsaca" name="craw_item" />
			<?php } ?>
		</div><!-- .right -->
		<div class="cms-clear"></div>
	</div><!-- #cms-filter -->
	<div id="cms-table">
		<form id="frmView">
		<table cellspacing="0" cellpadding="0" class="data">
			<tr>
				<th>#</th>
				<th><input type="checkbox" id="check-all" /></th>
				<th class="left"><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/title'.CMS_SUFFIX;?>">Tên dữ liệu<?php echo cms_common_icon_sort('title', $sort);?></a></th>
				<th class="left"><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/parentid'.CMS_SUFFIX;?>">Danh mục cha<?php echo cms_common_icon_sort('parentid', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/viewed'.CMS_SUFFIX;?>">Lượt xem<?php echo cms_common_icon_sort('viewed', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/created'.CMS_SUFFIX;?>">Ngày tạo<?php echo cms_common_icon_sort('created', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/updated'.CMS_SUFFIX;?>">Ngày sửa<?php echo cms_common_icon_sort('updated', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/userid_created'.CMS_SUFFIX;?>">Người tạo<?php echo cms_common_icon_sort('userid_created', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/userid_updated'.CMS_SUFFIX;?>">Người sửa<?php echo cms_common_icon_sort('userid_updated', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/order'.CMS_SUFFIX;?>">Vị trí<?php echo cms_common_icon_sort('order', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/publish'.CMS_SUFFIX;?>">Xuất bản<?php echo cms_common_icon_sort('publish', $sort);?></a></th>
				<th>Picsaca</th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/highlight'.CMS_SUFFIX;?>">Edit<?php echo cms_common_icon_sort('highlight', $sort);?></a></th>
				<th><a class="cms-sort-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/session/sort/craw_item/id'.CMS_SUFFIX;?>">Mã<?php echo cms_common_icon_sort('id', $sort);?></a></th>
			</tr>
			<?php if(isset($full_data) && count($full_data)){ foreach($full_data as $key => $val){ ?>
			<tr <?php echo (($key + 1) == count($full_data))?'class="last"':'';?>>
				<td class="center first"><?php echo ($key+$per_page*$page+1);?></td>
				<td class="center"><input type="checkbox" name="checkbox[]" value="<?php echo $val['id'];?>" class="checkbox check-all" /></td>
				<td class="left title"><a href="<?php echo CMS_URL.CMS_BACKEND.'/craw/edititem/'.$val['id'].CMS_SUFFIX;?>"><?php echo helper_string_cutnchar(strip_tags($val['title']), 68);?></a></td>
				<td class="center"><?php $parentid = helper_module_get_category_info('craw_category', $val['parentid']); echo ($parentid == NULL)?'-':$parentid['title'];?></td>
				<td class="center"><?php echo $val['viewed'];?></td>
				<td class="center"><?php echo ($val['created'] != '0000-00-00 00:00:00')?gmdate('H:i d/m/Y', strtotime($val['created']) + 7*3600):'-';?></td>
				<td class="center"><?php echo ($val['updated'] != '0000-00-00 00:00:00')?gmdate('H:i d/m/Y', strtotime($val['updated']) + 7*3600):'-';?></td>
				<td class="center"><?php $user = helper_user_get_info($val['userid_created']); echo ($user == NULL)?'-':(!empty($user['fullname'])?$user['fullname']:$user['username']);?></td>
				<td class="center"><?php $user = helper_user_get_info($val['userid_updated']); echo ($user == NULL)?'-':(!empty($user['fullname'])?$user['fullname']:$user['username']);?></td>
				<td class="center order"><input type="text" name="order[<?php echo $val['id'];?>]" value="<?php echo $val['order'];?>" /></td>
				<td class="center">
					<a class="cms-set-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/common/set/craw_item/publish/'.$val['id'].CMS_SUFFIX;?>">
						<img src="<?php echo ($val['publish'] == 0)?'template/backend/images/uncheck.png':'template/backend/images/check.png';?>" alt="Xuất bản" title="Xuất bản" />
					</a>
				</td>
				<td class="center">
				<?php
					if(preg_match('/googleusercontent/',$val['image']))
					{
						$HEHE=1;
					}else $HEHE=0;
				
				if($HEHE==0)
				{
				?>
				<a class="cms-set-ajax" href="<?php echo CMS_URL.CMS_BACKEND.'/common/picsaca/craw_item/'.$val['id'].CMS_SUFFIX;?>">
						<img src="<?php echo ($HEHE==0)?'template/backend/images/uncheck.png':'template/backend/images/check.png';?>" alt="Kiểm tra xem toàn bộ ảnh đã lưu trên google host chưa" title="Kiểm tra xem toàn bộ ảnh đã lưu trên google host chưa" />
				</a>
				<?php
				}else{
				?>
						<img src="<?php echo ($HEHE==0)?'template/backend/images/uncheck.png':'template/backend/images/check.png';?>" alt="Kiểm tra xem toàn bộ ảnh đã lưu trên google host chưa" title="Kiểm tra xem toàn bộ ảnh đã lưu trên google host chưa" />
				<?php
				}
				?>
				</td>
				<td class="center">
					<a href="<?php echo CMS_URL.CMS_BACKEND.'/craw/edititem/'.$val['id'].CMS_SUFFIX;?>"><img src="template/backend/images/edit.png" /></a>
				</td>
				<td class="center last"><?php echo $val['id'];?></td>
			</tr>
			<?php } } else{ ?>
			<tr class="last"><td class="center first" colspan="12">Không có dữ liệu.</td></tr>
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