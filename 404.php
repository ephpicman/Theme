<?php
/**
 * Not found template.
 *
 * @package EphpicmanStarter
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="primary" class="site-main container">
	<section class="error-404 not-found">
		<header class="page-header"><h1 class="page-title"><?php esc_html_e( 'Page not found', 'ephpicman-starter' ); ?></h1></header>
		<div class="page-content">
			<p><?php esc_html_e( 'The page you requested could not be found. Try searching for it.', 'ephpicman-starter' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>
