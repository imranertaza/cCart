<?= $this->extend('Theme/Default/layout') ?>
<?= $this->section('content') ?>
<div class="main-container" id="tableReload">
    <div class="container">
        <div class="cart">
            <div class="row">
                <div class="col-md-12 ">
                    <?php if (session()->getFlashdata('message') !== null) : echo session()->getFlashdata('message'); endif; ?>
                </div>
            </div>
            <?php $modules = modules_access();  ?>
            <table class="cart-table w-100 text-center" >
                <thead>
                <tr>
                    <th>Delete</th>
                    <th>Product Picture</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach (Cart()->contents() as $val) { ?>
                    <tr>
                        <td class="product-remove">
                            <a href="javascript:void(0)" onclick="removeCart('<?php echo $val['rowid'];?>')" ><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        <td class="product-thumbnail">
                            <a href="#">
                                <?php $product = get_all_row_data_by_id('cc_products', 'product_id', $val['id']); ?>
                                <img data-sizes="auto" src="<?= productImageViewUrl('uploads/products', $val['id'], $product->image, 'noimage.png', '100', '100');?>" alt="<?= $product->alt_name;?>" class="img-fluid" loading="lazy">
                            </a>
                        </td>
                        <td class="product-name text-start">
                            <a href="#"><?php echo $val['name'];?></a>
                        </td>

                        <td class="product-price">
                            <span class="price"><?php echo currency_symbol($val['price']);?></span>
                        </td>

                        <td class="product-quantity" width="180">
                            <div class="quantity d-flex justify-content-end justify-content-lg-center">
                                <div class="input-group mb-3" >
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark btn-sm" onclick="minusItem('<?php echo $val['rowid'];?>')" id="minus-btn"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="text" id="item_<?php echo $val['rowid'];?>" name="qty" class="form-control form-control-sm item_<?php echo $val['rowid'];?>" value="<?php echo $val['qty'];?>" min="1">
<!--                                    <input type="hidden"  name="rowid[]"  value="--><?php //echo $val['rowid'];?><!--" >-->
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark btn-sm" onclick="plusItem('<?php echo $val['rowid'];?>')" id="plus-btn"><i class="fa fa-plus"></i></button>
                                    </div>

                                </div>

                            </div>
                            <div class="input-group justify-content-center" >
                                <button class="btn btn-primary btn-sm" id="btn_<?php echo $val['rowid'];?>" style="display:none;" onclick="updateQty('<?php echo $val['rowid'];?>')">Update</button>
                            </div>
                        </td>
                        <td class="product-subtotal">
                            <span class="price"><?php echo currency_symbol($val['subtotal']);?></span>
                        </td>
                    </tr>
                <?php } ?>

                <tr>
                    <td colspan="4" style="border-right:0">
                        <?php if (modules_key_by_access('coupon') == '1') { ?>
                        <form action="<?php echo base_url('checkout_coupon_action')?>" method="post">
                            <div class="d-flex coupon">
                                <input type="text" class="form-control w-auto rounded-0 me-1" name="coupon" placeholder="Coupon Code" required >
                                <input class="btn btn-dark rounded-0 px-4" type="submit" name="submit" value="Apply Coupon">
                            </div>
                            <?php if (isset(newSession()->coupon_discount_shipping)) { ?>
                                <small class="mt-3 text-danger" style="float: left;">Shipping coupon discount will show up after you checkout.</small>
                            <?php } ?>
                        </form>
                        <?php } ?>
                    </td>
                    <td class="border-end-0 " style="text-align:left;">
                        <?php $disc = 0;
                        $offerdisc  = 0;

                        if (isset(newSession()->coupon_discount) || !empty($offer['discount_amount'])) { ?>
                        <span class="fs-4 ">Price</span><br>
                        <span class="fs-4 ">Discount</span><br>
                        <?php } ?>
                        <span class="fs-4 fw-bold">Total</span>
                    </td>
                    <td style="text-align:left;">
                        <?php if (isset(newSession()->coupon_discount) || !empty($offer['discount_amount'])) {
                            if (newSession()->discount_type == 'Percentage') {
                                $disc = (Cart()->total() * newSession()->coupon_discount / 100);
                            } else {
                                if (Cart()->total() > newSession()->coupon_discount) {
                                    $disc = newSession()->coupon_discount;
                                } else {
                                    $disc = Cart()->total();
                                }
                            }
                            $offerdisc = $offer['discount_amount'];

                            $totalDiscount = $disc + $offerdisc;
                            $finalDiscount = (Cart()->total() > $totalDiscount) ? $totalDiscount : Cart()->total(); ?>
                        <span class=" fs-4"><?php echo currency_symbol(Cart()->total()) ?></span><br>
                        <span class=" fs-4"><?php echo currency_symbol($finalDiscount) ?></span><br>
                        <?php
                        } $total = (isset(newSession()->coupon_discount) || !empty($offer['discount_amount'])) ? Cart()->total() - $finalDiscount : Cart()->total();?>
                        <span class="fw-bold fs-4"><?php echo currency_symbol($total) ?></span>
                    </td>
                </tr>

                </tbody>
            </table>
            <?php if (!empty(Cart()->contents())) { ?>
            <p class="text-end"><a href="<?php echo base_url('checkout')?>" class="btn btn-dark rounded-0 px-4 btn-checkout">Proceed to checkout</a></p>
            <?php } ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script>
</script>
<?= $this->endSection() ?>
