<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class DSVY_PTableElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'dsvy_ptable_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Lyfpro Pricing Table Element', 'lyfpro' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-th-large';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'lyfpro_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
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

        // Highlight Column
        $this->start_controls_section(
            'highlight_col_section',
            [
                'label' => esc_attr__( 'Highlight Column', 'lyfpro' ),
            ]
        );
        $this->add_control(
			'highlight_col',
			[
				'label' => esc_attr__( 'Highlight Column', 'lyfpro' ),
				'description' => esc_attr__( 'Select column which is highlighted in pricing table', 'lyfpro' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1'	=> esc_attr__( 'First Column', 'lyfpro' ),
                    '2'	=> esc_attr__( 'Second Column', 'lyfpro' ),
					'3'	=> esc_attr__( 'Third Column', 'lyfpro' ),
					'4'	=> esc_attr__( 'Fourth Column', 'lyfpro' ),
					'5'	=> esc_attr__( 'Fifth Column', 'lyfpro' ),
				],
				'default' => esc_attr( '2' ),
			]
		);
		$this->add_control(
			'highlight_text',
			[
				'label' => esc_attr__( 'Highlight Text', 'lyfpro' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Featured', 'lyfpro' ),
				'placeholder' => esc_attr__( 'This will appear as special text', 'lyfpro' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		for( $x=1; $x<=5; $x++ ){

			//Content
			$this->start_controls_section(
				$x.'_col_section',
				[
					'label' => sprintf( esc_attr__( '%1$s Column in Pricing Table', 'lyfpro' ) , dsvy_ordinal($x) ) ,
				]
			);

			$this->add_control(
				$x.'_icon_type',
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
				$x.'_icon',
				[
					'label' => __( 'Icon', 'lyfpro' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
						$x.'_icon_type' => 'icon',
					]
				]

			);
			$this->add_control(
				$x.'_icon_image',
				[
					'label' => __( 'Select Image for Icon', 'lyfpro' ),
					'description' => __( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'lyfpro' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
						$x.'_icon_type' => 'image',
					]
				]
			);
			$this->add_control(
				$x.'_icon_text',
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
						$x.'_icon_type' => 'text',
					]
				]
			);

			$this->add_control(
				$x.'_heading',
				[
					'label'         => esc_attr__( 'Heading', 'lyfpro' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'lyfpro' ),
					'separator'     => 'after',
					'label_block'   => true,
				]
			);

			$this->add_control(
				$x.'_price',
				[
					'label'         => esc_attr__( 'Price', 'lyfpro' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter Price.', 'lyfpro' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol',
				[
					'label'         => esc_attr__( 'Currency symbol', 'lyfpro' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter currency symbol', 'lyfpro' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol_position',
				[
					'label'			=> esc_html__( 'Currency Symbol position', 'lyfpro' ),
					'description'	=> esc_html__( 'Select currency position.', 'lyfpro' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> 'after',
					'options' => [
						'after'		=> __( 'After Price', 'lyfpro' ),
						'before'	=> __( 'Before Price', 'lyfpro' ),
					],
				]
			);
			$this->add_control(
				$x.'_price_frequency',
				[
					'label'         => esc_attr__( 'Price Frequency', 'lyfpro' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'lyfpro' ),
					'separator'     => 'after',
				]
			);
			$this->add_control(
				$x.'_btn_text',
				[
					'label'         => esc_attr__( 'Button Text', 'lyfpro' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Like "Read More" or "Buy Now".', 'lyfpro' ),
				]
			);
			$this->add_control(
				$x.'_btn_link',
				[
					'label'         => esc_attr__( 'Button Link', 'lyfpro' ),
					'type'          => Controls_Manager::URL,
					'description'   => esc_attr__( 'Set link for button', 'lyfpro' ),
					'separator'     => 'after',
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'text',
				[
					'label' => __( 'Line Label', 'lyfpro' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'icon',
				[
					'label'     => __( 'Icon', 'lyfpro' ),
					'type'      => Controls_Manager::ICONS,
					'default'   => [
						'value'     => 'fas fa-check',
						'library'   => 'solid',
					],
				]

			);

			$this->add_control(
				$x.'_lines',
				[
					'label'			=> esc_attr__( 'Each Line (Features)', 'lyfpro' ),
					'description'	=> esc_attr__( 'Enter features that will be shown in spearate lines.', 'lyfpro' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'text'		=> esc_attr__( 'Line One', 'lyfpro' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Line Two', 'lyfpro' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Line Three', 'lyfpro' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
					],
					'title_field' => '{{{ text }}}',
				]
			);

			$this->end_controls_section();

		} // end for loop

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
				'label'			=> esc_attr__( 'Select Service View Style', 'lyfpro' ),
				'description'	=> esc_attr__( 'Slect Service View style.', 'lyfpro' ),
				'type'			=> 'dsvy_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> dsvy_element_template_list( 'pricing-table', true ),
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		?>

		<div class="designervily-ele designervily-ele-pricing-table designervily-ele-ptable-style-<?php echo esc_attr($style); ?>">

			<?php dsvy_heading_subheading($settings, true); ?>

			<?php
			$columns = array();
			for ($x = 0; $x <= 5; $x++) {
				if( !empty( $settings[$x.'_heading'] ) ){
					$columns[$x] = $x;
				}
			}

			$col_start_div	= '';
			$col_end_div	= '';
			if( !empty($columns) ){
				switch( count($columns) ){
					case 1:
						$col_start_div	= '<div class="dsvy-ptable-col col-md-12">';
						$col_end_div	= '</div>';
						break;

					case 2:
						$col_start_div	= '<div class="dsvy-ptable-col col-md-6">';
						$col_end_div	= '</div>';
						break;

					case 3:
						$col_start_div	= '<div class="dsvy-ptable-col col-md-4">';
						$col_end_div	= '</div>';
						break;

					case 4:
						$col_start_div	= '<div class="dsvy-ptable-col col-md-3">';
						$col_end_div	= '</div>';
						break;

					case 5:
						$col_start_div	= '<div class="dsvy-ptable-col col-md-20percent">';
						$col_end_div	= '</div>';
						break;
				}
			}

			if( !empty($columns) ){

				$return .= '<div class="dsvy-ptable-cols row multi-columns-row">';

				foreach( $columns as $col => $highlight_col ){

					$icon = '';
					if( !empty($settings[$col.'_icon_type']) ){

						if( $settings[$col.'_icon_type']=='text' ){
							$icon = '<div class="dsvy-ptable-icon"><div class="dsvy-ptable-icon-wrapper dsvy-ptable-icon-type-text">' . $settings[$col.'_icon_text'] . '</div></div>';
							$icon_type_class = 'text';

						} else if( $settings[$col.'_icon_type']=='image' ){
							$icon_image = '<img src="'.esc_url($settings[$col.'_icon_image']['url']).'" alt="'.esc_attr($settings[$col.'_heading']).'" />';
							$icon = '<div class="dsvy-ptable-icon"><div class="dsvy-ptable-icon-wrapper dsvy-ptable-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $settings[$col.'_icon_type']=='none' ){
							$icon = '';
							$icon_type_class = 'none';
						} else {

							// This is real icon html code
							$icon       = '<div class="dsvy-ptable-icon"><div class="dsvy-ptable-icon-wrapper"><i class="' . $settings[$col.'_icon']['value'] . '"></i></div></div>';
							$icon_type_class = 'icon';

							wp_enqueue_style( 'elementor-icons-'.$settings[$col.'_icon']['library']);
						}
					}

					// add highlighted class
					$featured = '';
					if( $settings['highlight_col'] == $col ){
						$col_start_div = str_replace( 'class="', 'class="dsvy-pricing-table-featured-col ', $col_start_div );
						$featured = ( !empty($settings['highlight_col']) ) ? '<div class="dsvy-ptablebox-featured-w">'.$settings['highlight_text'].'</div>' : '' ;
					} else {
						$col_start_div = str_replace( 'class="dsvy-pricing-table-featured-col ', 'class="', $col_start_div );
					}

					// Heading
					$heading = ( !empty($settings[$col.'_heading']) ) ? '<h3 class="designervily-ptable-heading">'.$settings[$col.'_heading'].'</h3><div class="designervily-sep"></div>' : '' ;

					// Currency Symbol
					$currency_symbol = ( !empty($settings[$col.'_cur_symbol']) ) ? '<div class="designervily-ptable-symbol">'.$settings[$col.'_cur_symbol'].'</div>' : '' ;

					// Price Frequency
					$frequency = ( !empty($settings[$col.'_price_frequency']) ) ? '<div class="designervily-ptable-frequency">'.$settings[$col.'_price_frequency'].'</div>' : '' ;

					// Price				
					$price = ( !empty($settings[$col.'_price']) ) ? '<div class="designervily-ptable-price">'.$settings[$col.'_price'].'</div>' : '' ;
					// Add currently symbol in price
					$price = ( !empty($settings[$col.'_cur_symbol_position']) && $settings[$col.'_cur_symbol_position']=='before' ) ? $currency_symbol.' '.$price : $price.' '.$currency_symbol ;

					// list of features
					$lines_html = '';
					$values     = (array) $settings[$col.'_lines'];
					if( is_array($values) && count($values)>0 ){
						foreach ( $values as $data ) {

							$list_icon = '<i class="fa fa-check"></i> ';
							if( !empty($data['icon']['value']) ){
								$list_icon = '<i class="' . $data['icon']['value'] . '"></i> ';
								wp_enqueue_style( 'elementor-icons-'.$data['icon']['library']);
							}
							$lines_html .= isset( $data['text'] ) ? '<div class="dsvy-ptable-line">'.$list_icon.$data['text'].'</div>' : '';
						}
					}

					// Button
					$button = '';
					if( !empty($settings[$col.'_btn_text']) && !empty($settings[$col.'_btn_link']['url']) ){
						$button = '<div class="dsvy-ptable-btn">' . dsvy_link_render($settings[$col.'_btn_link'], 'start' ) . dsvy_esc_kses($settings[$col.'_btn_text']) . dsvy_link_render($settings[$col.'_btn_link'], 'end' ) . '</div>';
					}

					// Template output
					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/theme-parts/pricing-table/pricing-table-style-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;
				}

				$return .= '</div>';

			}

			echo dsvy_esc_kses($return);
			?>

		</div><!-- designervily-ele designervily-ele-pricing-table -->

		<?php

	}

	protected function _content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'dsvy-ptable-category', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register_widget_type( new DSVY_PTableElement() );