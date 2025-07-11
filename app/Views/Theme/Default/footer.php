<footer class="footer py-5">
    <div class="container">
        <div class="footer-logo mb-5">
            <img src="<?php echo base_url() ?>/assets/theme_1/img/logo-footer.png" alt="Amazing Gadgets" class="img-fluid">
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
                    <li><a href="#" class="nav-link">Top Searches</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <h3>We Accept</h3>
                <img src="<?php echo base_url() ?>/assets/theme_1/img/card-logo.png" alt="Cart" class="img-fluid">
            </div>
            <div class="col-sm-6 col-xl-2">
                <h3>Social Media</h3>
                <div class="social">
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('fb_url');?>"><i class="fa-brands fa-facebook-f"></i></a>
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('twitter_url');?>"><i class="fa-brands fa-twitter"></i></a>
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('tiktok_url');?>"><i class="fa-brands fa-tiktok"></i></a>
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('instagram_url');?>"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo base_url() ?>/assets/datatable/datatables.min.js" ></script>
<script>
    $("#tabledata").DataTable();
    $('.ratingPiont').starRating({
        starSize: 1.5,
        showInfo: true
    });

    $('.ratingView').starRating({
        starSize: 1.5,
        showInfo: true
    });


    function shippingAddress() {
        var shipping = document.getElementById('shipping_address');

        if (shipping.style.display === "none") {
            shipping.style.display = "block";
        } else {
            shipping.style.display = "none";
        }
    }




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
    document.querySelector('.trend-button-prev').addEventListener('click', function () {
        swiper.slidePrev();
    });

    document.querySelector('.trend-button-next').addEventListener('click', function () {
        swiper.slideNext();
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
            $('.item_'+rowid).val(quantity - 1);
        }
        $('#btn_'+rowid).show();
    }

    function plusItem(rowid){
        var quantity = parseInt($('.item_'+rowid).val());
        $('.item_'+rowid).val(quantity + 1);
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

    function checkout_data_calculate(data){
        <?php $symbol = get_lebel_by_value_in_settings('currency_symbol'); ?>

        var total = Number(data);

        $('#check_total').html('<?php echo $symbol ?>'+ total );
        $('#totalamo').val(total);

        var shipping_charge = $('#shipping_charge').val();
        var total_with_shipping = Number(total) + Number(shipping_charge);

        $('#total').html('<?php echo $symbol; ?> ' + total_with_shipping);
        $('#shipping_tot').val(total_with_shipping);
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

    function selectState(country_id,id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('checkout_country_zoon')?>",
            data: {country_id:country_id},
            success: function(data){
                $('#'+id).html(data);
            }
        });
    }

    function user_create(){

        var createNew = $('#createNew').val();
        var html = '<div class="row"><div class="col-lg-6"><div class="form-group mb-4"><label class="w-100" for="password">Password</label><input class="form-control rounded-0" type="password" name="password" id="password" placeholder="Password"  required></div></div> <div class="col-lg-6"><div class="form-group mb-4"><label class="w-100" for="password">Confirm Password</label><input class="form-control rounded-0" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"  required></div></div></div>'
        if (createNew == 0){
            $('#createNew').val(1);
            $('#regData').html(html);
        }else{
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

        <?php $symbol = get_lebel_by_value_in_settings('currency_symbol'); ?>
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
                var charge = Number(data.charge);
                var dis = Number(data.discount);

                var total = Number(totalAmount);
                var amount = Number(total) + Number(charge) - dis;

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

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('newsletter_action')?>",
            success: function(data){
                $("#message").html(data);
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

</script>
<script src="<?php echo base_url() ?>/assets/assets_fl/validation.js" type="text/javascript" ></script>
</body>
</html>
