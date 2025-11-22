<?= $this->extend('Theme/Theme_4/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('Theme/Theme_4/Customer/menu'); ?>
<section class="main-container my-5" >
    <div class="container">
        <div class="col-md-12 px-5">
            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert <?= session()->getFlashdata('success') ? 'alert-success' : 'alert-danger'; ?> alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <div class="cart">
            <div class="table-responsive">
                <table class="cart-table w-100 text-center" id="tableData">
                <thead>
                        <tr>
                            <th>Particulars</th>
                            <th>Trangaction Type</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Rest Balance</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
            $symbol              = get_lebel_by_value_in_settings('currency_symbol');

            foreach ($ledger as $val) { ?>
                            <tr>
                                <td><?php echo $val->particulars; ?></td>
                                <td><?php echo ($val->trangaction_type == 'Cr.') ? 'Deposit' : 'Purchase'; ?></td>
                                <td><?php echo saleDate($val->createdDtm); ?></td>
                                <td><?php echo currency_symbol_with_symbol($val->amount, $symbol); ?></td>
                                <td><?php echo currency_symbol_with_symbol($val->rest_balance, $symbol); ?></td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<link href="<?php echo base_url() ?>/assets/datatable/datatables.min.css" rel="stylesheet"  >
<script src="<?php echo base_url() ?>/assets/datatable/datatables.min.js" ></script>
    <script>
        $("#tableData").DataTable({})
    </script>
<?= $this->endSection() ?>
