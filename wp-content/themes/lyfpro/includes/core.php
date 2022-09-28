<?php
if( !function_exists('dsvy_icon_library_list') ){
function dsvy_icon_library_list() {
	$icon_libraries = array(
		'dsvy-lyfpro-icon'		=> array(
			'name'			=> esc_attr__( 'Lyfpro Icon', 'lyfpro' ),
			'default_icon'	=> 'dsvy-lyfpro-icon dsvy-lyfpro-icon-light',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/dsvy-lyfpro-icon/flaticon.css' ),
			'common_class'	=> 'dsvy-lyfpro-icon',
			'class_prefix'	=> 'dsvy-lyfpro-icon-',
		),
		'elementor-icons-fa-regular'	=> array(
			'name'			=> esc_attr__( 'Font Awesome - Regular', 'lyfpro' ),
			'default_icon'	=> 'far fa-address-book',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/font-awesome/css/regular.min.css' ),
			'common_class'	=> 'far', 
			'class_prefix'	=> 'fa-',
		),
		'elementor-icons-fa-solid'	=> array(
			'name'			=> esc_attr__( 'Font Awesome - Solid', 'lyfpro' ),
			'default_icon'	=> 'fas fa-star',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/font-awesome/css/solid.min.css' ),
			'common_class'	=> 'fas', 
			'class_prefix'	=> 'fa-',
		),
		'elementor-icons-fa-brands'	=> array(
			'name'			=> esc_attr__( 'Font Awesome - Brands', 'lyfpro' ),
			'default_icon'	=> 'fab fa-facebook-square',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/font-awesome/css/brands.min.css' ),
			'common_class'	=> 'fab', 
			'class_prefix'	=> 'fa-',
		),
		'material-icons'	=> array(
			'name'			=> esc_attr__( 'Material Icons', 'lyfpro' ),
			'default_icon'	=> 'mdi mdi-group',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/material-icons/css/material-icons.min.css' ),
			'common_class'	=> 'mdi', 
			'class_prefix'	=> 'mdi-',
		),
		'sgicon'	=> array(
			'name'			=> esc_attr__( 'Stroke Gap Icons', 'lyfpro' ),
			'default_icon'	=> 'sgicon sgicon-WorldWide',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/stroke-gap-icons/style.css' ),
			'common_class'	=> 'sgicon', 
			'class_prefix'	=> 'sgicon-',
		),
	);
	return $icon_libraries;
}
}

/**
 *  Global function - This will return array of different templates for CPT and other boxes
 */
if( !function_exists('dsvy_element_template_list') ){
function dsvy_element_template_list( $for='portfolio', $elementor=false ){
	$return = array();
	if( !empty($for) ){
		// Default titles
		$portfolio_cpt_singular_title	= esc_attr__('Portfolio','lyfpro');
		$service_cpt_singular_title		= esc_attr__('Service','lyfpro');
		$team_cpt_singular_title		= esc_attr__('Team Member','lyfpro');
		if( class_exists('Kirki') ){
			// Portfolio - singular
			$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
			$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;
			// Service - singular
			$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
			$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
			// Team - singular
			$team_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
			$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;
		}

		$elements_array = array(
			'icon-heading'			=> array( 'name' => esc_attr__('Icon Heading', 'lyfpro'),			'total_styles' => 7 ),
			'portfolio'				=> array( 'name' => $portfolio_cpt_singular_title,					'total_styles' => 2 ),
			'service'				=> array( 'name' => $service_cpt_singular_title,					'total_styles' => 3 ),
			'team'					=> array( 'name' => $team_cpt_singular_title,						'total_styles' => 2 ),
			'testimonial'			=> array( 'name' => esc_attr__('Testimonial', 'lyfpro'),			'total_styles' => 3 ),
			'client'				=> array( 'name' => esc_attr__('Client', 'lyfpro'),				'total_styles' => 2 ),
			'blog'					=> array( 'name' => esc_attr__('Blog', 'lyfpro'),					'total_styles' => 2 ),
			'pricing-table'			=> array( 'name' => esc_attr__('Pricing Table', 'lyfpro'),			'total_styles' => 2 ),
			'facts-in-digits'		=> array( 'name' => esc_attr__('Facts In Digits', 'lyfpro'),		'total_styles' => 3 ),
			'static-box'			=> array( 'name' => esc_attr__('Static Box', 'lyfpro'),			'total_styles' => 2 ),
			'opening-hours-list'	=> array( 'name' => esc_attr__('Opening Hours List', 'lyfpro'),	'total_styles' => 2 ),
		);

		if( !empty($elements_array[$for]) ){
			for ($x = 1; $x <= $elements_array[$for]['total_styles']; $x++) {
				$thumb = get_template_directory_uri() . '/includes/images/no-style-thumb.jpg';
				if( file_exists( get_stylesheet_directory() . '/includes/images/'.$for.'-style-'.$x.'.jpg' ) ){
					$thumb = get_stylesheet_directory_uri() . '/includes/images/'.$for.'-style-'.$x.'.jpg';
				} else if( file_exists( get_template_directory() . '/includes/images/'.$for.'-style-'.$x.'.jpg' ) ){
					$thumb = get_template_directory_uri() . '/includes/images/'.$for.'-style-'.$x.'.jpg';
				}
				if( $elementor==true ){
					$return[$x] = $thumb;
				} else {
					$return[] = array(
						'label'	=> sprintf( esc_attr( '%1$s - Style %2$s', 'lyfpro'), $elements_array[$for]['name'], $x ),
						'value'	=> "$x",
						'thumb'	=> $thumb,
					);
				}
			}
		}
	}
	return $return;
}
}

/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
if ( ! function_exists( 'dsvy_edit_link' ) ) {
function dsvy_edit_link() {
	edit_post_link(
		esc_attr__( 'Edit', 'lyfpro' ),
		'<span class="edit-link">',
		'</span>'
	);
}
}

if( !function_exists('dsvy_get_base_option') ) {
function dsvy_get_base_option( $option='' ){
	$return = '';
	if( class_exists('Kirki') ){
		$return = Kirki::get_option( $option );
	} else {
		if( empty($kirki_options_array) ){
			include get_template_directory() . '/includes/customizer-options.php';
		}
		foreach( $kirki_options_array as $kirki_options ){
			if( !empty($kirki_options['section_fields']) ){
				foreach( $kirki_options['section_fields'] as $field ){
					if( !empty($field['settings']) && $field['settings']==$option && isset($field['default']) ){
						$return = $field['default'];
					}
				}
			}
		}
	}
	return $return;
}
}

/*
 *  Designervily element container
 */
if( !function_exists('dsvy_element_container') ){
function dsvy_element_container( $settings = array( 'position' => 'start', 'cpt' => 'blog', 'data' => array() ) ){

	$return 	 = '';
	$inner_class_array = array('designervily-element-inner');

	// New Vars
	$position	= ( !empty($settings['position']) ) ? $settings['position'] : 'start' ;
	$cpt		= ( !empty($settings['cpt']) ) ? $settings['cpt'] : 'blog' ;
	$view_type	= ( !empty($settings['data']['view-type']) ) ? $settings['data']['view-type'] : 'row-column' ;
	$show		= ( !empty($settings['data']['show']) ) ? $settings['data']['show'] : '3' ;
	$columns	= ( !empty($settings['data']['columns']) ) ? $settings['data']['columns'] : '3' ;
	$gap		= ( !empty($settings['data']['gap']) ) ? $settings['data']['gap'] : '' ;
	$style		= ( !empty($settings['data']['style']) ) ? $settings['data']['style'] : '1' ;

	// Carousel
	$car_loop			= ( !empty($settings['data']['carousel-loop']) && $settings['data']['carousel-loop']=='1' ) ? 'true' : 'false' ;
	$car_autoplay		= ( !empty($settings['data']['carousel-autoplay']) && $settings['data']['carousel-autoplay']=='1' ) ? 'true' : 'false' ;
	$car_center			= ( !empty($settings['data']['carousel-center']) && $settings['data']['carousel-center']=='1' ) ? 'true' : 'false' ;
	$car_dots			= ( !empty($settings['data']['carousel-dots']) && $settings['data']['carousel-dots']=='1' ) ? 'true' : 'false' ;
	$car_autoplayspeed	= ( !empty($settings['data']['carousel-autoplayspeed']) ) ? trim($settings['data']['carousel-autoplayspeed']) : '1000' ;

	$car_nav = 'false';
	if( !empty($settings['data']['carousel-nav']) ) {
		if( $settings['data']['carousel-nav']=='1' ) {
			$car_nav = 'true';
		} else if( $settings['data']['carousel-nav']=='above' ) {
			$car_nav = 'above';
		}
	}

	if( $position=='start' ){

		// Enqueue scripts and styles
		if( $view_type=='carousel' ){
			wp_enqueue_script( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel-theme' );
		}

		// Data tags
		$data_array = array();
		$data_array[] = 'data-show="'.$show.'"';
		$data_array[] = 'data-columns="'.$columns.'"';
		$data_array[] = 'data-loop="'.$car_loop.'"';
		$data_array[] = 'data-autoplay="'.$car_autoplay.'"';
		$data_array[] = 'data-center="'.$car_center.'"';
		$data_array[] = 'data-nav="'.$car_nav.'"';
		$data_array[] = 'data-dots="'.$car_dots.'"';
		$data_array[] = 'data-autoplayspeed="'. esc_attr($car_autoplayspeed).'"';
		$data_array[] = 'data-margin="'. esc_attr($gap).'"';

		// class
		$class_array = array();
		$class_array[] = 'designervily-element';
		$class_array[] = 'designervily-element-'.$cpt;
		$class_array[] = 'dsvy-element-'.$cpt.'-style-'.$style;
		$class_array[] = 'designervily-element-viewtype-'.$view_type;
		if( !empty($gap) ){
			$class_array[] = 'designervily-gap-'.$gap;
		}
		if( !empty($settings['data']['sortable']) ){
			$class_array[] = 'dsvy-sortable-' . esc_attr($settings['data']['sortable']);
		}

		// Return
		$return = '<div class="'. implode(' ', $class_array) .'" '. implode(' ', $data_array) . '><div class="'. implode(' ', $inner_class_array) .'">';

	} else {

		$return = '</div><!-- .designervily-element-inner -->   </div><!-- .designervily-element -->  ';

	}

	return $return;
}
}

if( !function_exists('dsvy_social_links_list') ){
function dsvy_social_links_list( $settings = array( 'position' => 'start', 'column' => '3' ) ){
	return array(
		array(
			'id'			=> 'facebook',
			'label'			=> 'Facebook',
			'icon_class'	=> 'dsvy-base-icon-facebook-squared',
		),
		array(
			'id'			=> 'twitter',
			'label'			=> 'Twitter',
			'icon_class'	=> 'dsvy-base-icon-twitter',
		),
		array(
			'id'			=> 'linkedin',
			'label'			=> 'LinkedIn',
			'icon_class'	=> 'dsvy-base-icon-linkedin-squared',
		),
		array(
			'id'			=> 'youtube',
			'label'			=> 'Youtube',
			'icon_class'	=> 'dsvy-base-icon-youtube-play',
		),
		array(
			'id'			=> 'instagram',
			'label'			=> 'Instagram',
			'icon_class'	=> 'dsvy-base-icon-instagram',
		),
		array(
			'id'			=> 'flickr',
			'label'			=> 'Flickr',
			'icon_class'	=> 'dsvy-base-icon-flickr',
		),
		array(
			'id'			=> 'pinterest',
			'label'			=> 'Pinterest',
			'icon_class'	=> 'dsvy-base-icon-pinterest',
		),
		array(
			'id'			=> 'zoom',
			'label'			=> 'Zoom',
			'icon_class'	=> 'dsvy-base-icon-zoom-social',
		),
	);
}
}

if( !function_exists('dsvy_team_social_links') ){
function dsvy_team_social_links(){
	$return = '';
	$social_list = dsvy_social_links_list();
	foreach( $social_list as $social ){
		$social_link = get_post_meta( get_the_ID(), 'dsvy-social-links_' . $social['id'], true );
		if( !empty($social_link) ){
			$return .= '<li class="dsvy-social-li dsvy-social-'.$social['id'].'"><a href="' . esc_url($social_link) . '" title="' . esc_attr($social['label']) . '" target="_blank"><span><i class="' . esc_attr($social['icon_class']) . '"></i></span></a></li>';
		}
	}
	if( !empty($return) ){
		echo dsvy_esc_kses('<ul class="dsvy-social-links dsvy-team-social-links">'.$return.'</ul>');
	}
}
}

if( !function_exists('dsvy_social_share_list') ){
function dsvy_social_share_list( $for='' ){
	$list = array(
		'facebook'	=> array(
			'title'			=> esc_attr('Facebook'),
			'link'			=> 'https://facebook.com/sharer/sharer.php?u=%1$s&title=%2$s',
			'icon_class'	=> 'dsvy-base-icon-facebook-squared',
		),
		'twitter'	=> array(
			'title' 		=> esc_attr('Twitter'),
			'link'			=> 'https://twitter.com/intent/tweet/?text=%2$s&amp;url=%1$s',
			'icon_class'	=> 'dsvy-base-icon-twitter',
		),
		'google-plus'	=> array(
			'title' 		=> esc_attr('Google Plus'),
			'link'			=> 'https://plus.google.com/share?url=%1$s',
			'icon_class'	=> 'dsvy-base-icon-gplus',
		),
		'tumblr'		=> array(
			'title' 		=> esc_attr('Tumblr'),
			'link'			=> 'https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=%2$s&amp;caption=%2$s&amp;content=%1$s&amp;canonicalUrl= &amp;shareSource=tumblr_share_button',
			'icon_class'	=> 'dsvy-base-icon-tumbler',
		),
		'pinterest'		=> array(
			'title'			=> esc_attr('Pinterest'),
			'link'			=> 'https://pinterest.com/pin/create/button/?url=%1$s&amp;media=%1$s&amp;description=%2$s',
			'icon_class'	=> 'dsvy-base-icon-pinterest',
		),
		'linkedin'		=> array(
			'title'			=> esc_attr('LinkedIn'),
			'link'			=> 'https://www.linkedin.com/shareArticle?mini=true&amp;url=%1$s&amp;title=%2$s&amp;summary=%2$s&amp;source=%1$s',
			'icon_class'	=> 'dsvy-base-icon-linkedin-squared',
		),
		'reddit'		=> array(
			'title'			=> esc_attr('Reddit'),
			'link'			=> 'https://reddit.com/submit/?url=%1$s&title=%2$s',
			'icon_class'	=> 'dsvy-base-icon-reddit',
		),
	);
	if( $for=='customizer' ){
		$return_array = array();
		foreach( $list as $social=>$data ){
			$return_array[$social] = $data['title'];
		}
		return $return_array;
	}
	return $list;
}
}

if( !function_exists('dsvy_blog_social_share') ){
function dsvy_blog_social_share(){
	$return		 = '';
	$list        = dsvy_social_share_list();
	$social_list = dsvy_get_base_option('blog-social-share');
	if( !empty($social_list) && is_array($social_list) && count($social_list)>0 ){
		foreach( $social_list as $social ){
			if( !empty($list[$social]) ){
				$link = sprintf( $list[$social]['link'] , get_permalink() , get_the_title()  ) ;
				$return .= '<li class="dsvy-social-li dsvy-social-li-'.esc_attr($social).'"><a class="dsvy-popup" href="'.esc_url($link).'" title="' . sprintf( esc_attr__('Share on %1$s','lyfpro'), $list[$social]['title'] ) . '"><i class="'.$list[$social]['icon_class'].'"></i></a></li>';
			}
		}
	}
	if( !empty($return) ){
		echo dsvy_esc_kses('<div class="dsvy-social-share"><ul>'.$return.'</ul></div>');
	}
}
}

if( !function_exists('dsvy_team_designation') ){
function dsvy_team_designation(){
	// Designation
	$designation = get_post_meta( get_the_ID(), 'dsvy-team-details_designation', true );
	if( !empty($designation) ){
		?>
		<div class="designervily-box-team-position"><?php echo esc_html($designation); ?></div>
		<?php
	}
}
}

if( !function_exists('dsvy_get_all_option_array') ) {
function dsvy_get_all_option_array(){
	$return = array();
	include get_template_directory() . '/includes/customizer-options.php';
	foreach( $kirki_options_array as $kirki_options ){
		if( !empty($kirki_options['section_fields']) ){
			foreach( $kirki_options['section_fields'] as $field ){
				$settings            = str_replace( '-', '_', $field['settings'] );
				$settings            = str_replace( '-', '_', $settings );
				$settings            = str_replace( '-', '_', $settings );
				$settings            = str_replace( '-', '_', $settings );
				$settings            = str_replace( '-', '_', $settings );
				$return[ $settings ] = dsvy_get_base_option( $field['settings'] );
			}
		}
	}
	return $return;
}
}

if( !function_exists('dsvy_inline_css') ) {
function dsvy_inline_css( $css='' ){
	if( !empty($css) ){
		global $dsvy_inline_css;
		if( empty($dsvy_inline_css) ){
			$dsvy_inline_css = '';
		}
		$dsvy_inline_css .= $css;
	}
}
}

if( !function_exists('dsvy_footer_copyright_area') ){
function dsvy_footer_copyright_area() {
	$footer_copyright_content	= array();
	$right_content				= '';
	$footer_copyright_text		= dsvy_get_base_option('copyright-text');
	$footer_right_content		= dsvy_get_base_option('footer-copyright-right-content');

	if( $footer_right_content=='menu' ){
		if( has_nav_menu('designervily-footer') ){
			ob_start();
			wp_nav_menu( array(
				'theme_location' => 'designervily-footer',
				'menu_id'        => 'dsvy-footer-menu',
				'menu_class'     => 'dsvy-footer-menu',
			) );
			$right_content = ob_get_contents();
			ob_end_clean();
		}

	} else {
		// Social 
		if( shortcode_exists('dsvy-social-links') ){
			$right_content = do_shortcode('[dsvy-social-links]');
		}

	}

	// preparing column contents
	if( !empty($footer_copyright_text) ){
		$footer_copyright_content[] = '<div class="dsvy-footer-copyright-text-area"> ' . dsvy_esc_kses( do_shortcode($footer_copyright_text) ) . '</div>';
	}
	if( dsvy_footer_logo('checkonly') ){
		$footer_copyright_content[] = '<div class="dsvy-footer-logo-box">' . dsvy_footer_logo() . '</div>';
	}
	if( !empty($right_content) ){
		$footer_copyright_content[] = '<div class="dsvy-footer-' . dsvy_esc_kses($footer_right_content) . '-area">' . dsvy_esc_kses($right_content) . '</div>';
	}

	/* Footer Copyright Content area - column class */
	switch( count($footer_copyright_content) ){
		case 1;
			$footer_copyright_class = 'col-md-12';
			break;
		case 2;
			$footer_copyright_class = 'col-md-6';
			break;
		case 3;
			$footer_copyright_class = 'col-md-4';
			break;
	}

	if( !empty($footer_copyright_content) ){
		foreach( $footer_copyright_content as $content ){
			echo dsvy_esc_kses('<div class="' . esc_attr( $footer_copyright_class ) . '">' . dsvy_esc_kses($content) . '</div>');
		}
	}
}
}

if( !function_exists('dsvy_footer_boxes_area') ){
function dsvy_footer_boxes_area() {

	$footer_boxes_area = dsvy_get_base_option('footer-boxes-area');

	if( $footer_boxes_area == true ){

		$footer_box_content	= array();
		$footer_box_class			= '';

		for( $x=1; $x<=3; $x++ ){
			$icon_html	= '';
			$title		= dsvy_get_base_option('footer-box-'.$x.'-title');
			$desc		= dsvy_get_base_option('footer-box-'.$x.'-content');
			$icon		= dsvy_get_base_option('footer-box-'.$x.'-icon');

			if( !empty($icon) ){
				$icon = explode(';',$icon);
				$icon = $icon[0];
				// load icon library
				$icon_array = explode(' ',$icon);
				$icon_prefix = $icon_array[0];
				$lib_list_array = dsvy_icon_library_list();
				foreach($lib_list_array as $lib_id=>$lib_data){
					if( $lib_data['common_class']==$icon_prefix ){
						wp_enqueue_style( $lib_id );
					}
				}
				$icon_html = '<i class="'.esc_attr($icon).'"></i>';
			}

			if( !empty($title) ){
				$footer_box_content[] = '<div class="dsvy-footer-contact-info"><div class="dsvy-footer-contact-info-inner d-flex align-items-center">
				' . dsvy_esc_kses($icon_html) . '
				<div class="dsvy-footer-contact-info-wrap">
					<span class="dsvy-label dsvy-label-'.esc_attr($x).'">'.esc_html($title).'</span> '.esc_html($desc).'
				</div>
			</div></div>';
			}
		}

		/* Footer Copyright Content area - column class */
		switch( count($footer_box_content) ){
			case 1;
				$footer_box_class = 'col-md-12';
				break;
			case 2;
				$footer_box_class = 'col-md-6';
				break;
			case 3;
				$footer_box_class = 'col-md-4';
				break;
		}

		if( !empty($footer_box_content) && count($footer_box_content)>0 ){
			$x = 1;
			foreach( $footer_box_content as $content ){
				if( !empty($title) ){
					echo dsvy_esc_kses('<div class="dsvy-footer-boxes dsvy-footer-boxes-'.$x.' '.esc_attr($footer_box_class).'">'.dsvy_esc_kses($content).'</div>');
					$x++;
				}
			}
		}

	}
}
}

/**
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
 * @param str $hex Colour as hexadecimal (with or without hash);
 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
 * @return str Lightened/Darkend colour as hexadecimal (with hash);
 */
if( !function_exists('dsvy_color_luminance') ) {
function dsvy_color_luminance( $hex='#ff0000', $percent='0.1' ) {
	$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
	$new_hex = '#';
	if ( strlen( $hex ) < 6 ) {
		$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
	}
	// convert to decimal and change luminosity
	for ($i = 0; $i < 3; $i++) {
		$dec = hexdec( substr( $hex, $i*2, 2 ) );
		$dec = min( max( 0, $dec + $dec * $percent ), 255 );
		$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
	}
	return $new_hex;
}
}

/*
 *  Main logo
 */
if( !function_exists('dsvy_logo') ) {
function dsvy_logo( $inneronly='' ) {
	$return				= '';
	$logo_img			= '';
	$main_logo			= dsvy_get_base_option('logo');
	$sticky_logo		= dsvy_get_base_option('sticky-logo');
	$responsive_logo	= dsvy_get_base_option('responsive-logo');
	if( !empty($main_logo) ){
		$logo_img .= '<img class="dsvy-main-logo" src="'.esc_url($main_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}
	if( !empty($sticky_logo) ){
		$logo_img .= '<img class="dsvy-sticky-logo" src="'.esc_url($sticky_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}
	if( !empty($responsive_logo) ){
		$logo_img .= '<img class="dsvy-responsive-logo" src="'.esc_url($responsive_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}
	if( !empty($logo_img) ){
		if( $inneronly=='yes' ){
			$return .= '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . dsvy_esc_kses($logo_img) . '</a>';
		} else {
			$return .= ( is_front_page() ) ? '<h1 class="site-title">' : '<div class="site-title">' ;
			$return .= '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
			$return .= ( is_front_page() ) ? '<span class="site-title-text">' . get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ) . '</span>' : '' ;
			$return .= dsvy_esc_kses($logo_img);
			$return .= '</a>';
			$return .= ( is_front_page() ) ? '</h1>' : '</div>' ;
		}
	}
	return dsvy_esc_kses($return);
}
}

/*
 *  Main logo
 */
if( !function_exists('dsvy_footer_logo') ) {
function dsvy_footer_logo( $inneronly='' ) {
	$return				= '';
	$footer_logo_img	= '';
	$footer_logo		= dsvy_get_base_option('footer-logo');

	if( !empty($footer_logo) ){
		$footer_logo_img = '<img class="dsvy-footer-logo" src="'.esc_url($footer_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}

	if( !empty($footer_logo_img) ){
		if( $inneronly=='yes' ){
			$return .= dsvy_esc_kses($footer_logo_img);
		} else {
			$return .= '<div class="dsvy-footer-logo">' . dsvy_esc_kses($footer_logo_img) . '</div>';
		}
	}

	if( $inneronly=='checkonly' ){
		if( !empty($footer_logo) ){
			return true;
		} else {
			return false;
		}
	} else {
		return dsvy_esc_kses($return);
	}
}
}

/*
 *  HTML Filter
 */
if( !function_exists('dsvy_esc_kses') ) {
function dsvy_esc_kses( $html = '' ) {
	$return = '';
	$allowed_html = array(
		'p'	=> array(
			'class'		=> array(),
			'id'		=> array(),
		),
		'noscript'	=> array(),
		'a'			=> array(
			'class'			=> array(),
			'href'			=> array(),
			'title'			=> array(),
			'target'		=> array(),
			'rel'			=> array(),
			'data-sortby'	=> array(),
		),
		'button'	=> array(
			'class'		=> array(),
			'href'		=> array(),
			'title'		=> array(),
		),
		'ul'		=> array(
			'class'		=> array(),
		),
		'ol'		=> array(
			'class'		=> array(),
		),
		'li'		=> array(
			'class'			=> array(),
			'data-content'	=> array(),
		),
		'br'		=> array(),
		'em'		=> array(),
		'strong'	=> array(),
		'i'			=> array(
			'class'		=> array(),
			'style'		=> array(),
		),
		'small'	=> array(
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'div'		=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'role'			=> array(),
			'data-bg'		=> array(),
			'data-iconset'	=> array(),
			'data-icon'		=> array(),
			'data-show'		=> array(),
			'data-columns'	=> array(),
			'data-appear-animation'	=> array(),
			'data-from'			=> array(),
			'data-to'			=> array(),
			'data-interval'		=> array(),
			'data-before'		=> array(),
			'data-before-style'	=> array(),
			'data-after'		=> array(),
			'data-after-style'	=> array(),
			'data-digit'		=> array(),
			'data-fill'			=> array(),
			'data-emptyfill'	=> array(),
			'data-thickness'	=> array(),
			'data-filltype'		=> array(),
			'data-gradient1'	=> array(),
			'data-gradient2'	=> array(),
			'data-loop'			=> array(),
			'data-autoplay'		=> array(),
			'data-center'		=> array(),
			'data-nav'			=> array(),
			'data-dots'			=> array(),
			'data-autoplayspeed'=> array(),
			'data-margin'		=> array(),
			'data-tag'			=> array(),
			'data-id'			=> array(),
			'data-model-id'		=> array(),
			'data-shortcode-controls'		=> array(),
		),
		'span'		=> array(
			'class'				=> array(),
			'id'				=> array(),
			'style'				=> array(),
			'data-appear-animation'	=> array(),
			'data-from'			=> array(),
			'data-to'			=> array(),
			'data-interval'		=> array(),
			'data-before'		=> array(),
			'data-before-style'	=> array(),
			'data-after'		=> array(),
			'data-after-style'	=> array(),
			'data-digit'		=> array(),
			'data-fill'			=> array(),
			'data-emptyfill'	=> array(),
			'data-thickness'	=> array(),
			'data-filltype'		=> array(),
			'data-gradient1'	=> array(),
			'data-gradient2'	=> array(),
			'data-percentage-value'	=> array(),
			'data-value'		=> array(),
		),
		'h1'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h2'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h3'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h4'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h5'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h6'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'header'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'img'		=> array(
			'class'		=> array(),
			'src'		=> array(),
			'alt'		=> array(),
			'title'		=> array(),
			'width'		=> array(),
			'height'	=> array(),
			'srcset'	=> array(),
			'sizes'		=> array(),
			'data-id'	=> array(),
			'data-srcset' => array(),
			'data-src'	=> array(),
		),
		'time'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'datetime'	=> array(),
		),
		'iframe'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'width'		=> array(),
			'height'	=> array(),
			'src'		=> array(),
			'frameborder'	=> array(),
			'allow'		=> array(),
			'allowfullscreen'	=> array(),
		),
		'blockquote'	=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'article'	=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'input'	=> array(
			'type'			=> array(),
			'name'			=> array(),
			'value'			=> array(),
			'placeholder'	=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'checked'		=> array(),
		),
		'textarea'	=> array(
			'name'			=> array(),
			'value'			=> array(),
			'placeholder'	=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'form'	=> array(
			'name'			=> array(),
			'method'		=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'data-id'		=> array(),
			'data-name'		=> array(),
		),
		'label'	=> array(
			'for'			=> array(),
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'aside'	=> array(
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'sup'	=> array(
			'class'			=> array(),
		),
		'sub'	=> array(
			'class'			=> array(),
		),
		'pre'	=> array(),
	);
	if( !empty($html) ){
		$return = wp_kses($html, $allowed_html);
	}
	return $return;
}
}

if ( !function_exists( 'dsvy_header_slider' ) ){
function dsvy_header_slider(){
	if( is_page() || is_singular() ){
		$slider_type = get_post_meta( get_the_ID(), 'dsvy-slider-type', true );
		if( !empty($slider_type) ){
			// Check if Slider Revolution
			if( $slider_type=='revolution-slider' ){
				$slider_slug = get_post_meta( get_the_ID(), 'dsvy-revolution-slider', true );
				if( !empty($slider_slug) && function_exists('add_revslider') ){
					echo dsvy_esc_kses('<div class="dsvy-slider-area">');
					add_revslider( $slider_slug );					
					echo dsvy_esc_kses('</div>');
					// slider bottom content
					$below_content = get_post_meta( get_the_ID(), 'dsvy-slider-below-content', true );
					if( !empty($below_content) ){
						echo dsvy_esc_kses('<div class="container dsvy-slider-bottom-section"><div class="row">'.$below_content.'<div class="col-sm-5"></div></div></div>');
					}
				}
			} else if( $slider_type=='custom-code' ){
				$custom_slider_code = get_post_meta( get_the_ID(), 'dsvy-custom-slider-code', true );
				if( !empty($custom_slider_code) ){
					echo dsvy_esc_kses('<div class="dsvy-slider-area">');
					echo do_shortcode( dsvy_esc_kses($custom_slider_code) );					
					echo dsvy_esc_kses('</div>');
				}
			}
		}
	}
}
}

if ( !function_exists( 'dsvy_get_featured_data' ) ){
function dsvy_get_featured_data( $settings = array() ){
	$return				= '';
	$post_id			= ( !empty($settings['post_id']) ) ? $settings['post_id'] : get_the_ID() ;
	$post_type			= get_post_type();
	$get_post_format	= get_post_format( $post_id );
	$post_format		= ( !empty( $get_post_format ) ) ? $get_post_format : 'standard' ;
	$featured_img_only	= ( isset($settings['featured_img_only']) && $settings['featured_img_only']==true ) ? true : false ;
	$image_size			= ( !empty($settings['size']) ) ? $settings['size'] : 'full' ;
	// for portfolio
	if( is_singular('dsvy-portfolio') ){
		$post_format = get_post_meta( $post_id, 'dsvy-featured-type', true );
		$post_format = ($post_format=='slider') ? 'gallery' : $post_format ;
	}
	if( $featured_img_only==true || !in_array($post_format, array('audio', 'video', 'gallery', 'quote', 'link')) ){
		if ( has_post_thumbnail( $post_id ) ) {
			if( !is_singular() ) { $return .= '<a href="' . get_permalink( $post_id ) . '">'; }
			$return .= get_the_post_thumbnail( $post_id, $image_size );
			if( !is_singular() ) { $return .= '</a>'; }
		};
	} else {

		switch( $post_format ){

			case 'audio' :
				$audio_code = get_post_meta( $post_id, 'dsvy-pformat-audio', true );
				if( is_singular('dsvy-portfolio') ){
					$audio_code = get_post_meta( $post_id, 'dsvy-audio-url', true );
				}
				$attr = array(
					'width'		=> 725,
					'height'	=> 400
				);
				$return .= wp_oembed_get( $audio_code, $attr );
				break;

			case 'video' :
				$video_code = get_post_meta( $post_id, 'dsvy-pformat-video', true );
				if( is_singular('dsvy-portfolio') ){
					$video_code = get_post_meta( $post_id, 'dsvy-video-url', true );
				}
				$attr = array(
					'width'		=> 725,
					'height'	=> 400
				);
				$return .= wp_oembed_get( $video_code, $attr );
				break;

			case 'gallery' :
				// Enqueue scripts and styles
				wp_enqueue_script( 'lightslider' );
				wp_enqueue_style( 'lightslider' );
				$images = get_post_meta( $post_id, 'dsvy-pformat-gallery', true );
				if( !empty($images) ){
					$images_array = explode(',',$images);
					foreach( $images_array as $image_id ){
						$return .= '<div class="dsvy-gallery-image">'.wp_get_attachment_image($image_id, $image_size).'</div>';
					}
				}
				if( !empty($return) ){
					$return = '<div class="dsvy-gallery">'.$return.'</div>';
				}
				break;

			case 'quote' :
				$name		= get_post_meta( $post_id, 'dsvy-pformat-quote-source-name', true );
				$url		= get_post_meta( $post_id, 'dsvy-pformat-quote-source-url', true );
				$content	= get_the_content();
				if( !empty($url) && !empty($name) ){
					$name = '<a href="'.$url.'">'.$name.'</a>';
				}
				if( !empty($name) ){
					$name = '<div class="dsvy-block-quote-citation">'.$name.'</div>';
				}
				if( !empty($content) ){
					$return .= '<div class="dsvy-block-quote-content">'.nl2br($content) . $name .'</div>';
				}
				if( !empty($return) ){
					if( has_post_thumbnail($post_id) ){
						$bg_src = get_the_post_thumbnail_url($post_id);
						if( !empty($bg_src) ){
							dsvy_inline_css( '.dsvy-block-quote-wrapper-' . esc_attr($post_id) . '{background-image:url(\'' . esc_url($bg_src) . '\');}' );
						}
					}
					if( strpos($return, '<blockquote') === false ){
						$return = '<blockquote class="dsvy-block-quote">'.$return.'</blockquote>';
					}
					$return = '<div class="dsvy-block-quote-wrapper dsvy-block-quote-wrapper-'.$post_id.'">'.$return.'</div>';
				}
				break;

			case 'link' :
				$link		= get_post_meta( $post_id, 'dsvy-pformat-link-url', true );
				$title		= get_post_meta( $post_id, 'dsvy-pformat-link-title', true );
				if( empty($title) ){ $title = get_post_meta( $post_id, 'dsvy-pformat-link-url', true ); }

				if( !empty($link) ){
					$return = '<a href="'.$link.'">'.$title.'</a>';
				}
				if( !empty($return) ){
					if( has_post_thumbnail($post_id) ){
						$bg_src = get_the_post_thumbnail_url($post_id);
						if( !empty($bg_src) ){
							dsvy_inline_css( '.dsvy-link-wrapper-' . esc_attr($post_id) . '{background-image:url(\'' . esc_url($bg_src) . '\');}' );
						}
					}
					$return = '<div class="dsvy-link-wrapper dsvy-link-wrapper-'.$post_id.'"><div class="dsvy-link-inner">'.$return.'</div></div>';
				}
				break;

		}

	}
	if( !empty($return) ){
		$return = '<div class="dsvy-featured-wrapper">'.$return.'</div>';
		echo dsvy_esc_kses($return);
	}
}
}

if ( !function_exists( 'dsvy_hex2rgb' ) ){
function dsvy_hex2rgb($color, $opacity='1'){
    $default = 'rgb(0,0,0)';
    if (empty($color))
        return $default;
    if ($color[0] == '#')
        $color = substr($color, 1);
    if (strlen($color) == 6)
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    elseif (strlen($color) == 3)
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    else
        return $default;
    $rgb = array_map('hexdec', $hex);
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }
    return $output;
}
}

if( !function_exists('dsvy_element_block_container') ){
function dsvy_element_block_container( $settings = array( 'position' => 'start', 'column' => '3', 'cpt' => 'blog', 'taxonomy' => 'category', 'style' => '1', 'odd_even' => '', 'col_odd_even' => '' ) ){
	$return = '';
	$cpt	= ( !empty($settings['cpt']) ) ? $settings['cpt'] : 'blog' ;
	$style	= ( !empty($settings['style']) ) ? $settings['style'] : '1' ;
	$terms	= '';
	if( !empty($settings['taxonomy']) ){
		$terms = get_the_terms( get_the_ID(), $settings['taxonomy'] );
	}
	$odd_even_class = '';
	if( !empty($settings['odd_even']) ){
		$odd_even_class = 'dsvy-' . $settings['odd_even'] ;
	}
	$col_odd_even_class = '';
	if( !empty($settings['col_odd_even']) ){
		$col_odd_even_class = 'dsvy-col-' . $settings['col_odd_even'] ;
	}
	$term_slug = '';
	if( is_array($terms) && count($terms)>0 ){
		foreach( $terms as $term ){
			$term_slug .= $term->slug.' ';
		}
		$term_slug = trim($term_slug);
	}

	$style_class = 'dsvy-'.$cpt.'-style-'.$style;

	$column_class = '';

	if( $settings['position']=='start' ){
		switch( $settings['column'] ){
			case '1':
				$column_class = 'col-md-12';
			break;
			case '2':
				$column_class = 'col-md-6';
			break;
			case '3':
				$column_class = 'col-md-4';
			break;
			case '4':
				$column_class = 'col-md-6 col-lg-3';
			break;
			case '5':
				$column_class = 'col-md-20percent';
			break;
			case '6':
				$column_class = 'col-md-2';
				break;
		}

		$return = '<article class="dsvy-ele dsvy-ele-'.esc_attr($cpt).' '.esc_attr($style_class).' '.esc_attr($column_class).' '.esc_attr($term_slug).' '.esc_attr($odd_even_class).' '.esc_attr($col_odd_even_class).'">';

	} else {
		$return = '</article>';
	}
	return dsvy_esc_kses($return);
}
}

/**
 *
 */
if( !function_exists('dsvy_client_hover_img') ){
function dsvy_client_hover_img(){
	$return = '';
	$hover_logo = get_post_meta( get_the_ID(), 'dsvy-logo-image-for-hover', true );
	if( !empty($hover_logo) ){
		$hover_image = wp_get_attachment_image_src($hover_logo, 'full');
		if( !empty($hover_image[0]) ){
			$return = '<div class="dsvy-client-hover-img"><img src="'.esc_url($hover_image[0]).'" alt /></div>';
		}
	}
	return dsvy_esc_kses($return);
}
}

if( !function_exists('dsvy_client_logo_link') ){
function dsvy_client_logo_link( $type='start' ){
	$return = '';
	$link = get_post_meta( get_the_ID(), 'dsvy-logo-link', true );
	if( !empty($link['url']) ){
		if( $type=='start' ){
			$target_code = '';
			if( !empty($link['target']) && $link['target']=='_blank' ){ $target_code = ' target="_blank"'; }
			$return = '<a href="' . esc_url($link['url']) . '" title="' . esc_attr($link['title']) . '"' . $target_code . '>';
		} else {
			$return = '</a>';
		}
	}
	echo dsvy_esc_kses($return);
}
}

/*
 *  Titlebar Breadcrumb
 */
if( !function_exists('dsvy_titlebar_breadcrumb') ){
function dsvy_titlebar_breadcrumb(){
	$return = '';
	$hide_breadcrumb = dsvy_get_base_option('titlebar-hide-breadcrumb');
	if(function_exists('bcn_display') && $hide_breadcrumb!=true ){
		$return = '<div class="dsvy-breadcrumb"><div class="dsvy-breadcrumb-inner">' . bcn_display(true) . '</div></div>';
	}
	return dsvy_esc_kses($return);
}
}

if( !function_exists('dsvy_titlebar_headings') ){
function dsvy_titlebar_headings(){
	$title		= get_the_title();
	$subtitle	= '';
	if( is_singular() || is_home() ){
		if( is_home() || is_singular('post') ){
			$page_id	= get_option( 'page_for_posts' );
			$title		= esc_attr__( 'Blog', 'lyfpro' );  // Setting for Titlebar title
			if( is_singular('post') ){
				$title		= get_the_title();  // Setting for Titlebar title
			}
		} else if( is_singular('dsvy-team-member') ){
			$page_id	= get_the_ID();
			$cpt_title	= dsvy_get_base_option('team-cpt-singular-title');
			$title		= sprintf( esc_attr__( '%1$s ', 'lyfpro' ), $cpt_title );  // Setting for Titlebar title
		} else {
			$page_id	= get_the_ID();
		}
		$single_title		= get_post_meta( $page_id, 'dsvy-titlebar-title', true );
		$single_subtitle	= get_post_meta( $page_id, 'dsvy-titlebar-subtitle', true );
		$title				= ( !empty($single_title) )		? trim($single_title)		: $title ;
		$subtitle			= ( !empty($single_subtitle) )	? trim($single_subtitle)	: $subtitle ;
		// Single post custom title and subtitle
		if( is_home() || is_singular('post') ){
			$current_single_title		= get_post_meta( get_the_ID(), 'dsvy-titlebar-title', true );
			$current_single_subtitle	= get_post_meta( get_the_ID(), 'dsvy-titlebar-subtitle', true );
			$title				= ( !empty($current_single_title) )		? trim($current_single_title)		: $title ;
			$subtitle			= ( !empty($current_single_subtitle) )	? trim($current_single_subtitle)	: $subtitle ;
		}
		if( function_exists('is_woocommerce') && is_woocommerce() ){ // WooCommerce
			$title	= dsvy_get_base_option('wc-title');
			$subtitle = '';
		}
	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){ // WooCommerce
		$title	= dsvy_get_base_option('wc-title');
		$subtitle = '';
	} else if( is_category() ){ // Category
		$title = sprintf(
			esc_attr__('Category: %s', 'lyfpro'),
			esc_attr( single_cat_title( '', false) )
		);
	} else if( is_author() ){ // Author
		global $post;
		$author_id = $post->post_author;
		$title	   = sprintf(
			esc_attr__('Author: %s', 'lyfpro'),
			get_the_author_meta( 'display_name', $author_id )
		);
	} else if( is_tax() ){ // Taxonomy
		global $wp_query;
		$tax = $wp_query->get_queried_object();
		$title = esc_attr($tax->name);
	} else if( is_tag() ){ // Tag
		$title = sprintf(
			esc_attr__('Tag: %s','lyfpro'),
			esc_attr( single_tag_title( '', false) )
		);
	} else if( is_404() ){ // 404
		$title = esc_attr__( 'PAGE NOT FOUND', 'lyfpro' );
	} else if( is_search()  ){ // Search Results
		$title = sprintf( esc_attr__( 'Search Results for %s', 'lyfpro' ), ' <span class="dsvy-tbar-search-word">' . get_search_query() . '</span>' );
	} else if( is_archive() ){
		$title = esc_attr__( 'Archives', 'lyfpro' );
	} else {
		$title = get_the_title();
	}
	// return data
	$return  = '';
	$return .= ( !empty($title) ) ? '<h1 class="dsvy-tbar-title"> '. do_shortcode($title) . '</h1>' : '' ;
	$return .= ( !empty($subtitle) ) ? '<h3 class="dsvy-tbar-subtitle"> '. do_shortcode($subtitle) .'</h3>' : '' ;
	if( $return!='' ){
		$return = '<div class="dsvy-tbar"><div class="dsvy-tbar-inner container">'.$return.'</div></div>';
	}
	// Return data
	return dsvy_esc_kses($return);
}
}

if( !function_exists('dsvy_sticky_class') ){
function dsvy_sticky_class(){
	$return = '';
	$class = array();
	if( dsvy_get_base_option('sticky-header')=='1' ) {
		$class[] = 'dsvy-header-sticky-yes';
		$class[] = 'dsvy-sticky-type-'. dsvy_get_base_option('sticky-type');
	}
	// Sticky
	if( dsvy_get_base_option('sticky-header')=='1' ){
		$class[] = 'dsvy-sticky-bg-color-'. dsvy_get_base_option('sticky-header-bgcolor');
	}
	if( !empty($class) ){
		$return = implode( ' ', $class );
	}
	echo esc_attr($return);
}
}

if( !function_exists('dsvy_header_class') ){
function dsvy_header_class(){
	$return = '';
	$class = array();
	// Check if sticky logo exists
	$sticky_logo				= dsvy_get_base_option('sticky-logo');
	$responsive_logo			= dsvy_get_base_option('responsive-logo');
	$responsive_header_bgcolor	= dsvy_get_base_option('responsive-header-bgcolor');
	if( !empty($sticky_logo) ){
		$class[] = 'dsvy-sticky-logo-yes';
	} else {
		$class[] = 'dsvy-sticky-logo-no';
	}
	if( !empty($responsive_logo) ){
		$class[] = 'dsvy-responsive-logo-yes';
	} else {
		$class[] = 'dsvy-responsive-logo-no';
	}
	if( !empty($responsive_header_bgcolor) ){
		$class[] = 'dsvy-responsive-header-bgcolor-'.$responsive_header_bgcolor;
	}
	if( !empty($class) ){
		$return = implode( ' ', $class );
	}
	echo esc_attr($return);
}
}

if( !function_exists('dsvy_header_bg_class') ){
function dsvy_header_bg_class(){
	$return  = 'dsvy-header-wrapper';
	$bgcolor = dsvy_get_base_option('header-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' dsvy-bg-color-'. dsvy_get_base_option('header-bgcolor');
	}
	echo esc_attr($return);
}
}

if( !function_exists('dsvy_header_box_contents') ){
function dsvy_header_box_contents( $settings = array() ){
	for( $i=1 ; $i<=3 ; $i++ ){
		$title		= dsvy_get_base_option( 'header-box'.$i.'-title' );
		$content	= dsvy_get_base_option( 'header-box'.$i.'-content' );
		$link		= dsvy_get_base_option( 'header-box'.$i.'-link' );
		$icon		= dsvy_get_base_option( 'header-box'.$i.'-icon' );
		if( !empty($icon) ){
			$icon = explode(';',$icon);
			$icon = $icon[0];
			// load icon library
			$icon_array = explode(' ',$icon);
			$icon_prefix = $icon_array[0];
			$lib_list_array = dsvy_icon_library_list();
			foreach($lib_list_array as $lib_id=>$lib_data){
				if( $lib_data['common_class']==$icon_prefix ){
					wp_enqueue_style( $lib_id );
				}
			}
		}
		if( !empty($title) || !empty($content) ){
			?>
			<div class="dsvy-header-box dsvy-header-box-<?php echo esc_attr($i); ?>">
				<?php if( !empty($link) ) : ?><a href="<?php echo esc_url($link); ?>"><?php endif; ?>
					<?php if( !empty($icon) ) : ?><span class="dsvy-header-box-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span><?php endif; ?>
					<span class="dsvy-header-box-title"><?php echo esc_html($title); ?></span>
					<span class="dsvy-header-box-content"><?php echo esc_html($content); ?></span>
				<?php if( !empty($link) ) : ?></a><?php endif; ?>
			</div>
			<?php
		}
	} // for loop
}
}

if( !function_exists('dsvy_header_button') ){
function dsvy_header_button( $settings = array() ){
	$btn_text  = dsvy_get_base_option('header-btn-text');
	$btn_text2 = dsvy_get_base_option('header-btn-text2');
	$btn_url   = dsvy_get_base_option('header-btn-url');
	if( (!empty($btn_text) || !empty($btn_text2)) && !empty($btn_url) ){
		?>
		<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
			<?php // No wrapper needed ?>
		<?php } else { ?>
			<div class="dsvy-header-button">
		<?php } ?>
		<a href="<?php echo esc_url($btn_url); ?>">
			<?php if(!empty($btn_text)) : ?><span class="dsvy-header-button-text-1"><?php echo esc_html($btn_text); ?></span><?php endif; ?>
			<?php if(!empty($btn_text2)) : ?><span class="dsvy-header-button-text-2"><?php echo esc_html($btn_text2); ?></span><?php endif; ?>
		</a>
		<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
			<?php // No wrapper needed ?>
		<?php } else { ?>
			</div>
		<?php } ?>
		<?php
	}
}
}

if( !function_exists('dsvy_header_search') ){
function dsvy_header_search(){
	$header_search = dsvy_get_base_option('header-search');
	if( !empty($header_search) && $header_search=='1' ){
		?>
		<div class="dsvy-header-search-btn"><a href="#"><i class="dsvy-base-icon-search"></i></a></div>
		<?php
	}
}
}

if( !function_exists('dsvy_nav_class') ){
function dsvy_nav_class(){
	$return = '';
	$main_active_link_color = dsvy_get_base_option('main-menu-active-color');
	$drop_active_link_color = dsvy_get_base_option('drop-down-menu-active-color');
	if( !empty($main_active_link_color) ){
		$return .= ' dsvy-main-active-color-'.$main_active_link_color;
	}
	if( !empty($drop_active_link_color) ){
		$return .= ' dsvy-dropdown-active-color-'.$drop_active_link_color;
	}
	echo esc_attr($return);
}
}

if( !function_exists('dsvy_preheader_class') ){
function dsvy_preheader_class(){
	$return = '';
	$bgcolor = dsvy_get_base_option('preheader-bgcolor');
	$textcolor = dsvy_get_base_option('preheader-text-color');
	if( !empty($bgcolor) ){
		$return .= ' dsvy-bg-color-'.$bgcolor;
	}
	if( !empty($textcolor) ){
		$return .= ' dsvy-color-'.$textcolor;
	}
	echo esc_attr($return);
}
}

if( !function_exists('dsvy_footer_classes') ){
function dsvy_footer_classes(){
	$return = '';
	$textcolor = dsvy_get_base_option('footer-text-color');
	if( !empty($textcolor) ){
		$return .= ' dsvy-text-color-'.$textcolor;
	}
	$bgcolor = dsvy_get_base_option('footer-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' dsvy-bg-color-'.$bgcolor;
	}
	$background = dsvy_get_base_option('footer-background');
	if( !empty($background['background-image']) ){
		$return .= ' dsvy-bg-image-yes';
	}
	if ( has_nav_menu( 'designervily-footer' ) ){
		$return .= ' dsvy-footer-menu-yes';
	} else {
		$return .= ' dsvy-footer-menu-no';
	}
	$footer_widget_columns	= dsvy_footer_widget_columns(); // array
	if( $footer_widget_columns[0]==false ){
		$return .= ' dsvy-footer-widget-no';
	} else {
		$return .= ' dsvy-footer-widget-yes';
	}
	echo esc_attr($return);
}
}

if( !function_exists('dsvy_footer_widget_classes') ){
function dsvy_footer_widget_classes(){
	$return = '';
	$textcolor = dsvy_get_base_option('footer-widget-text-color');
	$switch    = dsvy_get_base_option('footer-widget-color-switch');
	if( !empty($textcolor) && $switch=='1' ){
		$return .= ' dsvy-color-'.$textcolor;
	}
	$bgcolor = dsvy_get_base_option('footer-widget-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' dsvy-bg-color-'.$bgcolor;
	}
	$background = dsvy_get_base_option('footer-widget-background');
	if( !empty($background['background-image']) ){
		$return .= ' dsvy-bg-image-yes';
	}
	echo esc_attr($return);
}
}

if( !function_exists('dsvy_footer_widget_columns') ){
function dsvy_footer_widget_columns(){
	$return			= array(false, false, false);
	$widget_exists	= false;
	$footer_column	= dsvy_get_base_option('footer-column');
	$footer_column	= ( empty($footer_column) ) ? '3-3-3-3' : $footer_column ;
	if( $footer_column=='custom' ){
		$footer_column_1	= dsvy_get_base_option('footer-1-col-width');
		$footer_column_2	= dsvy_get_base_option('footer-2-col-width');
		$footer_column_3	= dsvy_get_base_option('footer-3-col-width');
		$footer_column_4	= dsvy_get_base_option('footer-4-col-width');
		$footer_column_array = array();
		if( !empty($footer_column_1) && $footer_column_1!='hide' ){ $footer_column_array[] = 'yes'; }
		if( !empty($footer_column_2) && $footer_column_2!='hide' ){ $footer_column_array[] = 'yes'; }
		if( !empty($footer_column_3) && $footer_column_3!='hide' ){ $footer_column_array[] = 'yes'; }
		if( !empty($footer_column_4) && $footer_column_4!='hide' ){ $footer_column_array[] = 'yes'; }
		if( count($footer_column_array)=='1' ){
			$footer_column = '12';
		} else if( count($footer_column_array)=='2' ){
			$footer_column = '6-6';
		} else if( count($footer_column_array)=='3' ){
			$footer_column = '4-4-4';
		} else if( count($footer_column_array)=='4' ){
			$footer_column = '3-3-3-3';
		}
	}
	if( !empty($footer_column) ){
		$footer_columns	= explode('-', $footer_column );
		// Checking if widget exists
		if( is_array($footer_columns) && count($footer_columns)>0 ){
			$col = 1;
			foreach( $footer_columns as $column ){
				if ( is_active_sidebar( 'dsvy-footer-'.$col ) ){
					$widget_exists = true;
				}
				$col++;
			} // end foreach
		}
		$return = array( $widget_exists, $footer_columns, $footer_column );
	}
	return $return;
}
}

if( !function_exists('dsvy_footer_copyright_classes') ){
function dsvy_footer_copyright_classes(){
	$return = '';
	$textcolor = dsvy_get_base_option('footer-copyright-text-color');
	$switch    = dsvy_get_base_option('footer-copyright-color-switch');
	if( !empty($textcolor) && $switch=='1' ){
		$return .= ' dsvy-color-'.$textcolor;
	}
	$bgcolor = dsvy_get_base_option('footer-copyright-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' dsvy-bg-color-'.$bgcolor;
	}
	$background = dsvy_get_base_option('footer-copyright-background');
	if( !empty($background['background-image']) ){
		$return .= ' dsvy-bg-image-yes';
	}
	echo esc_attr($return);
}
}

if( !function_exists('dsvy_all_options_values') ){
function dsvy_all_options_values( $for='typography', $admin=false ) {
	$return			= '';
	$css_code		= '';
	include( get_template_directory() . '/includes/customizer-options.php' );
	foreach( $kirki_options_array as $options_key=>$options_val ){
		if( !empty( $options_val['section_fields'] ) ){
			foreach( $options_val['section_fields'] as $key=>$option ){
				if( !empty($option['type']) && $option['type']==$for && !empty($option['default']) && !empty($option['dsvy-output']) ){
					$class		= $option['dsvy-output'];
					$css_code	= '';
					$values = dsvy_get_base_option( $option['settings'] );
					foreach( $values as $key=>$val ){
						if( !empty($val) && $key!='variant' ){
							if( $key == 'background-image' ){
								$val = 'url("'.$val.'")';
							} else if( $key == 'font-family' ){
								$val = trim($val);
								if( substr($val, -1)!=',' ){ $val = $val.','; }
								$val = $val.'sans-serif';
							}
							$css_code .= $key.':'.$val.';';
						}
					}
					if($admin==true){
						if( $class=='body' ){
							$class = $class.esc_attr('#tinymce.wp-editor');
						} else {
							$class = esc_attr('body#tinymce.wp-editor ').$class;
						}
					}
					$return .= $class.'{'.$css_code.'}';
				}
			}
		}
	}
	return $return;
}
}

if( !function_exists('dsvy_titlebar_class') ){
function dsvy_titlebar_class(){
	$return = '';
	$bgcolor = dsvy_get_base_option('titlebar-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' dsvy-bg-color-'.$bgcolor;
	}
	$background = dsvy_get_base_option('titlebar-background');
	if( !empty($background['background-image']) ){
		$return .= ' dsvy-bg-image-yes';
	}
	$style = dsvy_get_base_option('titlebar-style');
	if( !empty($style) ){
		$return .= ' dsvy-titlebar-style-'.$style;
	}
	echo esc_attr($return);
}
}

if( !function_exists('dsvy_pagination') ){
function dsvy_pagination(){
	$pagination = get_the_posts_pagination( array(
		'mid_size'	=> 5,
		'prev_text'	=> dsvy_esc_kses('<i class="dsvy-base-icon-left-open"></i>'),
		'next_text'	=> dsvy_esc_kses('<i class="dsvy-base-icon-right-open"></i>'),
	) );
	$return = '<div class="dsvy-pagination">'.$pagination.'</div>';
	echo dsvy_esc_kses($return);
}
}

if( !function_exists('dsvy_meta_author') ){
function dsvy_meta_author(){
	return '<span class="dsvy-meta dsvy-meta-author"><a class="dsvy-author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="dsvy-base-icon-user"></i>' . get_the_author() . '</a></span>';
}
}

if( !function_exists('dsvy_meta_date') ){
function dsvy_meta_date( $date_format='', $optional=false ){
	$return = '';
	if( $optional==false || ( $optional==true && !defined('LYFPRO_ADDON_VERSION') ) ){
		if( empty($date_format) ){
			$date_format = get_option('date_format');
		}
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = sprintf( '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated dsvy-hide" datetime="%3$s">%4$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				get_the_date( $date_format ),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date( $date_format )
			);
		} else {
			$time_string = sprintf( '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				get_the_date( $date_format ) // ,
			);
		}
		$return = '<span class="dsvy-meta dsvy-meta-date"><i class="dsvy-base-icon-calendar-1"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . dsvy_esc_kses($time_string) . '</a></span>';
	}
	return $return;
}
}

if( !function_exists('dsvy_meta_category') ){
function dsvy_meta_category( $separator = ', ' ){
	$return = '';
	$categories_list = get_the_category_list( $separator );
	if ( !empty($categories_list) ){
		$return = '<span class="dsvy-meta dsvy-meta-cat"><i class="dsvy-base-icon-folder-open"></i> ' . dsvy_esc_kses($categories_list) . '</span>';
	}
	return $return;
}
}

if( !function_exists('dsvy_meta_tag') ){
function dsvy_meta_tag( $separator = ', ', $title='' ){
	$return		= '';
	$tags_list	= get_the_tag_list( $title.' ' , $separator );
	if ( !empty($tags_list) ) {
		$return = '<span class="dsvy-meta dsvy-meta-tags"> ' . dsvy_esc_kses($tags_list) . '</span>';
	}
	return $return;
}
}

if( !function_exists('dsvy_meta_comment') ){
function dsvy_meta_comment( $hide_zero=false ){
	$return = '';
	$comments_number = get_comments_number();
	if ( !post_password_required() && comments_open() ) {
		$return = '<span class="dsvy-meta dsvy-meta-comments dsvy-comment-bigger-than-zero"><i class="dsvy-base-icon-chat"></i> ' . get_comments_number_text( esc_attr__('No Comments','lyfpro'), esc_attr__('One Comment','lyfpro'), esc_attr__('% Comments','lyfpro') ) . '</span>';
	}
	return $return;
}
}

if( !function_exists('dsvy_author_social_links') ){
function dsvy_author_social_links(){
	$return = '';
	$social_list = array(
		'twitter'	=>	array(
			'name'			=> esc_attr('Twitter'),
			'link'			=> get_the_author_meta( 'twitter' ),
		),
		'facebook'	=>	array(
			'name'			=> esc_attr('Facebook'),
			'link'			=> get_the_author_meta( 'facebook' ),
		),
		'linkedin'	=>	array(
			'name'			=> esc_attr('LinkedIn'),
			'link'			=> get_the_author_meta( 'linkedin' ),
		),
		'google_plus'	=>	array(
			'name'			=> esc_attr('Google +'),
			'link'			=> get_the_author_meta( 'gplus' ),
		),
	);
	foreach( $social_list as $social_id => $social_data ){
		if( !empty($social_data['link']) ){
			$return .= '<li class="dsvy-author-social-li dsvy-author-social-'.esc_attr($social_id).'"><a href="'. esc_url($social_data['link']) .'" target="_blank"><i class="designervily-base-icon-twitter"></i><span class="designervily-hide">'. esc_attr($social_data['name']) .'</span></a></li>';
		}
	}
	if( !empty($return) ){
		$return = '<div class="dsvy-author-social-icons"><ul class="dsvy-author-social-ul">' . $return . '</ul> <!-- .dsvy-author-social-ul -->  </div> <!-- .dsvy-author-social-icons -->';
	}
	// Return data
	return dsvy_esc_kses($return);
}
}

if( !function_exists('dsvy_comments_list_template') ){
function dsvy_comments_list_template($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag		= 'div';
        $add_below	= 'comment';
    } else {
        $tag		= 'li';
        $add_below	= 'div-comment';
    }?>
    <<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="dsvy-comment"><?php
    } ?>
		<div class="dsvy-comment-avatar"><?php
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] );
            } ?>
        </div>
		<div class="dsvy-comment-content">
			<div class="dsvy-comment-meta">
				<span class="dsvy-comment-author"><?php echo get_comment_author_link(); ?></span>
				<span class="dsvy-comment-date">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php printf( esc_attr_x( '%1$s ago', '%1$s = human-readable time difference', 'lyfpro' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
					</a>
					<?php edit_comment_link( esc_attr__( '(Edit)', 'lyfpro' ), '  ', '' ); ?>
				</span>
			</div>
			<?php
			if ( $comment->comment_approved == '0' ) { ?>
				<em class="dsvy-comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'lyfpro' ); ?></em><br/><?php
			} ?>
			<?php comment_text(); ?>
			<div class="reply"><?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below' => $add_below,
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							)
						)
					); ?>
			</div>
		</div>
	<?php
    if ( 'div' != $args['style'] ) : ?>
        </div><?php
    endif;
	?>
	<?php
}
}

if( !function_exists('dsvy_portfolio_details_list') ){
function dsvy_portfolio_details_list() {
	$return = '';
	$lines = dsvy_get_base_option('portfolio-details');
	$title = dsvy_get_base_option('portfolio-details-title');
	if( !empty($lines) ){
		foreach( $lines as $line ){
			$line_id = trim($line['line_title']);
			$line_id = str_replace( ' ', '_', $line_id );
			$line_id = sanitize_html_class( strtolower( $line_id ) ) ;
			// Data
			if( $line['line_type']=='category-link' ){
				$line_data = get_the_term_list( get_the_ID(), 'dsvy-portfolio-category', '', ', ' );
			} else if( $line['line_type']=='category' ){
				$line_data = strip_tags( get_the_term_list( get_the_ID(), 'dsvy-portfolio-category', '', ', ' ) );
			} else {
				$line_data = get_post_meta( get_the_ID(), 'dsvy-portfolio-details_'.$line_id, true );
			}
			if( !empty($line_data) ){
				$return .= '<li class="dsvy-portfolio-line-li"> <span class="dsvy-portfolio-line-title">' . esc_attr($line['line_title']) . ': </span> <span class="dsvy-portfolio-line-value">' . dsvy_esc_kses($line_data) . '</span></li>';
			}
		}
	}
	if( !empty($return) ){
		$return = '<div class="dsvy-portfolio-lines-wrapper"><ul class="dsvy-portfolio-lines-ul">' . $return . '</ul></div>';
	}
	if( !empty($title) ){
		$return = '<h3>' . esc_html($title) . '</h3> ' . $return;
	}
	echo dsvy_esc_kses($return);
}
}

if( !function_exists('dsvy_related_portfolio') ){
function dsvy_related_portfolio() {
	$return			= '';
	$related_title	= dsvy_get_base_option('portfolio-show-related');
	if($related_title==true){
		$related_title	= dsvy_get_base_option('portfolio-related-title');
		$show			= dsvy_get_base_option('portfolio-related-count');
		$columns		= dsvy_get_base_option('portfolio-related-column');
		$style			= dsvy_get_base_option('portfolio-related-style');
		// Title
		if( !empty($related_title) ){
			$related_title = '<h3 class="dsvy-related-title">'.$related_title.'</h3>';
		}
		$terms = wp_get_post_terms( get_the_ID(), 'dsvy-portfolio-category' );
		$term_list = array();
		if( !empty($terms) ){
			foreach( $terms as $term ){
				$term_list[] = $term->slug;
			}
		}
		// Preparing $args
		$args = array(
			'post_type'				=> 'dsvy-portfolio',
			'orderby'				=> 'rand',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'post__not_in'			=> array( get_the_ID() ),
			'tax_query'				=> array(
				array(
					'taxonomy' => 'dsvy-portfolio-category',
					'field'    => 'slug',
					'terms'    => $term_list,
				),
			),
		);
		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		$i = 1;
		if ( $posts->have_posts() ) {
			$return .= '<div class="dsvy-element-posts-wrapper row multi-columns-row">';
			while ( $posts->have_posts() ) {
				$posts->the_post();
				$class = $i%2 ? 'dsvy-odd':'dsvy-even';
				// Template
				if( file_exists( locate_template( '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php', false, false ) ) ){
					$return .= dsvy_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'portfolio',
						'taxonomy'	=> 'dsvy-portfolio-category',
						'style'		=> $style,
					) );
					ob_start();
					include( locate_template( '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= dsvy_element_block_container( array(
						'position'	=> 'end',
					) );
				}
				$i++;
			}
			$return .= '</div>';
		}
		/* Restore original Post Data */
		wp_reset_postdata();
	}
	// Output
	if( !empty($return) ){
		echo '<div class="dsvy-portfolio-related">';
			echo dsvy_esc_kses($related_title);
			echo dsvy_esc_kses($return);
		echo '</div>';
	}
}
}

if( !function_exists('dsvy_related_service') ){
function dsvy_related_service() {
	$return			= '';
	$related_title	= dsvy_get_base_option('service-show-related');

	if($related_title==true){

		$related_title	= dsvy_get_base_option('service-related-title');
		$show			= dsvy_get_base_option('service-related-count');
		$columns			= dsvy_get_base_option('service-related-column');
		$style			= dsvy_get_base_option('service-related-style');
		// Title
		if( !empty($related_title) ){
			$related_title = '<h3 class="dsvy-related-title">'.$related_title.'</h3>';
		}

		$terms = wp_get_post_terms( get_the_ID(), 'dsvy-service-category' );
		$term_list = array();
		if( !empty($terms) ){
			foreach( $terms as $term ){
				$term_list[] = $term->slug;
			}
		}

		// Preparing $args
		$args = array(
			'post_type'				=> 'dsvy-service',
			'orderby'				=> 'rand',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'post__not_in'			=> array( get_the_ID() ),
			'tax_query'				=> array(
				array(
					'taxonomy' => 'dsvy-service-category',
					'field'    => 'slug',
					'terms'    => $term_list,
				),
			),
		);

		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		$i = 1;
		if ( $posts->have_posts() ) {

			$return .= '<div class="dsvy-element-posts-wrapper row multi-columns-row">';

			while ( $posts->have_posts() ) {
				$posts->the_post();
				$class = $i%2 ? 'dsvy-odd':'dsvy-even';

				// Template
				if( file_exists( locate_template( '/theme-parts/service/service-style-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= dsvy_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'service',
						'taxonomy'	=> 'dsvy-service-category',
						'style'		=> $style,
					) );

					ob_start();
					include( locate_template( '/theme-parts/service/service-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= dsvy_element_block_container( array(
						'position'	=> 'end',
					) );

				}
				$i++;
			}

			$return .= '</div>';
		}

		/* Restore original Post Data */
		wp_reset_postdata();

	}

	// Output
	if( !empty($return) ){
		echo '<div class="dsvy-service-related">';
			echo dsvy_esc_kses($related_title);
			echo dsvy_esc_kses($return);
		echo '</div>';
	}
}
}

if( !function_exists('dsvy_related_post') ){
function dsvy_related_post() {
	$return			= '';
	$related_title	= dsvy_get_base_option('blog-show-related');

	if($related_title==true){

		$related_title	= dsvy_get_base_option('blog-related-title');
		$show			= dsvy_get_base_option('blog-related-count');
		$column			= dsvy_get_base_option('blog-related-column');
		$style			= dsvy_get_base_option('blog-related-style');

		// Title
		if( !empty($related_title) ){
			$related_title = '<h3 class="dsvy-related-title">'.$related_title.'</h3>';
		}

		$terms = wp_get_post_terms( get_the_ID(), 'category' );
		$term_list = array();
		if( !empty($terms) ){
			foreach( $terms as $term ){
				$term_list[] = $term->slug;
			}
		}

		// Preparing $args
		$args = array(
			'post_type'				=> 'post',
			'orderby'				=> 'rand',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'post__not_in'			=> array( get_the_ID() ),
			'tax_query'				=> array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $term_list,
				),
			),
		);

		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		$i = 1;
		if ( $posts->have_posts() ) {

			$return .= '<div class="dsvy-element-posts-wrapper row multi-columns-row">';

			while ( $posts->have_posts() ) {
				$posts->the_post();
				$class = $i%2 ? 'dsvy-odd':'dsvy-even';

				// Template
				if( file_exists( locate_template( '/theme-parts/blog/blog-style-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= dsvy_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'post',
						'taxonomy'	=> 'category',
						'style'		=> $style,
					) );

					ob_start();
					include( locate_template( '/theme-parts/blog/blog-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= dsvy_element_block_container( array(
						'position'	=> 'end',
					) );

				}
				$i++;
			}

			$return .= '</div>';
		}

		/* Restore original Post Data */
		wp_reset_postdata();

	}

	// Output
	if( !empty($return) ){
		echo '<div class="dsvy-post-related">';
			echo dsvy_esc_kses($related_title);
			echo dsvy_esc_kses($return);
		echo '</div>';
	}
}
}

if( !function_exists('dsvy_preloader') ){
	function dsvy_preloader(){
		$preloader = dsvy_get_base_option('preloader');
		if( $preloader == true ){
			$preloader_img	= dsvy_get_base_option('preloader-image');
			if( !empty($preloader_img) ){
				echo dsvy_esc_kses('<div class="dsvy-preloader" style="background-image:url('.esc_url( get_template_directory_uri() . '/images/loader'.esc_attr($preloader_img).'.svg'  ).')"></div>');
			}
		}
	}
}

if( !function_exists('dsvy_testimonial_star_ratings') ){
function dsvy_testimonial_star_ratings() {
	$return = '';
	$ratings = get_post_meta( get_the_ID(), 'dsvy-star-ratings', true );
	if( !empty($ratings) && $ratings!='no' && $ratings>0 ){
		for($x = 1; $x <= 5; $x++) {
			$active_class = ( $x<=$ratings ) ? ' dsvy-active' : '' ;
			$return .= '<i class="dsvy-base-icon-star'.esc_attr($active_class).'"></i>';
		}
	}
	if( !empty($return) ){
		$return = '<div class="designervily-box-star-ratings">'.$return.'</div>';
	}
	echo dsvy_esc_kses($return);
}
}

if( !function_exists('dsvy_testimonial_details') ){
function dsvy_testimonial_details() {
	$return = '';
	$details = get_post_meta( get_the_ID(), 'dsvy-testimonial-details', true );
	if( !empty($details) ){
		$return = '<div class="designervily-testimonial-detail">'.$details.'</div>';
	}
	echo dsvy_esc_kses($return);
}
}

if( !function_exists('dsvy_check_widget_exists') ){
function dsvy_check_widget_exists( $sidebar_position='' ) {
	$return = '';
	$sidebar	= 'dsvy-sidebar-post';
	if( is_page() ){
		// page sidebar
		$sidebar	= 'dsvy-sidebar-page';
		if( function_exists('is_woocommerce') && is_woocommerce() ){
			$sidebar = 'dsvy-sidebar-wc-shop';
		}
	}  else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
		$sidebar = 'dsvy-sidebar-wc-shop';
	} else if( function_exists('is_product') && is_product() ){
		$sidebar = 'dsvy-sidebar-wc-single';
	} else if( is_search() ){
		$sidebar	= 'dsvy-sidebar-search';
	} else if( is_singular('dsvy-portfolio') ){
		$sidebar		= 'dsvy-sidebar-portfolio';
	} else if( is_tax('dsvy-portfolio-category') ){
		$sidebar		= 'dsvy-sidebar-portfolio-cat';
	} else if( is_singular('dsvy-service') ){
		$sidebar		= 'dsvy-sidebar-service';
	} else if( is_tax('dsvy-service-category') ){
		$sidebar		= 'dsvy-sidebar-service-cat';
	} else if( is_singular('dsvy-team-member') ){
		$sidebar		= 'dsvy-sidebar-team';
	} else if( is_tax('dsvy-team-group') ){
		$sidebar		= 'dsvy-sidebar-team-group';
	} else if( is_search() ){
		$sidebar		= 'dsvy-sidebar-search';
	} 

	// check if content exists for the sidebar
	$sidebar_content = '';
	ob_start();
	dynamic_sidebar( $sidebar );
	$sidebar_content = ob_get_clean();

	if ( !is_active_sidebar( $sidebar ) || empty($sidebar_content) ){
		$return = 'dsvy-empty-sidebar';
	}
	return esc_attr($return);
}
}

/*
 *  Body Class
 */
if( !function_exists('dsvy_check_sidebar') ){
function dsvy_check_sidebar() {
	$return = false;
	// sidebar class
	$sidebar = dsvy_get_base_option('sidebar-post');
	if( is_page() ){
		$sidebar = dsvy_get_base_option('sidebar-page');
		$page_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
		if( function_exists('is_woocommerce') && is_woocommerce() ){
			$sidebar = dsvy_get_base_option('sidebar-wc-shop');
		}
	} else if ( !is_front_page() && is_home() ) {
		$sidebar = dsvy_get_base_option('sidebar-post');
		$page_for_posts = get_option( 'page_for_posts' );
		$page_meta = get_post_meta( $page_for_posts, 'dsvy-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
		$sidebar = dsvy_get_base_option('sidebar-wc-shop');
	} else if( function_exists('is_product') && is_product() ){
		$sidebar = dsvy_get_base_option('sidebar-wc-single');
	} else if( is_singular('post') ){
		$sidebar = dsvy_get_base_option('sidebar-post');
		$page_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_singular('dsvy-portfolio') ){
		$sidebar = dsvy_get_base_option('sidebar-portfolio');
		$page_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_singular('dsvy-service') ){
		$sidebar = dsvy_get_base_option('sidebar-service');
		$page_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_singular('dsvy-team-member') ){
		$sidebar = dsvy_get_base_option('sidebar-team-member');
		$page_meta = get_post_meta( get_the_ID(), 'dsvy-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_tax('dsvy-team-group') ){
		$sidebar = dsvy_get_base_option('sidebar-team-group');
	} else if( is_tax('dsvy-portfolio-category') ){
		$sidebar = dsvy_get_base_option('sidebar-portfolio-category');
	} else if( is_tax('dsvy-service-category') ){
		$sidebar = dsvy_get_base_option('sidebar-service-category');
	} else if( is_search() ){
		$sidebar = dsvy_get_base_option('sidebar-search');
	}
	if( $sidebar!='' && $sidebar!='no' ){
		$return = true;
	}
	if( !empty( dsvy_check_widget_exists() ) ){
		$return = false;
	}
	return $return;
}
}

if( !function_exists('dsvy_sortable_category') ){
function dsvy_sortable_category( $atts=array(), $taxonomy='' ){
	$return = '';
	$list = '';
	if( !empty($atts['sortable']) && $atts['sortable']=='yes' ){
		$list .= '<li><a href="#" class="dsvy-sortable-link dsvy-selected" data-sortby="*">' . esc_html__('All','lyfpro') . '</a></li>';
		if( !empty($atts['from_category']) ){
			// selected category
			$from_category = explode(',',$atts['from_category']);
			foreach( $from_category as $catslug ){
				$term = get_term_by( 'slug', $catslug, $taxonomy );
				$list .= '<li><a href="#" class="dsvy-sortable-link" data-sortby="' . esc_attr($catslug) . '">' . esc_html($term->name) . '</a></li>';
			}
		} else {
			// all category
			$all_terms = get_terms( array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => true,
			) );
			foreach( $all_terms as $term ){
				$list .= '<li><a href="#" class="dsvy-sortable-link" data-sortby="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a></li>';
			}
		}
		$return = '<div class="dsvy-sortable-list"><ul class="dsvy-sortable-list-ul">
			'.$list.'
		</ul></div>';
		return dsvy_esc_kses($return);
	}
}
}

if( !function_exists('dsvy_cart_icon') ){
function dsvy_cart_icon( $style='1' ){
	$show_cart = dsvy_get_base_option('wc-show-cart-icon');
	if( function_exists('is_woocommerce') && $show_cart==true ){
		$show_cart_amount = dsvy_get_base_option('wc-show-cart-amount');
		global $woocommerce;

		// cart icon class
		$cart_icon		= 'dsvy-base-icon-supermarket-2';
		$header_style	= dsvy_get_base_option('header-style');
		if( $header_style == '1' ){
			$cart_icon	= 'dsvy-base-icon-shopping-bag-1' ;
		}

		$cart_number	= (string) $woocommerce->cart->cart_contents_count;
		$cart_number	= ( $cart_number>0 ) ? $cart_number : '0' ;
		?>
		<div class="dsvy-cart-wrapper dsvy-cart-style-<?php echo esc_attr($style); ?>">
			<a href="<?php echo wc_get_cart_url(); ?>" class="dsvy-cart-link">
				<span class="dsvy-cart-details">
					<span class="dsvy-cart-icon"><i class="<?php echo esc_attr($cart_icon); ?>"></i></span>
					<span class="dsvy-cart-count">
						<?php echo esc_html($cart_number);?> 
					</span>
				</span>
				<?php if( $show_cart_amount==true ) : ?>
				<?php echo dsvy_esc_kses( $woocommerce->cart->get_cart_total() ); ?>
				<?php endif; ?>
			</a>
		</div>
		<?php
	}
}
}

if( !function_exists('dsvy_site_content_class') ){
function dsvy_site_content_class(){
	$return = '';
	if( is_404() ){
		$bgcolor = dsvy_get_base_option('e404-bgcolor');
		if( !empty($bgcolor) ){
			$return .= ' dsvy-bg-color-'.$bgcolor;
		}
		$background = dsvy_get_base_option('e404-background');
		if( !empty($background['background-image']) ){
			$return .= ' dsvy-bg-image-yes';
		}
		$text_color = dsvy_get_base_option('e404-text-color');
		if( !empty($text_color) ){
			$return .= ' dsvy-text-color-'.$text_color;
		}
	}
	if( !empty($return) ){
		echo esc_attr($return);
	}
}
}

if( !function_exists('dsvy_ordinal') ){
function dsvy_ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}
}

if( !function_exists('dsvy_icon_heading_box') ){
function dsvy_icon_heading_box( $settings = array() ){
	extract($settings);

	$icon_html = $title_html = $subtitle_html = $desc_html = $nav_html = $button_html = $box_number_html = '';

	if( !empty($box_number) ){
		$box_number_html = '<div class="dsvy-ihbox-box-number">'.esc_attr($box_number).'</div>';
	}

	if( file_exists( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) ) ){

		$icon_type_class = '';

		if( !empty($settings['icon_type']) ){

			if( $settings['icon_type']=='text' ){
				$icon_html = '<div class="dsvy-ihbox-icon"><div class="dsvy-ihbox-icon-wrapper dsvy-ihbox-icon-type-text">' . $settings['icon_text'] . '</div></div>';
				$icon_type_class = 'text';

			} else if( $settings['icon_type']=='image' ){
				$icon_alt	= (!empty($settings['title'])) ? trim($settings['title']) : esc_attr__('Icon', 'lyfpro') ;
				$icon_image = '<img src="'.esc_url($settings['icon_image']['url']).'" alt="'.esc_attr($icon_alt).'" />';
				$icon_html	= '<div class="dsvy-ihbox-icon"><div class="dsvy-ihbox-icon-wrapper dsvy-ihbox-icon-type-image">' . $icon_image . '</div></div>';
				$icon_type_class = 'image';
			} else if( $settings['icon_type']=='none' ){
				$icon_html = '';
				$icon_type_class = 'none';
			} else {

				// This is real icon html code
				$icon_class      = ( !empty( $settings[ 'i_icon_'.$settings['icon_type'] ] ) ) ? $settings[ 'i_icon_'.$settings['icon_type'] ] : '' ;
				$icon_html       = '<div class="dsvy-ihbox-icon"><div class="dsvy-ihbox-icon-wrapper"><i class="' . $settings['icon']['value'] . '"></i></div></div>';
				$icon_type_class = 'icon';

				wp_enqueue_style( 'elementor-icons-'.$settings['icon']['library']);
			}
		}

		// Title
		if( !empty($settings['title']) ) {
			$title_tag	= ( !empty($settings['title_tag']) ) ? $settings['title_tag'] : 'h2' ;
			$title_html	= '<'. dsvy_esc_kses($title_tag) . ' class="dsvy-element-title">
				'.dsvy_link_render($settings['title_link'], 'start' ).'
					'.dsvy_esc_kses($settings['title']).'
				'.dsvy_link_render($settings['title_link'], 'end' ).'
				</'. dsvy_esc_kses($title_tag) . '>
			';
		}

		// SubTitle
		if( !empty($settings['subtitle']) ) {
			$subtitle_tag	= ( !empty($settings['subtitle_tag']) ) ? $settings['subtitle_tag'] : 'h4' ;
			$subtitle_html	= '<'. dsvy_esc_kses($subtitle_tag) . ' class="dsvy-element-subtitle">
				'.dsvy_link_render($settings['subtitle_link'], 'start' ).'
					'.dsvy_esc_kses($settings['subtitle']).'
				'.dsvy_link_render($settings['subtitle_link'], 'end' ).'
				</'. dsvy_esc_kses($subtitle_tag) . '>
			';
		}

		// Description text
		if( !empty($settings['desc']) ){
			$desc_html = '<div class="dsvy-heading-desc">'.dsvy_esc_kses($settings['desc']).'</div>';
		}

		// Button
		if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
			$button_html = '<div class="dsvy-ihbox-btn">' . dsvy_link_render($settings['btn_link'], 'start' ) . dsvy_esc_kses($settings['btn_title']) . dsvy_link_render($settings['btn_link'], 'end' ) . '</div>';
		}

		echo '<div class="dsvy-ihbox dsvy-ihbox-style-'.esc_attr($style).'">';

			include( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) );

		echo '</div>';

	}

}
}