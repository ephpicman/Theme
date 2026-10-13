<?php
/**
 * Theme bootstrap.
 *
 * @package EphpicmanStarter
 */

defined( 'ABSPATH' ) || exit;

define( 'EPHICMAN_STARTER_VERSION', '1.0.0' );
define( 'EPHICMAN_STARTER_DIR', get_template_directory() );
define( 'EPHICMAN_STARTER_URI', get_template_directory_uri() );

require_once EPHICMAN_STARTER_DIR . '/inc/theme-setup.php';
require_once EPHICMAN_STARTER_DIR . '/inc/enqueue-assets.php';
require_once EPHICMAN_STARTER_DIR . '/inc/template-tags.php';
