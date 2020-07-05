<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	$posts = get_posts(array(
		'post_type'     => 'wpcf7_contact_form',
		'numberposts'   => -1
	));
	$cf7_forms = [];
	foreach ($posts as $post) {
		$cf7_forms[$post->ID] = $post->post_title;
	}

	Container::make( 'theme_options', __( 'Theme Options' ) )
         ->add_fields([
	         Field::make( 'separator', 'crb_separator_office', __( 'XRHealth Office' ) ),
             Field::make( 'text', 'crb_address'),
             Field::make( 'text', 'crb_phone'),
	         Field::make( 'text', 'crb_email1', __('Email for general inquiries')),
	         Field::make( 'text', 'crb_email2', __('Email for sales inquiries')),
             Field::make( 'separator', 'crb_separator_support', __( 'Customer Support' ) ),
	         Field::make( 'text', 'crb_phone_1', __('Phone')),
	         Field::make( 'text', 'crb_phone_ext', __('Phone Ext')),
	         Field::make( 'text', 'crb_additional_info', __('Additional Info')),
	         Field::make( 'text', 'crb_email3', __('Email')),
	         Field::make( 'select', 'crb_cf7', __( 'Choose Contact Form 7 form' ) )
	              ->set_options($cf7_forms),
	         Field::make( 'separator', 'crb_separator_other', __( 'Other settings' ) ),
	         Field::make( 'text', 'crb_twitter')->set_attribute('type', 'url')->set_attribute('placeholder', 'https://'),
	         Field::make( 'text', 'crb_facebook')->set_attribute('type', 'url')->set_attribute('placeholder', 'https://'),
	         Field::make( 'text', 'crb_youtube')->set_attribute('type', 'url')->set_attribute('placeholder', 'https://'),
         ]);
}