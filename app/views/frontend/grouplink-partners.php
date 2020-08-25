<div class="vv-group-link">
	<?php
	$list = helper_module_list_category('grouplink_category', array('parentid' => 1), 'order asc', 4);
	if(isset($list) && count($list)){
		foreach($list as $keyMain => $valMain){
			echo '<ul>';
			echo '<li class="title"><h3>'.$valMain['title'].'</p></td></li>';
			$item = helper_module_list_item('grouplink_item', 'title, url', array('parentid' => $valMain['id']), 'order asc', 36);
			if(isset($item) && count($item)){
				foreach($item as $keyItem => $valItem){
					echo '<li><a rel="nofollow" href="'.$valItem['url'].'" title="'.htmlspecialchars($valItem['title']).'">'.$valItem['title'].'</a></li>';
				}
			}
			echo '<li class="continue"><a href="#" rel="nofollow">Xem thêm...</a></li>';
			echo '</ul>';
		}
	}
	?>
	<div class="news-clear"></div>
</div><!-- .vv-group-link -->
<div class="vv-partners">
	<div class="list">
	<ul>
		<?php $list = helper_module_list_item('partner', 'title, image, website', NULL, 'id asc', 36); ?>
		<?php if(isset($list) && count($list)){ foreach($list as $key => $val){ ?>
		<li><a rel="nofollow" href="<?php echo $val['website'];?>" target="_blank" title="<?php echo htmlspecialchars($val['title']);?>"><img src="<?php echo $val['image'];?>" title="<?php echo htmlspecialchars($val['title']);?>" alt="<?php echo $val['title'];?>" /></a></li>
		<?php } } ?>
	</ul>
	</div>
</div><!-- .vv-partners -->