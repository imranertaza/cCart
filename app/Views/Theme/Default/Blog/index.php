<section class="main-container my-0">
    <div class="container">
        <div class="contact-form bg-white p-4 p-lg-5 mb-5 mt-5">
            <div class="row">
                <div class="col-lg-12 ">
                    <h3 class="text-capitalize mb-4"> Blog</h3>
                </div>
                <?php foreach ($blog as $val){ ?>
                    <div class="col-sm-12 col-md-3 mt-4 blog-list-view">
                        <a href="<?= base_url('blog-view/'.$val->blog_id);?>">
                            <?php echo common_image_view('uploads/blog',$val->blog_id,$val->image,'noimage.png','w-100','','237','237');?>
                            <p class="text-capitalize text-black mt-3 blog-list-title "><?php echo $val->blog_title; ?></p>
                            <p class="text-capitalize text-black mt-3 blog-list-text"><?php echo $val->short_des; ?></p>
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