<div class="banner_hd">
      <li id="media_image-2" class="widget widget_media_image">
        <?php if(strlen($category['image']) > 10) { ?>
        <img width="1599" height="262" src="<?php echo $category['image']; ?>" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
        <?php } else { ?>
        <img width="1599" height="262" src="upload/image/bannerhd.jpg" class="image wp-image-1104  attachment-full size-full" alt="" style="max-width: 100%; height: auto;"  sizes="(max-width: 1599px) 100vw, 1599px" />
        <?php } ?>
      </li>
    </div>
<main id="main" class="">

    <div id="content" class="blog-wrapper blog-archive project-archive page-wrapper">
        <div class="new_ph row">
            <div class="new_ph_center">
                    <div class="new-list">
                        <h1 class="heading"><span><?php echo $category['title']; ?></span></h1>

                            
                            <?php if(isset($list) && count($list)){ foreach ($list as $key => $value) {?>
                              
                             <div class="new-list-post col">
                                <div>
                                    <div class="post-image">
                                        <a href="<?php echo helper_string_alias($value['title']).'-a'.$value['id'].CMS_SUFFIX; ?>" title="<?php echo $value['title']; ?>">
                                            <img width="555" height="270" src="<?php echo helper_string_image(800,600,$value['image']); ?>"  class="lazy-load attachment-full size-full wp-post-image" alt="<?php echo $value['title']; ?>" />                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3><a class="title" href="<?php echo helper_string_alias($value['title']).'-a'.$value['id'].CMS_SUFFIX; ?>" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a></h3>
                                        <p><?php echo helper_string_cutnchar(strip_tags($value['description']),200); ?></p>
</p>
                                    </div>
                                </div>
                            </div>
                        <?php }} ?>

                    <div class="row">
                        <div class="col-12">
                          <?php if(isset($pagination) && !empty($pagination) && count($pagination)){ ?>
                          <div class="pagination-wrap text-center">
                              <?php echo helper_string_pagination_frontend($pagination, $total_rows, 'Trang'); ?>
                              <div class="clear-both"></div>
                          </div>
                          <?php } ?>
                            
                        </div>
                    </div>
                             
                </div>
            </div>
        </div>
    </div>


</main><!-- #main -->