<?= $this->extend('Theme/Theme_4/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('Theme/Theme_4/Customer/menu'); ?>
<section class="main-container my-5" id="reloadDiv">
    <div class="container">
        <div class="mb-5">

            <div class="card rounded-0">
                <div class="card-header py-3 bg-white">
                    <h4>Favorite List</h4>
                </div>
                <div class="card-body">
                    <div class="products h-100">
                        <div class="cards-container mt-0 row">


                            <?php
                            $symbol = get_lebel_by_value_in_settings('currency_symbol');
                            $modules = modules_access();
                            foreach ($allProd as $pro) { $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $pro['product_id']); ?>
                                <div class="best-seller-card col-md-6 col-6 col-xl-3  col-lg-4 ">
                                    <div class="card-slider position-relative overflow-hidden">
                                        <div class="position-absolute top-2 w-100">
                                            <div class="d-flex justify-content-between align-items-center w-100 px-4">
                                                <?php if(!empty($spPric)){?>
                                                <span class="badge light-yellow-badge"><?= specialPriceAndPriceByOffPercent($spPric,$pro['price'])?>%</span>
                                                <?php } ?>
                                                <span class="badge tomato-badge">Hot</span>
                                            </div>
                                        </div>
                                        <div class="cards-icons-container">
                                            <div class="cards-icons">
                                                <?php if ($modules['compare'] == 1) { ?>
                                                <div class="">
                                                    <button class="tooltip-icon compare" onclick="addToCompare(<?php echo $pro['product_id'] ?>)" data-tooltip="Compare Product" aria-label="Compare Product">
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
                                                        <button onclick="addToWishlist(<?php echo $pro['product_id'] ?>)" class="tooltip-icon favorite" data-tooltip="Add to Favorites" aria-label="Add to Favorites">
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
                                                    <img class="object-fit-cover" src="<?= productImageViewUrl('uploads/products', $pro['product_id'], $pro['image'], 'noimage.png', '261', '247');?>"
                                                         alt="<?= $pro['alt_name'];?>" loading="lazy">
                                                </div>
                                                <?php $allImage = get_array_data_by_id('cc_product_image', 'product_id', $pro['product_id']);?>
                                                <?php if (!empty($allImage)){
                                                    foreach ($allImage as $image){
                                                ?>
                                                <!-- Slide 2 -->
                                                <div class="swiper-slide card-slider-single-slide">
                                                    <img class="object-fit-cover" src="<?= productImageViewUrl('uploads/products', $image->product_id.'/'.$image->product_image_id, $image->image, 'noimage.png', '261', '247');?>"
                                                         alt="<?= $image->alt_name?>" loading="lazy">
                                                </div>
                                                <?php } }?>
                                            </div>
                                            <div class="swiper-pagination card-swiper-pagination"></div>
                                        </div>
                                    </div>
                                    <div class="card-bottom">
                                        <h4 class="recently-viewed-card-title"><a href="<?= base_url('detail/' . $pro['product_id'])?>"><?php echo substr($pro['name'], 0, 60);?></a></h4>
                                        <div class="d-flex gap-2 flex-wrap align-items-center recently-viewed-card-rating align-items-center">
                                            <?php echo product_id_by_rating($pro['product_id'], '1');?>
                                        </div>
                                        <div class="d-flex gap-2 flex-xl-nowrap flex-wrap justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                               <?php if (empty($spPric)) { ?>
                                                    <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($pro['price'], $symbol);?> </span>
                                               <?php } else { ?>
                                                   <span class="recently-viewed-card-price prize-before-discount me-2" ><?php echo currency_symbol_with_symbol($pro['price'], $symbol);?></span> <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($spPric, $symbol);?></span>
                                               <?php } ?>
                                            </div>
                                            <?php echo addToCartBtn($pro['product_id']);?>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>


                        </div>
                    </div>

                    <?php echo $links; ?>
                </div>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script>
</script>
<?= $this->endSection() ?>
