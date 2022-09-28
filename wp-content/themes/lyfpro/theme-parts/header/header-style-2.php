<?php
/**
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.0
 */
$header_phone = dsvy_get_base_option('header-phone');
?>
<div class="dsvy-header-overlay">
	<div class="dsvy-header-height-wrapper">
		<div class="dsvy-header-inner <?php dsvy_header_class(); ?> <?php dsvy_header_bg_class(); ?> <?php dsvy_sticky_class(); ?>">
			<?php get_template_part( 'theme-parts/header/pre-header',	dsvy_get_base_option('header-style') ); ?>
				<div class="d-flex justify-content-between align-items-center dsvy-header-content">
					<div class="dsvy-logo-menuarea">
						<div class="site-branding dsvy-logo-area">
							<div class="wrap">
								<!-- Logo area -->
								<?php echo dsvy_logo(); ?>
							</div><!-- .wrap -->
						</div><!-- .site-branding -->						
						<!-- Top Navigation Menu -->
						<div class="navigation-top">
							<button id="menu-toggle" class="nav-menu-toggle">								
								<i class="dsvy-base-icon-menu"></i>						
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
						<?php if( shortcode_exists('dsvy-social-links') ){
							$social = do_shortcode('[dsvy-social-links]');
							echo dsvy_esc_kses($social);
						} ?>	
						<?php dsvy_cart_icon(); ?>
						<?php dsvy_header_search(); ?>
						<?php dsvy_header_button(); ?>
					</div>
				</div><!-- .justify-content-between -->
		</div><!-- .dsvy-header-inner -->
	</div><!-- .dsvy-header-height-wrapper -->
</div>
