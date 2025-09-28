<?= $this->extend('Theme/Theme_3/layout') ?>
<?= $this->section('content') ?>
<main class="main_sec_details">
    <div class="container">
        <div class="content_box">
            <div class="setting_for_chackOut">
                <div class="row ">
                    <!--image showing -->
                    <?php
                    $symbol       = get_lebel_by_value_in_settings('currency_symbol');
                    $modules      = modules_access();
                    ?>
                    <div class="col-md-6">
                        <div class="showing_image_area">
                            <div class="showing_image position-relative overflow-hidden" id="coverIMg">

                                <img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $products->product_id, $products->image, 'noimage.png', '492', '450')?>" alt="<?= $products->alt_name;?>" class="img-fluid" id="cover" leance loading="lazy">
                                <span class="lanse" leance id="lance" style="background: url('<?php echo base_url()?>/assets/assets_fl/tile._CB483369110_.gif');"></span>
                            </div>
                        </div>

                        <div class="position-relative">
                            <div class="provious" id="provious">
                                <img src="<?php echo base_url('svg/predesIcon.svg')?>" alt="date">
                            </div>
                            <div class="next" id="next">
                                <img src="<?php echo base_url('svg/nextDesIcon.svg')?>" alt="date">
                            </div>
                            <div class="sub-p-img mt-3 row" id="sliderIMG">

                                <div class="sub_img">
                                    <div class="other-image">
                                        <img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $products->product_id, $products->image, 'noimage.png', '492', '450')?>" alt="<?= $products->alt_name;?>" class="img-opt"  loading="lazy">
                                    </div>
                                </div>

                                <?php
                                if (!empty($proImg)) {
                                    foreach ($proImg as $imgval) {
                                        echo '<div class="sub_img"><div class="other-image"> <img data-sizes="auto" src="' . productMultiImageViewUrl('uploads/products', $imgval->product_id, $imgval->product_image_id, $imgval->image, 'noimage.png', '492', '450') . '" alt="' . $imgval->alt_name . '" class="img-opt"  loading="lazy"></div></div>';
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <!--image details showing -->
                    <div class="col-md-6">
                        <form id="addto-cart-form" action="<?php echo base_url('addtocartdetail') ?>" method="post">
                            <?php
                    $stock = get_data_by_id('quantity', 'cc_products', 'product_id', $products->product_id);
                    $brand = get_data_by_id('name', 'cc_brand', 'brand_id', $products->brand_id);
                    ?>
                        <div class="product-settings position-relative">
                            <div id="zoomViewContainer">
                                <div id="zoom-view"></div>
                            </div>
                            <div class="product-title">
                                <h4><?php echo $products->name; ?></h4>
                            </div>
                            <div class="reatings-area">
                                <?php echo product_id_by_rating($products->product_id, '1'); ?>

                            </div>

                            <div class="stock-showing mt-3 mb-6">
                                <?php if (!empty($stock)) { ?>
                                <span>IN STOCK <span class="num-stock">(<?php echo $stock; ?>)</span></span>
                                <?php } else { ?>
                                <span>OUT OF STOCK</span>
                                <?php } ?>
                            </div>

                            <div class="product-detiles-setup">
                                <!--Brand name -->
                                <div class="row mb-6">
                                    <div class="col-4">
                                        <div class="title-drand">
                                            <span>Brand</span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="brand-name">
                                            <span><?php echo $brand;?></span>
                                        </div>
                                    </div>
                                </div>
                                <!--product color -->

                                <div class="row mb-6">
                                    <?php echo $option;?>
                                </div>

                                <div class="user-desition-quantity">
                                    <div class="quantity-change">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text rounded-0 cal-btn"
                                                                  id="q-dri">-</span>
                                                    </div>
                                                    <input type="text" name="qty" class="form-control text-center"
                                                           id="quantityCount" value="1">
                                                    <div class="input-group-append">
                                                            <span id="q-inc"
                                                                  class="input-group-text rounded-0 cal-btn">+</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="product-price text-end" id="priceVal">
                                                    <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $products->product_id);

                    if (empty($spPric)) { ?>
                                                        <?php $pp = $products->price;
                        echo currency_symbol_with_symbol($products->price, $symbol); ?>
                                                    <?php } else { ?>
                                                        <small class="off-price-det">
                                                            <del><?php echo currency_symbol_with_symbol($products->price, $symbol); ?></del> </small>
                                                        <?php echo currency_symbol_with_symbol($spPric, $symbol);
                                                        $pp = $spPric;?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-desition">
                                    <div class="row">
                                        <div class="col-6">
                                            <?php if (!empty($stock)) { ?>
                                            <div class="addto-card-2btn">
                                                <input type="hidden" name="product_id" value="<?php echo $products->product_id ?>"
                                                       required>
                                                <button type="submit" class="btn rounded-0" onclick="buyNowAction()">
                                                    Buy Now
                                                </button>
                                            </div>
                                            <?php } ?>

                                            <?php if ($modules['compare'] == 1) { ?>
                                            <div class="addto-card-3btn">
                                                <button class="btn rounded-0" onclick="addToCompare(<?php echo $products->product_id ?>)" >
                                                        <span>
                                                            <img src="<?php echo base_url('svg/compareIcon.svg')?>" alt="date">
                                                        </span>
                                                    <span>Add to Compare</span>
                                                </button>
                                            </div>
                                            <?php } ?>
                                        </div>


                                        <div class="col-6">
                                            <?php if (!empty($stock)) { ?>
                                            <div class="addto-card-4btn">
                                                <input type="hidden" name="product_id" value="<?php echo $products->product_id ?>"
                                                       required>
                                                <button type="submit" class="btn rounded-0" onclick="addToCartdetail()">
                                                    Add to Cart
                                                </button>
                                            </div>
                                            <?php } ?>

                                            <?php if ($modules['wishlist'] == 1) { ?>
                                            <div class="addto-card-3btn">
                                                <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                                                    <a href="<?php echo base_url('login'); ?>"
                                                       class="btn rounded-0">
                                                        <span>
                                                            <img src="<?php echo base_url('svg/whislistIcon.svg')?>" alt="date">
                                                        </span>
                                                        <span>Add to Whislist</span>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" class="btn rounded-0">
                                                            <span>
                                                                <img src="<?php echo base_url('svg/whislistIcon.svg')?>" alt="date">
                                                            </span>
                                                        <span>Add to Whislist</span>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="detiles-section">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="detiles-text-contant">
                            <div class="headding-text">
                                <h3>About this item</h3>
                            </div>
                            <div class="text-list" id="TextLIst">
                                <?php echo $products->description; ?>
                            </div>
                            <?php if (!empty($products->description)) { ?>
                            <div class="readMore">
                                <span id="SeenMmore">See More Product Details</span>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="image-contant">
                            <img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $products->product_id, $products->image, 'noimage.png', '416', '381');?>" alt="<?= $products->alt_name;?>" class="img-fluid" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>

            <div class="related-product-area">
                <div class="related-product-content">
                    <div class="related-product-headding">
                        <span>Related Product</span>
                    </div>
                </div>
                <div class="related-products">
                    <div class="row">
                        <?php if (!empty($relProd)) {
                                                            foreach ($relProd as $rPro) { ?>
                        <div class="col-6 col-lg-3 col-sm-4">
                            <div class="card rounded-0">
                                <div class="r-product">
                                    <a href="<?php echo base_url('detail/' . $rPro->product_id) ?>"><img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $rPro->product_id, $rPro->image, 'noimage.png', '181', '181');?>" alt="<?= $rPro->alt_name;?>" class="card-img-top rounded-0" loading="lazy"></a>


                                    <h5 class="card-title"><?php echo substr($rPro->name, 0, 60); ?></h5>
                                    <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $rPro->product_id);

                                if (empty($spPric)) { ?>
                                       <p> <?php echo currency_symbol_with_symbol($rPro->price, $symbol); ?> </p>
                                    <?php } else { ?>
                                        <small class="off-price">
                                            <del><?php echo currency_symbol_with_symbol($rPro->price, $symbol); ?></del>
                                        </small>/<?php echo currency_symbol_with_symbol($spPric, $symbol); ?>
                                    <?php } ?>
                                    <div class="addtocard text-center">
                                        <div class="addtoCardBtn m-auto"><button class="btnCart" onclick="addToCart('<?php echo $rPro->product_id;?>')" >Add to Cart</button></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php }
                                                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script src="<?php echo base_url() ?>/assets/theme_3/details.js"></script>
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
    // filter items sort
    document.addEventListener("DOMContentLoaded", function() {
        // Get all ULs with the class
        let lists = document.querySelectorAll(".filter-items-sort");

        lists.forEach(function(ul) {
            // Grab <li> elements
            let items = Array.from(ul.getElementsByTagName("li"));

            // Sort by <label> text
            items.sort((a, b) => {
                let textA = a.querySelector("label").textContent.trim();
                let textB = b.querySelector("label").textContent.trim();
                return textA.localeCompare(textB, undefined, { numeric: true });
            });

            // Re-append sorted items
            items.forEach(li => ul.appendChild(li));
        });
    });

</script>
<?= $this->endSection() ?>
