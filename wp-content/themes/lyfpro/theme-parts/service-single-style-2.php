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
$style		= dsvy_get_base_option('service-single-style');
$single_style	= get_post_meta( get_the_ID(), 'dsvy-service-single-view', true );
if( !empty($single_style) ){ $style = $single_style; }
$class_list	= 'dsvy-service-single-style-'.$style;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="dsvy-service-single">

		<?php
		// Short Description
		$short_desc = get_post_meta( get_the_ID(), 'dsvy-short-description', true );
		if( !empty($short_desc) ){
			?>
			<div class="dsvy-short-description">
			<h4><?php esc_attr_e('About the project','lyfpro') ?></h4>
				<?php echo do_shortcode($short_desc); ?>
			</div>
			<?php
		}
		?>
		<div class="dsvy-entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				'',
				get_the_title()
			) );
			?>
		</div><!-- .entry-content -->
		<?php
		// Prev Next Post Link
		$cpt_name = dsvy_get_base_option('service-cpt-singular-title');
		the_post_navigation( array(
			'prev_text' => dsvy_esc_kses( '<span class="dsvy-service-nav-icon"><i class="dsvy-base-icon-left-open"></i></span> <span class="dsvy-service-nav-wrapper"><span class="dsvy-service-nav-head">' . sprintf( esc_attr__('Previous %1$s', 'lyfpro') , $cpt_name ) . '</span>' ) . dsvy_esc_kses( '<span class="dsvy-service-nav nav-title">%title</span> </span>' ),
			'next_text' => dsvy_esc_kses( '<span class="dsvy-service-nav-wrapper"><span class="dsvy-service-nav-head">' . sprintf( esc_attr__('Next %1$s', 'lyfpro') , $cpt_name ) . '</span>' ) . dsvy_esc_kses( '<span class="dsvy-service-nav nav-title">%title</span> </span> <span class="dsvy-service-nav-icon"><i class="dsvy-base-icon-right-open"></i></span>' ),
		) );
		?>
	</div>
</article><!-- #post-## -->
<?php dsvy_related_service() ?>
<?php dsvy_edit_link(); ?>
