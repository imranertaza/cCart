<?= $this->extend('Theme/Theme_2/layout') ?>
<?= $this->section('content') ?>
<section class="main-container my-0">
    <div class="container">
        <div class="contact-info py-5">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo base_url('svg/locationIcon.svg')?>" class="me-3" alt="date">
                        <p class="mb-0">House: 59, Road-7/A<br>
                            Dhanmondi, Dhaka<br>
                            Bangladesh</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo base_url('svg/phoneBigIcon.svg')?>" class="me-3" alt="date">
                        <div>
                            <a href="tel:+8801851670403">+8801851670403</a><br>
                            <a href="tel:+8801928174380">+8801928174380</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo base_url('svg/mailBigIcon.svg')?>" class="me-3" alt="date">
                        <a href="mailto:info@amazinggadgets.com">info@amazinggadgets.com</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form bg-white border p-4 p-lg-5 mb-5">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h3>Get in touch</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <form action="#" method="post" class="contact-form" onsubmit="return contactForm()">
                        <div class="mb-3">
                            <input class="form-control in_err" id="email" name="email" type="text" placeholder="Email">
                            <span class="text-danger err d-inline-block text-capitalize" id="emailError"></span>
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control in_err" id="message" cols="30" rows="6" placeholder="Question"></textarea>
                            <span class="text-danger err d-inline-block text-capitalize" id="messageERR"></span>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Get a Quary" class="btn bg-custom-color text-white rounded-0">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script>
</script>
<?= $this->endSection() ?>
