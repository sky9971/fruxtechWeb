<?php
/**
 * Template part for displaying WooCommerce Single product view
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.2
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="dsvy-wc-single-classic">
		<?php dsvy_get_featured_data(); ?>
		<div class="dsvy-wc-single-classic-inner">			
			<div class="dsvy-entry-content">
				<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					'',
					get_the_title()
				) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->