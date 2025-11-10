<?= $this->extend('Theme/Theme_4/layout') ?>
<?= $this->section('content') ?>
<?php
    $modules = modules_access();
    $themeSetting = get_theme_settings();
    $themeAltName = getThemeAltNameSettings();
    $symbol = get_lebel_by_value_in_settings('currency_symbol')
?>
<div class="header2">
    <section class="slider-container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- slide 1 -->
                <div class="swiper-slide">
                    <div class="row slider-content-container container ">
                        <div class="col-md-6 header-content text-md-start text-center animation ">
                            <h1 class=""><?= $themeSetting['slider4_text_1']?></h1>
                            <p class=""><?= $themeSetting['slider4_sub_text_1']?></p>
                            <a href="<?= base_url('category/'.$themeSetting['slider4_category_1'])?>" class="btn-base btn-1">Browse Our Collections</a>
                        </div>
                        <div class="col-md-6">
                            <div class="header-content2">
                                <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/slider', '', $themeSetting['slider4_1'], 'noimage.png', '477', '366');?>"  alt="<?= $themeAltName['slider4_1']?>" srcset="<?= commonImageViewUrl('uploads/slider', '', $themeSetting['slider4_1'], 'noimage.png', '300', '280');?> 300w,<?= commonImageViewUrl('uploads/slider', '', $themeSetting['slider4_1'], 'noimage.png', '450', '330');?> 450w" fetchpriority="high" loading="eager">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slide 2 -->
                <div class="swiper-slide">
                    <div class="row slider-content-container container ">
                        <div class="col-md-6 header-content text-md-start text-center animation">
                            <h1 class=""><?= $themeSetting['slider4_text_2']?></h1>
                            <p class=""><?= $themeSetting['slider4_sub_text_2']?></p>
                            <a href="<?= base_url('category/'.$themeSetting['slider4_category_2'])?>" class="btn-base btn-1">Browse Our Collections</a>
                        </div>
                        <div class="col-md-6">
                            <div class="header-content2">
                                <img src="<?= commonImageViewUrl('uploads/slider', '', $themeSetting['slider4_2'], 'noimage.png', '477', '366');?>"
                                     srcset="<?= commonImageViewUrl('uploads/slider', '', $themeSetting['slider4_2'], 'noimage.png', '300', '280');?> 300w,<?= commonImageViewUrl('uploads/slider', '', $themeSetting['slider4_2'], 'noimage.png', '450', '330');?> 450w"
                                     alt="<?= $themeAltName['slider4_2']?>" fetchpriority="high" loading="eager">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slide 3 -->
                <div class="swiper-slide">
                    <div class="row slider-content-container container ">
                        <div class="col-md-6 header-content text-md-start text-center animation">
                            <h1 class=""><?= $themeSetting['slider4_text_3']?></h1>
                            <p class=""><?= $themeSetting['slider4_sub_text_3']?></p>
                            <a href="<?= base_url('category/'.$themeSetting['slider4_category_3'])?>" class="btn-base btn-1">Browse Our Collections</a>
                        </div>
                        <div class="col-md-6">
                            <div class="header-content2">
                                <?php $sli_3 = get_lebel_by_value_in_theme_settings('slider_3'); ?>
                                <img src="<?= commonImageViewUrl('uploads/slider', '', $themeSetting['slider4_3'], 'noimage.png', '477', '366');?>"
                                     srcset="<?= commonImageViewUrl('uploads/slider', '', $themeSetting['slider4_3'], 'noimage.png', '300', '280');?> 300w,<?= commonImageViewUrl('uploads/slider', '', $themeSetting['slider4_3'], 'noimage.png', '450', '330');?> 450w"
                                     alt="<?= $themeAltName['slider4_3']?>" fetchpriority="high" loading="eager">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
</div>

<main>
    <!-- Watch section start  -->
    <section class="container watch-section">
        <div class="row g-4 ">
            <!-- card 1 -->
            <div class="col-md-6">
                <div class="watch-card watch-card-10 hover-lift position-relative">
                    <img class="position-absolute" src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['top_category_left_image'], 'noimage.png', '546', '162')?>" alt="<?= $themeAltName['top_category_left_image']?>">
                    <div class="watch-card-content d-flex flex-column justify-content-between h-100">
                        <div class="watch-card-content">
                            <h4><?= $themeSetting['top_category_left_title'];?></h4>
                            <p><?= $themeSetting['top_category_left_sub_title'];?></p>
                        </div>
                        <div class="">
                            <a href="<?= base_url('category/'.$themeSetting['top_category_left_category']);?>" class="btn-base text-decoration-none hover-lift-btn rounded-2 btn-1 slower">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 2 -->
            <div class="col-md-6">

                <div class="watch-card watch-card-20 hover-lift position-relative">
                    <img class="position-absolute" src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['top_category_right_image'], 'noimage.png', '546', '162')?>" alt="<?= $themeAltName['top_category_right_image']?>">

                    <div class="watch-card-content d-flex flex-column justify-content-between h-100">
                        <div class="watch-card-content ">
                            <h4><?= $themeSetting['top_category_right_title'];?></h4>
                            <p><?= $themeSetting['top_category_right_sub_title'];?></p>
                        </div>
                        <div class="">
                            <a href="<?= base_url('category/'.$themeSetting['top_category_right_category']);?>" class="btn-base text-decoration-none hover-lift-btn rounded-2 btn-1 slower">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Watch section end  -->
    <!-- Testimonial section start  -->
    <section>
        <div class="container testimonial-section">
            <div class="row g-4 row-cols-lg-5 row-cols-md-4 row-cols-sm-3">
                <div class="testimonial-single-item mb-3 mb-lg-5">
                    <div class="testimonial-image-container mx-auto d-flex justify-content-center align-items-center">
                        <img src="<?php echo base_url() ?>/assets/theme_4/images/testimonial/delivery-svgrepo-com-1-1.svg" loading="lazy"
                             alt="elivery svgrepo testimonoal image">
                    </div>
                    <div class="testimonial-content">
                        <h5 class="">Fast Shipping</h5>
                        <p class="my-0">Delivery within 1 hours</p>
                    </div>
                </div>
                <div class="testimonial-single-item mb-3 mb-lg-5">
                    <div class="testimonial-image-container mx-auto d-flex justify-content-center align-items-center">
                        <img src="<?php echo base_url() ?>/assets/theme_4/images/testimonial/delivery-25-svgrepo-com-2.svg" alt="elivery svgrepo testimonoal image"
                             loading="lazy">
                    </div>
                    <div class="testimonial-content">
                        <h5 class="">100% Authentic Watches</h5>
                        <p class="my-0">Fruits, Veggies and juice</p>
                    </div>
                </div>
                <div class="testimonial-single-item mb-3 mb-lg-5">
                    <div class="testimonial-image-container mx-auto d-flex justify-content-center align-items-center">
                        <img src="<?php echo base_url() ?>/assets/theme_4/images/testimonial/support-technology-svgrepo-com-3.svg" loading="lazy"
                             alt="elivery svgrepo testimonoal image">
                    </div>
                    <div class="testimonial-content">
                        <h5 class="">24/7 Customer Support</h5>
                        <p class="my-0">Support online 24/7</p>
                    </div>
                </div>
                <div class="testimonial-single-item mb-3 mb-lg-5">
                    <div class="testimonial-image-container mx-auto d-flex justify-content-center align-items-center">
                        <img src="<?php echo base_url() ?>/assets/theme_4/images/testimonial/diet-fresh-fruit-svgrepo-com-4.svg" loading="lazy"
                             alt="elivery svgrepo testimonoal image">
                    </div>
                    <div class="testimonial-content">
                        <h5 class="">Hassle-Free Returns</h5>
                        <p class="my-0">No Color, No Chemical</p>
                    </div>
                </div>
                <div class="testimonial-single-item">
                    <div class="testimonial-image-container mx-auto d-flex justify-content-center align-items-center">
                        <img src="<?php echo base_url() ?>/assets/theme_4/images/testimonial/diet-fresh-fruit-svgrepo-com-5.svg"
                             alt="elivery svgrepo testimonoal image">
                    </div>
                    <div class="testimonial-content">
                        <h5 class="">Easy Payments</h5>
                        <p class="my-0">No Color, No Chemical</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section End -->
    <!-- Recently Viewed Section Start  -->
    <section class="recently-view-section">
        <div class=" container mx-auto">
            <div class="row justify-content-center align-items-center g-3">
                <div class="col-xl-4 col-12 hover-lift">
                    <img class="img-fluid recently-veiw-image" src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['recent_product_image'], 'noimage.png', '361', '480')?>"
                         loading="lazy" alt="<?= $themeAltName['recent_product_image']?>">
                </div>
                <div class="col-xl-8 col-12">
                    <div class="recently-viewed-header">
                        <h3 class="mb-0"><?= $themeSetting['recent_product_title'];?></h3>
                        <p class="subtitle"><?= $themeSetting['recent_product_sub_title'];?></p>
                    </div>
                    <div class=" row row-cols-1 row-cols-lg-2 justify-content-md-start w-100 g-3 justify-content-center align-items-center">
                        <?php foreach (categoryIdByProducts($themeSetting['recent_product_category'], 'DESC', 4) as $product){
                            $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $product->product_id);
                            ?>
                        <!-- card 1 -->
                        <div class="col">
                            <div class="recently-viewed-card d-flex">
                                <div class="recently-viewed-card-image d-flex justify-content-center align-items-center mx-auto col-4">
                                    <img class="img-fluid" src="<?= productImageViewUrl('uploads/products', $product->product_id, $product->image, 'noimage.png', '85', '85');?>" loading="lazy"
                                         alt="<?= $product->alt_name;?>">
                                </div>
                                <div class="recently-viewed-card-content  col-8">
                                    <div class="d-flex justify-content-between w-100 recently-viewed-card-content-badges">
                                        <span class="badge badge-light-pink">&nbsp;</span>
                                        <?php if(!empty($spPric)){?>
                                            <span> <?= specialPriceAndPriceByOffPercent($spPric,$product->price)?>%</span>
                                        <?php } ?>
                                    </div>
                                    <h5 class="recently-viewed-card-title"><a href="<?= base_url('detail/' . $product->product_id)?>"><?php echo substr($product->name, 0, 60);?></a> </h5>
                                    <div class="d-flex gap-2 flex-wrap align-items-center recently-viewed-card-rating align-items-center">
                                        <?php echo product_id_by_rating($product->product_id, '1');?>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-between align-items-center">
                                        <?php if (empty($spPric)) { ?>
                                            <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($product->price, $symbol);?> </span>
                                        <?php } else { ?>
                                            <span class="recently-viewed-card-price prize-before-discount" ><?php echo currency_symbol_with_symbol($product->price, $symbol);?></span> <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($spPric, $symbol);?></span>
                                        <?php } ?>
                                        <?php echo addToCartBtn($product->product_id);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Best Seller Section Start -->
    <section class="container">
        <div class="best-sellers-section position-relative w-100 hover-lift">
            <img class="img-fluid w-100" src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_one_image'], 'noimage.png', '1116', '177')?>" srcset="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_one_image'], 'noimage.png', '516', '160')?> 516w,
            <?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_one_image'], 'noimage.png', '696', '160')?> 669w,
            <?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_one_image'], 'noimage.png', '1116', '177')?> 1199w" alt="<?= $themeAltName['section_one_image']?>" loading="lazy">

            <div class="best-seller-gradient-overlay position-absolute top-0 start-0 w-100 h-100"></div>

            <div class="best-seller-card-content position-absolute bottom-0 start-0 w-100 z-3 p-4">
                <h2 class="title text-white"><?= $themeSetting['section_one_title'];?></h2>
                <div class="d-flex justify-content-between">
                    <p class="subtitle mb-0 "><?= $themeSetting['section_one_sub_title'];?>.</p>
                    <a href="<?= base_url('category/'. $themeSetting['section_one_category'])?>"
                       class="text-white text-decoration-none latest-blog-section-action text-nowrap view-all-link">View All
                        &#62;&#62;</a>
                </div>
            </div>
        </div>

        <div class="cards-container row">
            <?php foreach (categoryIdByProducts($themeSetting['section_one_category'], 'DESC', 4) as $pro){
            $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $pro->product_id);
            ?>
            <div class="best-seller-card col-md-6 col-lg-4 col-xl-3 col-6">
                <div class="card-slider position-relative overflow-hidden">
                    <div class="position-absolute top-2 w-100">
                        <div class="d-flex justify-content-between align-items-center w-100 px-4">
                            <?php if(!empty($spPric)){?>
                                <span class="badge light-yellow-badge"> <?= specialPriceAndPriceByOffPercent($spPric,$pro->price)?>%</span>
                            <?php } ?>
                            <span class="badge tomato-badge"></span>
                        </div>
                    </div>
                    <div class="cards-icons-container">
                        <div class="cards-icons">
                            <?php if ($modules['compare'] == 1) { ?>
                                <div class="">
                                    <button class="tooltip-icon compare" onclick="addToCompare(<?php echo $pro->product_id ?>)" data-tooltip="Compare Product" aria-label="Compare Product">
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
                                        <a href="<?php echo base_url('login');?>" class="tooltip-icon favorite" data-tooltip="Add to Favorites" aria-label="Add to Favorites">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                 viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M9 16.0125L7.9125 15.0225C4.05 11.52 1.5 9.2025 1.5 6.375C1.5 4.0575 3.315 2.25 5.625 2.25C6.93 2.25 8.1825 2.8575 9 3.81C9.8175 2.8575 11.07 2.25 12.375 2.25C14.685 2.25 16.5 4.0575 16.5 6.375C16.5 9.2025 13.95 11.52 10.0875 15.0225L9 16.0125Z"
                                                    fill="#656565"/>
                                            </svg>
                                        </a>
                                    <?php } else { ?>
                                        <button onclick="addToWishlist(<?php echo $pro->product_id ?>)" class="tooltip-icon favorite" data-tooltip="Add to Favorites" aria-label="Add to Favorites">
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
                            <!-- slide 1 -->
                            <div class="swiper-slide card-slider-single-slide">
                                <img class="object-fit-cover" src="<?= productImageViewUrl('uploads/products', $pro->product_id, $pro->image, 'noimage.png', '261', '257');?>" alt="best seller product"
                                     loading="lazy">
                            </div>
                            <?php $allImage = get_array_data_by_id('cc_product_image', 'product_id', $pro->product_id);?>
                            <?php if (!empty($allImage)){
                                foreach ($allImage as $image){
                                    ?>
                                    <!-- Slide 2 -->
                                    <div class="swiper-slide card-slider-single-slide">
                                        <img class="object-fit-cover" src="<?= productImageViewUrl('uploads/products', $image->product_id.'/'.$image->product_image_id, $image->image, 'noimage.png', '261', '257');?>"
                                             alt="<?= $image->alt_name?>" loading="lazy">
                                    </div>
                            <?php } }?>
                        </div>
                        <div class="swiper-pagination card-swiper-pagination"></div>
                    </div>
                </div>
                <div class="card-bottom">
                    <h4 class="recently-viewed-card-title"><a href="<?= base_url('detail/' . $pro->product_id)?>"><?php echo substr($pro->name, 0, 60);?></a> </h4>
                    <div class="d-flex gap-2 flex-wrap align-items-center recently-viewed-card-rating align-items-center">
                        <?php echo product_id_by_rating($pro->product_id, '1');?>
                    </div>
                    <div class="d-flex gap-2 flex-xl-nowrap flex-wrap justify-content-between align-items-center">
                        <?php if (empty($spPric)) { ?>
                            <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($pro->price, $symbol);?> </span>
                        <?php } else { ?>
                            <span class="recently-viewed-card-price prize-before-discount" ><?php echo currency_symbol_with_symbol($pro->price, $symbol);?></span> <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($spPric, $symbol);?></span>
                        <?php } ?>
                        <?php echo addToCartBtn($pro->product_id);?>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>
    </section>
    <!-- Best Seller Section End -->
    <!-- New Arrival Section start  -->
    <section class="container">
        <div class="best-sellers-section position-relative w-100 hover-lift">
            <img class="img-fluid w-100" src="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_two_image'], 'noimage.png', '1116', '177')?>" srcset="<?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_two_image'], 'noimage.png', '516', '160')?> 516w,
            <?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_two_image'], 'noimage.png', '696', '160')?> 669w,
            <?= commonImageViewUrl('uploads/home_category', '', $themeSetting['section_two_image'], 'noimage.png', '1116', '177')?> 1199w" alt="<?= $themeAltName['section_two_image']?>" loading="lazy">

            <div class="best-seller-gradient-overlay position-absolute top-0 start-0 w-100 h-100"></div>

            <div class="best-seller-card-content position-absolute bottom-0 start-0 w-100 z-3 p-4">
                <h2 class="title text-white"><?= $themeSetting['section_two_title'];?></h2>
                <div class="d-flex justify-content-between">
                    <p class="subtitle mb-0 "><?= $themeSetting['section_two_sub_title'];?></p>
                    <a href="<?= base_url('category/'. $themeSetting['section_two_category'])?>" class="text-white text-decoration-none latest-blog-section-action text-nowrap ">View All
                        &#62;&#62;</a>
                </div>
            </div>
        </div>

        <div class="cards-container row">
            <?php foreach (categoryIdByProducts($themeSetting['section_two_category'], 'DESC', 4) as $pro){
                $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $pro->product_id);
                ?>
                <div class="best-seller-card col-md-6 col-lg-4 col-xl-3 col-6">
                    <div class="card-slider position-relative overflow-hidden">
                        <div class="position-absolute top-2 w-100">
                            <div class="d-flex justify-content-between align-items-center w-100 px-4">
                                <?php if(!empty($spPric)){?>
                                    <span class="badge light-yellow-badge"> <?= specialPriceAndPriceByOffPercent($spPric,$pro->price)?>%</span>
                                <?php } ?>
                                <span class="badge tomato-badge"></span>
                            </div>
                        </div>
                        <div class="cards-icons-container">
                            <div class="cards-icons">
                                <?php if ($modules['compare'] == 1) { ?>
                                    <div class="">
                                        <button class="tooltip-icon compare" onclick="addToCompare(<?php echo $pro->product_id ?>)" data-tooltip="Compare Product" aria-label="Compare Product">
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
                                            <a href="<?php echo base_url('login');?>" class="tooltip-icon favorite" data-tooltip="Add to Favorites" aria-label="Add to Favorites">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                     viewBox="0 0 18 18" fill="none">
                                                    <path
                                                        d="M9 16.0125L7.9125 15.0225C4.05 11.52 1.5 9.2025 1.5 6.375C1.5 4.0575 3.315 2.25 5.625 2.25C6.93 2.25 8.1825 2.8575 9 3.81C9.8175 2.8575 11.07 2.25 12.375 2.25C14.685 2.25 16.5 4.0575 16.5 6.375C16.5 9.2025 13.95 11.52 10.0875 15.0225L9 16.0125Z"
                                                        fill="#656565"/>
                                                </svg>
                                            </a>
                                        <?php } else { ?>
                                            <button onclick="addToWishlist(<?php echo $pro->product_id ?>)" class="tooltip-icon favorite" data-tooltip="Add to Favorites" aria-label="Add to Favorites">
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
                                <!-- slide 1 -->
                                <div class="swiper-slide card-slider-single-slide">
                                    <img class="object-fit-cover" src="<?= productImageViewUrl('uploads/products', $pro->product_id, $pro->image, 'noimage.png', '261', '257');?>" alt="best seller product"
                                         loading="lazy">
                                </div>
                                <?php $allImage = get_array_data_by_id('cc_product_image', 'product_id', $pro->product_id);?>
                                <?php if (!empty($allImage)){
                                    foreach ($allImage as $image){
                                        ?>
                                        <!-- Slide 2 -->
                                        <div class="swiper-slide card-slider-single-slide">
                                            <img class="object-fit-cover" src="<?= productImageViewUrl('uploads/products', $image->product_id.'/'.$image->product_image_id, $image->image, 'noimage.png', '261', '257');?>"
                                                 alt="<?= $image->alt_name?>" loading="lazy">
                                        </div>
                                    <?php } }?>
                            </div>
                            <div class="swiper-pagination card-swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="card-bottom">
                        <h4 class="recently-viewed-card-title"><a href="<?= base_url('detail/' . $pro->product_id)?>"><?php echo substr($pro->name, 0, 60);?></a> </h4>
                        <div class="d-flex gap-2 flex-wrap align-items-center recently-viewed-card-rating align-items-center">
                            <?php echo product_id_by_rating($pro->product_id, '1');?>
                        </div>
                        <div class="d-flex gap-2 flex-xl-nowrap flex-wrap justify-content-between align-items-center">
                            <?php if (empty($spPric)) { ?>
                                <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($pro->price, $symbol);?> </span>
                            <?php } else { ?>
                                <span class="recently-viewed-card-price prize-before-discount" ><?php echo currency_symbol_with_symbol($pro->price, $symbol);?></span> <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($spPric, $symbol);?></span>
                            <?php } ?>
                            <?php echo addToCartBtn($pro->product_id);?>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </section>
    <!-- New Arrival Section end -->

    <!-- ITs time to shop section start  -->
    <?php
        $offerId = $themeSetting['offer_view'];
        $offerBanner = get_data_by_id('banner','cc_offer','offer_id',$offerId);
        if (!empty($offerId)){
    ?>
    <section class="container its-time-to-shop-section">
        <div class="row g-4">
            <div class="col-xl-6 col-12">
                <div class="times-to-shop hover-lift">
                    <img src="<?= commonImageViewUrl('uploads/offer', $offerId, $offerBanner, 'noimage.png', '546', '449');?>" srcset="<?= commonImageViewUrl('uploads/offer', $offerId, $offerBanner, 'noimage.png', '392', '306');?> 392w,
                    <?= commonImageViewUrl('uploads/offer', $offerId, $offerBanner, 'noimage.png', '524', '409');?> 524w,
                    <?= commonImageViewUrl('uploads/offer', $offerId, $offerBanner, 'noimage.png', '546', '449');?> 546w,
                    <?= commonImageViewUrl('uploads/offer', $offerId, $offerBanner, 'noimage.png', '696', '544');?> 696w,
                    <?= commonImageViewUrl('uploads/offer', $offerId, $offerBanner, 'noimage.png', '937', '771');?> 936w" sizes="(max-width: 1200px) 100vw, 40vw" loading="lazy" alt="offer">
                    <div class="inner-linier-gradient">
                        <img src="<?php echo base_url() ?>/assets/theme_4/images/best-seller/its-time-to-shopoverlay.png" alt="ts-time-to-shopoverlay"
                             loading="lazy">
                    </div>
                    <div class="times-to-shop-inner-content position-absolute bottom-0 p-5">
<!--                        <h2 class="text-white">30% off</h2>-->
                        <p class="text-white">It's Time to Shop</p>
                        <a href="#" class="btn-base btn-1">View More</a>
                    </div>
                </div>
            </div>
            <?php
                foreach (offerIdByProducts($offerId) as $pro){
                    $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $pro->product_id);
            ?>
            <!-- card 1 -->
            <div class="best-seller-card col-md-6 col-6 col-xl-3  col-lg-4 ">
                <div class="card-slider position-relative overflow-hidden">
                    <div class="position-absolute top-2 w-100">
                        <div class="d-flex justify-content-between align-items-center w-100 px-4">
                            <?php if(!empty($spPric)){?>
                                <span class="badge light-yellow-badge"> <?= specialPriceAndPriceByOffPercent($spPric,$pro->price)?>%</span>
                            <?php } ?>
                            <span class="badge tomato-badge"></span>
                        </div>
                    </div>
                    <div class="cards-icons-container">
                        <div class="cards-icons">
                            <?php if ($modules['compare'] == 1) { ?>
                                <div class="">
                                    <button class="tooltip-icon compare" onclick="addToCompare(<?php echo $pro->product_id ?>)" data-tooltip="Compare Product" aria-label="Compare Product">
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
                                        <a href="<?php echo base_url('login');?>" class="tooltip-icon favorite" data-tooltip="Add to Favorites" aria-label="Add to Favorites">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                 viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M9 16.0125L7.9125 15.0225C4.05 11.52 1.5 9.2025 1.5 6.375C1.5 4.0575 3.315 2.25 5.625 2.25C6.93 2.25 8.1825 2.8575 9 3.81C9.8175 2.8575 11.07 2.25 12.375 2.25C14.685 2.25 16.5 4.0575 16.5 6.375C16.5 9.2025 13.95 11.52 10.0875 15.0225L9 16.0125Z"
                                                    fill="#656565"/>
                                            </svg>
                                        </a>
                                    <?php } else { ?>
                                        <button onclick="addToWishlist(<?php echo $pro->product_id ?>)" class="tooltip-icon favorite" data-tooltip="Add to Favorites" aria-label="Add to Favorites">
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
                            <!-- slide 1 -->
                            <div class="swiper-slide card-slider-single-slide">
                                <img class="object-fit-cover" src="<?= productImageViewUrl('uploads/products', $pro->product_id, $pro->image, 'noimage.png', '261', '257');?>"
                                     alt="<?= $pro->alt_name;?>" loading="lazy">
                            </div>
                            <?php $allImage = get_array_data_by_id('cc_product_image', 'product_id', $pro->product_id);?>
                            <?php if (!empty($allImage)){
                                foreach ($allImage as $image){
                                    ?>
                                    <!-- Slide 2 -->
                                    <div class="swiper-slide card-slider-single-slide">
                                        <img class="object-fit-cover" src="<?= productImageViewUrl('uploads/products', $image->product_id.'/'.$image->product_image_id, $image->image, 'noimage.png', '261', '257');?>"
                                             alt="<?= $image->alt_name?>" loading="lazy">
                                    </div>
                                <?php } }?>
                        </div>
                        <div class="swiper-pagination card-swiper-pagination"></div>
                    </div>
                </div>
                <div class="card-bottom">
                    <div class="">
                    </div>
                    <h4 class="recently-viewed-card-title"><a href="<?= base_url('detail/' . $pro->product_id)?>"><?= $pro->name;?></a> </h4>
                    <div class="d-flex gap-2 flex-wrap align-items-center recently-viewed-card-rating align-items-center">
                        <?php echo product_id_by_rating($pro->product_id, '1');?>
                    </div>
                    <div class="d-flex gap-2 flex-xl-nowrap flex-wrap justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <?php if (empty($spPric)) { ?>
                                <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($pro->price, $symbol);?> </span>
                            <?php } else { ?>
                                <span class="recently-viewed-card-price prize-before-discount me-2" ><?php echo currency_symbol_with_symbol($pro->price, $symbol);?></span> <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($spPric, $symbol);?></span>
                            <?php } ?>
                        </div>
                        <?php echo addToCartBtn($pro->product_id);?>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>
    </section>
    <!-- ITs time to shop section End  -->
    <?php } ?>
    <!-- Our Supplier section start  -->
    <section class="our-supplier-section container">
        <div class="our-supplier-header text-center">
            <div class="our-supplier-header-content text-start">
                <h3 class="title ">Our Supplier</h3>
                <p class="subtitle ">Casio Edifice Solar Powered </p>
            </div>
        </div>
        <div class="our-supplier-slider-container">
            <div class="swiper our-supplier-Swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($brand as $val){ ?>
                    <div class="swiper-slide our-supplier-slide">
                        <img src="<?= commonImageViewUrl('uploads/brand', '', $val->image, 'noimage.png', '142', '80');?>" loading="lazy" alt="<?= $val->alt_name?>">
                    </div>
                    <?php } ?>

                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
    </section>
    <!-- Our Supplier section End  -->
    <?php if ($modules['blog'] == 1) { ?>
    <!-- Latest Blog section start  -->
    <section class="latest-blog-section container">
        <h3 class="title">Latest Blog</h3>
        <div class="d-flex justify-content-between align-items-center">
            <p class="subtitle">Choose your fresh Vegetables. No chemical</p>
            <a href="<?php echo base_url('blog') ?>" class="text-decoration-none latest-blog-section-action text-nowrap">All Blogs
                &#62;&#62;</a>
        </div>
        <div class="latest-blog-section-card-container row row-cols-xl-4 row-cols-lg-3 row-cols-2 g-md-3 g-2">
            <?php foreach ($blogs as $blog){ ?>
            <!-- blog-card 1 -->
            <div class="latest-blog-section-card mb-3 mb-">
                <div class="latest-blog-section-card-image-container">
                    <img src="<?= commonImageViewUrl('uploads/blog', $blog->blog_id, $blog->image, 'noimage.png', '267', '190');?>" alt="<?= $blog->alt_name?>" loading="lazy">
                </div>
                <div class="latest-blog-section-card-content">
                    <p class="latest-blog-section-card-published-at"><?= invoiceDateFormat($blog->publish_date)?> - <?= get_data_by_id('name', 'cc_users', 'user_id', $blog->createdBy);?></p>
                    <h4 class="latest-blog-section-card-title"><?= $blog->blog_title;?> </h4>
                    <a href="<?= base_url('blog-view/' . $blog->blog_id)?>" class="text-decoration-none latest-blog-section-action text-nowrap">Read More
                        &#62;&#62;</a>

                </div>
            </div>
            <?php } ?>

        </div>
    </section>
    <?php } ?>
    <!-- Latest Blog section end  -->

    <!-- Newsletter section Start -->
    <section class="newsletter-section">
        <div class="container">
            <div class="row justify-content-center align-items-center ">
                <div class="col-md-6">
                    <div class="newsletter-section-header">
                        <div class="newsletter-section-content text-md-start">
                            <h3 class="title mb-2">Subscribe Our Newsletter!</h3>
                            <p class="subtitle mb-0">Be the first to know our new blog posts and exclusive Offers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="#" method="post" class="w-100 w-md-auto">
                        <div class="input-group subscribe-group">
                            <input type="email" name="subscribe_email" id="subscribe_email" class="form-control" placeholder="Email Address" aria-label="Email Address"
                                   aria-describedby="button-addon2">
                            <button class="btn btn-subscribe btn-1" onclick="subscribe()" type="button" id="button-addon2">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter section End -->



</main>

<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script>
</script>
<?= $this->endSection() ?>
