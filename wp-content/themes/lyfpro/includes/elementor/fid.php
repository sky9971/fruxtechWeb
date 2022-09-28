<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class DSVY_FIDElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'dsvy_fid_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Lyfpro Facts-in-Digits Element', 'lyfpro' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-sync-alt';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'lyfpro_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'numinate' );
		wp_enqueue_script( 'jquery-circle-progress' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Content Options', 'lyfpro' ),
			]
        );

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'lyfpro' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
                ],
            ]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_attr__( 'Title', 'lyfpro' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Welcome to our site', 'lyfpro' ),
				'placeholder' => esc_attr__( 'Enter your title', 'lyfpro' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'digit',
			[
				'label' => esc_attr__( 'Rotating Digit', 'lyfpro' ),
				'description' => esc_attr__( 'Enter rotating number digit here.', 'lyfpro' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '85',
			]
		);

		$this->add_control(
			'interval',
			[
				'label' => esc_attr__( 'Rotating digit Interval', 'lyfpro' ),
				'description' => esc_attr__( 'Enter rotating interval number here.', 'lyfpro' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '5',
			]
		);

		$this->add_control(
			'before',
			[
				'label' => esc_attr__( 'Text Before Number (Prefix)', 'lyfpro' ),
				'description' => esc_attr__( 'Enter text which appear just before the rotating numbers.', 'lyfpro' ),
				'separator' => 'before',
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'beforetextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'lyfpro' ),
				'description' => esc_attr__('Select text style for the text.', 'lyfpro') . '<br>' . esc_attr__('Superscript Example:','lyfpro') . dsvy_esc_kses('X<sup>2</sup>')  . '<br>' . esc_attr__('Subscript Example:','lyfpro') . dsvy_esc_kses('X<sub>2</sub>'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'lyfpro' ),
					'sub'		=> esc_attr__( 'Subscript', 'lyfpro' ),
					'span'		=> esc_attr__( 'Normal', 'lyfpro' ),
				]
			]
		);

		$this->add_control(
			'after',
			[
				'label' => esc_attr__( 'Text After Number (Suffix)', 'lyfpro' ),
				'description' => esc_attr__( 'Enter text which appear just after the rotating numbers.', 'lyfpro' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'aftertextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'lyfpro' ),
				'description' => esc_attr__('Select text style for the text.', 'lyfpro') . '<br>' . esc_attr__('Superscript Example:','lyfpro') . dsvy_esc_kses('X<sup>2</sup>')  . '<br>' . esc_attr__('Subscript Example:','lyfpro') . dsvy_esc_kses('X<sub>2</sub>'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'lyfpro' ),
					'sub'		=> esc_attr__( 'Subscript', 'lyfpro' ),
					'span'		=> esc_attr__( 'Normal', 'lyfpro' ),
				]
			]
		);

		$this->end_controls_section();

		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Select Style', 'lyfpro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select FID View Style', 'lyfpro' ),
				'description'	=> esc_attr__( 'Slect FID View style.', 'lyfpro' ),
				'type'			=> 'dsvy_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'prefix'		=> 'dsvy-fid dsvy-fid-style-',
				'options'		=> dsvy_element_template_list( 'facts-in-digits', true ),
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		$return = $icon = '';
		$global_color		= '#ff00ff';
		$secondary_color	= '#f0ff0f';
		$light_bg_color		= '#ff00ff';
		$blackish_color		= '#000000';

		if( function_exists('dsvy_get_base_option') ){
			// Global Color
			$global_color = dsvy_get_base_option('global-color');

			// Secondary Color
			$secondary_color = dsvy_get_base_option('secondary-color');

			// Light Background Color
			$light_bg_color = dsvy_get_base_option('light-bg-color');

			// Blackish Color
			$blackish_color = dsvy_get_base_option('blackish-color');

			// Secondary Color
			$gradient_color = dsvy_get_base_option('gradient-color');
			$gradient1 = ( !empty($gradient_color['first']) ) ? $gradient_color['first'] : '#ff00ff' ;
			$gradient2 = ( !empty($gradient_color['last'])  ) ? $gradient_color['last']  : '#ff0000' ;

		}

		//  Icon
		if( !empty($settings['icon']['value']) ){ 
			//wp_enqueue_style($i_type);
			$icon = '<div class="dsvy-sbox-icon-wrapper"><i class="' . esc_attr($settings['icon']['value']) . '"></i></div>';
		} 

		//  Before or after text
		$before_text = '';
		$after_text  = '';
		if( !empty($before) && !empty($beforetextstyle) && in_array( $beforetextstyle, array( 'sup', 'sub', 'span' ) ) ){
			$before_text = '<'. esc_attr($beforetextstyle).'>'.esc_html($before).'</'.esc_attr($beforetextstyle).'>';
		}
		if( !empty($after) && !empty($aftertextstyle) && in_array( $aftertextstyle, array( 'sup', 'sub', 'span' ) ) ){
			$after_text = '<'. esc_attr($aftertextstyle).'>'.esc_html($after).'</'.esc_attr($aftertextstyle).'>';
		}

		if( file_exists( locate_template( '/theme-parts/fid/fid-style-'.esc_attr($style).'.php', false, false ) ) ){

			$return .= '<div class="designervily-ele designervily-ele-fid designervily-ele-fid-style-'.esc_attr($style).' ">';

			ob_start();
			include( locate_template( '/theme-parts/fid/fid-style-'.esc_attr($style).'.php', false, false ) );
			$return .= ob_get_contents();
			ob_end_clean();

			$return .= '</div>';

		}

		echo dsvy_esc_kses($return);

	}

	protected function _content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new DSVY_FIDElement() );