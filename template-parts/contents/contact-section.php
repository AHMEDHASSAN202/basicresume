<!-- s-stats
 ================================================== -->
<?php $contactOptions = get_option('portfolio_contacts_options', settingsDefaultContactsOptions()); ?>
<section id="contact" class="s-contact target-section">

    <div class="overlay"></div>

    <div class="row narrow section-intro">
        <div class="col-full">
            <h3>Contact</h3>
            <h1><?php /** @var TYPE_NAME $args */
                echo esc_html($args['portfolio_contact_title']) ?></h1>

            <p class="lead"><?php echo esc_html($args['portfolio_contact_text']) ?></p>
        </div>
    </div>

    <div class="row contact__main">
        <div class="col-eight tab-full contact__form">
            <form name="contactForm" id="contactForm" method="POST" action="<?php echo get_bloginfo('url') . '/contact-us'; ?>">
                <fieldset>
                    <?php wp_nonce_field('submit_contact_form', 'contact_form') ?>
                    <div class="form-field">
                        <input name="contactName" type="text" id="contactName" placeholder="Name" value="" minlength="2" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactEmail" type="email" id="contactEmail" placeholder="Email" value="" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject" value="" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="contactMessage" id="contactMessage" placeholder="message" rows="10" cols="50" required="" aria-required="true" class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        <button class="full-width btn--primary">Submit</button>
                        <div class="submit-loader">
                            <div class="text-loader">Sending...</div>
                            <div class="s-loader">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>

            <!-- contact-warning -->
            <div class="message-warning">
                Something went wrong. Please try again.
            </div>

            <!-- contact-success -->
            <div class="message-success">
                Your message was sent, thank you!<br>
            </div>

        </div>
        <div class="col-four tab-full contact__infos">
            <h4 class="h06">Phone</h4>
            <p>
                <?php if (!empty($contactOptions['portfolio_mobile'])) : ?>
                    <?php foreach ($contactOptions['portfolio_mobile'] as $mobile) : ?>
                        <a href="tel:<?php echo esc_attr($mobile) ?>" style="color: inherit"><?php echo esc_html($mobile) ?></a> <br>
                    <?php endforeach; ?>
                <?php endif; ?>
            </p>

            <h4 class="h06">Email</h4>
            <p>
                <?php if (!empty($contactOptions['portfolio_email'])) : ?>
                    <?php foreach ($contactOptions['portfolio_email'] as $email) : ?>
                        <a href="mailto:<?php echo esc_attr($email) ?>" style="color: inherit"><?php echo esc_html($email) ?></a> <br>
                    <?php endforeach; ?>
                <?php endif; ?>
            </p>

            <h4 class="h06">Address</h4>
            <p>
                <?php if (!empty($contactOptions['portfolio_address'])) : ?>
                    <?php foreach ($contactOptions['portfolio_address'] as $address) : ?>
                        <span><?php echo esc_html($address) ?></span> <br>
                    <?php endforeach; ?>
                <?php endif; ?>
            </p>
        </div>

    </div>

</section>
<!-- end s-contact -->
