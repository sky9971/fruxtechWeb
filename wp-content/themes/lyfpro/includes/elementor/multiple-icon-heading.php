<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class DSVY_MultipleIconHeading extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'dsvy_multiple_icon_heading';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Lyfpro Multiple Icon Heading Element', 'lyfpro' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-grip-horizontal';
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
				'default'		=> '',
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
				'prefix_class' => 'dsvy-align-',
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
				'label' => esc_attr__( 'Data Options', 'lyfpro' ),
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'icon_type',
			[
				'label' => esc_attr__( 'Icon Type', 'lyfpro' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon'	=> esc_attr__( 'Icon', 'lyfpro' ),
					'image'	=> esc_attr__( 'Image', 'lyfpro' ),
					'text'	=> esc_attr__( 'Text', 'lyfpro' ),
				],
				'default' => esc_attr( 'icon' ),
			]
		);
        $repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'lyfpro' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'icon',
                ]
            ]

		);
		$repeater->add_control(
			'box_number',
			[
				'label' => esc_attr__( 'Box Number', 'lyfpro' ),
				'description' => esc_attr__( '(Optional) Add box number like "01". This will be shown as steps.', 'lyfpro' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
				'placeholder' => esc_attr__( 'Enter number', 'lyfpro' ),
                'label_block' => true,
                'condition' => [
                    'icon_type' => 'icon',
                ]
			]
		);

        $repeater->add_control(
			'icon_image',
			[
				'label' => __( 'Select Image for Icon', 'lyfpro' ),
				'description' => __( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'lyfpro' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_type' => 'image',
                ]
			]
		);
        $repeater->add_control(
			'icon_text',
			[
				'label' => esc_attr__( 'Text for Icon', 'lyfpro' ),
				'description' => esc_attr__( 'The text will appear at icon position. This should be small text like "01" or "PX"', 'lyfpro' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '01', 'lyfpro' ),
				'placeholder' => esc_attr__( 'Enter text here', 'lyfpro' ),
                'label_block' => true,
                'condition' => [
                    'icon_type' => 'text',
                ]
			]
		);

		$repeater->add_control(
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
		$repeater->add_control(
			'title_link',
			[
				'label' => esc_attr__( 'Title Link', 'lyfpro' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
			'subtitle_link',
			[
				'label' => esc_attr__( 'Subtitle Link', 'lyfpro' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'lyfpro' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Type your description here', 'lyfpro' ),
			]
		);

		$repeater->add_control(
			'btn_title',
			[
				'label' => esc_attr__( 'Button Title', 'lyfpro' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Read More', 'lyfpro' ),
				'separator'		=> 'before',
				'placeholder' => esc_attr__( 'Enter button title here', 'lyfpro' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label' => esc_attr__( 'Button Link', 'lyfpro' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);

		// Tags
		$repeater->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'lyfpro' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
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

            /******************** */

        $this->add_control(
            'ihboxes',
            [
                'label'			=> esc_attr__( 'Each Icon Heading Box', 'lyfpro' ),
                'description'	=> esc_attr__( 'Enter each icon heading box.', 'lyfpro' ),
                'type'			=> Controls_Manager::REPEATER,
				'fields'		=> $repeater->get_controls(),
				'default'		=> [
					[
						'icon_type'		=> 'icon',
						'icon'			=> [
							'value'			=> 'far fa-bookmark',
							'library'		=> 'fa-regular',
						],
						'box_number'	=> '',
						'icon_image'	=> NULL,
						'icon_text'		=> NULL,
						'title'			=> esc_attr__('Welcome to our site', 'lyfpro'),
						'title_link'	=> [
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						],
						'subtitle'		=> esc_attr__('This is subtitle', 'lyfpro'),
						'subtitle_link'	=> [
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes' => '',
						],
					  'desc'			=> '',
					  'btn_title'		=> esc_attr__('Read More', 'lyfpro'),
					  'btn_link'		=> [
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
					  ],
					  'title_tag'		=> 'h2',
					  'subtitle_tag'	=> 'h4',
					  '_id'				=> '87b743a',
					],
					[
						'icon_type'		=> 'icon',
						'icon'			=> [
							'value'			=> 'far fa-clipboard',
							'library'		=> 'fa-regular',
						],
						'box_number'	=> '',
						'icon_image'	=> NULL,
						'icon_text'		=> NULL,
						'title'			=> esc_attr__('Welcome to our site', 'lyfpro'),
						'title_link'	=> [
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						],
						'subtitle'		=> esc_attr__('This is subtitle', 'lyfpro'),
						'subtitle_link'	=> [
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes' => '',
						],
					  'desc'			=> '',
					  'btn_title'		=> esc_attr__('Read More', 'lyfpro'),
					  'btn_link'		=> [
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
					  ],
					  'title_tag'		=> 'h2',
					  'subtitle_tag'	=> 'h4',
					  '_id'				=> '87b743a',
					],
					[
						'icon_type'		=> 'icon',
						'icon'			=> [
							'value'			=> 'far fa-hand-peace',
							'library'		=> 'fa-regular',
						],
						'box_number'	=> '',
						'icon_image'	=> NULL,
						'icon_text'		=> NULL,
						'title'			=> esc_attr__('Welcome to our site', 'lyfpro'),
						'title_link'	=> [
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
						],
						'subtitle'		=> esc_attr__('This is subtitle', 'lyfpro'),
						'subtitle_link'	=> [
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes' => '',
						],
					  'desc'			=> '',
					  'btn_title'		=> esc_attr__('Read More', 'lyfpro'),
					  'btn_link'		=> [
							'url'				=> '',
							'is_external'		=> '',
							'nofollow'			=> '',
							'custom_attributes'	=> '',
					  ],
					  'title_tag'		=> 'h2',
					  'subtitle_tag'	=> 'h4',
					  '_id'				=> '87b743a',
					],
				],

                'title_field' => '{{{ title }}}',
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
				'label'			=> esc_attr__( 'Select Icon Heading View Style', 'lyfpro' ),
				'description'	=> esc_attr__( 'Slect Icon Heading View style.', 'lyfpro' ),
				'type'			=> 'dsvy_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'prefix'		=> 'dsvy-ihbox dsvy-ihbox-style-',
				'options'		=> dsvy_element_template_list( 'icon-heading', true ),
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
		$return = '';

		// Starting container
		$start_div = dsvy_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'miconheading',
			'data'		=> $settings
		) );

		echo dsvy_esc_kses($start_div);
		?>

		<div class="dsvy-ele-header-area">
			<?php dsvy_heading_subheading($settings, true); ?>
		</div>

		<div class="dsvy-element-posts-wrapper row multi-columns-row">

		<?php

        foreach( $ihboxes as $box ){

			$box['style'] = $style;

			// Template
			if( file_exists( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) ) ){

				$return .= dsvy_element_block_container( array(
					'position'	=> 'start',
					'column'	=> $columns,
					'cpt'		=> 'miconheading',
					'taxonomy'	=> 'category',
					'style'		=> $style,
				) );

				ob_start();
				dsvy_icon_heading_box( $box );
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
			'cpt'		=> 'miconheading',
			'data'		=> $settings
		) );
		echo dsvy_esc_kses($end_div);

	}

	protected function _content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'dsvy-portfolio-category', 'hide_empty' => false ) );
	  	$cat = array();
	  	foreach( $category as $item ) {
			$cat_count = get_category( $item );

	     	if( $item ) {
	        	$cat[$item->slug] = $item->name . ' ('.$cat_count->count.')';
	     	}
	  	}
	  	return $cat;
	}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new DSVY_MultipleIconHeading() );