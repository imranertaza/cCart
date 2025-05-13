<section class="main-container my-5" >
    <div class="container">
        <div class="col-md-12 px-5">
            <?php if (session()->getFlashdata('message') !== null) : echo session()->getFlashdata('message'); endif; ?>
        </div>
        <div class="cart">
            <div class="table-responsive">
                <table class="cart-table w-100 text-center" id="tabledata">
                <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Particulars</th>
                            <th>Transaction Type</th>
                            <th>Date</th>
                            <th>Point</th>
                            <th>Rest Point</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;

            foreach ($point_history as $val) { ?>
                            <tr>
                                <td width="40"><?php echo $i++; ?></td>
                                <td><?php echo $val->particulars; ?></td>
                                <td><?php echo ($val->trangaction_type == 'Cr.') ? 'Add' : 'Cost'; ?></td>
                                <td><?php echo saleDate($val->createdDtm); ?></td>
                                <td><?php echo $val->point; ?></td>
                                <td><?php echo $val->rest_point; ?></td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
