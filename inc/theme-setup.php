<?php
/**
 * Theme setup and support declarations.
 *
 * @package EphpicmanStarter
 */

defined( 'ABSPATH' ) || exit;

function ephpicman_starter_setup() {
	load_theme_textdomain( 'ephpicman-starter', EPHICMAN_STARTER_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array( 'height' => 100, 'width' => 300, 'flex-height' => true, 'flex-width' => true )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'ephpicman-starter' ),
			'footer'  => __( 'Footer Menu', 'ephpicman-starter' ),
		)
	);
}
add_action( 'after_setup_theme', 'ephpicman_starter_setup' );
