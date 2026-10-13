<?php
/**
 * Theme Name:        Ephpicman Starter
 * Theme URI:         https://github.com/ephpicman/Theme
 * Description:       A lightweight, accessible, and extensible starter theme for WordPress.
 * Version:           1.0.0
 * Requires at least: 6.3
 * Requires PHP:      8.0
 * Author:            Ephpicman
 * Author URI:        https://github.com/ephpicman
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:       ephpicman-starter
 * Domain Path:       /languages
 *
 * @package EphpicmanTheme
 */

defined( 'ABSPATH' ) || exit;

define( 'EPHPICMAN_THEME_FILE', __FILE__ );

require_once __DIR__ . '/epm/bootstrap.php';
require_once __DIR__ . '/src/Theme.php';

EpmLoader::register(
	'1.4.0',
	'EphpicmanTheme\\',
	__DIR__
);

$theme = EphpicmanTheme\Theme::get_instance();

add_action( 'after_switch_theme', array( $theme, 'activate' ) );
add_action( 'switch_theme', array( $theme, 'deactivate' ) );

add_action( 'init', array( $theme, 'init' ) );
