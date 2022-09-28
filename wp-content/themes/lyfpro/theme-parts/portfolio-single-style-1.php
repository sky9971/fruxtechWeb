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
// Class list
$style			= dsvy_get_base_option('portfolio-single-style');
$single_style	= get_post_meta( get_the_ID(), 'dsvy-portfolio-single-view', true );
if( !empty($single_style) ){ $style = $single_style; }
$class_list		= 'dsvy-portfolio-single-style-'.$style;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="dsvy-portfolio-single">

		<div class="dsvy-single-project-content-wrapper">
			<?php dsvy_get_featured_data( array( 'featured_img_only' => false, 'size' => 'full' ) ); ?>
			<div  class="dsvy-single-project-details-list">
				<?php dsvy_portfolio_details_list(); ?>	
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">				
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
		<?php
		// Prev Next Post Link
		$cpt_name = dsvy_get_base_option('portfolio-cpt-singular-title');
		the_post_navigation( array(
			'prev_text' => dsvy_esc_kses( '<span class="dsvy-portfolio-nav-icon"><i class="dsvy-base-icon-left-open"></i></span> <span class="dsvy-portfolio-nav-wrapper"><span class="dsvy-portfolio-nav-head">' . sprintf( esc_attr__('Previous %1$s', 'lyfpro') , $cpt_name ) . '</span>' ) . dsvy_esc_kses( '<span class="dsvy-portfolio-nav nav-title">%title</span> </span>' ),
			'next_text' => dsvy_esc_kses( '<span class="dsvy-portfolio-nav-wrapper"><span class="dsvy-portfolio-nav-head">' . sprintf( esc_attr__('Next %1$s', 'lyfpro') , $cpt_name ) . '</span>' ) . dsvy_esc_kses( '<span class="dsvy-portfolio-nav nav-title">%title</span> </span> <span class="dsvy-portfolio-nav-icon"><i class="dsvy-base-icon-right-open"></i></span>' ),
		) );
		?>
	</div>
</article><!-- #post-## -->
<?php dsvy_related_portfolio(); ?>
<?php dsvy_edit_link(); ?>