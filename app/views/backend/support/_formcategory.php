<form method="post" action=""><div class="panel-main" style="width: 700px !important; margin: 0px auto; float: none;">	<div class="block">		<div class="main-title"><p>Thông tin danh mục hỗ trợ</p></div>		<div class="main-container">			<table cellspacing="0" cellpadding="0" class="form">				<?php				$error = validation_errors();				echo isset($error)?'<tr><td colspan="2"><ul class="cms-error">'.$error.'</ul></td></tr>':'';				?>				<tr>					<td class="label"><label for="txtTitle">Tiêu đề</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<input type="text" name="data[title]" class="text" id="txtTitle" value="<?php echo (isset($post_data['title'])?$post_data['title']:'');?>" />					</td>				</tr>				<tr>					<td class="label"><label for="txtParentid">Danh mục cha</label></td>					<td class="content" style="padding: 0px 0px 10px 0px;">						<?php echo form_dropdown('data[parentid]', (isset($show_data['parentid'])?$show_data['parentid']:NULL), (isset($post_data['parentid'])?(int)$post_data['parentid']:0),' id="txtParentid" class="select"');?>					</td>				</tr>				<tr>					<td class="label"><label for="txtTitle">Thao tác</label></td>					<td class="content">						<?php echo isset($button_action)?$button_action:'';?>						<input type="reset" value="Thực hiện lại" class="button" />					</td>				</tr>			</table>		</div><!-- .main-container -->		<div class="cms-clear"></div>	</div><!-- .block -->	<div class="cms-clear"></div></div><!-- .panel-main --><div class="panel-info">	<div class="cms-clear"></div></div><!-- .panel-info --></form>