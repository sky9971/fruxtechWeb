<?php
/**
 *  Common Meta Boxes for all CPT
 */
if( !function_exists('dsvy_set_metabox') ){
function dsvy_set_metabox(){
	//  Check if ACF is enabled
	if( function_exists('acf_add_local_field_group') ){
		if (class_exists('RevSlider')) {
			$rev_slider_list_array = array();
			$slider			= new RevSlider();
			$allArrSliders	= $slider->get_sliders();
			if( is_array($allArrSliders) && count($allArrSliders)>0 ){
				foreach ($allArrSliders as $revSlider) {
					// Getting thumb of slider
					$params = $revSlider->get_overview_data();
					$first_slide_image_thumb = ( !empty($params['bg']['src']) ) ? $params['bg']['src'] : get_template_directory_uri() . '/includes/images/sr-no-thumb.png' ;
					$rev_slider_list_array[ $revSlider->getAlias() ] = '<div data-balloon="' . esc_attr( $revSlider->getTitle() ) . ' (' . esc_attr( $revSlider->getAlias() ) . ')" data-balloon-pos="down"><img class="dsvy-revslider-thumb" src="'.esc_url($first_slide_image_thumb).'" /></div>';
				}
				$rev_slider_option_array = array(
					'key'				=> 'dsvy-revolution-slider',
					'label'				=> esc_attr__('Select Revolution Slider', 'lyfpro'),
					'name'				=> 'dsvy-revolution-slider',
					'type'				=> 'radio',
					'instructions'		=> esc_attr__('Select that appear in header area', 'lyfpro'),
					'required'			=> 0,
					'conditional_logic' => array(
						array(
							array(
								'field'		=> 'dsvy-slider-type',
								'operator'	=> '==',
								'value'		=> 'revolution-slider',
							),
						),
					),
					'wrapper'			=> array(
						'width'				=> '60',
						'class'				=> 'dsvy-radio-image-selector',
						'id'				=> '',
					),
					'choices'			=> $rev_slider_list_array,
					'allow_null'		=> 0,
					'other_choice'		=> 0,
					'default_value'		=> '',
					'layout'			=> 'horizontal',
					'return_format'		=> 'value',
					'save_other_choice' => 0,
				);
			} else {
				$rev_slider_option_array = array(
					'key'				=> 'dsvy-message-no-slider-in-revslider',
					'label'				=> esc_attr__('No Slider Found', 'lyfpro'),
					'name'				=> 'dsvy-message-no-slider-in-revslider',
					'type'				=> 'message',
					'instructions'		=> '',
					'required'			=> 0,
					'conditional_logic' => array(
						array(
							array(
								'field'		=> 'dsvy-slider-type',
								'operator'	=> '==',
								'value'		=> 'revolution-slider',
							),
						),
					),
					'wrapper'			=> array(
						'width'				=> '60',
						'class'				=> '',
						'id'				=> '',
					),
					'message'			=> esc_attr__('No slider found in Revolution Slider. Please create some slider from Admin > Slider Revolution section.', 'lyfpro'),
					'new_lines'			=> '',
					'esc_html'			=> 0,
				);
			}
		} else {
			$rev_slider_option_array = array(
				'key'				=> 'dsvy-message-no-revslider-plugin',
				'label'				=> esc_attr__('Revolution Slider plugin not installed', 'lyfpro'),
				'name'				=> 'dsvy-message-no-revslider-plugin',
				'type'				=> 'message',
				'instructions'		=> '',
				'required'			=> 0,
				'conditional_logic' => array(
					array(
						array(
							'field'		=> 'dsvy-slider-type',
							'operator'	=> '==',
							'value'		=> 'revolution-slider',
						),
					),
				),
				'wrapper'			=> array(
					'width'				=> '60',
					'class'				=> '',
					'id'				=> '',
				),
				'message'			=> esc_attr__('Revolution Slider plugin not installed. Please install it from Admin > Appearance > Install Plugins section.', 'lyfpro'),
				'new_lines'			=> '',
				'esc_html'			=> 0,
			);
		}
		acf_add_local_field_group(array(
			'key'		=> 'dsvy-general-settings',
			'title'		=> esc_attr__('Lyfpro - General Settings', 'lyfpro'),
			'fields'	=> array_merge(
				array(
					array(  // Tab - Slider Options
						'key'				=> 'dsvy-tab-slider-options',
						'label'				=> esc_attr__('Header Slider Options', 'lyfpro'),
						'name'				=> 'dsvy-tab-slider-options',
						'type'				=> 'tab',
						'instructions'		=> '',
						'required'			=> 0,
						'conditional_logic' => 0,
						'wrapper'			=> array(
							'width'				=> '',
							'class'				=> '',
							'id'				=> '',
						),
						'placement'			=> 'top',
						'endpoint'			=> 0,
					),
					array(
						'key'				=> 'dsvy-slider-type',
						'label'				=> esc_attr__('Slider', 'lyfpro'),
						'name'				=> 'dsvy-slider-type',
						'type'				=> 'radio',
						'instructions'		=> esc_attr__('Select Slider which appear in header area', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic' => 0,
						'wrapper'			=> array(
							'width'				=> '20',
							'class'				=> '',
							'id'				=> '',
						),
						'choices'			=> array(
							''					=> esc_attr__('No Slider', 'lyfpro'),
							'revolution-slider' => esc_attr__('Revolution Slider', 'lyfpro'),
							'custom-code'		=> esc_attr__('Custom Code for Slider', 'lyfpro'),
						),
						'allow_null'		=> 0,
						'other_choice'		=> 0,
						'default_value'		=> '',
						'layout'			=> 'vertical',
						'return_format'		=> 'value',
						'save_other_choice' => 0,
					),
				),
				array($rev_slider_option_array),
				array(
					array(
						'key'				=> 'dsvy-custom-slider-code',
						'label'				=> esc_attr__('Custom Slider Code', 'lyfpro'),
						'name'				=> 'dsvy-custom-slider-code',
						'type'				=> 'textarea',
						'instructions'		=> '',
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'dsvy-slider-type',
									'operator'	=> '==',
									'value'		=> 'custom-code',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '60',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
						'placeholder'		=> '',
						'maxlength'			=> '',
						'rows'				=> '',
						'new_lines'			=> '',
					),
				),
				array(
					array(
						'key'				=> 'dsvy-slider-curved-style',
						'label'				=> esc_attr__('Add Curved style at slider bottom', 'lyfpro'),
						'name'				=> 'dsvy-slider-curved-style',
						'type'				=> 'true_false',
						'instructions'		=> esc_attr__('Select YES to to show curved effect at slider bottom.', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'dsvy-slider-type',
									'operator'	=> '!=',
									'value'		=> '',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '20',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> 0,
						'ui'				=> 1,
						'ui_on_text'		=> '',
						'ui_off_text'		=> '',
					),
				),
				array(
					array(
						'key'				=> 'dsvy-slider-below-content',
						'label'				=> esc_attr__('Content below slider', 'lyfpro'),
						'name'				=> 'dsvy-slider-below-content',
						'type'				=> 'textarea',
						'instructions'		=> esc_attr__('This content will appear below slider. HTML allowed.', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'dsvy-slider-type',
									'operator'	=> '!=',
									'value'		=> '',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '100',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
						'placeholder'		=> '',
						'maxlength'			=> '',
						'rows'				=> '',
						'new_lines'			=> '',
					),
				),
				// TAB - Titlebar Options
				array(
					array(
						'key'				=> 'dsvy-tab-titlebar-options',
						'label'				=> esc_attr__('Titlebar Options', 'lyfpro'),
						'name'				=> 'dsvy-tab-titlebar-options',
						'type'				=> 'tab',
						'instructions'		=> '',
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '',
							'class'				=> '',
							'id'				=> '',
						),
						'placement'			=> 'top',
						'endpoint'			=> 0,
					),
					array(
						'key'				=> 'dsvy-titlebar-hide',
						'label'				=> esc_attr__('Hide Titlebar?', 'lyfpro'),
						'name'				=> 'dsvy-titlebar-hide',
						'type'				=> 'true_false',
						'instructions'		=> esc_attr__('Select YES to hide Titlebar.', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '20',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> 0,
						'ui'				=> 1,
						'ui_on_text'		=> '',
						'ui_off_text'		=> '',
					),
					array(
						'key'				=> 'dsvy-titlebar-title',
						'label'				=> esc_attr__('Custom title to show in Titlebar', 'lyfpro'),
						'name'				=> 'dsvy-titlebar-title',
						'type'				=> 'text',
						'instructions'		=> esc_attr__('(Optional) This text will be available as Title in Titlebar. Leave blank for default title', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'dsvy-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '40',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
						'maxlength'			=> '',
					),
					array(
						'key'				=> 'dsvy-titlebar-subtitle',
						'label'				=> esc_attr__('Custom Sub-title to show in Titlebar', 'lyfpro'),
						'name'				=> 'dsvy-titlebar-subtitle',
						'type'				=> 'text',
						'instructions'		=> esc_attr__('(Optional) This text will be available as Sub-title in Titlebar. Leave blank for default title', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'dsvy-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '40',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
						'maxlength'			=> '',
					),
					array(
						'key'				=> 'dsvy-titlebar-bg-img',
						'label'				=> esc_attr__('Titlebar BG image', 'lyfpro'),
						'name'				=> 'dsvy-titlebar-bg-img',
						'type'				=> 'image',
						'instructions'		=> esc_attr__('(Optional) Set titlebar background image for this page/post only.', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'dsvy-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'return_format'		=> 'url',
						'preview_size'		=> 'thumbnail',
						'library'			=> 'all',
						'min_width'			=> '',
						'min_height'		=> '',
						'min_size'			=> '',
						'max_width'			=> '',
						'max_height'		=> '',
						'max_size'			=> '',
						'mime_types'		=> '',
					),
					array(
						'key'				=> 'dsvy-titlebar-bg-color',
						'label'				=> esc_attr__('Titlebar BG Color', 'lyfpro'),
						'name'				=> 'dsvy-titlebar-bg-color',
						'type'				=> 'color_picker',
						'instructions'		=> esc_attr__('(Optional) Set background color for Titlebar.', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'dsvy-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
					),
					array(
						'key'				=> 'dsvy-titlebar-bg-color-opacity',
						'label'				=> esc_attr__('Titlebar BG Color Opacity', 'lyfpro'),
						'name'				=> 'dsvy-titlebar-bg-color-opacity',
						'type'				=> 'range',
						'instructions'		=> esc_attr__('(Optional) Set opacity for background color set for Titlebar.', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'conditional_logic'	=> array(
							array(
								array(
									'field'		=> 'dsvy-titlebar-hide',
									'operator'	=> '!=',
									'value'		=> '1',
								),
							),
						),
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '0.5',
						'min'				=> 0,
						'max'				=> 1,
						'step'				=> '0.01',
						'prepend'			=> '',
						'append'			=> '',
					),
				),

				// TAB - Background Options
				array(
					array(
						'key'				=> 'dsvy-tab-background-options',
						'label'				=> esc_attr__('Background Options', 'lyfpro'),
						'name'				=> 'dsvy-tab-background-options',
						'type'				=> 'tab',
						'instructions'		=> '',
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '',
							'class'				=> '',
							'id'				=> '',
						),
						'placement'			=> 'top',
						'endpoint'			=> 0,
					),
					array(
						'key'				=> 'dsvy-bg-img',
						'label'				=> esc_attr__('BG image', 'lyfpro'),
						'name'				=> 'dsvy-bg-img',
						'type'				=> 'image',
						'instructions'		=> esc_attr__('(Optional) Set background image for this page/post only.', 'lyfpro'),
						'required'			=> 0,
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'return_format'		=> 'url',
						'preview_size'		=> 'thumbnail',
						'library'			=> 'all',
						'min_width'			=> '',
						'min_height'		=> '',
						'min_size'			=> '',
						'max_width'			=> '',
						'max_height'		=> '',
						'max_size'			=> '',
						'mime_types'		=> '',
					),
					array(
						'key'				=> 'dsvy-bg-color',
						'label'				=> esc_attr__('BG Color', 'lyfpro'),
						'name'				=> 'dsvy-bg-color',
						'type'				=> 'color_picker',
						'instructions'		=> esc_attr__('(Optional) Set background color.', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '',
					),
					array(
						'key'				=> 'dsvy-bg-color-opacity',
						'label'				=> esc_attr__('BG Color Opacity', 'lyfpro'),
						'name'				=> 'dsvy-bg-color-opacity',
						'type'				=> 'range',
						'instructions'		=> esc_attr__('(Optional) Set opacity for background color.', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
						'wrapper'			=> array(
							'width'				=> '33',
							'class'				=> '',
							'id'				=> '',
						),
						'default_value'		=> '0.5',
						'min'				=> 0,
						'max'				=> 1,
						'step'				=> '0.01',
						'prepend'			=> '',
						'append'			=> '',
					),
				)
			),
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'post',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'page',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-team-member',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-portfolio',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-service',
					),
				),
			),
			'menu_order'		=> 0,
			'position'			=> 'normal',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement'	=> 'label',
		));

		// Common Metabox - Sidebar
		acf_add_local_field_group(array(
			'key'		=> 'dsvy-sidebar-settings',
			'title'		=> 'Lyfpro - Sidebar Settings',
			'fields'	=> array(
				array(
					'key'				=> 'dsvy-sidebar',
					'label'				=> esc_attr__('Select Sidebar', 'lyfpro'),
					'name'				=> 'dsvy-sidebar',
					'type'				=> 'radio',
					'instructions'		=> esc_attr__('Select sidebar for this page/post only', 'lyfpro'),
					'required'			=> 0,
					'conditional_logic'	=> 0,
					'wrapper'           => array(
						'width'				=> '',
						'class'				=> 'dsvy-radio-image-selector',
						'id'				=> '',
					),
					'choices'          => array(
						'global'			=> dsvy_esc_kses('<img src="' . get_template_directory_uri() . '/includes/images/sidebar-global.png" />'),
						'left'				=> dsvy_esc_kses('<img src="' . get_template_directory_uri() . '/includes/images/sidebar-left.png" />'),
						'right'				=> dsvy_esc_kses('<img src="' . get_template_directory_uri() . '/includes/images/sidebar-right.png" />'),
						'no'				=> dsvy_esc_kses('<img src="' . get_template_directory_uri() . '/includes/images/sidebar-no.png" />'),
					),
					'allow_null'		=> 0,
					'other_choice'		=> 0,
					'default_value'		=> '',
					'layout'			=> 'horizontal',
					'return_format'		=> 'value',
					'save_other_choice' => 0,
				),
			),
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'post',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'page',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-team-member',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-portfolio',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-service',
					),
				),
			),
			'menu_order'		=> 0,
			'position'			=> 'side',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'	=> '',
			'active'			=> 1,
			'description'		=> '',
		));
	};
}
}
add_action( 'init', 'dsvy_set_metabox', 21 );
/**
 *  Team Member Meta Box
 */
if( !function_exists('dsvy_set_team_metabox') ){
function dsvy_set_team_metabox(){
	// Social share options list
	$social_options_array = array();
	$social_list = dsvy_social_links_list();
	foreach( $social_list as $social ){
		$social_options_array[] = array(
			'key'			=> esc_attr( $social['id'] ),
			'label'			=> esc_attr( $social['label'] ),
			'name'			=> esc_attr( $social['id'] ),
			'type'			=> 'text',
			'instructions'	=> '',
			'required'		=> 0,
			'conditional_logic'	=> 0,
			'wrapper'		=> array(
				'width'			=> '',
				'class'			=> '',
				'id'			=> '',
			),
			'default_value'	=> '',
			'placeholder'	=> '',
			'prepend'		=> '',
			'append'		=> '',
			'maxlength'		=> '',
		);
	}
	if( function_exists('acf_add_local_field_group') ){
		acf_add_local_field_group(array(
			'key'				=> 'dsvy-tab-team-details',
			'title'				=> esc_attr__('Lyfpro - Member\'s Details', 'lyfpro'),
			'fields'			=> array(
				array(
					'key'				=> 'dsvy-tab-team-details',
					'label'				=> esc_attr__('General Details', 'lyfpro'),
					'name'				=> 'dsvy-tab-team-details',
					'type'				=> 'tab',
					'instructions'		=> '',
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'placement'			=> 'top',
					'endpoint'			=> 0,
				),
				array(
					'key'				=> 'dsvy-team-details',
					'label'				=> esc_attr__('Team Member\'s details', 'lyfpro'),
					'name'				=> 'dsvy-team-details',
					'type'				=> 'group',
					'instructions'		=> esc_attr__('Team Member details', 'lyfpro'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'layout'			=> 'row',
					'sub_fields' => array(
						array(
							'key'				=> 'designation',
							'label'				=> esc_attr__('Designation', 'lyfpro'),
							'name'				=> 'designation',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'wrapper'			=> array(
								'width'				=> '33',
								'class'				=> '',
								'id'				=> '',
							),
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key'				=> 'phone',
							'label'				=> esc_attr__('Phone', 'lyfpro'),
							'name'				=> 'phone',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'wrapper'			=> array(
								'width'				=> '33',
								'class'				=> '',
								'id'				=> '',
							),
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key'				=> 'email',
							'label'				=> esc_attr__('Email', 'lyfpro'),
							'name'				=> 'email',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'wrapper'			=> array(
								'width'				=> '33',
								'class'				=> '',
								'id'				=> '',
							),
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
						array(
							'key'				=> 'sitetitle',
							'label'				=> esc_attr__('Website Title', 'lyfpro'),
							'name'				=> 'sitetitle',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
						array(
							'key'				=> 'siteurl',
							'label'				=> esc_attr__('Website URL', 'lyfpro'),
							'name'				=> 'siteurl',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'wrapper'			=> array(
								'width'				=> '33',
								'class'				=> '',
								'id'				=> '',
							),
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
						array(
							'key'				=> 'fax',
							'label'				=> esc_attr__('Fax', 'lyfpro'),
							'name'				=> 'fax',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'wrapper'			=> array(
								'width'				=> '33',
								'class'				=> '',
								'id'				=> '',
							),
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
						array(
							'key'		=> 'short-info',
							'label'		=> esc_attr__('One Line Info', 'lyfpro'),
							'name'		=> 'short-info',
							'type'		=> 'text',
							'instructions' => esc_attr__('This will appear on "Designervily Team Box" Style-3 only. This will not appear on single view.', 'lyfpro'),
						),
						array(
							'key'		=> 'short-description',
							'label'		=> esc_attr__('Short Description', 'lyfpro'),
							'name'		=> 'short-description',
							'type'		=> 'wysiwyg',
							'instructions' => esc_attr__('This will appear on single view only.', 'lyfpro'),
						),
						array(
							'key'				=> 'progress_1_label',
							'label'				=> esc_attr__('Progress Bar 1 - Label', 'lyfpro'),
							'name'				=> 'progress_1_label',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
						array(
							'key'				=> 'progress_1_number',
							'label'				=> esc_attr__('Progress Bar 1 - Number', 'lyfpro'),
							'name'				=> 'progress_1_number',
							'type'				=> 'text',
							'instructions'		=> esc_attr__('Add number between 1 to 100', 'lyfpro'),
							'required'			=> 0,
							'conditional_logic' => 0,
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
						array(
							'key'				=> 'progress_2_label',
							'label'				=> esc_attr__('Progress Bar 2 - Label', 'lyfpro'),
							'name'				=> 'progress_2_label',
							'type'				=> 'text',
							'instructions'		=> '',
							'required'			=> 0,
							'conditional_logic' => 0,
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
						array(
							'key'				=> 'progress_2_number',
							'label'				=> esc_attr__('Progress Bar 2 - Number', 'lyfpro'),
							'name'				=> 'progress_2_number',
							'type'				=> 'text',
							'instructions'		=> esc_attr__('Add number between 1 to 100', 'lyfpro'),
							'required'			=> 0,
							'conditional_logic' => 0,
							'default_value'		=> '',
							'placeholder'		=> '',
							'prepend'			=> '',
							'append'			=> '',
							'maxlength'			=> '',
						),
					),
				),
				array(
					'key'				=> 'dsvy-tab-social-links',
					'label'				=> esc_attr__('Social Links', 'lyfpro'),
					'name'				=> 'dsvy-tab-social-links',
					'type'				=> 'tab',
					'instructions'		=> '',
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'placement'			=> 'top',
					'endpoint'			=> 0,
				),
				array(
					'key'			=> 'dsvy-social-links',
					'label'			=> esc_attr__('Social Links', 'lyfpro'),
					'name'			=> 'dsvy-social-links',
					'type'			=> 'group',
					'instructions'	=> esc_attr__('Select Social links for this Team Member', 'lyfpro'),
					'required'		=> 0,
					'conditional_logic'	=> 0,
					'wrapper'		=> array(
						'width'			=> '',
						'class'			=> '',
						'id'			=> '',
					),
					'layout'		=> 'row',
					'sub_fields'	=> $social_options_array,
				),
			),
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-team-member',
					),
				),
			),
			'menu_order'		=> 0,
			'position'			=> 'normal',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'	=> '',
			'active'			=> 1,
			'description'		=> '',
		));
	};
}
}
add_action( 'init', 'dsvy_set_team_metabox', 22 );
if( !function_exists('dsvy_set_client_metabox') ){
function dsvy_set_client_metabox(){
	if( function_exists('acf_add_local_field_group') ){
	acf_add_local_field_group(array(
		'key'		=> 'dsvy-client-logo',
		'title'		=> esc_attr__('Client Logo Hover', 'lyfpro'),
		'fields'	=> array(
			array(
				'key'				=> 'dsvy-logo-image-for-hover',
				'label'				=> esc_attr__('Select Logo for Hover effect. This logo will appear on mouse over.', 'lyfpro'),
				'name'				=> 'dsvy-logo-image-for-hover',
				'type'				=> 'image',
				'required'			=> 0,
				'conditional_logic'	=> 0,
				'return_format'		=> 'id',
				'preview_size'		=> 'thumbnail',
				'library'			=> 'all',
			),
		),
		'location'	=> array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'dsvy-client',
				),
			),
		),
		'menu_order'		=> 0,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement'	=> 'label',
		'hide_on_screen'	=> '',
		'active'			=> 1,
		'description'		=> esc_attr__('Hover image of client logo', 'lyfpro'),
	));
	}
	if( function_exists('acf_add_local_field_group') ){
		acf_add_local_field_group(array(
			'key'		=> 'dsvy-client-logo-link',
			'title'		=> esc_attr__('Client Logo Link', 'lyfpro'),
			'fields'	=> array(
				array(
					'key'				=> 'dsvy-logo-link',
					'label'				=> esc_attr__('Set Link for the logo', 'lyfpro'),
					'name'				=> 'dsvy-logo-link',
					'type'				=> 'link',
					'return_format'		=> 'url',
				),
			),
			'location'	=> array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-client',
					),
				),
			),
			'menu_order'		=> 0,
			'position'			=> 'side',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement'	=> 'label',
			'hide_on_screen'	=> '',
			'active'			=> 1,
			'description'		=> esc_attr__('Hover image of client logo', 'lyfpro'),
		));
		}
	}
}
add_action( 'init', 'dsvy_set_client_metabox', 23 );

if( !function_exists('dsvy_post_format_metaboxes') ){
function dsvy_post_format_metaboxes(){

	if( function_exists('acf_add_local_field_group') ){

		// Post Format - Video
		acf_add_local_field_group(array(
			'key'					=> 'dsvy-pformat-video-metabox',
			'title'					=> esc_attr__('Lyfpro - Post Format Video Options', 'lyfpro'),
			'fields'				=> array(
				array(
					'key'				=> 'dsvy-pformat-video',
					'label'				=> esc_attr__('Video URL (like Youtube or Vimeo) OR Embed Code', 'lyfpro'),
					'name'				=> 'dsvy-pformat-video',
					'type'				=> 'textarea',
					'instructions'		=> esc_attr__('Add Youtube or Vimeo URL here. Also you can paste embed code here.', 'lyfpro'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
			),
			'location'				=> array(
				array(
					array(
						'param'			=> 'post_format',
						'operator'		=> '==',
						'value'			=> 'video',
					),
				),
			),
			'menu_order'			=> 0,
			'position'				=> 'acf_after_title',
			'style'					=> 'default',
			'label_placement'		=> 'left',
			'instruction_placement'	=> 'label',
			'hide_on_screen'		=> '',
			'active'				=> true,
			'description'			=> '',
		));

		// Post Format - Quote
		acf_add_local_field_group(array(
			'key'					=> 'dsvy-pformat-quote-metabox',
			'title'					=> esc_attr__('Lyfpro - Post Format Quote Options', 'lyfpro'),
			'fields'				=> array(
				array(
					'key'				=> 'dsvy-pformat-quote-source-name',
					'label'				=> esc_attr__('Source Name', 'lyfpro'),
					'name'				=> 'dsvy-pformat-quote-source-name',
					'type'				=> 'text',
					'instructions'		=> esc_attr__('Add source name of the quote.', 'lyfpro'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
				array(
					'key'				=> 'dsvy-pformat-quote-source-url',
					'label'				=> esc_attr__('Source URL', 'lyfpro'),
					'name'				=> 'dsvy-pformat-quote-source-url',
					'type'				=> 'text',
					'instructions'		=> esc_attr__('Add source link of the quote.', 'lyfpro'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
			),
			'location'				=> array(
				array(
					array(
						'param'			=> 'post_format',
						'operator'		=> '==',
						'value'			=> 'quote',
					),
				),
			),
			'menu_order'			=> 0,
			'position'				=> 'acf_after_title',
			'style'					=> 'default',
			'label_placement'		=> 'left',
			'instruction_placement'	=> 'label',
			'hide_on_screen'		=> '',
			'active'				=> true,
			'description'			=> '',
		));

		// Post Format - Link
		acf_add_local_field_group(array(
			'key'					=> 'dsvy-pformat-link-metabox',
			'title'					=> esc_attr__('Lyfpro - Post Format Link Options', 'lyfpro'),
			'fields'				=> array(
				array(
					'key'				=> 'dsvy-pformat-link-title',
					'label'				=> esc_attr__('Link Title', 'lyfpro'),
					'name'				=> 'dsvy-pformat-link-title',
					'type'				=> 'text',
					'instructions'		=> esc_attr__('Add link title.', 'lyfpro'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
				array(
					'key'				=> 'dsvy-pformat-link-url',
					'label'				=> esc_attr__('Link URL', 'lyfpro'),
					'name'				=> 'dsvy-pformat-link-url',
					'type'				=> 'text',
					'instructions'		=> esc_attr__('Add link URL.', 'lyfpro'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
			),
			'location'				=> array(
				array(
					array(
						'param'			=> 'post_format',
						'operator'		=> '==',
						'value'			=> 'link',
					),
				),
			),
			'menu_order'			=> 0,
			'position'				=> 'acf_after_title',
			'style'					=> 'default',
			'label_placement'		=> 'left',
			'instruction_placement'	=> 'label',
			'hide_on_screen'		=> '',
			'active'				=> true,
			'description'			=> '',
		));

		// Post Format - Gallery
		if( class_exists('acf_plugin_photo_gallery') ){
			acf_add_local_field_group(array(
				'key'					=> 'dsvy-pformat-gallery-metabox',
				'title'					=> esc_attr__('Image Gallery', 'lyfpro'),
				'fields'				=> array(
					array(
						'key'				=> 'dsvy-pformat-gallery',
						'label'				=> esc_attr__('Image Gallery', 'lyfpro'),
						'name'				=> 'dsvy-pformat-gallery',
						'type'				=> 'photo_gallery',
						'instructions'		=> esc_attr__('Select image for slider', 'lyfpro'),
						'required'			=> 0,
						'conditional_logic'	=> 0,
					),
				),
				'location'				=> array(
					array(
						array(
							'param'			=> 'post_format',
							'operator'		=> '==',
							'value'			=> 'gallery',
						),
					),
				),
				'position'				=> 'acf_after_title',
				'label_placement'		=> 'left',
				'instruction_placement' => 'label',
				'hide_on_screen'		=> '',
				'description'			=> esc_attr__('Description', 'lyfpro'),
			));
		}

		// Post Format - Audio
		acf_add_local_field_group(array(
			'key'					=> 'dsvy-pformat-audio-metabox',
			'title'					=> esc_attr__('Lyfpro - Post Format Audio Options', 'lyfpro'),
			'fields'				=> array(
				array(
					'key'				=> 'dsvy-pformat-audio',
					'label'				=> esc_attr__('Audio URL (like SoundCloud) OR Embed Code', 'lyfpro'),
					'name'				=> 'dsvy-pformat-audio',
					'type'				=> 'textarea',
					'instructions'		=> esc_attr__('Add Youtube or Vimeo URL here. Also you can paste embed code here.', 'lyfpro'),
					'required'			=> 0,
					'conditional_logic' => 0,
					'wrapper'			=> array(
						'width'				=> '',
						'class'				=> '',
						'id'				=> '',
					),
					'default_value'		=> '',
					'placeholder'		=> '',
					'maxlength'			=> '',
					'rows'				=> '',
					'new_lines'			=> '',
				),
			),
			'location'				=> array(
				array(
					array(
						'param'			=> 'post_format',
						'operator'		=> '==',
						'value'			=> 'audio',
					),
				),
			),
			'menu_order'			=> 0,
			'position'				=> 'acf_after_title',
			'style'					=> 'default',
			'label_placement'		=> 'left',
			'instruction_placement'	=> 'label',
			'hide_on_screen'		=> '',
			'active'				=> true,
			'description'			=> '',
		));

	};
}
}
add_action( 'init', 'dsvy_post_format_metaboxes', 24 );

if( !function_exists('dsvy_portfolio_featured_metabox') ){
function dsvy_portfolio_featured_metabox(){
	if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key'		=> 'dsvy-featured-data-type',
		'title'		=> esc_attr__('Lyfpro - Featured Data Type', 'lyfpro'),
		'fields'	=> array(
			array(
				'key'			=> 'dsvy-featured-type',
				'label'			=> esc_attr__('Featured Data Type', 'lyfpro'),
				'name'			=> 'dsvy-featured-type',
				'type'			=> 'radio',
				'instructions'	=> esc_attr__('Select type of featured content', 'lyfpro'),
				'required'		=> 0,
				'conditional_logic'	=> 0,
				'wrapper'		=> array(
					'width'			=> '25',
					'class'			=> '',
					'id'			=> '',
				),
				'choices'		=> array(
					'featured'		=> esc_attr__('Featured Image (default)', 'lyfpro'),
					'slider'		=> esc_attr__('Image Slider', 'lyfpro'),
					'video'			=> esc_attr__('Video', 'lyfpro'),
					'audio'			=> esc_attr__('Audio', 'lyfpro'),
				),
				'allow_null'	=> 0,
				'other_choice'	=> 0,
				'default_value'	=> '',
				'layout'		=> 'vertical',
				'return_format'	=> 'value',
				'save_other_choice' => 0,
			),
			array(
				'key'				=> 'dsvy-photo-gallery',
				'label'				=> esc_attr__('Slider Images', 'lyfpro'),
				'name'				=> 'dsvy-photo-gallery',
				'type'				=> 'photo_gallery',
				'instructions'		=> esc_attr__('Select images for slider', 'lyfpro'),
				'required'			=> 0,
				'conditional_logic' => array(
					array(
						array(
							'field'		=> 'dsvy-featured-type',
							'operator'	=> '==',
							'value'		=> 'slider',
						),
					),
				),
				'wrapper'			=> array(
					'width'				=> '75',
					'class'				=> '',
					'id'				=> '',
				),
				'fields[slider_images' => array(
					'edit_modal'			=> 'Default',
				),
				'edit_modal' => 'Default',
			),
			array(
				'key'				=> 'dsvy-video-url',
				'label'				=> esc_attr__('Video URL', 'lyfpro'),
				'name'				=> 'dsvy-video-url',
				'type'				=> 'text',
				'instructions'		=> esc_attr__('Add video URL from YouTube or Vimeo', 'lyfpro'),
				'required'			=> 0,
				'conditional_logic' => array(
					array(
						array(
							'field'		=> 'dsvy-featured-type',
							'operator'	=> '==',
							'value'		=> 'video',
						),
					),
				),
				'wrapper'			=> array(
					'width'				=> '75',
					'class'				=> '',
					'id'				=> '',
				),
				'default_value'		=> '',
				'placeholder'		=> '',
				'prepend'			=> '',
				'append'			=> '',
				'maxlength'			=> '',
			),
			array(
				'key'				=> 'dsvy-audio-url',
				'label'				=> esc_attr__('Audio URL', 'lyfpro'),
				'name'				=> 'dsvy-audio-url',
				'type'				=> 'text',
				'instructions'		=> esc_attr__('Add audio URL from SoundCloud or MP3', 'lyfpro'),
				'required'			=> 0,
				'conditional_logic' => array(
					array(
						array(
							'field'		=> 'dsvy-featured-type',
							'operator'	=> '==',
							'value'		=> 'audio',
						),
					),
				),
				'wrapper'			=> array(
					'width'				=> '75',
					'class'				=> '',
					'id'				=> '',
				),
				'default_value'		=> '',
				'placeholder'		=> '',
				'prepend'			=> '',
				'append'			=> '',
				'maxlength'			=> '',
			),
		),
		'location'			=> array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'dsvy-portfolio',
				),
			),
		),
		'menu_order'		=> 1,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'active'			=> 1,
		'description'		=> '',
	));
	endif;
}
}
add_action( 'init', 'dsvy_portfolio_featured_metabox', 25 );
if( !function_exists('dsvy_portfolio_details_metabox') ){
function dsvy_portfolio_details_metabox(){
	$line_list = array();
	$portfolio_details = dsvy_get_base_option('portfolio-details');
	if( !empty($portfolio_details) && is_array($portfolio_details) ){
		foreach( $portfolio_details as $line ){
			if( !empty($line['line_title']) ){
				$line_id = trim($line['line_title']);
				$line_id = str_replace( ' ', '_', $line_id );
				$line_id = sanitize_html_class( strtolower( $line_id ) ) ;
				if( $line['line_type']=='text' ){
					$line_list[] = array(
						'key'			=> $line_id,
						'label'			=> sprintf( esc_attr__('%1$s ', 'lyfpro'), $line['line_title'] ),
						'name'			=> $line_id,
						'type'			=> 'text',
					);
				} else {
					$desc = esc_attr__('(Category with link)','lyfpro');
					if( $line['line_type']=='category' ){
						$desc = esc_attr__('(Category without link)','lyfpro');
					}
					$line_list[] = array(
						'type'		=> 'generic',
						'key'		=> $line_id,
						'label'		=> sprintf( esc_attr__('%1$s ', 'lyfpro'), $line['line_title'] ) . $desc,
						'default'	=> '',
						'choices'	=> array(
							'element'	=> 'input',
							'type'		=> 'text',
							'disabled'	=> 'disabled',
						),
					);
				}
			}
		}
	}
	if( function_exists('acf_add_local_field_group') ){
	acf_add_local_field_group(array(
		'key'		=> 'dsvy-portfolio-details-group',
		'title'		=> esc_attr__('Lyfpro - Portfolio Details', 'lyfpro'),
		'fields'	=> array(
			array(
				'key'			=> 'dsvy-portfolio-details',
				'label'			=> esc_attr__('Portfolio Details', 'lyfpro'),
				'name'			=> 'dsvy-portfolio-details',
				'type'			=> 'group',
				'instructions'	=> esc_attr__('Fill the values for each option that applies. Leave blank to hide it.', 'lyfpro'),
				'required'		=> 0,
				'conditional_logic'	=> 0,
				'wrapper'		=> array(
					'width'			=> '',
					'class'			=> '',
					'id'			=> '',
				),
				'layout'		=> 'block',
				'sub_fields'	=> $line_list,
			),
		),
		'location'	=> array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'dsvy-portfolio',
				),
			),
		),
		'menu_order'		=> 2,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'left',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'active'			=> 1,
		'description'		=> '',
	));
	};
}
}
add_action( 'init', 'dsvy_portfolio_details_metabox', 26 );
if( !function_exists('dsvy_testimonial_details_metabox') ){
function dsvy_testimonial_details_metabox(){
	if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key'		=> 'dsvy-testimonial-details-box',
		'title'		=> esc_attr__('Lyfpro - Testimonial Details', 'lyfpro'),
		'fields'	=> array(
			array(
				'key'			=> 'dsvy-testimonial-details',
				'label'			=> esc_attr__('Details', 'lyfpro'),
				'name'			=> 'dsvy-testimonial-details',
				'type'			=> 'text',
				'instructions'	=> esc_attr__('(optional) Add details like Company name, designation etc', 'lyfpro'),
				'required'		=> 0,
				'conditional_logic'	=> 0,
				'wrapper'		=> array(
					'width'			=> '50',
					'class'			=> '',
					'id'			=> '',
				),
				'default_value'	=> '',
				'placeholder'	=> '',
				'prepend'		=> '',
				'append'		=> '',
				'maxlength'		=> '',
			),
			array(
				'key'			=> 'dsvy-star-ratings',
				'label'			=> esc_attr__('Star Ratings', 'lyfpro'),
				'name'			=> 'dsvy-star-ratings',
				'type'			=> 'select',
				'instructions'	=> esc_attr__('Select star ratings.', 'lyfpro'),
				'required'		=> 0,
				'conditional_logic' => 0,
				'wrapper'		=> array(
					'width'			=> '50',
					'class'			=> '',
					'id'			=> '',
				),
				'choices'		=> array(
					'no'			=> esc_attr__('No ratings', 'lyfpro'),
					'1'				=> esc_attr__('1 star', 'lyfpro'),
					'2'				=> esc_attr__('2 stars', 'lyfpro'),
					'3'				=> esc_attr__('3 stars', 'lyfpro'),
					'4'				=> esc_attr__('4 stars', 'lyfpro'),
					'5'				=> esc_attr__('5 stars', 'lyfpro'),
				),
				'default_value'	=> 'no',
				'allow_null'	=> 0,
				'multiple'		=> 0,
				'ui'			=> 1,
				'ajax'			=> 0,
				'return_format'	=> 'value',
				'placeholder'	=> '',
			),
		),
		'location'			=> array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'dsvy-testimonial',
				),
			),
		),
		'menu_order'		=> 0,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'description'		=> '',
	));
	endif;
}
}
add_action( 'init', 'dsvy_testimonial_details_metabox', 27 );
if( !function_exists('dsvy_service_short_desc_metabox') ){
function dsvy_service_short_desc_metabox(){
	if( function_exists('acf_add_local_field_group') ):
		$icon_picker_options = array();
		// Icon library
		$library = array();
		$lib_list = dsvy_icon_library_list();
		foreach( $lib_list as $lib_id=>$lib_data ){
			$library[$lib_id] = $lib_data['name'];
		}
		$icon_picker_options[] = array(
			'key'			=> 'dsvy-icon-library',
			'label'			=> esc_attr__('Select Icon Library', 'lyfpro'),
			'name'			=> 'dsvy-icon-library',
			'type'			=> 'select',
			'instructions'	=> esc_attr__('Select Icon Library.', 'lyfpro'),
			'required'		=> 0,
			'conditional_logic' => 0,
			'wrapper'		=> array(
				'width'			=> '33',
				'class'			=> '',
				'id'			=> '',
			),
			'choices'		=> $library,
			'default_value'	=> 'no',
			'allow_null'	=> 0,
			'multiple'		=> 0,
			'ui'			=> 1,
			'ajax'			=> 0,
			'return_format'	=> 'value',
			'placeholder'	=> '',
		);
		foreach( $lib_list as $lib_id=>$lib_data ){
			$icon_picker_options[] = array(
				'key'		=> 'dsvy-service-icon-' . $lib_id ,
				'label'		=> $lib_data['name'],
				'name'		=> 'dsvy-service-icon-' . $lib_id,
				'type'		=> 'dsvy_fonticonpicker',
				'library'	=> $lib_id,
				'instructions' => esc_attr__('Select icon from here', 'lyfpro'),
				'required'	=> 0,
				'conditional_logic' => 0,
				'wrapper'	=> array(
					'width'		=> '66',
					'class'		=> '',
					'id'		=> '',
				),
			);
		}
		acf_add_local_field_group(array(
			'key'		=> 'dsvy-group-service-short-desc',
			'title'		=> esc_attr__('Lyfpro - Short Description', 'lyfpro'),
			'fields'	=> array(
				array(
					'key'		=> 'dsvy-short-description',
					'label'		=> esc_attr__('Short Description', 'lyfpro'),
					'name'		=> 'dsvy-short-description',
					'type'		=> 'textarea',
					'instructions' => esc_attr__('This will appear on single view', 'lyfpro'),
				),
			),
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-service',
					),
				),
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-portfolio',
					),
				),
			),
			'menu_order'		=> 2,
			'position'			=> 'normal',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'	=> '',
			'description'		=> '',
		));
	endif;
}
}
add_action( 'init', 'dsvy_service_short_desc_metabox', 28 );

if( !function_exists('dsvy_single_icon_metabox') ){
function dsvy_single_icon_metabox(){
	if( function_exists('acf_add_local_field_group') ){
		$icon_picker_options = array();

		// Icon library
		$library = array();
		$lib_list = dsvy_icon_library_list();
		foreach( $lib_list as $lib_id=>$lib_data ){
			$library[$lib_id] = $lib_data['name'];
		}
		$icon_picker_options[] = array(
			'key'			=> 'dsvy-service-icon-library',
			'label'			=> esc_attr__('Select Icon Library', 'lyfpro'),
			'name'			=> 'dsvy-service-icon-library',
			'type'			=> 'select',
			'instructions'	=> esc_attr__('Select Icon Library.', 'lyfpro'),
			'required'		=> 0,
			'conditional_logic' => 0,
			'wrapper'		=> array(
				'width'			=> '33',
				'class'			=> '',
				'id'			=> '',
			),
			'choices'		=> $library,
			'default_value'	=> 'no',
			'allow_null'	=> 0,
			'multiple'		=> 0,
			'ui'			=> 1,
			'ajax'			=> 0,
			'return_format'	=> 'value',
			'placeholder'	=> '',
		);
		foreach( $lib_list as $lib_id=>$lib_data ){
			$icon_picker_options[] = array(
				'key'		=> 'dsvy-service-icon-' . $lib_id ,
				'label'		=> $lib_data['name'],
				'name'		=> 'dsvy-service-icon-' . $lib_id,
				'type'		=> 'dsvy_fonticonpicker',
				'library'	=> $lib_id,
				'instructions' => esc_attr__('Select icon from here', 'lyfpro'),
				'required'	=> 0,
				'conditional_logic'	=> array(
					array(
						array(
							'field'		=> 'dsvy-service-icon-library',
							'operator'	=> '==',
							'value'		=> $lib_id,
						),
					),
				),
				'wrapper'	=> array(
					'width'		=> '66',
					'class'		=> '',
					'id'		=> '',
				),
			);
		}
		acf_add_local_field_group(array(
			'key'		=> 'dsvy-group-single-icon',
			'title'		=> esc_attr__('Lyfpro - Icon for Single', 'lyfpro'),
			'fields'	=> $icon_picker_options,
			'location' => array(
				array(
					array(
						'param'		=> 'post_type',
						'operator'	=> '==',
						'value'		=> 'dsvy-service',
					),
				),
			),
			'menu_order'		=> 2,
			'position'			=> 'normal',
			'style'				=> 'default',
			'label_placement'	=> 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'	=> '',
			'description'		=> '',
		));
	};
}
}
add_action( 'init', 'dsvy_single_icon_metabox', 28 );

if( !function_exists('dsvy_portfolio_single_view_metabox') ){
function dsvy_portfolio_single_view_metabox(){
	if( function_exists('acf_add_local_field_group') ):
	// Total Single Portfolio Styles
	$portfolio_single_style_array = array(
		'0' => '<img src="'.get_template_directory_uri() . '/includes/images/portfolio-single-style-global.jpg" />',
		'1'	=> '<img src="'.get_template_directory_uri() . '/includes/images/portfolio-single-style-1.jpg" />',
		'2'	=> '<img src="'.get_template_directory_uri() . '/includes/images/portfolio-single-style-2.jpg" />',
	);
	// Single Title
	$portfolio_cpt_singular_title	= esc_attr__('Portfolio','lyfpro');
	if( class_exists('Kirki') ){
		// Portfolio
		$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
		$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;
	}
	acf_add_local_field_group(array(
		'key'		=> 'dsvy-group-portfolio-single-view',
		'title'		=> sprintf( esc_attr__('Lyfpro - %1$s Single View Option', 'lyfpro'), $portfolio_cpt_singular_title ),
		'fields'	=> array(
			array(
				'key'		=> 'dsvy-portfolio-single-view',
				'label'		=> sprintf( esc_attr__('%1$s Single View', 'lyfpro'), $portfolio_cpt_singular_title ),
				'name'		=> 'dsvy-portfolio-single-view',
				'type'		=> 'radio',
				'instructions' => sprintf( esc_attr__('Select %1$s Single View', 'lyfpro'), $portfolio_cpt_singular_title ),
				'required'			=> 0,
				'choices'			=> $portfolio_single_style_array,
				'wrapper'			=> array(
					'class'				=> 'dsvy-radio-image-selector',
					'id'				=> '',
				),
				'allow_null'		=> 0,
				'other_choice'		=> 0,
				'default_value'		=> '',
				'layout'			=> 'horizontal',
				'return_format'		=> 'value',
				'save_other_choice' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'dsvy-portfolio',
				),
			),
		),
		'menu_order'		=> 3,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'description'		=> '',
	));
	endif;
}
}
add_action( 'init', 'dsvy_portfolio_single_view_metabox', 25 );

if( !function_exists('dsvy_service_single_view_metabox') ){
function dsvy_service_single_view_metabox(){
	if( function_exists('acf_add_local_field_group') ):
	// Total Single Portfolio Styles
	$service_single_style_array = array(
		'0' => '<img src="'.get_template_directory_uri() . '/includes/images/service-single-style-global.jpg" />',
		'1'	=> '<img src="'.get_template_directory_uri() . '/includes/images/service-single-style-1.jpg" />',
		'2'	=> '<img src="'.get_template_directory_uri() . '/includes/images/service-single-style-2.jpg" />',
	);
	// Single Title
	$service_cpt_singular_title	= esc_attr__('Portfolio','lyfpro');
	if( class_exists('Kirki') ){
		// Portfolio
		$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
		$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
	}
	acf_add_local_field_group(array(
		'key'		=> 'dsvy-group-service-single-view',
		'title'		=> sprintf( esc_attr__('Lyfpro - %1$s Single View Option', 'lyfpro'), $service_cpt_singular_title ),
		'fields'	=> array(
			array(
				'key'		=> 'dsvy-service-single-view',
				'label'		=> sprintf( esc_attr__('%1$s Single View', 'lyfpro'), $service_cpt_singular_title ),
				'name'		=> 'dsvy-service-single-view',
				'type'		=> 'radio',
				'instructions' => sprintf( esc_attr__('Select %1$s Single View', 'lyfpro'), $service_cpt_singular_title ),
				'required'			=> 0,
				'choices'			=> $service_single_style_array,
				'wrapper'			=> array(
					'class'				=> 'dsvy-radio-image-selector',
					'id'				=> '',
				),
				'allow_null'		=> 0,
				'other_choice'		=> 0,
				'default_value'		=> '',
				'layout'			=> 'horizontal',
				'return_format'		=> 'value',
				'save_other_choice' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param'		=> 'post_type',
					'operator'	=> '==',
					'value'		=> 'dsvy-service',
				),
			),
		),
		'menu_order'		=> 3,
		'position'			=> 'normal',
		'style'				=> 'default',
		'label_placement'	=> 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'	=> '',
		'description'		=> '',
	));
	endif;
}
}
add_action( 'init', 'dsvy_service_single_view_metabox', 25 );