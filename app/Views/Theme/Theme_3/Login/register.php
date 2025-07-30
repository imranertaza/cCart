<section class="main-container">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <!-- <img src="<?php echo base_url()?>/assets/img/sing-up.png" alt="Sing Up" class="img-fluid"> -->
                <img src="<?php echo base_url('svg/registerImageIcon.svg')?>" alt="date">
            </div>
            <div class="col-md-6">
                <form action="<?php echo base_url('register_action')?>" method="post" class="sing-up" onsubmit="return onRegistration()">
                    <?php if (session()->getFlashdata('message') !== null) : echo session()->getFlashdata('message'); endif; ?>
                    <div class="form-group">
                        <div class="input-group in_err d-flex align-items-center bg-white border rounded-2 px-3">
                            <input class="form-control border-0" id="firstname" name="firstname" type="text" placeholder="First Name" required >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/userEditIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize mb-4" id="firstname_error"></span>
                    <div class="form-group">
                        <div class="input-group in_err d-flex align-items-center bg-white border rounded-2 px-3">
                            <input class="form-control border-0" id="lastname" name="lastname" type="text" placeholder="Last Name" required >
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/userEditIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize mb-4" id="lastname_error"></span>
                    <div class="form-group">
                        <div class="input-group in_err d-flex align-items-center bg-white border rounded-2 px-3">
                            <input class="form-control border-0" id="email" name="email" type="email" placeholder="Email" required>
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/emailIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize mb-4" id="email_error"></span>
                    <div class="form-group">
                        <div class="input-group in_err d-flex align-items-center bg-white border rounded-2 px-3 ">
                            <input class="form-control border-0" id="phone" name="phone" type="number" placeholder="Phone" required>
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/phoneIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize mb-4" id="phone_error"></span>
                    <div class="form-group">
                        <div class="input-group in_err d-flex align-items-center bg-white border rounded-2 px-3">
                            <input class="form-control border-0" id="password" name="password" type="password" placeholder="Password" required>
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/keyIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize mb-4" id="password_error"></span>
                    <div class="form-group">
                        <div class="input-group in_err d-flex align-items-center bg-white border rounded-2 px-3">
                            <input class="form-control border-0" id="confirmPassword" name="confirm_password" type="password" placeholder="Confirm Password" required>
                            <div class="input-group-addon p-1">
                                <img src="<?php echo base_url('svg/keyIcon.svg')?>" alt="date">
                            </div>
                        </div>
                    </div>
                    <span class="text-danger err d-inline-block text-capitalize mb-3" id="confirmPassword_error"></span>
                    <div class="form-group">
                        <input type="submit" value="Sign Up" class="btn btn-sign bg-transparent border-1 rounded-0 w-100 text-black fw-bold fs-5 border-dark">
                    </div>
                    <p class="text-center fs-4 my-3 text-gray">or</p>
                </form>
            </div>
        </div>

        <div class="sing-in card px-5 bg-white text-center rounded-0 border-0">
            <p>Already have an account?</p>
            <p><a href="<?php echo base_url('login') ?>" class="btn bg-custom-color rounded-0 px-5 py-2 fs-5 text-white fw-semibold">Sign In</a></p>
        </div>
    </div>
</section>
