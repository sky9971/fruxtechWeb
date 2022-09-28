<?php
/**
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.0
 */
?>
<div class="<?php dsvy_header_class(); ?>">
	<?php get_template_part( 'theme-parts/header/pre-header',	dsvy_get_base_option('header-style') ); ?>
	<div class="dsvy-header-top-area <?php dsvy_header_class(); ?> <?php dsvy_header_bg_class(); ?> ">
		<div class="container">
			<div class="d-flex align-items-center">
				<div class="site-branding dsvy-logo-area">
					<div class="wrap"><?php echo dsvy_logo(); ?></div><!-- .wrap -->
				</div><!-- .site-branding -->
				<div class="dsvy-header-info ml-auto">
					<div class="dsvy-header-info-inner">
						<?php dsvy_header_box_contents( array( 'icon'=>'yes' ) ); ?>
					</div>
				</div>
				<div class="dsvy-mobile-search">
					<?php dsvy_header_search(); ?>
				</div>
				<button id="menu-toggle" class="nav-menu-toggle">
					<i class="dsvy-base-icon-menu"></i>
				</button>
			</div>
		</div>
		<div class="dsvy-header-menu">
			<div class="dsvy-header-menu-area-wrapper">
				<div class="dsvy-header-menu-area <?php dsvy_sticky_class(); ?> dsvy-bg-color-<?php echo dsvy_get_base_option('menu-bgcolor'); ?>">	
					<div class="container">											
						<div class="dsvy-header-menu-area-inner d-flex align-items-center">
							<?php dsvy_header_button(); ?>	
							<?php if ( has_nav_menu( 'designervily-top' ) ) : ?>
							<div class="navigation-top-wrapper">
								<div class="navigation-top">
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
								<?php endif; ?>
								<div class="dsvy-right-box ml-auto">								
									<?php dsvy_cart_icon(); ?>
									<?php dsvy_header_search(); ?>							
								</div>
							</div>
						</div>
					</div><!-- .dsvy-header-menu-area -->
				</div>
			</div><!-- .dsvy-header-menu-area-wrapper -->
		</div>
	</div>
</div><!-- .dsvy-header-wrapper -->