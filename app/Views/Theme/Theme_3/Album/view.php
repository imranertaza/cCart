<?= $this->extend('Theme/Theme_3/layout') ?>
<?= $this->section('content') ?>
<section class="main-container my-0">
    <div class="container">
        <div class="contact-form bg-white  py-4  mb-5 mt-5">
            <div class="row">
                <div class="col-lg-12 ">
                    <h3 class="text-capitalize mb-4"> <?= $album->name?></h3>
                </div>
                <div class="col-4 col-md-3 mt-4 text-center ">
                    <?php
                    $modules = modules_access();
                    $img     = str_replace("pro_", "", $album->thumb);
                    $image   = ($modules['watermark'] == '1') ? '600_wm_' . $img : $img;
                    $url     = base_url('uploads/album/' . $album->album_id . '/' . $image); ?>
                    <a class="example-image-link" href="<?= $url;?>" data-lightbox="example-set">
                        <img data-sizes="auto" src="<?= productImageViewUrl('uploads/album', $album->album_id, $album->thumb, 'noimage.png', '261', '261');?>" class="img-fluid" alt="<?= $album->alt_name?>" loading="lazy">
                    </a>
                </div>
                <?php foreach ($albumAll as $val) {
                        $img2   = str_replace("pro_", "", $val->image);
                        $image2 = ($modules['watermark'] == '1') ? '600_wm_' . $img2 : $img2;
                        $url2   = base_url('uploads/album/' . $val->album_id . '/' . $val->album_details_id . '/' . $image2); ?>
                <div class="col-4 col-md-3 mt-4 text-center ">
                    <a class="example-image-link" href="<?= $url2; ?>" data-lightbox="example-set" >
                        <img data-sizes="auto" src="<?= productMultiImageViewUrl('uploads/album', $val->album_id, $val->album_details_id, $val->image, 'noimage.png', '261', '261'); ?>" class="img-fluid" alt="<?= $val->alt_name?>" loading="lazy">
                    </a>
                </div>
                <?php
                    } ?>
            </div>
        </div>
    </div>
</section>
<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script>
</script>
<?= $this->endSection() ?>
