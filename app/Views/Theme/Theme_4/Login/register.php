<?= $this->extend('Theme/Theme_4/layout') ?>
<?= $this->section('content') ?>
<?= $this->section('caa_link') ?>
<style>
    .details-navbar {
        margin-bottom: 68px
    }

    .signup-section {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Poppins, sans-serif
    }

    .signup-image img {
        height: 100%;
        z-index: 1
    }

    .auth-title {
        color: #2b2b2b;
        font-family: Poppins, sans-serif;
        font-size: 26px;
        font-style: normal;
        font-weight: 500;
        line-height: 160%;
        text-align: center;
        margin-bottom: 40px !important
    }

    .form-control {
        padding: 10px 22px;
        margin-bottom: 20px
    }
    .bg-auth{
        min-height: 530px;
    }
    .google-btn {
        font-family: Poppins, sans-serif;
        color: #353535;
        text-align: center;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 120%;
        display: flex;
        height: 58px;
        padding: 10px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        align-self: stretch;
        border-radius: 10px;
        border: 1px solid #000;
        background-color: #fff
    }

    .separator {
        text-align: center;
        margin: 40px 0;
        position: relative
    }

    .separator span {
        color: #555
    }

    .separator::after,
    .separator::before {
        content: "";
        position: absolute;
        top: 50%;
        width: 40%;
        height: 1px;
        background: #c2c2c2
    }

    .separator::before {
        left: 0
    }

    .auth-action-btn {
        background-color: #081a70;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 17px 0;
        color: #fff;
        text-align: center;
        font-family: Poppins, sans-serif;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: 120%
    }

    .separator::after {
        right: 0
    }

    .separator span {
        background: #fff;
        padding: 0 10px;
        color: #666
    }

    .back-link {
        position: absolute;
        top: 20px;
        left: 14px;
        z-index: 999
    }

    header .brand-content h4 {
        color: #081a70
    }

    footer .brand-content h4 {
        color: #fff
    }

    .auth-link {
        color: #081a70
    }

    .remember {
        color: #565656
    }

    .auth-other {
        margin-top: 37px !important;
        margin-bottom: 0
    }

    .form-check {
        margin-bottom: 45px
    }

    @media (max-width:1200px) {
        .signup-image {
            display: none
        }
    }
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_4/css/auth.css" media="print"
      onload="this.media='all'">
<?= $this->endSection() ?>
<main>
    <div class="signup-section margin-t-b">
        <div class="row signup-card bg-white container align-items-center">
            <!-- Left Image -->
            <div class="col-xl-6">
                <div class="signup-image position-relative">
                    <a href="javascript:history.back()"
                       class="text-decoration-none d-flex justify-content-center align-items-center gap-3 text-dark back-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                            <path d="M16 7.5H3.83L9.42 1.91L8 0.5L0 8.5L8 16.5L9.41 15.09L3.83 9.5H16V7.5Z" fill="black" />
                        </svg>
                        Back
                    </a>
                    <img class="img-fluid bg-auth" src="<?php echo base_url() ?>/assets/theme_4/images/auth/signup-bg.webp" srcset="
            <?php echo base_url() ?>/assets/theme_4/images/auth/signup-bg-320.webp 320w,
            <?php echo base_url() ?>/assets/theme_4/images/auth/signup-bg-480.webp 480w,
            <?php echo base_url() ?>/assets/theme_4/images/auth/signup-bg.webp 588w
          " fetchpriority="high" draggable="false" alt="signup image">
                </div>
            </div>

            <!-- Right Form -->
            <div class="col-xl-6 px-md-5">

                <h3 class="mb-4 auth-title">Create an account</h3>


                <div class="separator"><span>or</span></div>

                <form action="<?= base_url('register_action')?>" method="post" class="sing-up" onsubmit="return onRegistration()">
                    <?= csrf_field() ?>
                    <div class="mb-2">
                        <label for="name" class="form-label required">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="firstname_error"></span>

                    <div class="mb-2">
                        <label for="name" class="form-label required">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="lastname_error"></span>

                    <div class="mb-2">
                        <label for="email" class="form-label required">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Demo@gmail.com">
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="email_error"></span>

                    <div class="mb-2">
                        <label for="phone" class="form-label required">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Number">
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="phone_error"></span>

                    <div class="mb-2">
                        <label for="password" class="form-label required">Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control pe-5" id="password" name="password" placeholder="********">

                            <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                  onclick="togglePassword('password', 'eyeVisible1', 'eyeHidden1')" style="cursor: pointer;">
                                <!-- Eye Hidden -->
                                <svg id="eyeHidden1" xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 18"
                                     fill="none" style="display: none;">
                                    <path d="M1 9C2.5 4 6.5 1 11 1C15.5 1 19.5 4 21 9C19.5 14 15.5 17 11 17C6.5 17 2.5 14 1 9Z"
                                          stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="11" cy="9" r="3" stroke="black" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <!-- Eye Visible -->
                                <svg id="eyeVisible1" xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18"
                                     fill="none">
                                    <path d="M3 1L19 17M15.5 13.756C14.147 14.485 12.618 15 11 15C7.47 15 4.366 12.548 2.587 10.779C2.117 10.312 1.882 10.079 1.733 9.62C1.626 9.293 1.626 8.707 1.733 8.38C1.883 7.921 2.118 7.687 2.588 7.22C3.485 6.328 4.718 5.264 6.172 4.427M18.5 11.634C18.833 11.341 19.138 11.052 19.412 10.78C19.883 10.311 20.118 10.077 20.267 9.621C20.374 9.294 20.374 8.707 20.267 8.38C20.117 7.922 19.883 7.688 19.413 7.221C17.633 5.452 14.531 3 11 3C10.662 3 10.329 3.021 10 3.064M12.323 10.5C11.936 10.842 11.431 11.021 10.915 10.999C10.398 10.977 9.911 10.756 9.554 10.383C9.197 10.009 8.998 9.512 8.999 8.995C9.001 8.479 9.202 7.983 9.561 7.611"
                                          stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize" id="password_error"></span>

                    <div class="mb-2">
                        <label for="confirmPassword" class="form-label required">Confirm Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control pe-5" id="confirmPassword" name="confirm_password"
                                   placeholder="********">

                            <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                  onclick="togglePassword('confirmPassword', 'eyeVisible2', 'eyeHidden2')" style="cursor: pointer;">
                                <!-- Eye Hidden -->
                                <svg id="eyeHidden2" xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 18"
                                     fill="none" style="display: none;">
                                    <path d="M1 9C2.5 4 6.5 1 11 1C15.5 1 19.5 4 21 9C19.5 14 15.5 17 11 17C6.5 17 2.5 14 1 9Z"
                                          stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="11" cy="9" r="3" stroke="black" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                                    <!-- Eye Visible -->
                                <svg id="eyeVisible2" xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18"
                                     fill="none">
                                    <path d="M3 1L19 17M15.5 13.756C14.147 14.485 12.618 15 11 15C7.47 15 4.366 12.548 2.587 10.779C2.117 10.312 1.882 10.079 1.733 9.62C1.626 9.293 1.626 8.707 1.733 8.38C1.883 7.921 2.118 7.687 2.588 7.22C3.485 6.328 4.718 5.264 6.172 4.427M18.5 11.634C18.833 11.341 19.138 11.052 19.412 10.78C19.883 10.311 20.118 10.077 20.267 9.621C20.374 9.294 20.374 8.707 20.267 8.38C20.117 7.922 19.883 7.688 19.413 7.221C17.633 5.452 14.531 3 11 3C10.662 3 10.329 3.021 10 3.064M12.323 10.5C11.936 10.842 11.431 11.021 10.915 10.999C10.398 10.977 9.911 10.756 9.554 10.383C9.197 10.009 8.998 9.512 8.999 8.995C9.001 8.479 9.202 7.983 9.561 7.611"
                                          stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="confirmPassword_error"></span>

                    <button type="submit" class="auth-action-btn w-100">Signup</button>
                </form>

                <p class="text-center auth-other">
                    Already have an account? <a href="<?= base_url('login')?>" class="auth-link">Login</a>
                </p>
            </div>
        </div>
    </div>


</main>
<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script src="<?php echo base_url() ?>/assets/theme_3/validation.js" ></script>
<script>
    function togglePassword(inputId, visibleId, hiddenId) {
        const input = document.getElementById(inputId);
        const eyeVisible = document.getElementById(visibleId);
        const eyeHidden = document.getElementById(hiddenId);

        const isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';

        eyeVisible.style.display = isHidden ? 'none' : 'inline';
        eyeHidden.style.display = isHidden ? 'inline' : 'none';
    }
</script>
<?= $this->endSection() ?>
