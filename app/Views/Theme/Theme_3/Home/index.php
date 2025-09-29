<?= $this->extend('Theme/Theme_3/layout') ?>
<?= $this->section('content') ?>
<div class="banner">
    <div class="container">
        <div class="row gx-0">
            <div class="col-xl-9 offset-xl-3 d-flex flex-column flex-lg-row">
                <div class="swiper bannerSlide me-1">
                    <div class="swiper-wrapper">
                    <?php $sli_1 = get_lebel_by_value_in_theme_settings('slider_1'); ?>
                        <div class="swiper-slide">
                            <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/slider', '', $sli_1, 'noimage.png', '605', '401');?>" class="img-fluid" alt="<?= getLebelByAltNameInThemeSettings('slider_1')?>" loading="lazy">
                        </div>
                        <?php $sli_2 = get_lebel_by_value_in_theme_settings('slider_2'); ?>
                        <div class="swiper-slide">
                            <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/slider', '', $sli_2, 'noimage.png', '605', '401');?>" class="img-fluid" alt="<?= getLebelByAltNameInThemeSettings('slider_2')?>" loading="lazy">
                        </div>
                        <?php $sli_3 = get_lebel_by_value_in_theme_settings('slider_3'); ?>
                        <div class="swiper-slide">
                            <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/slider', '', $sli_3, 'noimage.png', '605', '401');?>" class="img-fluid" alt="<?= getLebelByAltNameInThemeSettings('slider_3')?>" loading="lazy">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="side-banner d-flex flex-column flex-sm-row flex-lg-column gap-1">
                    <div class="side-banner-box position-relative custom-d-50 w-100">
                        <?php
                            $theme_settings = get_theme_settings();
                            $theme_alt_name = getThemeAltNameSettings();
                        ?>
                        <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/top_side_baner', '', $theme_settings['head_side_baner_1'], 'noimage.png', '226', '199');?>" class="img-fluid" alt="<?= $theme_alt_name['head_side_baner_1']?>" loading="lazy">

                        <div class="position-absolute top-0 p-3">
                            <h4><?php echo $theme_settings['head_side_title_1'];?></h4>
                            <a class="btn btn-sidebanner" href="<?php echo base_url('category/' . $theme_settings['head_side_category_1']); ?>">
                                Shop Now
                                <img src="<?php echo base_url('svg/arrowIcon.svg')?>" alt="date">
                            </a>
                        </div>
                    </div>
                    <div class="side-banner-box position-relative custom-d-50 w-100">
                        <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/top_side_baner', '', $theme_settings['head_side_baner_2'], 'noimage.png', '226', '199');?>" class="img-fluid" alt="<?= $theme_alt_name['head_side_baner_2']?>" loading="lazy">

                        <div class="position-absolute top-0 p-3">
                            <h4><?php echo $theme_settings['head_side_title_2'];?></h4>
                            <a class="btn btn-sidebanner" href="<?php echo base_url('category/' . $theme_settings['head_side_category_2']); ?>" >
                                Shop Now
                                <img src="<?php echo base_url('svg/arrowIcon.svg')?>" alt="date">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="featured-category mb-5">
            <div class="cat-title">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <h3 class="title-header">Featured Category</h3>
                    </div>
                </div>
            </div>
            <div class="row row-cols-lg-6 row-cols-md-3 row-cols-sm-3 row-cols-2 row-cols-1">
            <?php  foreach ($populerCat as $key => $catPop) {  ?>
                <div class="col">
                    <a href="<?php echo base_url('category/' . $catPop->prod_cat_id) ?>">
                        <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/category', '', $catPop->image, 'noimage.png', '166', '208');?>" class="img-fluid" alt="<?= $catPop->alt_name?>" loading="lazy">
                    <div class="category-title"><?php echo $catPop->category_name;?></div>
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="product-category mb-5">
            <div class="cat-title">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <h3 class="title-header"><?php echo $theme_settings['home_category_title_1'];?></h3>
                    </div>
                    <div class="col-6 col-md-9 d-flex justify-content-end align-items-center">
                        <div class="apparels-button-prev">
                            <img src="<?php echo base_url('svg/prevArrowIcon.svg')?>" alt="date">
                        </div>
                        <div class="apparels-button-next">
                            <img src="<?php echo base_url('svg/nextArrowIcon.svg')?>" alt="date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/home_category', '', $theme_settings['home_category_baner_1'], 'noimage.png', '261', '578');?>" class="img-fluid h-100 " alt="<?= $theme_alt_name['home_category_baner_1']?>" loading="lazy">
                </div>
                <div class="col-sm-9">
                    <div class="products h-100">
                        <div class="swiper apparelsSlide">
                            <div class="swiper-wrapper">
                            <?php echo get_category_id_by_product_show_home_slide($theme_settings['home_category_1']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-category mb-5">
            <div class="cat-title">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <h3 class="title-header"><?php echo $theme_settings['home_category_title_2'];?></h3>
                    </div>
                    <div class="col-6 col-md-9 d-flex justify-content-end align-items-center">
                        <div class="treasures-button-prev">
                            <img src="<?php echo base_url('svg/prevArrowIcon.svg')?>" alt="date">
                        </div>
                        <div class="treasures-button-next">
                            <img src="<?php echo base_url('svg/nextArrowIcon.svg')?>" alt="date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/home_category', '', $theme_settings['home_category_baner_2'], 'noimage.png', '261', '578');?>" class="img-fluid h-100 " alt="<?= $theme_alt_name['home_category_baner_2']?>" loading="lazy">
                </div>
                <div class="col-sm-9">
                    <div class="products h-100">
                        <div class="swiper treasuresSlide">
                            <div class="swiper-wrapper">
                            <?php echo get_category_id_by_product_show_home_slide($theme_settings['home_category_2']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-category mb-5">
            <div class="cat-title">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <h3 class="title-header"><?php echo $theme_settings['home_category_title_3'];?></h3>
                    </div>
                    <div class="col-6 col-md-9 d-flex justify-content-end align-items-center">
                        <div class="bag-button-prev">
                            <img src="<?php echo base_url('svg/prevArrowIcon.svg')?>" alt="date">
                        </div>
                        <div class="bag-button-next">
                            <img src="<?php echo base_url('svg/nextArrowIcon.svg')?>" alt="date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/home_category', '', $theme_settings['home_category_baner_3'], 'noimage.png', '261', '578');?>" class="img-fluid h-100 " alt="<?= $theme_alt_name['home_category_baner_3']?>" loading="lazy">
                </div>
                <div class="col-sm-9">
                    <div class="products h-100">
                        <div class="swiper bagSlide">
                            <div class="swiper-wrapper">
                                <?php echo get_category_id_by_product_show_home_slide($theme_settings['home_category_3']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-category mb-5">
            <div class="cat-title">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <h3 class="title-header"><?php echo $theme_settings['home_category_title_4'];?></h3>
                    </div>
                    <div class="col-6 col-md-9 d-flex justify-content-end align-items-center">
                        <div class="jewelry-button-prev">
                            <img src="<?php echo base_url('svg/prevArrowIcon.svg')?>" alt="date">
                        </div>
                        <div class="jewelry-button-next">
                            <img src="<?php echo base_url('svg/nextArrowIcon.svg')?>" alt="date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/home_category', '', $theme_settings['home_category_baner_4'], 'noimage.png', '261', '578');?>" class="img-fluid h-100 " alt="<?= $theme_alt_name['home_category_baner_4']?>" loading="lazy">
                </div>
                <div class="col-sm-9">
                    <div class="products h-100">
                        <div class="swiper jewelrySlide">
                            <div class="swiper-wrapper">
                            <?php echo get_category_id_by_product_show_home_slide($theme_settings['home_category_4']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-category mb-5">
            <div class="cat-title">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <h3 class="title-header"><?php echo $theme_settings['home_category_title_5'];?></h3>
                    </div>
                    <div class="col-6 col-md-9 d-flex justify-content-end align-items-center">
                        <div class="shoes-button-prev">
                            <img src="<?php echo base_url('svg/prevArrowIcon.svg')?>" alt="date">
                        </div>
                        <div class="shoes-button-next">
                            <img src="<?php echo base_url('svg/nextArrowIcon.svg')?>" alt="date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/home_category', '', $theme_settings['home_category_baner_5'], 'noimage.png', '261', '578');?>" class="img-fluid h-100 " alt="<?= $theme_alt_name['home_category_baner_5']?>" loading="lazy">
                </div>
                <div class="col-sm-9">
                    <div class="products h-100">
                        <div class="swiper shoesSlide">
                            <div class="swiper-wrapper">
                            <?php echo get_category_id_by_product_show_home_slide($theme_settings['home_category_5']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-banner mb-5">
            <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/banner_bottom', '', $theme_settings['banner_bottom'], 'noimage.png', '1116', '211');?>" class="img-fluid" alt="<?= $theme_alt_name['banner_bottom']?>" loading="lazy">

        </div>

        <div class="brands-slide mb-5">
            <div class="brands-title">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <h3 class="title-header">Brands</h3>
                    </div>
                    <div class="col-6 col-md-9 d-flex justify-content-end align-items-center">
                        <div class="brands-button-prev">
                            <img src="<?php echo base_url('svg/prevArrowIcon.svg')?>" alt="date">
                        </div>
                        <div class="brands-button-next">
                            <img src="<?php echo base_url('svg/nextArrowIcon.svg')?>" alt="date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border p-4">
                <div class="swiper brandsSlide">
                    <div class="swiper-wrapper">
                    <?php foreach ($brand as $br) { ?>
                        <div class="swiper-slide">
                            <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/brand', '', $br->image, 'noimage.png', '133', '80');?>" class="img-fluid" alt="<?= $br->alt_name?>" loading="lazy">
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popular-category">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Shop by Category</h2>
            </div>
            <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 gx-5">
                <?php foreach ($shop_by as $valShop) { ?>
                <div class="col mb-5">
                    <a href="<?php echo base_url('category/' . $valShop->prod_cat_id);?>" >
                    <div class="card p-4 border-0 text-center rounded-4">
                        <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center brand-icon">
                            <?php echo $valShop->code;?>
                            <h4><?php echo $valShop->category_name;  ?></h4>
                        </div>
                    </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script>
</script>
<?= $this->endSection() ?>
