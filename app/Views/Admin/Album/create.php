<?= $this->extend('Admin/layout') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Album create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Album create</li>
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
                        <h3 class="card-title">Album create</h3>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message')): ?>
                            <div class="alert <?= session()->getFlashdata('success') ? 'alert-success' : 'alert-danger'; ?> alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('message'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('admin/album_create_action')?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                        </div><div class="col-md-6"></div>

                        <div class="col-md-4">
                            <h3>Default Image <span class="requi">*</span></h3>
                        </div>
                        <div class="col-md-8">
                            <span id="singleImage"></span>
                            <br>
                            <button type="button" onclick="imageManager('singleImage','single')" class="btn mt-3 btn-outline-info">Choose File</button><br>
                            <span>Recommended Size (800x800)</span>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <h3>Multiple Image</h3>
                        </div>
                        <div class="col-md-8 mt-3">
                            <span id="multipleImage"></span>
                            <br>
                            <button type="button" onclick="imageManager('multipleImage','multiple')" class="btn mt-3 btn-outline-info">Choose File</button><br>
                            <span>Recommended Size (800x800)</span>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12 mt-3">
                            <button class="btn btn-primary" >Add</button>
                            <a href="<?php echo base_url('admin/album')?>" class="btn btn-danger" >Back</a>
                        </div>
                    </div>
                </form>
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

    </script>
<?= $this->endSection() ?>
