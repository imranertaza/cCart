<?= $this->extend('Theme/Theme_4/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('Theme/Theme_3/Customer/menu'); ?>
<section class="main-container my-5">
    <div class="container">

        <div class="card border rounded-0">
            <div class="card-body p-3 p-md-5">
                <div class="row mb-4">
                    <div class="col-md-12 px-5">
                        <?php if (session()->getFlashdata('message') !== null) : echo session()->getFlashdata('message');
                        endif; ?>
                    </div>

                    <div class="col-md-12 px-5">
                        <h3>Add funds</h3>
                    </div>
                    <div class="col-md-6 px-5">
                        <form id="add-fund-form" action="<?php echo base_url('add_funds_action')?>" method="post">
                            <div class="form-group mt-4">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control" placeholder="Amount" required>
                            </div>

                            <div class="payment-method group-check mb-4 pb-4 mt-3">
                                <?php foreach (get_all_data_array('cc_payment_method') as $pay) {
                            if ($pay->status == '1') {
                                if (($pay->code != 'cash_on') && ($pay->code != 'u_wallet')) { ?>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="form-check"><label class="form-check-label"><input
                                                class="form-check-input"
                                                onclick="instruction_view(this.value,'<?php echo $pay->code; ?>'),add_fund_instruction_view(this.value,'<?php echo $pay->code; ?>'),cardForm('<?php echo $pay->code; ?>')"
                                                type="radio" name="payment_method_id" id="payment_method"
                                                value="<?php echo $pay->payment_method_id; ?>" required>
                                            <?php echo !empty($pay->image) ? image_view('uploads/payment', '', $pay->image, 'noimage.png', 'img-payment') : $pay->name; ?>
                                        </label></div>
                                </div>
                                <?php }
                            }
                        } ?>

                            </div>

                            <div id="instruction"></div>
                            <div id="cardForm">
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
    <script>
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
        function cardForm(code) {
            var view =
                '<div class="title-checkout"><label class="btn bg-custom-color text-white w-100 rounded-0"><span class="text-label">Credit Card</span></label></div><div class="payment-method group-check mb-4 pb-4"><div class="row px-2 py-2"><div class="form-group mb-4 col-md-12"><label class="w-100" for="name">Card Name</label><input class="form-control rounded-0" type="text" id="card_name" name="card_name" placeholder="" required=""></div><div class="form-group mb-4 col-md-12"><label class="w-100" for="name">Card Number</label><input class="form-control rounded-0" type="number" id="card_number" name="card_number" placeholder="" required=""></div><div class="form-group mb-4 col-md-6"><label class="w-100" for="name">Expiration (mm/yy)</label><input class="form-control rounded-0" type="text"   id="card_expiration" name="card_expiration" placeholder="" required="" pattern="[0-9]*" inputmode="numeric"></div><div class="form-group mb-4 col-md-6"><label class="w-100" for="name">CVC</label><input class="form-control rounded-0" type="number" id="card_cvc" name="card_cvc" placeholder="" required=""></div></div></div>';
            if (code == 'credit_card') {
                $('#cardForm').html(view);
            }
        }
    </script>
<?= $this->endSection() ?>
