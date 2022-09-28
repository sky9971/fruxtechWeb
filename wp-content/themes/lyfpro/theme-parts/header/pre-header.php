<?php
/**
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.0
 */
$preheader_enable = dsvy_get_base_option('preheader-enable');
if( $preheader_enable==1 ) :
	?>
	<div class="dsvy-pre-header-wrapper <?php dsvy_preheader_class(); ?>">
		<div class="container">
			<div class="d-flex justify-content-between">
				<?php
				$preheader_left = dsvy_get_base_option('preheader-left');
				if( !empty($preheader_left) ){ ?>
					<div class="dsvy-pre-header-left"><?php echo dsvy_esc_kses( do_shortcode($preheader_left) ); ?></div><!-- .dsvy-pre-header-left -->
				<?php } ?>
				<?php
				$preheader_right = dsvy_get_base_option('preheader-right');
				$preheader_search = dsvy_get_base_option('preheader-search');
				if( !empty($preheader_right) || $preheader_search==true ){ ?>
					<div class="dsvy-pre-header-right">

						<?php if( !empty($preheader_right) ) { echo dsvy_esc_kses( do_shortcode($preheader_right) ); } ?>
						<?php if( $preheader_search==true ) { echo dsvy_esc_kses( '<div class="dsvy-header-search-btn"><a href="#"><i class="dsvy-base-icon-search"></i></a></div>' ); } ?>

					</div><!-- .dsvy-pre-header-right -->
				<?php } ?>
			</div><!-- .justify-content-between -->
		</div><!-- .container -->
	</div><!-- .dsvy-pre-header-wrapper -->
<?php endif; ?>