<?php
/**
 * Empty search/archive state.
 *
 * @package EphpicmanStarter
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="no-results not-found">
	<header class="page-header"><h1 class="page-title"><?php esc_html_e( 'Nothing found', 'ephpicman-starter' ); ?></h1></header>
	<div class="page-content">
		<p><?php esc_html_e( 'No content matched your request. Try a search.', 'ephpicman-starter' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
