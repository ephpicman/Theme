<?php
/**
 * Enqueue theme assets.
 *
 * @package EphpicmanStarter
 */

defined( 'ABSPATH' ) || exit;

function ephpicman_starter_enqueue_assets() {
	wp_enqueue_style( 'ephpicman-starter', EPHICMAN_STARTER_URI . '/assets/css/main.css', array(), EPHICMAN_STARTER_VERSION );
	wp_enqueue_script( 'ephpicman-starter', EPHICMAN_STARTER_URI . '/assets/js/main.js', array(), EPHICMAN_STARTER_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'ephpicman_starter_enqueue_assets' );
