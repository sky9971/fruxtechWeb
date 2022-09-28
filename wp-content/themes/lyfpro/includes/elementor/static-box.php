<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class DSVY_StaticBoxElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'dsvy_staticbox_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Lyfpro Static Box Element', 'lyfpro' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-boxes';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'lyfpro_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-carousel-theme' );
	}

	protected function register_controls() {

		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'Heading and Subheading', 'lyfpro' ),
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
			'title_link',
			[
				'label' => esc_attr__( 'Title Link', 'lyfpro' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label' => esc_attr__( 'Subtitle', 'lyfpro' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'This is Subtitle', 'lyfpro' ),
				'placeholder' => esc_attr__( 'Enter your subtitle', 'lyfpro' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle_link',
			[
				'label' => esc_attr__( 'Subtitle Link', 'lyfpro' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'lyfpro' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_attr__( 'Type your description here', 'lyfpro' ),
			]
		);
		$this->add_control(
			'reverse_title',
			[
				'label' => esc_attr__( 'Reverse Title', 'lyfpro' ),
				'description' => esc_attr__( 'Show sub-title before title', 'lyfpro' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'lyfpro' ),
				'label_off' => esc_attr__( 'No', 'lyfpro' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_attr__( 'Alignment', 'lyfpro' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_attr__( 'Left', 'lyfpro' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'lyfpro' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'lyfpro' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .dsvy-ele-header-area' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
				'default' => 'left',
			]
		);

		// Tags
		$this->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'lyfpro' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => esc_attr__( 'Title Tag', 'lyfpro' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h2' ),
			]
		);
		$this->add_control(
			'subtitle_tag',
			[
				'label' => esc_attr__( 'SubTitle Tag', 'lyfpro' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h4' ),
			]
		);
		$this->end_controls_section();

		//Content
		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Boxes Options', 'lyfpro' ),
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'lyfpro' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'		=> 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default'	=> 'large',
				'separator'	=> 'none',
			]
		);

		$repeater->add_control(
			'label',
			[
				'label' => __( 'Box Title', 'lyfpro' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Box Title', 'lyfpro' ),
				'placeholder' => __( 'Box Title', 'lyfpro' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'smalltext',
			[
				'label' => __( 'Box Content', 'lyfpro' ),
				'default' => __( 'Box Content', 'lyfpro' ),
				'placeholder' => __( 'Box Content', 'lyfpro' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
        $this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Boxes', 'lyfpro' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is first box', 'lyfpro' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'lyfpro' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is second box', 'lyfpro' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'lyfpro' ),
					],
				],
				'title_field' => '{{{ label }}}',
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
				'label'			=> esc_attr__( 'Select StaticBox View Style', 'lyfpro' ),
				'description'	=> esc_attr__( 'Slect StaticBox View style.', 'lyfpro' ),
				'type'			=> 'dsvy_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> dsvy_element_template_list( 'static-box', true ),
			]
		);
		$this->end_controls_section();

		// Appearance
		$this->start_controls_section(
			'appearance_section',
			[
				'label' => esc_attr__( 'Column and Carousel Options', 'lyfpro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'view-type',
			[
				'label'			=> esc_attr__( 'How you like to view each Post box?', 'lyfpro' ),
				'description'	=> esc_attr__( 'Show as carousel view or simple row-column view.', 'lyfpro' ),
				'type'			=> 'dsvy_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'row-column',
				'options'		=> [
					'row-column'	=> esc_url( get_template_directory_uri() . '/includes/images/row-column.png' ),
					'carousel'		=> esc_url( get_template_directory_uri() . '/includes/images/carousel.png' ),
				]
			]
		);

		// Row Column: Heading
		$this->add_control(
			'row_col_options',
			[
				'label' => esc_attr__( 'Row-Column Options', 'lyfpro' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'row-column',
				]
			]
		);

		// Carousel: Heading
		$this->add_control(
			'carousel_options',
			[
				'label' => esc_attr__( 'Carousel Options', 'lyfpro' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'carousel',
				]
			]
		);
		// Carousel : Loop
		$this->add_control(
			'carousel-loop',
			[
				'label'			=> esc_attr__( 'Carousel: Loop', 'lyfpro' ),
				'description'	=> esc_attr__( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'lyfpro' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'lyfpro' ),
					'0'				=> esc_attr__( 'No', 'lyfpro' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Autoplay
		$this->add_control(
			'carousel-autoplay',
			[
				'label'			=> esc_attr__( 'Carousel: Autoplay', 'lyfpro' ),
				'description'	=> esc_attr__( 'Autoplay of carousel.', 'lyfpro' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'lyfpro' ),
					'0'				=> esc_attr__( 'No', 'lyfpro' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Center
		$this->add_control(
			'carousel-center',
			[
				'label'			=> esc_attr__( 'Carousel: Center', 'lyfpro' ),
				'description'	=> esc_attr__( 'Center item. Works well with even an odd number of items.', 'lyfpro' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'lyfpro' ),
					'0'				=> esc_attr__( 'No', 'lyfpro' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Nav
		$this->add_control(
			'carousel-nav',
			[
				'label'			=> esc_attr__( 'Carousel: Nav', 'lyfpro' ),
				'description'	=> esc_attr__( 'Show next/prev buttons.', 'lyfpro' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'lyfpro' ),
					'0'				=> esc_attr__( 'No', 'lyfpro' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Dots
		$this->add_control(
			'carousel-dots',
			[
				'label'			=> esc_attr__( 'Carousel: Dots', 'lyfpro' ),
				'description'	=> esc_attr__( 'Show dots navigation.', 'lyfpro' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'lyfpro' ),
					'0'				=> esc_attr__( 'No', 'lyfpro' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : autoplaySpeed
		$this->add_control(
			'carousel-autoplayspeed',
			[
				'label'			=> esc_attr__( 'Carousel: autoplaySpeed', 'lyfpro' ),
				'description'	=> esc_attr__( 'autoplay speed.', 'lyfpro' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '1000',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		// Columns
		$this->add_control(
			'columns',
			[
				'label'			=> esc_attr__( 'View in Column', 'lyfpro' ),
				'description'	=> esc_attr__( 'Select how many column to show.', 'lyfpro' ),
				'type'			=> 'dsvy_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '3',
				'options'		=> [
					'1'				=> esc_url( get_template_directory_uri() . '/includes/images/column-1.png' ),
					'2'				=> esc_url( get_template_directory_uri() . '/includes/images/column-2.png' ),
					'3'				=> esc_url( get_template_directory_uri() . '/includes/images/column-3.png' ),
					'4'				=> esc_url( get_template_directory_uri() . '/includes/images/column-4.png' ),
					'5'				=> esc_url( get_template_directory_uri() . '/includes/images/column-5.png' ),
					'6'				=> esc_url( get_template_directory_uri() . '/includes/images/column-6.png' ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		?>

		<?php
		// Starting container
		$start_div = dsvy_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'static-box',
			'data'		=> $settings
		) );

		echo dsvy_esc_kses($start_div);

		dsvy_heading_subheading($settings, true);
		?>

		<div class="dsvy-element-posts-wrapper row multi-columns-row">

		<?php
		$return = '';
		foreach( $settings['boxes'] as $box ){

			$image_html		= '' ;
			$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="designervily-static-box-desc">'.esc_html($box['smalltext']).'</div>' : '' ;
			$label_html		= ( !empty($box['label']) ) ? '<div class="designervily-box-title"><h4>'.esc_html($box['label']).'</h4></div>' : '' ;
			if( !empty($box['image']) ){
				$image_html = '<img src="'.$box['image']['url'].'" alt="'.esc_attr($box['label']).'" />';
			}

			// Template
			if( file_exists( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) ) ){

				$return .= dsvy_element_block_container( array(
					'position'	=> 'start',
					'column'	=> $columns,
					'cpt'		=> 'static-box',
					'style'		=> $style

				) );

				ob_start();
				include( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) );
				$return .= ob_get_contents();
				ob_end_clean();

				$return .= dsvy_element_block_container( array(
					'position'	=> 'end',
				) );

			}

		} // foreach

		echo dsvy_esc_kses($return);
		?>

		</div>

		<?php

		// Ending wrapper of the whole arear
		$end_div = dsvy_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'static-box',
			'data'		=> $settings
		) );
		echo dsvy_esc_kses($end_div);
		?>

	    <?php
	}

	protected function _content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new DSVY_StaticBoxElement() );