<?= $this->extend('Theme/Theme_3/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('Theme/Theme_3/Customer/menu'); ?>
<section class="main-container my-5">
    <div class="container">
        <form action="<?php echo base_url('profile_update_action') ?>" method="Post">
            <div class="card border rounded-0">
                <div class="card-body p-3 p-md-5">
                    <div class="row mb-4">
                        <div class="col-md-12 px-5">
                            <?php if (session()->getFlashdata('message') !== null) : echo session()->getFlashdata('message');
                            endif; ?>
                        </div>
                        <div class="col-md-12 px-5 text-center">

                            <a href="<?php echo base_url('add-funds');?>" class="btn btn-primary" style="float: right;">Add funds</a>
                            <div class="card" style="width: 10rem; float: left; ">
                                <div class="card-body text-center">
                                    <h5 class="card-title">My Balance</h5>
                                    <p><?php echo currency_symbol($cust->balance);?></p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 px-5 mt-5">

                            <table class="cart-table w-100 text-center" id="tableData">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Payment method</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $symbol = get_lebel_by_value_in_settings('currency_symbol');
        $i                                        = 1;

        foreach ($fund_request as $req) { ?>
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $req->name; ?></td>
                                        <td><?php echo currency_symbol_with_symbol($req->amount, $symbol)?></td>
                                        <td><?php echo $req->status?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>


                        </div>



                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
    <script>
        $("#tableData").DataTable({
            order: [[0, 'desc']]
        })
    </script>
<?= $this->endSection() ?>
