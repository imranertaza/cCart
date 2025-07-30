<section class="main-container my-0">
    <div class="container">
        <div class="contact-info py-5">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo base_url('svg/locationIcon.svg')?>" class="me-3" alt="date">
                        <p class="mb-0">121 King St, Melbourne VIC 3000, United Kingdom</p>
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
                        <a href="mailto:finerlabels@gmail.com">finerlabels@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form bg-white border p-4 p-lg-5 mb-5">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 login_form">
                    <h3>Get in touch</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
<!--                    <form id="contact-form" action="--><?php //echo base_url('contact_form_action')?><!--" method="post" class="contact-form" onsubmit="return contactForm()" >-->
                        <div class="mb-3">
                            <input class="form-control in_err" id="email" name="email" type="text" placeholder="Email">
                            <span class="text-danger err d-inline-block text-capitalize" id="emailError"></span>
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control in_err" id="message" cols="30" rows="6" placeholder="Question"></textarea>
                            <span class="text-danger err d-inline-block text-capitalize" id="messageERR"></span>
                        </div>

                        <div class="mb-3">
                            <div id="captcha" class="form_div">
                                <input type="hidden" id="genaretCapt" >
                                <div class="preview"></div>
                                <div class="captcha_form">
                                    <input type="text" id="captcha_form" class="form_input_captcha" placeholder="Enter Captcha ">
                                    <button class="captcha_refersh">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </div>
                                <span class="text-danger err d-inline-block text-capitalize" id="messageRecaptcha"></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Get a Quary" onclick="contactFormSubmit()" class="btn bg-custom-color text-white rounded-0">
                        </div>
<!--                    </form>-->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    (function(){
        const fonts = ["cursive"];
        let captchaValue = "";
        function gencaptcha()
        {
            let value = btoa(Math.random()*1000000000);
            value = value.substr(0,5 + Math.random()*5);
            captchaValue = value;
        }

        function setcaptcha()
        {
            let html = captchaValue.split("").map((char)=>{
                const rotate = -20 + Math.trunc(Math.random()*30);
                const font = Math.trunc(Math.random()*fonts.length);
                return`<span
		            style="
		            transform:rotate(${rotate}deg);
		            font-family:${font[font]};
		            "
		           >${char} </span>`;
            }).join("");
            document.querySelector(".login_form #captcha .preview").innerHTML = html;
            document.querySelector(".login_form #genaretCapt").value = captchaValue;
        }

        function initCaptcha(){
            document.querySelector(".login_form #captcha .captcha_refersh").addEventListener("click",function(){
                gencaptcha();
                setcaptcha();
            });

            gencaptcha();
            setcaptcha();
        }
        initCaptcha();

    })();
</script>
