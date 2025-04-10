<section class="main-container my-0">
    <div class="container">
        <div class="contact-form bg-white  py-4  mb-5 mt-5">
            <div class="row">
                <div class="col-lg-12 ">
<!--                    <h3 class="text-capitalize mb-4"> Blog</h3>-->
                </div>
                <div class="col-12 text-center">
                    <?php echo common_image_view('uploads/blog', $blog->blog_id, $blog->image, 'noimage.png', '', '', '880', '400'); ?>
                </div>
                <div class="col-12 pad-detail">
                    <h4 class="text-capitalize text-black mt-3 blog-title"><?php echo $blog->blog_title; ?></h4>
                    <p class="mb-3" ><b>Date:</b> <?php echo invoiceDateFormat($blog->publish_date); ?></p>
                    <p class="mb-3"><?php echo $blog->short_des; ?></p>
                    <p><?php echo $blog->description; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
