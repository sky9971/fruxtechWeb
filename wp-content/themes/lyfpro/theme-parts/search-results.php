<?php
/**
 * Template part for displaying posts on search results
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.2
 */
if( get_post_format()=='post' && get_post_format()=='quote' && get_post_format()=='link' ){
	// Bypassing Quote and Link post formats
} else {
	?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
	<div class="dsvy-search-results">
		<?php if( has_post_thumbnail() ) : ?>
		<div class="dsvy-search-results-inner dsvy-search-results-left">
			<?php dsvy_get_featured_data( array( 'featured_img_only' => true, 'size' => 'dsvy-img-300x300' )  ); ?>
			<?php if( is_singular('post') ) : ?>
			<div class="dsvy-blog-meta dsvy-blog-meta-top">
				<?php get_template_part( 'theme-parts/post', 'top-meta' ); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<div class="dsvy-search-results-right">
			<h3 class="dsvy-post-title">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
			</h3>
			<div class="dsvy-entry-content">
				<?php
				$limit			= dsvy_get_base_option('search-results-text-limit');
				$limit_switch	= dsvy_get_base_option('blog-classic-limit-switch');
				if ( has_excerpt() ){
					the_excerpt();
				} else if( $limit>0 /* && $limit_switch=='1' */ ){
					$content = get_the_content('',FALSE,'');
					$content = do_shortcode($content);
					$content = wp_strip_all_tags($content);
					$content = strip_shortcodes($content);
					echo dsvy_esc_kses( wp_trim_words($content, $limit) );
				} else { 
					/* translators: %s: Name of current post */
					the_content( sprintf(
						'',
						get_the_title()
					) );
				}
				?>
				<div class="dsvy-read-more-link"><a href="<?php echo esc_url( get_permalink() ) ?>"><span><?php esc_html_e('Read More', 'lyfpro'); ?></span></a></div>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->
<?php
}