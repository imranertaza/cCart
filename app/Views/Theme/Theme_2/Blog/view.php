<section class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <button class="btn btn-cat"><?php echo get_data_by_id('category_name', 'cc_category', 'cat_id', $blog->cat_id); ?></button>
            </div>
            <div class="col-md-12 col-sm-12">
                <p class="b-d-title"><?php echo $blog->blog_title; ?></p>
                <div class="d-flex mt-3">
                    <div class="d-flex">
                        <img src="<?php echo base_url('svg/user2Icon.svg')?>" alt="date">
                        <span class="b-d-text"><?php echo get_data_by_id('name', 'cc_users', 'user_id', $blog->createdBy);?></span>
                    </div>
                    <div class="d-flex ms-3">
                        <img src="<?php echo base_url('svg/date2Icon.svg')?>" class="w-16" alt="date">
                        <span class="b-d-text"><?php echo invoiceDateFormat($blog->publish_date)?></span>
                    </div>
                    <div class="d-flex ms-3">
                        <img src="<?php echo base_url('svg/message2Icon.svg')?>" class="w-16" alt="date">
                        <span class="b-d-text">(<?php echo count_comment_by_blog_id($blog->blog_id);?>) Comments</span>

                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-indicators">
                        <?php foreach ($image as $key => $val) { ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $key;?>"
                                class="<?php echo ($key == '0') ? 'active' : '';?>" aria-current="true" aria-label="Slide 1"></button>
                        <?php } ?>
                    </div>
                    <div class="carousel-inner">
                        <?php foreach ($image as $key => $val) { ?>
                        <div class="carousel-item <?php echo ($key == '0') ? 'active' : '';?>" data-bs-interval="2000">
                            <img data-sizes="auto" src="<?= commonImageViewUrl('uploads/blog', $blog->blog_id . '/' . $val->blog_crassula_image_id, $val->image, 'noimage.png', '1116', '481');?>" alt="<?= $val->alt_name;?>" class="d-block w-100" loading="lazy">
                        </div>
                        <?php } ?>
                    </div>

                </div>

            </div>
            <div class="col-md-12 desc-text">
                <?php echo $blog->description; ?>
            </div>
            <?php if (!empty($blog->video_id)) { ?>
            <div class="col-md-12 mt-5">
                <iframe width="1116" height="491" src="https://www.youtube.com/embed/<?php echo $blog->video_id; ?>"
                        title="The Pizza-Making Contraption | Joseph&#39;s Machines" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <?php } ?>
            <div class="col-md-12">
                <hr class="hr-ce">
            </div>
            <div class="col-md-12 d-flex justify-content-between mt-4">
                <div>
                    <img src="<?php echo base_url('svg/shareIcon.svg')?>" alt="date">
                    Share This post
                </div>
                <div>
                    <a target="_blank" href="https://www.facebook.com/share.php?u=<?php echo base_url('blog-view/' . $blog->blog_id)?>">
                        <img src="<?php echo base_url('svg/facebookIcon.svg')?>" alt="date">
                    </a>
                    <a target="_blank" href="https://api.whatsapp.com/send?text=<?php echo base_url('blog-view/' . $blog->blog_id)?>">
                        <img src="<?php echo base_url('svg/whatsappIcon.svg')?>" alt="date">
                    </a>
                    <a target="_blank" href="https://www.pinterest.com/pin/create/button/?url=<?php echo base_url('blog-view/' . $blog->blog_id)?>">
                        <img src="<?php echo base_url('svg/pinterestIcon.svg')?>" alt="date">
                    </a>
                </div>
            </div>

            <div class="col-md-12 mt-3" >
                <form id="commentForm" action="<?php echo base_url('blog-comment-action');?>"  method="post">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required >
                                <input type="hidden" name="blog_id" placeholder="blog_id" value="<?php echo $blog->blog_id; ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="10"
                                  placeholder="Write a comment" required ></textarea>
                    </div>


                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-post w-100" >Post Comment</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <hr class="hr-ce">
            </div>
            <div class="col-md-12 mt-3 commemt-div" id="commentBoxReload">
                <?php foreach ($comments as $comment) { ?>
                <div class="comment-box">
                    <div class="d-flex">
                        <img src="<?php echo base_url('svg/messageUser.svg')?>" alt="date">
                        <div class="t-com">
                            <span class="name-comment"><?php echo $comment->comment_author;?></span><button class="btn-d" onclick="commentReply('commBox_<?php echo $comment->comment_id;?>','<?php echo $comment->comment_id;?>')" >. <?php echo invoiceDateFormat($comment->comment_date);?> - Reply</button>
                            <p class="text-comment"><?php echo $comment->comment_content;?></p>
                        </div>
                    </div>

                    <?php foreach (comment_id_by_reply_comment($comment->comment_id) as $reply) { ?>
                    <div class="comment-replay mt-3">
                        <span class="name-comment"><?php echo $reply->comment_author;?></span><button class="btn-d" >. <?php echo invoiceDateFormat($comment->comment_date);?></button>
                        <p class="text-comment"><?php echo $reply->comment_content;?></p>
                    </div>
                    <?php } ?>

                    <div id="commBox_<?php echo $comment->comment_id;?>" style="padding: 20px"></div>
                </div>
                <?php } ?>
            </div>


        </div>
    </div>
</section>
