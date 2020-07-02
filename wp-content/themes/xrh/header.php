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
	                <?php wp_nav_menu([
		                'theme-location' => 'primary',
		                'depth'		=>	2,
		                'menu'			=>	'Primary Menu',
		                'container'		=>	'',
		                'menu_class'		=>	'',
		                'items_wrap'		=>	'%3$s',
		                'walker'		=>	new Bulma_NavWalker(),
		                'fallback_cb'		=>	'Bulma_NavWalker::fallback'
	                ]);
	                ?>
                </div>

                <div class="navbar-end">
	                <?php wp_nav_menu([
		                'theme-location' => 'primary-end',
		                'depth'		=>	1,
		                'menu'			=>	'Primary End',
		                'container'		=>	'',
		                'menu_class'		=>	'',
		                'items_wrap'		=>	'%3$s',
		                'walker'		=>	new Bulma_NavWalker(),
		                'fallback_cb'		=>	'Bulma_NavWalker::fallback'
	                ]);
	                ?>
                </div>
            </div>
        </nav>
	</header><!-- #masthead -->
