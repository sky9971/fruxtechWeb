<?php
/**
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.0
 */
$titlebar_enable = dsvy_get_base_option('titlebar-enable');
if( is_page() || is_singular() ){
	$post_meta = get_post_meta( get_the_ID(), 'dsvy-titlebar-hide', true );
	if( $post_meta=='1' ){
		$titlebar_enable = 0;
	}
}
if( $titlebar_enable==1 ) :
	?>
	<div class="dsvy-title-bar-wrapper <?php dsvy_titlebar_class(); ?>">
		<div class="container">
			<div class="dsvy-title-bar-content">
				<div class="dsvy-title-bar-content-inner">
					<?php echo dsvy_titlebar_headings(); ?>
					<?php echo dsvy_titlebar_breadcrumb(); ?>
				</div>
			</div><!-- .dsvy-title-bar-content -->
		</div><!-- .container -->
	</div><!-- .dsvy-title-bar-wrapper -->
<?php endif; ?>