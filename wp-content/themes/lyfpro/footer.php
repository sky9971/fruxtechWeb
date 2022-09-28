<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.2
 */

$footer_widget_columns	= dsvy_footer_widget_columns(); // array
$widget_exists			= $footer_widget_columns[0];
$footer_columns			= $footer_widget_columns[1];
$footer_column			= $footer_widget_columns[2];
$footer_boxes_area = dsvy_get_base_option('footer-boxes-area');

?>
				<?php if( dsvy_check_sidebar() == true ){ ?>
					</div><!-- .row -->
				<?php } ?>
				</div><!-- #content -->
			</div><!-- .site-content-wrap -->
		<footer id="colophon" class="dsvy-footer-section site-footer <?php dsvy_footer_classes(); ?>">
			<?php if( $footer_boxes_area == true ) { ?>			
			<div class="dsvy-footer-section dsvy-footer-big-area-wrapper dsvy-bg-color-transparent">
				<div class="footer-wrap dsvy-footer-big-area">
					<div class="container">

						<div class="row align-items-center">
							<?php dsvy_footer_boxes_area(); ?>
						</div>

					</div>
				</div>
			</div>
			<?php } ?>
			<?php if( $widget_exists==true ) : ?>
			<div class="dsvy-footer-section footer-wrap dsvy-footer-widget-area <?php dsvy_footer_widget_classes(); ?>">
				<div class="container">
					<div class="row">
						<?php 
						$col = 1;
						foreach( $footer_columns as $column ){
							$class = ( $footer_column == '3-3-3-3' ) ? 'col-md-6 col-lg-3' : 'col-md-'.$column ;
							if ( is_active_sidebar( 'dsvy-footer-'.$col ) ) { ?>
								<div class="dsvy-footer-widget dsvy-footer-widget-col-<?php echo esc_attr($col); ?> <?php echo esc_attr($class); ?>">
									<?php dynamic_sidebar( 'dsvy-footer-'.$col ); ?>
								</div><!-- .dsvy-footer-widget -->
							<?php };
							$col++;
						} // end foreach
						?>
					</div><!-- .row -->
				</div>	
			</div>
			<?php endif; ?>
			<div class="dsvy-footer-section dsvy-footer-text-area <?php dsvy_footer_copyright_classes(); ?>">
				<div class="container">
					<div class="dsvy-footer-text-inner">

						<div class="row">
							<?php dsvy_footer_copyright_area(); ?>
						</div>
					</div>	

				</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<a href="#" class="scroll-to-top"><i class="dsvy-base-icon-up-open-big"></i></a>
<?php wp_footer(); ?>
</body>
</html>
