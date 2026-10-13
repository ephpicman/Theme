<?php
/**
 * Main template fallback.
 *
 * @package EphpicmanStarter
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="site-main container">
	<?php if ( have_posts() ) : ?>
		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header class="page-header"><h1 class="page-title"><?php single_post_title(); ?></h1></header>
		<?php endif; ?>
		<div class="post-list">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content' ); ?>
			<?php endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
