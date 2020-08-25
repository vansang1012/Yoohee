<div class="vv-container">
	<div class="vv-left">
		<div class="block">
			<div class="main-title">
				<img src="template/frontend/images/icon-left.png" title="icon breadcrumb" alt="icon breadcrumb" />
				<ul class="breadcrumb">
					<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
						<a href="<?php echo CMS_URL;?>" title="Trang chủ" itemprop="url"><span itemprop="title">Trang chủ</span></a>
					</li>
					<li class="spacebar">&raquo;</li>
					<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
						<a href="<?php echo CMS_URL;?>chu-de<?php echo CMS_SUFFIX;?>" title="Chủ đề" itemprop="url"><span itemprop="title">Chủ đề</span></a>
					</li>
					<li class="spacebar">&raquo;</li>
					<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
						<h1>
							<a href="<?php echo 'chu-de/'.$tag['alias'].((isset($page) && $page > 0)?'-p'.($page+1):'').CMS_SUFFIX;?>" title="<?php echo htmlspecialchars($tag['title']);?><?php echo (isset($page) && $page > 0)?' - Trang '.($page+1):'';?>" itemprop="url"><span itemprop="title"><?php echo $tag['title'];?></span></a>
						</h1>
					</li>
				</ul>
			</div>
			<div class="container">
				<div class="category-social">
					<div class="button"><div class="fb-like" data-href="<?php echo isset($canonical)?$canonical:'';?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div></div>
					<div class="button"><div class="fb-share-button" data-href="<?php echo isset($canonical)?$canonical:'';?>" data-type="button_count"></div></div>
					<div class="button"><div class="g-plus" data-action="share" data-annotation="bubble"></div></div>
					<div class="button"><div class="g-plusone" data-size="medium"></div></div>
					<div class="news-clear"></div>
				</div><!-- .social -->
				<?php if(isset($list) && count($list)){ foreach($list as $key => $val){ ?>
					<div class="main">
						<div class="thumb"><img src="<?php echo $val['image'];?>" title="<?php echo htmlspecialchars($val['title']);?>" alt="<?php echo htmlspecialchars($val['title']);?>" /></div>
						<h2 class="title"><a href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX;?>" title="<?php echo htmlspecialchars($val['title']);?>"><?php echo $val['title'];?></a></h2>
						<?php $cat = helper_module_get_category_info('articles_category', $val['parentid']);?>
						<div class="info"><a rel="nofollow" href="<?php echo helper_string_alias($cat['title']).'-c'.$cat['id'].CMS_SUFFIX;?>" title="<?php echo htmlspecialchars($cat['title']);?>"><?php echo $cat['title'];?></a><span> | Đăng ngày <?php $time = ($val['updated'] != '0000-00-00 00:00:00')?$val['updated']:$val['created']; echo gmdate('d/m/Y - h:i A', strtotime($time) + 7*3600)?> | Lượt xem: <?php echo $val['viewed'];?></span></div>
						<p class="content"><?php echo helper_string_cutnchar(strip_tags($val['description']), 200);?></p>
						<div class="news-clear"></div>
					</div>
				<?php } } else { ?>
				<div class="empty-list"><p>Hiện tại không có bài viết trong chuyên mục này!</p></div><!-- .empty-list -->
				<?php } ?>
				<?php echo (isset($pagination) && count($pagination) > 1)?'<div class="pagination">'.helper_string_pagination_frontend($pagination, $total_rows).'<div class="news-clear"></div></div><!-- .pagination -->':'';?>
				<div class="news-clear"></div>
			</div>
		</div><!-- .block -->
	</div><!-- .vv-left -->
	<div class="vv-right">
		<?php $this->load->view('frontend/right');?>
	</div><!-- .vv-right -->
	<div class="news-clear"></div>
	<?php $this->load->view('frontend/grouplink-partners');?>
	<div class="news-clear"></div>
</div><!-- .vv-container -->