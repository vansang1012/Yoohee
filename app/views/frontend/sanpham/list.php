<link href="template/frontend/style.css" rel="stylesheet">
<!-- /header -->
        <section class="breadcrumb-section type2 parallax-window"  style="background: transparent;">
    <div class="breadcrumb">
        <div class="container">
            <div id="breadcrumbs">
            	<span typeof="v:Breadcrumb"><a href="<?=CMS_URL?>" property="v:title">Trang chủ</a> » 
            	<span class="breadcrumb_last"><?=$category['title']?></span>
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
                    <div class="entry-title"><?=$category['title']?></div>
                    <ul class="list_category">
<?php $list=$this->db->select('*')->from('sanpham_category')->where(array('publish'=>1))->order_by('order asc')->get()->result_array();?>
<?php if(isset($list) && count($list)){ foreach($list as $key => $val){ ?>
                                            <li class="rpwe-li rpwe-clearfix">
                            <a class="rpwe-img" href="<?=helper_string_alias($val['title']).'-ap'.$val['id'].CMS_SUFFIX?>" rel="bookmark"><img src="<?=helper_string_image(200,160,$val['image'])?>" alt="" class="img-responsive"></a>
                            <h3 class="rpwe-title"><a href="<?=helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX?>" rel="bookmark"><?=$val['title']?></a></h3>
                            <?=$val['description']?>
                            <time class="rpwe-time published">Ngày <?php $time = ($val['updated'] != '0000-00-00 00:00:00')?$val['updated']:$val['created']; echo gmdate('d/m/Y', strtotime($time) + 7*3600)?></time>
                        </li>
<?php } }else{echo 'Đang Cập Nhật';}?>
                                            
                                        </ul>
<style>
.pagination ul li{
	display: inline-block;
    padding: 10px;
    background: bisque;
    font-weight: bold;
}
</style>
                    <div class="pagination-wrapper">
						<?php echo (isset($pagination) && count($pagination) > 1)?'<div class="pagination">'.helper_string_pagination_frontend($pagination, $total_rows).'</div><!-- .pagination -->':'';?>
                    </div>
                </div>
            </div>
             <!-- Right-sidebar -->
            <div class="col-md-4">
                <div id="right-sidebar">
                    <aside id="rpwe_widget-2" class="widget rpwe_widget recent-posts-extended">
                        <h3 class="widget-title"><span>Tin mới</span></h3>
                        <div class="rpwe-block ">
                            <ul class="rpwe-ul">
<?php $articles=$this->db->select('*')->from('articles_item')->where(array('publish'=>1))->order_by('id desc')->limit(5)->get()->result_array();?>
<?php if(isset($articles) && count($articles)){foreach($articles as $key =>$val){?>
                                <li class="rpwe-li rpwe-clearfix">
                                    <a class="rpwe-img" href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX;?>" rel="bookmark"><img src="<?=helper_string_image(100,60,$val['image'])?>" alt="" class="img-responsive"></a>
                                    <h3 class="rpwe-title"><a href="<?php echo helper_string_alias($val['title']).'-a'.$val['id'].CMS_SUFFIX;?>" rel="bookmark"><?=$val['title']?></a></h3>
                                    <time class="rpwe-time published">Ngày <?php $time = ($val['updated'] != '0000-00-00 00:00:00')?$val['updated']:$val['created']; echo gmdate('d/m/Y', strtotime($time) + 7*3600)?></time>
                                </li>
<?php }} ?>
                            </ul>
                        </div>
                    </aside>
                    <aside>
                        <h3 class="widget-title"><span>Fanpage</span></h3>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=<?=$this->system['facebook']?>&tabs=timeline&width=340&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1853719868280979" width="340" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    </aside>
                   
                </div>
            </div>
            <!-- Right-sidebar -->
        </div>
    </div>
</div>
