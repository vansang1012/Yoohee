<div class="vv-support-fixed">
	<h3>Hotline đặt vé</h3>
	<?php
	$list = helper_module_list_category('support_category', array('parentid' => 1), 'order asc', 2);
	if(isset($list) && count($list)){
		foreach($list as $keyMain => $valMain){
			echo '<ul class="hotline">';
			echo '<li class="title">'.$valMain['title'].'</li>';
			$item = helper_module_list_item('support_item', 'phone', array('parentid' => $valMain['id']), 'order asc', 10);
			if(isset($item) && count($item)){
				foreach($item as $keyItem => $valItem){
					if(empty($valItem['phone'])) continue;
					echo '<li>'.$valItem['phone'].'</li>';
				}
			}
			echo '</ul>';
		}
	}
	?>
	<p class="link"><a href="#">Hướng dẫn đặt vé</a></p>
	<p class="link"><a href="#">Hướng dẫn đặt vé</a></p>
</div><!-- .vv-support-fixed -->

<script type="text/javascript" src="template/frontend/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="template/frontend/plugins/jcarousellite/jcarousellite_1.0.1.min.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=214678972067158";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
window.___gcfg = {lang: 'vi'};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/plusone.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>