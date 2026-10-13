<?php
/**
 * The footer.
 *
 * @package EphpicmanStarter
 */

defined( 'ABSPATH' ) || exit;
?>
<footer class="site-footer">
	<div class="site-footer__inner">
		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer menu', 'ephpicman-starter' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'fallback_cb' => false ) ); ?>
		</nav>
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
