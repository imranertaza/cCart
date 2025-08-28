

<section class="main-container">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="<?php echo base_url()?>/assets/theme_2/img/sing-up.png" alt="Sing In" class="img-fluid">
            </div>
            <div class="col-md-6 mb-4 mb-md-0">
                <form action="<?php echo base_url('login_action')?>" method="post" class="sing-up" onsubmit="return onsubmitHendler()">
                    <?php if (session()->getFlashdata('message') !== null) : echo session()->getFlashdata('message'); endif; ?>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border px-3 rounded-2 in_err">
                            <input class="form-control border-0" id="email" name="email" type="email" placeholder="Email" value="<?php if (isset($_COOKIE['login_email_web'])) {
    echo $_COOKIE['login_email_web'];
} ?>"  >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/emailIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger  d-inline-block text-capitalize err" id="emailMass"></span>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border px-3 rounded-2 in_err">
                            <input class="form-control border-0" id="password" name="password" type="password" placeholder="Password" value="<?php if (isset($_COOKIE['login_password_web'])) {
    echo $_COOKIE['login_password_web'];
} ?>"  >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/keyIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger  d-inline-block text-capitalize err" id="passwordMass"></span>
                    <div class="form-group">
                        <input type="submit" value="Sign In" class="btn btn-sign bg-transparent border-1 rounded-0 w-100 text-black fw-bold fs-5 border-dark">
                    </div>
                    <div class="row mt-2">
                        <div class="form-group  col-md-6">
                            <input type="checkbox" name="remember" value="1" class="form-check-input" id="remember1" <?php if (isset($_COOKIE['login_email_web'])) {
    echo 'checked';
} ?> >
                            <label class="form-check-label text-color-r" for="remember1">Remember me</label>
                        </div>
                        <div class="form-group text-end col-md-6">
                            <a href="<?php echo base_url('forgotpassword');?>" class="text-color-r">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <p>Don’t have an account?</p>
                        <p class="mt-3"><a href="<?php echo base_url('register')?>" class="btn bg-custom-color rounded-0 px-5 py-2 fs-5 text-white fw-semibold">Create an account</a></p>
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>
