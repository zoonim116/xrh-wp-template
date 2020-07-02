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
                    <img src="<?php echo get_template_directory_uri()?>/images/logo-footer.png">
                    <p>The World's First VR/AR Telehealth</p>
                </div>
                <div class="column is-2-tablet is-6-mobile">
                    <section class="widget widget_nav_menu">
                        <h2 class="widget-title">Products</h2>
                        <div>
                            <ul>
                                <li>
                                    <a href="#">VR/AR  Applications</a>
                                </li>
                                <li>
                                    <a href="#">Data Portal</a>
                                </li>
                                <li>
                                    <a href="#">External Control</a>
                                </li>
                                <li>
                                    <a href="#">Mobile App</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="column is-2-tablet is-6-mobile">
                    <section class="widget widget_nav_menu">
                        <h2 class="widget-title">Compliance</h2>
                        <div>
                            <ul>
                                <li>
                                    <a href="#">VR/AR  Applications</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="column is-2-tablet is-6-mobile">
                    <section class="widget widget_nav_menu">
                        <h2 class="widget-title">Release Notes</h2>
                        <div>
                            <ul>
                                <li>
                                    <a href="#">VR Portal</a>
                                </li>
                                <li>
                                    <a href="#">External Control</a>
                                </li>
                                <li>
                                    <a href="#">Data Portal</a>
                                </li>
                                <li>
                                    <a href="#">Mobile App</a>
                                </li>
                                <li>
                                    <a href="#">Developers API</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="column is-2-tablet is-6-mobile">
                    <section class="widget widget_nav_menu">
                        <h2 class="widget-title">Support</h2>
                        <div>
                            <ul>
                                <li>
                                    <a href="#">FAQ</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div class="footer-flex">
                <div>
                    <p>© 2020 XRHealth. All rights reserved.</p>
                </div>
                <div>
                    <section class="widget widget_nav_menu">
                        <div>
                            <ul>
                                <li>
                                    <a href="#">Terms of Use</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Sitemap</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="social-links">
                    <a href="#" target="_blank">
                        <img src="<?php echo get_template_directory_uri()?>/images/Logo_Twitter.svg">
                    </a>
                    <a href="#" target="_blank">
                        <img src="<?php echo get_template_directory_uri()?>/images/Logo_Facebook.svg">
                    </a>
                    <a href="#" target="_blank">
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
