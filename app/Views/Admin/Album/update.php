<?= $this->extend('Admin/layout') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Album update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Album update</li>
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
                        <h3 class="card-title">Album update</h3>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-12" style="margin-top: 10px" id="message">
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
                <form action="<?php echo base_url('admin/album_update_action')?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row" id="reloadImg">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $album->name;?>" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sort Order</label>
                                <input type="number" name="sort_order_al" class="form-control" value="<?= $album->sort_order;?>" placeholder="sort order" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h3>Default Image <span class="requi">*</span></h3>
                        </div>
                        <div class="col-md-8">
                            <div class="row ">
                                <div class="col-md-4 img_view">
                                    <img data-sizes="auto" src="<?= productImageViewUrlNew($album->main_image, $album->thumb, '198', '198');?>" alt="<?= $album->alt_name;?>" class="img-fluid" loading="lazy">
                                </div>
                            </div>
                            <span id="singleImage"></span>
                            <br>
                            <button type="button" onclick="imageManager('singleImage','single')" class="btn mt-3 btn-outline-info">Choose File</button><br>
                            <span>Recommended Size (800x800)</span>

                            <div class="form-group">
                                <label>ALT Name</label>
                                <input type="text" name="alt_name" class="form-control" placeholder="Alt Name" value="<?php echo $album->alt_name; ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <h3>Multiple Image</h3>
                        </div>
                        <div class="col-md-8 mt-3">
                            <div id="success"  style="display:none;"  class="alert alert-success alert-dismissible w-50 mb-1 text-center " role="alert">Update Success </div>
                            <div class="row mb-4" >
                                <?php foreach ($albumAll as $img) { ?>
                                    <div class="col-md-2 img_view">
                                        <input type="text" onchange="album_image_sort_update('<?=$img->album_details_id?>',this.value)" class="form-control mb-2 text-center" style="height: 25px;" name="sort_order" value="<?= $img->sort_order;?>">
                                        <img data-sizes="auto" src="<?= productMultiImageViewUrlNew($img->	main_image, $img->image, '96', '96');?>" alt="<?= $img->alt_name;?>" class="img-fluid" loading="lazy">
                                        <input type="text" onchange="album_image_alt_name_update('<?=$img->album_details_id?>',this.value)" class="form-control mt-2 mb-2 text-center" style="height: 25px;" placeholder="Alt Name" value="<?= $img->alt_name;?>">
                                        <a href="javascript:void(0)" onclick="removeAlbumImg(<?php echo $img->album_details_id;?>)" class="btn del-btn"><i class="fas fa-trash"></i> Delete</a>
                                    </div>
                                <?php } ?>
                            </div>

                            <span id="multipleImage"></span>
                            <br>
                            <button type="button" onclick="imageManager('multipleImage','multiple')" class="btn mt-3 btn-outline-info">Choose File</button><br>
                            <span>Recommended Size (800x800)</span>

                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12 mt-3 text-center">
                            <button class="btn btn-primary" >Update</button>
                            <input type="hidden" class="form-control" name="album_id" value="<?= $album->album_id;?>" >
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
        function album_image_sort_update(album_details_id,val){
            let csrfName = $('meta[name="csrf-name"]').attr('content');
            let csrfHash = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('admin/album_image_sort_action') ?>",
                data: {[csrfName]: csrfHash,album_details_id: album_details_id,value:val},
                beforeSend: function () {
                    $("#loading-image").show();
                },
                success: function (data) {
                    $("#success").show(0).delay(1000).fadeOut();
                }
            });
        }

        function removeAlbumImg(album_details_id) {
            let csrfName = $('meta[name="csrf-name"]').attr('content');
            let csrfHash = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('admin/album_image_delete') ?>",
                data: {
                    [csrfName]: csrfHash,
                    album_details_id: album_details_id
                },
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: function(data) {
                    $("#message").html(data);
                    $('#reloadImg').load(document.URL + ' #reloadImg');
                }

            });
        }

        function album_image_alt_name_update(album_details_id,val){
            let csrfName = $('meta[name="csrf-name"]').attr('content');
            let csrfHash = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('admin/album_image_alt_name_action') ?>",
                data: {[csrfName]: csrfHash,album_details_id: album_details_id,value:val},
                beforeSend: function () {
                    $("#loading-image").show();
                },
                success: function (data) {
                    $("#success").show(0).delay(1000).fadeOut();
                }
            });
        }

    </script>
<?= $this->endSection() ?>
