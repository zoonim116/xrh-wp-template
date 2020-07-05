<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xrh
 */

?>

	<footer class="site-footer">
        <div class="container">
            <div class="columns is-multiline is-mobile">
                <div class="column is-4-tablet is-12-mobile footer-logo">
                    <img src="<?php echo get_theme_mod('footer_logo'); ?>">
                    <p><?php echo get_theme_mod('footer_logo_text') ?></p>
                </div>
                <div class="column is-2-tablet is-6-mobile">
	                <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
                <div class="column is-2-tablet is-6-mobile">
	                <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </div>
                <div class="column is-2-tablet is-6-mobile">
	                <?php dynamic_sidebar( 'sidebar-3' ); ?>
                </div>
                <div class="column is-2-tablet is-6-mobile">
	                <?php dynamic_sidebar( 'sidebar-4' ); ?>
                </div>
            </div>
            <div class="footer-flex">
                <div>
                    <p>© <?php echo date('Y')?> XRHealth. All rights reserved.</p>
                </div>
                <div>
	                <?php dynamic_sidebar( 'sidebar-5' ); ?>
<!--                    <section class="widget widget_nav_menu">-->
<!--                        <div>-->
<!--                            <ul>-->
<!--                                <li>-->
<!--                                    <a href="#">Terms of Use</a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="#">Privacy Policy</a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="#">Sitemap</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </section>-->
                </div>
                <div class="social-links">
                    <a href="<?php echo carbon_get_theme_option('crb_twitter'); ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri()?>/images/Logo_Twitter.svg">
                    </a>
                    <a href="<?php echo carbon_get_theme_option('crb_facebook'); ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri()?>/images/Logo_Facebook.svg">
                    </a>
                    <a href="<?php echo carbon_get_theme_option('crb_youtube'); ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri()?>/images/Logo_Youtube.svg">
                    </a>
                </div>
            </div>
        </div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
