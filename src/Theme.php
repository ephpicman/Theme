<?php
/**
 * Main theme lifecycle class.
 *
 * @package EphpicmanTheme
 */

namespace EphpicmanTheme;

defined( 'ABSPATH' ) || exit;

/**
 * Handles theme initialization and lifecycle events.
 */
final class Theme {

	/**
	 * The single instance of this class.
	 *
	 * @var Theme|null
	 */
	private static $instance = null;

	/**
	 * Retrieve the singleton instance.
	 *
	 * @return Theme
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Prevent direct construction.
	 */
	private function __construct() {}

	/**
	 * Initialize the theme.
	 *
	 * @return void
	 */
	public function init() {
		// Temporary translation-pipeline test string.
		__( 'Hello', 'ephpicman-starter' );

		load_theme_textdomain(
			'ephpicman-starter',
			get_template_directory() . '/languages'
		);
	}

	/**
	 * Run activation routines.
	 *
	 * @return void
	 */
	public function activate() {
		// Add activation tasks here when needed.
	}

	/**
	 * Run deactivation routines.
	 *
	 * @return void
	 */
	public function deactivate() {
		// Add temporary cleanup here when needed.
	}
}
