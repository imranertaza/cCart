<div class="row">
    <?php
        $themeSetting      = get_theme_settings();
        $themeSettingTitle = get_theme_title_settings();
        $themeAtlName      = getThemeAltNameSettings();
    ?>
    <div class="col-md-6">
        <form action="<?php echo base_url('admin/slider_update_four') ?>" method="post"
              enctype="multipart/form-data">
            <div class="form-group mt-5">
                <?= image_view('uploads/slider', '', $themeSetting['slider4_1'], 'noimage.png', 'width-full-100'); ?>
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['slider4_1'];?></label>
                <input type="file" name="slider" class="form-control" >
                <input type="hidden" name="nameslider" class="form-control"
                       value="slider4_1" required>
                <small>Size: <?php echo $theme_libraries->slider_width; ?> x <?php echo $theme_libraries->slider_height; ?></small>
            </div>

            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?= $themeAtlName['slider4_1']?>" >
            </div>

            <div class="form-group">
                <label><?= $themeSettingTitle['slider4_text_1'];?></label>
                <input type="text" name="title" class="form-control" placeholder="Slider Text" value="<?= $themeSetting['slider4_text_1']?>" >
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['slider4_sub_text_1'];?></label>
                <input type="text" name="subTitle" class="form-control" placeholder="Slider Short Text" value="<?= $themeSetting['slider4_sub_text_1']?>" >
                <input type="hidden" name="suk" class="form-control" value="1" >
            </div>
            <div class="form-group ">
                <label><?= $themeSettingTitle['slider4_category_1'];?> </label>
                <select name="category" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (get_array_data_by_id('cc_product_category', 'status', '1') as $cat) { ?>
                        <option value="<?php echo $cat->prod_cat_id; ?>" <?= ($cat->prod_cat_id == $themeSetting['slider4_category_1'])?'selected':'';?>><?php echo display_category_with_parent($cat->prod_cat_id); ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <form action="<?php echo base_url('admin/slider_update_four') ?>" method="post"
              enctype="multipart/form-data">
            <div class="form-group mt-5">
                <?= image_view('uploads/slider', '', $themeSetting['slider4_3'], 'noimage.png', 'width-full-100'); ?>
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['slider4_3'];?></label>
                <input type="file" name="slider" class="form-control" >
                <input type="hidden" name="nameslider" class="form-control"
                       value="slider4_3" required>
                <small>Size: <?php echo $theme_libraries->slider_width; ?> x <?php echo $theme_libraries->slider_height; ?></small>
            </div>

            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?= $themeAtlName['slider4_3']?>" >
            </div>

            <div class="form-group">
                <label><?= $themeSettingTitle['slider4_text_1'];?></label>
                <input type="text" name="title" class="form-control" placeholder="Slider Text" value="<?= $themeSetting['slider4_text_3']?>" >
                <input type="hidden" name="suk" class="form-control" value="3" >
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['slider4_sub_text_3'];?></label>
                <input type="text" name="subTitle" class="form-control" placeholder="Slider Short Text" value="<?= $themeSetting['slider4_sub_text_3']?>" >
            </div>
            <div class="form-group ">
                <label><?= $themeSettingTitle['slider4_category_3'];?> </label>
                <select name="category" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (get_array_data_by_id('cc_product_category', 'status', '1') as $cat) { ?>
                        <option value="<?php echo $cat->prod_cat_id; ?>" <?= ($cat->prod_cat_id == $themeSetting['slider4_category_3'])?'selected':'';?>><?php echo display_category_with_parent($cat->prod_cat_id); ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <div class="col-md-6">
        <form action="<?php echo base_url('admin/slider_update_four') ?>" method="post"
              enctype="multipart/form-data">
            <div class="form-group mt-5">
                <?= image_view('uploads/slider', '', $themeSetting['slider4_2'], 'noimage.png', 'width-full-100'); ?>
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['slider4_2'];?></label>
                <input type="file" name="slider" class="form-control" >
                <input type="hidden" name="nameslider" class="form-control"
                       value="slider4_2" required>
                <small>Size: <?php echo $theme_libraries->slider_width; ?> x <?php echo $theme_libraries->slider_height; ?></small>
            </div>

            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?= $themeAtlName['slider4_2']?>" >
            </div>

            <div class="form-group">
                <label><?= $themeSettingTitle['slider4_text_2'];?></label>
                <input type="text" name="title" class="form-control" placeholder="Slider Text" value="<?= $themeSetting['slider4_text_2']?>" >
                <input type="hidden" name="suk" class="form-control" value="2" >
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['slider4_sub_text_2'];?></label>
                <input type="text" name="subTitle" class="form-control" placeholder="Slider Short Text" value="<?= $themeSetting['slider4_sub_text_2']?>" >
            </div>
            <div class="form-group ">
                <label><?= $themeSettingTitle['slider4_category_2'];?> </label>
                <select name="category" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (get_array_data_by_id('cc_product_category', 'status', '1') as $cat) { ?>
                        <option value="<?php echo $cat->prod_cat_id; ?>" <?= ($cat->prod_cat_id == $themeSetting['slider4_category_2'])?'selected':'';?>><?php echo display_category_with_parent($cat->prod_cat_id); ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
