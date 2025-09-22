<section class="main-container">
    <div class="container">
        <div class="product-details">
            <div class=" p-3  mb-4 border-bottom">
                <div class="row">
                    <div class="col-md-7 col-lg-5 col-xl-6 mb-3 mb-lg-0">
                        <section class="banner-section ">
                            <div class="container  product-det-info">
                                <div class="vehicle-detail-banner banner-content clearfix">
                                    <div class="banner-slider">
                                        <div class="thumb_plus_video">
                                            <div class="row">
                                                <?php
                                                $modules      = modules_access();
                                                $symbol       = get_lebel_by_value_in_settings('currency_symbol');
                                                ?>
                                                <div class="col-2 col-sm-3 col-md-2 col-lg-3 px-0">
                                                    <div class="slider slider-nav thumb-image" style="height: 332px !important;">
                                                        <div class="thumbnail-image">
                                                            <div class="thumbImg">
                                                                <img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $products->product_id, $products->image, 'noimage.png', '100', '92');?>" alt="<?= $products->alt_name;?>" class="img-fluid" loading="lazy">
                                                            </div>
                                                        </div>

                                                        <?php
                                                        if (!empty($proImg)) {
                                                            foreach ($proImg as $imgval) {
                                                                echo '<div class="thumbnail-image"><div class="thumbImg"><img data-sizes="auto" src="' . productMultiImageViewUrl('uploads/products', $imgval->product_id, $imgval->product_image_id, $imgval->image, 'noimage.png', '100', '92') . '" alt="'.$imgval->alt_name.'" class="img-fluid" loading="lazy"></div></div>';
                                                            }
                                                        }
                                                ?>
                                                        <?php if (!empty($products->video)) { ?>
                                                        <div class="thumbnail-image">
                                                            <div class="thumbImg video-thum">
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#videoeModal">
                                                                    <img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $products->product_id, $products->image, 'noimage.png', '100', '92');?>" alt="<?= $products->alt_name;?>" class="img-fluid" loading="lazy">
                                                                    <img src="<?php echo base_url('uploads/play.png') ?>"
                                                                        alt="" class="play-image">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                                <div class="col-10 col-sm-9 col-md-10 col-lg-9">
                                                    <div class="slider slider-for slider-cus-css">
                                                        <div class="slider-banner-image">
                                                            <img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $products->product_id, $products->image, 'noimage.png', '363', '332');?>" alt="<?= $products->alt_name;?>" class="img-fluid" loading="lazy">
                                                        </div>

                                                        <?php
                                                        if (!empty($proImg)) {
                                                            foreach ($proImg as $imgval) {
                                                                echo '<div class="slider-banner-image"><img data-sizes="auto" src="' . productMultiImageViewUrl('uploads/products', $imgval->product_id, $imgval->product_image_id, $imgval->image, 'noimage.png', '363', '332') . '" alt="' . $imgval->alt_name . '" class="img-fluid" loading="lazy"></div>';
                                                            }
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <div class="product-info-det p-3">

                            <form id="addto-cart-form" action="<?php echo base_url('addtocartdetail') ?>" method="post">
                                <h5 class="mb-3 pro-t"><?php echo $products->name; ?></h5>
                                <?php $stock = get_data_by_id('quantity', 'cc_products', 'product_id', $products->product_id) ?>

                                <div class="rating mb-3">
                                    <?php echo product_id_by_rating($products->product_id, '1'); ?>
                                </div>

                                <p class="mb-3">
                                    <?php if (!empty($stock)) { ?>
                                    IN STOCK (<?php echo $stock; ?>)
                                    <?php } else { ?>
                                    OUT OF STOCK
                                    <?php } ?>
                                </p>

                                <?php echo $option;?>

                                <div class="mt-4">
                                    <div class="input-group mb-3 qty-tab">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn rounded-0 btn-sm h-100 btn-q"
                                                onclick="minusItem('count')" id="minus-btn"><i
                                                    class="fa fa-minus"></i></button>
                                        </div>
                                        <input type="text" id="qty_input" name="qty"
                                            class="form-control text-center  form-control-sm item_count" value="1"
                                            min="1" required>
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn rounded-0 btn-sm h-100 btn-q"
                                                onclick="plusItem('count')" id="plus-btn"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="price mb-3  " id="priceVal">
                                        <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $products->product_id);

                                                if (empty($spPric)) { ?>
                                        <?php $pp = $products->price;
                                                    echo currency_symbol($products->price); ?>
                                        <?php } else { ?>
                                        <small class="off-price-det">
                                            <del><?php echo currency_symbol($products->price); ?></del> </small>
                                        <?php echo currency_symbol($spPric);
                                            $pp = $spPric;?>
                                        <?php } ?>

                                    </div>
                                </div>


                                <?php if (!empty($stock)) { ?>
                                <input type="hidden" name="product_id" value="<?php echo $products->product_id ?>"
                                    required>
                                <button type="submit" class="btn btn-cart rounded-0 mt-2"
                                    onclick="addToCartdetail()">Add to Cart</button>
                                <button type="submit" class="btn btn-buy-now rounded-0 mt-2"
                                            onclick="buyNowAction()">Buy Now</button>
                                <?php } ?>
                            </form>
                            <div class="d-flex justify-content-between pro-w">
                                <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                                <a href="<?php echo base_url('login'); ?>"
                                    class="btn btn-wishlist-2 rounded-0 mt-2 me-1">
                                    <img src="<?php echo base_url('svg/whislistIcon.svg')?>" alt="date">
                                    Add to Wishlist</a>
                                <?php } else { ?>
                                <a href="javascript:void(0)" class="btn btn-wishlist-2 rounded-0 mt-2 me-1"
                                    onclick="addToWishlist(<?php echo $products->product_id ?>)">
                                    <img src="<?php echo base_url('svg/whislistIcon.svg')?>" alt="date">
                                    Add to Wishlist</a>
                                <?php } ?>
                                <?php } ?>

                                <?php if (modules_key_by_access('compare') == 1) { ?>
                                <button class="btn btn-wishlist-2 rounded-0 mt-2 ms-1"
                                    onclick="addToCompare(<?php echo $products->product_id ?>)">
                                    <img src="<?php echo base_url('svg/compareIcon.svg')?>" alt="date">
                                    Add to Compare</button>
                                <?php } ?>

                            </div>

                            <div class="option mt-3">
                                <table class="table table-responsive table-borderless" style="margin-bottom: unset;">
                                    <?php foreach (attribute_array_by_product_id($products->product_id) as $key => $spec) {
                                                if ($key == 0) {  ?>
                                    <tr>
                                        <td width="110">
                                            <b><?php echo get_data_by_id('name', 'cc_product_attribute_group', 'attribute_group_id', $spec->attribute_group_id); ?>
                                                :</b>
                                        </td>
                                        <td><?php echo $spec->name; ?> <span id="dots"></span></td>
                                    </tr>
                                    <?php  }
                                            }?>
                                </table>
                                <table class="table table-responsive table-borderless" id="more" style="display: none">
                                    <?php foreach (attribute_array_by_product_id($products->product_id) as $key => $spec) {
                                                if ($key != 0) {  ?>
                                    <tr>
                                        <td width="110">
                                            <b><?php echo get_data_by_id('name', 'cc_product_attribute_group', 'attribute_group_id', $spec->attribute_group_id); ?>
                                                :</b>
                                        </td>
                                        <td><?php echo $spec->name; ?></td>
                                    </tr>
                                    <?php  }
                                            }?>
                                </table>
                                <button class="btn-see" onclick="myFunction()" id="myBtn">See more
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 col-lg-3">
                        <div class="top-div d-flex justify-content-between">
                            <div>
                                <p class="free-text">Free shipping</p>
                                <p class="free-text-2">On all orders to dhaka</p>
                            </div>
                            <div class="icon-top-det">
                                <img src="<?php echo base_url('svg/trackColorIcon.svg')?>" alt="date">
                            </div>
                        </div>

                        <table class="table table-borderless  mt-3">
                            <tr>
                                <td class="td-pd">
                                    <img src="<?php echo base_url('svg/visaIcon.svg')?>" alt="date">
                                </td>
                                <td class="td-pd">
                                    Accept payments online
                                </td>
                            </tr>

                            <tr>
                                <td class="td-pd">
                                    <img src="<?php echo base_url('svg/trackIcon.svg')?>" alt="date">
                                </td>
                                <td class="td-pd">
                                    Free Delivery
                                </td>
                            </tr>

                            <tr>
                                <td class="td-pd">
                                    <img src="<?php echo base_url('svg/24UIcon.svg')?>" alt="date">
                                </td>
                                <td class="td-pd">
                                    24 months warranty
                                </td>
                            </tr>

                            <tr>
                                <td class="td-pd">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M9.0669 6.0049L9.2509 5.9999H16.7509C17.5809 5.99983 18.3794 6.3173 18.9828 6.88721C19.5862 7.45711 19.9487 8.23627 19.9959 9.0649L20.0009 9.2499V16.7499C20.001 17.58 19.6833 18.3787 19.1132 18.9821C18.5431 19.5855 17.7637 19.9479 16.9349 19.9949L16.7509 19.9999H9.2509C8.42076 20 7.62207 19.6823 7.01867 19.1122C6.41526 18.5421 6.0529 17.7627 6.0059 16.9339L6.0009 16.7509V9.2509C6.00084 8.42076 6.31845 7.62207 6.88857 7.01867C7.45869 6.41526 8.23809 6.0529 9.0669 6.0059V6.0049ZM16.7509 7.4999H9.2509C8.81171 7.49991 8.38858 7.66507 8.06551 7.96258C7.74243 8.26009 7.54304 8.6682 7.5069 9.1059L7.5009 9.2499V16.7499C7.50094 17.1892 7.66623 17.6125 7.96395 17.9356C8.26166 18.2587 8.67002 18.458 9.1079 18.4939L9.2509 18.4999H16.7509C17.1902 18.4999 17.6135 18.3346 17.9366 18.0368C18.2597 17.7391 18.459 17.3308 18.4949 16.8929L18.5009 16.7499V9.2499C18.5009 8.78577 18.3165 8.34065 17.9883 8.01246C17.6601 7.68427 17.215 7.4999 16.7509 7.4999ZM13.0009 9.0009C13.1998 9.0009 13.3906 9.07992 13.5312 9.22057C13.6719 9.36122 13.7509 9.55198 13.7509 9.7509V12.2489H16.2509C16.4498 12.2489 16.6406 12.3279 16.7812 12.4686C16.9219 12.6092 17.0009 12.8 17.0009 12.9989C17.0009 13.1978 16.9219 13.3886 16.7812 13.5292C16.6406 13.6699 16.4498 13.7489 16.2509 13.7489H13.7509V16.2509C13.7509 16.4498 13.6719 16.6406 13.5312 16.7812C13.3906 16.9219 13.1998 17.0009 13.0009 17.0009C12.802 17.0009 12.6112 16.9219 12.4706 16.7812C12.3299 16.6406 12.2509 16.4498 12.2509 16.2509V13.7489H9.7509C9.55198 13.7489 9.36122 13.6699 9.22057 13.5292C9.07992 13.3886 9.0009 13.1978 9.0009 12.9989C9.0009 12.8 9.07992 12.6092 9.22057 12.4686C9.36122 12.3279 9.55198 12.2489 9.7509 12.2489H12.2509V9.7509C12.2509 9.55198 12.3299 9.36122 12.4706 9.22057C12.6112 9.07992 12.802 9.0009 13.0009 9.0009ZM13.5829 2.2339L13.6349 2.4109L14.3279 4.9989H12.7749L12.1869 2.7989C12.1275 2.57679 12.0249 2.36856 11.885 2.18613C11.745 2.00369 11.5705 1.85061 11.3714 1.73564C11.1723 1.62067 10.9525 1.54606 10.7245 1.51608C10.4966 1.48609 10.265 1.50132 10.0429 1.5609L2.7989 3.5029C2.37603 3.6163 2.01102 3.88408 1.77591 4.25341C1.5408 4.62273 1.45266 5.06677 1.5289 5.4979L1.5609 5.6459L3.5029 12.8899C3.59399 13.2303 3.78572 13.5353 4.053 13.7649C4.32028 13.9945 4.65066 14.1381 5.0009 14.1769V15.6829C4.35072 15.6441 3.72716 15.4111 3.21099 15.0138C2.69483 14.6166 2.30984 14.0735 2.1059 13.4549L2.0539 13.2789L0.112898 6.0339C-0.102099 5.23227 -0.0022662 4.37877 0.391926 3.6484C0.786117 2.91803 1.4448 2.36614 2.2329 2.1059L2.4109 2.0539L9.6549 0.112898C10.4565 -0.102099 11.31 -0.0022662 12.0404 0.391926C12.7708 0.786117 13.3227 1.4458 13.5829 2.2339Z"
                                            fill="#2E2E2E" />
                                    </svg>
                                </td>
                                <td class="td-pd">
                                    30 days cancellation
                                </td>
                            </tr>

                            <tr>
                                <td class="td-pd">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none">
                                        <path
                                            d="M3.54 2C3.6 2.89 3.75 3.76 3.99 4.59L2.79 5.79C2.38 4.59 2.12 3.32 2.03 2H3.54ZM13.4 14.02C14.25 14.26 15.12 14.41 16 14.47V15.96C14.68 15.87 13.41 15.61 12.2 15.21L13.4 14.02ZM4.5 0H1C0.45 0 0 0.45 0 1C0 10.39 7.61 18 17 18C17.55 18 18 17.55 18 17V13.51C18 12.96 17.55 12.51 17 12.51C15.76 12.51 14.55 12.31 13.43 11.94C13.3307 11.904 13.2256 11.887 13.12 11.89C12.86 11.89 12.61 11.99 12.41 12.18L10.21 14.38C7.37543 12.9304 5.06961 10.6246 3.62 7.79L5.82 5.59C6.1 5.31 6.18 4.92 6.07 4.57C5.69065 3.41806 5.49821 2.2128 5.5 1C5.5 0.45 5.05 0 4.5 0Z"
                                            fill="#2E2E2E" />
                                    </svg>
                                </td>
                                <td class="td-pd">
                                    Contact us
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-about ">
            <div class="row mb-4 mt-5">
                <div class="col-lg-8 mb-3">
                    <ul class="nav nav-tabs list-unstyled mb-5 border-0 border-bottom custom-tab-up  des " id="myTab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-uppercase" id="about-tab" data-bs-toggle="tab"
                                data-bs-target="#about-tab-pane" type="button" role="tab" aria-controls="about-tab-pane"
                                aria-selected="true">About this item
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase" id="sech-tab" data-bs-toggle="tab"
                                data-bs-target="#information-tab-pane" type="button" role="tab"
                                aria-controls="more-info-tab-pane" aria-selected="false">More Information
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase" id="review-tab" data-bs-toggle="tab"
                                data-bs-target="#review-tab-pane" type="button" role="tab"
                                aria-controls="review-tab-pane" aria-selected="false">Reviews
                                (<?php echo count($review); ?>)
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent3">
                        <div class="tab-pane fade show active" id="about-tab-pane" role="tabpanel"
                            aria-labelledby="first-tab" tabindex="0">
                            <div class="pro-abo-text mt-3">
                                <?php echo $products->description; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="information-tab-pane" role="tabpanel" aria-labelledby="sech-tab"
                            tabindex="0">
                            <p class="mb-2 about-title"><?php echo $products->name; ?></p>
                            <table class="table table-hover table-borderless">
                                <tr>
                                    <th class="about-sub-title">SPECIFICATION</th>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table  ">
                                            <?php foreach (attribute_array_by_product_id($products->product_id) as $spec) { ?>
                                            <tr>
                                                <td><?php echo get_data_by_id('name', 'cc_product_attribute_group', 'attribute_group_id', $spec->attribute_group_id); ?>
                                                    :
                                                </td>
                                                <td><?php echo $spec->name; ?></td>
                                            </tr>
                                            <?php } ?>

                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="review-tab-pane" role="tabpanel" aria-labelledby="review-tab"
                            tabindex="0">
                            <?php foreach ($review as $rev) { ?>
                            <div class="review text-capitalize mt-2"
                                style="border: 1px solid #ededed;padding: 20px 10px 10px 10px;">
                                <span style="float: right;"><?php echo $rev->feedback_star; ?> <i data-index="2"
                                        title="Medium" class="fa-solid fa-star"
                                        style="color: rgb(0, 0, 0); margin: 2px; font-size: 1em;"></i></span>
                                <p>
                                    <strong><?php echo get_data_by_id('firstname', 'cc_customer', 'customer_id', $rev->customer_id) . ' ' . get_data_by_id('lastname', 'cc_customer', 'customer_id', $rev->customer_id) ?></strong>
                                </p>

                                <p class="feed-text"><?php echo $rev->feedback_text; ?></p>
                            </div>
                            <?php } ?>
                            <form action="<?php echo base_url('review') ?>" method="post" class="product-review w-50">
                                <p class="mb-4 mt-2"><strong>Your Rating</strong></p>
                                <?php if (isset(newSession()->isLoggedInCustomer)) {
                                                if (empty(check_review($products->product_id))) { ?>
                                <div class="rating ">
                                    <div class="ratingPiont"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="review">Message</label>
                                    <textarea class="form-control" rows="5" name="feedback_text" id="review"
                                        placeholder="Message.." required></textarea>
                                </div>
                                <input type="hidden" name="product_id" value="<?php echo $products->product_id; ?>">
                                <button class="btn rounded-0 mt-3 px-4 py-2" type="submit">Submit Review
                                </button>
                                <?php } else {
                                                    echo '<p>Already Reviewed</p>';
                                                }
                                            } else { ?>
                                <a href="<?php echo base_url('login') ?>">Please login to continue</a>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $products->product_id, $products->image, 'noimage.png', '356', '326');?>" alt="<?= $products->alt_name;?>" class="img-fluid" loading="lazy">
                </div>
            </div>
        </div>

        <?php if ($modules['both_products'] == '1') {
                                                if (!empty($bothProducts)) { ?>
        <div class="row mb-4 ">
            <div class="col-lg-12 border-bottom p-3">
                <ul class="nav nav-tabs list-unstyled mb-5 border-0 border-bottom custom-tab-up" id="myTab"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-uppercase" id="first-tab" data-bs-toggle="tab"
                            data-bs-target="#first-tab-pane" type="button" role="tab"
                            aria-controls="description-tab-pane" aria-selected="true">Bought Together
                        </button>
                    </li>
                    <!--                    <li class="nav-item" role="presentation">-->
                    <!--                        <button class="nav-link text-uppercase" id="sech-tab"  data-bs-toggle="tab" data-bs-target="#sech-tab-pane" type="button" role="tab" aria-controls="more-tab-pane" aria-selected="false">Also Bought</button>-->
                    <!--                    </li>-->
                </ul>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="first-tab-pane" role="tabpanel"
                        aria-labelledby="first-tab" tabindex="0">
                        <form id="both-product">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="products h-100">
                                        <div class="row mo-text-center both-pro-mob">
                                            <?php $totalPrice = 0;
                $i                                            = 1;

                foreach ($bothProducts as $key => $both) { ?>
                                            <div class="col-lg-3 ">
                                                <div
                                                    class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                                    <div class="product-top border p-2">
                                                        <img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $both->product_id, $both->image, 'noimage.png', '191', '191');?>" alt="<?= $both->alt_name;?>" class="img-fluid" loading="lazy">
                                                        <input type="checkbox" name="both_product[]"
                                                            onchange="bothPriceCalculat()"
                                                            class="form-check-input check-input"
                                                            value="<?php echo $both->product_id; ?>" checked>
                                                    </div>
                                                    <div class="product-bottom  mt-2">
                                                        <div class="product-title-2 mb-2">
                                                            <a href="#"><?php echo substr($both->name, 0, 40); ?> </a>
                                                        </div>
                                                        <div class="price-2 mb-3">
                                                            <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $both->product_id);

                    if (empty($spPric)) { ?>
                                                            <?php echo currency_symbol($both->price); ?>
                                                            <?php } else { ?>
                                                            <?php echo currency_symbol($spPric); ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $totalPrice += !empty($spPric) ? $spPric : $both->price;
                    $show = 3 / $i;

                    if (($show != 1) && (array_key_exists($key + 1, $bothProducts))) { ?>
                                            <div class="col-lg-1 d-flex align-items-center ">
                                                <div class="plus-icon w-100 text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                        viewBox="0 0 18 18" fill="none">-->
                                                        <path
                                                            d="M17.75 10.248H10.25V17.748H7.75V10.248H0.25V7.74805H7.75V0.248047H10.25V7.74805H17.75V10.248Z"
                                                            fill="black" />
                                                        -->
                                                    </svg>
                                                </div>
                                            </div>
                                            <?php }

                    if ($i >= 3) {
                        $i = 1;
                        continue;
                    }
                    $i++;
                } ?>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 align-items-center d-flex ">
                                    <div class=" w-100 text-center">
                                        <p class="price-rel" id="price-both"><?php echo currency_symbol($totalPrice); ?>
                                        </p>
                                        <button type="button" class="btn w-100 bg-custom-color text-white mt-2"
                                            onclick="groupAdtoCart()">Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="sech-tab-pane" role="tabpanel" aria-labelledby="sech-tab"
                        tabindex="0">
                        <p class="mb-5"></p>

                    </div>
                </div>
            </div>
        </div>
        <?php }
                                            } ?>


        <div class="row mb-4 related-products-oth">
            <div class="col-lg-12  p-4 rounded-0 border-bottom border-top">
                <div class="px-2 py-3 mb-3 bg-white">
                    <h4 class="text-uppercase">Related Product</h4>
                </div>
                <div class="card-body pb-3">
                    <div class="products h-100">
                        <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 h-100 mo-text-center">
                            <?php if (!empty($relProd)) {
                                                foreach ($relProd as $rPro) { ?>
                            <div class="col border p-2">
                                <div
                                    class=" product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                    <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                                    <a href="<?php echo base_url('login'); ?>"
                                        class="btn-wishlist position-absolute  mt-2 ms-2"><i
                                            class="fa-solid fa-heart"></i>
                                        <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                    </a>
                                    <?php } else { ?>
                                    <a href="javascript:void(0)" class="btn-wishlist position-absolute mt-2 ms-2"
                                        onclick="addToWishlist(<?php echo $rPro->product_id ?>)"><i
                                            class="fa-solid fa-heart"></i>
                                        <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                    </a>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php if (modules_key_by_access('compare') == 1) { ?>
                                    <button onclick="addToCompare(<?php echo $rPro->product_id ?>)"
                                        class="btn-compare position-absolute  mt-5 ms-2"><i
                                            class="fa-solid fa-code-compare"></i>
                                        <span class="btn-compare-text position-absolute  mt-5 ms-2">Compare</span>
                                    </button>
                                    <?php } ?>
                                    <div class="product-top text-center">
                                        <a
                                            href="<?php echo base_url('detail/' . $rPro->product_id) ?>"><img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $rPro->product_id, $rPro->image, 'noimage.png', '191', '191');?>" alt="<?= $rPro->alt_name;?>" class="img-fluid" loading="lazy"></a>
                                        <div class="rating text-center my-2">
                                            <?php echo product_id_by_rating($rPro->product_id); ?>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="product-title-new mb-2 text-capitalize">
                                            <a
                                                href="<?php echo base_url('detail/' . $rPro->product_id) ?>"><?php echo substr($rPro->name, 0, 60); ?></a>
                                        </div>
                                        <div class="price-new mb-3">
                                            <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $rPro->product_id);

                                    if (empty($spPric)) { ?>
                                            <?php echo currency_symbol($rPro->price); ?>
                                            <?php } else { ?>
                                            <small class="off-price">
                                                <del><?php echo currency_symbol($rPro->price); ?></del>
                                            </small>/<?php echo currency_symbol($spPric); ?>
                                            <?php } ?>
                                        </div>

                                        <?php echo addToCartBtn($rPro->product_id); ?>
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

        <?php if (!empty($products->description_image)) { ?>
        <div class="row mb-4">
            <div class="col-lg-12 p-3">
                <?php echo image_view('uploads/products', $products->product_id, $products->description_image, '', $class = 'w-100'); ?>
            </div>
        </div>
        <?php } ?>
        <?php if ($modules['product_guides'] == '1') { ?>
        <div class="row mb-4">
            <div class="col-lg-12 p-3 product-guides mo-text-center">
                <p class="product-guides-title text-uppercase">Product guides and Documents</p><br>
                <?php if (!empty($products->documentation_pdf)) { ?>
                <a href="<?php echo base_url('uploads/products/' . $products->product_id . '/' . $products->documentation_pdf) ?>"
                    target="_blank" download class="link-product-guides">Product documentation (Pdf)</a><br><br>
                <?php } ?>
                <?php if (!empty($products->safety_pdf)) { ?>
                <a href="<?php echo base_url('uploads/products/' . $products->product_id . '/' . $products->safety_pdf) ?>"
                    target="_blank" download class="link-product-guides">Safety information (Pdf)</a><br><br>
                <?php } ?>
                <?php if (!empty($products->instructions_pdf)) { ?>
                <a href="<?php echo base_url('uploads/products/' . $products->product_id . '/' . $products->instructions_pdf) ?>"
                    target="_blank" download class="link-product-guides">Instructions for use (Pdf)</a>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php if ($modules['other_products'] == '1') { ?>
        <div class="row mb-4 ">
            <div class="col-lg-12  p-4 rounded-0 border-bottom border-top">
                <div class="px-2 py-3 mb-3 bg-white">
                    <h4 class="text-uppercase">WE FOUND OTHER PRODUCTS YOU MIGHT LIKE!</h4>
                </div>
                <div class="card-body pb-3">
                    <div class="products h-100">
                        <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 h-100 mo-text-center">
                            <?php if (!empty($relProd)) {
                                                foreach ($relProd as $rPro) { ?>
                            <div class="col border p-2">
                                <div
                                    class=" product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                    <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                                    <a href="<?php echo base_url('login'); ?>"
                                        class="btn-wishlist position-absolute  mt-2 ms-2"><i
                                            class="fa-solid fa-heart"></i>
                                        <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                    </a>
                                    <?php } else { ?>
                                    <a href="javascript:void(0)" class="btn-wishlist position-absolute mt-2 ms-2"
                                        onclick="addToWishlist(<?php echo $rPro->product_id ?>)"><i
                                            class="fa-solid fa-heart"></i>
                                        <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                    </a>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php if (modules_key_by_access('compare') == 1) { ?>
                                    <button onclick="addToCompare(<?php echo $rPro->product_id ?>)"
                                        class="btn-compare position-absolute  mt-5 ms-2"><i
                                            class="fa-solid fa-code-compare"></i>
                                        <span class="btn-compare-text position-absolute  mt-5 ms-2">Compare</span>
                                    </button>
                                    <?php } ?>
                                    <div class="product-top text-center">
                                        <a
                                            href="<?php echo base_url('detail/' . $rPro->product_id) ?>"><img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $rPro->product_id, $rPro->image, 'noimage.png', '191', '191');?>" alt="<?= $rPro->alt_name;?>" class="img-fluid" loading="lazy"></a>
                                        <div class="rating text-center my-2">
                                            <?php echo product_id_by_rating($rPro->product_id); ?>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="product-title-new mb-2 text-capitalize">
                                            <a
                                                href="<?php echo base_url('detail/' . $rPro->product_id) ?>"><?php echo substr($rPro->name, 0, 60); ?></a>
                                        </div>
                                        <div class="price-new mb-3">
                                            <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $rPro->product_id);

                                    if (empty($spPric)) { ?>
                                            <?php echo currency_symbol($rPro->price); ?>
                                            <?php } else { ?>
                                            <small class="off-price">
                                                <del><?php echo currency_symbol($rPro->price); ?></del>
                                            </small>/<?php echo currency_symbol($spPric); ?>
                                            <?php } ?>
                                        </div>
                                        <?php echo addToCartBtn($rPro->product_id); ?>
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
        <?php } ?>
    </div>
</section>

<div class="modal fade" id="videoeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--            <div class="modal-header">-->
            <!--                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->

            <!--            </div>-->
            <div class="modal-body">
                <button type="button" class="btn-close" onclick="video_close()"
                    style="float: right; font-size: 10px; margin-bottom: 10px;" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <iframe width="100%" height="350" id="sample_video" src="<?php echo $products->video; ?>"
                    title="Impossible Records In Football" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>

        </div>
    </div>
</div>
