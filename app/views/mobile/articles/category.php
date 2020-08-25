<!-- CONTENT CONTAINER -->
<div class="content-container">

	<h1 class="page-title"><?=$category['title']?></h1>

	<!-- Blog List -->
	<ol class="blog-list">
<?php if(isset($list) && count($list)){ foreach($list as $key => $val){ ?>		
		<li><!-- Blog list item #1 -->
		<a href="<?=helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX?>" title="<?=$val['title']?>">
			<div class="entry-thumb">
				<img src="<?=helper_string_image(240,240,$val['image'])?>" alt="">
			</div>
			<div class="entry-content">
				<h2><?=$val['title']?></h2>
			</div>
		</a>
		</li>
<?php } }?>
		

	</ol>
	<!-- End Blog List -->

	<div class="clear"></div><!-- Use this class (.clear) to clearing float -->

	

</div>
<!-- END CONTENT CONTAINER -->