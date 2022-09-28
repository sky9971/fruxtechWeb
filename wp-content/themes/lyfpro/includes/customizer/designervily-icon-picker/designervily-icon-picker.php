<?php

/*
 *  Customizer - Designervily Icon picker
 */

if( !function_exists('dsvy_admin_enqueue_icon_library') ){
function dsvy_admin_enqueue_icon_library() {
	// Icon libraries
	$icon_libraries = dsvy_icon_library_list();
	wp_enqueue_style( 'elementor-icons-shared-0', get_template_directory_uri() . '/libraries/font-awesome/css/fontawesome.min.css' );
	foreach( $icon_libraries as $library_id=>$library_data ){
		wp_enqueue_style( $library_id, $library_data['css_path'] );
	}

}
}
add_action( 'admin_enqueue_scripts', 'dsvy_admin_enqueue_icon_library', 55 );

if( !function_exists('dsvy_enqueue_icon_base') ){
function dsvy_enqueue_icon_base() {
	// Icon class array file
	wp_enqueue_script( 'acf-dsvy_fonticonpicker-iconarray', get_template_directory_uri() . '/includes/customizer/designervily-icon-picker/designervily-icon-picker.js', array('jquery','acf-dsvy_fonticonpicker') );
	wp_enqueue_style( 'designervily-icon-picker-base',  get_template_directory_uri() . '/includes/customizer/designervily-icon-picker/designervily-icon-picker.css' );
}
}
add_action( 'admin_enqueue_scripts', 'dsvy_enqueue_icon_base' );

add_action( 'customize_register', function( $wp_customize ) {
	/**
	 * The custom control class
	 */
	class Kirki_Controls_Designervily_Icon_Picker_Control extends Kirki_Control_Base {
		public $type = 'designervily_icon_picker';

		//public function content_template() {
		public function render_content() {

			// Define all icon libraries
			$icon_libraries = dsvy_icon_library_list();

			// Default icons for each library
			$default_icons = array();
			foreach( $icon_libraries as $library_id=>$library_data ){
				$default_icons[$library_id] = $library_data['default_icon'];
			}

			// Process value
			$allvalues       = $this->value();
			$allvalues_array = explode( ';', $allvalues );
			$active_lib      = '';

			foreach( $allvalues_array as $value ){
				$value_array = explode( ' ', $value );
				foreach( $icon_libraries as $library_id=>$library_data ){
					if( $library_data['common_class'] == $value_array[0] ){
						$default_icons[$library_id] = $value;

						$active_lib = ( empty($active_lib) ) ? $library_id : $active_lib ;
					}
				}
			}

			// First active library
			$selected_library = '';
			$allvalues_first = explode( ' ', $allvalues );
			$allvalues_first = $allvalues_first[0];
			foreach( $icon_libraries as $library_id=>$library_data ){
				if( $library_data['common_class'] == $allvalues_first ){
					$selected_library = $library_id;
				}
			}

			?>

			<div class="designervily-icon-picker-element">

				<label class="customizer-text">
					<?php if( !empty($this->label) ) : ?><span class="customize-control-title"><?php echo esc_attr( $this->label ) ?></span><?php endif; ?>
					<?php if( !empty($this->description) ) : ?><span class="description customize-control-description"><?php echo esc_attr( $this->description ) ?></span><?php endif; ?>
				</label>

				<!-- Value will be stored here -->
				<div style="display:block; width:1px; height:1px; opacity:0;">
					<input type="text" value="<?php echo esc_attr($value); ?>" class="kirki-designervily-icon-picker-control" data-id="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?>>
				</div>

				<!-- Icon library selector -->
				<div class="designervily-select-icon-library-wrapper">
					<select name="_customize-designervily-icon-picker-<?php echo esc_attr( $this->id ); ?>test" class="designervily-select-icon-library" >
						<?php foreach( $icon_libraries as $library_id=>$library_data ) : ?>
							<option value="<?php echo esc_attr($library_id) ?>" <?php selected( $selected_library, $library_id ) ?> ><?php echo esc_attr($library_data['name']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<!-- Icon list wrapper -->
				<div class="designervily-select-icons-list-wrapper">

				<?php foreach( $icon_libraries as $library_id=>$library_data ) : ?>
					<div class="designervily-select-icon-list-wrapper designervily-select-icon-list-wrapper-<?php echo esc_attr($library_id); ?>" <?php if( $selected_library != $library_id ): ?> style="display:none;" <?php endif; ?> >

						<div class="designervily-icon-picker-ele-w" data-dsvy-library="<?php echo esc_attr($library_id); ?>" data-dsvy-selected-icon="<?php echo esc_attr($default_icons[$library_id]); ?>" data-dsvy-common-class="<?php echo esc_attr($library_data['common_class']); ?>" data-dsvy-class-prefix="<?php echo esc_attr($library_data['class_prefix']); ?>"  >
							<div class="designervily-icon-picker-ele-icon"><i class="<?php echo esc_attr( $default_icons[$library_id] ); ?>"></i></div>
							<div class="designervily-icon-picker-ele-arrow"><i class="fa fa-arrow-down"></i></div>
							<div class="clear clr clearfix"></div>
						</div>
						<div class="designervily-icon-picker-list-w" style="display:none;"></div>
					</div>
				<?php endforeach; ?>

				</div>

			</div>

			<?php
		}
	}
	// Register our custom control with Kirki
	add_filter( 'kirki_control_types', function( $controls ) {
		$controls['designervily_icon_picker'] = 'Kirki_Controls_Designervily_Icon_Picker_Control';
		return $controls;
	} );

} );
