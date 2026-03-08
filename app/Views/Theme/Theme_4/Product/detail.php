<?= $this->extend('Theme/Theme_4/layout') ?>
<?= $this->section('content') ?>

<?= $this->section('caa_link') ?>
<link href="<?php echo base_url() ?>/assets/theme_4/css/product-details.css" rel="stylesheet" media="print"
      onload="this.media='all'">
<style>
    .custom-radio input[type="radio"] {
        position: absolute;
        opacity: 0;
        width: 24px;
        height: 24px;
        margin: 0;
        cursor: pointer;
    }

    .custom-radio svg {
        pointer-events: none;
        transition: stroke 0.2s, fill 0.2s;
    }

    .custom-radio input[type="radio"]:checked + svg rect {
        stroke: #FFA439;
        fill: #FFA439;
    }

    #preview {
        position: relative;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        overflow: hidden;
    }

    .zoom-image-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 200% 200%;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 3;
    }

    #preview.zoom-active .zoom-image-container {
        opacity: 1;
        background-color: #fff;
    }
</style>
<?= $this->endSection() ?>
<?php
$symbol = get_lebel_by_value_in_settings('currency_symbol');
$modules = modules_access();
$themeSetting = get_theme_settings();
$symbol = get_lebel_by_value_in_settings('currency_symbol');
?>
<div class="container">
    <nav class="breadcrumb-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Homepage</a></li>
            <li class="breadcrumb-item"><a
                    href="<?= base_url('detail/' . $products->product_id) ?>"><?= $products->name; ?></a></li>
        </ol>
    </nav>
</div>

<main>
    <section class="container">
        <div class="row justify-content-between details-main-container">
            <div class="col-xl-6">
                <div class="">
                    <div class="product-details-container" style="width: 100%;">
                        <div class="d-flex slider-and-nav-container">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;"
                                 class="swiper product-detailsSwiper2 flex-grow-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class=""
                                             src="<?= productImageViewUrlNew($products->main_image, $products->image, '600', '600') ?>"
                                             data-original-image="<?= productImageViewUrlNew( $products->main_image, $products->image, '600', '600') ?>"
                                             alt="Product Image"
                                             fetchpriority="high" decoding="async" loading="eager">
                                    </div>
                                    <?php if (!empty($proImg)) {
                                        foreach ($proImg as $imgval) {
                                            ?>
                                            <div class="swiper-slide">
                                                <img class="thumb"
                                                     src="<?= productImageViewUrlNew( $imgval->main_image, $imgval->image, '600', '600') ?>"
                                                     data-original-image="<?= productImageViewUrlNew( $imgval->main_image,$imgval->image, '600', '600') ?>"
                                                     alt="Product Image"
                                                     fetchpriority="high" decoding="async" loading="eager">
                                            </div>
                                        <?php }
                                    } ?>
                                </div>

                            </div>
                            <div class="d-flex flex-column justify-content-between align-items-center flex-shrink-0">
                                <div class="d-flex flex-column gap-2 align-items-center ">
                                    <button class="product-slider-sidenav-btn" aria-label="share icon">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M15 5.83347C15.6454 5.96728 16.1323 6.19062 16.5237 6.56337C17.5 7.49331 17.5 8.99005 17.5 11.9835C17.5 14.9769 17.5 16.4735 16.5237 17.4035C15.5474 18.3335 13.976 18.3335 10.8333 18.3335H9.16667C6.02397 18.3335 4.45262 18.3335 3.47631 17.4035C2.5 16.4735 2.5 14.9769 2.5 11.9835C2.5 8.99005 2.5 7.49331 3.47631 6.56337C3.86765 6.19062 4.35458 5.96728 5 5.83347"
                                                stroke="#141414" stroke-width="1.25" stroke-linecap="round"/>
                                            <path
                                                d="M10.0211 1.66722L10 11.6668M10.0211 1.66722C9.88558 1.66161 9.74925 1.71004 9.62775 1.81255C8.87242 2.45017 7.5 4.1075 7.5 4.1075M10.0211 1.66722C10.1426 1.67226 10.2635 1.72075 10.3723 1.81268C11.1276 2.45042 12.5 4.1075 12.5 4.1075"
                                                stroke="#141414" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <button class="product-slider-sidenav-btn" aria-label="love icon">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M16.2189 3.32858C13.9841 1.95781 12.0337 2.51021 10.862 3.39013C10.3815 3.75092 10.1414 3.93132 10 3.93132C9.85869 3.93132 9.61852 3.75092 9.13802 3.39013C7.96637 2.51021 6.01593 1.95781 3.78122 3.32858C0.848411 5.12757 0.184787 11.0625 6.94963 16.0696C8.23812 17.0233 8.88235 17.5001 10 17.5001C11.1177 17.5001 11.7619 17.0233 13.0504 16.0696C19.8153 11.0625 19.1516 5.12757 16.2189 3.32858Z"
                                                stroke="#141414" stroke-width="1.5" stroke-linecap="round"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <button class="product-slider-sidenav-btn prev-slide-btn"
                                            aria-label="slide previous button">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M12 5.00012C12 5.00012 7.00001 8.68254 7 10.0001C6.99999 11.3178 12 15.0001 12 15.0001"
                                                stroke="#141414" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <button class="product-slider-sidenav-btn next-slide-btn"
                                            aria-label="slider next button">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M8 5.00012C8 5.00012 13 8.68254 13 10.0001C13 11.3178 8 15.0001 8 15.0001"
                                                stroke="#141414" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="swiper product-detailsSwiper product-detailsSwiper-thumbs" s>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" style="overflow: hidden;">
                                <img
                                    src="<?= productImageViewUrlNew($products->main_image, $products->image,  '100', '100') ?>"
                                    alt="Product Image" loading="lazy">
                            </div>
                            <?php if (!empty($proImg)) {
                                foreach ($proImg as $imgval) {
                                    ?>
                                    <div class="swiper-slide" style="overflow: hidden;">
                                        <img
                                            src="<?= productImageViewUrlNew($imgval->main_image, $imgval->image, '100', '100') ?>"
                                            alt="Product Image" loading="lazy">
                                    </div>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-6">
                <div class="" id="preview">
                    <div class="zoom-image-container d-none"></div>
                    <form id="addto-cart-form" action="<?php echo base_url('addtocartdetail') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="">
                            <h4 class="title product-details-title"><?= $products->name; ?></h4>
                            <div class="d-flex align-items-center justify-content-between gap-2">
                                <div class="d-flex gap-2 align-items-center">
                                    <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $products->product_id);
                                    if (empty($spPric)) { ?>
                                        <span
                                            class="product--price-now"><?= currency_symbol_with_symbol($products->price, $symbol) ?></span>
                                    <?php } else { ?>
                                        <span
                                            class="product-price-before"><?= currency_symbol_with_symbol($products->price, $symbol); ?></span>
                                        <span
                                            class="product--price-now"><?= currency_symbol_with_symbol($spPric, $symbol); ?></span>
                                    <?php } ?>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <span class="sold">1,23 Sold</span>
                                    <?= product_id_by_rating($products->product_id, '1'); ?>
                                </div>
                            </div>
                            <div class="hr hr-product-description"></div>
                        </div>
                        <div class="description">
                            <div class="input-group detail-qty mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-dark btn-qty" onclick="minusItem('qty')"
                                            id="minus-btn"><i class="fa fa-minus"></i></button>
                                </div>
                                <input type="text" id="qty_input" name="qty"
                                       class="form-control text-center form-control-sm item_qty" value="1" min="1">

                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-dark btn-qty" onclick="plusItem('qty')"
                                            id="plus-btn"><i class="fa fa-plus"></i></button>
                                </div>

                            </div>

                            <?php foreach ($optionArray as $key => $val){
                                $fildName = str_replace(' ', '', $key);
                            ?>
                                <p class="selected-color"><?= $key ?>:</p>
                                <?php if ($val['type'] == 'radio'){?>
                                    <div class="d-flex size-button-container flex-wrap">

                                        <?php foreach ($val['items'] as $item){

                                            $nameVal  = get_data_by_id('name', 'cc_option_value', 'option_value_id', $item);
                                            $firstCar =  mb_substr($nameVal, 0, 1);
                                            $length   = strlen($nameVal);
                                            $isColor  = (($firstCar == '#') && ($length == 7)) ? '' : $nameVal;
                                            $nameOp   = !empty($isColor) ? $isColor : '';
                                            $style    = empty($isColor) ? "background-color: $nameVal;" : "";
                                        ?>
                                        <input type="radio" class="btn-check d-none"  name="<?= strtolower($fildName)?>" id="option_<?= $item?>" value="<?= $item?>">
                                        <label class="btn size-button" style="<?= $style ;?>" for="option_<?= $item?>"><?= $nameOp;?></label>
                                        <?php }?>
                                    </div>
                                <?php }else{ ?>
                                    <div class="mt-2 mb-3">
                                        <select class="form-select" name="<?= strtolower($fildName)?>" id="sizeSelect">
                                            <?php foreach ($val['items'] as $item){
                                                $nameVal  = get_data_by_id('name', 'cc_option_value', 'option_value_id', $item);
                                                $firstCar =  mb_substr($nameVal, 0, 1);
                                                $length   = strlen($nameVal);
                                                $isColor  = (($firstCar == '#') && ($length == 7)) ? '' : $nameVal;
                                                $nameOp   = !empty($isColor) ? $isColor : '';
                                                $style    = empty($isColor) ? "background-color: $nameVal;padding: 15px 18px; border: unset;" : "";
                                            ?>
                                            <option value="<?= $item?>" ><?= $nameVal;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                <?php } ?>

                            <?php } ?>






                            <div class="row align-items-center justify-content-between mb-40 g-3 mt-2">
                                <div class="col-md-6">
                                    <input type="hidden" name="product_id" value="<?= $products->product_id ?>"
                                           required>
                                    <?php if (!empty($products->quantity)) { ?>

                                        <button type="submit" class="btn-add-to-cart btn btn-dark w-100"
                                                onclick="addToCartdetail()">Add To Cart
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" class="btn-add-to-cart btn btn-dark w-100">Out Of Stock
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <?php if (!empty($products->quantity)) { ?>
                                        <button type="submit" class="btn btn-secondary btn-light btn-checkout w-100"
                                                onclick="buyNowAction()">Checkout Now
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-secondary btn-light btn-checkout w-100">Out
                                            Of Stock
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                            <a class="delivery-ts text-decoration-none" href="">Delivery T&C</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="hr-container container">
        <div class="hr col"></div>
    </div>
    <!-- related product section start  -->
    <section>
        <div class="container">
            <div class="d-flex justify-content-between align-items-end related-product  mb-4">
                <p class="title related-product">Related Product</p>
                <a href="#" class="text-muted latest-blog-section-action text-nowrap">View All</a>
            </div>
            <div
                class="row  row-cols-lg-4 row-cols-md-3 row-cols-2 related-product-cards  justify-content-start g-md-3 g-3">
                <?php if (!empty($relProd)) {
                    foreach ($relProd as $rPro) {
                        $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $rPro->product_id);
                        ?>
                        <div class="col best-seller-card">
                            <div class="card-slider position-relative overflow-hidden">
                                <div class="position-absolute top-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center w-100 px-4">
                                        <?php if (!empty($spPric)) { ?>
                                            <span
                                                class="badge light-yellow-badge"><?= specialPriceAndPriceByOffPercent($spPric, $rPro->price) ?>%</span>
                                        <?php } ?>
                                        <span class="badge tomato-badge">Hot</span>
                                    </div>
                                </div>
                                <div class="cards-icons-container">
                                    <div class="cards-icons">
                                        <?php if ($modules['compare'] == 1) { ?>
                                            <div class="">
                                                <button class="tooltip-icon compare"
                                                        onclick="addToCompare(<?= $rPro->product_id ?>)"
                                                        data-tooltip="Compare Product"
                                                        aria-label="Compare Product">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                                         viewBox="0 0 18 19" fill="none">
                                                        <path
                                                            d="M15.2222 13.641V8.41026C15.2222 5.94482 15.2222 4.71123 14.4409 3.9458C13.6604 3.17949 12.4027 3.17949 9.88889 3.17949H7.22222M15.2222 13.641C14.2404 13.641 13.4444 14.4217 13.4444 15.3846C13.4444 16.3476 14.2404 17.1282 15.2222 17.1282C16.2041 17.1282 17 16.3476 17 15.3846C17 14.4217 16.2041 13.641 15.2222 13.641ZM7.22222 3.17949C7.22222 2.56923 8.99467 1.42892 9.44444 1M7.22222 3.17949C7.22222 3.78974 8.99467 4.93005 9.44444 5.35897M2.77778 5.35897V10.5897C2.77778 13.0552 2.77778 14.2888 3.55911 15.0542C4.33956 15.8205 5.59733 15.8205 8.11111 15.8205H10.7778M10.7778 15.8205C10.7778 16.4308 9.00533 17.5719 8.55556 18M10.7778 15.8205C10.7778 15.2103 9.00533 14.0691 8.55556 13.641M4.55556 3.17949C4.55556 4.14245 3.75962 4.92308 2.77778 4.92308C1.79594 4.92308 1 4.14245 1 3.17949C1 2.21653 1.79594 1.4359 2.77778 1.4359C3.75962 1.4359 4.55556 2.21653 4.55556 3.17949Z"
                                                            stroke="#656565" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <?php if ($modules['wishlist'] == 1) { ?>
                                            <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                                                <div class="">
                                                    <a href="<?php echo base_url('login'); ?>"
                                                       class="tooltip-icon favorite" data-tooltip="Add to Favorites"
                                                       aria-label="Add to Favorites">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                             viewBox="0 0 18 18"
                                                             fill="none">
                                                            <path
                                                                d="M9 16.0125L7.9125 15.0225C4.05 11.52 1.5 9.2025 1.5 6.375C1.5 4.0575 3.315 2.25 5.625 2.25C6.93 2.25 8.1825 2.8575 9 3.81C9.8175 2.8575 11.07 2.25 12.375 2.25C14.685 2.25 16.5 4.0575 16.5 6.375C16.5 9.2025 13.95 11.52 10.0875 15.0225L9 16.0125Z"
                                                                fill="#656565"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="">
                                                    <button onclick="addToWishlist(<?= $rPro->product_id ?>)"
                                                            class="tooltip-icon favorite"
                                                            data-tooltip="Add to Favorites"
                                                            aria-label="Add to Favorites">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                             viewBox="0 0 18 18"
                                                             fill="none">
                                                            <path
                                                                d="M9 16.0125L7.9125 15.0225C4.05 11.52 1.5 9.2025 1.5 6.375C1.5 4.0575 3.315 2.25 5.625 2.25C6.93 2.25 8.1825 2.8575 9 3.81C9.8175 2.8575 11.07 2.25 12.375 2.25C14.685 2.25 16.5 4.0575 16.5 6.375C16.5 9.2025 13.95 11.52 10.0875 15.0225L9 16.0125Z"
                                                                fill="#656565"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="swiper myCardSwiper">
                                    <div class="swiper-wrapper">
                                        <!-- slide 1 -->
                                        <div class="swiper-slide card-slider-single-slide">

                                            <img class="object-fit-cover"
                                                 src="<?= productImageViewUrlNew($rPro->main_image, $rPro->image, '267', '253'); ?>"
                                                 alt="<?= $rPro->alt_name; ?>" loading="lazy">
                                        </div>
                                        <?php $allImage = get_array_data_by_id('cc_product_image', 'product_id', $rPro->product_id); ?>
                                        <?php if (!empty($allImage)) {
                                            foreach ($allImage as $image) {
                                                ?>
                                                <div class="swiper-slide card-slider-single-slide">

                                                    <img class="object-fit-cover"
                                                         src="<?= productImageViewUrlNew($image->main_image , $image->image, '267', '253'); ?>"
                                                         alt="<?= $image->alt_name ?>" loading="lazy">
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                    <div class="swiper-pagination card-swiper-pagination"></div>
                                </div>
                            </div>
                            <div class="card-bottom">
                                <h4 class="recently-viewed-card-title"><a
                                        href="<?= base_url('detail/' . $rPro->product_id) ?>"><?php echo substr($rPro->name, 0, 60); ?></a>
                                </h4>
                                <div
                                    class="d-flex gap-2 flex-wrap align-items-center recently-viewed-card-rating align-items-center">
                                    <?php echo product_id_by_rating($rPro->product_id, '1'); ?>
                                </div>
                                <div
                                    class="d-flex gap-2 flex-xl-nowrap flex-wrap justify-content-between align-items-center">
                                    <?php if (empty($spPric)) { ?>
                                        <span
                                            class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($rPro->price, $symbol); ?> </span>
                                    <?php } else { ?>
                                        <span
                                            class="recently-viewed-card-price prize-before-discount me-2"><?php echo currency_symbol_with_symbol($rPro->price, $symbol); ?></span>
                                        <span
                                            class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($spPric, $symbol); ?></span>
                                    <?php } ?>
                                    <?php echo addToCartBtn($rPro->product_id); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>

            </div>
        </div>
    </section>
    <div class="hr-container container">
        <div class="hr col"></div>
    </div>
    <!-- related product section end -->
    <!-- Product Review Section Start -->
    <?php $reating =  getUserRatingsByProductId($products->product_id); ?>
    <section>
        <div class="container">
            <div class="d-flex justify-content-between align-items-end related-product  mb-4">
                <p class="title related-product">Product Reviews</p>
            </div>
            <div class="rating-container">
                <div class="row gap-5 gap-md-0">
                    <div class="col-md-4">

                        <div class="">
                            <div class="rating d-flex align-items-center">

                                <div class="circular-chart me-3">
                                    <div class="svg-arc-chart ">
                                        <svg viewBox="0 0 84 84" width="84" height="84">
                                            <circle cx="42" cy="42" r="39" stroke="#eee" stroke-width="6" fill="none"/>
                                            <circle id="arcProgress" cx="42" cy="42" r="39" stroke="#FFA439"
                                                    stroke-width="6" fill="none"
                                                    stroke-linecap="round" stroke-dasharray="0 245"
                                                    transform="rotate(-15 42 42)"/>
                                            <text x="42" y="48" text-anchor="middle" font-size="16" fill="#333"
                                                  id="arcValue">0%
                                            </text>
                                        </svg>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="rating-star-container">
                                      <?= product_id_by_rating($products->product_id, 0)?>

                                    </div>
                                    <p class="muted">from <?= productIdByRatingCount($products->product_id)?> reviews</p>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="review-list">
                            <!-- Repeat this block dynamically -->
                            <div class="review-single-row d-flex align-items-center justify-content-between ">
                                <div class="d-flex align-items-center gap-1">
                                    <span class="rating-value">5.0</span>
                                    <svg class="rating-star" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M11.4416 2.92544L12.9083 5.85877C13.1083 6.26711 13.6416 6.65877 14.0916 6.73377L16.7499 7.17544C18.4499 7.45877 18.8499 8.69211 17.6249 9.90877L15.5583 11.9754C15.2083 12.3254 15.0166 13.0004 15.1249 13.4838L15.7166 16.0421C16.1833 18.0671 15.1083 18.8504 13.3166 17.7921L10.8249 16.3171C10.3749 16.0504 9.63326 16.0504 9.17492 16.3171L6.68326 17.7921C4.89992 18.8504 3.81659 18.0588 4.28326 16.0421L4.87492 13.4838C4.98326 13.0004 4.79159 12.3254 4.44159 11.9754L2.37492 9.90877C1.15826 8.69211 1.54992 7.45877 3.24992 7.17544L5.90826 6.73377C6.34992 6.65877 6.88326 6.26711 7.08326 5.85877L8.54992 2.92544C9.34992 1.33377 10.6499 1.33377 11.4416 2.92544Z"
                                            fill="#FFA439"/>
                                    </svg>
                                </div>
                                <div class="flex-grow-1 px-3">
                                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                         aria-label="Customer satisfaction 75 percent">
                                        <div class="progress-bar review-progress-bar" style="width: 70%"></div>
                                    </div>
                                </div>
                                <div><span class="review-count"><?= $reating['5star'];?></span></div>
                            </div>
                            <div class="review-single-row d-flex align-items-center justify-content-between ">
                                <div class="d-flex align-items-center gap-1">
                                    <span class="rating-value">4.0</span>
                                    <svg class="rating-star" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M11.4416 2.92544L12.9083 5.85877C13.1083 6.26711 13.6416 6.65877 14.0916 6.73377L16.7499 7.17544C18.4499 7.45877 18.8499 8.69211 17.6249 9.90877L15.5583 11.9754C15.2083 12.3254 15.0166 13.0004 15.1249 13.4838L15.7166 16.0421C16.1833 18.0671 15.1083 18.8504 13.3166 17.7921L10.8249 16.3171C10.3749 16.0504 9.63326 16.0504 9.17492 16.3171L6.68326 17.7921C4.89992 18.8504 3.81659 18.0588 4.28326 16.0421L4.87492 13.4838C4.98326 13.0004 4.79159 12.3254 4.44159 11.9754L2.37492 9.90877C1.15826 8.69211 1.54992 7.45877 3.24992 7.17544L5.90826 6.73377C6.34992 6.65877 6.88326 6.26711 7.08326 5.85877L8.54992 2.92544C9.34992 1.33377 10.6499 1.33377 11.4416 2.92544Z"
                                            fill="#FFA439"/>
                                    </svg>
                                </div>
                                <div class="flex-grow-1 px-3">
                                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                         aria-label="Customer satisfaction 75 percent">
                                        <div class="progress-bar review-progress-bar" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div><span class="review-count"><?= $reating['4star'];?></span></div>
                            </div>
                            <div class="review-single-row d-flex align-items-center justify-content-between ">
                                <div class="d-flex align-items-center gap-1">
                                    <span class="rating-value">3.0</span>
                                    <svg class="rating-star" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M11.4416 2.92544L12.9083 5.85877C13.1083 6.26711 13.6416 6.65877 14.0916 6.73377L16.7499 7.17544C18.4499 7.45877 18.8499 8.69211 17.6249 9.90877L15.5583 11.9754C15.2083 12.3254 15.0166 13.0004 15.1249 13.4838L15.7166 16.0421C16.1833 18.0671 15.1083 18.8504 13.3166 17.7921L10.8249 16.3171C10.3749 16.0504 9.63326 16.0504 9.17492 16.3171L6.68326 17.7921C4.89992 18.8504 3.81659 18.0588 4.28326 16.0421L4.87492 13.4838C4.98326 13.0004 4.79159 12.3254 4.44159 11.9754L2.37492 9.90877C1.15826 8.69211 1.54992 7.45877 3.24992 7.17544L5.90826 6.73377C6.34992 6.65877 6.88326 6.26711 7.08326 5.85877L8.54992 2.92544C9.34992 1.33377 10.6499 1.33377 11.4416 2.92544Z"
                                            fill="#FFA439"/>
                                    </svg>
                                </div>
                                <div class="flex-grow-1 px-3">
                                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                         aria-label="Customer satisfaction 75 percent">
                                        <div class="progress-bar review-progress-bar" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div><span class="review-count"><?= $reating['3star'];?></span></div>
                            </div>
                            <div class="review-single-row d-flex align-items-center justify-content-between ">
                                <div class="d-flex align-items-center gap-1">
                                    <span class="rating-value">2.0</span>
                                    <svg class="rating-star" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M11.4416 2.92544L12.9083 5.85877C13.1083 6.26711 13.6416 6.65877 14.0916 6.73377L16.7499 7.17544C18.4499 7.45877 18.8499 8.69211 17.6249 9.90877L15.5583 11.9754C15.2083 12.3254 15.0166 13.0004 15.1249 13.4838L15.7166 16.0421C16.1833 18.0671 15.1083 18.8504 13.3166 17.7921L10.8249 16.3171C10.3749 16.0504 9.63326 16.0504 9.17492 16.3171L6.68326 17.7921C4.89992 18.8504 3.81659 18.0588 4.28326 16.0421L4.87492 13.4838C4.98326 13.0004 4.79159 12.3254 4.44159 11.9754L2.37492 9.90877C1.15826 8.69211 1.54992 7.45877 3.24992 7.17544L5.90826 6.73377C6.34992 6.65877 6.88326 6.26711 7.08326 5.85877L8.54992 2.92544C9.34992 1.33377 10.6499 1.33377 11.4416 2.92544Z"
                                            fill="#FFA439"/>
                                    </svg>
                                </div>
                                <div class="flex-grow-1 px-3">
                                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                         aria-label="Customer satisfaction 75 percent">
                                        <div class="progress-bar review-progress-bar" style="width: 50%"></div>
                                    </div>
                                </div>
                                <div><span class="review-count"><?= $reating['2star'];?></span></div>
                            </div>
                            <div class="review-single-row d-flex align-items-center justify-content-between ">
                                <div class="d-flex align-items-center gap-1">
                                    <span class="rating-value">1.0</span>
                                    <svg class="rating-star" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M11.4416 2.92544L12.9083 5.85877C13.1083 6.26711 13.6416 6.65877 14.0916 6.73377L16.7499 7.17544C18.4499 7.45877 18.8499 8.69211 17.6249 9.90877L15.5583 11.9754C15.2083 12.3254 15.0166 13.0004 15.1249 13.4838L15.7166 16.0421C16.1833 18.0671 15.1083 18.8504 13.3166 17.7921L10.8249 16.3171C10.3749 16.0504 9.63326 16.0504 9.17492 16.3171L6.68326 17.7921C4.89992 18.8504 3.81659 18.0588 4.28326 16.0421L4.87492 13.4838C4.98326 13.0004 4.79159 12.3254 4.44159 11.9754L2.37492 9.90877C1.15826 8.69211 1.54992 7.45877 3.24992 7.17544L5.90826 6.73377C6.34992 6.65877 6.88326 6.26711 7.08326 5.85877L8.54992 2.92544C9.34992 1.33377 10.6499 1.33377 11.4416 2.92544Z"
                                            fill="#FFA439"/>
                                    </svg>
                                </div>
                                <div class="flex-grow-1 px-3">
                                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                         aria-label="Customer satisfaction 75 percent">
                                        <div class="progress-bar review-progress-bar" style="width: 15%"></div>
                                    </div>
                                </div>
                                <div><span class="review-count"><?= $reating['1star'];?></span></div>
                            </div>
                            <!-- End repeat -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Reviews Filter and Review Lists -->

            <div class="d-flex gap-md-5 flex-wrap product-reviews">
                <div class="rating-group-container">
                    <div class="rating-container">
                        <p class="title review-filter-title">Reviews Filter</p>
                        <div class="hr-container py-3">
                            <div class="hr"></div>
                        </div>


                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <!-- Rating Section -->
                            <div class="accordion-item review-filter-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="true"
                                            aria-controls="flush-collapseOne">
                                        Rating
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body review-filter-acordian-body">
                                        <div class="d-flex flex-column gap-2">
                                            <!-- Ratings 5 to 1 -->
                                            <label class="custom-checkbox custom-radio">
                                                <input type="radio" onclick="reviewCommentView(this.value,'<?= $products->product_id?>')" name="review" value="5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24"
                                                     fill="none">
                                                    <rect x="3.75" y="3.67041" width="16.5" height="16.5"
                                                          stroke="#C4C8CC" stroke-width="1.5"/>
                                                </svg>
                                                <span class="rating-label">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                                     fill="none">
                                                  <path
                                                      d="M11.4416 2.92568L12.9083 5.85902C13.1083 6.26735 13.6416 6.65902 14.0916 6.73402L16.7499 7.17568C18.4499 7.45902 18.8499 8.69235 17.6249 9.90902L15.5583 11.9757C15.2083 12.3257 15.0166 13.0007 15.1249 13.484L15.7166 16.0424C16.1833 18.0674 15.1083 18.8507 13.3166 17.7924L10.8249 16.3174C10.3749 16.0507 9.63326 16.0507 9.17492 16.3174L6.68326 17.7924C4.89992 18.8507 3.81659 18.059 4.28326 16.0424L4.87492 13.484C4.98326 13.0007 4.79159 12.3257 4.44159 11.9757L2.37492 9.90902C1.15826 8.69235 1.54992 7.45902 3.24992 7.17568L5.90826 6.73402C6.34992 6.65902 6.88326 6.26735 7.08326 5.85902L8.54992 2.92568C9.34992 1.33402 10.6499 1.33402 11.4416 2.92568Z"
                                                      fill="#FFA439"/>
                                                </svg>
                                                5</span>
                                            </label>
                                            <label class="custom-checkbox custom-radio">
                                                <input type="radio" onclick="reviewCommentView(this.value,'<?= $products->product_id?>')" name="review" value="4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24"
                                                     fill="none">
                                                    <rect x="3.75" y="3.67041" width="16.5" height="16.5"
                                                          stroke="#C4C8CC" stroke-width="1.5"/>
                                                </svg>
                                                <span class="rating-label">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                                     fill="none">
                                                  <path
                                                      d="M11.4416 2.92568L12.9083 5.85902C13.1083 6.26735 13.6416 6.65902 14.0916 6.73402L16.7499 7.17568C18.4499 7.45902 18.8499 8.69235 17.6249 9.90902L15.5583 11.9757C15.2083 12.3257 15.0166 13.0007 15.1249 13.484L15.7166 16.0424C16.1833 18.0674 15.1083 18.8507 13.3166 17.7924L10.8249 16.3174C10.3749 16.0507 9.63326 16.0507 9.17492 16.3174L6.68326 17.7924C4.89992 18.8507 3.81659 18.059 4.28326 16.0424L4.87492 13.484C4.98326 13.0007 4.79159 12.3257 4.44159 11.9757L2.37492 9.90902C1.15826 8.69235 1.54992 7.45902 3.24992 7.17568L5.90826 6.73402C6.34992 6.65902 6.88326 6.26735 7.08326 5.85902L8.54992 2.92568C9.34992 1.33402 10.6499 1.33402 11.4416 2.92568Z"
                                                      fill="#FFA439"/>
                                                </svg>
                                                4</span>
                                            </label>
                                            <label class="custom-checkbox custom-radio">
                                                <input type="radio" onclick="reviewCommentView(this.value,'<?= $products->product_id?>')" name="review" value="3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24"
                                                     fill="none">
                                                    <rect x="3.75" y="3.67041" width="16.5" height="16.5"
                                                          stroke="#C4C8CC" stroke-width="1.5"/>
                                                </svg>
                                                <span class="rating-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                                         fill="none">
                                                      <path
                                                          d="M11.4416 2.92568L12.9083 5.85902C13.1083 6.26735 13.6416 6.65902 14.0916 6.73402L16.7499 7.17568C18.4499 7.45902 18.8499 8.69235 17.6249 9.90902L15.5583 11.9757C15.2083 12.3257 15.0166 13.0007 15.1249 13.484L15.7166 16.0424C16.1833 18.0674 15.1083 18.8507 13.3166 17.7924L10.8249 16.3174C10.3749 16.0507 9.63326 16.0507 9.17492 16.3174L6.68326 17.7924C4.89992 18.8507 3.81659 18.059 4.28326 16.0424L4.87492 13.484C4.98326 13.0007 4.79159 12.3257 4.44159 11.9757L2.37492 9.90902C1.15826 8.69235 1.54992 7.45902 3.24992 7.17568L5.90826 6.73402C6.34992 6.65902 6.88326 6.26735 7.08326 5.85902L8.54992 2.92568C9.34992 1.33402 10.6499 1.33402 11.4416 2.92568Z"
                                                          fill="#FFA439"/>
                                                    </svg>
                                                3</span>
                                            </label>
                                            <label class="custom-checkbox custom-radio">
                                                <input type="radio" onclick="reviewCommentView(this.value,'<?= $products->product_id?>')" name="review" value="2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24"
                                                     fill="none">
                                                    <rect x="3.75" y="3.67041" width="16.5" height="16.5"
                                                          stroke="#C4C8CC" stroke-width="1.5"/>
                                                </svg>
                                                <span class="rating-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                                         fill="none">
                                                      <path
                                                          d="M11.4416 2.92568L12.9083 5.85902C13.1083 6.26735 13.6416 6.65902 14.0916 6.73402L16.7499 7.17568C18.4499 7.45902 18.8499 8.69235 17.6249 9.90902L15.5583 11.9757C15.2083 12.3257 15.0166 13.0007 15.1249 13.484L15.7166 16.0424C16.1833 18.0674 15.1083 18.8507 13.3166 17.7924L10.8249 16.3174C10.3749 16.0507 9.63326 16.0507 9.17492 16.3174L6.68326 17.7924C4.89992 18.8507 3.81659 18.059 4.28326 16.0424L4.87492 13.484C4.98326 13.0007 4.79159 12.3257 4.44159 11.9757L2.37492 9.90902C1.15826 8.69235 1.54992 7.45902 3.24992 7.17568L5.90826 6.73402C6.34992 6.65902 6.88326 6.26735 7.08326 5.85902L8.54992 2.92568C9.34992 1.33402 10.6499 1.33402 11.4416 2.92568Z"
                                                          fill="#FFA439"/>
                                                    </svg>
                                                2</span>
                                            </label>
                                            <label class="custom-checkbox custom-radio">
                                                <input type="radio" onclick="reviewCommentView(this.value,'<?= $products->product_id?>')" name="review" value="1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24"
                                                     fill="none">
                                                    <rect x="3.75" y="3.67041" width="16.5" height="16.5"
                                                          stroke="#C4C8CC" stroke-width="1.5"/>
                                                </svg>
                                                <span class="rating-label">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                                         fill="none">
                                                      <path
                                                          d="M11.4416 2.92568L12.9083 5.85902C13.1083 6.26735 13.6416 6.65902 14.0916 6.73402L16.7499 7.17568C18.4499 7.45902 18.8499 8.69235 17.6249 9.90902L15.5583 11.9757C15.2083 12.3257 15.0166 13.0007 15.1249 13.484L15.7166 16.0424C16.1833 18.0674 15.1083 18.8507 13.3166 17.7924L10.8249 16.3174C10.3749 16.0507 9.63326 16.0507 9.17492 16.3174L6.68326 17.7924C4.89992 18.8507 3.81659 18.059 4.28326 16.0424L4.87492 13.484C4.98326 13.0007 4.79159 12.3257 4.44159 11.9757L2.37492 9.90902C1.15826 8.69235 1.54992 7.45902 3.24992 7.17568L5.90826 6.73402C6.34992 6.65902 6.88326 6.26735 7.08326 5.85902L8.54992 2.92568C9.34992 1.33402 10.6499 1.33402 11.4416 2.92568Z"
                                                          fill="#FFA439"/>
                                                    </svg>
                                                1</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <p class="title review-filter-title mb-3">Reviews Filter</p>

                    <ul class="nav filter-buttons nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">All Reviews</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Comments</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="reviewData">
                                <div id="pagerData"></div>
                                <div id="paginationjs" class="reviews-pagination d-flex justify-content-center"></div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="<?php echo base_url('review') ?>" method="post" class="product-review w-50">
                                <?= csrf_field() ?>
                                <p class="mb-4 mt-2"><strong>Your Rating</strong></p>
                                <?php if (isset(newSession()->isLoggedInCustomer)) {
                                    if (empty(check_review($products->product_id))) { ?>
                                        <div class="rating ">
                                            <div class="ratingPiont"></div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="review">Message</label>
                                            <textarea class="form-control" rows="5" name="feedback_text" id="review"
                                                      placeholder="Message.." required></textarea>
                                        </div>
                                        <input type="hidden" name="product_id" value="<?php echo $products->product_id; ?>">
                                        <button class="btn btn-success rounded-0 mt-3 px-4 py-2" type="submit">Submit Review
                                        </button>
                                    <?php } else { echo '<p>Already Reviewed</p>'; } } else { ?>
                                    <a href="<?php echo base_url('login') ?>">Please login to continue</a>
                                <?php } ?>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Reviews Filter -->
        </div>
    </section>
    <div class="hr-container">
        <div class="hr"></div>
    </div>
    <!-- Product Review Section End -->
    <!-- Popular this week Section Start-->
    <section>
        <div class="container">
            <div class="d-flex justify-content-between align-items-end related-product  mb-4">
                <p class="title related-product">Popular this week</p>
                <a href="<?= base_url('category/'.$themeSetting['popular_this_week'])?>" class="text-muted latest-blog-section-action text-nowrap">View All</a>
            </div>
            <div
                class="row  row-cols-lg-4 row-cols-md-3 row-cols-2 related-product-cards  justify-content-start g-md-3 g-3">
                <?php foreach (categoryIdByProducts($themeSetting['popular_this_week'], 'DESC', 8) as $pro) {
                    $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $pro->product_id);
                    ?>
                    <div class="col best-seller-card">
                        <div class="card-slider position-relative overflow-hidden">
                            <div class="position-absolute top-2 w-100">
                                <div class="d-flex justify-content-between align-items-center w-100 px-4">
                                    <?php if (!empty($spPric)) { ?>
                                        <span
                                            class="badge light-yellow-badge"> <?= specialPriceAndPriceByOffPercent($spPric, $pro->price) ?>%</span>
                                    <?php } ?>
                                    <span class="badge tomato-badge"></span>
                                </div>
                            </div>
                            <div class="cards-icons-container">
                                <div class="cards-icons">
                                    <?php if ($modules['compare'] == 1) { ?>
                                        <div class="">
                                            <button class="tooltip-icon compare"
                                                    onclick="addToCompare(<?php echo $pro->product_id ?>)"
                                                    data-tooltip="Compare Product" aria-label="Compare Product">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                                     viewBox="0 0 18 19" fill="none">
                                                    <path
                                                        d="M15.2222 13.641V8.41026C15.2222 5.94482 15.2222 4.71123 14.4409 3.9458C13.6604 3.17949 12.4027 3.17949 9.88889 3.17949H7.22222M15.2222 13.641C14.2404 13.641 13.4444 14.4217 13.4444 15.3846C13.4444 16.3476 14.2404 17.1282 15.2222 17.1282C16.2041 17.1282 17 16.3476 17 15.3846C17 14.4217 16.2041 13.641 15.2222 13.641ZM7.22222 3.17949C7.22222 2.56923 8.99467 1.42892 9.44444 1M7.22222 3.17949C7.22222 3.78974 8.99467 4.93005 9.44444 5.35897M2.77778 5.35897V10.5897C2.77778 13.0552 2.77778 14.2888 3.55911 15.0542C4.33956 15.8205 5.59733 15.8205 8.11111 15.8205H10.7778M10.7778 15.8205C10.7778 16.4308 9.00533 17.5719 8.55556 18M10.7778 15.8205C10.7778 15.2103 9.00533 14.0691 8.55556 13.641M4.55556 3.17949C4.55556 4.14245 3.75962 4.92308 2.77778 4.92308C1.79594 4.92308 1 4.14245 1 3.17949C1 2.21653 1.79594 1.4359 2.77778 1.4359C3.75962 1.4359 4.55556 2.21653 4.55556 3.17949Z"
                                                        stroke="#656565" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    <?php } ?>
                                    <?php if ($modules['wishlist'] == 1) { ?>
                                        <div class="">
                                            <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                                                <a href="<?php echo base_url('login'); ?>" class="tooltip-icon favorite"
                                                   data-tooltip="Add to Favorites" aria-label="Add to Favorites">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                         viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M9 16.0125L7.9125 15.0225C4.05 11.52 1.5 9.2025 1.5 6.375C1.5 4.0575 3.315 2.25 5.625 2.25C6.93 2.25 8.1825 2.8575 9 3.81C9.8175 2.8575 11.07 2.25 12.375 2.25C14.685 2.25 16.5 4.0575 16.5 6.375C16.5 9.2025 13.95 11.52 10.0875 15.0225L9 16.0125Z"
                                                            fill="#656565"/>
                                                    </svg>
                                                </a>
                                            <?php } else { ?>
                                                <button onclick="addToWishlist(<?php echo $pro->product_id ?>)"
                                                        class="tooltip-icon favorite" data-tooltip="Add to Favorites"
                                                        aria-label="Add to Favorites">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                         viewBox="0 0 18 18" fill="none">
                                                        <path
                                                            d="M9 16.0125L7.9125 15.0225C4.05 11.52 1.5 9.2025 1.5 6.375C1.5 4.0575 3.315 2.25 5.625 2.25C6.93 2.25 8.1825 2.8575 9 3.81C9.8175 2.8575 11.07 2.25 12.375 2.25C14.685 2.25 16.5 4.0575 16.5 6.375C16.5 9.2025 13.95 11.52 10.0875 15.0225L9 16.0125Z"
                                                            fill="#656565"/>
                                                    </svg>
                                                </button>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="swiper myCardSwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide card-slider-single-slide">
                                        <img class="object-fit-cover"
                                             src="<?= productImageViewUrlNew( $pro->main_image, $pro->image, '261', '257'); ?>"
                                             alt="best seller product"
                                             loading="lazy">
                                    </div>
                                    <?php $allImage = get_array_data_by_id('cc_product_image', 'product_id', $pro->product_id); ?>
                                    <?php if (!empty($allImage)) {
                                        foreach ($allImage as $image) {
                                            ?>
                                            <!-- Slide 2 -->
                                            <div class="swiper-slide card-slider-single-slide">
                                                <img class="object-fit-cover"
                                                     src="<?= productImageViewUrlNew($image->main_image, $image->image, '261', '257'); ?>"
                                                     alt="<?= $image->alt_name ?>" loading="lazy">
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                                <div class="swiper-pagination card-swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <h4 class="recently-viewed-card-title"><a
                                    href="<?= base_url('detail/' . $pro->product_id) ?>"><?php echo substr($pro->name, 0, 60); ?></a>
                            </h4>
                            <div
                                class="d-flex gap-2 flex-wrap align-items-center recently-viewed-card-rating align-items-center">
                                <?php echo product_id_by_rating($pro->product_id, '1'); ?>
                            </div>
                            <div
                                class="d-flex gap-2 flex-xl-nowrap flex-wrap justify-content-between align-items-center">
                                <?php if (empty($spPric)) { ?>
                                    <span
                                        class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($pro->price, $symbol); ?> </span>
                                <?php } else { ?>
                                    <span
                                        class="recently-viewed-card-price prize-before-discount"><?php echo currency_symbol_with_symbol($pro->price, $symbol); ?></span>
                                    <span
                                        class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($spPric, $symbol); ?></span>
                                <?php } ?>
                                <?php echo addToCartBtn($pro->product_id); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- Popular this week Section End-->

</main>

<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script src="<?php echo base_url() ?>/assets/theme_4/swiper-js/swiper-bundle.min.js" defer></script>
<script src="<?php echo base_url() ?>/assets/theme_4/js/details.js" defer></script>
<script src="<?php echo base_url() ?>/assets/theme_4/jquery.star-rating.min.js"></script>
<script src="<?php echo base_url() ?>/assets/theme_4/pagination.js"></script>
<link rel="stylesheet" href="https://pagination.js.org/dist/2.1.5/pagination.css">
<script>
    //review pagination
    $('#paginationjs').pagination({
        dataSource: '<?= base_url("review-data/".$products->product_id) ?>',
        locator: 'items',
        totalNumberLocator: function(response) {
            return response.totalNumber;
        },
        pageSize: 2,
        ajax: {
            beforeSend: function() {
                $('#pagerData').html('<p>Loading data...</p>');
            }
        },
        callback: function(data, pagination) {
            // var html = template(data);
            $('#pagerData').html(data);
        }
    });
    //review pagination




    //rating Circular Chart
    let currentValue = 0;

    function updateCircularChart(value, duration = 1000) {
        const path = document.getElementById("arcProgress");
        const text = document.getElementById("arcValue");

        const max = 5;
        const radius = 39;
        const circumference = 2 * Math.PI * radius;

        path.style.strokeDasharray = circumference;

        const startValue = currentValue;
        const endValue = Math.min(Math.max(value, 0), max);
        const delta = endValue - startValue;
        const startTime = performance.now();

        function animate(time) {
            const elapsed = time - startTime;
            const progress = Math.min(elapsed / duration, 1);

            const current = startValue + delta * progress;
            const percent = current / max;
            path.style.strokeDashoffset = circumference * (1 - percent);
            text.textContent = current.toFixed(1);

            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                currentValue = endValue;
            }
        }

        requestAnimationFrame(animate);
    }
    updateCircularChart(<?= product_id_by_average_rating($products->product_id)?>);
    //rating Circular Chart

    function buyNowAction() {
        $("#addto-cart-form").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    $('#cartReload').load(location.href + " #cartReload");
                    $('#cartReload2').load(location.href + " #cartReload2");
                    $('#mesVal').html(response);
                    $('.btn-count').load(location.href + " .btn-count");
                    $('.body-count').load(location.href + " .body-count");
                    $('#carticon2').css('transform', 'rotate(90deg)');
                    $('#collapseExample').addClass('show');
                    buyNow();
                    $('.message_alert').show();
                    setTimeout(function () {
                        $("#messAlt").fadeOut(1500);
                    }, 600);

                }
            });
        }));

    }

    function buyNow() {
        location.replace("<?php echo base_url('checkout') ?>");
    }

    function optionPriceCalculate(product_id) {
        <?php foreach (get_all_data_array('cc_option') as $v) {
        $fildName = str_replace(' ', '', $v->name);

        if ($v->type == 'radio') { ?>
        var <?php echo strtolower($fildName); ?> =
        $('input[name="<?php echo strtolower($fildName); ?>"]:checked').val();
        <?php }

        if ($v->type == 'select') { ?>
        var <?php echo strtolower($fildName); ?> =
        $('[name="<?php echo strtolower($fildName); ?>"]').val();
        <?php }
        } ?>
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('optionPriceCalculate') ?>",
            data: {
                product_id: product_id,
        <?php foreach (get_all_data_array('cc_option') as $vl) {
        $fildName2 = str_replace(' ', '', $vl->name); ?>
        <?php echo strtolower($fildName2); ?>: <?php echo strtolower($fildName2); ?>,
        <?php
        } ?>
    },
        success: function (data) {
            $('#priceVal').html(data);
        }
    })
        ;
    }

    // filter items sort
    document.addEventListener("DOMContentLoaded", function () {
        // Get all ULs with the class
        let lists = document.querySelectorAll(".filter-items-sort");

        lists.forEach(function (ul) {
            // Grab <li> elements
            let items = Array.from(ul.getElementsByTagName("li"));

            // Sort by <label> text
            items.sort((a, b) => {
                let textA = a.querySelector("label").textContent.trim();
                let textB = b.querySelector("label").textContent.trim();
                return textA.localeCompare(textB, undefined, {numeric: true});
            });

            // Re-append sorted items
            items.forEach(li => ul.appendChild(li));
        });
    });
    $('.ratingPiont').starRating({
        starSize: 1.5,
        showInfo: true
    });

    //review Comment View
    function reviewCommentView(id, proId) {
        $.ajax({
            url: '<?= base_url("review-comment-search")?>',
            type: "POST",
            data: {
                feedback_star: id,
                product_id: proId
            },
            success: function (response) {
                $("#reviewData").html(response); // dynamically update reviews
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }

</script>
<?= $this->endSection() ?>
