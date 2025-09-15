<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $description;?>">
    <meta name="keywords" content="<?php echo $keywords;?>">


    <link rel="shortcut icon" href="<?php echo base_url() ?>/uploads/logo/<?php echo get_lebel_by_value_in_theme_settings('favicon');?>">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/theme_3/slick/slick.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/theme_3/slick/slick-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="<?php echo base_url() ?>/assets/datatable/datatables.min.css" rel="stylesheet"  >
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/style.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/details.min.css">

    <script src="<?php echo base_url() ?>/assets/theme_3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_3/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_3/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_3/jquery.star-rating.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_3/jquery-ui.min.js"></script>


</head>
<body>
    <div class="message_alert <?php echo (session()->getFlashdata('message') !== null) ? "display_block" : ''; ?>"  id="messAlt">
        <div class="alert-success_web py-2 px-3 border-0 text-white fs-5 text-capitalize" id="mesVal">
            <?php echo (session()->getFlashdata('message') !== null) ? session()->getFlashdata('message') : 'Successfully update to cart';  ?>
        </div>
    </div>
    <?php $settings = get_settings();?>
    <header class="header bg-white">
        <div class="topbar py-1 py-md-3">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-sm-4 col-md-7 d-flex flex-row align-items-center justify-content-center gap-3 mb-2 mb-sm-0">
                        <div class="currency-switcher">
                            <div class="input-group">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="currencyDropdown"><?php echo $settings['currency_symbol']; ?> <?php echo $settings['currency']; ?></button>
                                <!-- <ul class="dropdown-menu"> -->
                                    <!-- <li><a class="dropdown-item" href="#" data-currency="USD">USD</a></li> -->
                                    <!-- <li><a class="dropdown-item" href="#" data-currency="GBP">GBP</a></li>
                                    <li><a class="dropdown-item" href="#" data-currency="EUR">EUR</a></li> -->
                                <!-- </ul> -->
                            </div>
                        </div>
                        <div class="vr"></div>

                        <div class="top-tel d-flex flex-sm-column flex-md-row gap-2">
                            <a href="tel:<?php echo $settings['phone']; ?>">
                                <img src="<?php echo base_url('svg/phoneHeaderIcon.svg')?>" alt="date">
                            </a>
                            <a class="d-none d-md-block" href="tel:<?php echo $settings['phone']; ?>"> +88<?php echo $settings['phone']; ?></a>
                        </div>
                        <div class="vr"></div>
                        <div class="top-email d-flex flex-sm-column flex-md-row gap-2">
                            <a href="tel:<?php echo $settings['email']; ?>">
                                <img src="<?php echo base_url('svg/emailHeaderIcon.svg')?>" alt="date">
                            </a>
                            <a class="d-none d-md-block" href="mailto:<?php echo $settings['email']; ?>">Email: <?php echo $settings['email']; ?></a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 col-md-5 d-flex gap-3 justify-content-center justify-content-sm-end mb-2 mb-sm-0">
                    <?php $modules = modules_access();

    if (!isset(newSession()->isLoggedInCustomer)) { ?>
                        <a class="btn" href="<?php echo base_url('login') ?>">Sign In</a>
                        <a class="btn btn-create px-4 py-2" href="<?php echo base_url('register') ?>">Create an account</a>
                        <?php } else { ?>

                                <a class="dropdown-toggle btn btn-create" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    My account
                                </a>
                                <ul class="dropdown-menu ">
                                    <li><a class="dropdown-item mt-2 mb-2 "
                                            href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url('profile'); ?>"
                                            class="dropdown-item mt-2 mb-2">Profile</a></li>
                                    <li><a href="<?php echo base_url('my-order'); ?>" class="dropdown-item mt-2 mb-2">My
                                            order</a></li>
                                    <?php if ($modules['wishlist'] == 1) { ?>
                                    <li><a href="<?php echo base_url('favorite'); ?>" class="dropdown-item mt-2 mb-2">My
                                            Wish
                                            list</a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo base_url('logout'); ?>" class="dropdown-item mt-2 mb-2">Log
                                            out</a></li>

                                </ul>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main py-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-4 col-lg-3 order-1 mb-3 mb-sm-0">
                        <div class="logo text-center text-sm-start">
                        <a href="<?php echo base_url() ?>">
                                <?php $logoImg = get_lebel_by_value_in_theme_settings('side_logo');
                                $alt_name      = getLebelByAltNameInThemeSettings('side_logo');
                                echo image_view('uploads/logo', '', $logoImg, 'noimage.png', 'img-fluid side_logo', $alt_name,'logo'); ?>

                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-7 order-3 order-lg-2">
                        <nav class="navbar-primary navbar navbar-expand-lg justify-content-end">
                            <button class="navbar-toggler" id="navbarPopUp" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse" id="navbarNav">
                                <button type="button" class="btn-close d-lg-none" id="navClose" aria-label="Close"></button>
                                <ul class="navbar-nav d-flex justify-content-center">
                                  <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="<?php echo base_url() ?>">Home</a>
                                  </li>
                                  <?php echo top_menu(); ?>
                                    <?php if ($modules['album'] == 1) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('qc-picture') ?>">Album</a>
                                    </li>
                                    <?php } ?>
                                    <?php if ($modules['blog'] == 1) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('blog') ?>">Blog</a>
                                        </li>
                                    <?php } ?>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('page/about-us') ?>">About Us</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('page/contact-us') ?>">Contact us</a>
                                  </li>
                                </ul>
                              </div>
                          </nav>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-2 order-2 order-lg-3 d-flex justify-content-sm-end">
                        <div class="help-center d-flex align-items-center gap-2">
                            <img src="<?php echo base_url('svg/questionIcon.svg')?>" alt="date">
                            <a href="<?php echo base_url('page/need-help')?>">Need Help?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom py-2">
            <div class="container">
                <div class="row gx-0 align-items-center">
                    <div class="col-xl-3 col-lg-3 col-sm-3 col-12 mb-2 mb-sm-0">
                    <?php if (isset($home_menu)) {  ?>
                        <div class="allcategory h-100 w-100">
                            <button class="btn btn-secondary text-uppercase dropdown-toggle rounded-0 h-100 bg-blue border-0 text-start w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bars me-3"></i>
                                Shop by Categories
                            </button>
                            <ul class="dropdown-menu border  cat-drop-menu all-cat-menu btn-cat-show">
                            <?php foreach (getSideMenuArray() as $pcat) { ?>
                                <li>
                                    <a class="dropdown-item" href="<?php echo base_url('category/' . $pcat->prod_cat_id); ?>">
                                    <span class="icon">
                                        <?php echo $pcat->code;?>
                                    </span>
                                        <?php echo $pcat->category_name; ?>
                                        <?php $fCat = getCategoryBySubArray($pcat->prod_cat_id);

                                if (!empty(count($fCat))) { ?>
                                            <i class="fa-solid fa-angle-right  float-end"></i>
                                        <?php } ?>
                                    </a>
                                    <?php if (!empty(count($fCat))) { ?>
                                    <ul class="dropdown-menu dropdown-submenu">
                                    <?php foreach ($fCat as $sCat) { ?>
                                        <li>
                                            <a class="dropdown-item"
                                                href="<?php echo base_url('category/' . $sCat->prod_cat_id); ?>">
                                                <?php $sSubCat = getCategoryBySubArray($sCat->prod_cat_id);

                                        if (!empty(count($sSubCat))) { ?>
                                                <i class="fa-solid fa-angle-right  float-end "
                                                    style="margin-top: 4px;"></i>
                                                <?php } ?>
                                                <?php echo $sCat->category_name; ?>
                                            </a>
                                            <?php if (!empty(count($sSubCat))) { ?>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <?php foreach ($sSubCat as $ssCat) { ?>
                                                <li><a class="dropdown-item" href="<?php echo base_url('category/' . $ssCat->prod_cat_id); ?>"><?php echo $ssCat->category_name; ?></a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <?php } ?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>

                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-5 col-6 d-flex align-items-center justify-content-end">
                    <?php if ($modules['top_search'] == 1) { ?>
                        <form id="first-form-top" action="<?php echo base_url('products/search'); ?>"
                            class="mini-search" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keywordTop" placeholder="Search for Products..." value="<?php echo isset($keywordTop) ? $keywordTop : ''; ?>">
                                <span class="input-group-btn">
                                <button class="btn btn-default bg-white rounded-0" onclick="topSearchValidation('first-form-top','first-cat','first-keywordTop','first-valid')" type="button">
                                <img src="<?php echo base_url('svg/searchIcon.svg')?>" alt="date">
                                </button>
                            </span>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-4 col-6">
                        <div class="d-flex flex-row align-items-center justify-content-end gap-3 gap-lg-5 h-100">
                        <?php if ($modules['compare'] == 1) { ?>
                            <a  href="<?php echo base_url('compare') ?>">
                                <div class="mini-cart d-flex position-relative" id="comparetReload">
                                    <img src="<?php echo base_url('svg/compareMenuIcon.svg')?>" alt="date">
                                    <span class="cart-item position-absolute rounded-5 d-flex align-items-center justify-content-center bg-white text-black"><?php print (isset(newSession()->compare_session)) ? count(newSession()->compare_session) : '0'; ?></span>
                                </div>
                            </a>
                        <?php } ?>

                        <?php if ($modules['wishlist'] == 1) { ?>
                            <a href="<?php echo base_url('favorite') ?>">
                            <div class="mini-cart d-flex position-relative" id="wishlistReload">
                                <img src="<?php echo base_url('svg/wishlistHeaderIcon.svg')?>" alt="date">
                                <span class="cart-item position-absolute rounded-5 d-flex align-items-center justify-content-center bg-white text-black">0</span>
                            </div>

                            </a>
                        <?php } ?>

                            <a href="<?php echo base_url('cart') ?>">
                            <div class="mini-cart d-flex position-relative" id="cartReload">
                                <img src="<?php echo base_url('svg/cartIcon.svg')?>" alt="date">
                                <span class="cart-item position-absolute rounded-5 d-flex align-items-center justify-content-center"><?php echo count(Cart()->contents()); ?></span>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <button id="scrollToTopBtn" title="Go to top">↑</button>
