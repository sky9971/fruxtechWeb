<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class DSVY_TimelineElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'dsvy_timeline_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Lyfpro Timeline Element', 'lyfpro' );
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
				'label' => esc_attr__( 'Content Options', 'lyfpro' ),
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
		$repeater->add_control(
			'small_text',
			[
				'label' => __( 'Small Text', 'lyfpro' ),
				'type' => Controls_Manager::TEXT,
				'description' => __( 'Small text like year.', 'lyfpro' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'lyfpro' ),
				'type' => Controls_Manager::TEXT,
				'description' => __( 'Title Text.', 'lyfpro' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'desc_text',
			[
				'label' => __( 'Description', 'lyfpro' ),
				'type' => Controls_Manager::TEXTAREA,
				'description' => __( 'Description Text.', 'lyfpro' ),
				'show_label' => true,
			]
		);
        $this->add_control(
			'values',
			[
				'label'			=> esc_attr__( 'Values', 'lyfpro' ),
				'description'	=> esc_attr__( 'Enter values for graph - value, title and color.', 'lyfpro' ),
				'type'			=> Controls_Manager::REPEATER,
				'fields'		=> $repeater->get_controls(),
				'default'		=> [
					[
						'image'			=> get_template_directory_uri() . '/images/placeholder.png',
						'small_text'	=> esc_attr__( '2010', 'lyfpro' ),
						'title_text'	=> esc_attr__( 'Our new branch', 'lyfpro' ),
						'desc_text'		=> esc_attr__( 'Our 1st branch in USA', 'lyfpro' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/placeholder.png',
						'small_text'	=> esc_attr__( '2012', 'lyfpro' ),
						'title_text'	=> esc_attr__( 'Our new branch', 'lyfpro' ),
						'desc_text'		=> esc_attr__( 'Our 5th branch in USA', 'lyfpro' ),
					],
					[
						'image'			=> get_template_directory_uri() . '/images/placeholder.png',
						'small_text'	=> esc_attr__( '2014', 'lyfpro' ),
						'title_text'	=> esc_attr__( 'Our new branch', 'lyfpro' ),
						'desc_text'		=> esc_attr__( 'Our 7th branch in USA', 'lyfpro' ),
					],
				],
				'title_field' => '{{{ small_text }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		?>

		<div class="dsvy-timeline">

			<div class="dsvy-ele-header-area">
				<?php dsvy_heading_subheading($settings, true); ?>
			</div>

			<?php if( !empty($settings['values']) && count($settings['values'])>0 ) {
				foreach($settings['values'] as $value){
					$small_text	= ( !empty($value['small_text']) ) ? $value['small_text'] : '' ;
					$title_text	= ( !empty($value['title_text']) ) ? $value['title_text'] : '' ;
					$desc_text	= ( !empty($value['desc_text']) ) ? $value['desc_text'] : '' ;
					$image		= ( !empty($value['image']['url']) ) ? '<img src="'.esc_url($value['image']['url']).'" alt="'.esc_attr($title_text).'" />' : '' ;
					?>

					<div class="dsvy-timeline-inner">
						<div class=" col-sm-12 dsvy-ourhistory dsvy-ourhistory-type2 ">
							<div class="row dsvy-ourhistory-row">

								<div class="col-md-2 dsvy-ourhistory-left">
									<span class="label"><?php echo esc_html($small_text); ?></span>
								</div>
								<div class="col-md-10 col-sm-10 col-xs-10 dsvy-ourhistory-right">
									<span class="dsvy-timeline-image"><?php echo dsvy_esc_kses($image); ?></span>
									<span class="label"><?php echo esc_html($small_text); ?></span>
									<div class="content">
										<h4><?php echo esc_html($title_text); ?></h4>
										<div class="simple-text">
											<p><?php echo dsvy_esc_kses($desc_text); ?></p>
										</div>

										<?php echo dsvy_esc_kses($image); ?>

									</div>
								</div>
							</div> 
						</div>
					</div>

				<?php
				}
			}
			?>

		</div>

	    <?php
	}

	protected function _content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'dsvy-timeline-category', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register_widget_type( new DSVY_TimelineElement() );