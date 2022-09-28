<?php
if ( ! class_exists( 'Merlin' ) ) {
	return;
}
function dsvy_merlin_local_import_files() {
	return array(
		/*
		1. Nutrition
		2. Diet
		3. Organic Food
		4. Organic Farm
		*/
		array(  // 1. Demo 1
			'import_file_name'             => esc_attr__('Demo Content - 1st Demo', 'lyfpro'),
			'local_import_file'            => WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/content.xml',
			'local_import_widget_file'     => WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/widgets.wie',
			'local_import_customizer_file' => WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/customizer-demo-1.dat',
			'import_preview_image_url'     => get_template_directory_uri() . '/includes/images/demo-demo-1.jpg',
			'import_notice'                => esc_attr__( 'This will setup your site same as our Demo 1 site.', 'lyfpro' ),
			'preview_url'                  => esc_url('http://lyfpro-demo.designervily.com/demo1/'),
		),
		array(  // 2. Demo 2
			'import_file_name'             => esc_attr__('Demo Content - 2nd Demo', 'lyfpro'),
			'local_import_file'            => WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/content.xml',
			'local_import_widget_file'     => WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/widgets.wie',
			'local_import_customizer_file' => WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/customizer-demo-2.dat',
			'import_preview_image_url'     => get_template_directory_uri() . '/includes/images/demo-demo-2.jpg',
			'import_notice'                => esc_attr__( 'This will setup your site same as our Demo 2 site.', 'lyfpro' ),
			'preview_url'                  => esc_url('http://lyfpro-demo.designervily.com/demo2/'),
		),
		array(  // 3. Demo 3
			'import_file_name'             => esc_attr__('Demo Content - 3rd Demo', 'lyfpro'),
			'local_import_file'            => WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/content.xml',
			'local_import_widget_file'     => WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/widgets.wie',
			'local_import_customizer_file' => WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/customizer-demo-3.dat',
			'import_preview_image_url'     => get_template_directory_uri() . '/includes/images/demo-demo-3.jpg',
			'import_notice'                => esc_attr__( 'This will setup your site same as our Demo 3 site.', 'lyfpro' ),
			'preview_url'                  => esc_url('http://lyfpro-demo.designervily.com/demo3/'),
		),
	);
}
add_filter( 'merlin_import_files', 'dsvy_merlin_local_import_files' );

/**
 * Execute custom code after the whole import has finished.
 */
function dsvy_merlin_after_import_setup( $selected_import_index ) {
	$main_menu   = get_term_by( 'name', esc_attr('Main Menu'), 'nav_menu' );
	$footer_menu = get_term_by( 'name', esc_attr('Footer Menu'), 'nav_menu' );
	set_theme_mod(
		'nav_menu_locations', array(
			'designervily-top'		=> $main_menu->term_id,
			'designervily-footer'	=> $footer_menu->term_id,
		)
	);
	$blog_page_id  = get_page_by_title( 'Blog Classic' );
	if( !empty($blog_page_id->ID) ){ update_option( 'page_for_posts', $blog_page_id->ID ); }
	if( $selected_import_index == '0' ){        // 1. Demo 1
		$front_page_id = get_page_by_title( 'Homepage 1' );
		update_option( 'show_on_front', 'page' );
		if( !empty($front_page_id->ID) ){ update_option( 'page_on_front', $front_page_id->ID ); }
	} else if( $selected_import_index == '1' ){ // 2. Demo 2
		$front_page_id = get_page_by_title( 'Homepage 2' );
		update_option( 'show_on_front', 'page' );
		if( !empty($front_page_id->ID) ){ update_option( 'page_on_front', $front_page_id->ID ); }
	} else if( $selected_import_index == '2' ){ // 3. Demo 3
		$front_page_id = get_page_by_title( 'Homepage 3' );
		update_option( 'show_on_front', 'page' );
		if( !empty($front_page_id->ID) ){ update_option( 'page_on_front', $front_page_id->ID ); }
	}
	// Slider Revolution - Importing Sliders
	if ( class_exists( 'RevSlider' ) ){
		$slider_array	= array(
			WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/sliders/slider-demo-1.zip',
			WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/sliders/slider-demo-2.zip',
			WP_PLUGIN_DIR . '/lyfpro-addons/demo-content/sliders/slider-demo-3.zip',
		);
		$slider			= new RevSlider();
		foreach($slider_array as $filepath){
			if( file_exists($filepath) ){
				$result = $slider->importSliderFromPost(true,true,$filepath);  
			}
		}

		// Reset default values for some required options
		$set_values = array(
			'min'				=> true,
			'dynamic-css-file'	=> true,
			'load-merged-css'	=> true
		);
		foreach($set_values as $key=>$val){
			set_theme_mod( $key, $val );
		}

	}
	// All done.. disable Merlin wizard
	update_option( 'dsvy-merlin-all-done', 'yes' );
}
add_action( 'merlin_after_all_import', 'dsvy_merlin_after_import_setup' );
/**
 * Remove Child theme from Merlin Setup
 */
add_action( 'lyfpro_merlin_steps', 'dsvy_merlin_steps',1 );
if( !function_exists('dsvy_merlin_steps') ){
function dsvy_merlin_steps( $steps ){
	unset($steps['child']);
	return $steps;
}
}
/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(
	$config = array(
		'base_path'            => get_template_directory(), // Location / directory where Merlin WP is placed in your theme.
		'base_url'             => get_template_directory_uri(),
		'directory'            => '/includes/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'lyfpro-wizard', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => esc_url('https://codex.wordpress.org/child_themes'), // URL for the 'child-action-link'.
		'dev_mode'             => true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' =>  home_url( '/' ), // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Lyfpro Theme Setup', 'lyfpro' ),
		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'lyfpro' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'lyfpro' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'lyfpro' ),
		'btn-skip'                 => esc_html__( 'Skip', 'lyfpro' ),
		'btn-next'                 => esc_html__( 'Next', 'lyfpro' ),
		'btn-start'                => esc_html__( 'Start', 'lyfpro' ),
		'btn-no'                   => esc_html__( 'Cancel', 'lyfpro' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'lyfpro' ),
		'btn-child-install'        => esc_html__( 'Install', 'lyfpro' ),
		'btn-content-install'      => esc_html__( 'Install', 'lyfpro' ),
		'btn-import'               => esc_html__( 'Import', 'lyfpro' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'lyfpro' ),
		'btn-license-skip'         => esc_html__( 'Later', 'lyfpro' ),
		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'lyfpro' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'lyfpro' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'lyfpro' ),
		'license-label'            => esc_html__( 'License key', 'lyfpro' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'lyfpro' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'lyfpro' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'lyfpro' ),
		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'lyfpro' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'lyfpro' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'lyfpro' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'lyfpro' ),
		'child-header'             => esc_html__( 'Install Child Theme', 'lyfpro' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'lyfpro' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'lyfpro' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'lyfpro' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'lyfpro' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'lyfpro' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'lyfpro' ),
		'plugins-header'           => esc_html__( 'Install Plugins', 'lyfpro' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'lyfpro' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'lyfpro' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'lyfpro' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'lyfpro' ),
		'import-header'            => esc_html__( 'Import Content', 'lyfpro' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'lyfpro' ),
		'import-action-link'       => esc_html__( 'Advanced', 'lyfpro' ),
		'ready-header'             => esc_html__( 'All done. Have fun!', 'lyfpro' ),
		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'lyfpro' ),
		'ready-action-link'        => esc_html__( 'More Links', 'lyfpro' ),
		'ready-big-button'         => esc_html__( 'View your website', 'lyfpro' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url('https://lyfpro.designervily.com/docs/'), esc_html__( 'Theme Documenation', 'lyfpro' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url('https://support.designervily.com/'), esc_html__( 'Get Theme Support', 'lyfpro' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'lyfpro' ) ),
	)
);
