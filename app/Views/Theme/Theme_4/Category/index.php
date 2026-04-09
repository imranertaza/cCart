<?= $this->extend('Theme/Theme_4/layout') ?>
<?= $this->section('content') ?>

<?= $this->section('caa_link') ?>
<link href="<?php echo base_url() ?>/assets/theme_4/css/product-details.css" rel="stylesheet" media="print"
      onload="this.media='all'">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_4/css/category.css" media="print"
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

    /* Left side: Image slider */
    .flat-card-view {
        max-height: 210px;
    }

    .flat-card-view .card-slider {
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-radius: 16px 0 0 16px;
        max-width: 190px;
        height: 100%;
        overflow: hidden;
    }

    /* Right side: Product content */
    .flat-card-view .card-bottom {
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-radius: 0 2px 2px 0;
        border: 1px solid #E0E0E0;
        border-left: none;
        height: 100%;
        padding: 16px;
        box-shadow: none !important;
        width: 100%;
    }

    /* Image inside slider */
    .flat-card-view .card-slider-single-slide img {
        max-height: 75%;
        object-fit: contain !important;
        width: auto;
        display: block;
        margin: 0 auto;
    }

    /* Optional: Ensure Swiper wrapper fills height */
    .flat-card-view .swiper.myCardSwiper,
    .flat-card-view .swiper-wrapper {
        height: 100%;
    }

    .flat-card-view .cards-icons-container {
        top: 36%;
    }

    .list-button.active, .grid-button.active {
        background: var(--primary-color) !important;
    }

    .list-button.active svg path, .grid-button.active svg path {
        fill: #fff !important;
    }

    .category-filter {
        display: flex;
    }

    @media screen and (max-width: 768px) {
        .category-filter {
            display: none;
        }

        .rating-container {
            width: 100%;
        }
    }

    .category-filter.show {
        display: flex;
    }

    .ui-slider-range {
        background: var(--primary-color) !important;
    }

    .ui-state-active,
    .ui-widget-content .ui-state-active,
    .ui-widget-header .ui-state-active,
    a.ui-button:active,
    .ui-button:active,
    .ui-button.ui-state-active:hover {
        border: 1px solid #c5c5c5;
        background: #f6f6f6;
    }
</style>
<?= $this->endSection() ?>


<div class="container">

    <nav class="breadcrumb-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <?php if (!empty($prod_cat_id)) {
    $par_id = get_data_by_id('parent_id', 'cc_product_category', 'prod_cat_id', $prod_cat_id);
    $url2   = base_url('category/' . $prod_cat_id);

    if (!empty($par_id)) {
        $url = base_url('category/' . $par_id); ?>
            <li class="breadcrumb-item"><a href="<?= $url?>"><?= get_data_by_id('category_name', 'cc_product_category', 'prod_cat_id', $par_id)?></a></li>
            <?php
    } ?>
            <li class="breadcrumb-item"><a href="<?= $url2?>"><?= get_data_by_id('category_name', 'cc_product_category', 'prod_cat_id', $prod_cat_id); ?></a></li>
            <?php
} else {?>
                <li class="breadcrumb-item"><a href="#">Search Result</a></li>
            <?php } ?>
        </ol>
    </nav>


</div>

<main>
    <form action="<?php echo base_url('category_url_generate')?>" method="post" id="searchForm"><?= csrf_field() ?>  </form>
    <input type="hidden" name="global_search" form="searchForm" value="<?php echo $keywordSearch;?>">
    <section class="container">
        <div class="offer-section hover-lift">
            <div class="row justify-content-center align-items-center py-xl-0 py-5 gap-md-0 gap-3 ">
                <div class="col-md-8">
                    <h2 class="title offer-section-title">20% off only today and get special gift!</h2>
                    <p class="subtitle offer-section-subtitle">Lorem Ipsum is simply dummy text of the printing and
                        typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo base_url() ?>/assets/theme_4/images/category-page/offer-section/offer-section-img.png" draggable="false" loading="lazy" alt="category image" loading="lazy" fetchpriority="high">
                </div>
            </div>
        </div>
    </section>
    <div class="hr-container container offer-container-bottom-hr">
        <div class="hr col"></div>
    </div>
    <!-- related product section end -->
    <!-- Product Review Section Start -->
    <section>
        <div class="container">
            <!-- Reviews Filter and Review Lists -->
            <?php
                $modules = modules_access();
                $sSel    = !empty($searchPrice) ? 'form="searchForm"' : '';
            ?>
            <div class="d-flex gap-md-4 flex-wrap flex-md-nowrap product-reviews">
                <button class="btn list-button text-white mb-2 active-view d-flex align-items-center active gap-2 d-md-none"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                        aria-controls="offcanvasExample">
                    <span class="d-inline-flex">
                      <!-- Filter icon -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filter"
                           viewBox="0 0 16 16">
                        <path
                            d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5z" />
                      </svg>
                    </span>
                    <span>Filter</span>
                </button>

                <div id="sideView"></div>





                <div class="flex-grow-1">
                    <div
                        class="d-flex flex-wrap align-items-center justify-content-xl-between justify-content-start gap-3 mb-5">
                        <p class="title search-result-text ">Showing: <?php echo $totalPro;?> results</p>
                        <div class="ms-xl-auto d-flex align-items-center gap-2 product-top-nav">
                            <div class="d-flex gap-2" id="myTab" role="tablist">
                              <span role="presentation">
                            <button class="grid-button active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane"
                                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"
                                    aria-label="show grid view">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                   fill="none">
                                <path
                                    d="M3.125 8.74997C2.95924 8.74997 2.80027 8.68412 2.68306 8.56691C2.56585 8.4497 2.5 8.29073 2.5 8.12497V3.12622C2.5 2.96046 2.56585 2.80149 2.68306 2.68428C2.80027 2.56707 2.95924 2.50122 3.125 2.50122H8.125C8.29076 2.50122 8.44973 2.56707 8.56694 2.68428C8.68415 2.80149 8.75 2.96046 8.75 3.12622V8.12497C8.75 8.29073 8.68415 8.4497 8.56694 8.56691C8.44973 8.68412 8.29076 8.74997 8.125 8.74997H3.125ZM11.875 8.74997C11.7092 8.74997 11.5503 8.68412 11.4331 8.56691C11.3158 8.4497 11.25 8.29073 11.25 8.12497V3.12622C11.25 2.96046 11.3158 2.80149 11.4331 2.68428C11.5503 2.56707 11.7092 2.50122 11.875 2.50122H16.8738C17.0395 2.50122 17.1985 2.56707 17.3157 2.68428C17.4329 2.80149 17.4988 2.96046 17.4988 3.12622V8.12497C17.4988 8.29073 17.4329 8.4497 17.3157 8.56691C17.1985 8.68412 17.0395 8.74997 16.8738 8.74997H11.875ZM3.125 17.5C2.95924 17.5 2.80027 17.4341 2.68306 17.3169C2.56585 17.1997 2.5 17.0407 2.5 16.875V11.875C2.5 11.7092 2.56585 11.5502 2.68306 11.433C2.80027 11.3158 2.95924 11.25 3.125 11.25H8.125C8.29076 11.25 8.44973 11.3158 8.56694 11.433C8.68415 11.5502 8.75 11.7092 8.75 11.875V16.875C8.75 17.0407 8.68415 17.1997 8.56694 17.3169C8.44973 17.4341 8.29076 17.5 8.125 17.5H3.125ZM11.875 17.5C11.7092 17.5 11.5503 17.4341 11.4331 17.3169C11.3158 17.1997 11.25 17.0407 11.25 16.875V11.875C11.25 11.7092 11.3158 11.5502 11.4331 11.433C11.5503 11.3158 11.7092 11.25 11.875 11.25H16.8738C17.0395 11.25 17.1985 11.3158 17.3157 11.433C17.4329 11.5502 17.4988 11.7092 17.4988 11.875V16.875C17.4988 17.0407 17.4329 17.1997 17.3157 17.3169C17.1985 17.4341 17.0395 17.5 16.8738 17.5H11.875Z"
                                    fill="black"/>
                              </svg>
                            </button></span>
                                <span class="nav-item" role="presentation">
                            <button class="list-button" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane"
                                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"
                                    aria-label="show list view">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 24 22"
                                   fill="none">
                                <path
                                    d="M0.443359 0.931274V3.82044H23.5567V0.931274H0.443359ZM0.443359 9.5121V12.4013H23.5567V9.5121H0.443359ZM0.443359 18.1796V21.0688H23.5567V18.1796H0.443359Z"
                                    fill="white"/>
                              </svg>
                            </button></span>
                            </div>

                            <div class="select-wrapper position-relative">
                                <select aria-label="filter product" name="show" form="searchForm" onchange="formSubmit()" class="category-show form-select form-select-sm pe-4">
                                    <?php $product_limit = get_lebel_by_value_in_settings('category_product_limit');?>
                                    <option value="<?php echo $product_limit;?>" <?php echo ((isset($_GET['show'])) && ($_GET['show'] == $product_limit)) ? 'selected' : ''; ?>><?php echo $product_limit;?></option>
                                    <option value="20" <?php echo ((isset($_GET['show'])) && ($_GET['show'] == '20')) ? 'selected' : ''; ?>>20</option>
                                    <option value="25" <?php echo ((isset($_GET['show'])) && ($_GET['show'] == '25')) ? 'selected' : ''; ?>>25</option>
                                    <option value="50" <?php echo ((isset($_GET['show'])) && ($_GET['show'] == '50')) ? 'selected' : ''; ?>>50</option>
                                    <option value="75" <?php echo ((isset($_GET['show'])) && ($_GET['show'] == '75')) ? 'selected' : ''; ?>>75</option>
                                    <option value="100" <?php echo ((isset($_GET['show'])) && ($_GET['show'] == '100')) ? 'selected' : ''; ?>>100</option>
                                </select>
                                <span class="select-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 24 12" fill="none">
                                    <g clip-path="url(#clip0_711_64088)">
                                      <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.2889 10.157L5.63186 4.5L7.04586 3.086L11.9959 8.036L16.9459 3.086L18.3599 4.5L12.7029 10.157C12.5153 10.3445 12.261 10.4498 11.9959 10.4498C11.7307 10.4498 11.4764 10.3445 11.2889 10.157Z"
                                            fill="black"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_711_64089">
                                        <rect width="12" height="24" fill="white" transform="translate(24) rotate(90)"/>
                                      </clipPath>
                                    </defs>
                                  </svg>
                                </span>
                            </div>

                            <div class="select-wrapper position-relative">
                                <select aria-label="sort product" name="shortBy" form="searchForm" onchange="formSubmit()" class="category-sortby form-select form-select-sm pe-4">
                                    <option value="" <?php echo ((isset($_GET['shortBy'])) && ($_GET['shortBy'] == '')) ? 'selected' : ''; ?>>Position</option>
                                    <option value="name" <?php echo ((isset($_GET['shortBy'])) && ($_GET['shortBy'] == 'name')) ? 'selected' : ''; ?> >Product Name</option>
                                    <option value="price_asc" <?php echo ((isset($_GET['shortBy'])) && ($_GET['shortBy'] == 'price_asc')) ? 'selected' : ''; ?>>Price(Low to High)</option>
                                    <option value="price_desc" <?php echo ((isset($_GET['shortBy'])) && ($_GET['shortBy'] == 'price_desc')) ? 'selected' : ''; ?>>Price(High to Low)</option>
                                </select>
                                <span class="select-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 24 12" fill="none">
                                    <g clip-path="url(#clip0_711_64082)">
                                      <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.2889 10.157L5.63186 4.5L7.04586 3.086L11.9959 8.036L16.9459 3.086L18.3599 4.5L12.7029 10.157C12.5153 10.3445 12.261 10.4498 11.9959 10.4498C11.7307 10.4498 11.4764 10.3445 11.2889 10.157Z"
                                            fill="black"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_711_64083">
                                        <rect width="12" height="24" fill="white" transform="translate(24) rotate(90)"/>
                                      </clipPath>
                                    </defs>
                                  </svg>
                                </span>
                            </div>

                        </div>
                    </div>


                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                             tabindex="0">
                            <div class="cards-container mt-0 row">

                                <?php
                                $modules = modules_access(); $symbol = get_lebel_by_value_in_settings('currency_symbol');

                                if (!empty($products)) {
                                    foreach ($products as $pro) {
                                        $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $pro->product_id); ?>
                                        <div class="best-seller-card col-md-6 col-lg-4 col-6 ">
                                            <div class="card-slider position-relative overflow-hidden">
                                                <div class="position-absolute top-2 w-100">
                                                    <div class="d-flex justify-content-between align-items-center w-100 px-4">
                                                        <?php if (!empty($spPric)) {?>
                                                            <span class="badge light-yellow-badge"> <?= specialPriceAndPriceByOffPercent($spPric, $pro->price)?>%</span>
                                                        <?php } ?>
                                                        <span class="badge tomato-badge">Hot</span>
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
                                                            <img class="object-fit-cover" src="<?= productImageViewUrlNew($pro->main_image, $pro->image, '245', '235'); ?>"
                                                                 alt="<?= $pro->alt_name; ?>" loading="lazy">
                                                        </div>
                                                        <?php $allImage = get_array_data_by_id('cc_product_image', 'product_id', $pro->product_id); ?>
                                                        <?php if (!empty($allImage)) {
                                            foreach ($allImage as $image) {
                                                ?>
                                                                <!-- Slide 2 -->
                                                                <div class="swiper-slide card-slider-single-slide">
                                                                    <img class="object-fit-cover" src="<?= productImageViewUrlNew($image->main_image, $image->image, '245', '235'); ?>"
                                                                         alt="<?= $image->alt_name?>" loading="lazy">
                                                                </div>
                                                            <?php
                                            }
                                        } ?>
                                                    </div>
                                                    <div class="swiper-pagination card-swiper-pagination"></div>
                                                </div>
                                            </div>
                                            <div class="card-bottom">
                                                <h4 class="recently-viewed-card-title"><a href="<?= base_url('detail/' . $pro->product_id)?>"><?php echo substr($pro->name, 0, 60); ?></a></h4>
                                                <div class="d-flex gap-2 flex-wrap align-items-center recently-viewed-card-rating align-items-center">
                                                    <?php echo product_id_by_rating($pro->product_id, '1'); ?>
                                                </div>
                                                <div class="d-flex gap-2 flex-xl-nowrap flex-wrap justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <?php if (empty($spPric)) { ?>
                                                            <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($pro->price, $symbol);?> </span>
                                                        <?php } else { ?>
                                                            <span class="recently-viewed-card-price prize-before-discount me-2" ><?php echo currency_symbol_with_symbol($pro->price, $symbol);?></span> <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($spPric, $symbol);?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <?php echo addToCartBtn($pro->product_id); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    echo 'No product available';
                                } ?>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                             tabindex="0">
                            <div class="cards-container mt-0 row ">
                                <?php foreach ($products as $pro) {
                                    $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $pro->product_id); ?>
                                <div class="best-seller-card d-flex flat-card-view col-md-6 ">
                                    <div class="card-slider position-relative overflow-hidden">
                                        <div class="position-absolute top-2 w-100">
                                            <div class="d-flex justify-content-between align-items-center w-100 px-4">
                                                <?php if (!empty($spPric)) {?>
                                                <span class="badge light-yellow-badge"><?= specialPriceAndPriceByOffPercent($spPric, $pro->price)?>%</span>
                                                <?php } ?>
                                                <span class="badge tomato-badge">Hot</span>
                                            </div>
                                        </div>
                                        <div class="cards-icons-container">
                                            <div class="cards-icons">
                                                <?php if ($modules['compare'] == 1) { ?>
                                                <div class="">
                                                    <button class="tooltip-icon compare" onclick="addToCompare(<?= $pro->product_id ?>)" data-tooltip="Compare Product"
                                                            aria-label="Compare Product"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                                                                              viewBox="0 0 18 19" fill="none">
                                                            <path
                                                                d="M15.2222 13.641V8.41026C15.2222 5.94482 15.2222 4.71123 14.4409 3.9458C13.6604 3.17949 12.4027 3.17949 9.88889 3.17949H7.22222M15.2222 13.641C14.2404 13.641 13.4444 14.4217 13.4444 15.3846C13.4444 16.3476 14.2404 17.1282 15.2222 17.1282C16.2041 17.1282 17 16.3476 17 15.3846C17 14.4217 16.2041 13.641 15.2222 13.641ZM7.22222 3.17949C7.22222 2.56923 8.99467 1.42892 9.44444 1M7.22222 3.17949C7.22222 3.78974 8.99467 4.93005 9.44444 5.35897M2.77778 5.35897V10.5897C2.77778 13.0552 2.77778 14.2888 3.55911 15.0542C4.33956 15.8205 5.59733 15.8205 8.11111 15.8205H10.7778M10.7778 15.8205C10.7778 16.4308 9.00533 17.5719 8.55556 18M10.7778 15.8205C10.7778 15.2103 9.00533 14.0691 8.55556 13.641M4.55556 3.17949C4.55556 4.14245 3.75962 4.92308 2.77778 4.92308C1.79594 4.92308 1 4.14245 1 3.17949C1 2.21653 1.79594 1.4359 2.77778 1.4359C3.75962 1.4359 4.55556 2.21653 4.55556 3.17949Z"
                                                                stroke="#656565" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg></button>
                                                </div>
                                                <?php } ?>
                                                <?php if ($modules['wishlist'] == 1) { ?>
                                                    <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                                                    <div class="">
                                                        <a href="<?php echo base_url('login');?>" class="tooltip-icon favorite" data-tooltip="Add to Favorites"
                                                                aria-label="Add to Favorites">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                                                 fill="none">
                                                                <path
                                                                    d="M9 16.0125L7.9125 15.0225C4.05 11.52 1.5 9.2025 1.5 6.375C1.5 4.0575 3.315 2.25 5.625 2.25C6.93 2.25 8.1825 2.8575 9 3.81C9.8175 2.8575 11.07 2.25 12.375 2.25C14.685 2.25 16.5 4.0575 16.5 6.375C16.5 9.2025 13.95 11.52 10.0875 15.0225L9 16.0125Z"
                                                                    fill="#656565"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <?php } else { ?>
                                                        <div class="">
                                                            <button onclick="addToWishlist(<?= $pro->product_id ?>)" class="tooltip-icon favorite" data-tooltip="Add to Favorites"
                                                                    aria-label="Add to Favorites">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
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

                                                    <img class="object-fit-cover" src="<?= productImageViewUrlNew($pro->main_image, $pro->image, '146', '138'); ?>"
                                                         alt="<?= $pro->alt_name; ?>" loading="lazy">
                                                </div>
                                                <?php $allImage = get_array_data_by_id('cc_product_image', 'product_id', $pro->product_id); ?>
                                                <?php if (!empty($allImage)) {
                                        foreach ($allImage as $image) {
                                            ?>
                                                <div class="swiper-slide card-slider-single-slide">

                                                    <img class="object-fit-cover" src="<?= productImageViewUrlNew($image->main_image, $image->image, '146', '138'); ?>"
                                                         alt="<?= $image->alt_name?>" loading="lazy">
                                                </div>
                                                <?php
                                        }
                                    } ?>
                                            </div>
                                            <div class="swiper-pagination card-swiper-pagination"></div>
                                        </div>
                                    </div>
                                    <div class="card-bottom">
                                        <div class="">
                                            <h4 class="recently-viewed-card-title"><a href="<?= base_url('detail/' . $pro->product_id)?>"><?php echo substr($pro->name, 0, 60); ?></a>
                                            </h4>
                                            <div class="d-flex gap-2 flex-wrap align-items-center recently-viewed-card-rating align-items-center">
                                                <?php echo product_id_by_rating($pro->product_id, '1'); ?>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-between align-items-center">
                                            <?php if (empty($spPric)) { ?>
                                                <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($pro->price, $symbol);?> </span>
                                            <?php } else { ?>
                                                <span class="recently-viewed-card-price prize-before-discount me-2" ><?php echo currency_symbol_with_symbol($pro->price, $symbol);?></span>
                                                <span class="recently-viewed-card-price prize-after-discount"><?php echo currency_symbol_with_symbol($spPric, $symbol);?></span>
                                            <?php } ?>
                                            <?php echo addToCartBtn($pro->product_id); ?>
<!--                                            <button class="btn-base px-2 recently-viewed-add-to-cart-btn w-100 btn-1">Add To Cart</button>-->
                                        </div>
                                    </div>
                                </div>
                                <?php
                                } ?>
                            </div>

                        </div>
                    </div>
                    <div>
                        <div class="reviews-pagination category-product-pagination d-flex justify-content-center">
                            <?php echo $links;?>
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
    <?php $themeSetting = get_theme_settings(); ?>
    <section>
        <div class="container">
            <div class="d-flex justify-content-between align-items-end related-product  mb-4">
                <p class="title related-product">Popular this week</p>
                <a href="<?= base_url('category/' . $themeSetting['popular_this_week'])?>" class="text-muted latest-blog-section-action text-nowrap">View All</a>
            </div>
            <div  class="row row-cols-lg-4 row-cols-md-3 row-cols-2 related-product-cards  justify-content-start g-md-3 g-3">

                <?php foreach (categoryIdByProducts($themeSetting['popular_this_week'], 'DESC', 4) as $pro) {
                                    $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $pro->product_id); ?>
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
                                             src="<?= productImageViewUrlNew($pro->main_image, $pro->image, '261', '257'); ?>"
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
                                        <?php
                                        }
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
                <?php
                                } ?>

            </div>
        </div>
    </section>
    <!-- Popular this week Section End-->

</main>


<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
<script>
    $(document).ready(function() {
        let html1 = `<div class="category-filter  pt-0">
                    <div class="rating-container">
                        <?php if (!empty($prod_cat_id)) { ?>
                            <p class="title review-filter-title"><?= get_data_by_id('category_name', 'cc_product_category', 'prod_cat_id', $prod_cat_id); ?></p>
                        <?php } else { ?>
                            <p class="title review-filter-title">Search Result</p>
                        <?php }?>
                        <div class="hr-container py-3">
                            <div class="hr"></div>
                        </div>


                        <div class="accordion accordion-flush " id="accordionFlushExample">
                            <!-- Review Topics Section -->
                            <?php if (empty($keywordSearch)) { ?>
                            <div class="accordion-item review-filter-accordion-item ">
                                <input type="hidden" name="cat" form="searchForm" value="<?php echo $prod_cat_id?>">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                        Category</button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="d-flex flex-column gap-2">
                                            <?php if (!empty($parent_Cat)) { ?>
                                                <input type="hidden" name="prod_cat_id" form="searchForm" value="<?php echo $prod_cat_id?>">
                                            <!-- Review Topics -->
                                                <?php foreach ($parent_Cat as $cat) { ?>
                                                    <label class="custom-radio custom-checkbox">
                                                        <input type="radio" onclick="formSubmit()" form="searchForm" <?= ((isset($_GET['category'])) && ($_GET['category'] == $cat->prod_cat_id)) ? 'checked' : ''; ?> name="category" value="<?php echo $cat->prod_cat_id;?>" aria-label="Analog Watches">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                             fill="none">
                                                            <rect x="3.75" y="3.67041" width="16.5" height="16.5" stroke="#C4C8CC"
                                                                  stroke-width="1.5" />
                                                        </svg>
                                                        <span class="rating-label"><?= $cat->category_name;?> (<?= category_id_by_product_count($cat->prod_cat_id)?>)</span>
                                                    </label>
                                                <?php } ?>
                                            <?php } else {
                                    if (!empty($main_Cat)) { ?>
                                                <ul class="">
                                                    <?php  foreach ($main_Cat as $cat) { ?>
                                                    <li><a href="<?= base_url('category/' . $cat->prod_cat_id);?>" class="text-black" ><?= $cat->category_name;?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            <?php }
                                } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <!-- Brand Section -->
                            <div class="accordion-item review-filter-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseFour" aria-expanded="true" aria-controls="flush-collapseFour">
                                        Brand
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="d-flex flex-column gap-2">
                                            <?= $brandView;?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if (!empty($productsArr)) { ?>
                            <div class="accordion-item review-filter-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseFour11" aria-expanded="true" aria-controls="flush-collapseFour">
                                        Filter Price
                                    </button>
                                </h2>
                                <div id="flush-collapseFour11" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="">
                                            <div class="product-filter">
                                                <p>
                                                    <span class="amountId" id="amount" aria-label="Selected price range"></span>
                                                    <input class="priceId" type="hidden"  name="price" id="price"  <?php echo $sSel?> >
                                                </p>
                                                <div class="slider-range" role="slider" aria-label="Price range slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                            <!-- Option Section -->
                            <div class="accordion-item review-filter-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseThree" aria-expanded="true" aria-controls="flush-collapseThree">
                                        Option
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="d-flex flex-column gap-2">
                                            <?php foreach ($optionArray as $key => $val) { ?>
                                                <p class="selected-color"><?= $key ?>:</p>
                                                <div class="d-flex size-button-container flex-wrap">
                                                <?php foreach ($val['allOption'] as $item) {
                                    if ($val['option'] == $item->option_id) {
                                        $nameVal  = $item->name;
                                        $firstCar = mb_substr($nameVal, 0, 1);
                                        $length   = strlen($nameVal);
                                        $isColor  = (($firstCar == '#') && ($length == 7)) ? '' : $nameVal;
                                        $nameOp   = !empty($isColor) ? $isColor : '';
                                        $style    = empty($isColor) ? "background-color: $nameVal !important;" : ""; ?>
                                                    <input type="checkbox" class="btn-check d-none" form="searchForm" onclick="formSubmit()" <?= (in_array($item->option_value_id, $optionval)) ? 'checked ' : ''; ?>  name="options[]" id="option_<?= $item->option_value_id?>" value="<?= $item->option_value_id?>">
                                                    <label class="btn size-button <?= (in_array($item->option_value_id, $optionval)) ? 'selected' : ''; ?>" style="<?= $style ; ?>" for="option_<?= $item->option_value_id?>"><?= $nameOp; ?></label>
                                                <?php
                                    }
                                } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($modules['review'] == '1') { ?>
                            <!-- Rating Section -->
                            <div class="accordion-item review-filter-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                                        Rating
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body review-filter-acordian-body">
                                        <div class="d-flex flex-column gap-2">
                                            <?= $ratingView?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>`;
        let html2 = `<div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasExample"
                     aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header ">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body pt-0">
                        <div class="category-filter show">
                            <div class="rating-container">
                                <p class="title review-filter-title d-none">Man Watch</p>
                                <div class="hr-container py-3">
                                    <div class="hr"></div>
                                </div>


                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <?php if (empty($keywordSearch)) { ?>
                                    <!-- Category Section -->
                                    <div class="accordion-item review-filter-accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                                Category</button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="d-flex flex-column gap-2">
                                                    <?php if (!empty($parent_Cat)) { ?>
                                                        <input type="hidden" name="prod_cat_id" form="searchForm" value="<?php echo $prod_cat_id?>">
                                                        <!-- Review Topics -->
                                                        <?php foreach ($parent_Cat as $cat) { ?>
                                                            <label class="custom-radio custom-checkbox">
                                                                <input type="radio" onclick="formSubmit()" form="searchForm" <?= ((isset($_GET['category'])) && ($_GET['category'] == $cat->prod_cat_id)) ? 'checked' : ''; ?> name="category" value="<?php echo $cat->prod_cat_id;?>" aria-label="Analog Watches">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                                     fill="none">
                                                                    <rect x="3.75" y="3.67041" width="16.5" height="16.5" stroke="#C4C8CC"
                                                                          stroke-width="1.5" />
                                                                </svg>
                                                                <span class="rating-label"><?= $cat->category_name;?> (<?= category_id_by_product_count($cat->prod_cat_id)?>)</span>
                                                            </label>
                                                        <?php } ?>
                                                    <?php } else {
                                    if (!empty($main_Cat)) { ?>
                                                        <ul class="">
                                                            <?php  foreach ($main_Cat as $cat) { ?>
                                                                <li><a href="<?= base_url('category/' . $cat->prod_cat_id);?>" class="text-black" ><?= $cat->category_name;?></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php }
                                } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- Brand Section -->
                                    <div class="accordion-item review-filter-accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseFour" aria-expanded="true" aria-controls="flush-collapseFour">
                                                Brand
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="d-flex flex-column gap-2">
                                                    <?= $brandView;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if (!empty($productsArr)) { ?>
                                        <div class="accordion-item review-filter-accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour11" aria-expanded="true" aria-controls="flush-collapseFour">
                                                    Filter Price
                                                </button>
                                            </h2>
                                            <div id="flush-collapseFour11" class="accordion-collapse collapse show"
                                                 data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="">
                                                        <div class="product-filter">
                                                            <p>
                                                                <span class="amountId" id="amount" aria-label="Selected price range"></span>
                                                                <input class="priceId" type="hidden"  name="price" id="price"  <?php echo $sSel?> >
                                                            </p>
                                                            <div class="slider-range" role="slider" aria-label="Price range slider"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <!-- Option Section -->
                                    <div class="accordion-item review-filter-accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseThree" aria-expanded="true" aria-controls="flush-collapseThree">
                                                Option
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse show"
                                             data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="d-flex flex-column gap-2">
                                                    <?php foreach ($optionArray as $key => $val) { ?>
                                                        <p class="selected-color"><?= $key ?>:</p>
                                                        <div class="d-flex size-button-container flex-wrap">
                                                            <?php foreach ($val['allOption'] as $item) {
                                    if ($val['option'] == $item->option_id) {
                                        $nameVal  = $item->name;
                                        $firstCar = mb_substr($nameVal, 0, 1);
                                        $length   = strlen($nameVal);
                                        $isColor  = (($firstCar == '#') && ($length == 7)) ? '' : $nameVal;
                                        $nameOp   = !empty($isColor) ? $isColor : '';
                                        $style    = empty($isColor) ? "background-color: $nameVal !important;" : ""; ?>
                                                                    <input type="checkbox" class="btn-check d-none" form="searchForm" onclick="formSubmit()" <?= (in_array($item->option_value_id, $optionval)) ? 'checked ' : ''; ?>  name="options[]" id="option_<?= $item->option_value_id?>" value="<?= $item->option_value_id?>">
                                                                    <label class="btn size-button <?= (in_array($item->option_value_id, $optionval)) ? 'selected' : ''; ?>" style="<?= $style ; ?>" for="option_<?= $item->option_value_id?>"><?= $nameOp; ?></label>
                                                                <?php
                                    }
                                } ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($modules['review'] == '1') { ?>
                                        <!-- Rating Section -->
                                        <div class="accordion-item review-filter-accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                                                    Rating
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse show"
                                                 data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body review-filter-acordian-body">
                                                    <div class="d-flex flex-column gap-2">
                                                        <?= $ratingView?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
        if ($(window).width() > 767) {
            $('#sideView').html(html1)
        }else{
            $('#sideView').html(html2)
        }

        // Initialize the slider
        $(".slider-range").slider({
            range: true,
            min: <?php print $price['minPrice']; ?>,
            max: <?php print $price['maxPrice']; ?>,
            values: [<?php print isset($fstprice) ? $fstprice : $price['minPrice']; ?>,
                <?php print isset($lstPrice) ? $lstPrice : $price['maxPrice']; ?>],
            slide: function(event, ui) {
                $(".amountId").text(ui.values[0] + " - " + ui.values[1]);
                $(".priceId").val(ui.values[0] + "," + ui.values[1]);
                $(".priceId").attr('form', 'searchForm');
                $("#searchForm").submit();
            }
        });

        // Set initial values for span and input
        $(".amountId").text($(".slider-range").slider("values", 0) + " - " + $(".slider-range").slider("values", 1));
        $(".priceId").val($(".slider-range").slider("values", 0) + "," + $(".slider-range").slider("values", 1));
    });
    function formSubmit() {
        $("#searchForm").submit();
    }
</script>
<?= $this->endSection() ?>
