<?php
    $themeSetting      = get_theme_settings();
    $themeSettingTitle = get_theme_title_settings();
    $themeAtlName      = getThemeAltNameSettings();
    $cat               = get_all_data_array('cc_product_category');

?>

<div class="row">
    <div class="col-md-6 mt-4 card">
        <form  action="<?= base_url('admin/top_category_section_one_update') ?>" method="post" enctype="multipart/form-data" >
            <?= csrf_field() ?>
            <h3>Top Category One</h3>
            <div class="form-group">
                <label><?= $themeSettingTitle['top_category_left_title'];?> </label>
                <input type="text" class="form-control"  name="top_category_left_title" value="<?= $themeSetting['top_category_left_title'];?>">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['top_category_left_sub_title'];?> </label>
                <textarea class="form-control"  name="top_category_left_sub_title"><?= $themeSetting['top_category_left_sub_title'];?></textarea>
            </div>
            <div class="form-group ">
                <label><?= $themeSettingTitle['top_category_left_category'];?> </label>
                <select name="top_category_left_category" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (get_array_data_by_id('cc_product_category', 'status', '1') as $cat) { ?>
                        <option value="<?php echo $cat->prod_cat_id; ?>" <?= ($cat->prod_cat_id == $themeSetting['top_category_left_category']) ? 'selected' : '';?>><?php echo display_category_with_parent($cat->prod_cat_id); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <img src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['top_category_left_image'], 'noimage.png', '546', '162')?>" alt="<?= $themeAtlName['top_category_left_image']?>" class="w-100">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['top_category_left_image'];?> </label>
                <input type="file" class="form-control"  name="top_category_left_image" >
            </div>
            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?php echo $themeAtlName['top_category_left_image']; ?>" >
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>

    <div class="col-md-6 mt-4 card">
        <form  action="<?= base_url('admin/top_category_section_two_update') ?>" method="post" enctype="multipart/form-data" >
            <?= csrf_field() ?>
            <h3>Top Category Two</h3>
            <div class="form-group">
                <label><?= $themeSettingTitle['top_category_right_title'];?> </label>
                <input type="text" class="form-control"  name="top_category_right_title" value="<?= $themeSetting['top_category_right_title'];?>">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['top_category_right_sub_title'];?> </label>
                <textarea class="form-control"  name="top_category_right_sub_title"><?= $themeSetting['top_category_right_sub_title'];?></textarea>
            </div>
            <div class="form-group ">
                <label><?= $themeSettingTitle['top_category_right_category'];?> </label>
                <select name="top_category_right_category" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (get_array_data_by_id('cc_product_category', 'status', '1') as $cat) { ?>
                        <option value="<?php echo $cat->prod_cat_id; ?>" <?= ($cat->prod_cat_id == $themeSetting['top_category_right_category']) ? 'selected' : '';?>><?php echo display_category_with_parent($cat->prod_cat_id); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <img src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['top_category_right_image'], 'noimage.png', '546', '162')?>" alt="<?= $themeAtlName['top_category_right_image']?>" class="w-100">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['top_category_right_image'];?> </label>
                <input type="file" class="form-control"  name="top_category_right_image" >
            </div>
            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?php echo $themeAtlName['top_category_right_image']; ?>" >
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <div class="col-md-6 mt-4 card">
        <form  action="<?= base_url('admin/home_section_one_update') ?>" method="post" enctype="multipart/form-data" >
            <?= csrf_field() ?>
            <h3>Section One</h3>
            <div class="form-group">
                <label><?= $themeSettingTitle['section_one_title'];?> </label>
                <input type="text" class="form-control"  name="section_one_title" value="<?= $themeSetting['section_one_title'];?>">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['section_one_sub_title'];?> </label>
                <textarea class="form-control"  name="section_one_sub_title"><?= $themeSetting['section_one_sub_title'];?></textarea>
            </div>
            <div class="form-group ">
                <label><?= $themeSettingTitle['section_one_category'];?> </label>
                <select name="section_one_category" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (get_array_data_by_id('cc_product_category', 'status', '1') as $cat) { ?>
                        <option value="<?php echo $cat->prod_cat_id; ?>" <?= ($cat->prod_cat_id == $themeSetting['section_one_category']) ? 'selected' : '';?>><?php echo display_category_with_parent($cat->prod_cat_id); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <img src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_one_image'], 'noimage.png', '1116', '177')?>" alt="<?= $themeAtlName['section_one_image']?>" class="w-100">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['section_one_image'];?> </label>
                <input type="file" class="form-control"  name="section_one_image" >
            </div>
            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?php echo $themeAtlName['section_one_image']; ?>" >
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <div class="col-md-6 mt-4 card">
        <form  action="<?= base_url('admin/home_section_two_update') ?>" method="post" enctype="multipart/form-data" >
            <?= csrf_field() ?>
            <h3>Section Two</h3>
            <div class="form-group">
                <label><?= $themeSettingTitle['section_two_title'];?> </label>
                <input type="text" class="form-control"  name="section_two_title" value="<?= $themeSetting['section_two_title'];?>">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['section_two_sub_title'];?> </label>
                <textarea class="form-control"  name="section_two_sub_title"><?= $themeSetting['section_two_sub_title'];?></textarea>
            </div>
            <div class="form-group ">
                <label><?= $themeSettingTitle['section_two_category'];?> </label>
                <select name="section_two_category" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (get_array_data_by_id('cc_product_category', 'status', '1') as $cat) { ?>
                        <option value="<?php echo $cat->prod_cat_id; ?>" <?= ($cat->prod_cat_id == $themeSetting['section_two_category']) ? 'selected' : '';?>><?php echo display_category_with_parent($cat->prod_cat_id); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <img src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_two_image'], 'noimage.png', '1116', '177')?>" alt="<?= $themeAtlName['section_two_image']?>" class="w-100">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['section_two_image'];?> </label>
                <input type="file" class="form-control"  name="section_two_image" >
            </div>
            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?php echo $themeAtlName['section_two_image']; ?>" >
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


    <div class="col-md-6 mt-4 card">
        <form action="<?= base_url('admin/recent_product_update') ?>" method="post" enctype="multipart/form-data" >
            <?= csrf_field() ?>
            <h3>Recent Product</h3>
            <div class="form-group">
                <label><?= $themeSettingTitle['recent_product_title'];?> </label>
                <input type="text" class="form-control"  name="recent_product_title" value="<?= $themeSetting['recent_product_title'];?>">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['recent_product_sub_title'];?> </label>
                <textarea class="form-control"  name="recent_product_sub_title"><?= $themeSetting['recent_product_sub_title'];?></textarea>
            </div>
            <div class="form-group ">
                <label><?= $themeSettingTitle['recent_product_category'];?> </label>
                <select name="recent_product_category" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (get_array_data_by_id('cc_product_category', 'status', '1') as $cat) { ?>
                        <option value="<?php echo $cat->prod_cat_id; ?>" <?= ($cat->prod_cat_id == $themeSetting['recent_product_category']) ? 'selected' : '';?>><?php echo display_category_with_parent($cat->prod_cat_id); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <img src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['recent_product_image'], 'noimage.png', '361', '480')?>" alt="<?= $themeAtlName['recent_product_image']?>" class="">
            </div>
            <div class="form-group">
                <label><?= $themeSettingTitle['recent_product_image'];?> </label>
                <input type="file" class="form-control"  name="recent_product_image" >
            </div>
            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?php echo $themeAtlName['recent_product_image']; ?>" >
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <div class="col-md-6 mt-4 card">
        <form  action="<?= base_url('admin/offer_view_update') ?>" method="post" enctype="multipart/form-data" >
            <?= csrf_field() ?>
            <h3>Offer</h3>
            <div class="form-group ">
                <label><?= $themeSettingTitle['offer_view'];?> </label>
                <select name="offer_view" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (availableAllOffer() as $offer) { ?>
                        <option value="<?= $offer->offer_id; ?>" <?= ($offer->offer_id == $themeSetting['offer_view']) ? 'selected' : '';?>><?= $offer->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>

        <form  action="<?= base_url('admin/popular_this_week_update') ?>" method="post" enctype="multipart/form-data" >
            <?= csrf_field() ?>
            <h3>Popular this week</h3>
            <div class="form-group ">
                <label><?= $themeSettingTitle['popular_this_week'];?> </label>
                <select name="popular_this_week" class="form-control"   style="width: 100%;">
                    <option value="">Please select</option>
                    <?php foreach (get_array_data_by_id('cc_product_category', 'status', '1') as $cat) { ?>
                        <option value="<?php echo $cat->prod_cat_id; ?>" <?= ($cat->prod_cat_id == $themeSetting['popular_this_week']) ? 'selected' : '';?>><?php echo display_category_with_parent($cat->prod_cat_id); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


</div>

<?= $this->section('java_script') ?>
    <script>
    </script>
<?= $this->endSection() ?>
