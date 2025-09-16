<section class="main-container my-0">
    <div class="container">
        <div class="contact-form bg-white  p-4 p-lg-5 mb-5 mt-5">
            <div class="row">
                <div class="col-lg-12 ">
                    <h3 class="text-capitalize mb-4"> Qc Picture</h3>
                </div>
                <?php foreach ($qcpicture as $val) { ?>
                <div class="col-3 col-md-3 mt-4 text-center">
                    <a href="<?= base_url('qc-picture-view/' . $val->album_id);?>">
                        <img data-sizes="auto" src="<?= productImageViewUrl('uploads/album', $val->album_id, $val->thumb, 'noimage.png', '198', '198');?>" <?= $val->alt_name;?> class="img-fluid" loading="lazy">
                        <h5 class="text-capitalize text-black"><?php echo $val->name; ?></h5>
                    </a>
                </div>
                <?php } ?>

                <div class="col-lg-12">
                    <?php echo $links; ?>
                </div>
            </div>
        </div>
    </div>
</section>
