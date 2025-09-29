<?= $this->extend('Theme/Theme_2/layout') ?>
<?= $this->section('content') ?>
<section class="main-container" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo base_url('blog');?>" class="btn btn-blog-category <?php echo ($catBtn == 'All') ? 'btn-selected' : '';?>">All</a>
                <?php foreach ($category as $item) { ?>
                    <a href="<?php echo base_url('blog-category/' . $item->cat_id);?>" class="btn btn-blog-category <?php echo ($catBtn == $item->cat_id) ? 'btn-selected' : '';?>"><?php echo $item->category_name;?></a>
                <?php } ?>
            </div>
            <div class="col-md-12 mt-5">
                <div class="row">
                    <?php if (!empty($blog)) {
    foreach ($blog as $val) { ?>
                    <div class="col-md-6 mt-4 div-pad">
                        <div class="row class-border">
                            <div class="col-md-5 col-sm-12 position-relative mob-view-img">
                                <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/blog', $val->blog_id, $val->image, 'noimage.png', '214', '220');?>" alt="<?= $val->alt_name;?>" class="img-fluid img-redu" loading="lazy">
                                <div class="date-box d-flex">
                                    <img src="<?php echo base_url('svg/dateIcon.svg')?>" alt="date">
                                    <span class="date-text"><?php echo invoiceDateFormat($val->publish_date)?></span>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 mob-view-text">
                                <a href="<?php echo base_url('blog-view/' . $val->blog_id)?>"   >
                                <div class="top text-mo-title d-flex border-bottom pb-2">
                                    <div>
                                        <img src="<?php echo base_url('svg/userIcon.svg')?>" alt="date">
                                        <span class="text-mr"><?php echo get_data_by_id('name', 'cc_users', 'user_id', $val->createdBy);?></span>
                                    </div>
                                    <div class="ms-4 ">
                                        <img src="<?php echo base_url('svg/messageIcon.svg')?>" alt="date">
                                        <span class="text-mr">(<?php echo count_comment_by_blog_id($val->blog_id);?>) Comments</span>
                                    </div>
                                </div>
                                <div class="title-b">
                                    <p class="b-title"><?php echo $val->blog_title;?></p>
                                    <p class="b-text mt-2"><?php echo substr_replace($val->short_des, "...", 70);?></p>
                                    Read More
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php }
} else {
    echo '<p>No data available</p>';
}?>

                </div>
            </div>
            <div class="col-md-12 mt-2"><?php echo $links;?></div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script>
</script>
<?= $this->endSection() ?>
