<div id="cms-tab">
	<p class="title">Hệ thống quản lý ảnh Picsaca</p>
	<ul class="main">
		<li class="main"><a href="<?php echo CMS_BACKEND.'/picsaca/item'.CMS_SUFFIX;?>" class="main main-select">Quản lý hình ảnh</a></li>
		<li class="main"><a class="main main-select">Xem thêm ảnh</a></li>
	</ul>
	<div class="cms-clear"></div>
</div><!-- #cms-tab -->

<div id="cms-container">
	<div id="cms-filter">
		<div class="left">
			<form action="<?php echo CMS_URL; ?>admin/picsaca/do_upload" method="post" class="frm-filter" id="frmFilter">
				<?php //echo form_dropdown('parentid', (isset($show_data['parentid'])?$show_data['parentid']:NULL), (isset($post_data['parentid'])?(int)$post_data['parentid']:0),' class="select" id="txtFilterParentid"');?>
				<input type="text" name="url" class="keyword" placeholder="Nhập địa chỉ ảnh ..." />
				<input type="submit" class="search" value="Upload From Url" />
			</form>

		</div><!-- .left -->
		<div class="right">
		            <form action="<?php echo CMS_URL; ?>admin/picsaca/do_upload" id="frmfile" method="post">
<input type="hidden" name="dir" id="dir" value="./upload/"></form>
			<?php if($this->auth['group'] == 'Người quản lý'){ ?>
			<input type="submit" class="button cms-delete_picsaca-ajax" value="Xóa ảnh" name="craw_item" />
			<button type="button" id="btnimg" class="button btn ui-state-default ui-corner-all">Upload ảnh</button>
			<?php } ?>
		</div><!-- .right -->
		<div class="cms-clear"></div>
	</div><!-- #cms-filter -->
	<div id="cms-table">
		<form id="frmView">
		<table cellspacing="0" cellpadding="0" class="data">
			<!--<tr>
				<input type="checkbox" id="check-all" />
			</tr>-->
<?php
    foreach ($data as $key=>$value) {
       ?>
			<li style="list-style:none;float:left;margin: 5px;border: solid 3px #066DA1;overflow: hidden;height: 100px;">
				<input style="position: absolute;zoom: 2;margin: 3px;" type="checkbox" name="checkbox[]" value="<?php echo $value['id']; ?>" class="checkbox check-all" /><a style="cursor: pointer;" onclick="Show_Div(fooo<?php echo $value['id']; ?>);" title="<?php echo $value['title']; ?>"><img src="<?php echo $value['thumb']; ?>" alt="<?php echo $value['title']; ?>" /></a>				
				<div style="display:none;position: absolute;z-index: 999;margin-left: -20px;" id="fooo<?php echo $value['id']; ?>"><textarea readonly cols="30" rows="10" id="txtfld<?php echo $value['id']; ?>" onClick="SelectAll('txtfld<?php echo $value['id']; ?>');" /><?php echo $value['url']; ?></textarea></div>
			</li>


<?php
}
?>
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.js"></script>
<script type="text/javascript">
function SelectAll(id)
{
    document.getElementById(id).focus();
    document.getElementById(id).select();
};
 function Show_Div(Div_id) {
            if (false == $(Div_id).is(':visible')) {
                $(Div_id).show(250);
            }
            else {
                $(Div_id).hide(250);
            }
        }
</script>
</div><!-- #cms-container -->