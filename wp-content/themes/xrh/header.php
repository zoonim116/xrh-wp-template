<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xrh
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?php echo home_url('/'); ?>">
		            <?php do_action('xrh_show_logo_action') ?>
                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Products
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                VR/AR Applications
                            </a>
                            <a class="navbar-item">
                                Data Portal
                            </a>
                            <a class="navbar-item">
                                External Control
                            </a>
                            <a class="navbar-item">
                                Mobile App
                            </a>
                        </div>
                    </div>
                    <a class="navbar-item">
                        Compliance
                    </a>

                    <a class="navbar-item">
                        Release Notes
                    </a>

                    <a class="navbar-item">
                        FAQ's
                    </a>

                    <a class="navbar-item">
                        Contact Us
                    </a>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <a href="#">For XRHealth Telehealth Services </a>
                    </div>
                </div>
            </div>
        </nav>
	</header><!-- #masthead -->
