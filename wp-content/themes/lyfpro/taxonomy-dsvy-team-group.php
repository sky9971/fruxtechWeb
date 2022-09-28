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
		$atts = array();
		$atts['style']	= dsvy_get_base_option('team-group-style');
		$atts['style']	= str_replace('style-','', $atts['style'] );
		$atts['column']	= dsvy_get_base_option('team-group-column');
		$atts['show']	= dsvy_get_base_option('team-group-count');
		// Starting container
		echo dsvy_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'team-member',
			'data'		=> $atts
		) );
		?>
		<?php
		if ( have_posts() ) :
			$style		= dsvy_get_base_option('team-group-style');
			$column		= dsvy_get_base_option('team-group-column');
			$style		= str_replace('style-','', $style );
			?>
			<div class="dsvy-element-cat-wrapper row multi-columns-row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				if( file_exists( get_template_directory() . '/theme-parts/team/team-style-'.esc_attr($style).'.php' ) ){
					echo dsvy_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> 'team-member',
					) );
					// calling template
					include( get_template_directory() . '/theme-parts/team/team-style-'.esc_attr($style).'.php' );
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
				'cpt'		=> 'team-member',
				'data'		=> $atts
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
