<div class="row">
    <div class="col-md-6">
        <form action="<?php echo base_url('admin/slider_update') ?>" method="post"
              enctype="multipart/form-data">
            <div class="form-group mt-5">
                <?php
                $sli_1 = get_lebel_by_value_in_theme_settings('slider_1');
                echo image_view('uploads/slider', '', $sli_1, 'noimage.png', 'width-full-100');
                ?>
            </div>
            <div class="form-group">
                <label>Slider 1</label>
                <input type="file" name="slider" class="form-control" >
                <input type="hidden" name="nameslider" class="form-control"
                       value="slider_1" required>
                <small>Size: <?php echo $theme_libraries->slider_width; ?> x <?php echo $theme_libraries->slider_height; ?></small>
            </div>
            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?php echo getLebelByAltNameInThemeSettings('slider_1'); ?>" >
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <form action="<?php echo base_url('admin/slider_update') ?>" method="post"
              enctype="multipart/form-data">
            <div class="form-group mt-5">
                <?php
                $sli_3 = get_lebel_by_value_in_theme_settings('slider_3');
                echo image_view('uploads/slider', '', $sli_3, 'noimage.png', 'width-full-100');
                ?>
            </div>
            <div class="form-group">
                <label>Slider 3</label>
                <input type="file" name="slider" class="form-control" >
                <input type="hidden" name="nameslider" class="form-control"
                       value="slider_3" required>
                <small>Size: <?php echo $theme_libraries->slider_width; ?> x <?php echo $theme_libraries->slider_height; ?></small>
            </div>
            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?php echo getLebelByAltNameInThemeSettings('slider_3'); ?>" >
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <div class="col-md-6">
        <form action="<?php echo base_url('admin/slider_update') ?>" method="post"
              enctype="multipart/form-data">
            <div class="form-group mt-5">
                <?php
                $sli_2 = get_lebel_by_value_in_theme_settings('slider_2');
                echo image_view('uploads/slider', '', $sli_2, 'noimage.png', 'width-full-100');
                ?>
            </div>
            <div class="form-group">
                <label>Slider 2</label>
                <input type="file" name="slider" class="form-control" >
                <input type="hidden" name="nameslider" class="form-control"
                       value="slider_2" required>
                <small>Size: <?php echo $theme_libraries->slider_width; ?> x <?php echo $theme_libraries->slider_height; ?></small>
            </div>
            <div class="form-group">
                <label>ALT Name</label>
                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?php echo getLebelByAltNameInThemeSettings('slider_2'); ?>" >
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
