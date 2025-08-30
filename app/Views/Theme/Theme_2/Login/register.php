<section class="main-container">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="<?php echo base_url()?>/assets/theme_2/img/sing-up.png" alt="Sing Up" class="img-fluid">
            </div>
            <div class="col-md-6">
                <form action="<?php echo base_url('register_action')?>" method="post" class="sing-up" onsubmit="return onRegistration()">
                    <?php if (session()->getFlashdata('message') !== null) : echo session()->getFlashdata('message'); endif; ?>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 in_err">
                            <input class="form-control border-0" id="firstname" name="firstname" type="text" placeholder="First Name"  >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/userEditIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="firstname_error"></span>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 in_err">
                            <input class="form-control border-0" id="lastname" name="lastname" type="text" placeholder="Last Name"  >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/userEditIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="lastname_error"></span>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 in_err">
                            <input class="form-control border-0" id="email" name="email" type="email" placeholder="Email" >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/emailIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="email_error"></span>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 in_err">
                            <input class="form-control border-0" id="phone" name="phone" type="number" placeholder="Phone" >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/phoneIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="phone_error"></span>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 in_err">
                            <input class="form-control border-0" id="password" name="password" type="password" placeholder="Password" >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/keyIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="password_error"></span>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 in_err">
                            <input class="form-control border-0" id="confirmPassword" name="confirm_password" type="password" placeholder="Confirm Password" >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/keyIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize " id="confirmPassword_error"></span>
                    <div class="form-group">
                        <input type="submit" value="Sign Up" class="btn btn-sign bg-transparent border-1 rounded-0 w-100 text-black fw-bold fs-5 border-dark">
                    </div>
<!--                    <p class="text-center fs-4 my-3 text-gray">or</p>-->
                    <div class="mt-3 text-center">
                        <p>Already have an account?</p>
                        <p class="mt-3"><a href="<?php echo base_url('login') ?>" class="btn bg-custom-color rounded-0 px-5 py-2 fs-5 text-white fw-semibold">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
