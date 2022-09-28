<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.2
 */
ob_start();
dsvy_get_featured_data();
$featured = ob_get_contents();
ob_end_clean();
$class = array();
if( empty($featured) ){
	$class[] = 'dsvy-no-img';
}
if( !defined('LYFPRO_ADDON_VERSION') ){
	$class[] = 'dsvy-default-view';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<div class="dsvy-blog-classic">
		<?php if( defined('LYFPRO_ADDON_VERSION') ) : ?>

		<?php endif; ?>

		<div class="dsvy-featured-img-wrapper">					
			<div class="dsvy-meta-date-wrapper">					
					<span class="dsvy-day"><?php echo get_the_date( 'd' ); ?></span>
					<span ><?php echo get_the_date( 'M' ); ?></span>
			</div>
			<?php dsvy_get_featured_data(); ?>
		</div>
		<div class="dsvy-blog-classic-inner">
			<?php
			// Meta
			$meta_html = '';
			$meta_html .= dsvy_meta_date();
			$meta_html .= dsvy_meta_author();
			$meta_html .= dsvy_meta_category();
			$meta_html .= dsvy_meta_comment( true );
			if( get_post_format()!='status' && get_post_format()!='quote' && !is_single() ) : ?>

			<?php if( !empty($meta_html) ) : ?>
			<div class="dsvy-blog-meta dsvy-blog-meta-top">
				<?php echo dsvy_esc_kses($meta_html); ?>
			</div>
			<?php endif; ?>
			<h3 class="dsvy-post-title">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
			</h3>
			<?php endif; ?>

			<div class="dsvy-entry-content">
				<?php
				if( get_post_format()!='quote' ){
					if( is_single() ){
						/* translators: %s: Name of current post */
						the_content( sprintf(
							'',
							get_the_title()
						) );
					} else {
						$limit			= dsvy_get_base_option('blog-classic-limit');
						$limit_switch	= dsvy_get_base_option('blog-classic-limit-switch');
						if ( has_excerpt() ){
							the_excerpt();
							?>
							<div class="dsvy-read-more-link"><a href="<?php echo esc_url( get_permalink() ) ?>"><span><?php esc_html_e('Read More', 'lyfpro'); ?></span></a></div>
							<?php
						} else if( $limit>0 && $limit_switch=='1' ){
							$content = get_the_content('',FALSE,'');
							$content = wp_strip_all_tags($content);
							$content = strip_shortcodes($content);
							echo dsvy_esc_kses( wp_trim_words($content, $limit) );
							?>
							<div class="dsvy-read-more-link"><a href="<?php echo esc_url( get_permalink() ) ?>"><span><?php esc_html_e('Read More', 'lyfpro'); ?></span></a></div>
							<?php
						} else {
							/* translators: %s: Name of current post */
							the_content( sprintf(
								'',
								get_the_title()
							) );
							if( !is_single() ){
								global $post;
								if( strpos( $post->post_content, '<!--more-->' ) ) {
									?>
									<div class="dsvy-read-more-link">
										<a href="<?php echo esc_url( get_permalink() ) ?>"><span><?php esc_html_e('Read More','lyfpro') ?></span></a>
									</div>
									<?php
								}
							}
						}
						?>
						<?php
					}
				}
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'lyfpro' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->

			<?php get_template_part( 'theme-parts/post', 'bottom-meta' ); ?>

		</div>

	</div>

	<?php if( is_single() ) : ?>
		<?php get_template_part( 'theme-parts/post', 'author-info' ); ?>
		<?php dsvy_related_post() ?>
	<?php endif; ?>
</article><!-- #post-## -->