<?php
/**
 * Default post card.
 *
 * @package EphpicmanStarter
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="entry-meta"><?php ephpicman_starter_posted_on(); ?></div>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-card__thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"><?php the_post_thumbnail( 'large' ); ?></a>
	<?php endif; ?>
	<div class="entry-summary"><?php the_excerpt(); ?></div>
</article>
