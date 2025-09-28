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
                            echo image_view('uploads/logo', '', $logoImg, 'noimage.png', 'img-fluid side_logo', $alt_name, 'logo'); ?>

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


<?= $this->renderSection('content'); ?>





<section class="section-footer">
    <div class="footer-box">
        <div class="container">
            <div class="border p-4">
                <div class="row gx-4">
                    <div class="col-sm-6 col-lg-3 col-12 mb-3 mb-lg-0">
                        <div class="d-flex flex-row gap-2 border-end">
                            <img src="<?php echo base_url('svg/freeDeliveryIcon.svg')?>" alt="date">
                            <div class="icon-box">
                                <h6 class="mb-0">Free Delivery</h6>
                                <p>Orders from all item</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 col-12 mb-3 mb-lg-0">
                        <div class="d-flex flex-row gap-2 border-end">
                            <img src="<?php echo base_url('svg/dollerIcon.svg')?>" alt="date">
                            <div class="icon-box">
                                <h6 class="mb-0">Return and Refund</h6>
                                <p>Money back guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 col-12 mb-3 mb-lg-0">
                        <div class="d-flex flex-row gap-2 border-end">
                            <img src="<?php echo base_url('svg/discountIcon.svg')?>" alt="date">
                            <div class="icon-box">
                                <h6 class="mb-0">Member Discount</h6>
                                <p>On every order over $140.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 col-12 mb-3 mb-lg-0">
                        <div class="d-flex flex-row gap-2">
                            <img src="<?php echo base_url('svg/hesdPhoneIcon.svg')?>" alt="date">
                            <div class="icon-box">
                                <h6 class="mb-0">Support 24/7</h6>
                                <p>Contact us 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter">
        <div class="container">
            <div class="row gx-0 align-items-center">
                <div class="col-md-6">
                    <h2>Subscribe Our Newsletter!</h2>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="subscribe_email" id="subscribe_email"  class="form-control" placeholder="Enter your Email address" aria-label="Search" >
                        <button type="button" class="btn btn-subscribe" onclick="subscribe()" >Subscribe Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-12">
                    <h4 class="f-title toggleButton">Customer Service</h4>
                    <div class="elementToToggle d-none d-md-block">
                        <ul class="list-unstyled ul-link mt-md-4">
                            <li><a href="<?php echo base_url('page/returns-policy') ?>">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Returns
                                </a></li>
                            <li><a href="<?php echo base_url('page/contact-us') ?>">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Contact us
                                </a></li>
                            <li><a href="<?php echo base_url('page/site-map') ?>">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Site Map</a></li>
                        </ul>
                        <div class="footer-logo">
                            <?php echo image_view('assets/theme_3/img', '', 'logo-footer.png', 'noimage.png', 'img-fluid ', 'footer logo', 'footer'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <h4 class="f-title toggleButton">Information</h4>
                    <div class="elementToToggle d-none d-md-block">
                        <ul class="list-unstyled ul-link mt-md-4">
                            <li><a href="#">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Our Core Values</a></li>
                            <li><a href="<?php echo base_url('page/about-us') ?>">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    About Us</a></li>
                            <li><a href="<?php echo base_url('page/privacy-policy') ?>">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Privacy Policy</a></li>
                            <li><a href="#">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Returns and Refunds</a></li>
                            <li><a href="<?php echo base_url('page/terms-and-conditions') ?>">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Terms & conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <h4 class="f-title toggleButton">Extras</h4>
                    <div class="elementToToggle d-none d-md-block">
                        <ul class="list-unstyled ul-link mt-md-4">
                            <li><a href="#">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Brands</a></li>
                            <li><a href="<?php echo base_url('dashboard') ?>">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    My Account</a></li>
                            <li><a href="<?php echo base_url('my_order'); ?>">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Order History</a></li>
                            <li><a href="<?php echo base_url('favorite'); ?>">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Wish List</a></li>
                            <li><a href="#">
                                    <img src="<?php echo base_url('svg/dobleRightArrow.svg')?>" alt="date">
                                    Newsletter</a></li>
                        </ul>
                    </div>
                </div>
                <?php $settings = get_settings();?>
                <div class="col-md-3 col-12">
                    <h4 class="f-title toggleButton">Contact Us</h4>
                    <div class="elementToToggle d-none d-md-block">
                        <ul class="list-unstyled ul-link-2 mt-md-4">
                            <li class="d-flex fot-about">
                                <span><img src="<?php echo base_url('svg/phoneFooterIcon.svg')?>" alt="date"></span>
                                <span class="f-text-add">(+1) <?php echo $settings['phone']; ?></span>
                            </li>
                            <li class="d-flex fot-about">
                                    <span>
                                        <img src="<?php echo base_url('svg/faxIcon.svg')?>" alt="date">
                                    </span>
                                <span class="f-text-add">012 345 6789</span>
                            </li>
                            <li class="d-flex fot-about">
                                <span><img src="<?php echo base_url('svg/emailFooterIcon.svg')?>" alt="date"></span>
                                <span class="f-text-add"><?php echo $settings['email']; ?></span>
                            </li>

                            <li class="d-flex fot-about">
                                <span> <img src="<?php echo base_url('svg/locationFooterIcon.svg')?>" alt="date"> </span>
                                <span class="f-text-add">
                                        <?php echo $settings['address']; ?>
                                    </span>
                            </li>
                            <?php if (modules_key_by_access('contact_with_whatsapp') == 1) {
                                                                $modulId = get_data_by_id('module_id', 'cc_modules', 'module_key', 'contact_with_whatsapp'); ?>
                                <li class="d-flex fot-about">
                                    <a target="_blank" href="https://wa.me/<?php echo get_model_settings_value_by_modelId_or_label($modulId, 'whatsapp_number'); ?>" ><span>
                                    <img src="<?php echo base_url('svg/watsappFooterIcon.svg')?>" alt="date">
                                    </span>
                                        <span class="f-text-add">
                                        Contact With Whatsapp
                                    </span></a>
                                </li>
                                <?php
                                                            } ?>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="footer-social">
        <div class="container text-center">
            <a class="facebook" target="_blank" href="<?php echo $settings['fb_url']; ?>"><i
                    class="fa-brands fa-facebook-f"></i></a>
            <a class="ms-4 twitter" target="_blank" href="<?php echo $settings['twitter_url']; ?>"><i
                    class="fa-brands fa-twitter"></i></a>
            <a class="ms-4 tiktok" target="_blank" href="<?php echo $settings['tiktok_url']; ?>"><i
                    class="fa-brands fa-tiktok"></i></a>
            <a class="ms-4 instagram" target="_blank" href="<?php echo $settings['instagram_url']; ?>"><i
                    class="fa-brands fa-instagram"></i></a>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <!-- Copyright@<a href="https://dnationsoft.com/" target="_blank">DNationSoft</a> -->
            Copyright © <?php echo $settings['store_name'];?> <?php echo date('Y');?> | All Rights Reserved
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>/assets/theme_3/script.min.js"></script>
<script src="<?php echo base_url() ?>/assets/theme_3/slick/slick.min.js" > </script>
<script src="<?php echo base_url() ?>/assets/theme_3/lightbox-plus-jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/datatable/datatables.min.js" ></script>
<script src="<?php echo base_url() ?>/assets/theme_3/validation.js" ></script>


<script>


    $("#tableReload").DataTable({
        order: [[0, 'desc']]
    })

    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "See more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "See less";
            moreText.style.display = "inline";
        }
    }



    function addToCompare(pro_id) {
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtoCompare') ?>",
            data: {
                product_id: pro_id
            },
            success: function(response) {
                $('#mesVal').html(response);
                $('.message_alert').show();
                $('#comparetReload').load(location.href + " #comparetReload");
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }

    function removeToCompare(key_id) {
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('removeToCompare') ?>",
            data: {
                key_id: key_id
            },
            success: function(response) {
                $('#compReload').load(location.href + " #compReload");
                $('#comparetReload').load(location.href + " #comparetReload");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }

    function addToWishlist(pro_id) {
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtoWishlist') ?>",
            data: {
                product_id: pro_id
            },
            success: function(response) {
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }

    function removeToWishlist(proId) {
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('removeToWishlist') ?>",
            data: {
                product_id: proId
            },
            success: function(response) {
                $('#reloadDiv').load(location.href + " #reloadDiv");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }



    function addToCart(pro_id) {
        var size = $("input[name='size']:checked").val();
        var color = $("input[name='color']:checked").val();

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('checkoption') ?>",
            data: {
                product_id: pro_id
            },
            success: function(response) {
                if (response == true) {
                    adtocartAction(pro_id);
                } else {
                    if (size == null || color == null) {
                        $('.mes-1').html('Required field');
                        $('.mes-2').html('Required field');
                    } else {
                        $('.mes-1').html('');
                        $('.mes-2').html('');
                        adtocartAction(pro_id);
                    }
                }
            }
        });
    }

    function adtocartAction(pro_id) {
        var qty = $('#qty_input').val();
        if (qty == null) {
            qty = '1';
        }
        var size = $("input[name='size']:checked").val();
        if (size == null) {
            size = '';
        }
        var color = $("input[name='color']:checked").val();
        if (color == null) {
            color = '';
        }
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtocart') ?>",
            data: {
                product_id: pro_id,
                qtyall: qty,
                size: size,
                color: color
            },
            success: function(response) {
                $('#cartReload').load(location.href + " #cartReload");
                $('#cartReload2').load(location.href + " #cartReload2");
                $('#mesVal').html(response);
                $('.btn-count').load(location.href + " .btn-count");
                $('.body-count').load(location.href + " .body-count");
                $('#carticon2').css('transform', 'rotate(90deg)');
                $('#collapseExample').addClass('show');
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }

    function addToCartdetail() {
        $("#addto-cart-form").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $('#cartReload').load(location.href + " #cartReload");
                    $('#cartReload2').load(location.href + " #cartReload2");
                    $('#mesVal').html(response);
                    $('.btn-count').load(location.href + " .btn-count");
                    $('.body-count').load(location.href + " .body-count");
                    $('#carticon2').css('transform', 'rotate(90deg)');
                    $('#collapseExample').addClass('show');

                    $('.message_alert').show();
                    setTimeout(function() {
                        $("#messAlt").fadeOut(1500);
                    }, 600);

                }
            });
        }));
    };

    function checkoption(pro_id) {
        var result;
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('checkoption') ?>",
            data: {
                product_id: pro_id
            },
            success: function(response) {
                result = response;
            }
        });
        return result;
    }



    function minusItem(rowid) {
        var quantity = parseInt($('.item_' + rowid).val());
        if (quantity > 1) {
            $('.item_' + rowid).val(quantity - 1);
        }
        $('#btn_' + rowid).show();
    }

    function plusItem(rowid) {
        var quantity = parseInt($('.item_' + rowid).val());
        $('.item_' + rowid).val(quantity + 1);
        $('#btn_' + rowid).show();

    }


    function updateQty(rowid) {
        var qty = $('.item_' + rowid).val();
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('updateToCart') ?>",
            data: {
                rowid: rowid,
                qty: qty
            },
            dataType: 'json',
            success: function(response) {
                $('#cartReload').load(location.href + " #cartReload");
                $('#tableReload').load(location.href + " #tableReload");
                $('#tableReload2').load(location.href + " #tableReload2");
                $('#cartReload2').load(location.href + " #cartReload2");
                $('#mesVal').html(response.message);
                $('.btn-count').load(location.href + " .btn-count");
                $('.body-count').load(location.href + " .body-count");
                $('#collapseExample').addClass('show');
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
                $('#btn_' + rowid).hide();
                // checkout_data_calculate(response.cartTotal);
                shippingCharge(response.cartTotal);
            }
        });
    }

    function removeCart(rowid,div) {
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('removeToCart') ?>",
            data: {
                rowid: rowid
            },
            success: function(response) {
                $('#cartReload').load(location.href + " #cartReload");
                $('#cartReload2').load(location.href + " #cartReload2");
                $('#tableReload').load(location.href + " #tableReload");
                $('#tableReload2').load(location.href + " #tableReload2");
                $('#mesVal').html('Successfully remove to cart');
                $('.btn-count').load(location.href + " .btn-count");
                $('.body-count').load(location.href + " .body-count");
                $('#collapseExample').addClass('show');
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
                // checkout_data_calculate(response);
                shippingCharge(response);
                $(div).parent().parent().remove();

                $.ajax({
                    method: "GET",
                    url: "<?php echo base_url('cart_empty_check') ?>",
                    data: {},
                    success: function(result) {
                        if (result == false){
                            location.reload();
                        }
                    }
                });
            }
        });
    }

    function pass_show(val) {
        // var html =
        //     '<h6 class="mt-2">Change information</h6><div class="form-group mt-4"><label>Current password</label><input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current password" required></div><div class="form-group mt-4"><label>New password</label><input type="password" name="new_password" class="form-control" placeholder="New password" required></div><div class="form-group mt-4"><label>Confirm password</label><input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required></div>';

        let html = `<h6 class="mt-2">Change information</h6><div class="form-group mt-4"><label>Current password</label><input type="password" name="current_password" id="current_password" class="form-control in_err" placeholder="Current password" required><span class="text-danger d-inline-block err text-capitalize" id="password_err_mess"></span></div><div class="form-group "><label>New password</label><input type="password" name="new_password" class="form-control in_err" id="new_password" placeholder="New password" required><span class="text-danger d-inline-block err text-capitalize mb-4" id="new_password_err_mess"></span></div><div class="form-group "><label>Confirm password</label><input type="password" name="confirm_password" class="form-control in_err" id="confirm_password" placeholder="Confirm password" required> <span class="text-danger d-inline-block err text-capitalize mb-4" id="confirm_password_err_mess"></span></div>`;

        if (val == '1') {
            $('#passReset').val(0);
            $('#pass-data').html(html);
        } else {
            $('#passReset').val(1);
            $('#pass-data').html('');
        }
    }

    function viewStyle(view) {
        if (view == 'list') {
            $("#list-btn").addClass('active-view');
            $("#gird-btn").removeClass('active-view');
            $("#grid-view").hide();
            $("#list-view").show();
        }
        if (view == 'gird') {
            $("#gird-btn").addClass('active-view');
            $("#list-btn").removeClass('active-view');
            $("#grid-view").show();
            $("#list-view").hide();
        }
    }

    function formSubmit() {
        $("#searchForm").submit();
    }

    function subscription() {

        var val = 'unchecked';
        var checkBox = document.getElementById("flexCheckDefault");

        if (checkBox.checked) {
            val = 'checked';
        }

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('newsletter_action'); ?>",
            data: { value: val },
            success: function(response) {
                $("#message").html(response);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: ", error);
                alert("Something went wrong!");
            }
        });
    }

    function bothPriceCalculat() {

        var formData = $('#both-product').serialize();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('both_product_price') ?>',
            data: formData,
            success: function(data) {
                $('#price-both').html(data);
            }
        });


    }

    function groupAdtoCart() {
        var formData = $('#both-product').serialize();
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtocartgroup') ?>",
            data: formData,
            success: function(response) {
                $('#cartReload').load(location.href + " #cartReload");
                $('#cartReload2').load(location.href + " #cartReload2");
                $('#mesVal').html(response);
                $('.btn-count').load(location.href + " .btn-count");
                $('.body-count').load(location.href + " .body-count");
                $('#collapseExample').addClass('show');
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);
            }
        });
    }

    function subscribe() {
        var email = $('#subscribe_email').val();
        if (email == '') {
            $('#mesVal').html('Email required');
            $('.message_alert').show();
            setTimeout(function() {
                $("#messAlt").fadeOut(1500);
            }, 600);
        } else {
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('user_subscribe') ?>",
                data: {
                    email: email
                },
                success: function(response) {
                    $('#subscribe_email').val('');
                    $('#mesVal').html(response);
                    $('.message_alert').show();
                    setTimeout(function() {
                        $("#messAlt").fadeOut(1500);
                    }, 600);
                }
            });
        }
    }

    function video_close() {
        $("#sample_video")[0].src += "?autoplay=0";
    }

    function topSearchValidation(formId, catId, keyId, validId) {

        var cat = $('#' + catId).val();
        var key = $('#' + keyId).val();

        if ((cat == '') && (key == '')) {
            $('#' + validId).css('border', '1px solid #ff0000');
            $('#' + keyId).attr("placeholder", "Please type something to search....");
        } else {
            $('#' + formId).submit();
        }

        // border: 1px solid red;
    }

    function livenameView(newVal, viewId) {
        var f = $('#fname').val();
        var l = $('#lname').val();
        $('#' + viewId).html(f + ' ' + l);
    }

    function livename1View(newVal, viewId) {
        var f = $('#fname1').val();
        var l = $('#lname1').val();
        $('#' + viewId).html(f + ' ' + l);
    }

    function liveTextView(newVal, viewId) {

        $('#' + viewId).html(newVal);

    }

    function liveView(val, viewId) {
        // var data = $(val).attr(option);
        var data = $(val).find('option:selected').html();
        $('#' + viewId).html(data);
    }


    $(document).ready(function() {
        // shippingCharge();
        $('.toggleButton').click(function() {
            $(this).toggleClass('active');
            $(this).siblings('.elementToToggle').slideToggle();
            $(this).siblings('.elementToToggle').removeClass('d-none');
        });
    });



    var btnCartElements = document.getElementsByClassName('btn-cart');
    // Get the Mini Cart element
    var miniCart = document.getElementById('miniCart');
    for (var i = 0; i < btnCartElements.length; i++) {
        var btnCartElement = btnCartElements[i];
        btnCartElement.addEventListener('click', function() {
            // Show the Mini Cart
            miniCart.classList.add('show');
            setTimeout(function() {
                miniCart.classList.remove('show');
            }, 5000);
        });
    }

    function instruction_view(id, code) {
        if (code == 'paypal') {
            $('#checkout-form').attr('action', '<?php echo base_url('payment_paypal'); ?>');
            $('#checkout-form').attr('method', 'GET');
        }else if(code == 'stripe'){
            $('#checkout-form').attr('action', '<?php echo base_url('payment_stripe'); ?>');
            $('#checkout-form').attr('method', 'POST');
        }else if(code == 'oisbizcraft'){
            $('#checkout-form').attr('action', '<?php echo base_url('payment_oisbizcraft'); ?>');
            $('#checkout-form').attr('method', 'POST');
        } else {
            $('#checkout-form').attr('action', '<?php echo base_url('checkout_action'); ?>');
            $('#checkout-form').attr('method', 'POST');
        }
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('payment_instruction') ?>",
            data: {
                id: id
            },
            success: function(response) {
                $('#instruction').html(response);
                if (code != 'credit_card') {
                    $('#cardForm').html('');
                }
            }
        });
    }

    function cardForm(code) {
        var view =
            '<div class="title-checkout"><label class="btn bg-custom-color text-white w-100 rounded-0"><span class="text-label">Credit Card</span></label></div><div class="payment-method group-check mb-4 pb-4"><div class="row px-5 py-2"><div class="form-group mb-4 col-md-12"><label class="w-100" for="name">Card Name</label><input class="form-control rounded-0" type="text" id="card_name" name="card_name" placeholder="" required=""></div><div class="form-group mb-4 col-md-12"><label class="w-100" for="name">Card Number</label><input class="form-control rounded-0" type="number" id="card_number" name="card_number" placeholder="" required=""></div><div class="form-group mb-4 col-md-6"><label class="w-100" for="name">Expiration (mm/yy)</label><input class="form-control rounded-0" type="text"   id="card_expiration" name="card_expiration" placeholder="" required="" pattern="[0-9]*" inputmode="numeric"></div><div class="form-group mb-4 col-md-6"><label class="w-100" for="name">CVC</label><input class="form-control rounded-0" type="number" id="card_cvc" name="card_cvc" placeholder="" required=""></div></div></div>';
        if (code == 'credit_card') {
            $('#cardForm').html(view);
        }
    }

    function add_fund_instruction_view(id, code) {
        if (code == 'paypal') {
            $('#add-fund-form').attr('action', '<?php echo base_url('payment_paypal_wallet'); ?>');
            $('#add-fund-form').attr('method', 'GET');
        } else if (code == 'stripe') {
            $('#add-fund-form').attr('action', '<?php echo base_url('payment_stripe_wallet'); ?>');
            $('#add-fund-form').attr('method', 'POST');
        } else if (code == 'oisbizcraft') {
            $('#add-fund-form').attr('action', '<?php echo base_url('payment_oisbizcraft_wallet'); ?>');
            $('#add-fund-form').attr('method', 'POST');
        } else {
            $('#add-fund-form').attr('action', '<?php echo base_url('add_funds_action'); ?>');
            $('#add-fund-form').attr('method', 'POST');
        }
    }



    const scrollToTopBtn = document.getElementById("scrollToTopBtn");

    window.onscroll = function () {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            scrollToTopBtn.classList.add("show");
        } else {
            scrollToTopBtn.classList.remove("show");
        }
    };

    scrollToTopBtn.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

</script>
<?= $this->renderSection('java_script') ?>

</body>
</html>
