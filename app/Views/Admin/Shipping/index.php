<?= $this->extend('Admin/layout') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Shipping List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Shipping List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title">Shipping List</h3>
                    </div>
                    <div class="col-md-4 text-right">
                    </div>
                    <div class="col-md-12" style="margin-top: 10px" id="message">
                        <?php if (session()->getFlashdata('message') !== null) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
foreach ($shipping as $val) { ?>
                        <tr>
                            <td width="40"><?php echo $i++;?></td>
                            <td><?php echo $val->name;?></td>
                            <td><?php echo $val->code;?></td>
                            <td><input type="checkbox" name="product_featured" onfocus="update_shipping_status(<?php echo $val->shipping_method_id;?>)" <?php echo ($val->status == '1') ? 'checked' : '';?>  data-bootstrap-switch ></td>
                            <td width="180">
                                <a href="<?php echo base_url('admin/shipping_settings/'.$val->shipping_method_id);?>" class="btn btn-primary btn-xs"><i class="fas fa-cogs"></i> Settings</a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection() ?>


<?= $this->section('java_script') ?>
    <script>
        function update_shipping_status(id) {
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('admin/update_shipping_status') ?>",
                data: {
                    id: id
                },
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function(data) {
                    $("#message").html(data);
                }

            });
        }

    </script>
<?= $this->endSection() ?>