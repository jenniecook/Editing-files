<?php

/**
 * TGM Init Class
 */
include_once ('class-tgm-plugin-activation.php');

function musicflow_admin_register_required_plugins() {

	$plugins = array(
		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'WooCommerce',
			'slug' 		=> 'woocommerce',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Widget Importer Exporter',
			'slug' 		=> 'widget-importer-exporter',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'Visual Composer',
			'slug' 		=> 'js_composer',
			'source' 		=> get_stylesheet_directory() . '/plugins/js_composer.zip',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'MusicFlow Post Types',
			'slug' 		=> 'musicflow-posttypes',
			'source' 		=> get_stylesheet_directory() . '/plugins/musicflow-posttypes.zip',
			'required' 	=> true,
		),
	);

	$config = array(
		'domain'       		=> 'redux-framework',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		// 'parent_menu_slug' 	=> 'plugins.php', 				// Default parent menu slug
		'parent_slug' 	=> 'plugins.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'musicflow_admin_register_required_plugins' );