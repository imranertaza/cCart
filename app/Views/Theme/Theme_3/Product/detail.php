<main class="main_sec_details">
    <div class="container">
        <div class="content_box">
            <div class="setting_for_chackOut">
                <div class="row ">
                    <!--image showing -->
                    <?php
                    $symbol = get_lebel_by_value_in_settings('currency_symbol');
                    $modules = modules_access();
                    $img_size_437 = ($modules['watermark'] == '1')?'437_wm_':'437_';
                    $img_size_191 = ($modules['watermark'] == '1')?'191_wm_':'191_';
                    ?>
                    <div class="col-md-6">
                        <div class="showing_image_area">
                            <div class="showing_image position-relative overflow-hidden" id="coverIMg">
                                <?php echo image_view('uploads/products', $products->product_id, $img_size_437 . $products->image, 'noimage.png', 'img-fluid' ,'cover','leance') ?>
                                <span class="lanse" leance id="lance" style="background: url('<?php echo base_url()?>/assets/assets_fl/tile._CB483369110_.gif');"></span>
                            </div>
                        </div>

                        <div class="position-relative">
                            <div class="provious" id="provious">
                                <svg width="23px" height="28px"
                                                                     viewBox="0 0 1024 1024" class="icon" version="1.1"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z"
                                            fill="#000000" />
                                </svg></div>
                            <div class="next" id="next"><svg width="23px" height="28px" viewBox="0 0 1024 1024"
                                                             class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M256 120.768L306.432 64 768 512l-461.568 448L256 903.232 659.072 512z"
                                          fill="#000000" />
                                </svg></div>
                            <div class="sub-p-img mt-3 row" id="sliderIMG">

                                <div class="sub_img">
                                    <div class="other-image">
                                        <?php echo image_view('uploads/products', $products->product_id, $img_size_437 . $products->image, 'noimage.png', 'img-opt') ?>
                                    </div>
                                </div>

                                <?php
                                if (!empty($proImg)) {
                                    foreach ($proImg as $imgval) {
                                        echo '<div class="sub_img"><div class="other-image">' . multi_image_view('uploads/products', $imgval->product_id, $imgval->product_image_id, $img_size_437 . $imgval->image, 'noimage.png', 'img-opt') . '</div></div>';
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
                                                        <?php $pp = $products->price;    echo currency_symbol_with_symbol($products->price,$symbol); ?>
                                                    <?php } else { ?>
                                                        <small class="off-price-det">
                                                            <del><?php echo currency_symbol_with_symbol($products->price,$symbol); ?></del> </small>
                                                        <?php echo currency_symbol_with_symbol($spPric,$symbol);$pp = $spPric;?>
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
                                                <a href="javascript:void(0)" class="btn rounded-0" onclick="addToCompare(<?php echo $products->product_id ?>)" >
                                                        <span>
                                                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M7.38892 11.3667L6.11892 10.2555L6.78892 9.64299L8.91892 11.5067V12.1192L6.78892 13.983L6.07892 13.3617L7.34892 12.2505H5.49892C5.17024 12.2517 4.84456 12.1959 4.54065 12.0863C4.23673 11.9768 3.96061 11.8157 3.7282 11.6124C3.49579 11.409 3.31169 11.1674 3.18652 10.9015C3.06136 10.6356 2.99759 10.3506 2.99892 10.063V5.20675C2.5198 5.11749 2.07943 4.91118 1.72892 4.61175C1.38078 4.30397 1.14393 3.91331 1.0479 3.48851C0.951868 3.06371 1.00091 2.62357 1.18892 2.223C1.37866 1.82378 1.69936 1.48272 2.1105 1.24288C2.52164 1.00305 3.00479 0.875207 3.49892 0.875495C3.84188 0.869044 4.18256 0.925683 4.49892 1.04175C4.80197 1.15083 5.07732 1.31139 5.30903 1.51414C5.54075 1.7169 5.72425 1.95782 5.84892 2.223C5.98192 2.50037 6.04592 2.79875 6.03892 3.098C6.03904 3.60228 5.84003 4.09111 5.47557 4.48177C5.11112 4.87242 4.6036 5.14089 4.03892 5.24174V10.0542C4.03892 10.4023 4.19695 10.7362 4.47826 10.9823C4.75956 11.2285 5.14109 11.3667 5.53892 11.3667H7.38892ZM2.70892 4.14799C2.99744 4.31619 3.34363 4.39174 3.68862 4.3618C4.03362 4.33187 4.35611 4.19829 4.60125 3.98379C4.84639 3.76929 4.99905 3.48711 5.03327 3.18524C5.06748 2.88337 4.98114 2.58045 4.78892 2.328C4.62118 2.11055 4.38497 1.94035 4.10892 1.838C3.83644 1.74088 3.5372 1.71652 3.24892 1.768C2.95693 1.8174 2.68852 1.94213 2.47823 2.12614C2.26793 2.31015 2.12538 2.54501 2.06892 2.8005C2.01009 3.05274 2.03793 3.31457 2.14892 3.553C2.26592 3.79537 2.45992 4.00187 2.70892 4.14799ZM13.0389 9.66049C13.5189 9.74624 13.9609 9.95362 14.3089 10.2555C14.7166 10.6144 14.9702 11.0856 15.0267 11.5892C15.0832 12.0929 14.9391 12.5982 14.6189 13.0196C14.4132 13.2879 14.1422 13.5131 13.8253 13.6788C13.5083 13.8446 13.1534 13.9468 12.7859 13.9782C12.4184 14.0097 12.0476 13.9695 11.6999 13.8606C11.3523 13.7517 11.0366 13.5767 10.7754 13.3484C10.5143 13.12 10.3142 12.8438 10.1895 12.5397C10.0648 12.2356 10.0187 11.9111 10.0544 11.5896C10.0901 11.268 10.2068 10.9574 10.396 10.6799C10.5853 10.4025 10.8424 10.1652 11.1489 9.98512C11.4179 9.82587 11.7199 9.71562 12.0389 9.66137V4.80424C12.0389 4.45615 11.8809 4.12231 11.5996 3.87617C11.3183 3.63003 10.9367 3.49175 10.5389 3.49175H8.68892L9.95892 4.603L9.24892 5.22425L7.11892 3.3605V2.748L9.24892 0.884245L9.95892 1.5055L8.68892 2.61675H10.5389C10.8676 2.61559 11.1933 2.67138 11.4972 2.7809C11.8011 2.89042 12.0772 3.05151 12.3096 3.25487C12.542 3.45823 12.7261 3.69984 12.8513 3.96576C12.9765 4.23168 13.0402 4.51665 13.0389 4.80424V9.66049ZM12.6879 13.1106C12.9451 13.088 13.1913 13.0077 13.4026 12.8773C13.6139 12.7469 13.783 12.571 13.8937 12.3666C14.0044 12.1622 14.0528 11.9362 14.0343 11.7106C14.0157 11.4849 13.9309 11.2673 13.7879 11.0789C13.6202 10.8614 13.384 10.6912 13.1079 10.5889C12.8357 10.4919 12.5369 10.4676 12.2489 10.5189C11.9569 10.5683 11.6885 10.693 11.4782 10.877C11.2679 11.061 11.1254 11.2959 11.0689 11.5514C11.0101 11.8036 11.0379 12.0654 11.1489 12.3039C11.2718 12.5655 11.4881 12.7854 11.7654 12.9308C12.0427 13.0761 12.3663 13.1392 12.6879 13.1106Z"
                                                                      fill="#444444" />
                                                            </svg>
                                                        </span>
                                                    <span>Add to Compare</span>
                                                </a>
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
                                                        <span><svg width="15" height="14" viewBox="0 0 15 14"
                                                                   fill="none">
                                                                <path d="M7.49935 12.251L6.65352 11.4927C5.67157 10.608 4.85977 9.84479 4.2181 9.20312C3.57643 8.56146 3.06602 7.98532 2.68685 7.47471C2.30768 6.96449 2.04285 6.49548 1.89235 6.06771C1.74185 5.63993 1.6664 5.20243 1.66602 4.75521C1.66602 3.84132 1.97227 3.07812 2.58477 2.46562C3.19727 1.85312 3.96046 1.54687 4.87435 1.54688C5.3799 1.54688 5.86115 1.65382 6.3181 1.86771C6.77504 2.0816 7.16879 2.38299 7.49935 2.77187C7.8299 2.38299 8.22365 2.0816 8.6806 1.86771C9.13754 1.65382 9.61879 1.54688 10.1243 1.54688C11.0382 1.54688 11.8014 1.85312 12.4139 2.46562C13.0264 3.07812 13.3327 3.84132 13.3327 4.75521C13.3327 5.20243 13.2572 5.63993 13.1063 6.06771C12.9555 6.49548 12.6906 6.96449 12.3118 7.47471C11.9327 7.98532 11.4223 8.56146 10.7806 9.20312C10.1389 9.84479 9.32713 10.608 8.34518 11.4927L7.49935 12.251ZM7.49935 10.676C8.43268 9.83993 9.20074 9.12282 9.80352 8.52471C10.4063 7.9266 10.8827 7.40665 11.2327 6.96487C11.5827 6.52232 11.8257 6.12837 11.9618 5.78304C12.098 5.43771 12.166 5.0951 12.166 4.75521C12.166 4.17187 11.9716 3.68576 11.5827 3.29687C11.1938 2.90799 10.7077 2.71354 10.1243 2.71354C9.6674 2.71354 9.24449 2.84226 8.8556 3.09971C8.46671 3.35715 8.19935 3.68537 8.05352 4.08437H6.94518C6.79935 3.68576 6.53199 3.35754 6.1431 3.09971C5.75421 2.84187 5.33129 2.71315 4.87435 2.71354C4.29102 2.71354 3.8049 2.90799 3.41602 3.29687C3.02713 3.68576 2.83268 4.17187 2.83268 4.75521C2.83268 5.09548 2.90074 5.43829 3.03685 5.78362C3.17296 6.12896 3.41602 6.52271 3.76602 6.96487C4.11602 7.40704 4.5924 7.92718 5.19518 8.52529C5.79796 9.1234 6.56602 9.84032 7.49935 10.676Z"
                                                                      fill="#444444" />
                                                            </svg>
                                                        </span>
                                                        <span>Add to Whislist</span>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" class="btn rounded-0">
                                                            <span><svg width="15" height="14" viewBox="0 0 15 14"
                                                                       fill="none">
                                                                    <path d="M7.49935 12.251L6.65352 11.4927C5.67157 10.608 4.85977 9.84479 4.2181 9.20312C3.57643 8.56146 3.06602 7.98532 2.68685 7.47471C2.30768 6.96449 2.04285 6.49548 1.89235 6.06771C1.74185 5.63993 1.6664 5.20243 1.66602 4.75521C1.66602 3.84132 1.97227 3.07812 2.58477 2.46562C3.19727 1.85312 3.96046 1.54687 4.87435 1.54688C5.3799 1.54688 5.86115 1.65382 6.3181 1.86771C6.77504 2.0816 7.16879 2.38299 7.49935 2.77187C7.8299 2.38299 8.22365 2.0816 8.6806 1.86771C9.13754 1.65382 9.61879 1.54688 10.1243 1.54688C11.0382 1.54688 11.8014 1.85312 12.4139 2.46562C13.0264 3.07812 13.3327 3.84132 13.3327 4.75521C13.3327 5.20243 13.2572 5.63993 13.1063 6.06771C12.9555 6.49548 12.6906 6.96449 12.3118 7.47471C11.9327 7.98532 11.4223 8.56146 10.7806 9.20312C10.1389 9.84479 9.32713 10.608 8.34518 11.4927L7.49935 12.251ZM7.49935 10.676C8.43268 9.83993 9.20074 9.12282 9.80352 8.52471C10.4063 7.9266 10.8827 7.40665 11.2327 6.96487C11.5827 6.52232 11.8257 6.12837 11.9618 5.78304C12.098 5.43771 12.166 5.0951 12.166 4.75521C12.166 4.17187 11.9716 3.68576 11.5827 3.29687C11.1938 2.90799 10.7077 2.71354 10.1243 2.71354C9.6674 2.71354 9.24449 2.84226 8.8556 3.09971C8.46671 3.35715 8.19935 3.68537 8.05352 4.08437H6.94518C6.79935 3.68576 6.53199 3.35754 6.1431 3.09971C5.75421 2.84187 5.33129 2.71315 4.87435 2.71354C4.29102 2.71354 3.8049 2.90799 3.41602 3.29687C3.02713 3.68576 2.83268 4.17187 2.83268 4.75521C2.83268 5.09548 2.90074 5.43829 3.03685 5.78362C3.17296 6.12896 3.41602 6.52271 3.76602 6.96487C4.11602 7.40704 4.5924 7.92718 5.19518 8.52529C5.79796 9.1234 6.56602 9.84032 7.49935 10.676Z"
                                                                            fill="#444444" />
                                                                </svg>
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
                            <?php if (!empty($products->description)){ ?>
                            <div class="readMore">
                                <span id="SeenMmore">See More Product Details</span>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="image-contant">
                            <?php echo image_view('uploads/products', $products->product_id, $img_size_437 . $products->image, 'noimage.png', 'img-fluid w-100') ?>
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
                        <?php if (!empty($relProd)) { foreach ($relProd as $rPro) { ?>
                        <div class="col-6 col-lg-2 col-sm-4">
                            <div class="card rounded-0">
                                <div class="r-product">
                                    <a href="<?php echo base_url('detail/' . $rPro->product_id) ?>"><?php echo image_view('uploads/products', $rPro->product_id, $img_size_191 . $rPro->image, 'noimage.png', 'card-img-top rounded-0') ?></a>


                                    <h5 class="card-title"><?php echo substr($rPro->name, 0, 60); ?></h5>
                                    <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $rPro->product_id);
                                    if (empty($spPric)) { ?>
                                       <p> <?php echo currency_symbol_with_symbol($rPro->price,$symbol); ?> </p>
                                    <?php } else { ?>
                                        <small class="off-price">
                                            <del><?php echo currency_symbol_with_symbol($rPro->price,$symbol); ?></del>
                                        </small>/<?php echo currency_symbol_with_symbol($spPric,$symbol); ?>
                                    <?php } ?>
                                    <div class="addtocard text-center">
                                        <div class="addtoCardBtn m-auto"><a href="javascript:void(0)" onclick="addToCart('<?php echo $rPro->product_id;?>')" >Add to Cart</a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script src="<?php echo base_url() ?>/assets/theme_3/details.js"></script>