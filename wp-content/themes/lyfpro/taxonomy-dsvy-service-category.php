<?php
/**
 * The template for displaying category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<div id="primary" class="content-area <?php if( dsvy_check_sidebar() ) { ?>col-md-9 col-lg-9<?php } ?>">
	<main id="main" class="site-main">
		<?php
		// Term Description
		$desc = term_description();
		if( !empty($desc) ){
			?>
			<div class="dsvy-term-desc">
				<?php echo do_shortcode( $desc ); ?>
			</div>
			<?php
		}
		?>
		<?php
		$settings = array();
		$settings['style']	= dsvy_get_base_option('service-cat-style');
		$settings['style']	= str_replace('style-','', $settings['style'] );
		$settings['column']	= dsvy_get_base_option('service-cat-column');
		$settings['show']	= dsvy_get_base_option('service-cat-count');
		// Starting container
		echo dsvy_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'service',
			'data'		=> $settings
		) );
		?>
		<?php
		if ( have_posts() ) :
			$style		= dsvy_get_base_option('service-cat-style');
			$column		= dsvy_get_base_option('service-cat-column');
			$style		= str_replace('style-','', $style );
			?>
			<div class="dsvy-element-cat-wrapper row multi-columns-row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				// Icon
				$icon_html = '';
				$icon_lib = get_post_meta( get_the_ID(), 'dsvy-service-icon-library', true );
				$icon_class = get_post_meta( get_the_ID(), 'dsvy-service-icon-'.$icon_lib, true );
				if( !empty($icon_class) ){
					$icon_html = '<i class="'.esc_attr($icon_class).'"></i>';
				}
				$more_text	= esc_attr__('More Details','lyfpro'); // Show
				if( file_exists( get_template_directory() . '/theme-parts/service/service-style-'.esc_attr($style).'.php' ) ){
					echo dsvy_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> 'service',
					) );
					// calling template
					include( get_template_directory() . '/theme-parts/service/service-style-'.esc_attr($style).'.php' );
					echo dsvy_element_block_container( array(
						'position'	=> 'end',
					) );
				} else {
					echo '<!-- Template file not found -->';
				}
				?>
				<?php
			endwhile;
			?>
			<?php
			// Ending wrapper of the whole arear
			echo dsvy_element_container( array(
				'position'	=> 'end',
				'cpt'		=> 'service',
				'data'		=> $settings
			) );
			?>
			<?php
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			</div><!-- .dsvy-element-cat-wrapper row multi-columns-row -->
			<?php
			// Pagination
			dsvy_pagination();
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer();
