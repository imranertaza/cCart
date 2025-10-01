<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $description;?>" >
    <meta name="keywords" content="<?php echo $keywords;?>" >

    <link rel="shortcut icon" href="<?php echo base_url() ?>/uploads/logo/<?php echo get_lebel_by_value_in_theme_settings('favicon');?>">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_1/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_1/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/lightbox.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin >
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/datatable/datatables.min.css" rel="stylesheet"  >
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_1/style.min.css">

    <script src="<?php echo base_url() ?>/assets/theme_3/lightbox-plus-jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_1/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_1/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_1/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_1/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_1/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_1/jquery.star-rating.min.js"></script>


</head>
<body>
<div class="message_alert" id="messAlt" >
    <div class="alert-success_web py-2 px-3 border-0 text-white fs-5 text-capitalize" id="mesVal" >  </div>
</div>
<header class="header bg-white">
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <span class="me-4"><a href="">Free delivery</a></span>
                    <span><a href="<?php echo base_url('page/returns-policy')?>">Returns Policy</a></span>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                        <a class="me-3 d-flex" href="<?php echo base_url('favorite')?>">
                            <span><i class="fa-solid fa-heart me-1"></i></span>
                            <span>Wishlist</span>
                        </a>
                    <?php } ?>

                    <?php if (modules_key_by_access('compare') == 1) { ?>
                        <a class="me-3 d-flex" href="<?php echo base_url('compare')?>">
                            <span><i class="fa-solid fa-code-compare"></i></span>
                            <span> Compare</span>
                        </a>
                    <?php } ?>

                    <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                        <a class="me-3 py-3 pe-3 border-end d-flex" href="<?php echo base_url('register')?>">
                            <span><i class="fa-solid fa-user me-1"></i></span>
                            <span class="d-none d-sm-block">Create an account</span>
                        </a>
                        <a class="btn btn-signin text-white bg-black" href="<?php echo base_url('login')?>"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Sign In</a>
                    <?php } else { ?>
                        <a class="btn btn-signin text-white bg-black mt-2 mb-2" href="<?php echo base_url('dashboard')?>">Dashboard</a>
                    <?php }?>

                </div>
            </div>
        </div>
    </div>
    <div class="header-main py-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-3 order-1 mb-3 mb-md-0">
                    <div class="logo">
                        <a href="<?php echo base_url()?>">
                            <?php
                            $logoImg  = get_lebel_by_value_in_theme_settings('side_logo');
                            $alt_name = getLebelByAltNameInThemeSettings('side_logo');
                            echo image_view('uploads/logo', '', $logoImg, 'noimage.png', 'img-fluid', $alt_name, 'logo');?>

                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-3 order-md-2 mb-3 mb-md-0">
                    <?php if (modules_key_by_access('top_search') == 1) { ?>
                        <form action="<?php echo base_url('products/search');?>" class="mini-search" method="GET">
                            <div class="input-group">
                                <div class="input-group-btn search-panel">
                                    <!--                                <select name="top_category"  class="form-select rounded-0">-->
                                    <select name="cat"  class="form-select rounded-0">
                                        <option value="">All Categories</option>
                                        <?php foreach (getParentCategoryArray() as $catTop) {
                                $tCat =  isset($top_category) ? $top_category : ''; ?>
                                            <option value="<?php echo $catTop->prod_cat_id; ?>" <?php echo ($tCat == $catTop->prod_cat_id) ? 'selected' : ''; ?> ><?php echo $catTop->category_name; ?></option>
                                            <?php
                            } ?>
                                    </select>
                                </div>
                                <input type="text" class="form-control" name="keywordTop" placeholder="Search term..." value="<?php echo isset($keywordTop) ? $keywordTop : '';?>" required>
                                <span class="input-group-btn">
                                <button class="btn btn-default border rounded-0 bg-black text-white" type="submit">
                                    <i class="fa-solid fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <div class="col-6 col-md-3 mb-3 mb-md-0 order-2 order-md-3 d-flex justify-content-end" >
                    <a href="<?php echo base_url('cart')?>" >
                        <div class="mini-cart d-flex position-relative" id="cartReload">

                            <div class="cart-icon rounded-5 align-items-center justify-content-center p-3 me-3">
                                <img src="<?php echo base_url() ?>/assets/theme_1/img/cart.png" alt="" class="img-fluid">
                            </div>
                            <span class="cart-item position-absolute rounded-5 d-flex align-items-center justify-content-center"><?php echo count(Cart()->contents()); ?></span>
                            <div class="cart-content d-flex flex-column">
                                <span class="w-100">My Cart</span>
                                <span class="total"> <?php echo currency_symbol(Cart()->total()) ?></span>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row gx-0">
                <div class="col-xl-3 col-lg-4 col-md-6 col-8">
                    <?php if (isset($home_menu)) {  ?>
                        <div class="allcategory h-100 w-100">
                            <button class="cat-btn-h btn bg-black text-white text-uppercase show fw-semibold dropdown-toggle rounded-0 h-100  border-0 text-center w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bars me-3"></i>
                                Shop by Categories
                            </button>
                            <ul class="dropdown-menu show">
                                <?php foreach (getSideMenuArray() as $pcat) {?>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo base_url('category/' . $pcat->prod_cat_id);?>">
                                    <span class="icon">
                                        <?php echo get_data_by_id('code', 'cc_icons', 'icon_id', $pcat->icon_id); ?>
                                    </span>
                                            <?php echo $pcat->category_name; ?>
                                            <?php  if (!empty(count(getCategoryBySubArray($pcat->prod_cat_id)))) { ?>
                                                <i class="fa-solid fa-angle-right  float-end"></i>
                                            <?php } ?>
                                        </a>
                                        <?php  if (!empty(count(getCategoryBySubArray($pcat->prod_cat_id)))) { ?>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <?php foreach (getCategoryBySubArray($pcat->prod_cat_id) as $sCat) { ?>
                                                    <li><a class="dropdown-item" href="<?php echo base_url('category/' . $sCat->prod_cat_id);?>"><?php echo $sCat->category_name; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div class="breadcrumb mb-0 mt-3 d-flex align-items-center">
                            <a href="<?php echo base_url();?>">Home</a>
                            <i class="fa fa-angle-right mx-2"></i>
                            <?php echo (isset($page_title)) ? $page_title : '';?>
                        </div>
                    <?php } $modules = modules_access(); ?>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-6 col-4 d-flex align-items-center">
                    <nav class="navbar-primary navbar navbar-expand-xl">
                        <div class="container-fluid">
                            <button class="navbar-toggler" id="navbarPopUp" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <button type="button" class="btn-close d-xl-none" id="navClose" aria-label="Close"></button>
                                <ul class="navbar-nav d-flex justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="<?php echo base_url()?>">Home</a>
                                    </li>

                                    <?php echo top_menu();?>
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
                                        <a class="nav-link" href="<?php echo base_url('page/contact-us')?>">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('page/about-us')?>">About Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="help-center">
                        <a class="d-flex" href="<?php echo base_url()?>">
                            <span><img src="<?php echo base_url()?>/assets/theme_1/img/info.png" alt="" class="img-fluid"></span>
                            <span class="d-none d-md-block">Help Center</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<button id="scrollToTopBtn" title="Go to top">↑</button>

<?= $this->renderSection('content'); ?>

<footer class="footer py-5">
    <div class="container">
        <div class="footer-logo mb-5">
            <img src="<?php echo base_url() ?>/assets/theme_1/img/logo-footer.png" alt="footer logo" class="img-fluid">
        </div>
        <div class="row gx-5">
            <div class="col-sm-6 col-xl-4 mb-4 mb-xl-0 pe-5">
                <h3>Find It Fast</h3>
                <div class="d-flex mb-3 mb-md-5">
                    <div class="icon me-3">
                        <img src="<?php echo base_url() ?>/assets/theme_1/img/icon-map.png" alt="Maps">
                    </div>
                    <div class="address">
                        <?php echo get_lebel_by_value_in_settings('address');?>
                    </div>
                </div>
                <div class="d-flex mb-3 mb-md-5">
                    <div class="icon me-3">
                        <img src="<?php echo base_url() ?>/assets/theme_1/img/icon-phone.png" alt="Phone">
                    </div>
                    <div class="phone">
                        <a href="tel:<?php echo get_lebel_by_value_in_settings('phone');?>"><?php echo get_lebel_by_value_in_settings('phone');?></a>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="icon me-3">
                        <img src="<?php echo base_url() ?>/assets/theme_1/img/icon-email.png" alt="Email">
                    </div>
                    <div class="email">
                        <a href="mailto:<?php echo get_lebel_by_value_in_settings('email');?>"><?php echo get_lebel_by_value_in_settings('email');?></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3 mb-md-5 mb-xl-0">
                <h3>Customer Care</h3>
                <ul class="list-unstyled lh-lg">
                    <li><a href="<?php echo base_url('dashboard');?>" class="nav-link">My Account</a></li>
                    <li><a href="<?php echo base_url('page/privacy-policy')?>" class="nav-link">Privacy Policy</a></li>
                    <li><a href="<?php echo base_url('page/terms-and-conditions')?>" class="nav-link">Terms and Conditions</a></li>
                    <li><a href="<?php echo base_url('page/returns-policy')?>" class="nav-link">Returns/Exchange</a></li>
                    <li><a href="<?php echo base_url('page/about-us');?>" class="nav-link">About Us</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <h3>We Accept</h3>
                <img src="<?php echo base_url() ?>/assets/theme_1/img/card-logo.png" alt="Cart" class="img-fluid">
            </div>
            <div class="col-sm-6 col-xl-2">
                <h3>Social Media</h3>
                <div class="social">
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('fb_url');?>" rel="noopener noreferrer" aria-label="Visit our Facebook page"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('twitter_url');?>" rel="noopener noreferrer" aria-label="Visit our Twitter page"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a>
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('tiktok_url');?>" rel="noopener noreferrer" aria-label="Visit our Tiktok page"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('instagram_url');?>" rel="noopener noreferrer" aria-label="Visit our Instagram page"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo base_url() ?>/assets/datatable/datatables.min.js" ></script>
<script src="<?php echo base_url() ?>/assets/theme_3/validation.js" ></script>

<script>

    $('.ratingPiont').starRating({
        starSize: 1.5,
        showInfo: true
    });

    $('.ratingView').starRating({
        starSize: 1.5,
        showInfo: true
    });


    var slider = new Swiper ('.gallery-slider', {
        slidesPerView: 1,
        centeredSlides: true,
        loop: true,
        loopedSlides: 4,
    });

    var thumbs = new Swiper ('.gallery-thumbs', {
        slidesPerView: 'auto',
        spaceBetween: 10,
        loopedSlides: 4,
        centeredSlides: true,
        loop: true,
        slideToClickedSlide: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    slider.controller.control = thumbs;
    thumbs.controller.control = slider;

    const formSelect = document.getElementById('form-select');
    // Update the custom select
    // FancySelect.update(formSelect);

    $('#navbarPopUp').click(function () {
        $('#navbarNav').addClass('offcanvas offcanvas-end text-bg-dark');
        $('.navbar-primary ul.navbar-nav').addClass('offcanvas-body');
    });
    $('#navClose').click(function () {
        $("#navbarNav").removeClass('show');

    });
    var swiper = new Swiper(".bannerSlide", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        }
    });
    var swiper = new Swiper(".trendSlide", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: ".trend-button-next",
            prevEl: ".trend-button-prev",
        },
        breakpoints: {
            992: {
                slidesPerView: 3,
                spaceBetween: 31,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            0: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
        },
    });

    $(document).ready(function(){

        var quantitiy=0;
        $('#plus-btn').click(function(e){

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#qty_input').val());

            // If is not undefined

            $('#qty_input').val(quantity + 1);


            // Increment

        });

        $('#minus-btn').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#qty_input').val());

            // If is not undefined

            // Increment
            if(quantity>0){
                $('#qty_input').val(quantity - 1);
            }
        });

    });

    function addToCompare(pro_id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtoCompare')?>",
            data: {product_id:pro_id},
            success: function(response){
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }

    function removeToCompare(key_id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('removeToCompare')?>",
            data: {key_id:key_id},
            success: function(response){
                $('#compReload').load(location.href + " #compReload");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }

    function addToWishlist(pro_id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtoWishlist')?>",
            data: {product_id:pro_id},
            success: function(response){
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }

    function addToCart(pro_id){
        var qty = $('#qty_input').val();
        if (qty == null){
            qty = '1';
        }
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtocart')?>",
            data: {product_id:pro_id,qtyall:qty },
            success: function(response){
                $('#cartReload').load(location.href + " #cartReload");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }

    function minusItem(rowid){
        var quantity = parseInt($('.item_'+rowid).val());
        if(quantity>1){
            // $('.item_'+rowid).val(quantity - 1);
            $('#item_'+rowid).val(quantity - 1);
        }
        $('#btn_'+rowid).show();
    }

    function plusItem(rowid){
        var quantity = parseInt($('.item_'+rowid).val());
        // $('.item_'+rowid).val(quantity + 1);
        $('#item_'+rowid).val(quantity + 1);
        $('#btn_'+rowid).show();
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
            }
        });
    }

    function pass_show(val){
        // var html = '<h6 class="mt-2">Change information</h6><div class="form-group mt-4"><label>Current password</label><input type="password" name="current_password" class="form-control" placeholder="Current password" required></div><div class="form-group mt-4"><label>New password</label><input type="password" name="new_password" class="form-control" placeholder="New password" required></div><div class="form-group mt-4"><label>Confirm password</label><input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required></div>';

        var html = `<h6 class="mt-2">Change information</h6><div class="form-group mt-4"><label>Current password</label><input type="password" name="current_password" id="current_password" class="form-control in_err" placeholder="Current password" required><span class="text-danger d-inline-block err text-capitalize" id="password_err_mess"></span></div><div class="form-group "><label>New password</label><input type="password" name="new_password" class="form-control in_err" id="new_password" placeholder="New password" required><span class="text-danger d-inline-block err text-capitalize mb-4" id="new_password_err_mess"></span></div><div class="form-group "><label>Confirm password</label><input type="password" name="confirm_password" class="form-control in_err" id="confirm_password" placeholder="Confirm password" required> <span class="text-danger d-inline-block err text-capitalize mb-4" id="confirm_password_err_mess"></span></div>`;

        if (val == '1') {
            $('#passReset').val(0);
            $('#pass-data').html(html);
        }else{
            $('#passReset').val(1);
            $('#pass-data').html('');
        }
    }

    function viewStyle(view){
        if (view == 'list'){
            $( "#list-btn" ).addClass( 'active-view');
            $( "#gird-btn" ).removeClass( 'active-view');
            $( "#grid-view" ).hide();
            $( "#list-view" ).show();
        }
        if (view == 'gird'){
            $( "#gird-btn" ).addClass( 'active-view');
            $( "#list-btn" ).removeClass( 'active-view');
            $( "#grid-view" ).show();
            $( "#list-view" ).hide();
        }
    }

    function formSubmit(){
        $("#searchForm").submit();
    }

    function subscription(){
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

    function instruction_view(id, code) {
        if (code == 'paypal') {
            $('#checkout-form').attr('action', '<?php echo base_url('payment_paypal'); ?>');
            $('#checkout-form').attr('method', 'GET');
        }else if(code == 'stripe'){
            $('#checkout-form').attr('action', '<?php echo base_url('payment_stripe'); ?>');
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

</script>
<?= $this->renderSection('java_script') ?>

</body>
</html>

