<?php
/**
 * Reusable template tags.
 *
 * @package EphpicmanStarter
 */

defined( 'ABSPATH' ) || exit;

function ephpicman_starter_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	printf(
		'<span class="posted-on">%s</span>',
		wp_kses(
			sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() )
			),
			array( 'time' => array( 'class' => true, 'datetime' => true ) )
		)
	);
}
