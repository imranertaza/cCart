<?= $this->extend('Theme/Theme_3/layout') ?>
<?= $this->section('content') ?>
<section class="main-container my-0">
    <div class="container">
        <div class="contact-form bg-white  p-4 p-lg-5 mb-5 mt-5">
            <div class="row">
                <div class="col-lg-12 ">
                    <h3 class="text-capitalize mb-4"> <?= $album->name?></h3>
                </div>
                <div class="col-4 col-md-4 mt-4 text-center ">
                    <?php
                    $modules = modules_access();
                    $image   = ($modules['watermark'] == '1') ? $album->thumb : $album->main_image;
                    $url     = base_url() . '/' . $image; ?>
                    <a class="example-image-link" href="<?= $url;?>" data-lightbox="example-set">
                        <img data-sizes="auto" src="<?= productImageViewUrlNew($album->main_image, $album->thumb, '324', '324');?>" alt="<?= $album->alt_name;?>" class="img-fluid" loading="lazy">
                    </a>
                </div>
                <?php foreach ($albumAll as $val) {
                        $image2 = ($modules['watermark'] == '1') ? $val->image : $val->main_image;
                        $url2   = base_url() . '/' . $image2; ?>
                    <div class="col-4 col-md-4 mt-4 text-center ">
                        <a class="example-image-link" href="<?= $url2; ?>" data-lightbox="example-set" >
                            <img data-sizes="auto" src="<?= productMultiImageViewUrlNew($val->main_image, $val->image, '324', '324'); ?>" alt="<?= $val->alt_name; ?>" class="img-fluid" loading="lazy">
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
