<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! function_exists( 'envato_theme_setup_wizard' ) ) :
	function envato_theme_setup_wizard() {

		if ( class_exists( 'Envato_Theme_Setup_Wizard' ) ) {
			class lyfpro_Envato_Theme_Setup_Wizard extends Envato_Theme_Setup_Wizard {

				/**
				 * Holds the current instance of the theme manager
				 *
				 * @since 1.1.3
				 * @var Envato_Theme_Setup_Wizard
				 */
				private static $instance = null;

				/**
				 * @since 1.1.3
				 *
				 * @return Envato_Theme_Setup_Wizard
				 */
				public static function get_instance() {
					if ( ! self::$instance ) {
						self::$instance = new self;
					}

					return self::$instance;
				}

				public function get_logo_image() {
					$logo_image_id = dsvy_get_base_option('logo');
					if ( !empty($logo_image_id) ) {
						$image_url         = $logo_image_id;
					} else {
						$image_url = get_theme_mod( 'logo_header_image', get_template_directory_uri() . '/images/logo.png' );
					}
					return apply_filters( 'envato_setup_logo_image', $image_url );
				}


				public function get_default_theme_style() {
					return class_exists( 'lyfpro_Theme_Manager_custom' ) ? lyfpro_Theme_Manager_custom::get_instance()->default_color : 'white';
				}

				public function filter_options( $options ) {
					return parent::filter_options($options);
				}
			}

			lyfpro_Envato_Theme_Setup_Wizard::get_instance();
		}
	}
endif;
