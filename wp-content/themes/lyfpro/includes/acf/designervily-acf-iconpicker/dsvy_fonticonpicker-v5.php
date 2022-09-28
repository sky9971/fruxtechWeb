<?php

class acf_field_dsvy_fonticonpicker extends acf_field {

	// Vars
	var $settings, 		// Will hold info such as dir / path
		$defaults,		// Will hold default field options
		$json_content; 	// Hold the content of icons JSON config file

	/**
	 *  __construct
	 *
	 *  @since	1.0.0
	 */
	function __construct() {

		// Vars
		$this->name = 'dsvy_fonticonpicker';
		$this->label = esc_html__('Icon Picker', 'lyfpro');
		$this->category = esc_attr__("jQuery", 'lyfpro');

		parent::__construct();

    	// Settings
		$this->settings = array(
			'dir' 		=>  get_template_directory_uri() . '/includes/acf/designervily-acf-iconpicker/',
			'path'		=>	get_template_directory_uri() . '/includes/acf/designervily-acf-iconpicker/',
			'config' 	=>  get_template_directory_uri() . '/includes/acf/designervily-acf-iconpicker/icons/config.json', //	plugins_url('icons/config.json', __FILE__),
			'icons'		=>	get_template_directory_uri() . '/includes/acf/designervily-acf-iconpicker/icons/css/fontello.css', // plugins_url('icons/css/fontello.css', __FILE__),
			'version' 	=> 	'1.0.0',
			'library' 	=> 	'fontawesome'
		);

		// Apply a filter so that you can load icon set from theme
		$this->settings = apply_filters( 'acf/acf_field_dsvy_fonticonpicker/settings', $this->settings );

		// Enqueue icons style in the frontend
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue' ) );

	}

	/**
	 *  frontend_enqueue()
	 *
	 *  @since	1.0.0
	 */
	function frontend_enqueue() {
		// Register icons style
	}

	/**
	 *  create_field()
	 *
	 *  @param	$field - An array holding all the field's data
	 *
	 *  @since	1.0.0
	 */
	function render_field( $field ) {

		$library_list = dsvy_icon_library_list();

		$library = ( !empty($field['library']) ) ? trim($field['library']) : 'fontawesome' ;

		$lib_options = $library_list[$library];

		$data_library = str_replace('-','_', $library);

		// icons SELECT input
		echo '<select name="'. $field['name'] .'" id="'. $field['name'] .'" class="acf-iconpicker dsvy-iconpicker" data-library="'.$data_library.'" data-common-class="'.$lib_options['common_class'].'" data-class-prefix="'.$lib_options['class_prefix'].'" data-selected="'.$field['value'].'">';
		echo '<option value="">'.esc_html__('None', 'lyfpro').'</option>';
		echo '</select>';

	}

	/**
	 *  input_admin_enqueue_scripts()
	 *
	 *  @since	1.0.0
	 */
	function input_admin_enqueue_scripts() {

		// Scripts
		wp_register_script( 'acf-dsvy_fonticonpicker', $this->settings['dir'] . 'js/jquery.dsvy_fonticonpicker.min.js', array('jquery'), $this->settings['version'] );
		wp_register_script( 'acf-dsvy_fonticonpicker-input', $this->settings['dir'] . 'js/input.js', array('acf-dsvy_fonticonpicker'), $this->settings['version'] );
		wp_enqueue_script( 'acf-dsvy_fonticonpicker-input' );

		// Styles
		wp_register_style( 'acf-dsvy_fonticonpicker-style', $this->settings['dir'] . 'css/jquery.dsvy_fonticonpicker.min.css', false, $this->settings['version'] );
		wp_register_style( 'acf-dsvy_fonticonpicker-icons', $this->settings['icons'] );
		wp_enqueue_style( array( 'acf-dsvy_fonticonpicker-style', 'acf-dsvy_fonticonpicker-icons' ) );

		// Icon class array file
		wp_enqueue_script( 'acf-dsvy_fonticonpicker-iconarray', get_template_directory_uri() . '/includes/customizer/designervily-icon-picker/designervily-icon-picker.js', array('jquery','acf-dsvy_fonticonpicker'), $this->settings['version'] );
		wp_enqueue_style( 'designervily-icon-picker-base',  get_template_directory_uri() . '/includes/customizer/designervily-icon-picker/designervily-icon-picker.css' );

	}

} // Class acf_field_dsvy_fonticonpicker

// create field
new acf_field_dsvy_fonticonpicker();