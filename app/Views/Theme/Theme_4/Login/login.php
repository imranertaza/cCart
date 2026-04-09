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

    .bg-auth {
        min-height: 530px;
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

    @media (max-width: 1200px) {
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
            <div class="col-xl-6 ">

                <div class="signup-image position-relative">

                    <a href="javascript:history.back()"
                       class="text-decoration-none d-flex justify-content-center align-items-center gap-3 text-dark back-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                            <path d="M16 7.5H3.83L9.42 1.91L8 0.5L0 8.5L8 16.5L9.41 15.09L3.83 9.5H16V7.5Z"
                                  fill="black"/>
                        </svg>
                        Back
                    </a>
                    <img class="img-fluid bg-auth"
                         src="<?php echo base_url() ?>/assets/theme_4/images/auth/signin-bg.webp" srcset="
                    <?php echo base_url() ?>/assets/theme_4/images/auth/signin-bg-320.webp 320w,
                    <?php echo base_url() ?>/assets/theme_4/images/auth/signin-bg.webp 588w
                  " fetchpriority="high" draggable="false" alt="signup image">
                </div>

            </div>

            <!-- Right Form -->
            <div class="col-xl-6 px-md-5">

                <h3 class="mb-4 auth-title">Create an account</h3>


                <div class="separator"><span>or</span></div>

                <form action="<?php echo base_url('login_action')?>" method="post" class="sing-up" onsubmit="return onsubmitHendler()">
                    <?= csrf_field() ?>
                    <div class="mb-3 in_err">
                        <label for="email" class="form-label required">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Demo@gmail.com" value="<?php if (isset($_COOKIE['login_email_web'])) {
    echo $_COOKIE['login_email_web'];
} ?>">
                    </div>
                    <span class="text-danger d-inline-block text-capitalize err" id="emailMass"></span>
                    <div class="mb-3 ">
                        <label for="password" class="form-label required">Password</label>
                        <div class="position-relative">

                            <input type="password" class="form-control pe-5" name="password" id="password" placeholder="********" value="<?php if (isset($_COOKIE['login_password_web'])) {
    echo $_COOKIE['login_password_web'];
} ?>">

                            <!-- Toggle Icon Container -->
                            <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                  onclick="togglePassword()"
                                  style="cursor: pointer;">
                          <!-- Eye (hidden) -->
                          <svg id="eyeHidden" xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 18"
                               fill="none" style="display: none;">
                            <path d="M1 9C2.5 4 6.5 1 11 1C15.5 1 19.5 4 21 9C19.5 14 15.5 17 11 17C6.5 17 2.5 14 1 9Z"
                                  stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="11" cy="9" r="3" stroke="black" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                          </svg>

                                        <!-- Eye-off ( visible) -->
                          <svg id="eyeVisible" xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18"
                               fill="none">
                            <path
                                d="M3.00008 1L19.0001 17M15.5001 13.756C14.1471 14.485 12.6181 15 11.0001 15C7.47008 15 4.36608 12.548 2.58708 10.779C2.11708 10.312 1.88208 10.079 1.73308 9.62C1.62608 9.293 1.62608 8.707 1.73308 8.38C1.88308 7.921 2.11808 7.687 2.58808 7.22C3.48508 6.328 4.71808 5.264 6.17208 4.427M18.5001 11.634C18.8331 11.341 19.1381 11.052 19.4121 10.78L19.4151 10.777C19.8831 10.311 20.1181 10.077 20.2671 9.621C20.3741 9.294 20.3741 8.707 20.2671 8.38C20.1171 7.922 19.8831 7.688 19.4131 7.221C17.6331 5.452 14.5311 3 11.0001 3C10.6621 3 10.3287 3.02133 10.0001 3.064M12.3231 10.5C11.9357 10.842 11.4311 11.0209 10.9148 10.999C10.3985 10.9772 9.91072 10.7564 9.55363 10.3829C9.19655 10.0094 8.99788 9.51219 8.99927 8.99546C9.00066 8.47872 9.20199 7.98258 9.56108 7.611"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        </span>
                        </div>
                    </div>
                    <span class="text-danger d-inline-block text-capitalize err" id="passwordMass"></span>
                    <div class="form-check d-flex justify-content-between align-items-center">
                        <div class="remember">
                            <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember" <?php if (isset($_COOKIE['login_email_web'])) {
    echo 'checked';
} ?> >
                            <label class="form-check-label remember" for="remember"  >Remember Me</label>
                        </div>
                        <a href="<?= base_url('forgotpassword');?>" class="text-decoration-none">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn-sign auth-action-btn w-100">Signin</button>
                </form>

                <p class="text-center auth-other">
                    Don’t Have an account? <a href="<?= base_url('register')?>" class="auth-link">Signup</a>
                </p>
            </div>
        </div>
    </div>

</main>

<?= $this->endSection() ?>
<?= $this->section('java_script') ?>
<script src="<?php echo base_url() ?>/assets/theme_3/validation.js" ></script>
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const eyeVisible = document.getElementById('eyeVisible');
        const eyeHidden = document.getElementById('eyeHidden');

        const isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';

        eyeVisible.style.display = isHidden ? 'none' : 'inline';
        eyeHidden.style.display = isHidden ? 'inline' : 'none';
    }
</script>
<?= $this->endSection() ?>
