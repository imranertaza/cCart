<section class="main-container my-0">
    <div class="container">
        <div class="contact-form bg-white  py-4  mb-5 mt-5">
            <div class="row">
                <div class="col-lg-12 ">
<!--                    <h3 class="text-capitalize mb-4"> Blog</h3>-->
                </div>
                <div class="col-12 text-center">
                    <?php echo image_view('uploads/blog',$blog->blog_id,'880_'.$blog->image,'noimage.png',''); ?>
                </div>
                <div class="col-12 pad-detail">
                    <h4 class="text-capitalize text-black mt-3 mb-3 blog-title"><?php echo $blog->blog_title; ?></h4>
                    <p class="mb-3"><?php echo $blog->short_des; ?></p>
                    <p><?php echo $blog->description; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>