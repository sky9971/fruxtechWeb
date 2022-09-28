<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading 
 */
class DSVY_IconHeading extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'dsvy_icon_heading';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Lyfpro Icon Heading Element', 'lyfpro' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-star';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'lyfpro_category' ];
	}

	protected function register_controls() {

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr__( 'Content', 'lyfpro' ),
			]
		);
        $this->add_control(
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
        $this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'lyfpro' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'icon',
                ]
            ]

		);
		$this->add_control(
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

        $this->add_control(
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
        $this->add_control(
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
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Type your description here', 'lyfpro' ),
			]
		);

		$this->add_control(
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
		$this->add_control(
			'btn_link',
			[
				'label' => esc_attr__( 'Button Link', 'lyfpro' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
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

		// Style
		$this->start_controls_section(
			'select_style_section',
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

		//Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Typo Settings', 'lyfpro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			//Title
			$this->add_control(
				'heading_title',
				[
					'label' => esc_attr__( 'Title', 'lyfpro' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_attr__( 'Color', 'lyfpro' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .dsvy-element-heading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .dsvy-element-heading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .dsvy-element-heading',
				]
			);
			$this->add_responsive_control(
				'title_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'lyfpro' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .dsvy-element-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			//Subtitle
			$this->add_control(
				'heading_stitle',
				[
					'label' => esc_attr__( 'Subtitle', 'lyfpro' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'stitle_color',
				[
					'label' => esc_attr__( 'Color', 'lyfpro' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .dsvy-element-subheading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .dsvy-element-subheading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'stitle_typography',
					'selector' => '{{WRAPPER}} .dsvy-element-subheading',
				]
			);
			$this->add_responsive_control(
				'stitle_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'lyfpro' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .dsvy-element-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Description
			$this->add_control(
				'heading_desc',
				[
					'label' => esc_attr__( 'Description', 'lyfpro' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'desc_color',
				[
					'label' => esc_attr__( 'Color', 'lyfpro' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .dsvy-heading-desc' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .dsvy-heading-desc',
				]
			);
			$this->add_responsive_control(
				'desc_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'lyfpro' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .dsvy-heading-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
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
				$subtitle_html	= '<'. dsvy_esc_kses($subtitle_tag) . ' class="dsvy-element-heading">
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

	protected function _content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new DSVY_IconHeading() );