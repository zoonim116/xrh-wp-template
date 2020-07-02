<?php get_header(); ?>
<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
    <?php the_content(); ?>
<?php } } else { ?>
    <p>Nothing found</p>
<?php } ?>
<section class="contact-us">
    <div class="container">
        <p class="title">Contact Us</p>
        <div class="columns">
            <div class="column is-6 contact-form">
                <p>Please fill in your info and we’ll reach out as soon as possible.</p>
                <?php echo do_shortcode('[contact-form-7 id="'.carbon_get_theme_option('crb_cf7').'"]') ?>
            </div>
            <div class="column is-6 contact-info">
                <div class="contact-info-item">
                    <p class="contact-title">XRHealth Office</p>
                    <div class="flex-contact">
                        <span><img src="<?php echo get_template_directory_uri()?>/images/icon-address.svg"></span>
                        <span><?php echo carbon_get_theme_option('crb_address'); ?></span>
                    </div>
                    <div class="flex-contact">
                        <span><img src="<?php echo get_template_directory_uri()?>/images/icon-phone.svg"></span>
                        <span class="phone"><a href="tel:<?php echo carbon_get_theme_option('crb_phone'); ?>"><b><?php echo carbon_get_theme_option('crb_phone'); ?></b></a></span>
                    </div>
                    <div class="flex-contact">
                        <span><img src="<?php echo get_template_directory_uri()?>/images/icon-mail.svg"></span>
                        <div>
                            <p>For general inquiries:</p>
                            <p><a href="mailto:<?php echo carbon_get_theme_option('crb_email1'); ?>"><?php echo carbon_get_theme_option('crb_email1'); ?></a></p>
                        </div>
                        <div>
                            <p>For sales inquiries:</p>
                            <p><a href="mailto:<?php echo carbon_get_theme_option('crb_email2'); ?>"><?php echo carbon_get_theme_option('crb_email2'); ?></a></p>
                        </div>
                    </div>
                </div>
                <div class="contact-info-item">
                    <p class="contact-title">Customer Support</p>
                    <div class="flex-contact">
                        <span><img src="<?php echo get_template_directory_uri()?>/images/icon-phone.svg"></span>
                        <div>
                            <p class="phone"><a href="tel:<?php echo carbon_get_theme_option('crb_phone_1'); ?>"><?php echo carbon_get_theme_option('crb_phone_1'); ?></a> | <span><?php echo carbon_get_theme_option('crb_phone_ext'); ?></span></p>
                            <p class="small"><?php echo carbon_get_theme_option('crb_additional_info'); ?></p>
                        </div>
                    </div>
                    <div class="flex-contact">
                        <span><img src="<?php echo get_template_directory_uri()?>/images/icon-mail.svg"></span>
                        <span><a href="mailto:<?php echo carbon_get_theme_option('crb_email3'); ?>"><?php echo carbon_get_theme_option('crb_email3'); ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
