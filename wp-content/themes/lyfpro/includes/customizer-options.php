<?php
// Default titles
$portfolio_cpt_singular_title	= esc_attr__('Portfolio','lyfpro');
$portfolio_cat_singular_title	= esc_attr__('Portfolio Category','lyfpro');
$service_cpt_singular_title	= esc_attr__('Service','lyfpro');
$service_cat_singular_title	= esc_attr__('Service Category','lyfpro');
$team_cpt_singular_title	= esc_attr__('Team Member','lyfpro');
$team_group_singular_title	= esc_attr__('Team Group','lyfpro');
$testimonial_cpt_singular_title		= esc_attr__('Testimonial','lyfpro');
$testimonial_cat_singular_title	= esc_attr__('Testimonial Category','lyfpro');
if( class_exists('Kirki') ){
	// Portfolio
	$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
	$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;
	// Portfolio Category
	$portfolio_cat_singular_title2	= Kirki::get_option( 'portfolio-cat-singular-title' );
	$portfolio_cat_singular_title	= ( !empty($portfolio_cat_singular_title2) ) ? $portfolio_cat_singular_title2 : $portfolio_cat_singular_title ;
	// Service
	$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
	$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
	// Service Category
	$service_cat_singular_title2	= Kirki::get_option( 'service-cat-singular-title' );
	$service_cat_singular_title	= ( !empty($service_cat_singular_title2) ) ? $service_cat_singular_title2 : $service_cat_singular_title ;
	// Team
	$team_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
	$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;
	// Team Group
	$team_group_singular_title2	= Kirki::get_option( 'team-group-singular-title' );
	$team_group_singular_title	= ( !empty($team_group_singular_title2) ) ? $team_group_singular_title2 : $team_group_singular_title ;
	// Testimonial
	$testimonial_cpt_singular_title2	= Kirki::get_option( 'testimonial-cpt-singular-title' );
	$testimonial_cpt_singular_title	= ( !empty($testimonial_cpt_singular_title2) ) ? $testimonial_cpt_singular_title2 : $testimonial_cpt_singular_title ;
	// Testimonial Category
	$testimonial_cat_singular_title2	= Kirki::get_option( 'testimonial-cat-singular-title' );
	$testimonial_cat_singular_title	= ( !empty($testimonial_cat_singular_title2) ) ? $testimonial_cat_singular_title2 : $testimonial_cat_singular_title ;
}
$pre_color_list = array(
	'transparent'		=> get_template_directory_uri() . '/includes/images/precolor-transparent.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'light'				=> get_template_directory_uri() . '/includes/images/precolor-light.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
	'custom'			=> get_template_directory_uri() . '/includes/images/precolor-custom.png',
);
$pre_two_color_list = array(
	''					=> get_template_directory_uri() . '/includes/images/precolor-default.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
);
$pre_text_color_list = array(
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
);
$pre_text_color_2_list = array(
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
);
$column_list = array(
	'1'	=> get_template_directory_uri() . '/includes/images/column-1.png',
	'2'	=> get_template_directory_uri() . '/includes/images/column-2.png',
	'3'	=> get_template_directory_uri() . '/includes/images/column-3.png',
	'4'	=> get_template_directory_uri() . '/includes/images/column-4.png',
	'5'	=> get_template_directory_uri() . '/includes/images/column-5.png',
	'6'	=> get_template_directory_uri() . '/includes/images/column-6.png',
);
// Total Header Styles
$header_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/header-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/header-style-2.jpg',
	'3'	=> get_template_directory_uri() . '/includes/images/header-style-3.jpg',
	'4'	=> get_template_directory_uri() . '/includes/images/header-style-4.jpg',
);
// Total Single Portfolio Styles
$portfolio_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-2.jpg',
);
// Total Single Service Styles
$service_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/service-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/service-single-style-2.jpg',
);
// Total Single Portfolio Styles
$team_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/team-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/team-single-style-2.jpg',
);
// Social links
$social_options_array = array();
if( function_exists('dsvy_social_links_list') ){
	$social_list = dsvy_social_links_list();
	foreach( $social_list as $social ){
		$social_options_array[] = array(
			'type'			=> 'text',
			'settings'		=> esc_attr( $social['id'] ),
			'label'			=> esc_attr( $social['label'] ),
			'description'	=> esc_attr__( 'Write Social URL.', 'lyfpro' ),
			'default'		=> '',
		);
	}
}
$footer_col_width_array = array(
	'hide'	=> esc_attr__( 'Hide this column', 'lyfpro' ),
	'1'		=> esc_attr__( '1%', 'lyfpro' ),
	'2'		=> esc_attr__( '2%', 'lyfpro' ),
	'3'		=> esc_attr__( '3%', 'lyfpro' ),
	'4'		=> esc_attr__( '4%', 'lyfpro' ),
	'5'		=> esc_attr__( '5%', 'lyfpro' ),
	'6'		=> esc_attr__( '6%', 'lyfpro' ),
	'7'		=> esc_attr__( '7%', 'lyfpro' ),
	'8'		=> esc_attr__( '8%', 'lyfpro' ),
	'9'		=> esc_attr__( '9%', 'lyfpro' ),
	'10'	=> esc_attr__( '10%', 'lyfpro' ),
	'11'	=> esc_attr__( '11%', 'lyfpro' ),
	'12'	=> esc_attr__( '12%', 'lyfpro' ),
	'13'	=> esc_attr__( '13%', 'lyfpro' ),
	'14'	=> esc_attr__( '14%', 'lyfpro' ),
	'15'	=> esc_attr__( '15%', 'lyfpro' ),
	'16'	=> esc_attr__( '16%', 'lyfpro' ),
	'17'	=> esc_attr__( '17%', 'lyfpro' ),
	'18'	=> esc_attr__( '18%', 'lyfpro' ),
	'19'	=> esc_attr__( '19%', 'lyfpro' ),
	'20'	=> esc_attr__( '20%', 'lyfpro' ),
	'21'	=> esc_attr__( '21%', 'lyfpro' ),
	'22'	=> esc_attr__( '22%', 'lyfpro' ),
	'23'	=> esc_attr__( '23%', 'lyfpro' ),
	'24'	=> esc_attr__( '24%', 'lyfpro' ),
	'25'	=> esc_attr__( '25%', 'lyfpro' ),
	'26'	=> esc_attr__( '26%', 'lyfpro' ),
	'27'	=> esc_attr__( '27%', 'lyfpro' ),
	'28'	=> esc_attr__( '28%', 'lyfpro' ),
	'29'	=> esc_attr__( '29%', 'lyfpro' ),
	'30'	=> esc_attr__( '30%', 'lyfpro' ),
	'31'	=> esc_attr__( '31%', 'lyfpro' ),
	'32'	=> esc_attr__( '32%', 'lyfpro' ),
	'33'	=> esc_attr__( '33%', 'lyfpro' ),
	'34'	=> esc_attr__( '34%', 'lyfpro' ),
	'35'	=> esc_attr__( '35%', 'lyfpro' ),
	'36'	=> esc_attr__( '36%', 'lyfpro' ),
	'37'	=> esc_attr__( '37%', 'lyfpro' ),
	'38'	=> esc_attr__( '38%', 'lyfpro' ),
	'39'	=> esc_attr__( '39%', 'lyfpro' ),
	'40'	=> esc_attr__( '40%', 'lyfpro' ),
	'41'	=> esc_attr__( '41%', 'lyfpro' ),
	'42'	=> esc_attr__( '42%', 'lyfpro' ),
	'43'	=> esc_attr__( '43%', 'lyfpro' ),
	'44'	=> esc_attr__( '44%', 'lyfpro' ),
	'45'	=> esc_attr__( '45%', 'lyfpro' ),
	'46'	=> esc_attr__( '46%', 'lyfpro' ),
	'47'	=> esc_attr__( '47%', 'lyfpro' ),
	'48'	=> esc_attr__( '48%', 'lyfpro' ),
	'49'	=> esc_attr__( '49%', 'lyfpro' ),
	'50'	=> esc_attr__( '50%', 'lyfpro' ),
	'51'	=> esc_attr__( '51%', 'lyfpro' ),
	'52'	=> esc_attr__( '52%', 'lyfpro' ),
	'53'	=> esc_attr__( '53%', 'lyfpro' ),
	'54'	=> esc_attr__( '54%', 'lyfpro' ),
	'55'	=> esc_attr__( '55%', 'lyfpro' ),
	'56'	=> esc_attr__( '56%', 'lyfpro' ),
	'57'	=> esc_attr__( '57%', 'lyfpro' ),
	'58'	=> esc_attr__( '58%', 'lyfpro' ),
	'59'	=> esc_attr__( '59%', 'lyfpro' ),
	'60'	=> esc_attr__( '60%', 'lyfpro' ),
	'61'	=> esc_attr__( '61%', 'lyfpro' ),
	'62'	=> esc_attr__( '62%', 'lyfpro' ),
	'63'	=> esc_attr__( '63%', 'lyfpro' ),
	'64'	=> esc_attr__( '64%', 'lyfpro' ),
	'65'	=> esc_attr__( '65%', 'lyfpro' ),
	'66'	=> esc_attr__( '66%', 'lyfpro' ),
	'67'	=> esc_attr__( '67%', 'lyfpro' ),
	'68'	=> esc_attr__( '68%', 'lyfpro' ),
	'69'	=> esc_attr__( '69%', 'lyfpro' ),
	'70'	=> esc_attr__( '70%', 'lyfpro' ),
	'71'	=> esc_attr__( '71%', 'lyfpro' ),
	'72'	=> esc_attr__( '72%', 'lyfpro' ),
	'73'	=> esc_attr__( '73%', 'lyfpro' ),
	'74'	=> esc_attr__( '74%', 'lyfpro' ),
	'75'	=> esc_attr__( '75%', 'lyfpro' ),
	'76'	=> esc_attr__( '76%', 'lyfpro' ),
	'77'	=> esc_attr__( '77%', 'lyfpro' ),
	'78'	=> esc_attr__( '78%', 'lyfpro' ),
	'79'	=> esc_attr__( '79%', 'lyfpro' ),
	'80'	=> esc_attr__( '80%', 'lyfpro' ),
	'81'	=> esc_attr__( '81%', 'lyfpro' ),
	'82'	=> esc_attr__( '82%', 'lyfpro' ),
	'83'	=> esc_attr__( '83%', 'lyfpro' ),
	'84'	=> esc_attr__( '84%', 'lyfpro' ),
	'85'	=> esc_attr__( '85%', 'lyfpro' ),
	'86'	=> esc_attr__( '86%', 'lyfpro' ),
	'87'	=> esc_attr__( '87%', 'lyfpro' ),
	'88'	=> esc_attr__( '88%', 'lyfpro' ),
	'89'	=> esc_attr__( '89%', 'lyfpro' ),
	'90'	=> esc_attr__( '90%', 'lyfpro' ),
	'91'	=> esc_attr__( '91%', 'lyfpro' ),
	'92'	=> esc_attr__( '92%', 'lyfpro' ),
	'93'	=> esc_attr__( '93%', 'lyfpro' ),
	'94'	=> esc_attr__( '94%', 'lyfpro' ),
	'95'	=> esc_attr__( '95%', 'lyfpro' ),
	'96'	=> esc_attr__( '96%', 'lyfpro' ),
	'97'	=> esc_attr__( '97%', 'lyfpro' ),
	'98'	=> esc_attr__( '98%', 'lyfpro' ),
	'99'	=> esc_attr__( '99%', 'lyfpro' ),
	'100'	=> esc_attr__( '100%', 'lyfpro' ),
);

$blog_styles = dsvy_element_template_list('blog', true);
unset($blog_styles['classic'], $blog_styles['3']);

/*** Options array ***/
$kirki_options_array = array(
	// General Settings
	'general_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'General Options', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'color',
				'settings'		=> 'global-color',
				'label'			=> esc_attr__( 'Global Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'This color will be globally applied to most of elements parts and special texts', 'lyfpro' ),
				'default'		=> '#c3002f',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'secondary-color',
				'label'			=> esc_attr__( 'Secondary Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'This color will be used on some elements. Sometimes with Global Color. This should match with Global Color to look good.', 'lyfpro' ),
				'default'		=> '#222d35',
			),
			array(
				'type'		=> 'multicolor',
				'settings'	=> 'gradient-color',
				'label'		=> esc_attr__( 'Gradient Color', 'lyfpro' ),
				'choices'		=> array(
					'first'		=> esc_attr__( 'Starting Color', 'lyfpro' ),
					'last'		=> esc_attr__( 'Ending Color', 'lyfpro' ),
				),
				'default'	=> array(
				  'first'		=> '#c3002f',
				  'last'		=> '#c3002f',
				),
			),
			array(
				'type'				=> 'image',
				'settings'			=> 'logo',
				'label'				=> esc_attr__( 'Logo', 'lyfpro' ),
				'description'		=> esc_attr__( 'Main logo', 'lyfpro' ),
				'default'			=> get_template_directory_uri() . '/images/logo.png',
				'partial_refresh'	=> array(
					'logo'				=> array(
						'selector'			=> '.site-title',
						'render_callback'	=> function() {
							return dsvy_logo( 'yes' );
						},
					)
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'logo-height',
				'label'			=> esc_attr__( 'Logo Max Height', 'lyfpro' ),
				'default'		=> 50,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
			),
			array(
				'type'			=> 'image',
				'settings'		=> 'sticky-logo',
				'label'			=> esc_attr__( 'Sticky Logo', 'lyfpro' ),
				'description'	=> esc_attr__( 'Sticky logo', 'lyfpro' ),
				'default'		=> '',
				'active_callback'=> array( array(
					'setting' => 'sticky-header',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'sticky-logo-height',
				'label'			=> esc_attr__( 'Sticky Logo Max Height', 'lyfpro' ),
				'default'		=> 45,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
				'active_callback'=> array( array(
					'setting' => 'sticky-header',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'image',
				'settings'		=> 'responsive-logo',
				'label'			=> esc_attr__( 'Responsive Logo', 'lyfpro' ),
				'description'	=> esc_attr__( 'This logo appear in small devices like mobile/tablet etc', 'lyfpro' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'responsive-logo-height',
				'label'			=> esc_attr__( 'Responsive Logo Max Height', 'lyfpro' ),
				'default'		=> 50,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
			),
			array(
				'type'		=> 'multicolor',
				'settings'	=> 'link-color',
				'label'		=> esc_attr__( 'Link Color', 'lyfpro' ),
				'choices'		=> array(
					'normal'	=> esc_attr__( 'Normal Color', 'lyfpro' ),
					'hover'		=> esc_attr__( 'Mouse-Over (Hover) Color', 'lyfpro' ),
				),
				'default'	=> array(
					'normal'	=> '#222d35',
					'hover'		=> '#c3002f',
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'preloader',
				'label'			=> esc_attr__( 'Show Preloader?', 'lyfpro' ),
				'description'	=> esc_attr__( 'Show or hide preloader', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'preloader-image',
				'label'			=> esc_html__( 'Select preloader image', 'lyfpro' ),
				'default'		=> '1',
				'choices'		=> array(
					'1'   => get_template_directory_uri() . '/images/loader1.svg',
					'2'   => get_template_directory_uri() . '/images/loader2.svg',
					'3'   => get_template_directory_uri() . '/images/loader3.svg',
					'4'   => get_template_directory_uri() . '/images/loader4.svg',
					'5'   => get_template_directory_uri() . '/images/loader5.svg',
					'6'   => get_template_directory_uri() . '/images/loader6.svg',
					'7'   => get_template_directory_uri() . '/images/loader7.svg',
					'8'   => get_template_directory_uri() . '/images/loader8.svg',
					'9'   => get_template_directory_uri() . '/images/loader9.svg',
				),
				'active_callback'=> array( array(
					'setting' => 'preloader',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'responsive-breakpoint',
				'label'			=> esc_attr__( 'Responsive Breakpoint', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select screen size to make the menu burger menu (responsive menu) below the selected screen size and also other settings too. Preferred Sizes: 1200, 1024, 992 and 768', 'lyfpro' ),
				'default'		=> 1200,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 2000,
					'step'			=> 1,
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-page',
				'label'		=> esc_html__( 'Page Sidebar', 'lyfpro' ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced Settings
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-advanced-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Advanced Settings', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Special advanced options', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'min',
				'label'			=> esc_attr__( 'Load Minified CSS and JS Files?', 'lyfpro' ),
				'description'	=> esc_attr__( 'Load minified files for CSS and JS code files. Select YES to reduce page load time.', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'dynamic-css-file',
				'label'			=> esc_attr__( 'Load Static CSS file for Dynamic Code?', 'lyfpro' ),
				'description' => esc_attr__( 'Keep this YES to make your site load faster. Select NO if you are modifying any file via child theme or any other way.', 'lyfpro' ),
				'default'		=> '0',
				'choices'     => array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'load-merged-css',
				'label'			=> esc_attr__( 'Load merged file?', 'lyfpro' ),
				'description'	=> esc_attr__( 'Keep this YES to load merged file so only one CSS file will load instead of multiple files. This will effect theme\'s CSS files only and not other plugin related files. This will reduce load time.', 'lyfpro' ),
				'default'		=> '0',
				'choices'     => array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'white-color',
				'label'			=> esc_attr__( 'White Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'This is default white color for text.', 'lyfpro' ),
				'default'		=> '#ffffff',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'blackish-color',
				'label'			=> esc_attr__( 'Blackish Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'This is default blackish color.', 'lyfpro' ),
				'default'		=> '#222d35',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'light-bg-color',
				'label'			=> esc_attr__( 'Light Background Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'This is default grey background color.', 'lyfpro' ),
				'default'		=> '#f9f9f9',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'blackish-bg-color',
				'label'			=> esc_attr__( 'Blackish Background Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'This is default blackish background color.', 'lyfpro' ),
				'default'		=> '#222d35',
			),
		)
	),
	// Typography Settings
	'typography_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Typography Options', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'typography',
				'settings'		=> 'global-typography',
				'label'			=> esc_attr__( 'Global Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array (
					'font-family'		=> 'Source Sans Pro',
					'variant'			=> 'regular',
					'font-size'			=> '16px',
					'line-height'		=> '1.7',
					'letter-spacing'	=> '',
					'color'				=> '#606060',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 400,
					'font-style'		=> 'normal',
				  ),
				'priority'			=> 10,
				'dsvy-output'		=> 'body',
				'dsvy-all-variants'	=> true,
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h1-typography',
				'label'			=> esc_attr__( 'H1 Typography', 'lyfpro' ),
				'tooltip'     => esc_attr__( 'This is tooltip', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '42px',
					'line-height'		=> '44px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#222d35',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> 'h1',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h2-typography',
				'label'			=> esc_attr__( 'H2 Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '36px',
					'line-height'		=> '40px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#222d35',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> 'h2',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h3-typography',
				'label'			=> esc_attr__( 'H3 Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '32px',
					'line-height'		=> '36px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#222d35',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> 'h3',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h4-typography',
				'label'			=> esc_attr__( 'H4 Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '28px',
					'line-height'		=> '32px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#222d35',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> 'h4',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h5-typography',
				'label'			=> esc_attr__( 'H5 Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '24px',
					'line-height'		=> '28px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#222d35',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> 'h5',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h6-typography',
				'label'			=> esc_attr__( 'H6 Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '22px',
					'line-height'		=> '26px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#222d35',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> 'h6',
			),
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Special Heading Typography', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Heading typography options', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'heading-typography',
				'label'			=> esc_attr__( 'Heading Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '42px',
					'line-height'		=> '46px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#222d35',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> '.dsvy-heading-subheading .dsvy-element-title',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'subheading-typography',
				'label'			=> esc_attr__( 'Sub-heading Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '15px',
					'line-height'		=> '20px',
					'letter-spacing'	=> '2px',
					'color'				=> '#c3002f',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> '.dsvy-heading-subheading .dsvy-element-subtitle',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'content-typography',
				'label'			=> esc_attr__( 'Content Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Source Sans Pro',
					'variant'			=> 'regular',
					'font-size'			=> '17px',
					'line-height'		=> '1.7',
					'letter-spacing'	=> '0px',
					'color'				=> '#606060',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 400,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> '.dsvy-ihbox.dsvy-ihbox-style-hsbox .dsvy-ihbox-content',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'widget-heading-typography',
				'label'			=> esc_attr__( 'Widget Heading Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '24px',
					'line-height'		=> '26px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#0c121d',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> '.widget-title',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'buttons-typography',
				'label'			=> esc_attr__( 'Button Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '14px',
					'line-height'		=> '18px',
					'letter-spacing'	=> '1px',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'dsvy-output'	=> '.woocommerce ul.products li.product .onsale, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .elementor-widget-button .elementor-button, .dsvy-ptable-btn a, .dsvy-service-btn, .dsvy-ihbox-btn, .woocommerce .woocommerce-message .button, .woocommerce div.product form.cart .button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, button, html input[type=button], input[type=reset], input[type=submit]',
			),
			// Extra Load Fonts Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'css-only-custom-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'CSS only Typography', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'This will not apply to any font style but this font will be loaded so we can use anywhere.', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-1-typography',
				'label'			=> esc_attr__( 'First Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> 'regular',
					'font-weight'		=> 400,
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'dsvy-output'	=> '.dsvy-header-style-3 .dsvy-header-button a, .dsvy-digit-box .dsvy-digit, .dsvy-header-style-4 .dsvy-header-button, .elementor-widget-progress .elementor-title, .dsvy-testimonial-style-2 blockquote, .dsvy-testimonial-style-1 blockquote, .dsvy-testimonial-style-3 blockquote',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-2-typography',
				'label'			=> esc_attr__( 'Second Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'dsvy-output'	=> '.designervily-sidebar .widget ul a, .dsvy-header-style-2 .dsvy-header-button a span, .dsvy-footer-big-area .dsvy-footer-contact-info-wrap, .dsvy-ihbox-style-2 .dsvy-ihbox-box-number,.dsvy-ihbox-style-3 .dsvy-ihbox-box-number,.dsvy-service-cat,.dsvy-port-cat,.dsvy-meta-line,.designervily-box-team-position,.dsvy-blog-meta',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-3-typography',
				'label'			=> esc_attr__( 'Third Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'dsvy-output'	=> 'blockquote',
			),
		)
	),
	// Pre-Header Options
	'preheader_options'	=> array(
		'section_settings'	=> array(
			'title'				=> esc_attr__( 'Pre-Header Options', 'lyfpro' ),
			'panel'				=> 'lyfpro_base_options',
			'priority'			=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'preheader-enable',
				'label'			=> esc_attr__( 'Show or hide Pre-header', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'			=> esc_attr__( 'Show', 'lyfpro' ),
					'off'			=> esc_attr__( 'Hide', 'lyfpro' ),
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'preheader-text-color',
				'label'				=> esc_attr__( 'Select pre-header text color', 'lyfpro' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_list,
				'active_callback'	=> array(
					array(
						'setting'		=> 'preheader-enable',
						'operator'		=> '==',
						'value'			=> '1',
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'preheader-bgcolor',
				'label'				=> esc_html__( 'Select pre-header background color', 'lyfpro' ),
				'default'			=> 'blackish',
				'choices'			=> $pre_color_list,
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'preheader-bgcolor-custom',
				'label'			=> esc_attr__( 'Select pre-header background custom color', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select custom color for pre-header background', 'lyfpro' ),
				'default'		=> '#ff5e15',
				'active_callback'=> array(
					array(
						'setting'	=> 'preheader-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					),
					array(
						'setting'			=> 'preheader-enable',
						'operator'			=> '==',
						'value'				=> '1',
					)
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'preheader-responsive',
				'label'			=> esc_attr__( 'Hide in screen size', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select screen size to hide this pre-header below the selected screen size. Preferred Sizes: 1200, 1024, 992 and 768', 'lyfpro' ),
				'default'		=> 1200,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 2000,
					'step'			=> 1,
				),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'preheader-content-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Preheader content', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage preheader content from here', 'lyfpro' ) , $portfolio_cpt_singular_title ) . '</span></div>',
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'preheader-left',
				'label'			=> esc_attr__( 'Pre-header Left Content', 'lyfpro' ),
				'default'		=> dsvy_esc_kses('<i class="dsvy-base-icon-marker"></i> Los Angeles Gournadi, 1230  Bariasl'),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'preheader-left'		=> array(
						'selector'			=> '.dsvy-pre-header-left',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('preheader-left'));
						},
					)
				),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'preheader-right',
				'label'			=> esc_attr__( 'Pre-header Right Content', 'lyfpro' ),
				'default'		=> dsvy_esc_kses('<ul class="dsvy-contact-info"><li><i class="dsvy-base-icon-contact"></i> Make a call  : +1 (212) 255-5511</li><li>[dsvy-social-links]</li></ul>'),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'preheader-right'		=> array(
						'selector'			=> '.dsvy-pre-header-right',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('preheader-right'));
						},
					)
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'preheader-search',
				'label'			=> esc_attr__( 'Show Search Icon in Pre-header Right Area?', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select YES to show search icon in pre-header right side.', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
		),
	),
	// Header Options
	'header_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Header Options', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'header-style',
				'label'		=> esc_html__( 'Header Style', 'lyfpro' ),
				'default'	=> '1',
				'choices'		=> $header_style_array,
			),
			// - Infostack contents
			// 1st Box
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-box1-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Header 1st Box Contents', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Add or modify content for 1st box in header area.', 'lyfpro' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),		
					)
				),
			),
			array(
				'type'			=> 'designervily_icon_picker',
				'settings'		=> 'header-box1-icon',
				'label'			=> esc_attr__( '1st box - Icon', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select icon for 1st box', 'lyfpro' ),
				'default'		=> esc_attr('dsvy-lyfpro-icon dsvy-lyfpro-icon-email;fa fa-map-marker;sgicon sgicon-Pointer'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'header-box1-title',
				'label'		=> esc_attr__( '1st Box - Title', 'lyfpro' ),
				'default'	=> esc_attr('Call us for any question'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-box1-title'		=> array(
						'selector'			=> '.dsvy-header-box-1 .dsvy-header-box-title',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('header-box1-title'));
						},
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'header-box1-content',
				'label'		=> esc_attr__( '1st Box - Content', 'lyfpro' ),
				'default'	=> esc_attr('(+00)888.666.88'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'		=> 'link',
				'settings'	=> 'header-box1-link',
				'label'		=> esc_attr__( '1st Box - Link', 'lyfpro' ),
				'default'	=> '',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			// 2nd Box
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-box2-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Header 2nd Box Contents', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Add or modify content for 2nd box in header area.', 'lyfpro' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'			=> 'designervily_icon_picker',
				'settings'		=> 'header-box2-icon',
				'label'			=> esc_attr__( '2nd box - Icon', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select icon for 2nd box', 'lyfpro' ),
				'default'		=> esc_attr('dsvy-lyfpro-icon dsvy-lyfpro-icon-mail;fa fa-info-circle;sgicon sgicon-Mail;'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'header-box2-title',
				'label'		=> esc_attr__( '2nd Box - Title', 'lyfpro' ),
				'default'	=> esc_attr('Request on'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-box2-title'		=> array(
						'selector'			=> '.dsvy-header-box-2 .dsvy-header-box-title',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('header-box2-title'));
						},
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'header-box2-content',
				'label'		=> esc_attr__( '2nd Box - Content', 'lyfpro' ),
				'default'	=> esc_attr('Get Appointment'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'		=> 'link',
				'settings'	=> 'header-box2-link',
				'label'		=> esc_attr__( '2nd Box - Link', 'lyfpro' ),
				'default'	=> '',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			// 3rd Box
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-box3-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Header 3rd Box Contents', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Add or modify content for 3rd box in header area.', 'lyfpro' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'			=> 'designervily_icon_picker',
				'settings'		=> 'header-box3-icon',
				'label'			=> esc_attr__( '3rd box - Icon', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select icon for 3rd box', 'lyfpro' ),
				'default'		=> esc_attr('dsvy-lyfpro-icon dsvy-lyfpro-icon-;fa fa-info-circle;sgicon sgicon-Phone2;'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'header-box3-title',
				'label'		=> esc_attr__( '3rd Box - Title', 'lyfpro' ),
				'default'	=> esc_attr('000 8888 999'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-box3-title'		=> array(
						'selector'			=> '.dsvy-header-box-3 .dsvy-header-box-title',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('header-box3-title'));
						},
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'header-box3-content',
				'label'		=> esc_attr__( '3rd Box - Content', 'lyfpro' ),
				'default'	=> esc_attr('Free Call'),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'		=> 'link',
				'settings'	=> 'header-box3-link',
				'label'		=> esc_attr__( '3rd Box - Link', 'lyfpro' ),
				'default'	=> '',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-box-typography',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Header Box Typography', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Select or change header box typography', 'lyfpro' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'header-box-title-typography',
				'label'			=> esc_attr__( 'Header Typography - Box Title', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Barlow',
					'variant'			=> '800',
					'font-size'			=> '17px',
					'line-height'		=> '27px',
					'letter-spacing'	=> '0px',
					'color'				=> '#0c121d',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 800,
					'font-style'		=> 'normal',
				),
				'dsvy-output'	=> '.dsvy-header-box-title',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'header-box-content-typography',
				'label'			=> esc_attr__( 'Header Typography - Box Content', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Barlow',
					'variant'			=> '700',
					'font-size'			=> '15px',
					'line-height'		=> '25px',
					'letter-spacing'	=> '1px',
					'color'				=> '#b0b6bf',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 700,
					'font-style'		=> 'normal',
				),
				'dsvy-output'	=> '.dsvy-header-box-content',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			// Header button
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-button-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Header Button', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Set header button title and link', 'lyfpro' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '1',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
			),
			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn-text',
				'label'				=> esc_attr__( 'Header Button Text (1st line)', 'lyfpro' ),
				'default'		=> esc_attr__( 'Have any Question ?', 'lyfpro' ),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '1',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-btn-text'	=> array(
						'selector'			=> '.dsvy-header-button',
						'render_callback'	=> function() {
							return dsvy_header_button( array('inneronly'=>'yes') );
						},
					)
				),
			),
			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn-text2',
				'label'				=> esc_attr__( 'Header Button Text (2nd line)', 'lyfpro' ),
				'default'		=> esc_attr__( '+0 123 888 999', 'lyfpro' ),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '1',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
			),
			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn-url',
				'label'				=> esc_attr__( 'Header Button Link (URL)', 'lyfpro' ),
				'default'			=> '',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '1',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'General Options', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Common options that apply to all header styles', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'header-height',
				'label'			=> esc_attr__( 'Header Height (in pixel)', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select header height', 'lyfpro' ),
				'default'		=> 120,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'header-bgcolor',
				'label'				=> esc_html__( 'Select header background color', 'lyfpro' ),
				'default'			=> 'transparent',
				'choices'			=> $pre_color_list,
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'header-background-color',
				'label'			=> esc_attr__( 'Header Background Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select custom color for header background', 'lyfpro' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'header-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'menu-bgcolor',
				'label'				=> esc_html__( 'Select menu area background color', 'lyfpro' ),
				'default'			=> 'white',
				'choices'			=> $pre_color_list,
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
					)
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'menu-background-color',
				'label'			=> esc_attr__( 'Menu Area Background Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select custom color for Menu area background', 'lyfpro' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'menu-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),
			// Search in Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-search-header-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Search in Header', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Options for search in header area', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'header-search',
				'label'			=> esc_attr__( 'Show Search Icon in Header Area?', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select YES to show search icon in header area.', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'header-search-placeholder',
				'label'			=> esc_attr__( 'Search input placeholder text', 'lyfpro' ),
				'description'	=> esc_attr__( 'Search input placeholder text', 'lyfpro' ),
				'default'		=> esc_attr__( 'Write Search Keyword & Press Enter', 'lyfpro' ),
				'active_callback' => array(
					array(
						'setting'	=> 'header-search',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'header-search-btn-text',
				'label'			=> esc_attr__( 'Search button text', 'lyfpro' ),
				'description'	=> esc_attr__( 'Search button text', 'lyfpro' ),
				'default'		=> esc_attr__( 'Search', 'lyfpro' ),
				'active_callback' => array(
					array(
						'setting'	=> 'header-search',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			// Sticky Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-sticky-header-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Sticky Header Options', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Options for sticky header area', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'sticky-header',
				'label'			=> esc_attr__( 'Sticky Header on Scroll?', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select YES to make header sticky on scroll.', 'lyfpro' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'sticky-header-height',
				'label'			=> esc_attr__( 'Sticky Area Height (in pixel)', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select Area height for sticky header', 'lyfpro' ),
				'default'		=> 90,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 300,
					'step'			=> 1,
				),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '1',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'sticky-header-bgcolor',
				'label'				=> esc_html__( 'Sticky Area Background Color', 'lyfpro' ),
				'default'			=> 'white',
				'choices'			=> $pre_color_list,
				'active_callback'	=> array(
					array(
						'setting'	=> 'sticky-header',
						'operator'	=> '==',
						'value'		=> '1',
					)
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'sticky-header-background-color',
				'label'			=> esc_attr__( 'Sticky Header Background Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select custom color for sticky header background', 'lyfpro' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'sticky-header',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						'setting'	=> 'sticky-header-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),
			// Responsive Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'responsive-header-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Responsive Header Options', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Options for responsive (mobile or tablet mode) header area', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'responsive-header-bgcolor',
				'label'				=> esc_html__( 'Select header background color', 'lyfpro' ),
				'default'			=> 'white',
				'choices'			=> $pre_two_color_list,
			),
		),
	),
	// Menu Options
	'menu_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Menu Options', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Main Menu Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'main-menu-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Main Menu Options', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Set Main Menu font settings', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'main-menu-typography',
				'label'			=> esc_attr__( 'Main Menu Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '14px',
					'line-height'		=> '20px',
					'letter-spacing'	=> '0.5px',
					'color'				=> '#0c121d',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> '.dsvy-navbar div > ul > li > a',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'main-menu-sticky-color',
				'label'			=> esc_attr__( 'Main Menu Text Color for Sticky Header', 'lyfpro' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu text when header is sticky', 'lyfpro' ),
				'default'		=> '#09162a',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'main-menu-active-color',
				'label'			=> esc_attr__( 'Main Menu Active Link Color', 'lyfpro' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu when the menu link is active', 'lyfpro' ),
				'default'		=> 'globalcolor',
				'choices'		=> $pre_text_color_list,
			),
			// Dropdown Menu Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'drop-down-menu-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Dropdown Menu Options', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Set Dropdown font settings', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'dropdown-menu-typography',
				'label'			=> esc_attr__( 'Dropdown Menu Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '14px',
					'line-height'		=> '1.5',
					'letter-spacing'	=> '0px',
					'color'				=> '#0c121d',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> '.dsvy-navbar ul ul a',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'drop-down-menu-active-color',
				'label'				=> esc_html__( 'Dropdown Menu Active Color', 'lyfpro' ),
				'default'			=> 'globalcolor',
				'choices'			=> $pre_text_color_list,
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'dropdown_background',
				'label'			=> esc_attr__( 'Dropdown Menu Background', 'lyfpro' ),
				'description'	=> esc_attr__( 'Background settings for Dropdown Menu', 'lyfpro' ),
				'default'		=> array(
					'background-color'		=> '#f6f6f6',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'dsvy-output'	=> '.dsvy-navbar ul ul,.dsvy-navbar ul ul:before',
			),
		)
	),
	// Titlebar Options
	'titlebar_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Titlebar Options', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'titlebar-enable',
				'label'			=> esc_attr__( 'Show Titlebar?', 'lyfpro' ),
				'description'	=> esc_attr__( 'Show or hide Titlebar', 'lyfpro' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'titlebar-height',
				'label'			=> esc_attr__( 'Titlebar Height', 'lyfpro' ),
				'default'		=> 200,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'titlebar-style',
				'label'			=> esc_attr__( 'Titlebar Style', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select style for Titlebar', 'lyfpro' ),
				'default'		=> 'center',
				'choices'		=>  array(
					'left'			=> esc_attr__( 'All Left Aligned', 'lyfpro' ),
					'center'		=> esc_attr__( 'All Center Aligned', 'lyfpro' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'titlebar-hide-breadcrumb',
				'label'			=> esc_attr__( 'Hide Breadcrumb?', 'lyfpro' ),
				'description'	=> esc_attr__( 'Show or hide breadcrumb in Titlebar', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'multicheck',
				'settings'		=> 'titlebar-bg-featured',
				'label'			=> esc_attr__( 'Featured Image as Titlebar Background', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select which section (CPT) will show featured image as background image in Titlebar. NOTE: This will work for Single view only.', 'lyfpro' ),
				'default'		=> array(),
				'choices'		=> array(
					'post'				=> sprintf( esc_attr__('For %1$s', 'lyfpro') , '"Post"' ),
					'page'				=> sprintf( esc_attr__('For %1$s', 'lyfpro') , '"Page"' ),
					'dsvy-portfolio'	=> sprintf( esc_attr__('For %1$s', 'lyfpro') , '"'.$portfolio_cpt_singular_title.'"' ),
					'dsvy-team-member'	=> sprintf( esc_attr__('For %1$s', 'lyfpro') , '"'.$team_cpt_singular_title.'"' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'titlebar-bgcolor',
				'label'				=> esc_html__( 'Select Titlebar background color', 'lyfpro' ),
				'default'			=> 'custom',
				'choices'			=> array_merge( array('gradientcolor'	=> get_template_directory_uri() . '/includes/images/precolor-gradientcolor.png',), $pre_color_list),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'titlebar-background',
				'label'			=> esc_attr__( 'Background', 'lyfpro' ),
				'description'	=> esc_attr__( 'Background Settings', 'lyfpro' ),
				'default'		=> array(
					'background-color'      => '#f6f6f6',
					'background-repeat'     => 'no-repeat',
					'background-position'   => 'center center',
					'background-size'       => 'cover',
					'background-attachment' => 'scroll',
				),
				'dsvy-output'	=> '.dsvy-title-bar-wrapper, .dsvy-title-bar-wrapper.dsvy-bg-color-custom:before',
				'active_callback' => array( array(
					'setting'		=> 'titlebar-enable',
					'operator'		=> '==',
					'value'			=> '1',
				) ),
			),
			array(
				'type'		=> 'typography',
				'settings'	=> 'titlebar-heading-typography',
				'label'		=> esc_attr__( 'Titlebar Heading Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '46px',
					'line-height'		=> '52px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#2c2c2c',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> '.dsvy-tbar-title',
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'titlebar-subheading-typography',
				'label'			=> esc_attr__( 'Titlebar Sub-heading Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '18px',
					'line-height'		=> '1.5',
					'letter-spacing'	=> '0px',
					'color'				=> '#ffffff',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'dsvy-output'	=> '.dsvy-tbar-subtitle',
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'titlebar-breadcrumb-typography',
				'label'			=> esc_attr__( 'Titlebar Breadcrumb Typography', 'lyfpro' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> '600',
					'font-size'			=> '15px',
					'line-height'		=> '1.5',
					'letter-spacing'	=> '1px',
					'color'				=> '#2c2c2c',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-weight'		=> 600,
					'font-style'		=> 'normal',
				),
			'priority'				=> 10,
				'dsvy-output'		=> '.dsvy-breadcrumb, .dsvy-breadcrumb a',
				'active_callback'	=> array(
					array(
						'setting'			=> 'titlebar-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'titlebar-hide-breadcrumb',
						'operator'			=> '==',
						'value'				=> '0',
					)
				),
			),
		),
	),
	// Footer Options
	'footer_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Footer Options', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Footer Background settings
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-background-settings-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Footer Background Settings', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage footer background settings from here', 'lyfpro' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'footer-bgcolor',
				'label'			=> esc_html__( 'Select Footer background color', 'lyfpro' ),
				'default'		=> 'blackish',
				'choices'		=> array_merge( array('gradientcolor'	=> get_template_directory_uri() . '/includes/images/precolor-gradientcolor.png',), $pre_color_list),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'footer-background',
				'label'			=> esc_attr__( 'Background', 'lyfpro' ),
				'description'	=> esc_attr__( 'Background Settings', 'lyfpro' ),
				'default'		=> array(
					'background-color'		=> '#0c121d',
					'background-image'		=> '',
					'background-repeat'		=> 'no-repeat',
					'background-position'	=> 'center top',
					'background-size'		=> 'contain',
					'background-attachment'	=> 'scroll',
				),

				'dsvy-output'	=> '.site-footer, .site-footer.dsvy-bg-color-custom:before',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-text-color',
				'label'				=> esc_attr__( 'Select Footer Text Color', 'lyfpro' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_list,
			),

			// Footer Boxes Area
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-boxes-area-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Footer Boxes Area', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage footer boxes from here', 'lyfpro' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-boxes-area',
				'label'			=> esc_attr__( 'Show footer boxes?', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			// 1st box
			array(
				'type'			=> 'designervily_icon_picker',
				'settings'		=> 'footer-box-1-icon',
				'label'			=> esc_attr__( '1st Footer box - Icon', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select icon for 1st box', 'lyfpro' ),
				'default'		=> esc_attr('dsvy-lyfpro-icon dsvy-lyfpro-icon-email;fa fa-map-marker;sgicon sgicon-Pointer'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'footer-box-1-title',
				'label'		=> esc_attr__( '1st Footer Box - Title', 'lyfpro' ),
				'default'	=> esc_attr('Call us for any question'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'footer-box-1-title'		=> array(
						'selector'			=> '.dsvy-label-1',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('footer-box-1-title'));
						},
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'footer-box-1-content',
				'label'		=> esc_attr__( '1st Footer Box - Content', 'lyfpro' ),
				'default'	=> esc_attr('(+00)888.666.88'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			// 2nd box
			array(
				'type'			=> 'designervily_icon_picker',
				'settings'		=> 'footer-box-2-icon',
				'label'			=> esc_attr__( '2nd Footer box - Icon', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select icon for 2nd box', 'lyfpro' ),
				'default'		=> esc_attr('dsvy-lyfpro-icon dsvy-lyfpro-icon-email;fa fa-map-marker;sgicon sgicon-Pointer'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'footer-box-2-title',
				'label'		=> esc_attr__( '2nd Footer Box - Title', 'lyfpro' ),
				'default'	=> esc_attr('Call us for any question'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'footer-box-2-title'		=> array(
						'selector'			=> '.dsvy-label-2',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('footer-box-2-title'));
						},
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'footer-box-2-content',
				'label'		=> esc_attr__( '2nd Footer Box - Content', 'lyfpro' ),
				'default'	=> esc_attr('(+00)888.666.88'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			// 3rd
			array(
				'type'			=> 'designervily_icon_picker',
				'settings'		=> 'footer-box-3-icon',
				'label'			=> esc_attr__( '3rd Footer box - Icon', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select icon for 3rd box', 'lyfpro' ),
				'default'		=> esc_attr('dsvy-lyfpro-icon dsvy-lyfpro-icon-email;fa fa-map-marker;sgicon sgicon-Pointer'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'footer-box-3-title',
				'label'		=> esc_attr__( '3rd Footer Box - Title', 'lyfpro' ),
				'default'	=> esc_attr('Call us for any question'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'footer-box-3-title'		=> array(
						'selector'			=> '.dsvy-label-3',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('footer-box-3-title'));
						},
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'footer-box-3-content',
				'label'		=> esc_attr__( '3rd Footer Box - Content', 'lyfpro' ),
				'default'	=> esc_attr('(+00)888.666.88'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),

			// Footer Widget Area
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-widget-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Footer Widget Area', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage widget area settings', 'lyfpro' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'footer-column',
				'label'		=> esc_html__( 'Footer Widget Column Type', 'lyfpro' ),
				'description'	=> esc_html__( 'This will show widgets. You can manage it from "Admin > Appearance > Widgets" section.', 'lyfpro' ),
				'default'	=> 'custom',
				'choices'		=> array(
					'12'		=> get_template_directory_uri() . '/includes/images/footer-12.png',
					'6-6'		=> get_template_directory_uri() . '/includes/images/footer-6-6.png',
					'4-4-4'		=> get_template_directory_uri() . '/includes/images/footer-4-4-4.png',
					'3-3-3-3'	=> get_template_directory_uri() . '/includes/images/footer-3-3-3-3.png',
					'2-2-2-6'	=> get_template_directory_uri() . '/includes/images/footer-2-2-2-6.png',
					'6-2-2-2'	=> get_template_directory_uri() . '/includes/images/footer-6-2-2-2.png',
					'8-4'		=> get_template_directory_uri() . '/includes/images/footer-8-4.png',
					'4-8'		=> get_template_directory_uri() . '/includes/images/footer-4-8.png',
					'custom'	=> get_template_directory_uri() . '/includes/images/footer-col-custom.png',
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-1-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 1st Column', 'lyfpro' ),
				'description'	=> esc_attr__( 'Set custom width of the 1st column in footer widget area', 'lyfpro' ),
				'default'		=> '25',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-2-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 2nd Column', 'lyfpro' ),
				'description'	=> esc_attr__( 'Set custom width of the 2nd column in footer widget area', 'lyfpro' ),
				'default'		=> '50',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-3-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 3rd Column', 'lyfpro' ),
				'description'	=> esc_attr__( 'Set custom width of the 3rd column in footer widget area', 'lyfpro' ),
				'default'		=> '25',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-4-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 4th Column', 'lyfpro' ),
				'description'	=> esc_attr__( 'Set custom width of the 4th column in footer widget area', 'lyfpro' ),
				'default'		=> '30',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-widget-bgcolor',
				'label'				=> esc_html__( 'Select Footer Widget Area background color', 'lyfpro' ),
				'default'			=> 'transparent',
				'choices'			=> array_merge( array('gradientcolor'	=> get_template_directory_uri() . '/includes/images/precolor-gradientcolor.png',), $pre_color_list),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'footer-widget-background',
				'label'			=> esc_attr__( 'Footer Widget Area Background', 'lyfpro' ),
				'description'	=> esc_attr__( 'Background Settings for footer widget area', 'lyfpro' ),
				'default'		=> array(
					'background-color'		=> '#969696',
				    'background-image'		=> '',
				    'background-repeat'		=> 'repeat',
				    'background-position'	=> 'center center',
				    'background-size'		=> 'cover',
				    'background-attachment'	=> 'scroll',
				),
				'dsvy-output'	=> '.dsvy-footer-widget-area, .dsvy-footer-widget-area.dsvy-bg-color-custom:before',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-widget-color-switch',
				'label'			=> esc_attr__( 'Set Custom Text Color for Widget Area?', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-widget-text-color',
				'label'				=> esc_attr__( 'Footer Widget Area Text Color', 'lyfpro' ),
				'default'			=> 'transparent',
				'choices'			=> $pre_text_color_list,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-widget-color-switch',
						'operator'			=> '==',
						'value'				=> '1',
					)
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-copyright-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Footer Copyright Text Area', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage bottom footer area from here', 'lyfpro' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-copyright-bgcolor',
				'label'				=> esc_html__( 'Select Footer Copyright Area background color', 'lyfpro' ),
				'default'			=> 'transparent',
				'choices'			=> array_merge( array('gradientcolor'	=> get_template_directory_uri() . '/includes/images/precolor-gradientcolor.png',), $pre_color_list),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'footer-copyright-background',
				'label'			=> esc_attr__( 'Footer Copyright Area Background', 'lyfpro' ),
				'description'	=> esc_attr__( 'Background Settings for footer copyright area', 'lyfpro' ),
				'default'		=> array(
					'background-color'		=> '#0a0a0a',
				    'background-image'		=> '',
				    'background-repeat'		=> 'repeat',
				    'background-position'	=> 'center center',
				    'background-size'		=> 'cover',
				    'background-attachment'	=> 'scroll',
				),
				'dsvy-output'	=> '.dsvy-footer-text-area, .dsvy-footer-text-area.dsvy-bg-color-custom:before',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-copyright-color-switch',
				'label'			=> esc_attr__( 'Set Custom Text Color for Copyright Area?', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-copyright-text-color',
				'label'				=> esc_attr__( 'Footer Copyright Area Text Color', 'lyfpro' ),
				'default'			=> 'white',
				'choices'			=> array_merge( array('inherit' => get_template_directory_uri() . '/includes/images/precolor-inherit.png'), $pre_text_color_list ),
				'active_callback'	=> array(
					array(
						'setting'		=> 'footer-copyright-color-switch',
						'operator'		=> '==',
						'value'			=> '1',
					)
				),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'copyright-text',
				'label'			=> esc_attr__( 'Footer Copyright Text', 'lyfpro' ),
				'default'		=> sprintf( esc_attr__( 'Copyright &copy; %1$s %2$s, All Rights Reserved.', 'lyfpro' ), date('Y'), '<a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo('name') . '</a>' ),
				'priority'		=> 10,
				'partial_refresh'	=> array(
					'copyright-text'		=> array(
						'selector'			=> '.dsvy-footer-copyright-text-area',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('copyright-text'));
						},
					)
				),
			),
			array(
				'type'				=> 'image',
				'settings'			=> 'footer-logo',
				'label'				=> esc_attr__( 'Footer Logo', 'lyfpro' ),
				'description'		=> esc_attr__( 'This will appear after Copyright text', 'lyfpro' ),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-copyright-right-content',
				'label'			=> esc_attr__( 'Footer Right Area', 'lyfpro' ),
				'description'	=> esc_attr__( 'What you like to show at right side or copyright text', 'lyfpro' ),
				'default'		=> 'social',
				'choices'		=> array(
					'social'		=> esc_attr__( 'Show Social Links', 'lyfpro' ),
					'menu'			=> esc_attr__( 'Show Footer Menu', 'lyfpro' ),
				),
			),
		)
	),
	// Social Links Options
	'social_links_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Social Links Options', 'lyfpro' ),
			'description'	=> esc_attr__( 'You can use [dsvy-social-links] shortcode for social list with icon.', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => $social_options_array
	),
	// Blog Settings
	'blog_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Blog Options', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Blog Settings', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Settings for Blogroll, Category, Tag, Archives etc section.', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blogroll-view',
				'label'			=> esc_html__( 'Blogroll view', 'lyfpro' ),
				'default'		=> 'classic',
				'choices'		=> dsvy_element_template_list('blog', true),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blogroll-column',
				'label'			=> esc_html__( 'Blogroll column', 'lyfpro' ),
				'default'		=> '3',
				'choices'		=> $column_list,
				'active_callback'	=> array(
					array(
						'setting'		=> 'blogroll-view',
						'operator'		=> '!=',
						'value'			=> 'classic',
					)
				),
			),
			array(
			'type'			=> 'switch',
			'settings'		=> 'blog-show-related',
			'label'			=> esc_attr__( 'Show Related Post?', 'lyfpro' ),
			'default'		=> '0',
			'choices'     => array(
				'on'  => esc_attr__( 'Yes', 'lyfpro' ),
				'off' => esc_attr__( 'No', 'lyfpro' ),
			),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'blog-related-title',
				'label'			=> esc_attr__( 'Related Post Section Title', 'lyfpro' ), 
				'description'	=> esc_attr__( 'Related Area Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Related Post', 'lyfpro' ),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-related-count',
				'label'			=> esc_attr__( 'How many post you like to show', 'lyfpro' ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blog-related-column',
				'label'			=>  esc_html__('Related Post Column', 'lyfpro' ),
				'default'		=> '3',
				'choices'     => $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blog-related-style',
				'label'			=> esc_html__( 'Related Post View', 'lyfpro' ),
				'default'		=> '4',
				'choices'     => $blog_styles,
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'multicheck',
				'settings'		=> 'blog-social-share',
				'label'			=> esc_attr__( 'Social share for Blog', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select which social share buttons will appear on blog post.', 'lyfpro' ),
				'default'		=> array(),
				'choices'		=> dsvy_social_share_list('customizer'),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-classic-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Blog Classic Settings', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Settings for Blog Classic view.', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'blog-classic-limit-switch',
				'label'			=> esc_attr__( 'Limit Content Words for Blog Classic view?', 'lyfpro' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-classic-limit',
				'label'			=> esc_attr__( 'Set Word Limit for Blog Classic view', 'lyfpro' ),
				'description'	=> esc_attr__( 'This will add limited words before "Read More" link. This is useful if you didn\'t added Read More link in posts.', 'lyfpro' ),
				'default'		=> 15,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-classic-limit-switch',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-element-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Blog Style Elements (boxes) Settings', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Settings for Blog Style Elements.', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'blog-element-limit-switch',
				'label'			=> esc_attr__( 'Limit Content Words for Blog Element view?', 'lyfpro' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-element-limit',
				'label'			=> esc_attr__( 'Limit Words for Blog Element view', 'lyfpro' ),
				'description'	=> esc_attr__( 'This will add limited words before "Read More" link.', 'lyfpro' ),
				'default'		=> 30,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-element-limit-switch',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-sidebar-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Select sidebar position Page and Blog section.', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-post',
				'label'		=> esc_html__( 'Blog Sidebar', 'lyfpro' ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-category',
				'label'		=> esc_html__( 'Blog Category/Tag Sidebar', 'lyfpro' ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
		)
	),
	// Portfolio Settings
	'portfolio_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'lyfpro' ) , $portfolio_cpt_singular_title ) ,
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-settings',
				'default'		=> '<div class="designervily-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'lyfpro' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Options for Single %1$s Section', 'lyfpro' ), $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'portfolio-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $portfolio_single_style_array,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-detailsbox-settings',
				'default'		=> '<div class="designervily-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Details Box Options', 'lyfpro' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . esc_attr__( 'Details Box Settings', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-details-title',
				'label'			=> sprintf( esc_attr__( 'Single %1$s Details Box Title', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'description'	=> esc_attr__( 'Details Box Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Project info', 'lyfpro' ),
			),
			array(
				'type'			=> 'repeater',
				'label'			=> sprintf( esc_attr__( 'Single %1$s Details Box', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'row_label'		=> array(
					'type'			=> 'field',
					'value'			=> esc_attr__('Line', 'lyfpro' ),
					'field'			=> 'line_title',
				),
				'button_label'	=> esc_attr__('Add New Line', 'lyfpro' ),
				'settings'		=> 'portfolio-details',
				'fields'		=> array(
					'line_title'	=> array(
						'type'			=> 'text',
						'label'			=> esc_attr__( 'Line Title', 'lyfpro' ),
						'description'	=> esc_attr__( 'This will be the label for the line', 'lyfpro' ),
						'default'		=> '',
					),
					'line_type'		=> array(
						'type'			=> 'select',
						'label'			=> esc_attr__( 'Line Type', 'lyfpro' ),
						'description'	=> esc_attr__( 'This will be type for the line', 'lyfpro' ),
						'default'		=> 'text',
						'choices'		=> array(
							'text'			=> esc_attr__( 'Normal Text', 'lyfpro' ),
							'category'		=> esc_attr__( 'Category List (without link)', 'lyfpro' ),
							'category-link'	=> esc_attr__( 'Category List (with link)', 'lyfpro' ),
						)
					),
				),
				'default'		=> array(
					array(
						'line_title'	=> esc_attr__('Date', 'lyfpro'),
						'line_type'		=> 'text',
					),
					array(
						'line_title'	=> esc_attr__('Client', 'lyfpro'),
						'line_type'		=> 'text',
					),
					array(
						'line_title'	=> esc_attr__('Category', 'lyfpro'),
						'line_type'		=> 'category-link',
					),
					array(
						'line_title'	=> esc_attr__('Address', 'lyfpro'),
						'line_type'		=> 'text',
					),
    			),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-related-settings',
				'default'		=> '<div class="designervily-option-heading"><h2>' . sprintf( esc_html__( 'Related %1$s Options', 'lyfpro' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_html__( 'Options for Related %1$s', 'lyfpro' ), $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'portfolio-show-related',
				'label'			=> sprintf( esc_attr__( 'Show Related %1$s?', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-related-title',
				'label'			=> sprintf( esc_attr__( 'Related %1$s Section Title', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'description'	=> esc_attr__( 'Related Area Title', 'lyfpro' ),
				'default'		=> sprintf( esc_attr__( 'Related %1$s', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'portfolio-related-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-related-column',
				'label'			=> sprintf( esc_html__( 'Related %1$s Column', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-related-style',
				'label'			=> sprintf( esc_html__( 'Related %1$s View', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'default'		=> '2',
				'choices'		=> dsvy_element_template_list('portfolio', true),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-portfolio-cat-view',
				'default'		=> '<div class="designervily-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'lyfpro' ), $portfolio_cat_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'lyfpro' ) , $portfolio_cat_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-cat-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'lyfpro' ), $portfolio_cat_singular_title ),
				'default'		=> '1',
				'choices'		=> dsvy_element_template_list('portfolio', true),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-cat-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'lyfpro' ), $portfolio_cat_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'portfolio-cat-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'lyfpro' ), $portfolio_cpt_singular_title, $portfolio_cat_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-portfolio-sidebar-settings',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'lyfpro' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-portfolio',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'lyfpro' ), $portfolio_cpt_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-portfolio-category',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'lyfpro' ), $portfolio_cat_singular_title ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'portfolio-advanced-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Advanced Options', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'lyfpro' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'lyfpro' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Portfolio', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'lyfpro' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Portfolio', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'lyfpro' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'lyfpro' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'lyfpro' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'lyfpro' ), dsvy_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'portfolio' ),
				'priority'		=> 10,
			),
			// Portfolio Category
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'lyfpro' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Portfolio Categories', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'lyfpro' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Portfolio Category', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'lyfpro' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug', 'lyfpro' ),
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'lyfpro' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'lyfpro' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'lyfpro' ), dsvy_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'priority'		=> 10,
			),
		)
	),
	// Service Settings
	'service_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'lyfpro' ) , $service_cpt_singular_title ) ,
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-service-settings',
				'default'		=> '<div class="designervily-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'lyfpro' ), $service_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'lyfpro' ), $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'service-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'lyfpro' ), $service_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $service_single_style_array,
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'service-single-image-hide',
				'label'			=> sprintf( esc_attr__( 'Hide Featured Image on Single %1$s page? ', 'lyfpro' ), $service_cpt_singular_title ),
				'default'		=> '0',
				'choices'     => array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'service-show-related',
				'label'			=> sprintf( esc_attr__( 'Show Related %1$s', 'lyfpro' ), $service_cpt_singular_title ),
				'default'		=> '0',
				'choices'     => array(
					'on'  => esc_attr__( 'Yes', 'lyfpro' ),
					'off' => esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
			'type'			=> 'text',
			'settings'		=> 'service-related-title',
			'label'			=> sprintf( esc_attr__( 'Related %1$s Section Title', 'lyfpro' ), $service_cpt_singular_title ),
			'description'	=> esc_attr__( 'Related Area Title', 'lyfpro' ),
			'default'		=> sprintf( esc_attr__( 'Related %1$s', 'lyfpro' ), $service_cpt_singular_title ),
			'active_callback' => array(
				array(
					'setting'	=> 'service-show-related',
					'operator'	=> '==',
					'value'		=> '1',
				),
			),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'service-related-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show', 'lyfpro' ), $service_cpt_singular_title ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-related-column',
				'label'			=> sprintf( esc_html__( 'Related %1$s Column', 'lyfpro' ), $service_cpt_singular_title ),
				'default'		=> '3',
				'choices'     => $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-related-style',
				'label'			=> sprintf( esc_html__( 'Related %1$s View', 'lyfpro' ), $service_cpt_singular_title ),
				'default'		=> '2',
				'choices'     => dsvy_element_template_list('service', true),
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-service-cat-view',
				'default'		=> '<div class="designervily-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'lyfpro' ), $service_cat_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'lyfpro' ) , $service_cat_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-cat-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'lyfpro' ), $service_cat_singular_title ),
				'default'		=> '1',
				'choices'		=> dsvy_element_template_list('service', true),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-cat-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'lyfpro' ), $service_cat_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'service-cat-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'lyfpro' ), $service_cpt_singular_title, $service_cat_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-service-sidebar-settings',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'lyfpro' ) , $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-service',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'lyfpro' ), $service_cpt_singular_title ),
				'default'	=> 'left',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-service-category',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'lyfpro' ), $service_cat_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced - Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'service-advanced-heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Advanced Options', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'lyfpro' ) , $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'lyfpro' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Service', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'lyfpro' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Service', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'lyfpro' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'lyfpro' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'lyfpro' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'lyfpro' ), dsvy_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'service' ),
				'priority'		=> 10,
			),
			// Service Category
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'lyfpro' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Service Categories', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'lyfpro' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Service Category', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'lyfpro' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'lyfpro' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'lyfpro' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'lyfpro' ), dsvy_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'service-category' ),
				'priority'		=> 10,
			),
		)
	),
	// Team Member Settings
	'team_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'lyfpro' ) , $team_cpt_singular_title ) ,
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-team-settings',
				'default'		=> '<div class="designervily-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'lyfpro' ), $team_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'lyfpro' ), $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'team-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'lyfpro' ), $team_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $team_single_style_array,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-team-group-view',
				'default'		=> '<div class="designervily-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'lyfpro' ), $team_group_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'lyfpro' ) , $team_group_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'team-group-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'lyfpro' ), $team_group_singular_title ),
				'default'		=> '1',
				'choices'		=> dsvy_element_template_list('team', true),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'team-group-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'lyfpro' ), $team_group_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'team-group-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'lyfpro' ), $team_cpt_singular_title, $team_group_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-team-member-sidebar-settings',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'lyfpro' ) , $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-team-member',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'lyfpro' ), $team_cpt_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-team-group',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'lyfpro' ), $team_group_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'team_advanced_heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Advanced Options', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'lyfpro' ) , $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'lyfpro' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Team Members', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'lyfpro' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Team Member', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'lyfpro' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'lyfpro' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'lyfpro' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'lyfpro' ), dsvy_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'team' ),
				'priority'		=> 10,
			),
			// Team Member group
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'lyfpro' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Team Groups', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'lyfpro' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Team Group', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'lyfpro' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'lyfpro' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'lyfpro' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'lyfpro' ), dsvy_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'team-group' ),
				'priority'		=> 10,
			),
		)
	),
	// Testimonial Settings
	'testimonial_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'lyfpro' ) , $testimonial_cpt_singular_title ) ,
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'testimonial_advanced_heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Advanced Options', 'lyfpro' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'lyfpro' ) , $testimonial_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'lyfpro' ) , $testimonial_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Testimonials', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'lyfpro' ) , $testimonial_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Testimonial', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'lyfpro' ) , $testimonial_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Testimonial Categories', 'lyfpro' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'lyfpro' ) , $testimonial_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'lyfpro' ),
				'default'		=> esc_attr__( 'Testimonial Category', 'lyfpro' ),
				'priority'		=> 10,
			),
		)
	),
	// Search Settings
	'search_results_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Search Results options', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'search_results_heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Search Results Settings', 'lyfpro' ) . '</h2> <span>' . esc_attr__( 'Settings for Search Results page', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'search-results-text-limit',
				'label'			=> esc_attr__( 'Search Results Content Text Limit', 'lyfpro' ),
				'description'	=> esc_attr__( 'Show limited text for content of the results page/post etc.', 'lyfpro' ),
				'default'		=> 25,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-classic-limit-switch',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'no-results-title',
				'label'			=> esc_attr__( 'Title for "No Search Results" page', 'lyfpro' ),
				'description'	=> esc_attr__( 'Title to show when there is no search results', 'lyfpro' ),
				'default'		=> esc_attr__( 'No Results Found', 'lyfpro' ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'no-results-text',
				'label'			=> esc_attr__( 'Text for "No Search Results" page', 'lyfpro' ),
				'description'	=> esc_attr__( 'Text to show when there is no search results', 'lyfpro' ),
				'default'		=> esc_attr__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','lyfpro'),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'search-sidebar-options',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'lyfpro' ) . '</h2> <span>' . esc_html__( 'Select sidebar position for search results page.', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-search',
				'label'		=> esc_html__( 'Search Results Sidebar', 'lyfpro' ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
		)
	),
	// Error 404 Settings
	'error_404_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Error 404 options', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Error 404 Settings', 'lyfpro' ) . '</h2> <span>' . esc_attr__( 'Settings for error 404 page', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'error-404-heading',
				'label'			=> esc_attr__( 'Error 404 Heading', 'lyfpro' ),
				'description'	=> esc_attr__( 'This is heading for 404 page', 'lyfpro' ),
				'default'		=> esc_attr__( '404', 'lyfpro' ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'error-404-text',
				'label'			=> esc_attr__( 'Error 404 Text', 'lyfpro' ),
				'description'	=> esc_attr__( 'This is text for 404 page', 'lyfpro' ),
				'default'		=> esc_attr__( 'OOPS! THE PAGE YOU WERE LOOKING FOR, COULDN\'T BE FOUND.', 'lyfpro' ),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'error-404-show-search',
				'label'			=> esc_attr__( 'Show search form on 404 page', 'lyfpro' ),
				'default'		=> '1',
				'priority'		=> 10,
				'choices'		=> array(
					'on'			=> esc_attr__( 'Yes', 'lyfpro' ),
					'off'			=> esc_attr__( 'No', 'lyfpro' ),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_text_custom',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Error 404 Text Color', 'lyfpro' ) . '</h2> <span>' . esc_attr__( 'Settings for text color for 404 error page', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'e404-text-color',
				'label'				=> esc_attr__( 'Select 404 page text color', 'lyfpro' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_2_list,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_bg_custom',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Error 404 Background Option', 'lyfpro' ) . '</h2> <span>' . esc_attr__( 'Settings for background color/image for 404 error page', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'e404-bgcolor',
				'label'				=> esc_html__( 'Select 404 page background color', 'lyfpro' ),
				'default'			=> 'custom',
				'choices'			=> $pre_color_list,
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'e404-background',
				'label'			=> esc_attr__( 'Background', 'lyfpro' ),
				'description'	=> esc_attr__( 'Background Settings', 'lyfpro' ),
				'default'		=> array(				
					'background-color'      => 'rgba(0195,0,47,0.95)',
					'background-repeat'     => 'no-repeat',
					'background-position'   => 'center top',
					'background-size'       => 'cover',
					'background-attachment' => 'scroll',
				),
				'dsvy-output'	=> '.error404 .site-content-wrap, .error404 .dsvy-bg-color-custom > .site-content-wrap:before',
			),
		)
	),
	// Custom CSS/JS Options
	'custom_code_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'CSS/JS Code', 'lyfpro' ),
			'panel'			=> 'lyfpro_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'tracking_js_heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Tracking Code', 'lyfpro' ) . '</h2> <span>' . esc_attr__( 'Code for Google Tracking or other ', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'tracking-code',
				'label'			=> esc_attr__( 'Tracking Code', 'lyfpro' ),
				'description'	=> esc_attr__( 'This code will be added to HEAD element on your all pages.', 'lyfpro' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'cust_css_heading',
				'default'		=> '<div class="designervily-option-heading"><h2>' . esc_html__( 'Custom CSS Code', 'lyfpro' ) . '</h2> <span>' . esc_attr__( 'Custom CSS Code', 'lyfpro' ) . '</span></div>',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'css-code',
				'label'			=> esc_attr__( 'Custom CSS Code', 'lyfpro' ),
				'description'	=> esc_attr__( 'Add your custom CSS code here.', 'lyfpro' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'js-code',
				'label'			=> esc_attr__( 'Custom JS Code', 'lyfpro' ),
				'description'	=> esc_attr__( 'Add your custom JS code here.', 'lyfpro' ),
				'default'		=> '',
			),
		)
	),
);
// adding WooCommerce options
if( function_exists('is_woocommerce') ){
	$kirki_options_array2 = array();
	foreach( $kirki_options_array as $sections=>$settings ){
		$kirki_options_array2[$sections] = $settings;
		if( $sections == 'portfolio_options' ){
			$kirki_options_array2['woocommerce_options'] = array(
				'section_settings' => array(
					'title'			=> esc_attr__( 'WooCommerce Options', 'lyfpro' ),
					'panel'			=> 'lyfpro_base_options',
					'priority'		=> 160,
				),
				'section_fields' => array(
					// Heading Options
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-wc-shop',
						'label'		=> esc_html__( 'WooCommerce Shop Sidebar', 'lyfpro' ),
						'default'	=> 'right',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-wc-single',
						'label'		=> esc_html__( 'WooCommerce Single Product Sidebar', 'lyfpro' ),
						'default'	=> 'no',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'text',
						'settings'	=> 'wc-title',
						'label'		=> esc_attr__( 'WooCommerce Shop Page Title', 'lyfpro' ),
						'description'	=> esc_attr__( 'This will appear in Titlebar on Shop page.', 'lyfpro' ),
						'default'	=> esc_attr('Shop'),
					),
					array(
						'type'			=> 'select',
						'settings'		=> 'wc-related-count',
						'label'			=> esc_attr__( 'How many related products will be shown?', 'lyfpro' ),
						'description'	=> esc_attr__( 'How many related products will be shown on single product page?', 'lyfpro' ),
						'default'		=> '3',
						'choices'		=> array(
							'1'		=> esc_attr__( '1 product', 'lyfpro' ),
							'2'		=> esc_attr__( '2 products', 'lyfpro' ),
							'3'		=> esc_attr__( '3 products', 'lyfpro' ),
							'4'		=> esc_attr__( '4 products', 'lyfpro' ),
						),
					),
					array(
						'type'			=> 'switch',
						'settings'		=> 'wc-show-cart-icon',
						'label'			=> esc_attr__( 'Show Cart Icon in Header?', 'lyfpro' ),
						'description'	=> esc_attr__( 'Show or hide cart icon in header area. The icon will appear only if WooCommerce plugin is active.', 'lyfpro' ),
						'default'		=> '1',
						'choices'		=> array(
							'on'		=> esc_attr__( 'Yes', 'lyfpro' ),
							'off'		=> esc_attr__( 'No', 'lyfpro' ),
						),
					),
					array(
						'type'			=> 'switch',
						'settings'		=> 'wc-show-cart-amount',
						'label'			=> esc_attr__( 'Show Amount with Cart Icon in Header?', 'lyfpro' ),
						'description'	=> esc_attr__( 'Show or hide cart amount with cart icon in header area. The icon will appear only if WooCommerce plugin is active.', 'lyfpro' ),
						'default'		=> '1',
						'choices'		=> array(
							'on'		=> esc_attr__( 'Yes', 'lyfpro' ),
							'off'		=> esc_attr__( 'No', 'lyfpro' ),
						),
						'active_callback' => array( array(
							'setting'		=> 'wc-show-cart-icon',
							'operator'		=> '==',
							'value'			=> '1',
						) ),
					),
				)
			);
		}
	} // foreach
	$kirki_options_array = $kirki_options_array2;
}
