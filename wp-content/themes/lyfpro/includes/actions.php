<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if( !function_exists('dsvy_widgets_init_20') ){
function dsvy_widgets_init_20() {
	register_sidebar( array(
		'name'          => esc_attr__( 'Blog Sidebar', 'lyfpro' ),
		'id'            => 'dsvy-sidebar-post',
		'description'   => esc_attr__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'lyfpro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Page Sidebar', 'lyfpro' ),
		'id'            => 'dsvy-sidebar-page',
		'description'   => esc_attr__( 'Add widgets here to appear in your sidebar on pages.', 'lyfpro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
}
add_action( 'widgets_init', 'dsvy_widgets_init_20', 20 );
if( !function_exists('dsvy_widgets_init_22') ){
function dsvy_widgets_init_22() {
	register_sidebar( array(
		'name'          => esc_attr__( 'Search Results Sidebar', 'lyfpro' ),
		'id'            => 'dsvy-sidebar-search',
		'description'   => esc_attr__( 'Add widgets here to appear on search result pages.', 'lyfpro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Footer Row - 1st Column', 'lyfpro' ),
		'id'            => 'dsvy-footer-1',
		'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'lyfpro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Footer Row - 2nd Column', 'lyfpro' ),
		'id'            => 'dsvy-footer-2',
		'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'lyfpro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Footer Row - 3rd Column', 'lyfpro' ),
		'id'            => 'dsvy-footer-3',
		'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'lyfpro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Footer Row - 4th Column', 'lyfpro' ),
		'id'            => 'dsvy-footer-4',
		'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'lyfpro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
}
add_action( 'widgets_init', 'dsvy_widgets_init_22', 22 );

/**
 * Customizer icon picker
 */
if( !function_exists('dsvy_lyfpro_addons_configure_customizer') ){
function dsvy_lyfpro_addons_configure_customizer(){
	if( class_exists('Kirki') ){
		/** Kirki icon picker **/
		include( get_template_directory() . '/includes/customizer/designervily-icon-picker/designervily-icon-picker.php' );
	}
}
}
add_action( 'init', 'dsvy_lyfpro_addons_configure_customizer' );

/**
 *  Disable Legacy mode
 */
if( !function_exists('dsvy_elementor_set_legacy_mode') ){
function dsvy_elementor_set_legacy_mode(){
	$optimized_dom_output = get_option( 'elementor_optimized_dom_output' );
	if( $optimized_dom_output!='active' ){
		update_option( 'elementor_experiment-e_dom_optimization', 'active' );
	}
}
}
add_action( 'init', 'dsvy_elementor_set_legacy_mode' );

/**
 *  Customizer options
 */
if( !function_exists('dsvy_configure_customizer') ){
function dsvy_configure_customizer(){
	if( class_exists('Kirki') ){
		include( get_template_directory() . '/includes/kirki-config.php' );
	}
}
}
add_action( 'init', 'dsvy_configure_customizer', 99 );

/**
 *  Categories Widget - Wrap Post count in a span
 */
add_filter('wp_list_categories', 'dsvy_cat_count_span');
if( !function_exists('dsvy_cat_count_span') ){
function dsvy_cat_count_span($links) {
	if(strpos($links, '<span class="count">') !== false){
		// WooComerce call
		$links = str_replace('<span class="count">(', '<span class="count">', $links);
		$links = str_replace(')</span>', '</span>', $links);
	} else {
		$links = str_replace('</a> (', '</a> <span>', $links);
		$links = str_replace(')', '</span>', $links);

	}
	return $links;
}
}

/**
 *  Archives Widget - Wrap Post count in a span
 */
add_filter('get_archives_link', 'dsvy_archive_count_span');
if( !function_exists('dsvy_archive_count_span') ){
function dsvy_archive_count_span($links) {
	if( substr( trim($links), 0, 8 ) != '<option ' ){
		$links = str_replace('</a>&nbsp;(', '</a> <span>', $links);
		$links = str_replace(')', '</span>', $links);
	}
	return $links;
}
}

/**
 *  Default Enqueue scripts and styles.
 */
if( !function_exists('dsvy_theme_gfonts') ){
function dsvy_theme_gfonts() {
	$font_families = array();
	$gfont_family  = '';
	include( get_template_directory() . '/includes/customizer-options.php' );
	include( get_template_directory() . '/includes/gfonts-array.php' );
	foreach( $kirki_options_array as $options_key=>$options_val ){
		if( !empty( $options_val['section_fields'] ) ){
			foreach( $options_val['section_fields'] as $key=>$option ){
				if( !empty($option['type']) && $option['type']=='typography' ){
					$font_family = '';
					$value = dsvy_get_base_option( $option['settings'] );
					$family = trim($value['font-family']);
					if( substr($family, -1) == ',' ){
						$family = substr($family, 0, -1);
					}
					// Repalce space with + character
					$spaces = substr_count($family, ' ');
					if( $spaces>0 ){
						for ($x = 1; $x <= $spaces; $x++) {
							$family = str_replace( ' ', '+', $family );
						} 
					}
					$variants = $value['variant'];
					if( isset($option['dsvy-all-variants']) && $option['dsvy-all-variants']==true ){
						$font_family = trim($value['font-family']);
						if( substr($font_family, -1) == ',' ){
							$font_family = substr($font_family, 0, -1);
						}
						if( !empty($gfonts_array[ $font_family ]['variants']) ){
							$variants = implode( ',', $gfonts_array[ $font_family ]['variants'] );
						}
					}
					$font_families[$family][] = $variants;
				}
			}
		}
	}
	if( !empty($font_families) && is_array($font_families) ){
		$x = 1;
		foreach( $font_families as $name=>$var){
			if( !empty($name) ){
				if( $x != 1 ){ $gfont_family .= '|'; }
				$var = array_unique($var);
				$gfont_family .= $name . ':'. implode(',',$var);
			}
			$x++;
		}
		if( !empty($gfont_family) ){
			$query_args = array(
				'family' => $gfont_family,
			);
			$fonts_url = add_query_arg( $query_args, esc_url('https://fonts.googleapis.com/css'), $query_args );
			wp_enqueue_style( 'dsvy-all-gfonts', $fonts_url );
		}
	}
}
}
add_action( 'wp_enqueue_scripts', 'dsvy_theme_gfonts' );
add_action( 'admin_enqueue_scripts', 'dsvy_theme_gfonts' );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
if( !function_exists('dsvy_pingback_header') ){
function dsvy_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
}
add_action( 'wp_head', 'dsvy_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
if( !function_exists('dsvy_scripts') ){
function dsvy_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$min = '';
	if( dsvy_get_base_option('min')=='1' ){
		$min = '.min';
	}

	// RTL 
	$rtl = ( is_rtl() ) ? '-rtl' : '' ;

	// Font Awesome base
	if( !wp_style_is( 'elementor-icons-shared-0', 'registered' ) ){
		wp_register_style( 'elementor-icons-shared-0', get_template_directory_uri() . '/libraries/font-awesome/css/fontawesome.min.css' );
	}
	$icon_libraries = dsvy_icon_library_list();
	foreach( $icon_libraries as $library_id=>$library_data ){
		if( !wp_style_is( $library_id, 'registered' ) ){
			wp_register_style( $library_id, $library_data['css_path'] );
		}
	}

	// Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/libraries/bootstrap/css/bootstrap'.$rtl.'.min.css' );

	wp_register_script( 'waypoints', get_template_directory_uri() . '/libraries/waypoints/jquery.waypoints.min.js' , array( 'jquery' ) );
	wp_register_style( 'animate-css', get_template_directory_uri() . '/libraries/animate-css/animate.min.css' );

	wp_register_script( 'jquery-circle-progress', get_template_directory_uri() . '/libraries/jquery-circle-progress/circle-progress.min.js', array( 'jquery' ) );
	wp_register_script( 'numinate', get_template_directory_uri() . '/libraries/numinate/numinate.min.js', array( 'jquery' ) );

	wp_register_script( 'owl-carousel', get_template_directory_uri() . '/libraries/owl-carousel/owl.carousel.min.js' , array( 'jquery' ) );
	wp_register_style( 'owl-carousel', get_template_directory_uri() . '/libraries/owl-carousel/assets/owl.carousel.min.css' );
	wp_register_style( 'owl-carousel-theme', get_template_directory_uri() . '/libraries/owl-carousel/assets/owl.theme.default.min.css' );

	if( dsvy_get_base_option('load-merged-css')!=true ){
		wp_enqueue_style( 'dsvy-core-style', get_template_directory_uri() . '/css/core'.$min.'.css' );
		wp_enqueue_style( 'dsvy-theme-style', get_template_directory_uri() . '/css/theme'.$min.'.css' );
	} else {
		wp_enqueue_style( 'dsvy-all-style', get_template_directory_uri() . '/css/all'.$min.'.css' );
	}

	// Magnific Popup Lightbox
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/libraries/magnific-popup/jquery.magnific-popup.min.js', array('jquery') );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/libraries/magnific-popup/magnific-popup.css' );
	// Base icon library
	wp_enqueue_style( 'dsvy-base-icons', get_template_directory_uri() . '/libraries/designervily-base-icons/css/designervily-base-icons.css' );
	// Sticky
	if( dsvy_get_base_option('sticky-header')==true ){
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/libraries/sticky-toolkit/jquery.sticky-kit.min.js' , array('jquery') );
	}
	// Theme base scripts
	wp_enqueue_script( 'dsvy-core-script', get_template_directory_uri() . '/js/core'.$min.'.js' , array('jquery') );
	// Responsive variable
	$js_array = array(
		'responsive' => dsvy_get_base_option('responsive-breakpoint'),
	);
	wp_localize_script( 'dsvy-core-script', 'dsvy_js_variables', $js_array );
	// ballon tooltip
	wp_enqueue_style( 'balloon', get_template_directory_uri() . '/libraries/balloon/balloon.min.css' );
	// Light Slider
	wp_register_script( 'lightslider', get_template_directory_uri() . '/libraries/lightslider/js/lightslider.min.js' , array('jquery') );
	wp_register_style( 'lightslider', get_template_directory_uri() . '/libraries/lightslider/css/lightslider.min.css' );
	// Isotope
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/libraries/isotope/isotope.pkgd.min.js' , array('jquery') );
	// remove Kirki style
	wp_dequeue_style('kirki-styles');

	/******************** */

	if( function_exists('dsvy_auto_css') ){
		// Addons plugin exists
		if( function_exists('is_customize_preview') && !is_customize_preview() ){
			wp_enqueue_style('dsvy-dynamic-style', admin_url('admin-ajax.php').'?action=dsvy_auto_css');
		} else {
			ob_start();
			include get_template_directory().'/css/theme-style.php'; // Fetching theme-style.php output and store in a variable
			$css    = ob_get_clean();
			if( dsvy_get_base_option('load-merged-css')==true ){
				wp_add_inline_style( 'dsvy-all-style', $css );
			} else {
				wp_add_inline_style( 'dsvy-theme-style', $css );
			}
		}
	} else {
		// Addons plugin not exists
		wp_enqueue_style( 'dsvy-dynamic-default-style', get_template_directory_uri() . '/css/dynamic-default-style.css' );
	}
	$min = '';
	if( dsvy_get_base_option('min')=='1' ){
		$min = '.min';
	}

	wp_enqueue_style( 'dsvy-responsive-style', get_template_directory_uri() . '/css/responsive'.$min.'.css' );

	global $dsvy_inline_css;
	if( !empty($dsvy_inline_css) ){
		if( function_exists('dsvy_minify_css') ){
			$dsvy_inline_css = dsvy_minify_css( $dsvy_inline_css );
		}
		wp_add_inline_style( 'dsvy-dynamic-style', trim( $dsvy_inline_css ) );
	}

	if( is_page() || is_singular() ){
		if( wp_style_is( 'elementor-post-'.get_the_ID() , 'enqueued' ) ){
			wp_dequeue_style( 'elementor-post-'.get_the_ID() );
			wp_enqueue_style( 'elementor-post-'.get_the_ID() );
		}
	}

	if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_style( 'animate-css' );

		wp_enqueue_script( 'jquery-circle-progress' );
		wp_enqueue_script( 'numinate' );

		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-carousel-theme' );

		wp_enqueue_script( 'lightslider' );
		wp_enqueue_style( 'lightslider' );
	}

}
}
add_action( 'wp_enqueue_scripts', 'dsvy_scripts', 20 );

/**
 * Admin scripts and styles
 */
if( !function_exists('dsvy_wp_admin_scripts_styles') ){
function dsvy_wp_admin_scripts_styles() {
	wp_register_script( 'dsvy-admin-script', get_template_directory_uri() . '/includes/admin-script.js', array('jquery') );
	// Admin variable
	$admin_js_array = array(
		'theme_path' => get_template_directory_uri(),
	);
	wp_localize_script( 'dsvy-admin-script', 'dsvy_admin_js_variables', $admin_js_array );
	wp_enqueue_style( 'dsvy-admin-style', get_template_directory_uri() . '/includes/admin-style.css' );
	wp_enqueue_script( 'dsvy-admin-script' );
}
}
add_action( 'admin_enqueue_scripts', 'dsvy_wp_admin_scripts_styles' );

/**
 * Elementor correction for customize bug
 */
if( !function_exists('dsvy_ele_correction') ){
function dsvy_ele_correction() {
	if( function_exists('is_customize_preview') && is_customize_preview() ){
		if( wp_style_is( 'elementor-common', 'enqueued' ) ){
			wp_dequeue_style('elementor-common');
		}
		if( wp_style_is( 'elementor-admin', 'enqueued' ) ){
			wp_dequeue_style('elementor-admin');
		}
	}
}
}
add_action( 'admin_enqueue_scripts', 'dsvy_ele_correction', 99 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Lyfpro 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
if( !function_exists('dsvy_widget_tag_cloud_args') ){
function dsvy_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';
	return $args;
}
}
add_filter( 'widget_tag_cloud_args', 'dsvy_widget_tag_cloud_args' );

/*
 *  Body Tag: Class
 */
if( !function_exists('dsvy_add_body_classes') ){
function dsvy_add_body_classes($classes) {
	// Widget class
	$widget_class = '';
	// sidebar class
	$sidebar_class = dsvy_get_base_option('sidebar-post');
	if( in_array( $sidebar_class, array('left','right') ) ){
		$widget_class = dsvy_check_widget_exists('dsvy-sidebar-page');
	}
	if( is_page() ){
		$widget_class = '';
		$sidebar_class = dsvy_get_base_option('sidebar-page');
		$page_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar_class = $page_meta;
		}
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = dsvy_check_widget_exists('dsvy-sidebar-page');
		}
		if( function_exists('is_woocommerce') && is_woocommerce() ){
			$widget_class = '';
			$sidebar_class = dsvy_get_base_option('sidebar-wc-shop');
		}
		// Curved style at slider bottom
		$slider_type	= get_post_meta( get_the_ID(), 'dsvy-slider-type', true );
		$curved_style	= get_post_meta( get_the_ID(), 'dsvy-slider-curved-style', true );
		if( !empty($slider_type) && $curved_style == true ){
			$classes[] = 'dsvy-slider-curved-style';
		}
	} else if ( !is_front_page() && is_home() ) {
		$widget_class = '';
		$sidebar_class = dsvy_get_base_option('sidebar-post');
		$page_for_posts = get_option( 'page_for_posts' );
		$post_meta = get_post_meta( $page_for_posts, 'dsvy-sidebar', true );
		if( !empty($post_meta) && $post_meta!='global' ){
			$sidebar_class = $post_meta;
		}
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = dsvy_check_widget_exists('dsvy-sidebar-post');
		}

	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
		$widget_class = '';
		$sidebar_class = dsvy_get_base_option('sidebar-wc-shop');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = dsvy_check_widget_exists('dsvy-sidebar-wc-shop');
		}
	} else if( function_exists('is_product') && is_product() ){
		$widget_class = '';
		$sidebar_class = dsvy_get_base_option('sidebar-wc-single');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = dsvy_check_widget_exists('dsvy-sidebar-wc-single');
		}
	} else if( is_singular() ){
		if( get_post_type()=='dsvy-portfolio' ){
			$widget_class = '';
			$sidebar_class = dsvy_get_base_option('sidebar-portfolio');
			$post_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = dsvy_check_widget_exists('dsvy-sidebar-portfolio');
			}
		} else if( get_post_type()=='dsvy-service' ){
			$widget_class = '';
			$sidebar_class = dsvy_get_base_option('sidebar-service');
			$post_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = dsvy_check_widget_exists('dsvy-sidebar-service');
			}
		} else if( get_post_type()=='dsvy-team-member' ){
			$widget_class = '';
			$sidebar_class = dsvy_get_base_option('sidebar-team-member');
			$post_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = dsvy_check_widget_exists('dsvy-sidebar-team');
			}
		} else if( get_post_type()=='post' ){
			$widget_class = '';
			$sidebar_class = dsvy_get_base_option('sidebar-post');
			$post_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = dsvy_check_widget_exists('dsvy-sidebar-post');
			}
		}
	} else if( is_tax('dsvy-portfolio-category') ){
		$widget_class = '';
		$sidebar_class = dsvy_get_base_option('sidebar-portfolio-category');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = dsvy_check_widget_exists('dsvy-sidebar-portfolio-cat');
		}
	} else if( is_tax('dsvy-service-category') ){
		$widget_class = '';
		$sidebar_class = dsvy_get_base_option('sidebar-service-category');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = dsvy_check_widget_exists('dsvy-sidebar-service-cat');
		}
	} else if( is_tax('dsvy-team-group') ){
		$widget_class = '';
		$sidebar_class = dsvy_get_base_option('sidebar-team-group');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = dsvy_check_widget_exists('dsvy-sidebar-team-group');
		}
	} else if( is_search() ){
		$widget_class = '';
		$sidebar_class = dsvy_get_base_option('sidebar-search');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = dsvy_check_widget_exists('dsvy-sidebar-search');
		}
	}
	// widget exists class
	if( !empty($widget_class) ){
		$classes[] = 'dsvy-sidebar-no';
	} else {
		if( in_array( $sidebar_class, array('left','right') ) ){
			$classes[] = 'dsvy-sidebar-exists';
		}
		$classes[] = 'dsvy-sidebar-' . $sidebar_class;
	}
	return $classes;
}
}
add_filter('body_class', 'dsvy_add_body_classes');

function dsvy_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'dsvy_move_comment_field_to_bottom' );

function dsvy_update_comment_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = $req ? "aria-required='true'" : '';
	$fields['author'] =
		'<div class="dsvy-comment-form-input-wrapper"><p class="dsvy-comment-form-input comment-form-author">
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'lyfpro' ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';
	$fields['email'] =
		'<p class="dsvy-comment-form-input comment-form-email">
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email', 'lyfpro' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';
	$fields['url'] =
		'<p class="dsvy-comment-form-input comment-form-url">
			<input id="url" name="url" type="url"  placeholder="' . esc_attr__( 'Website', 'lyfpro' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" />
			</p></div>';
	return $fields;
}
add_filter( 'comment_form_default_fields', 'dsvy_update_comment_fields' );
function dsvy_update_comment_textarea_field( $comment_field ) {
	$comment_field =
		'<p class="comment-form-comment">
		<textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Enter your comment here...", 'lyfpro' ) . '" cols="45" rows="8"></textarea>
		</p>';
	return $comment_field;
}
add_filter( 'comment_form_field_comment', 'dsvy_update_comment_textarea_field' );
// Limit Posts Per Category/Archive Page
add_filter('pre_get_posts', 'dsvy_limit_category_posts');
function dsvy_limit_category_posts($query){
    if( is_tax( 'dsvy-portfolio-category' ) && !empty($query->query['dsvy-portfolio-category']) ){
		$count		= dsvy_get_base_option('portfolio-cat-count');
        $query->set('posts_per_page', $count);
    } else if( is_tax( 'dsvy-team-group' ) && !empty($query->query['dsvy-team-group']) ){
		$count		= dsvy_get_base_option('team-group-count');
        $query->set('posts_per_page', $count);
	} else if( is_tax( 'dsvy-service-category' ) && !empty($query->query['dsvy-service-category']) ){
		$count		= dsvy_get_base_option('service-cat-count');
        $query->set('posts_per_page', $count);
    }
    return $query;
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'dsvy_woocommerce_header_add_to_cart_fragment' );
if( !function_exists('dsvy_woocommerce_header_add_to_cart_fragment') ){
function dsvy_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	$show_cart_amount = dsvy_get_base_option('wc-show-cart-amount');

	// cart icon class
	$cart_icon		= 'dsvy-base-icon-supermarket-2';
	$header_style	= dsvy_get_base_option('header-style');
	if( $header_style == '1' ){
		$cart_icon	= 'dsvy-base-icon-shopping-bag-1' ;
	}

	$return = '<a href="'.esc_url(wc_get_cart_url()).'" class="dsvy-cart-link">
		<span class="dsvy-cart-details">
			<span class="dsvy-cart-icon"><i class="'.esc_attr($cart_icon).'"></i></span>
			<span class="dsvy-cart-count">'.esc_html($woocommerce->cart->cart_contents_count).'</span>
		</span>';
	if( $show_cart_amount==true ) {
		$return .= dsvy_esc_kses( $woocommerce->cart->get_cart_total() );
	}
	$return .= '</a>';

	$fragments['a.dsvy-cart-link'] = dsvy_esc_kses($return);
	return $fragments;
}
}

/**
 * Elementor core things
 */
include( get_template_directory() . '/includes/elementor-core.php' );

/**
 * Elementor global settings
 */
add_filter( 'admin_init', 'dsvy_elementor_global_settings' );
if( !function_exists('dsvy_elementor_global_settings') ){
function dsvy_elementor_global_settings() {

	if(get_option('dsvy_elementor_global_done') === false){

		// change default color
		$default_color = array (
			1 => '',
			2 => '',
			3 => '',
			4 => '',
		);
		update_option('elementor_scheme_color', $default_color );

		// change default typo
		$default_typo = array (
			1 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			2 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			3 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			4 => array (
				'font_family' => '',
				'font_weight' => '',
			),
		);
		update_option('elementor_scheme_typography', $default_typo );

		// Set a flag if the theme activation happened
		update_option('dsvy_elementor_global_done', true, '', false);
	}
}
}

/**
 * Init calls
 */
if( !function_exists('dsvy_init_calls') ){
function dsvy_init_calls(){
	$value = get_option('dsvy-widget-classes');
	if( $value != 'yes' ){
		update_option(
			'WCSSC_options',
			array (
				'show_id'			=> false,
				'type'				=> 3,
				'defined_classes'	=> 
				array (
					0 => 'dsvy-two-column-menu',
				),
				'show_number'		=> true,
				'show_location'		=> true,
				'show_evenodd'		=> true,
				'fix_widget_params'	=> false,
				'filter_unique'		=> false,
				'translate_classes'	=> false,
				)
		);
		update_option('dsvy-widget-classes', 'yes');
	}

	// Removes the "shop" title on the main shop page
	add_filter( 'woocommerce_show_page_title', '__return_false' );

}
}
add_action( 'init', 'dsvy_init_calls' );

/**
 *  Inline code generator
 */
if( !function_exists('dsvy_inline_css_code_generator') ){
function dsvy_inline_css_code_generator(){
	$return		= '';
	$color_css	= '';
	if( is_page() || is_singular() ){

		// Body background
		$bg_img		= get_post_meta( get_the_ID(), 'dsvy-bg-img', true );
		$bg_image	= $bg_color_css = $bg_color_opacity_css = '';

		if( !empty($bg_img) ){
			$img_src			= wp_get_attachment_image_src($bg_img, 'full');
			if( !empty($img_src[0]) ){ $bg_image = $img_src[0]; }
		}

		// Background color and color-opacity
		$bg_color			= get_post_meta( get_the_ID(), 'dsvy-bg-color', true );
		$bg_color_opacity	= get_post_meta( get_the_ID(), 'dsvy-bg-color-opacity', true );
		if( !empty($bg_color) ){
			$bg_color_css .= 'background-color:' . $bg_color . ' !important;';
		}
		if( !empty($bg_color_opacity) ){
			$bg_color_opacity_css .= 'opacity:' . $bg_color_opacity . ' !important;';
		}

		// Generating CSS for background
		if( !empty($bg_image) ){
			$return .= 'body{background-image:url(\'' . $bg_image . '\') !important;}';
			if( !empty($bg_color_css) ){
				$return .= 'body:before{' . $bg_color_css . $bg_color_opacity_css . '}';
			}

		} else {

			if( !empty($bg_color_css) ){
				$return .= 'body{' . $bg_color_css . '}';
			}

		}

		$titlebar_img = '';
		// Check if Titlebar bg imge is set in page or post
		$titlebar_bg_img	= get_post_meta( get_the_ID(), 'dsvy-titlebar-bg-img', true );
		if( !empty($titlebar_bg_img) ){
			$img_src			= wp_get_attachment_image_src($titlebar_bg_img, 'full');
			if( !empty($img_src[0]) ){ $titlebar_img = $img_src[0]; }
			$titlebar_bg_color			= get_post_meta( get_the_ID(), 'dsvy-titlebar-bg-color', true );
			$titlebar_bg_color_opacity	= get_post_meta( get_the_ID(), 'dsvy-titlebar-bg-color-opacity', true );
			if( !empty($titlebar_bg_color) ){
				$color_css .= 'background-color:' . $titlebar_bg_color . ' !important;';
			}
			if( !empty($titlebar_bg_color_opacity) ){
				$color_css .= 'opacity:' . $titlebar_bg_color_opacity . ' !important;';
			}
		} else {
			// If not than check now if fetaured img as titlebar bg option is enabled or not
			$titlebar_bg_featured = dsvy_get_base_option('titlebar-bg-featured');
			if( !empty($titlebar_bg_featured) && is_array($titlebar_bg_featured) ){
				if( ( is_page()							&& in_array( 'page', $titlebar_bg_featured ) ) ||
					( is_singular('post')				&& in_array( 'post', $titlebar_bg_featured ) ) ||
					( is_singular('dsvy-portfolio')		&& in_array( 'dsvy-portfolio',   $titlebar_bg_featured ) ) ||
					( is_singular('dsvy-team-member')	&& in_array( 'dsvy-team-member', $titlebar_bg_featured ) ) ||
					( is_singular('dsvy-testimonial')	&& in_array( 'dsvy-testimonial', $titlebar_bg_featured ) ) ||
					( is_singular('dsvy-service')		&& in_array( 'dsvy-service',     $titlebar_bg_featured ) )
				){
					if( has_post_thumbnail() ){
						$titlebar_img = get_the_post_thumbnail_url( get_the_ID() , 'full' );
					}
				}
			}
		}
		// Titlebar bg
		if( !empty($titlebar_img) ){
			$return .= '.dsvy-title-bar-wrapper{background-image:url(\'' . $titlebar_img . '\') !important;}';
			if( !empty($color_css) ){
				$return .= '.dsvy-title-bar-wrapper:before{' . $color_css . '}';
			}
		}
		// Titlebar BG Color
		$titlebar_bg_color	= get_post_meta( get_the_ID(), 'dsvy-titlebar-bg-color', true );
		if( !empty($titlebar_bg_color) ){
			$opacity = get_post_meta( get_the_ID(), 'dsvy-titlebar-bg-color-opacity', true );
			if( empty($opacity) ){ $opacity = '0.5'; }
			$return .= '.dsvy-title-bar-wrapper:after{background-color:' . dsvy_hex2rgb($titlebar_bg_color, $opacity ) . ' !important;}';
		}
	}
	if( !empty($return) ){
		dsvy_inline_css( $return );
	}
}
}
add_action( 'wp', 'dsvy_inline_css_code_generator' );

/**
 * Register a custom menu page.
 */
if( !function_exists('dsvy_register_my_custom_menu_page') ){
function dsvy_register_my_custom_menu_page() {
	if( class_exists('Kirki') ){
		add_menu_page(
			esc_attr__( 'Lyfpro Options', 'lyfpro' ),
			esc_attr__( 'Lyfpro Options', 'lyfpro' ),
			'manage_options',
			esc_url( site_url() . '/wp-admin/customize.php' ),
			'',
			esc_url( get_template_directory_uri() . '/images/customize-icon.png' ),
			6
		);
	}
}
}
add_action( 'admin_menu', 'dsvy_register_my_custom_menu_page' );