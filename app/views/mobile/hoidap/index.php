<!-- /header -->
<?php if(helper_mobile()==false){?>
        <section class="breadcrumb-section type2 parallax-window" data-parallax="scroll" data-speed="0.3" data-image-src="template/frontend/images/bg_s1.png" style="background: transparent;">
    <div class="breadcrumb">
        <div class="container">
            <div id="breadcrumbs">
            	<span typeof="v:Breadcrumb"><a href="<?=CMS_URL?>" property="v:title">Trang chủ</a> » 
            	<span class="breadcrumb_last">Hỏi đáp cùng chuyên gia</span>
            </div>
        </div>
    </div>
</section>    
<?php }?>
<?php if(helper_mobile()==true){?>
    <div class="breadcrumb">
        <div class="container">
            <div id="breadcrumbs">
            	<span typeof="v:Breadcrumb"><a href="<?=CMS_URL?>" property="v:title">Trang chủ</a> » 
            	<span class="breadcrumb_last">Hỏi đáp cùng chuyên gia</span>
            </div>
        </div>
    </div>   
<?php }?>
<!-- Noi dung chinh-->
<div id="content-single" class="wrapper-content hoidap">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content-single">
                    <div class="entry-title">Hỏi đáp</div>
                    <div class="row">
                        <div class="col-xs-12">
                            <section class="chuyengia" id="chuyengia">
                                <h3 class="textcenter">HỎI ĐÁP CHUYÊN GIA</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box_chuyengia left">
                                            <img src="upload/images/2017/04/jwDqEsA-1492143447.png" class="img-responsive">
                                            
                                            <div class="clearfix"></div>
                                            <span class="name"></span>
                                            <div class="box_chucvu">
                                                    <ul>
														<li>GS Lê Văn Thảo</li>
                                                        <li>Phó Chủ tịch thường trực Hội Ung Thư Hà Nội</li>
                                                        <li>Nguyên Giám đốc Bệnh viện Ung Bướu Hà Nội</li>
                                                    </ul>
                                            </div>
                                        </div>
                                    </div>
                                                    <div class="col-md-6">
                                        <div class="box_chuyengia right">
                                            <img src="upload/images/2017/04/NFlMb5q-1492143518.png" class="img-responsive">
                                            
                                            <div class="clearfix"></div>
                                            <span class="name"></span>
                                            <div class="box_chucvu">
                                                    <ul>
														<li>PGS.TS Thu Hồ</li>
                                                        <li>Nguyên Phó chủ tịch Hội khoa học Tiêu hóa Việt Nam</li>
                                                        <li>Chủ tịch hội Tiêu hóa Hà Nội</li>
                                                       
                                                    </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>                             
                        <div class="col-xs-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php if(isset($list) && count($list)){foreach($list as $key =>$val){?>							
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne" style="color: #000;background: #fff;">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#cauhoi<?=$key+1?>" aria-expanded="true" aria-controls="cauhoi1"><?=$val['notes']?></a>
                                        </h4>
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#cauhoi<?=$key+1?>" aria-expanded="true" aria-controls="cauhoi1" style="color:#000; font-size: 120%; text-decoration: underline; display: block;   width: 100%;    text-align: right;">Xem trả lời ...</a>

                                    </div>
                                    <div id="cauhoi<?=$key+1?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <?=$val['traloi']?></div>
                                    </div>
                                </div>
<?php }} ?>								
                                                        </div>
                        </div>
<style>
.pagination ul li{
	display: inline-block;
    padding: 10px;
    background: #fff;
}
</style>						
						<div class="pagination-wrapper">
						<?php echo (isset($pagination) && count($pagination) > 1)?'<div class="pagination">'.helper_string_pagination_frontend($pagination, $total_rows).'</div><!-- .pagination -->':'';?>
                    </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="fb-comments" data-href="<?=CMS_URL?>hoi-dap-cung-chuyen-gia.html" data-colorscheme="light" data-numposts="5" data-width="100%"></div>
                </div>
            </div>
            <!-- Right-sidebar -->
            <div class="col-md-4">
                <div id="right-sidebar">
					 <aside>
                        <h3 class="widget-title"><span>Gửi câu hỏi</span></h3>
                        <div class="HoidapForm">
                                <form action="" method="post">
<div class="form-group field-hoidapform-name required">
<label class="control-label" for="hoidapform-name">Họ tên</label>
<input type="text" class="form-control" name="fullname">

<div class="help-block"></div>
</div>                                <div class="form-group field-hoidapform-phone required">
<label class="control-label" for="hoidapform-phone">Số điện thoại</label>
<input type="text" class="form-control" name="phone" >

<div class="help-block"></div>
</div>                                <div class="form-group field-hoidapform-email required">
<label class="control-label" for="hoidapform-email">Email</label>
<input type="text"  class="form-control" name="email" >

<div class="help-block"></div>
</div>                                <div class="form-group field-hoidapform-noidung required">
<label class="control-label" for="hoidapform-noidung">Nội dung</label>
<textarea  class="form-control" name="notes" rows="6" ></textarea>

<div class="help-block"></div>
</div>                                       

<div class="form-group">
                                    <button type="submit" name="guicauhoi" class="btn btn-primary">Gửi câu hỏi</button>                                </div>
                                </form>                            </div><!-- HoidapForm -->
                    </aside>
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
                        <div class="fb-page" data-href="https://www.facebook.com/FacebookVietnam" data-tabs="timeline" data-width="500" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/FacebookVietnam" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/FacebookVietnam">Curmin Lead -  Dập tắt cơn đau dạ dày sau 2 tuần</a></blockquote></div>
                    </aside>
                   
                </div>
            </div>
            <!-- Right-sidebar -->
        </div>
    </div>
</div>
