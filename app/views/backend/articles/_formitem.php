<form method="post" action="">
<div class="panel-main">
    <div class="block">
        <div class="main-title"><p>Thông tin bài viết</p></div>
        <div class="main-container">
            <table cellspacing="0" cellpadding="0" class="form">
                <?php
                $error = validation_errors();
                echo isset($error)?'<tr><td colspan="2"><ul class="cms-error">'.$error.'</ul></td></tr>':'';
                ?>
                <tr>
                    <td class="label"><label for="txtTitle">Tiêu đề</label></td>
                    <td class="content" style="padding: 0px 0px 10px 0px;">
                        <input type="text" name="data[title]" class="text" id="txtTitle" onkeyup="ChangeToSlug();" value="<?php echo (isset($post_data['title'])?$post_data['title']:'');?>" />
                    </td>
                </tr>

                <tr>
                    <td class="label"><label for="txtSlug">Slug</label></td>
                    <td class="content" style="padding: 0px 0px 10px 0px;">
                        <input type="text" name="data[slug]" class="text" id="txtSlug" value="<?php echo (isset($post_data['slug'])?$post_data['slug']:'');?>" />
                    </td>
                </tr>
                <tr>
                    <td class="label"><label for="txtTitle_korea">Tiêu đề tiếng Hàn</label></td>
                    <td class="content" style="padding: 0px 0px 10px 0px;">
                        <input type="text" name="data[title_korea]" class="text" id="txtTitle_korea" onkeyup="ChangeToSlug();" value="<?php echo (isset($post_data['title_korea'])?$post_data['title_korea']:'');?>" />
                    </td>
                </tr>
                <script type="text/javascript">
                    function ChangeToSlug()
                        {
                            var title, slug;
                         
                            //Lấy text từ thẻ input title
                            title = document.getElementById("txtTitle").value;
                         
                            //Đổi chữ hoa thành chữ thường
                            slug = title.toLowerCase();
                         
                            //Đổi ký tự có dấu thành không dấu
                            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                            slug = slug.replace(/đ/gi, 'd');
                            //Xóa các ký tự đặt biệt
                            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                            //Đổi khoảng trắng thành ký tự gạch ngang
                            slug = slug.replace(/ /gi, "-");
                            slug = slug.replace(/  /gi, "-");
                            slug = slug.replace(/   /gi, "-");
                            slug = slug.replace(/    /gi, "-");
                            slug = slug.replace(/     /gi, "-");
                            slug = slug.replace(/      /gi, "-");
                            slug = slug.replace(/       /gi, "-");
                            slug = slug.replace(/        /gi, "-");
                            slug = slug.replace(/         /gi, "-");
                            slug = slug.replace(/          /gi, "-");
                            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                            slug = slug.replace(/\-\-\-\-\-/gi, '-');
                            slug = slug.replace(/\-\-\-\-/gi, '-');
                            slug = slug.replace(/\-\-\-/gi, '-');
                            slug = slug.replace(/\-\-/gi, '-');
                            //Xóa các ký tự gạch ngang ở đầu và cuối
                            slug = '@' + slug + '@';
                            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                            //In slug ra textbox có id “slug”
                            document.getElementById('txtSlug').value = slug;
                        }
                </script>
                <tr>
                    <td class="label"><label for="txtParentid">Danh mục cha</label></td>
                    <td class="content" style="padding: 0px 0px 10px 0px;">
                        <?php echo form_dropdown('data[parentid]', (isset($show_data['parentid'])?$show_data['parentid']:NULL), (isset($post_data['parentid'])?(int)$post_data['parentid']:0),' id="txtParentid" class="select"');?>
                    </td>
                </tr>
                <tr>
                    <td class="label"><label for="txtImage">Hình ảnh</label></td>
                    <td class="content" style="padding: 0px 0px 10px 0px;">
                        <input type="text" name="data[image]" class="text" id="txtImage" value="<?php echo (isset($post_data['image'])?$post_data['image']:'');?>" />
                        <input type="button" value="Chọn ảnh" class="button" onclick="browseKCFinder('txtImage', 'image')"/>

                    </td>
                </tr>
                <tr>
                        <td class="label">
                            <label for="txtIcon">Icon</label>
                        </td>
                        <td class="content" style="padding: 0px 0px 10px 0px;">
                            <input type="text" name="data[icon]" class="text" id="txtIcon" value="<?php echo (isset($post_data['icon'])?$post_data['icon']:'');?>" />
                            <input type="button" value="Chọn Icon" class="button" onclick="browseKCFinder('txtImage', 'image')" /> </td>
                    </tr>
                <tr>
                    <td class="label"><label for="txtTags">Tags</label></td>
                    <td class="content" style="padding: 0px 0px 10px 0px;position: relative;">
                        <input type="text" name="data[tags]" class="text" id="txtTags" value="<?php echo (isset($post_data['tags'])?$post_data['tags']:'');?>" style="width: 611px;" />
                        <input type="button" value="Gợi ý chủ đề" class="button" id="cms-tags-suggest-button"/>
                        <div id="tagspicker-suggest"></div>
                    </td>
                </tr>
                <tr>
                    <td class="label"><label for="txtDescription">Mô tả ngắn</label></td>
                    <td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[description]" class="textarea wysiwygEditor" id="txtDescription" style="height:168px;"><?php echo (isset($post_data['description'])?htmlspecialchars($post_data['description']):'');?></textarea></td>
                </tr>
                <tr>
                    <td class="label"><label for="txtContent">Nội dung chi tiết</label></td>
                    <td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[content]" class="textarea wysiwygEditor" id="txtContent" style="height:268px;"><?php echo (isset($post_data['content'])?htmlspecialchars($post_data['content']):'');?></textarea></td>
                </tr>
                <tr>
                    <td class="label"><label for="txtTitle">Thao tác</label></td>
                    <td class="content">
                        <?php echo isset($button_action)?$button_action:'';?>
                        <input type="reset" value="Thực hiện lại" class="button" />
                    </td>
                </tr>
            </table>
        </div><!-- .main-container -->
        <div class="cms-clear"></div>
    </div><!-- .block -->
    <div class="cms-clear"></div>
</div><!-- .panel-main -->
<div class="panel-info">
    <div class="block">
        <div class="main-title"><p>Tùy chọn</p></div>
        <div class="main-container">
            <table cellspacing="0" cellpadding="0" class="form">
                <tr>
                    <td class="label label-option"><label for="">Xuất bản</label></td>
                    <td class="content" style="padding: 0px 0px 0px 0px;">
                        <input type="radio" name="data[publish]" value="0" class="radio" id="rbPublish_0" <?php echo ((isset($post_data['publish']) && $post_data['publish'] == 0)?'checked':'');?>/><label for="rbPublish_0">Không</label>
                        <input type="radio" name="data[publish]" value="1" class="radio" id="rbPublish_1" <?php echo ((isset($post_data['publish']) && $post_data['publish'] == 1)?'checked':'');?>/><label for="rbPublish_1">Có</label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="cms-clear"></div>
    </div><!-- .block -->
    <div class="block">
        <div class="main-title"><p>Ngày đăng bài viết</p></div>
        <div class="main-container">
            <table cellspacing="0" cellpadding="0" class="form">
                <tr>
                    <td class="content">
                        <input type="date" name="data[created]" class="text" id="txtDate" value="<?php echo (isset($post_data['created'])?date('Y-m-d',strtotime($post_data['created'])):date('Y-m-d',time()));?>" />
                    </td>
                </tr>
                
            </table>
        </div>
        <div class="cms-clear"></div>
    </div><!-- .block -->
    <div class="block">
        <div class="main-title"><p>Meta</p></div>
        <div class="main-container">
            <table cellspacing="0" cellpadding="0" class="form">
                <tr>
                    <td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtMetaTitle">Meta Title</label></td>
                </tr>
                <tr>
                    <td class="content" style="padding: 0px 0px 10px 0px;"><input type="text" name="data[meta_title]" class="text" id="txtMetaTitle" value="<?php echo (isset($post_data['meta_title'])?$post_data['meta_title']:'');?>" /></td>
                </tr>
                <tr>
                    <td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtMetaKeyword">Meta Keyword</label></td>
                </tr>
                <tr>
                    <td class="content" style="padding: 0px 0px 10px 0px;"><textarea name="data[meta_keyword]" class="textarea" id="txtMetaKeyword" style="height: 28px;"><?php echo (isset($post_data['meta_keyword'])?$post_data['meta_keyword']:'');?></textarea></td>
                </tr>
                <tr>
                    <td class="label" style="padding: 0px 0px 5px 0px;"><label for="txtMetaDescription">Meta Description</label></td>
                </tr>
                <tr>
                    <td class="content"><textarea name="data[meta_description]" class="textarea" id="txtMetaDescription"><?php echo (isset($post_data['meta_description'])?$post_data['meta_description']:'');?></textarea></td>
                </tr>
            </table>
        </div>
        <div class="cms-clear"></div>
    </div><!-- .block -->
    <div class="cms-clear"></div>
</div><!-- .panel-info -->
</form>