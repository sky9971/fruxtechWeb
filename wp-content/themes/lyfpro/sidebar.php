<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.0
 */
?>
<?php
$sidebar	= 'dsvy-sidebar-post';
$aria_label	= esc_attr__( 'Blog Sidebar', 'lyfpro' );
if( is_page() ){
	// page sidebar
	$sidebar	= 'dsvy-sidebar-page';
	$aria_label	= esc_attr__( 'Page Sidebar', 'lyfpro' );
	if( function_exists('is_woocommerce') && is_woocommerce() ){
		$sidebar	= 'dsvy-sidebar-wc-shop';
		$aria_label	= esc_attr__( 'WooCommerce Sidebar', 'lyfpro' );
	}
} else if( is_search() ){
	$sidebar	= 'dsvy-sidebar-search';
	$aria_label	= esc_attr__( 'Search Results Sidebar', 'lyfpro' );
} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
	$sidebar	= 'dsvy-sidebar-wc-shop';
	$aria_label	= esc_attr__( 'WooCommerce Sidebar', 'lyfpro' );
} else if( function_exists('is_product') && is_product() ){
	$sidebar	= 'dsvy-sidebar-wc-single';
	$aria_label	= esc_attr__( 'WooCommerce Sidebar', 'lyfpro' );
} else if( is_singular('dsvy-portfolio') ){
	$sidebar		= 'dsvy-sidebar-portfolio';
	$aria_label		= esc_attr__( 'Portfolio Sidebar', 'lyfpro' );
} else if( is_tax('dsvy-portfolio-category') ){
	$sidebar		= 'dsvy-sidebar-portfolio-cat';
	$aria_label		= esc_attr__( 'Portfolio Category Sidebar', 'lyfpro' );
} else if( is_singular('dsvy-service') ){
	$sidebar		= 'dsvy-sidebar-service';
	$aria_label		= esc_attr__( 'Service Sidebar', 'lyfpro' );
} else if( is_tax('dsvy-service-category') ){
	$sidebar		= 'dsvy-sidebar-service-cat';
	$aria_label		= esc_attr__( 'Service Category Sidebar', 'lyfpro' );
} else if( is_singular('dsvy-team-member') ){
	$sidebar		= 'dsvy-sidebar-team';
	$aria_label		= esc_attr__( 'Team Member Sidebar', 'lyfpro' );
} else if( is_tax('dsvy-team-group') ){
	$sidebar		= 'dsvy-sidebar-team-group';
	$aria_label		= esc_attr__( 'Team Group Sidebar', 'lyfpro' );
}

// check if content exists for the sidebar
$sidebar_content = '';
ob_start();
dynamic_sidebar( $sidebar );
$sidebar_content = ob_get_clean();

?>
<?php if ( is_active_sidebar( $sidebar ) && dsvy_check_sidebar()==true && !empty($sidebar_content) ) : ?>
<aside id="secondary" class="widget-area designervily-sidebar col-md-3 col-lg-3" aria-label="<?php echo esc_attr( $aria_label ); ?>">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->
<?php endif; ?>