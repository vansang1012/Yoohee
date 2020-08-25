<!-- /header -->
        <section class="breadcrumb-section type2 parallax-window" data-parallax="scroll" data-speed="0.3" data-image-src="template/frontend/images/bg_s1.png" style="background: transparent;">
    <div class="breadcrumb">
        <div class="container">
            <div id="breadcrumbs">
            	<span typeof="v:Breadcrumb"><a href="<?=CMS_URL?>" property="v:title">Trang chủ</a> » 
            	<span class="breadcrumb_last">Trải nghiệm người dùng</span>
            </div>
        </div>
    </div>
</section>    
<!-- Noi dung chinh-->
<div  class="wrapper-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content-page">
                    <div class="entry-title"><?=$item['fullname']?></div>
				<?=$item['content']?>
				<div class="fb-comments" data-href="<?=CMS_URL.helper_string_alias($item['fullname']).'-t'.$item['id'].CMS_SUFFIX?>" data-colorscheme="light" data-numposts="5" data-width="100%"></div>
                </div>
            </div>
            <!-- Right-sidebar -->
            <div class="col-md-4">
                <div id="right-sidebar">
                    <aside id="rpwe_widget-2" class="widget rpwe_widget recent-posts-extended">
                        <h3 class="widget-title"><span>Tin nổi bật</span></h3>
                        <div class="rpwe-block ">
                            <ul class="rpwe-ul">
<?php $articles=$this->db->select('*')->from('articles_item')->where(array('publish'=>1,'highlight'=>1))->order_by('order asc')->limit(4)->get()->result_array();?>
<?php if(isset($articles) && count($articles)){foreach($articles as $key =>$val){?>
                                <li class="rpwe-li rpwe-clearfix">
                                    <a class="rpwe-img" href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX;?>" rel="bookmark"><img src="<?=$val['image']?>" alt="" class="img-responsive"></a>
                                    <h3 class="rpwe-title"><a href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX;?>" rel="bookmark"><?=$val['title']?></a></h3>
                                    <time class="rpwe-time published">Ngày <?php $time = ($val['updated'] != '0000-00-00 00:00:00')?$val['updated']:$val['created']; echo gmdate('d/m/Y', strtotime($time) + 7*3600)?></time>
                                </li>
<?php }} ?>
                            </ul>
                        </div>
                    </aside>
                    <aside>
                        <h3 class="widget-title"><span>Fanpage</span></h3>
                        <div class="fb-page" data-href="https://www.facebook.com/FacebookVietnam/?fref=ts" data-tabs="timeline" data-width="500" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/FacebookVietnam/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/FacebookVietnam/?fref=ts">Curmin Lead -  Dập tắt cơn đau dạ dày sau 2 tuần</a></blockquote></div>
                    </aside>
                   
                </div>
            </div>
            <!-- Right-sidebar -->
        </div>
    </div>
</div>
