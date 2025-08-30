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
                            <input type="text" name="subscribe_email" id="subscribe_email"  class="form-control" placeholder="Enter your Email address" aria-label="Search" aria-describedby="search-addon" />
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
                                <?php echo commonImageView('assets/theme_3/img', '', 'logo-footer.png', 'noimage.png', 'img-fluid ', '', '211', '53'); ?>
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

<script src="<?php echo base_url() ?>/assets/theme_3/script.js"></script>
<script src="<?php echo base_url() ?>/assets/theme_3/slick/slick.js" type="text/javascript" charset="utf-8"> </script>
<script src="<?php echo base_url() ?>/assets/theme_3/lightbox-plus-jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/datatable/datatables.min.js" ></script>
<script>
    $("#tableReload").DataTable();
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

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        vertical: true,
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true,
        verticalSwiping: true,
        responsive: [{
                breakpoint: 992,
                settings: {
                    vertical: true,
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    vertical: true,
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    vertical: true,
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 400,
                settings: {
                    vertical: true,
                    slidesToShow: 5
                }
            }
        ]
    });
</script>
<script>

    function buyNowAction(){
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
                    buyNow();
                    $('.message_alert').show();
                    setTimeout(function() {
                        $("#messAlt").fadeOut(1500);
                    }, 600);

                }
            });
        }));

    }
    function  buyNow(){
        location.replace("<?php echo base_url('checkout') ?>");
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

    function checkout_data_calculate(data){
        <?php $symbol = $settings['currency_symbol']; ?>

        var total = Number(data);

        $('#check_total').html('<?php echo $symbol ?>'+ total );
        $('#totalamo').val(total);

        var shipping_charge = $('#shipping_charge').val();
        var total_with_shipping = Number(total) + Number(shipping_charge);

        $('#total').html('<?php echo $symbol; ?> ' + total_with_shipping);
        $('#shipping_tot').val(total_with_shipping);
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

    function selectState(country_id, id) {
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('checkout_country_zoon') ?>",
            data: {
                country_id: country_id
            },
            success: function(data) {
                $('#' + id).html(data);
            }
        });
    }

    function user_create() {

        var createNew = $('#createNew').val();
        var html =
            '<div class="row"><div class="col-lg-6"><div class="form-group mb-4"><label class="w-100" for="password">Password</label><input class="form-control rounded-0" type="password" name="password" id="password" placeholder="Password"  required></div></div> <div class="col-lg-6"><div class="form-group mb-4"><label class="w-100" for="password">Confirm Password</label><input class="form-control rounded-0" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"  required></div></div></div>'
        if (createNew == 0) {
            $('#createNew').val(1);
            $('#regData').html(html);
        } else {
            $('#createNew').val(0);
            $('#regData').html('');
        }
    }


    function shippingCharge(tA) {
        var paymethod = $('#shipping_method:checked').val();
        var cityId = $('#stateView').val();
        if (tA == undefined) {
            var totalAmount = $('#totalamo').val();
        }else{
            var totalAmount = tA;
        }
        var shipcityId = $('#sh_stateView').val();


        $('#totalamo').val(totalAmount);
        $('#total').html('<?php echo $symbol; ?> ' + totalAmount);
        $('#check_total').html('<?php echo $symbol; ?> ' + totalAmount);

        <?php $symbol = $settings['currency_symbol']; ?>
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('shipping_rate') ?>",
            data: {
                amount: totalAmount,
                city_id: cityId,
                shipCityId: shipcityId,
                paymethod: paymethod
            },
            dataType: 'json',
            success: function(data) {
                var dis = Number(data.discount);
                var charge = Number(data.charge);

                var total = Number(totalAmount);
                var amount = total + charge - dis;


                $('#discount_charge').val(dis);
                $('#chargeDisSh').html('<?php echo $symbol; ?> ' + dis);
                $('#chargeShip').html('<?php echo $symbol; ?> ' + data.charge);
                $('#total').html('<?php echo $symbol; ?> ' + parseFloat(amount.toFixed(2)));
                $('#totalamo').val(total);
                $('#check_total').html('<?php echo $symbol; ?> ' + total);
                $('#shipping_charge').val(charge);
                $('#shipping_tot').val(parseFloat(amount.toFixed(2)));
            }
        });
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

    function optionPriceCalculate(product_id) {
        <?php foreach (get_all_data_array('cc_option') as $v) {
        $fildName = str_replace(' ', '', $v->name);

        if ($v->type == 'radio') { ?>
        var <?php echo strtolower($fildName); ?> = $('input[name="<?php echo strtolower($fildName); ?>"]:checked').val();
        <?php }

        if ($v->type == 'select') { ?>
        var <?php echo strtolower($fildName); ?> = $('[name="<?php echo strtolower($fildName); ?>"]').val();
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
            success: function(data) {
                $('#priceVal').html(data);
            }
        });
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

    function contactFormSubmit(){
        if (contactForm() == true){
            let inputcaptchavalue = $('#captcha_form').val();
            let captchaValue = $('#genaretCapt').val();
            if (inputcaptchavalue === captchaValue) {
                let email = $('#email').val();
                let message = $('#message').val();

                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url('contact_form_action') ?>",
                    data: {
                        email: email,
                        message: message,
                    },
                    success: function (response) {
                        // alert(response);
                        $('#email').val('');
                        $('#message').val('');
                        $('#mesVal').html('Your message was successfully submitted');
                        $('.message_alert').show();
                        setTimeout(function () {
                            $("#messAlt").fadeOut(1500);
                        }, 600);
                    }
                })
            }else {
                error("#messageRecaptcha", "Please Enter Valid Captcha");
                return false;
            }
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

    // blog function
    $('#commentForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                $('#commentForm')[0].reset();
                $('#mesVal').html(response);
                $('#commentBoxReload').load(document.URL + ' #commentBoxReload');
                $('.message_alert').show();
                setTimeout(function() {
                    $("#messAlt").fadeOut(1500);
                }, 600);

            }
        });
    });
    function commentReply(show,id){
        var formID = "'commentReply_" + id+"'" ;
        var html = '<form id="commentReply_'+id+'" action="<?php echo base_url('blog-comment-reply-action')?>" method="post"><div class="d-flex" > <input type="hidden" name="comment_id" class="comment_id" value="'+id+'" required> <input type="text" name="com_name" placeholder="Name" class="input-c" required> <input type="text" name="com_email" placeholder="Email" class="input-c"> </div> <div class="mt-1"> <input type="text" name="com_text" placeholder="Text" class="input-c input-te" required> <br><button type="button" class="btn btn-reply mt-1" onclick="commentReplyAction('+formID+')" >Reply  Comment</button> </div></form>';
        $("#"+show).html(html);
    }
    function commentReplyAction(formID){
        var form = document.getElementById(formID);
        $.ajax({
            url: $(form).prop('action'),
            type: "POST",
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                $('#'+formID)[0].reset();
                $('#'+formID).hide();
                $('#commentBoxReload').load(document.URL + ' #commentBoxReload');
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function () {
                    $("#messAlt").fadeOut(1500);
                }, 600);

            }
        });
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
<script src="<?php echo base_url() ?>/assets/theme_3/validation.js" type="text/javascript" ></script>
</body>
</html>
