<?php
/**
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.0
 */
?>
<?php get_template_part( 'theme-parts/header/pre-header',	dsvy_get_base_option('header-style') ); ?>
<div class="dsvy-header-height-wrapper" style="min-height:<?php echo dsvy_get_base_option('header-height'); ?>px;">
	<div class="<?php dsvy_header_class(); ?> <?php dsvy_header_bg_class(); ?> <?php dsvy_sticky_class(); ?>">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<div class="dsvy-logo-menuarea">
					<div class="site-branding dsvy-logo-area">
						<div class="wrap">
							<?php echo dsvy_logo(); ?><!-- Logo area -->
						</div><!-- .wrap -->
					</div><!-- .site-branding -->
					<!-- Top Navigation Menu -->
					<div class="navigation-top">
						<div class="dsvy-mobile-search">
							<?php dsvy_header_search(); ?>
						</div>
						<button id="menu-toggle" class="nav-menu-toggle">
							<i class="dsvy-base-icon-menu-1"></i>
						</button>
						<div class="wrap">
							<nav id="site-navigation" class="main-navigation dsvy-navbar <?php dsvy_nav_class(); ?>" aria-label="<?php esc_attr_e( 'Top Menu', 'lyfpro' ); ?>">
								<?php wp_nav_menu( array(
									'theme_location' => 'designervily-top',
									'menu_id'        => 'dsvy-top-menu',
									'menu_class'     => 'menu',
								) ); ?>
							</nav><!-- #site-navigation -->
						</div><!-- .wrap -->
					</div><!-- .navigation-top -->
				</div>
				<div class="dsvy-right-box">
					<?php dsvy_cart_icon(); ?>
					<?php dsvy_header_search(); ?>
					<?php dsvy_header_button(); ?>
				</div>
			</div><!-- .justify-content-between -->
		</div><!-- .container -->
	</div><!-- .dsvy-header-wrapper -->

	<?php if( shortcode_exists('dsvy-social-links') ){
		$social = do_shortcode('[dsvy-social-links]');
		echo dsvy_esc_kses($social);
	} ?>	

</div><!-- .dsvy-header-height-wrapper -->
