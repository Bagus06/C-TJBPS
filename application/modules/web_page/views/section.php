    <!-- ======= Background Section ======= -->
    <section id="background" class="about">

        <!-- ======= background Me ======= -->
        <div class="about-me container">

            <div class="section-title">
                <h2>background</h2>
            </div>

            <div class="row">
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>Cooperative background of PT. TJB Personnel Services.</h3>
                    <p>
                        <?php foreach ($data['data'] as $key => $value) {
                            if ($value['content_title'] == 'background-coperative') {
                                echo $value['content'];
                            }
                        } ?>
                    </p>
                </div>
            </div>

            <div class="section-title" style="padding-top: 10%;">
                <h2>Vision and Mission</h2>
            </div>

            <div class="row">
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>Vision</h3>
                    <p>
                        <?php foreach ($data['data'] as $key => $value) {
                            if ($value['content_title'] == 'vision') {
                                echo $value['content'];
                            }
                        } ?>
                    </p>
                </div>
            </div>

            <div class="row" style="padding-top: 5%;">
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>Mission</h3>
                    <p>
                        <?php foreach ($data['data'] as $key => $value) {
                            if ($value['content_title'] == 'mission') {
                                echo $value['content'];
                            }
                        } ?>
                    </p>
                </div>
            </div>

        </div><!-- End background Me -->

        <!-- ======= Counts ======= -->
        <div class="counts container">

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="count-box">
                        <i class="icofont-users-alt-1"></i>
                        <span data-toggle="counter-up"><?php echo $data['total_employees'] ?></span>
                        <p>Account</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="icofont-bank"></i>
                        <span data-toggle="counter-up"><?php echo currency_for_datatogle($data['saving_amount']->total_money) ?></span>
                        <p>Savings Amount</p>
                    </div>
                </div>

            </div>

        </div><!-- End Counts -->

        <!-- ======= Testimonials ======= -->
        <!-- <div class="testimonials container">

            <div class="section-title">
                <h2>Cooperative employees</h2>
            </div>

            <div class="owl-carousel testimonials-carousel">

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="<?php echo base_url('assets/vendor/personal/') ?>assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="<?php echo base_url('assets/vendor/personal/') ?>assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="<?php echo base_url('assets/vendor/personal/') ?>assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="<?php echo base_url('assets/vendor/personal/') ?>assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="<?php echo base_url('assets/vendor/personal/') ?>assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                </div>

            </div>

        </div>End Testimonials  -->

    </section><!-- End background Section -->

    <!-- ======= History Section ======= -->
    <section id="history" class="resume">
        <div class="container">

            <div class="section-title">
                <h2>History</h2>
                <p>The History of the Employee Cooperative</p>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="pb-0">
                        <p>
                            <em>
                                <?php foreach ($data['data'] as $key => $value) {
                                    if ($value['content_title'] == 'history') {
                                        echo $value['content'];
                                    }
                                } ?>
                            </em>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End History Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact</p>
            </div>

            <div class="row mt-2">

                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-phone-call"></i>
                        <h3>Phone</h3>
                        <p>
                            <?php foreach ($data['data'] as $key => $value) {
                                if ($value['content_title'] == 'phone') {
                                    echo $value['content'];
                                }
                            } ?>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-mail-send"></i>
                        <h3>Email</h3>
                        <p>
                            <?php foreach ($data['data'] as $key => $value) {
                                if ($value['content_title'] == 'email') {
                                    echo $value['content'];
                                }
                            } ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-12 mt-4 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>Address</h3>
                        <p>
                            <?php foreach ($data['data'] as $key => $value) {
                                if ($value['content_title'] == 'address') {
                                    echo $value['content'];
                                }
                            } ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form> -->

        </div>
    </section><!-- End Contact Section -->