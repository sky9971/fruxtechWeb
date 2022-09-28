<?php
/**
 * Envato Theme Setup Wizard Class
 *
 * Takes new users through some basic steps to setup their ThemeForest theme.
 *
 * @author      dtbaker
 * @author      vburlak
 * @package     envato_wizard
 * @version     1.3.4
 *
 *
 * 1.2.0 - added custom_logo
 * 1.2.1 - ignore post revisioins
 * 1.2.2 - elementor widget data replace on import
 * 1.2.3 - auto export of content.
 * 1.2.4 - fix category menu links
 * 1.2.5 - post meta un json decode
 * 1.2.6 - post meta un json decode
 * 1.2.7 - elementor generate css on import
 * 1.2.8 - backwards compat with old meta format
 * 1.2.9 - theme setup auth
 * 1.3.0 - ob_start fix
 * 1.3.1 - child theme creation - disabled now
 * 1.3.2 - page and page_id check
 * 1.3.3 - fix loops and theme init
 * 1.3.4 - item id and update version in post requests.
 *
 * Based off the WooThemes installer.
 *
 *
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Envato_Theme_Setup_Wizard' ) ) {
	/**
	 * Envato_Theme_Setup_Wizard class
	 */
	class Envato_Theme_Setup_Wizard {

        /**
         * The class version number.
         *
         * @since 1.1.1
         * @access private
         *
         * @var string
         */
        protected $version = '1.3.4';

		/** @var string Current theme name, used as namespace in actions. */
		protected $theme_name = '';

		/** @var string Theme author username, used in check for oauth. */
		protected $envato_username = '';

		/** @var string Full url to server-script.php (available from https://gist.github.com/dtbaker ) */
		protected $oauth_script = '';

		/** @var string Current Step */
		protected $step = '';

		/** @var array Steps for the setup wizard */
		protected $steps = array();

		/**
		 * Relative plugin path
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $plugin_path = '';

		/**
		 * Relative plugin url for this plugin folder, used when enquing scripts
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $plugin_url = '';

		/**
		 * The slug name to refer to this menu
		 *
		 * @since 1.1.1
		 *
		 * @var string
		 */
		protected $page_slug;

		/**
		 * TGMPA instance storage
		 *
		 * @var object
		 */
		protected $tgmpa_instance;

		/**
		 * TGMPA Menu slug
		 *
		 * @var string
		 */
		protected $tgmpa_menu_slug = 'tgmpa-install-plugins';

		/**
		 * TGMPA Menu url
		 *
		 * @var string
		 */
		protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';

		/**
		 * The slug name for the parent menu
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $page_parent;

		/**
		 * Complete URL to Setup Wizard
		 *
		 * @since 1.1.2
		 *
		 * @var string
		 */
		protected $page_url;

		/**
		 * @since 1.1.8
		 *
		 */
		public $site_styles = array(
			'style1' => 'https://lyfpro.designervily.com/demo1/',
    		'style2' => 'https://lyfpro.designervily.com/demo2/',
    		'style3' => 'https://lyfpro.designervily.com/demo3/',
		);

		/**
         *
		 * Holds the current theme object
		 *
		 * @since 1.3.1
		 *
		 * @var string
		 */
		protected $theme;

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

		/**
		 * A dummy constructor to prevent this class from being loaded more than once.
		 *
		 * @see Envato_Theme_Setup_Wizard::instance()
		 *
		 * @since 1.1.1
		 * @access private
		 */
		public function __construct() {
			$this->init_globals();
			$this->init_actions();
		}

		/**
		 * Get the default style. Can be overriden by theme init scripts.
		 *
		 * @see Envato_Theme_Setup_Wizard::instance()
		 *
		 * @since 1.1.7
		 * @access public
		 */
		public function get_default_theme_style() {
			return 'lyfpro';
		}

		/**
		 * Get the default style. Can be overriden by theme init scripts.
		 *
		 * @see Envato_Theme_Setup_Wizard::instance()
		 *
		 * @since 1.1.9
		 * @access public
		 */
		public function get_header_logo_width() {
			return '200px';
		}


		/**
		 * Get the default style. Can be overriden by theme init scripts.
		 *
		 * @see Envato_Theme_Setup_Wizard::instance()
		 *
		 * @since 1.1.9
		 * @access public
		 */
		public function get_logo_image() {
			$logo_image_id = dsvy_get_base_option('logo');
			if ( $logo_image_id ) {
				$logo_image_object = wp_get_attachment_image_src( $logo_image_id, 'full' );
				$image_url         = $logo_image_object[0];
			} else {
				$image_url = get_theme_mod( 'logo_header_image', get_template_directory_uri() . '/images/' . get_theme_mod( 'lyfpro_site_color', $this->get_default_theme_style() ) . '/logo.png' );
			}

			return apply_filters( 'envato_setup_logo_image', $image_url );
		}

		/**
		 * Setup the class globals.
		 *
		 * @since 1.1.1
		 * @access public
		 */
		public function init_globals() {
			$this->theme         = wp_get_theme();
			// pull the theme name from the theme.json file
            if ( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
                $this->theme_name = lyfpro_Theme_Manager_custom::get_instance()->get_theme_setting( 'slug' );
            } else if( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
                $this->theme_name = lyfpro_Theme_Manager::get_instance()->get_theme_setting( 'slug' );
            }else{
                $this->theme_name      = strtolower( preg_replace( '#[^a-zA-Z]#', '', $this->theme->get( 'Name' ) ) );
            }
			$this->envato_username = apply_filters( $this->theme_name . '_theme_setup_wizard_username', 'dtbaker' );
			$this->oauth_script    = apply_filters( $this->theme_name . '_theme_setup_wizard_oauth_script', 'http://dtbaker.net/files/envato/wptoken/server-script.php' );
			$this->page_slug       = apply_filters( $this->theme_name . '_theme_setup_wizard_page_slug', $this->theme_name . '-setup' );
			$this->parent_slug     = apply_filters( $this->theme_name . '_theme_setup_wizard_parent_slug', '' );

			//If we have parent slug - set correct url
			if ( $this->parent_slug !== '' ) {
				$this->page_url = 'admin.php?page=' . $this->page_slug;
			} else {
				$this->page_url = 'themes.php?page=' . $this->page_slug;
			}
			$this->page_url = apply_filters( $this->theme_name . '_theme_setup_wizard_page_url', $this->page_url );

			//set relative plugin path url
			$this->plugin_path = trailingslashit( $this->cleanFilePath( dirname( __FILE__ ) ) );
			$relative_url      = str_replace( $this->cleanFilePath( get_template_directory() ), '', $this->plugin_path );
			$this->plugin_url  = trailingslashit( get_template_directory_uri() . $relative_url );
		}

		/**
		 * Setup the hooks, actions and filters.
		 *
		 * @uses add_action() To add actions.
		 * @uses add_filter() To add filters.
		 *
		 * @since 1.1.1
		 * @access public
		 */
		public function init_actions() {
			if ( apply_filters( $this->theme_name . '_enable_setup_wizard', true ) && current_user_can( 'manage_options' ) ) {

				if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
					add_action( 'init', array( $this, 'get_tgmpa_instanse' ), 30 );
					add_action( 'init', array( $this, 'set_tgmpa_url' ), 40 );
				}

				add_action( 'admin_menu', array( $this, 'admin_menus' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
				//add_action( 'admin_init', array( $this, 'admin_redirects' ), 30 );
				add_action( 'admin_init', array( $this, 'init_wizard_steps' ), 30 );
				add_action( 'admin_init', array( $this, 'setup_wizard' ), 30 );
				add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10, 1 );
				add_action( 'wp_ajax_envato_setup_plugins', array( $this, 'ajax_plugins' ) );
				add_action( 'wp_ajax_envato_setup_content', array( $this, 'ajax_content' ) );
			}
			if ( function_exists( 'envato_market' ) ) {
				add_action( 'admin_init', array( $this, 'envato_market_admin_init' ), 20 );
				add_filter( 'http_request_args', array( $this, 'envato_market_http_request_args' ), 10, 2 );
				add_action( 'wp_ajax_lyfpro_update_notice_handler', array($this,'ajax_notice_handler') );
				add_action( 'admin_notices', array($this,'admin_theme_auth_notice') );
			}
			add_action( 'upgrader_post_install', array( $this, 'upgrader_post_install' ), 10, 2 );
		}

		/**
		 * After a theme update we clear the setup_complete option. This prompts the user to visit the update page again.
		 *
		 * @since 1.1.8
		 * @access public
		 */
		public function upgrader_post_install( $return, $theme ) {
			if ( is_wp_error( $return ) ) {
				return $return;
			}
			if ( $theme != get_stylesheet() ) {
				return $return;
			}
			update_option( 'envato_setup_complete', false );

			return $return;
		}

		/**
		 * We determine if the user already has theme content installed. This can happen if swapping from a previous theme or updated the current theme. We change the UI a bit when updating / swapping to a new theme.
		 *
		 * @since 1.1.8
		 * @access public
		 */
		public function is_possible_upgrade() {
			return false;
		}

		public function enqueue_scripts() {
		}

		public function tgmpa_load( $status ) {
			return is_admin() || current_user_can( 'install_themes' );
		}

		public function admin_redirects() {
			if ( ! get_transient( '_' . $this->theme_name . '_activation_redirect' ) || get_option( 'envato_setup_complete', false ) ) {
				return;
			}
			delete_transient( '_' . $this->theme_name . '_activation_redirect' );
			wp_safe_redirect( admin_url( $this->page_url ) );
			exit;
		}

		/**
		 * Get configured TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function get_tgmpa_instanse() {
			$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		}

		/**
		 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function set_tgmpa_url() {

			$this->tgmpa_menu_slug = ( property_exists( $this->tgmpa_instance, 'menu' ) ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
			$this->tgmpa_menu_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug );

			$tgmpa_parent_slug = ( property_exists( $this->tgmpa_instance, 'parent_slug' ) && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';

			$this->tgmpa_url = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug );

		}

		/**
		 * Add admin menus/screens.
		 */
		public function admin_menus() {

			if ( $this->is_submenu_page() ) {
				//prevent Theme Check warning about "themes should use add_theme_page for adding admin pages"
				$add_subpage_function = 'add_submenu' . '_page';
				$add_subpage_function( $this->parent_slug, esc_html__( 'Setup Wizard', 'lyfpro' ), esc_html__( 'Setup Wizard', 'lyfpro' ), 'manage_options', $this->page_slug, array(
					$this,
					'setup_wizard',
				) );
			} else {
				add_theme_page( esc_html__( 'Setup Wizard', 'lyfpro' ), esc_html__( 'Setup Wizard', 'lyfpro' ), 'manage_options', $this->page_slug, array(
					$this,
					'setup_wizard',
				) );
			}

		}


		/**
		 * Setup steps.
		 *
		 * @since 1.1.1
		 * @access public
		 * @return array
		 */
		public function init_wizard_steps() {

			$this->steps = array(
				'introduction' => array(
					'name'    => esc_html__( 'Introduction', 'lyfpro' ),
					'view'    => array( $this, 'envato_setup_introduction' ),
					'handler' => array( $this, 'envato_setup_introduction_save' ),
				),
			);
			if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
				$this->steps['default_plugins'] = array(
					'name'    => esc_html__( 'Plugins', 'lyfpro' ),
					'view'    => array( $this, 'envato_setup_default_plugins' ),
					'handler' => '',
				);
			}
			$this->steps['updates']         = array(
				'name'    => esc_html__( 'Updates', 'lyfpro' ),
				'view'    => array( $this, 'envato_setup_updates' ),
				'handler' => array( $this, 'envato_setup_updates_save' ),
			);
			if( count($this->site_styles) > 1 ) {
				$this->steps['style'] = array(
					'name'    => esc_html__( 'Style', 'lyfpro' ),
					'view'    => array( $this, 'envato_setup_color_style' ),
					'handler' => array( $this, 'envato_setup_color_style_save' ),
				);
			}
			$this->steps['default_content'] = array(
				'name'    => esc_html__( 'Content', 'lyfpro' ),
				'view'    => array( $this, 'envato_setup_default_content' ),
				'handler' => '',
			);
			$this->steps['design']          = array(
				'name'    => esc_html__( 'Logo', 'lyfpro' ),
				'view'    => array( $this, 'envato_setup_logo_design' ),
				'handler' => array( $this, 'envato_setup_logo_design_save' ),
			);
			$this->steps['customize']       = array(
				'name'    => esc_html__( 'Customize', 'lyfpro' ),
				'view'    => array( $this, 'envato_setup_customize' ),
				'handler' => '',
			);
			$this->steps['help_support']    = array(
				'name'    => esc_html__( 'Support', 'lyfpro' ),
				'view'    => array( $this, 'envato_setup_help_support' ),
				'handler' => '',
			);
			$this->steps['next_steps']      = array(
				'name'    => esc_html__( 'Ready!', 'lyfpro' ),
				'view'    => array( $this, 'envato_setup_ready' ),
				'handler' => '',
			);

			$this->steps = apply_filters( $this->theme_name . '_theme_setup_wizard_steps', $this->steps );

		}

		/**
		 * Show the setup wizard
		 */
		public function setup_wizard() {
			if ( empty( $_GET['page'] ) || $this->page_slug !== $_GET['page'] ) {
				return;
			}
			@ob_end_clean();

			$this->step = isset( $_GET['step'] ) ? sanitize_key( $_GET['step'] ) : current( array_keys( $this->steps ) );

			wp_register_script( 'jquery-blockui', $this->plugin_url . 'js/jquery.blockUI.js', array( 'jquery' ), '2.70', true );
			wp_register_script( 'envato-setup', $this->plugin_url . 'js/envato-setup.js', array(
				'jquery',
				'jquery-blockui',
			), $this->version );
			wp_localize_script( 'envato-setup', 'envato_setup_params', array(
				'tgm_plugin_nonce' => array(
					'update'  => wp_create_nonce( 'tgmpa-update' ),
					'install' => wp_create_nonce( 'tgmpa-install' ),
				),
				'tgm_bulk_url'     => admin_url( $this->tgmpa_url ),
				'ajaxurl'          => admin_url( 'admin-ajax.php' ),
				'wpnonce'          => wp_create_nonce( 'envato_setup_nonce' ),
				'verify_text'      => esc_html__( '...verifying', 'lyfpro' ),
			) );

			//wp_enqueue_style( 'envato_wizard_admin_styles', $this->plugin_url . '/css/admin.css', array(), $this->version );
			wp_enqueue_style( 'envato-setup', $this->plugin_url . 'css/envato-setup.css', array(
				'wp-admin',
				'dashicons',
				'install',
			), $this->version );

			//enqueue style for admin notices
			wp_enqueue_style( 'wp-admin' );

			wp_enqueue_media();
			wp_enqueue_script( 'media' );

			wp_enqueue_media();
        	wp_enqueue_style( 'wp-color-picker');
			wp_enqueue_script( 'wp-color-picker');
			wp_enqueue_script( 'vibrant', get_template_directory_uri() . '/includes/vibrant.min.js' );

			ob_start();
			$this->setup_wizard_header();
			$this->setup_wizard_steps();
			$show_content = true;
			echo dsvy_esc_kses('<div class="envato-setup-content">');
			if ( ! empty( $_REQUEST['save_step'] ) && isset( $this->steps[ $this->step ]['handler'] ) ) {
				$show_content = call_user_func( $this->steps[ $this->step ]['handler'] );
			}
			if ( $show_content ) {
				$this->setup_wizard_content();
			}
			echo dsvy_esc_kses('</div>');
			$this->setup_wizard_footer();
			exit;
		}

		public function get_step_link( $step ) {
			return add_query_arg( 'step', $step, admin_url( 'admin.php?page=' . $this->page_slug ) );
		}

		public function get_next_step_link() {
			$keys = array_keys( $this->steps );

			return add_query_arg( 'step', $keys[ array_search( $this->step, array_keys( $this->steps ) ) + 1 ], remove_query_arg( 'translation_updated' ) );
		}

		/**
		 * Setup Wizard Header
		 */
	public function setup_wizard_header() {
		?>
        <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
        <head>
            <meta name="viewport" content="width=device-width"/>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<title><?php wp_title(); ?></title>
			<?php wp_print_scripts( 'envato-setup' ); ?>
			<?php do_action( 'admin_print_styles' ); ?>
			<?php do_action( 'admin_print_scripts' ); ?>
			<?php do_action( 'admin_head' ); ?>
        </head>
        <body class="envato-setup wp-core-ui">
		<span id="dsvy-title"  class="hidden"><?php esc_html_e('lyfpro Theme Setup Wizard', 'lyfpro'); ?></span>
        <h1 id="wc-logo">
            <a href="http://themeforest.net/user/designervily/portfolio" target="_blank"><?php
				$image_url = $this->get_logo_image();
				if ( $image_url ) {
					$image = '<img id="dsvy-swizard-logo" class="site-logo" src="%s" alt="%s" style="width:%s; height:auto" />';
					printf(
						$image,
						$image_url,
						get_bloginfo( 'name' ),
						$this->get_header_logo_width()
					);
				} else { ?>
                    <img src="<?php echo esc_url( $this->plugin_url . 'images/logo.png' ); ?>" alt="Envato install wizard" /><?php
				} ?></a>
        </h1>
		<?php
		}

		/**
		 * Setup Wizard Footer
		 */
		public function setup_wizard_footer() {
		?>
		<?php if ( 'next_steps' === $this->step ) : ?>
            <a class="wc-return-to-dashboard"
               href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e( 'Return to the WordPress Dashboard', 'lyfpro' ); ?></a>
		<?php endif; ?>
        </body>
		<?php
		@do_action( 'admin_footer' ); // this was spitting out some errors in some admin templates. quick @ fix until I have time to find out what's causing errors.
		do_action( 'admin_print_footer_scripts' );
		?>
        </html>
		<?php
	}

		/**
		 * Output the steps
		 */
		public function setup_wizard_steps() {
			$ouput_steps = $this->steps;
			array_shift( $ouput_steps );
			?>
            <ol class="envato-setup-steps">
				<?php foreach ( $ouput_steps as $step_key => $step ) : ?>
                    <li class="<?php
					$show_link = false;
					if ( $step_key === $this->step ) {
						echo esc_attr('active');
					} elseif ( array_search( $this->step, array_keys( $this->steps ) ) > array_search( $step_key, array_keys( $this->steps ) ) ) {
						echo esc_attr('done');
						$show_link = true;
					}
					?>"><?php
						if ( $show_link ) {
							?>
                            <a href="<?php echo esc_url( $this->get_step_link( $step_key ) ); ?>"><?php echo esc_html( $step['name'] ); ?></a>
							<?php
						} else {
							echo esc_html( $step['name'] );
						}
						?></li>
				<?php endforeach; ?>
            </ol>
			<?php
		}

		/**
		 * Output the content for the current step
		 */
		public function setup_wizard_content() {
			isset( $this->steps[ $this->step ] ) ? call_user_func( $this->steps[ $this->step ]['view'] ) : false;
		}

		/**
		 * Introduction step
		 */
		public function envato_setup_introduction() {

			if ( false && isset( $_REQUEST['debug'] ) ) {
				echo dsvy_esc_kses('<pre>');
				// debug inserting a particular post so we can see what's going on
				$post_type = 'nav_menu_item';
				$post_id   = 239; // debug this particular import post id.
				$all_data  = $this->_get_json( 'default.json' );
				if ( ! $post_type || ! isset( $all_data[ $post_type ] ) ) {
					printf( esc_html__( 'Post type %1$s not found.', 'lyfpro' ), $post_type );
				} else {
					printf( esc_html__( 'Looking for post id %1$s', 'lyfpro' ), $post_id ) . "\n";
					foreach ( $all_data[ $post_type ] as $post_data ) {

						if ( $post_data['post_id'] == $post_id ) {
							$this->_process_post_data( $post_type, $post_data, 0, true );
						}
					}
				}
				$this->_handle_delayed_posts();
				print_r( $this->logs );

				echo dsvy_esc_kses('</pre>');
			} else if ( isset( $_GET['export'] ) ) {

				if( file_exists( get_template_directory() . '/setup/envato-setup-export.php' ) ){
					include( get_template_directory() . '/setup/envato-setup-export.php' );
				}
				

			} else if ( $this->is_possible_upgrade() ) {
				?>
                <h1><?php printf( esc_html__( 'Welcome to the setup wizard for %s.', 'lyfpro' ), wp_get_theme() ); ?></h1>
                <p><?php esc_html_e( 'It looks like you may have recently upgraded to this theme. Great! This setup wizard will help ensure all the default settings are correct. It will also show some information about your new website and support options.', 'lyfpro' ); ?></p>
                <p class="envato-setup-actions step">
                    <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                       class="button-primary button button-large button-next"><?php esc_html_e( 'Let\'s Go!', 'lyfpro' ); ?></a>
                    <a href="<?php echo esc_url( wp_get_referer() && ! strpos( wp_get_referer(), 'update.php' ) ? wp_get_referer() : admin_url( '' ) ); ?>"
                       class="button button-large"><?php esc_html_e( 'Not right now', 'lyfpro' ); ?></a>
                </p>
				<?php
			} else if ( get_option( 'envato_setup_complete', false ) ) {
				?>
                <h1><?php printf( esc_html__( 'Welcome to the setup wizard for %s.', 'lyfpro' ), wp_get_theme() ); ?></h1>
                <p><?php esc_html_e( 'It looks like you have already run the setup wizard. Below are some options: ', 'lyfpro' ); ?></p>
                <ul>
                    <li>
                        <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                           class="button-primary button button-next button-large"><?php esc_html_e( 'Run Setup Wizard Again', 'lyfpro' ); ?></a>
                    </li>
                    <li>
                        <form method="post">
                            <input type="hidden" name="reset-font-defaults" value="yes">
                            <input type="submit" class="button-primary button button-large button-next"
                                   value="<?php esc_attr_e( 'Reset font style and colors', 'lyfpro' ); ?>" name="save_step"/>
							<?php wp_nonce_field( 'envato-setup' ); ?>
                        </form>
                    </li>
                </ul>
                <p class="envato-setup-actions step">
                    <a href="<?php echo esc_url( wp_get_referer() && ! strpos( wp_get_referer(), 'update.php' ) ? wp_get_referer() : admin_url( '' ) ); ?>"
                       class="button button-large"><?php esc_html_e( 'Cancel', 'lyfpro' ); ?></a>
                </p>
				<?php
			} else {
				?>
                <h1><?php printf( esc_html__( 'Welcome to the setup wizard for %s.', 'lyfpro' ), wp_get_theme() ); ?></h1>
                <p><?php printf( esc_html__( 'Thank you for choosing the %s theme from ThemeForest. This quick setup wizard will help you configure your new website. This wizard will install the required WordPress plugins, default content, logo and tell you a little about Help &amp; Support options. It should only take 5 minutes.', 'lyfpro' ), wp_get_theme() ); ?></p>
                <p><?php esc_html_e( 'No time right now? If you don\'t want to go through the wizard, you can skip and return to the WordPress dashboard. Come back anytime if you change your mind!', 'lyfpro' ); ?></p>
                <p class="envato-setup-actions step">
                    <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                       class="button-primary button button-large button-next"><?php esc_html_e( 'Let\'s Go!', 'lyfpro' ); ?></a>
                    <a href="<?php echo esc_url( wp_get_referer() && ! strpos( wp_get_referer(), 'update.php' ) ? wp_get_referer() : admin_url( '' ) ); ?>"
                       class="button button-large"><?php esc_html_e( 'Not right now', 'lyfpro' ); ?></a>
                </p>
				<?php
			}
		}

		public function filter_options( $options ) {
			return $options;
		}

		/**
		 *
		 * Handles save button from welcome page. This is to perform tasks when the setup wizard has already been run. E.g. reset defaults
		 *
		 * @since 1.2.5
		 */
		public function envato_setup_introduction_save() {

			check_admin_referer( 'envato-setup' );

			if ( ! empty( $_POST['reset-font-defaults'] ) && $_POST['reset-font-defaults'] == 'yes' ) {

				// clear font options
				update_option( 'tt_font_theme_options', array() );

				// reset site color
				remove_theme_mod( 'lyfpro_site_color' );

				if ( class_exists( 'lyfpro_customize_save_hook' ) ) {
					$site_color_defaults = new lyfpro_customize_save_hook();
					$site_color_defaults->save_color_options();
				}

				$file_name = get_template_directory() . '/style.custom.css';
				if ( file_exists( $file_name ) ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
					WP_Filesystem();
					global $wp_filesystem;
					$wp_filesystem->put_contents( $file_name, '' );
				}
				?>
                <p>
                    <strong><?php esc_html_e( 'Options have been reset. Please go to Appearance > Customize in the WordPress backend.', 'lyfpro' ); ?></strong>
                </p>
				<?php
				return true;
			}

			return false;
		}


		private function _get_plugins() {
			$tgmpa = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
			$plugins  = array(
				'all'      => array(), // Meaning: all plugins which still have open actions.
				'install'  => array(),
				'update'   => array(),
				'activate' => array(),
			);

			foreach ( $tgmpa->plugins as $slug => $plugin ) {
				if ( $tgmpa->tgmpa_check_plugin_active( $slug ) && false === $tgmpa->does_plugin_have_update( $slug ) ) {
					// No need to display plugins if they are installed, up-to-date and active.
					continue;
				} else {
					$plugins['all'][ $slug ] = $plugin;

					if ( ! $tgmpa->is_plugin_installed( $slug ) ) {
						$plugins['install'][ $slug ] = $plugin;
					} else {
						if ( false !== $tgmpa->does_plugin_have_update( $slug ) ) {
							$plugins['update'][ $slug ] = $plugin;
						}

						if ( $tgmpa->can_plugin_activate( $slug ) ) {
							$plugins['activate'][ $slug ] = $plugin;
						}
					}
				}
			}

			return $plugins;
		}

		/**
		 * Page setup
		 */
		public function envato_setup_default_plugins() {

			tgmpa_load_bulk_installer();
			// install plugins with TGM.
			if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
				die( 'Failed to find TGM' );
			}
			$url     = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'envato-setup' );
			$plugins = $this->_get_plugins();

			// copied from TGM

			$method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
			$fields = array_keys( $_POST ); // Extra fields to pass to WP_Filesystem.

			if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
				return true; // Stop the normal page form from displaying, credential request form will be shown.
			}

			// Now we have some credentials, setup WP_Filesystem.
			if ( ! WP_Filesystem( $creds ) ) {
				// Our credentials were no good, ask the user for them again.
				request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );

				return true;
			}

			/* If we arrive here, we have the filesystem */

			?>
            <h1><?php esc_html_e( 'Default Plugins', 'lyfpro' ); ?></h1>
            <form method="post">

				<?php
				$plugins = $this->_get_plugins();
				if ( count( $plugins['all'] ) ) {
					?>
                    <p><?php esc_html_e( 'Your website needs a few essential plugins. The following plugins will be installed or updated:', 'lyfpro' ); ?></p>
                    <ul class="envato-wizard-plugins">
						<?php foreach ( $plugins['all'] as $slug => $plugin ) { ?>
                            <li data-slug="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $plugin['name'] ); ?>
                                <span>
    								<?php
								    $keys = array();
								    if ( isset( $plugins['install'][ $slug ] ) ) {
									    $keys[] = 'Installation';
								    }
								    if ( isset( $plugins['update'][ $slug ] ) ) {
									    $keys[] = 'Update';
								    }
								    if ( isset( $plugins['activate'][ $slug ] ) ) {
									    $keys[] = 'Activation';
								    }
								    echo implode( ' and ', $keys ) . ' required';
								    ?>
    							</span>
                                <div class="spinner"></div>
                            </li>
						<?php } ?>
                    </ul>
					<?php
				} else {
					echo dsvy_esc_kses('<p><strong>' . esc_html_e( 'Good news! All plugins are already installed and up to date. Please continue.', 'lyfpro' ) . '</strong></p>');
				} ?>

                <p><?php esc_html_e( 'You can add and remove plugins later on from within WordPress.', 'lyfpro' ); ?></p>

                <p class="envato-setup-actions step">
                    <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                       class="button-primary button button-large button-next"
                       data-callback="install_plugins"><?php esc_html_e( 'Continue', 'lyfpro' ); ?></a>
                    <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                       class="button button-large button-next"><?php esc_html_e( 'Skip this step', 'lyfpro' ); ?></a>
					<?php wp_nonce_field( 'envato-setup' ); ?>
                </p>
            </form>
			<?php
		}


		public function ajax_plugins() {
			if ( ! check_ajax_referer( 'envato_setup_nonce', 'wpnonce' ) || empty( $_POST['slug'] ) ) {
				wp_send_json_error( array( 'error' => 1, 'message' => esc_html__( 'No Slug Found', 'lyfpro' ) ) );
			}
			$json = array();
			// send back some json we use to hit up TGM
			$plugins = $this->_get_plugins();
			// what are we doing with this plugin?
			foreach ( $plugins['activate'] as $slug => $plugin ) {
				if ( $_POST['slug'] == $slug ) {
					$json = array(
						'url'           => admin_url( $this->tgmpa_url ),
						'plugin'        => array( $slug ),
						'tgmpa-page'    => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
						'action'        => 'tgmpa-bulk-activate',
						'action2'       => - 1,
						'message'       => esc_html__( 'Activating Plugin', 'lyfpro' ),
					);
					break;
				}
			}
			foreach ( $plugins['update'] as $slug => $plugin ) {
				if ( $_POST['slug'] == $slug ) {
					$json = array(
						'url'           => admin_url( $this->tgmpa_url ),
						'plugin'        => array( $slug ),
						'tgmpa-page'    => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
						'action'        => 'tgmpa-bulk-update',
						'action2'       => - 1,
						'message'       => esc_html__( 'Updating Plugin', 'lyfpro' ),
					);
					break;
				}
			}
			foreach ( $plugins['install'] as $slug => $plugin ) {
				if ( $_POST['slug'] == $slug ) {
					$json = array(
						'url'           => admin_url( $this->tgmpa_url ),
						'plugin'        => array( $slug ),
						'tgmpa-page'    => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
						'action'        => 'tgmpa-bulk-install',
						'action2'       => - 1,
						'message'       => esc_html__( 'Installing Plugin', 'lyfpro' ),
					);
					break;
				}
			}

			if ( $json ) {
				$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
				wp_send_json( $json );
			} else {
				wp_send_json( array( 'done' => 1, 'message' => esc_html__( 'Success', 'lyfpro' ) ) );
			}
			exit;

		}


		private function _content_default_get() {

			$content = array();

			// find out what content is in our default json file.
			$available_content = $this->_get_json( 'default.json' );
			foreach ( $available_content as $post_type => $post_data ) {
				if ( count( $post_data ) ) {
					$first           = current( $post_data );
					$post_type_title = ! empty( $first['type_title'] ) ? $first['type_title'] : ucwords( $post_type ) . 's';
					if ( $post_type_title == 'Navigation Menu Items' ) {
						$post_type_title = 'Navigation';
					}
					$content[ $post_type ] = array(
						'title'            => $post_type_title,
						'description'      => sprintf( esc_html__( 'This will create default %s as seen in the demo.', 'lyfpro' ), $post_type_title ),
						'pending'          => esc_html__( 'Pending.', 'lyfpro' ),
						'installing'       => esc_html__( 'Installing.', 'lyfpro' ),
						'success'          => esc_html__( 'Success.', 'lyfpro' ),
						'install_callback' => array( $this, '_content_install_type' ),
						'checked'          => $this->is_possible_upgrade() ? 0 : 1,
						// dont check if already have content installed.
					);
				}
			}

			$content['widgets'] = array(
				'title'            => esc_html__( 'Widgets', 'lyfpro' ),
				'description'      => esc_html__( 'Insert default sidebar widgets as seen in the demo.', 'lyfpro' ),
				'pending'          => esc_html__( 'Pending.', 'lyfpro' ),
				'installing'       => esc_html__( 'Installing Default Widgets.', 'lyfpro' ),
				'success'          => esc_html__( 'Success.', 'lyfpro' ),
				'install_callback' => array( $this, '_content_install_widgets' ),
				'checked'          => $this->is_possible_upgrade() ? 0 : 1,
				// dont check if already have content installed.
			);
			$content['settings'] = array(
				'title'            => esc_html__( 'Settings', 'lyfpro' ),
				'description'      => esc_html__( 'Configure default settings.', 'lyfpro' ),
				'pending'          => esc_html__( 'Pending.', 'lyfpro' ),
				'installing'       => esc_html__( 'Installing Default Settings.', 'lyfpro' ),
				'success'          => esc_html__( 'Success.', 'lyfpro' ),
				'install_callback' => array( $this, '_content_install_settings' ),
				'checked'          => $this->is_possible_upgrade() ? 0 : 1,
				// dont check if already have content installed.
			);

			$content = apply_filters( $this->theme_name . '_theme_setup_wizard_content', $content );

			return $content;

		}

		/**
		 * Page setup
		 */
		public function envato_setup_default_content() {
			?>
            <h1><?php esc_html_e( 'Default Content', 'lyfpro' ); ?></h1>
            <form method="post">
				<?php if ( $this->is_possible_upgrade() ) { ?>
                    <p><?php esc_html_e( 'It looks like you already have content installed on this website. If you would like to install the default demo content as well you can select it below. Otherwise just choose the upgrade option to ensure everything is up to date.', 'lyfpro' ); ?></p>
				<?php } else { ?>
                    <p><?php printf( esc_html__( 'It\'s time to insert some default content for your new WordPress website. Choose what you would like inserted below and click Continue. It is recommended to leave everything selected. Once inserted, this content can be managed from the WordPress admin dashboard. ', 'lyfpro' ), '<a href="' . esc_url( admin_url( 'edit.php?post_type=page' ) ) . '" target="_blank">', '</a>' ); ?></p>
				<?php } ?>
                <table class="envato-setup-pages" cellspacing="0">
                    <thead>
                    <tr>
                        <td class="check"></td>
                        <th class="item"><?php esc_html_e( 'Item', 'lyfpro' ); ?></th>
                        <th class="description"><?php esc_html_e( 'Description', 'lyfpro' ); ?></th>
                        <th class="status"><?php esc_html_e( 'Status', 'lyfpro' ); ?></th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach ( $this->_content_default_get() as $slug => $default ) { ?>
                        <tr class="envato_default_content" data-content="<?php echo esc_attr( $slug ); ?>">
                            <td>
                                <input type="checkbox" name="default_content[<?php echo esc_attr( $slug ); ?>]"
                                       class="envato_default_content"
                                       id="default_content_<?php echo esc_attr( $slug ); ?>"
                                       value="1" <?php echo ( ! isset( $default['checked'] ) || $default['checked'] ) ? esc_attr('checked') : ''; ?>>
                            </td>
                            <td><label
                                        for="default_content_<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $default['title'] ); ?></label>
                            </td>
                            <td class="description"><?php echo esc_html( $default['description'] ); ?></td>
                            <td class="status"><span><?php echo esc_html( $default['pending'] ); ?></span>
                                <div class="spinner"></div>
                            </td>
                        </tr>
					<?php } ?>
                    </tbody>
                </table>

                <p class="envato-setup-actions step">
                    <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                       class="button-primary button button-large button-next"
                       data-callback="install_content"><?php esc_html_e( 'Continue', 'lyfpro' ); ?></a>
                    <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                       class="button button-large button-next"><?php esc_html_e( 'Skip this step', 'lyfpro' ); ?></a>
					<?php wp_nonce_field( 'envato-setup' ); ?>
                </p>
            </form>
			<?php
		}


		public function ajax_content() {
			$content = $this->_content_default_get();
			if ( ! check_ajax_referer( 'envato_setup_nonce', 'wpnonce' ) || empty( $_POST['content'] ) && isset( $content[ $_POST['content'] ] ) ) {
				wp_send_json_error( array( 'error' => 1, 'message' => esc_html__( 'No content Found', 'lyfpro' ) ) );
			}

			$json         = false;
			$this_content = $content[ $_POST['content'] ];

			if ( isset( $_POST['proceed'] ) ) {
				// install the content!

				$this->log( ' -!! STARTING SECTION for ' . $_POST['content'] );

				// init delayed posts from transient.
				$this->delay_posts = get_transient( 'delayed_posts' );
				if ( ! is_array( $this->delay_posts ) ) {
					$this->delay_posts = array();
				}

				if ( ! empty( $this_content['install_callback'] ) ) {
					if ( $result = call_user_func( $this_content['install_callback'] ) ) {

						$this->log( ' -- FINISH. Writing ' . count( $this->delay_posts, COUNT_RECURSIVE ) . ' delayed posts to transient ' );
						set_transient( 'delayed_posts', $this->delay_posts, 60 * 60 * 24 );

						if ( is_array( $result ) && isset( $result['retry'] ) ) {
							// we split the stuff up again.
							$json = array(
								'url'         => admin_url( 'admin-ajax.php' ),
								'action'      => 'envato_setup_content',
								'proceed'     => 'true',
								'retry'       => time(),
								'retry_count' => $result['retry_count'],
								'content'     => $_POST['content'],
								'_wpnonce'    => wp_create_nonce( 'envato_setup_nonce' ),
								'message'     => $this_content['installing'],
								'logs'        => $this->logs,
								'errors'      => $this->errors,
							);
						} else {
							$json = array(
								'done'    => 1,
								'message' => $this_content['success'],
								'debug'   => $result,
								'logs'    => $this->logs,
								'errors'  => $this->errors,
							);
						}
					}
				}
			} else {

				$json = array(
					'url'      => admin_url( 'admin-ajax.php' ),
					'action'   => 'envato_setup_content',
					'proceed'  => 'true',
					'content'  => $_POST['content'],
					'_wpnonce' => wp_create_nonce( 'envato_setup_nonce' ),
					'message'  => $this_content['installing'],
					'logs'     => $this->logs,
					'errors'   => $this->errors,
				);
			}

			if ( $json ) {
				$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
				wp_send_json( $json );
			} else {
				wp_send_json( array(
					'error'   => 1,
					'message' => esc_html__( 'Error', 'lyfpro' ),
					'logs'    => $this->logs,
					'errors'  => $this->errors,
				) );
			}

			exit;

		}


		private function _imported_term_id( $original_term_id, $new_term_id = false ) {
			$terms = get_transient( 'importtermids' );
			if ( ! is_array( $terms ) ) {
				$terms = array();
			}
			if ( $new_term_id ) {
				if ( ! isset( $terms[ $original_term_id ] ) ) {
					$this->log( 'Insert old TERM ID ' . $original_term_id . ' as new TERM ID: ' . $new_term_id );
				} else if ( $terms[ $original_term_id ] != $new_term_id ) {
					$this->error( 'Replacement OLD TERM ID ' . $original_term_id . ' overwritten by new TERM ID: ' . $new_term_id );
				}
				$terms[ $original_term_id ] = $new_term_id;
				set_transient( 'importtermids', $terms, 60 * 60 * 24 );
			} else if ( $original_term_id && isset( $terms[ $original_term_id ] ) ) {
				return $terms[ $original_term_id ];
			}

			return false;
		}


		public function vc_post( $post_id = false ) {

			$vc_post_ids = get_transient( 'import_vc_posts' );
			if ( ! is_array( $vc_post_ids ) ) {
				$vc_post_ids = array();
			}
			if ( $post_id ) {
				$vc_post_ids[ $post_id ] = $post_id;
				set_transient( 'import_vc_posts', $vc_post_ids, 60 * 60 * 24 );
			} else {

				$this->log( 'Processing vc pages 2: ' );

				return;
				if ( class_exists( 'Vc_Manager' ) && class_exists( 'Vc_Post_Admin' ) ) {
					$this->log( $vc_post_ids );
					$vc_manager = Vc_Manager::getInstance();
					$vc_base    = $vc_manager->vc();
					$post_admin = new Vc_Post_Admin();
					foreach ( $vc_post_ids as $vc_post_id ) {
						$this->log( 'Save ' . $vc_post_id );
						$vc_base->buildShortcodesCustomCss( $vc_post_id );
						$post_admin->save( $vc_post_id );
						$post_admin->setSettings( $vc_post_id );
						//twice? bug?
						$vc_base->buildShortcodesCustomCss( $vc_post_id );
						$post_admin->save( $vc_post_id );
						$post_admin->setSettings( $vc_post_id );
					}
				}
			}

		}


		public function elementor_post( $post_id = false ) {

			// regenrate the CSS for this Elementor post
			if( class_exists( 'Elementor\Post_CSS_File' ) ) {
				$post_css = new Elementor\Post_CSS_File($post_id);
				$post_css->update();
			}

		}



		private function _imported_post_id( $original_id = false, $new_id = false ) {
			if ( is_array( $original_id ) || is_object( $original_id ) ) {
				return false;
			}
			$post_ids = get_transient( 'importpostids' );
			if ( ! is_array( $post_ids ) ) {
				$post_ids = array();
			}
			if ( $new_id ) {
				if ( ! isset( $post_ids[ $original_id ] ) ) {
					$this->log( 'Insert old ID ' . $original_id . ' as new ID: ' . $new_id );
				} else if ( $post_ids[ $original_id ] != $new_id ) {
					$this->error( 'Replacement OLD ID ' . $original_id . ' overwritten by new ID: ' . $new_id );
				}
				$post_ids[ $original_id ] = $new_id;
				set_transient( 'importpostids', $post_ids, 60 * 60 * 24 );
			} else if ( $original_id && isset( $post_ids[ $original_id ] ) ) {
				return $post_ids[ $original_id ];
			} else if ( $original_id === false ) {
				return $post_ids;
			}

			return false;
		}

		private function _post_orphans( $original_id = false, $missing_parent_id = false ) {
			$post_ids = get_transient( 'postorphans' );
			if ( ! is_array( $post_ids ) ) {
				$post_ids = array();
			}
			if ( $missing_parent_id ) {
				$post_ids[ $original_id ] = $missing_parent_id;
				set_transient( 'postorphans', $post_ids, 60 * 60 * 24 );
			} else if ( $original_id && isset( $post_ids[ $original_id ] ) ) {
				return $post_ids[ $original_id ];
			} else if ( $original_id === false ) {
				return $post_ids;
			}

			return false;
		}

		private function _cleanup_imported_ids() {
			// loop over all attachments and assign the correct post ids to those attachments.

		}

		private $delay_posts = array();

		private function _delay_post_process( $post_type, $post_data ) {
			if ( ! isset( $this->delay_posts[ $post_type ] ) ) {
				$this->delay_posts[ $post_type ] = array();
			}
			$this->delay_posts[ $post_type ][ $post_data['post_id'] ] = $post_data;

		}


		// return the difference in length between two strings
		public function cmpr_strlen( $a, $b ) {
			return strlen( $b ) - strlen( $a );
		}

		private function _process_post_data( $post_type, $post_data, $delayed = 0, $debug = false ) {

			$this->log( " Processing $post_type " . $post_data['post_id'] );
			$original_post_data = $post_data;

			if ( ! post_type_exists( $post_type ) ) {
				return false;
			}
			if ( ! $debug && $this->_imported_post_id( $post_data['post_id'] ) ) {
				return true; // already done :)
			}
			if ( empty( $post_data['post_title'] ) && empty( $post_data['post_name'] ) ) {
				// this is menu items
				$post_data['post_name'] = $post_data['post_id'];
			}

			$post_data['post_type'] = $post_type;

			$post_parent = (int) $post_data['post_parent'];
			if ( $post_parent ) {
				// if we already know the parent, map it to the new local ID
				if ( $this->_imported_post_id( $post_parent ) ) {
					$post_data['post_parent'] = $this->_imported_post_id( $post_parent );
					// otherwise record the parent for later
				} else {
					$this->_post_orphans( intval( $post_data['post_id'] ), $post_parent );
					$post_data['post_parent'] = 0;
				}
			}

			// check if already exists
			if ( ! $debug ) {
				if ( empty( $post_data['post_title'] ) && ! empty( $post_data['post_name'] ) ) {
					global $wpdb;
					$sql     = "
					SELECT ID, post_name, post_parent, post_type
					FROM $wpdb->posts
					WHERE post_name = %s
					AND post_type = %s
				";
					$pages   = $wpdb->get_results( $wpdb->prepare( $sql, array(
						$post_data['post_name'],
						$post_type,
					) ), OBJECT_K );
					$foundid = 0;
					foreach ( (array) $pages as $page ) {
						if ( $page->post_name == $post_data['post_name'] && empty( $page->post_title ) ) {
							$foundid = $page->ID;
						}
					}
					if ( $foundid ) {
						$this->_imported_post_id( $post_data['post_id'], $foundid );

						return true;
					}
				}
				// dont use post_exists because it will dupe up on media with same name but different slug
				if ( ! empty( $post_data['post_title'] ) && ! empty( $post_data['post_name'] ) ) {
					global $wpdb;
					$sql     = "
					SELECT ID, post_name, post_parent, post_type
					FROM $wpdb->posts
					WHERE post_name = %s
					AND post_title = %s
					AND post_type = %s
					";
					$pages   = $wpdb->get_results( $wpdb->prepare( $sql, array(
						$post_data['post_name'],
						$post_data['post_title'],
						$post_type,
					) ), OBJECT_K );
					$foundid = 0;
					foreach ( (array) $pages as $page ) {
						if ( $page->post_name == $post_data['post_name'] ) {
							$foundid = $page->ID;
						}
					}
					if ( $foundid ) {
						$this->_imported_post_id( $post_data['post_id'], $foundid );

						return true;
					}
				}
			}

			// backwards compat with old import format.
			if ( isset( $post_data['meta'] ) ) {
				foreach ( $post_data['meta'] as $key => $meta ) {
					if(is_array($meta) && count($meta) == 1){
						$single_meta = current($meta);
						if(!is_array($single_meta)){
							$post_data['meta'][$key] = $single_meta;
						}
					}
				}
			}

			switch ( $post_type ) {
				case 'attachment':
					// import media via url
					if ( ! empty( $post_data['guid'] ) ) {

						// check if this has already been imported.
						$old_guid = $post_data['guid'];
						if ( $this->_imported_post_id( $old_guid ) ) {
							return true; // alrady done;
						}
						// ignore post parent, we haven't imported those yet.
						//                          $file_data = wp_remote_get($post_data['guid']);
						$remote_url = $post_data['guid'];

						$post_data['upload_date'] = date( 'Y/m', strtotime( $post_data['post_date_gmt'] ) );
						if ( isset( $post_data['meta'] ) ) {
							foreach ( $post_data['meta'] as $key => $meta ) {
								if ( $key == '_wp_attached_file' ) {
									foreach ( (array) $meta as $meta_val ) {
										if ( preg_match( '%^[0-9]{4}/[0-9]{2}%', $meta_val, $matches ) ) {
											$post_data['upload_date'] = $matches[0];
										}
									}
								}
							}
						}

						$upload = $this->_fetch_remote_file( $remote_url, $post_data );

						if ( ! is_array( $upload ) || is_wp_error( $upload ) ) {
							// todo: error
							return false;
						}

						if ( $info = wp_check_filetype( $upload['file'] ) ) {
							$post['post_mime_type'] = $info['type'];
						} else {
							return false;
						}

						$post_data['guid'] = $upload['url'];

						// as per wp-admin/includes/upload.php
						$post_id = wp_insert_attachment( $post_data, $upload['file'] );
						if ( $post_id ) {

							if ( ! empty( $post_data['meta'] ) ) {
								foreach ( $post_data['meta'] as $meta_key => $meta_val ) {
									if ( $meta_key != '_wp_attached_file' && ! empty( $meta_val ) ) {
										update_post_meta( $post_id, $meta_key, $meta_val );
									}
								}
							}

							wp_update_attachment_metadata( $post_id, wp_generate_attachment_metadata( $post_id, $upload['file'] ) );

							// remap resized image URLs, works by stripping the extension and remapping the URL stub.
							if ( preg_match( '!^image/!', $info['type'] ) ) {
								$parts = pathinfo( $remote_url );
								$name  = basename( $parts['basename'], ".{$parts['extension']}" ); // PATHINFO_FILENAME in PHP 5.2

								$parts_new = pathinfo( $upload['url'] );
								$name_new  = basename( $parts_new['basename'], ".{$parts_new['extension']}" );

								$this->_imported_post_id( $parts['dirname'] . '/' . $name, $parts_new['dirname'] . '/' . $name_new );
							}
							$this->_imported_post_id( $post_data['post_id'], $post_id );
						}
					}
					break;
				default:
					// work out if we have to delay this post insertion
					$replace_meta_vals = array(
						// not required
					);

					if ( ! empty( $post_data['meta'] ) && is_array( $post_data['meta'] ) ) {

						// replace any elementor post data:

						// fix for double json encoded stuff:
						foreach ( $post_data['meta'] as $meta_key => $meta_val ) {
							if ( is_string( $meta_val ) && strlen( $meta_val ) && $meta_val[0] == '[' ) {
								$test_json = @json_decode( $meta_val, true );
								if ( is_array( $test_json ) ) {
									$post_data['meta'][ $meta_key ] = $test_json;
								}
							}
						}

						array_walk_recursive( $post_data['meta'], array( $this, '_elementor_id_import' ) );

						// replace menu data:
						// work out what we're replacing. a tax, page, term etc..

						if ( ! empty( $post_data['meta']['_menu_item_menu_item_parent'] ) ) {
							$new_parent_id = $this->_imported_post_id( $post_data['meta']['_menu_item_menu_item_parent'] );
							if ( ! $new_parent_id ) {
								if ( $delayed ) {
									// already delayed, unable to find this meta value, skip inserting it
									$this->error( 'Unable to find replacement. Continue anyway.... content will most likely break..' );
								} else {
									$this->error( 'Unable to find replacement. Delaying.... ' );
									$this->_delay_post_process( $post_type, $original_post_data );
									return false;
								}
							}
							$post_data['meta']['_menu_item_menu_item_parent'] = $new_parent_id;
						}
						switch ( $post_data['meta']['_menu_item_type'] ) {
							case 'post_type':
								if ( ! empty( $post_data['meta']['_menu_item_object_id'] ) ) {
									$new_parent_id = $this->_imported_post_id( $post_data['meta']['_menu_item_object_id'] );
									if ( ! $new_parent_id ) {
										if ( $delayed ) {
											// already delayed, unable to find this meta value, skip inserting it
											$this->error( 'Unable to find replacement. Continue anyway.... content will most likely break..' );
										} else {
											$this->error( 'Unable to find replacement. Delaying.... ' );
											$this->_delay_post_process( $post_type, $original_post_data );
											return false;
										}
									}
									$post_data['meta']['_menu_item_object_id'] = $new_parent_id;
								}
								break;
							case 'taxonomy':
								if ( ! empty( $post_data['meta']['_menu_item_object_id'] ) ) {
									$new_parent_id = $this->_imported_term_id( $post_data['meta']['_menu_item_object_id'] );
									if ( ! $new_parent_id ) {
										if ( $delayed ) {
											// already delayed, unable to find this meta value, skip inserting it
											$this->error( 'Unable to find replacement. Continue anyway.... content will most likely break..' );
										} else {
											$this->error( 'Unable to find replacement. Delaying.... ' );
											$this->_delay_post_process( $post_type, $original_post_data );
											return false;
										}
									}
									$post_data['meta']['_menu_item_object_id'] = $new_parent_id;
								}
								break;
						}

						// please ignore this horrible loop below:
						// it was an attempt to automate different visual composer meta key replacements
						// but I'm not using visual composer any more, so ignoring it.
						foreach ( $replace_meta_vals as $meta_key_to_replace => $meta_values_to_replace ) {

							$meta_keys_to_replace   = explode( '|', $meta_key_to_replace );
							$success                = false;
							$trying_to_find_replace = false;
							foreach ( $meta_keys_to_replace as $meta_key ) {

								if ( ! empty( $post_data['meta'][ $meta_key ] ) ) {

									$meta_val = $post_data['meta'][ $meta_key ];

									// if we're replacing a single post/tax value.
									if ( isset( $meta_values_to_replace['post'] ) && $meta_values_to_replace['post'] && (int) $meta_val > 0 ) {
										$trying_to_find_replace = true;
										$new_meta_val           = $this->_imported_post_id( $meta_val );
										if ( $new_meta_val ) {
											$post_data['meta'][ $meta_key ] = $new_meta_val;
											$success                        = true;
										} else {
											$success = false;
											break;
										}
									}
									if ( isset( $meta_values_to_replace['taxonomy'] ) && $meta_values_to_replace['taxonomy'] && (int) $meta_val > 0 ) {
										$trying_to_find_replace = true;
										$new_meta_val           = $this->_imported_term_id( $meta_val );
										if ( $new_meta_val ) {
											$post_data['meta'][ $meta_key ] = $new_meta_val;
											$success                        = true;
										} else {
											$success = false;
											break;
										}
									}
									if ( is_array( $meta_val ) && isset( $meta_values_to_replace['posts'] ) ) {

										foreach ( $meta_values_to_replace['posts'] as $post_array_key ) {

											$this->log( 'Trying to find/replace "' . $post_array_key . '"" in the ' . $meta_key . ' sub array:' );

											$this_success = false;
											array_walk_recursive( $meta_val, function ( &$item, $key ) use ( &$trying_to_find_replace, $post_array_key, &$success, &$this_success, $post_type, $original_post_data, $meta_key, $delayed ) {
												if ( $key == $post_array_key && (int) $item > 0 ) {
													$trying_to_find_replace = true;
													$new_insert_id          = $this->_imported_post_id( $item );
													if ( $new_insert_id ) {
														$success      = true;
														$this_success = true;
														$this->log( 'Found' . $meta_key . ' -> ' . $post_array_key . ' replacement POST ID insert for ' . $item . ' ( as ' . $new_insert_id . ' ) ' );
														$item = $new_insert_id;
													} else {
														$this->error( 'Unable to find ' . $meta_key . ' -> ' . $post_array_key . ' POST ID insert for ' . $item . ' ' );
													}
												}
											} );
											if ( $this_success ) {
												$post_data['meta'][ $meta_key ] = $meta_val;
											}
										}
										foreach ( $meta_values_to_replace['taxonomies'] as $post_array_key ) {

											$this->log( 'Trying to find/replace "' . $post_array_key . '"" TAXONOMY in the ' . $meta_key . ' sub array:' );

											$this_success = false;
											array_walk_recursive( $meta_val, function ( &$item, $key ) use ( &$trying_to_find_replace, $post_array_key, &$success, &$this_success, $post_type, $original_post_data, $meta_key, $delayed ) {
												if ( $key == $post_array_key && (int) $item > 0 ) {
													$trying_to_find_replace = true;
													$new_insert_id          = $this->_imported_term_id( $item );
													if ( $new_insert_id ) {
														$success      = true;
														$this_success = true;
														$this->log( 'Found' . $meta_key . ' -> ' . $post_array_key . ' replacement TAX ID insert for ' . $item . ' ( as ' . $new_insert_id . ' ) ' );
														$item = $new_insert_id;
													} else {
														$this->error( 'Unable to find ' . $meta_key . ' -> ' . $post_array_key . ' TAX ID insert for ' . $item . ' ' );
													}
												}
											} );

											if ( $this_success ) {
												$post_data['meta'][ $meta_key ] = $meta_val;
											}
										}
									}

								}
							}
							if ( $trying_to_find_replace ) {
								$this->log( 'Trying to find/replace postmeta "' . $meta_key_to_replace . '" ' );
								if ( ! $success ) {
									// failed to find a replacement.
									if ( $delayed ) {
										// already delayed, unable to find this meta value, skip inserting it
										$this->error( 'Unable to find replacement. Continue anyway.... content will most likely break..' );
									} else {
										$this->error( 'Unable to find replacement. Delaying.... ' );
										$this->_delay_post_process( $post_type, $original_post_data );

										return false;
									}
								} else {
									$this->log( 'SUCCESSSS ' );
								}
							}
						}
					}

					$post_data['post_content'] = $this->_parse_gallery_shortcode_content( $post_data['post_content'] );

					// we have to fix up all the visual composer inserted image ids
					$replace_post_id_keys = array(
						'parallax_image',
						'lyfpro_row_image_top',
						'lyfpro_row_image_bottom',
						'image',
						'item', // vc grid
						'post_id',
					);
					foreach ( $replace_post_id_keys as $replace_key ) {
						if ( preg_match_all( '# ' . $replace_key . '="(\d+)"#', $post_data['post_content'], $matches ) ) {
							foreach ( $matches[0] as $match_id => $string ) {
								$new_id = $this->_imported_post_id( $matches[1][ $match_id ] );
								if ( $new_id ) {
									$post_data['post_content'] = str_replace( $string, ' ' . $replace_key . '="' . $new_id . '"', $post_data['post_content'] );
								} else {
									$this->error( 'Unable to find POST replacement for ' . $replace_key . '="' . $matches[1][ $match_id ] . '" in content.' );
									if ( $delayed ) {
										// already delayed, unable to find this meta value, insert it anyway.

									} else {

										$this->error( 'Adding ' . $post_data['post_id'] . ' to delay listing.' );
										$this->_delay_post_process( $post_type, $original_post_data );

										return false;
									}
								}
							}
						}
					}
					$replace_tax_id_keys = array(
						'taxonomies',
					);
					foreach ( $replace_tax_id_keys as $replace_key ) {
						if ( preg_match_all( '# ' . $replace_key . '="(\d+)"#', $post_data['post_content'], $matches ) ) {
							foreach ( $matches[0] as $match_id => $string ) {
								$new_id = $this->_imported_term_id( $matches[1][ $match_id ] );
								if ( $new_id ) {
									$post_data['post_content'] = str_replace( $string, ' ' . $replace_key . '="' . $new_id . '"', $post_data['post_content'] );
								} else {
									$this->error( 'Unable to find TAXONOMY replacement for ' . $replace_key . '="' . $matches[1][ $match_id ] . '" in content.' );
									if ( $delayed ) {
										// already delayed, unable to find this meta value, insert it anyway.
									} else {
										$this->_delay_post_process( $post_type, $original_post_data );

										return false;
									}
								}
							}
						}
					}

					$post_id = wp_insert_post( $post_data, true );
					if ( ! is_wp_error( $post_id ) ) {
						$this->_imported_post_id( $post_data['post_id'], $post_id );
						// add/update post meta
						if ( ! empty( $post_data['meta'] ) ) {
							foreach ( $post_data['meta'] as $meta_key => $meta_val ) {

								// if the post has a featured image, take note of this in case of remap
								if ( '_thumbnail_id' == $meta_key ) {
									/// find this inserted id and use that instead.
									$inserted_id = $this->_imported_post_id( intval( $meta_val ) );
									if ( $inserted_id ) {
										$meta_val = $inserted_id;
									}
								}

								update_post_meta( $post_id, $meta_key, $meta_val );

							}
						}
						if ( ! empty( $post_data['terms'] ) ) {
							$terms_to_set = array();
							foreach ( $post_data['terms'] as $term_slug => $terms ) {
								foreach ( $terms as $term ) {
									$taxonomy = $term['taxonomy'];
									if ( taxonomy_exists( $taxonomy ) ) {
										$term_exists = term_exists( $term['slug'], $taxonomy );
										$term_id     = is_array( $term_exists ) ? $term_exists['term_id'] : $term_exists;
										if ( ! $term_id ) {
											if ( ! empty( $term['parent'] ) ) {
												// see if we have imported this yet?
												$term['parent'] = $this->_imported_term_id( $term['parent'] );
											}
											$t = wp_insert_term( $term['name'], $taxonomy, $term );
											if ( ! is_wp_error( $t ) ) {
												$term_id = $t['term_id'];
											} else {
												// todo - error
												continue;
											}
										}
										$this->_imported_term_id( $term['term_id'], $term_id );
										// add the term meta.
										if($term_id && !empty($term['meta']) && is_array($term['meta'])){
											foreach($term['meta'] as $meta_key => $meta_val){
                                                // we have to replace certain meta_key/meta_val
                                                // e.g. thumbnail id from woocommerce product categories.
                                                switch($meta_key){
                                                    case 'thumbnail_id':
                                                        if( $new_meta_val = $this->_imported_post_id($meta_val) ){
                                                            // use this new id.
                                                            $meta_val = $new_meta_val;
                                                        }
                                                        break;
                                                }
												update_term_meta( $term_id, $meta_key, $meta_val );
											}
										}
										$terms_to_set[ $taxonomy ][] = intval( $term_id );
									}
								}
							}
							foreach ( $terms_to_set as $tax => $ids ) {
								wp_set_post_terms( $post_id, $ids, $tax );
							}
						}

						// procses visual composer just to be sure.
						if ( strpos( $post_data['post_content'], '[vc_' ) !== false ) {
							$this->vc_post( $post_id );
						}
						if ( !empty($post_data['meta']['_elementor_data']) || !!empty($post_data['meta']['_elementor_css']) ) {
							$this->elementor_post( $post_id );
						}
					}

					break;
			}

			return true;
		}

		private function _parse_gallery_shortcode_content( $content ) {
			// we have to format the post content. rewriting images and gallery stuff
			$replace      = $this->_imported_post_id();
			$urls_replace = array();
			foreach ( $replace as $key => $val ) {
				if ( $key && $val && ! is_numeric( $key ) && ! is_numeric( $val ) ) {
					$urls_replace[ $key ] = $val;
				}
			}
			if ( $urls_replace ) {
				uksort( $urls_replace, array( &$this, 'cmpr_strlen' ) );
				foreach ( $urls_replace as $from_url => $to_url ) {
					$content = str_replace( $from_url, $to_url, $content );
				}
			}
			if ( preg_match_all( '#\[gallery[^\]]*\]#', $content, $matches ) ) {
				foreach ( $matches[0] as $match_id => $string ) {
					if ( preg_match( '#ids="([^"]+)"#', $string, $ids_matches ) ) {
						$ids = explode( ',', $ids_matches[1] );
						foreach ( $ids as $key => $val ) {
							$new_id = $val ? $this->_imported_post_id( $val ) : false;
							if ( ! $new_id ) {
								unset( $ids[ $key ] );
							} else {
								$ids[ $key ] = $new_id;
							}
						}
						$new_ids                   = implode( ',', $ids );
						$content = str_replace( $ids_matches[0], 'ids="' . $new_ids . '"', $content );
					}
				}
			}
			// contact form 7 id fixes.
			if ( preg_match_all( '#\[contact-form-7[^\]]*\]#', $content, $matches ) ) {
				foreach ( $matches[0] as $match_id => $string ) {
					if ( preg_match( '#id="(\d+)"#', $string, $id_match ) ) {
						$new_id = $this->_imported_post_id( $id_match[1] );
						if ( $new_id ) {
							$content = str_replace( $id_match[0], 'id="' . $new_id . '"', $content );
						} else {
							// no imported ID found. remove this entry.
							$content = str_replace( $matches[0], '(insert contact form here)', $content );
						}
					}
				}
			}
			return $content;
		}

        private function _elementor_id_import( &$item, $key ) {
            if ( $key == 'id' && ! empty( $item ) && is_numeric( $item ) ) {
                // check if this has been imported before
                $new_meta_val = $this->_imported_post_id( $item );
                if ( $new_meta_val ) {
                    $item = $new_meta_val;
                }
            }
            if ( ( $key == 'page' || $key == 'page_id' ) && ! empty( $item ) ) {

				if ( false !== strpos( $item, 'p.' ) ) {
					$new_id = str_replace( 'p.', '', $item );
					// check if this has been imported before
					$new_meta_val = $this->_imported_post_id( $new_id );
					if ( $new_meta_val ) {
						$item = 'p.' . $new_meta_val;
					}
				} else if ( is_numeric( $item ) ) {
					// check if this has been imported before
					$new_meta_val = $this->_imported_post_id( $item );
					if ( $new_meta_val ) {
						$item = $new_meta_val;
					}
				}
			}
			if ( $key == 'post_id' && ! empty( $item ) && is_numeric( $item ) ) {
				// check if this has been imported before
				$new_meta_val = $this->_imported_post_id( $item );
				if ( $new_meta_val ) {
					$item = $new_meta_val;
				}
			}
			if ( $key == 'url' && ! empty( $item ) && (strstr( $item, 'ocalhost' ) || strstr( $item, 'dev.dtbaker' )) ) {
				// check if this has been imported before
				$new_meta_val = $this->_imported_post_id( $item );
				if ( $new_meta_val ) {
					$item = $new_meta_val;
				}
			}
			if ( ($key == 'shortcode' || $key == 'editor') && ! empty( $item ) ) {
				// we have to fix the [contact-form-7 id=133] shortcode issue.
				$item = $this->_parse_gallery_shortcode_content( $item );

			}
		}

		private function _content_install_type() {
			$post_type = ! empty( $_POST['content'] ) ? $_POST['content'] : false;
			$all_data  = $this->_get_json( 'default.json' );
			if ( ! $post_type || ! isset( $all_data[ $post_type ] ) ) {
				return false;
			}
			$limit = 10 + ( isset( $_REQUEST['retry_count'] ) ? (int) $_REQUEST['retry_count'] : 0 );
			$x     = 0;
			foreach ( $all_data[ $post_type ] as $post_data ) {

				$this->_process_post_data( $post_type, $post_data );

				if ( $x ++ > $limit ) {
					return array( 'retry' => 1, 'retry_count' => $limit );
				}
			}

			$this->_handle_delayed_posts();

			$this->_handle_post_orphans();

			// now we have to handle any custom SQL queries. This is needed for the events manager to store location and event details.
			$sql = $this->_get_sql( basename( $post_type ) . '.sql' );
			if ( $sql ) {
				global $wpdb;
				// do a find-replace with certain keys.
				if ( preg_match_all( '#__POSTID_(\d+)__#', $sql, $matches ) ) {
					foreach ( $matches[0] as $match_id => $match ) {
						$new_id = $this->_imported_post_id( $matches[1][ $match_id ] );
						if ( ! $new_id ) {
							$new_id = 0;
						}
						$sql = str_replace( $match, $new_id, $sql );
					}
				}
				$sql  = str_replace( '__DBPREFIX__', $wpdb->prefix, $sql );
				$bits = preg_split( "/;(\s*\n|$)/", $sql );
				foreach ( $bits as $bit ) {
					$bit = trim( $bit );
					if ( $bit ) {
						$wpdb->query( $bit );
					}
				}
			}

			return true;

		}

		private function _handle_post_orphans() {
			$orphans = $this->_post_orphans();
			foreach ( $orphans as $original_post_id => $original_post_parent_id ) {
				if ( $original_post_parent_id ) {
					if ( $this->_imported_post_id( $original_post_id ) && $this->_imported_post_id( $original_post_parent_id ) ) {
						$post_data                = array();
						$post_data['ID']          = $this->_imported_post_id( $original_post_id );
						$post_data['post_parent'] = $this->_imported_post_id( $original_post_parent_id );
						wp_update_post( $post_data );
						$this->_post_orphans( $original_post_id, 0 ); // ignore future
					}
				}
			}
		}

		private function _handle_delayed_posts( $last_delay = false ) {

			$this->log( ' ---- Processing ' . count( $this->delay_posts, COUNT_RECURSIVE ) . ' delayed posts' );
			for ( $x = 1; $x < 4; $x ++ ) {
				foreach ( $this->delay_posts as $delayed_post_type => $delayed_post_datas ) {
					foreach ( $delayed_post_datas as $delayed_post_id => $delayed_post_data ) {
						if ( $this->_imported_post_id( $delayed_post_data['post_id'] ) ) {
							$this->log( $x . ' - Successfully processed ' . $delayed_post_type . ' ID ' . $delayed_post_data['post_id'] . ' previously.' );
							unset( $this->delay_posts[ $delayed_post_type ][ $delayed_post_id ] );
							$this->log( ' ( ' . count( $this->delay_posts, COUNT_RECURSIVE ) . ' delayed posts remain ) ' );
						} else if ( $this->_process_post_data( $delayed_post_type, $delayed_post_data, $last_delay ) ) {
							$this->log( $x . ' - Successfully found delayed replacement for ' . $delayed_post_type . ' ID ' . $delayed_post_data['post_id'] . '.' );
							// successfully inserted! don't try again.
							unset( $this->delay_posts[ $delayed_post_type ][ $delayed_post_id ] );
							$this->log( ' ( ' . count( $this->delay_posts, COUNT_RECURSIVE ) . ' delayed posts remain ) ' );
						}
					}
				}
			}
		}

		private function _fetch_remote_file( $url, $post ) {
			// extract the file name and extension from the url
			$file_name  = basename( $url );
			$local_file = trailingslashit( get_template_directory() ) . 'setup/images/' . $file_name;
			$upload     = false;
			if ( is_file( $local_file ) && filesize( $local_file ) > 0 ) {
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				WP_Filesystem();
				global $wp_filesystem;
				$file_data = $wp_filesystem->get_contents( $local_file );
				$upload    = wp_upload_bits( $file_name, 0, $file_data, $post['upload_date'] );
				if ( $upload['error'] ) {
					return new WP_Error( 'upload_dir_error', $upload['error'] );
				}
			}

			if ( ! $upload || $upload['error'] ) {
				// get placeholder file in the upload dir with a unique, sanitized filename
				$upload = wp_upload_bits( $file_name, 0, '', $post['upload_date'] );
				if ( $upload['error'] ) {
					return new WP_Error( 'upload_dir_error', $upload['error'] );
				}


				$max_size = (int) apply_filters( 'import_attachment_size_limit', 0 );

				// we check if this file is uploaded locally in the source folder.
				$response = wp_remote_get( $url );
				if ( is_array( $response ) && ! empty( $response['body'] ) && $response['response']['code'] == '200' ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
					$headers = $response['headers'];
					WP_Filesystem();
					global $wp_filesystem;
					$wp_filesystem->put_contents( $upload['file'], $response['body'] );
					//
				} else {
					// required to download file failed.
					@unlink( $upload['file'] );

					return new WP_Error( 'import_file_error', esc_html__( 'Remote server did not respond', 'lyfpro' ) );
				}

				$filesize = filesize( $upload['file'] );

				if ( isset( $headers['content-length'] ) && $filesize != $headers['content-length'] ) {
					@unlink( $upload['file'] );

					return new WP_Error( 'import_file_error', esc_html__( 'Remote file is incorrect size', 'lyfpro' ) );
				}

				if ( 0 == $filesize ) {
					@unlink( $upload['file'] );

					return new WP_Error( 'import_file_error', esc_html__( 'Zero size file downloaded', 'lyfpro' ) );
				}

				if ( ! empty( $max_size ) && $filesize > $max_size ) {
					@unlink( $upload['file'] );

					return new WP_Error( 'import_file_error', sprintf( esc_html__( 'Remote file is too large, limit is %s', 'lyfpro' ), size_format( $max_size ) ) );
				}
			}

			// keep track of the old and new urls so we can substitute them later
			$this->_imported_post_id( $url, $upload['url'] );
			$this->_imported_post_id( $post['guid'], $upload['url'] );
			// keep track of the destination if the remote url is redirected somewhere else
			if ( isset( $headers['x-final-location'] ) && $headers['x-final-location'] != $url ) {
				$this->_imported_post_id( $headers['x-final-location'], $upload['url'] );
			}

			return $upload;
		}


		private function _content_install_widgets() {
			// todo: pump these out into the 'content/' folder along with the XML so it's a little nicer to play with
			$import_widget_positions = $this->_get_json( 'widget_positions.json' );
			$import_widget_options   = $this->_get_json( 'widget_options.json' );

			// importing.
			$widget_positions = get_option( 'sidebars_widgets' );
			if ( ! is_array( $widget_positions ) ) {
				$widget_positions = array();
			}

			foreach ( $import_widget_options as $widget_name => $widget_options ) {
				// replace certain elements with updated imported entries.
				foreach ( $widget_options as $widget_option_id => $widget_option ) {

					// replace TERM ids in widget settings.
					foreach ( array( 'nav_menu' ) as $key_to_replace ) {
						if ( ! empty( $widget_option[ $key_to_replace ] ) ) {
							// check if this one has been imported yet.
							$new_id = $this->_imported_term_id( $widget_option[ $key_to_replace ] );
							if ( ! $new_id ) {
								// do we really clear this out? nah. well. maybe.. hmm.
							} else {
								$widget_options[ $widget_option_id ][ $key_to_replace ] = $new_id;
							}
						}
					}
					// replace POST ids in widget settings.
					foreach ( array( 'image_id', 'post_id' ) as $key_to_replace ) {
						if ( ! empty( $widget_option[ $key_to_replace ] ) ) {
							// check if this one has been imported yet.
							$new_id = $this->_imported_post_id( $widget_option[ $key_to_replace ] );
							if ( ! $new_id ) {
								// do we really clear this out? nah. well. maybe.. hmm.
							} else {
								$widget_options[ $widget_option_id ][ $key_to_replace ] = $new_id;
							}
						}
					}
				}
				$existing_options = get_option( 'widget_' . $widget_name, array() );
				if ( ! is_array( $existing_options ) ) {
					$existing_options = array();
				}
				$new_options = $existing_options + $widget_options;
				update_option( 'widget_' . $widget_name, $new_options );
			}
			update_option( 'sidebars_widgets', array_merge( $widget_positions, $import_widget_positions ) );

			return true;

		}

		public function _content_install_settings() {

			$this->_handle_delayed_posts( true ); // final wrap up of delayed posts.
			$this->vc_post(); // final wrap of vc posts.

			$custom_options = $this->_get_json( 'options.json' );

			// we also want to update the widget area manager options.
			foreach ( $custom_options as $option => $value ) {
				// we have to update widget page numbers with imported page numbers.
				if (
					preg_match( '#(wam__position_)(\d+)_#', $option, $matches ) ||
					preg_match( '#(wam__area_)(\d+)_#', $option, $matches )
				) {
					$new_page_id = $this->_imported_post_id( $matches[2] );
					if ( $new_page_id ) {
						// we have a new page id for this one. import the new setting value.
						$option = str_replace( $matches[1] . $matches[2] . '_', $matches[1] . $new_page_id . '_', $option );
					}
				}
				if ( $value && ! empty( $value['logo'] ) ) {
					$new_logo_id = $this->_imported_post_id( $value['logo'] );
					set_theme_mod( 'logo', $new_logo_id );
					if ( $new_logo_id ) {
						// do something if new logo id
					}
				}
				if ( $option == 'dtbaker_featured_images' ) {
					$value      = maybe_unserialize( $value );
					$new_values = array();
					if ( is_array( $value ) ) {
						foreach ( $value as $cat_id => $image_id ) {
							$new_cat_id   = $this->_imported_term_id( $cat_id );
							$new_image_id = $this->_imported_post_id( $image_id );
							if ( $new_cat_id && $new_image_id ) {
								$new_values[ $new_cat_id ] = $new_image_id;
							}
						}
					}
					$value = $new_values;
				}
				update_option( $option, $value );
			}

			// getting current selected style
			$current_style = get_theme_mod( 'dsvy_lyfpro_site_style', 'style1' );
			if( empty($current_style) ){ $current_style = 'style1'; }
			
			// Customizer options array
			$customizer_options = array();

			$customizer_options['style1'] = 'a:4:{s:8:"template";s:6:"lyfpro";s:4:"mods";a:80:{i:0;b:0;s:18:"nav_menu_locations";a:2:{s:16:"designervily-top";i:29;s:19:"designervily-footer";i:27;}s:18:"custom_css_post_id";i:-1;s:12:"global-color";s:7:"#c3002f";s:14:"gradient-color";a:2:{s:5:"first";s:7:"#c3002f";s:4:"last";s:7:"#c3002f";}s:10:"link-color";a:2:{s:6:"normal";s:7:"#222d35";s:5:"hover";s:7:"#c3002f";}s:19:"dropdown_background";a:6:{s:16:"background-color";s:7:"#f6f6f6";s:16:"background-image";s:0:"";s:17:"background-repeat";s:6:"repeat";s:19:"background-position";s:13:"center center";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:19:"titlebar-background";a:6:{s:16:"background-color";s:7:"#f6f6f6";s:16:"background-image";s:85:"https://lyfpro.designervily.com/demo1/wp-content/uploads/sites/2/2020/10/title-01.jpg";s:17:"background-repeat";s:9:"no-repeat";s:19:"background-position";s:8:"left top";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:17:"footer-background";a:6:{s:16:"background-color";s:7:"#0c121d";s:16:"background-image";s:93:"https://lyfpro.designervily.com/demo1/wp-content/uploads/sites/2/2020/11/footer-patten-bg.png";s:17:"background-repeat";s:9:"no-repeat";s:19:"background-position";s:10:"center top";s:15:"background-size";s:7:"contain";s:21:"background-attachment";s:6:"scroll";}s:24:"footer-widget-background";a:6:{s:16:"background-color";s:7:"#969696";s:16:"background-image";s:0:"";s:17:"background-repeat";s:6:"repeat";s:19:"background-position";s:13:"center center";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:27:"footer-copyright-background";a:6:{s:16:"background-color";s:7:"#0a0a0a";s:16:"background-image";s:0:"";s:17:"background-repeat";s:6:"repeat";s:19:"background-position";s:13:"center center";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:17:"portfolio-details";a:4:{i:0;a:2:{s:10:"line_title";s:4:"Date";s:9:"line_type";s:4:"text";}i:1;a:2:{s:10:"line_title";s:6:"Client";s:9:"line_type";s:4:"text";}i:2;a:2:{s:10:"line_title";s:8:"Category";s:9:"line_type";s:13:"category-link";}i:3;a:2:{s:10:"line_title";s:7:"Address";s:9:"line_type";s:4:"text";}}s:15:"e404-background";a:6:{s:16:"background-color";s:15:"rgba(0,0,0,0.5)";s:16:"background-image";s:79:"http://lyfpro.designervily.com/demo1/wp-content/themes/lyfpro/images/404-bg.jpg";s:17:"background-repeat";s:9:"no-repeat";s:19:"background-position";s:10:"center top";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:15:"secondary-color";s:7:"#222d35";s:3:"min";b:0;s:16:"dynamic-css-file";b:0;s:15:"load-merged-css";b:0;s:14:"blackish-color";s:7:"#222d35";s:17:"blackish-bg-color";s:7:"#222d35";s:14:"light-bg-color";s:7:"#f9f9f9";s:17:"global-typography";a:10:{s:11:"font-family";s:15:"Source Sans Pro";s:7:"variant";s:7:"regular";s:9:"font-size";s:4:"16px";s:11:"line-height";s:3:"1.7";s:14:"letter-spacing";s:0:"";s:5:"color";s:7:"#606060";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:400;s:10:"font-style";s:6:"normal";}s:13:"h1-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"42px";s:11:"line-height";s:4:"44px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h2-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"36px";s:11:"line-height";s:4:"40px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h3-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"32px";s:11:"line-height";s:4:"36px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h4-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"28px";s:11:"line-height";s:4:"32px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h5-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"24px";s:11:"line-height";s:4:"28px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h6-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"22px";s:11:"line-height";s:4:"26px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"heading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"42px";s:11:"line-height";s:4:"46px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:21:"subheading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"15px";s:11:"line-height";s:4:"20px";s:14:"letter-spacing";s:3:"2px";s:5:"color";s:7:"#c3002f";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"content-typography";a:10:{s:11:"font-family";s:15:"Source Sans Pro";s:7:"variant";s:7:"regular";s:9:"font-size";s:4:"17px";s:11:"line-height";s:3:"1.7";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#606060";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:400;s:10:"font-style";s:6:"normal";}s:25:"widget-heading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"24px";s:11:"line-height";s:4:"26px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#0c121d";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"buttons-typography";a:9:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"14px";s:11:"line-height";s:4:"18px";s:14:"letter-spacing";s:3:"1px";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:21:"css-only-1-typography";a:5:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:7:"regular";s:11:"font-weight";i:400;s:10:"font-style";s:6:"normal";s:11:"font-backup";s:0:"";}s:21:"css-only-2-typography";a:5:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";s:11:"font-backup";s:0:"";}s:21:"css-only-3-typography";a:5:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"700";s:11:"font-weight";i:700;s:10:"font-style";s:6:"normal";s:11:"font-backup";s:0:"";}s:12:"header-style";s:1:"4";s:14:"header-bgcolor";s:11:"transparent";s:15:"titlebar-height";s:3:"300";s:16:"titlebar-bgcolor";s:11:"transparent";s:27:"titlebar-heading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"46px";s:11:"line-height";s:4:"52px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:22:"portfolio-single-style";s:1:"1";s:30:"titlebar-subheading-typography";a:10:{s:11:"font-family";s:6:"Barlow";s:7:"variant";s:3:"700";s:9:"font-size";s:4:"16px";s:11:"line-height";s:3:"1.5";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:700;s:10:"font-style";s:6:"normal";}s:30:"titlebar-breadcrumb-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"15px";s:11:"line-height";s:3:"1.5";s:14:"letter-spacing";s:3:"1px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:14:"titlebar-style";s:6:"center";s:20:"service-show-related";b:0;s:22:"portfolio-show-related";b:0;s:17:"footer-boxes-area";b:1;s:17:"footer-box-1-icon";s:583:"dsvy-lyfpro-icon dsvy-lyfpro-icon-pin;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer";s:18:"footer-box-1-title";s:14:"Office Address";s:20:"footer-box-1-content";s:19:"201 Stokes New York";s:17:"footer-box-2-icon";s:587:"dsvy-lyfpro-icon dsvy-lyfpro-icon-email-1;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer";s:18:"footer-box-2-title";s:21:"24 X 7 online support";s:20:"footer-box-2-content";s:15:"info@Lyfpro.com";s:17:"footer-box-3-icon";s:584:"dsvy-lyfpro-icon dsvy-lyfpro-icon-call;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer";s:18:"footer-box-3-title";s:15:"Contact Us Free";s:20:"footer-box-3-content";s:16:"+1 (088) 456 888";s:14:"footer-bgcolor";s:8:"blackish";s:13:"footer-column";s:6:"custom";s:17:"team-single-style";s:1:"1";s:4:"logo";s:87:"https://lyfpro.designervily.com/demo1/wp-content/uploads/sites/2/2020/12/logo-new-1.png";s:13:"header-search";b:1;s:15:"header-btn-text";s:19:"Have any Question ?";s:16:"header-btn-text2";s:14:"+0 123 888 999";s:14:"header-btn-url";s:1:"#";s:20:"main-menu-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"14px";s:11:"line-height";s:4:"20px";s:14:"letter-spacing";s:5:"0.5px";s:5:"color";s:7:"#0c121d";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:8:"facebook";s:1:"#";s:7:"twitter";s:1:"#";s:8:"linkedin";s:1:"#";s:7:"youtube";s:1:"#";s:24:"dropdown-menu-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"14px";s:11:"line-height";s:3:"1.5";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#0c121d";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"footer-1-col-width";s:2:"25";s:18:"footer-2-col-width";s:2:"50";s:18:"footer-3-col-width";s:2:"25";s:24:"footer-copyright-bgcolor";s:11:"transparent";s:11:"footer-logo";s:0:"";s:30:"footer-copyright-right-content";s:4:"menu";s:11:"logo-height";s:2:"50";s:17:"sidebar-wc-single";s:5:"right";s:19:"wc-show-cart-amount";b:0;s:17:"wc-show-cart-icon";b:0;}s:7:"options";a:20:{s:22:"woocommerce_demo_store";s:2:"no";s:29:"woocommerce_demo_store_notice";s:79:"This is a demo store for testing purposes &mdash; no orders shall be fulfilled.";s:29:"woocommerce_shop_page_display";s:0:"";s:36:"woocommerce_category_archive_display";s:0:"";s:35:"woocommerce_default_catalog_orderby";s:10:"menu_order";s:30:"woocommerce_single_image_width";s:3:"600";s:33:"woocommerce_thumbnail_image_width";s:3:"300";s:30:"woocommerce_thumbnail_cropping";s:3:"1:1";s:43:"woocommerce_thumbnail_cropping_custom_width";s:1:"4";s:44:"woocommerce_thumbnail_cropping_custom_height";s:1:"3";s:34:"woocommerce_checkout_company_field";s:8:"optional";s:36:"woocommerce_checkout_address_2_field";s:8:"optional";s:32:"woocommerce_checkout_phone_field";s:8:"required";s:46:"woocommerce_checkout_highlight_required_fields";s:3:"yes";s:55:"woocommerce_checkout_terms_and_conditions_checkbox_text";s:44:"I have read and agree to the website [terms]";s:40:"woocommerce_checkout_privacy_policy_text";s:161:"Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our [privacy_policy].";s:26:"wp_page_for_privacy_policy";s:1:"0";s:25:"woocommerce_terms_page_id";s:0:"";s:9:"site_icon";s:5:"15801";s:23:"nav_menus_created_posts";a:0:{}}s:6:"wp_css";s:0:"";}';

			$customizer_options['style2'] = 'a:4:{s:8:"template";s:6:"lyfpro";s:4:"mods";a:89:{i:0;b:0;s:18:"nav_menu_locations";a:2:{s:16:"designervily-top";i:30;s:19:"designervily-footer";i:28;}s:18:"custom_css_post_id";i:-1;s:12:"global-color";s:7:"#c3002f";s:14:"gradient-color";a:2:{s:5:"first";s:7:"#c3002f";s:4:"last";s:7:"#c3002f";}s:10:"link-color";a:2:{s:6:"normal";s:7:"#222d35";s:5:"hover";s:7:"#c3002f";}s:19:"dropdown_background";a:6:{s:16:"background-color";s:7:"#f6f6f6";s:16:"background-image";s:0:"";s:17:"background-repeat";s:6:"repeat";s:19:"background-position";s:13:"center center";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:19:"titlebar-background";a:6:{s:16:"background-color";s:7:"#f6f6f6";s:16:"background-image";s:82:"https://lyfpro.designervily.com/demo2/wp-content/uploads/sites/3/2020/10/title.jpg";s:17:"background-repeat";s:9:"no-repeat";s:19:"background-position";s:8:"left top";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:17:"footer-background";a:6:{s:16:"background-color";s:7:"#0c121d";s:16:"background-image";s:91:"https://lyfpro.designervily.com/demo2/wp-content/uploads/sites/3/2020/12/footer-pattern.png";s:17:"background-repeat";s:9:"no-repeat";s:19:"background-position";s:10:"center top";s:15:"background-size";s:7:"contain";s:21:"background-attachment";s:6:"scroll";}s:24:"footer-widget-background";a:6:{s:16:"background-color";s:7:"#969696";s:16:"background-image";s:0:"";s:17:"background-repeat";s:6:"repeat";s:19:"background-position";s:13:"center center";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:27:"footer-copyright-background";a:6:{s:16:"background-color";s:7:"#0a0a0a";s:16:"background-image";s:0:"";s:17:"background-repeat";s:6:"repeat";s:19:"background-position";s:13:"center center";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:17:"portfolio-details";a:4:{i:0;a:2:{s:10:"line_title";s:4:"Date";s:9:"line_type";s:4:"text";}i:1;a:2:{s:10:"line_title";s:6:"Client";s:9:"line_type";s:4:"text";}i:2;a:2:{s:10:"line_title";s:8:"Category";s:9:"line_type";s:13:"category-link";}i:3;a:2:{s:10:"line_title";s:7:"Address";s:9:"line_type";s:4:"text";}}s:15:"e404-background";a:6:{s:16:"background-color";s:15:"rgba(0,0,0,0.5)";s:16:"background-image";s:79:"http://lyfpro.designervily.com/demo1/wp-content/themes/lyfpro/images/404-bg.jpg";s:17:"background-repeat";s:9:"no-repeat";s:19:"background-position";s:10:"center top";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:15:"secondary-color";s:7:"#222d35";s:3:"min";b:0;s:16:"dynamic-css-file";b:0;s:15:"load-merged-css";b:0;s:14:"blackish-color";s:7:"#222d35";s:17:"blackish-bg-color";s:7:"#222d35";s:14:"light-bg-color";s:7:"#f9f9f9";s:17:"global-typography";a:10:{s:11:"font-family";s:15:"Source Sans Pro";s:7:"variant";s:7:"regular";s:9:"font-size";s:4:"16px";s:11:"line-height";s:3:"1.7";s:14:"letter-spacing";s:0:"";s:5:"color";s:7:"#606060";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:400;s:10:"font-style";s:6:"normal";}s:13:"h1-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"42px";s:11:"line-height";s:4:"44px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h2-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"36px";s:11:"line-height";s:4:"40px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h3-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"32px";s:11:"line-height";s:4:"36px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h4-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"28px";s:11:"line-height";s:4:"32px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h5-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"24px";s:11:"line-height";s:4:"28px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h6-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"22px";s:11:"line-height";s:4:"26px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"heading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"42px";s:11:"line-height";s:4:"46px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:21:"subheading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"15px";s:11:"line-height";s:4:"20px";s:14:"letter-spacing";s:3:"2px";s:5:"color";s:7:"#c3002f";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"content-typography";a:10:{s:11:"font-family";s:15:"Source Sans Pro";s:7:"variant";s:7:"regular";s:9:"font-size";s:4:"17px";s:11:"line-height";s:3:"1.7";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#606060";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:400;s:10:"font-style";s:6:"normal";}s:25:"widget-heading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"24px";s:11:"line-height";s:4:"26px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#0c121d";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"buttons-typography";a:9:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"14px";s:11:"line-height";s:4:"18px";s:14:"letter-spacing";s:3:"1px";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:21:"css-only-1-typography";a:5:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:7:"regular";s:11:"font-weight";i:400;s:10:"font-style";s:6:"normal";s:11:"font-backup";s:0:"";}s:21:"css-only-2-typography";a:5:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";s:11:"font-backup";s:0:"";}s:21:"css-only-3-typography";a:5:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"700";s:11:"font-weight";i:700;s:10:"font-style";s:6:"normal";s:11:"font-backup";s:0:"";}s:12:"header-style";s:1:"3";s:14:"header-bgcolor";s:11:"transparent";s:15:"titlebar-height";s:3:"300";s:16:"titlebar-bgcolor";s:11:"transparent";s:27:"titlebar-heading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"46px";s:11:"line-height";s:4:"52px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:22:"portfolio-single-style";s:1:"1";s:30:"titlebar-subheading-typography";a:10:{s:11:"font-family";s:6:"Barlow";s:7:"variant";s:3:"700";s:9:"font-size";s:4:"16px";s:11:"line-height";s:3:"1.5";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:700;s:10:"font-style";s:6:"normal";}s:30:"titlebar-breadcrumb-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"15px";s:11:"line-height";s:3:"1.5";s:14:"letter-spacing";s:3:"1px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:14:"titlebar-style";s:6:"center";s:20:"service-show-related";b:0;s:22:"portfolio-show-related";b:0;s:17:"footer-boxes-area";b:1;s:17:"footer-box-1-icon";s:583:"dsvy-lyfpro-icon dsvy-lyfpro-icon-pin;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer";s:18:"footer-box-1-title";s:14:"Office Address";s:20:"footer-box-1-content";s:19:"201 Stokes New York";s:17:"footer-box-2-icon";s:587:"dsvy-lyfpro-icon dsvy-lyfpro-icon-email-1;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer";s:18:"footer-box-2-title";s:21:"24 X 7 online support";s:20:"footer-box-2-content";s:15:"info@Lyfpro.com";s:17:"footer-box-3-icon";s:584:"dsvy-lyfpro-icon dsvy-lyfpro-icon-call;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer";s:18:"footer-box-3-title";s:15:"Contact Us Free";s:20:"footer-box-3-content";s:16:"+1 (088) 456 888";s:14:"footer-bgcolor";s:8:"blackish";s:13:"footer-column";s:6:"custom";s:17:"team-single-style";s:1:"1";s:4:"logo";s:85:"https://lyfpro.designervily.com/demo2/wp-content/uploads/sites/3/2020/12/logo-new.png";s:13:"header-search";b:1;s:15:"header-btn-text";s:16:"Get a Free Quote";s:16:"header-btn-text2";s:0:"";s:14:"header-btn-url";s:48:"http://lyfpro.designervily.com/demo2/contact-us/";s:20:"main-menu-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"15px";s:11:"line-height";s:4:"20px";s:14:"letter-spacing";s:5:"0.5px";s:5:"color";s:7:"#0c121d";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:8:"facebook";s:1:"#";s:7:"twitter";s:1:"#";s:8:"linkedin";s:1:"#";s:7:"youtube";s:1:"#";s:24:"dropdown-menu-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"14px";s:11:"line-height";s:3:"1.5";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#0c121d";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"footer-1-col-width";s:2:"25";s:18:"footer-2-col-width";s:2:"50";s:18:"footer-3-col-width";s:2:"25";s:24:"footer-copyright-bgcolor";s:11:"transparent";s:11:"footer-logo";s:0:"";s:30:"footer-copyright-right-content";s:4:"menu";s:12:"menu-bgcolor";s:5:"light";s:16:"header-box2-icon";s:578:"dsvy-lyfpro-icon dsvy-lyfpro-icon-customer-service;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Mail;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Mail;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Mail;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Mail;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Mail;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Mail";s:16:"header-box3-icon";s:577:"dsvy-lyfpro-icon dsvy-lyfpro-icon-pin;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Phone2;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Phone2;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Phone2;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Phone2;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Phone2;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Phone2";s:27:"header-box-title-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"500";s:9:"font-size";s:4:"15px";s:11:"line-height";s:4:"27px";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#0c121d";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:500;s:10:"font-style";s:6:"normal";}s:29:"header-box-content-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"15px";s:11:"line-height";s:4:"25px";s:14:"letter-spacing";s:3:"1px";s:5:"color";s:7:"#000000";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:17:"header-box1-title";s:5:"Email";s:19:"header-box1-content";s:20:"needhelp@example.com";s:17:"header-box2-title";s:19:"24x7 online support";s:19:"header-box2-content";s:12:"92 666 00000";s:17:"header-box3-title";s:5:"Visit";s:19:"header-box3-content";s:25:"66 Lyfpro New Street, USA";s:17:"sidebar-wc-single";s:5:"right";s:13:"sticky-header";b:0;}s:7:"options";a:20:{s:22:"woocommerce_demo_store";s:2:"no";s:29:"woocommerce_demo_store_notice";s:79:"This is a demo store for testing purposes &mdash; no orders shall be fulfilled.";s:29:"woocommerce_shop_page_display";s:0:"";s:36:"woocommerce_category_archive_display";s:0:"";s:35:"woocommerce_default_catalog_orderby";s:10:"menu_order";s:30:"woocommerce_single_image_width";s:3:"600";s:33:"woocommerce_thumbnail_image_width";s:3:"300";s:30:"woocommerce_thumbnail_cropping";s:3:"1:1";s:43:"woocommerce_thumbnail_cropping_custom_width";s:1:"4";s:44:"woocommerce_thumbnail_cropping_custom_height";s:1:"3";s:34:"woocommerce_checkout_company_field";s:8:"optional";s:36:"woocommerce_checkout_address_2_field";s:8:"optional";s:32:"woocommerce_checkout_phone_field";s:8:"required";s:46:"woocommerce_checkout_highlight_required_fields";s:3:"yes";s:55:"woocommerce_checkout_terms_and_conditions_checkbox_text";s:44:"I have read and agree to the website [terms]";s:40:"woocommerce_checkout_privacy_policy_text";s:161:"Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our [privacy_policy].";s:26:"wp_page_for_privacy_policy";s:1:"0";s:25:"woocommerce_terms_page_id";s:0:"";s:9:"site_icon";s:5:"15667";s:23:"nav_menus_created_posts";a:0:{}}s:6:"wp_css";s:0:"";}';

			$customizer_options['style3'] = 'a:4:{s:8:"template";s:6:"lyfpro";s:4:"mods";a:81:{i:0;b:0;s:18:"nav_menu_locations";a:2:{s:16:"designervily-top";i:30;s:19:"designervily-footer";i:28;}s:18:"custom_css_post_id";i:-1;s:12:"global-color";s:7:"#c3002f";s:14:"gradient-color";a:2:{s:5:"first";s:7:"#c3002f";s:4:"last";s:7:"#c3002f";}s:10:"link-color";a:2:{s:6:"normal";s:7:"#222d35";s:5:"hover";s:7:"#c3002f";}s:19:"dropdown_background";a:6:{s:16:"background-color";s:7:"#f6f6f6";s:16:"background-image";s:0:"";s:17:"background-repeat";s:6:"repeat";s:19:"background-position";s:13:"center center";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:19:"titlebar-background";a:6:{s:16:"background-color";s:7:"#f6f6f6";s:16:"background-image";s:85:"https://lyfpro.designervily.com/demo3/wp-content/uploads/sites/4/2020/10/title-01.jpg";s:17:"background-repeat";s:9:"no-repeat";s:19:"background-position";s:8:"left top";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:17:"footer-background";a:6:{s:16:"background-color";s:7:"#0c121d";s:16:"background-image";s:91:"https://lyfpro.designervily.com/demo3/wp-content/uploads/sites/4/2020/12/footer-pattern.png";s:17:"background-repeat";s:9:"no-repeat";s:19:"background-position";s:10:"center top";s:15:"background-size";s:7:"contain";s:21:"background-attachment";s:6:"scroll";}s:24:"footer-widget-background";a:6:{s:16:"background-color";s:7:"#969696";s:16:"background-image";s:0:"";s:17:"background-repeat";s:6:"repeat";s:19:"background-position";s:13:"center center";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:27:"footer-copyright-background";a:6:{s:16:"background-color";s:7:"#0a0a0a";s:16:"background-image";s:0:"";s:17:"background-repeat";s:6:"repeat";s:19:"background-position";s:13:"center center";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:17:"portfolio-details";a:4:{i:0;a:2:{s:10:"line_title";s:4:"Date";s:9:"line_type";s:4:"text";}i:1;a:2:{s:10:"line_title";s:6:"Client";s:9:"line_type";s:4:"text";}i:2;a:2:{s:10:"line_title";s:8:"Category";s:9:"line_type";s:13:"category-link";}i:3;a:2:{s:10:"line_title";s:7:"Address";s:9:"line_type";s:4:"text";}}s:15:"e404-background";a:6:{s:16:"background-color";s:15:"rgba(0,0,0,0.5)";s:16:"background-image";s:79:"http://lyfpro.designervily.com/demo1/wp-content/themes/lyfpro/images/404-bg.jpg";s:17:"background-repeat";s:9:"no-repeat";s:19:"background-position";s:10:"center top";s:15:"background-size";s:5:"cover";s:21:"background-attachment";s:6:"scroll";}s:15:"secondary-color";s:7:"#222d35";s:3:"min";b:0;s:16:"dynamic-css-file";b:0;s:15:"load-merged-css";b:0;s:14:"blackish-color";s:7:"#222d35";s:17:"blackish-bg-color";s:7:"#222d35";s:14:"light-bg-color";s:7:"#f9f9f9";s:17:"global-typography";a:10:{s:11:"font-family";s:15:"Source Sans Pro";s:7:"variant";s:7:"regular";s:9:"font-size";s:4:"16px";s:11:"line-height";s:3:"1.7";s:14:"letter-spacing";s:0:"";s:5:"color";s:7:"#606060";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:400;s:10:"font-style";s:6:"normal";}s:13:"h1-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"42px";s:11:"line-height";s:4:"44px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h2-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"36px";s:11:"line-height";s:4:"40px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h3-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"32px";s:11:"line-height";s:4:"36px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h4-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"28px";s:11:"line-height";s:4:"32px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h5-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"24px";s:11:"line-height";s:4:"28px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:13:"h6-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"22px";s:11:"line-height";s:4:"26px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"heading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"42px";s:11:"line-height";s:4:"46px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#222d35";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:21:"subheading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"15px";s:11:"line-height";s:4:"20px";s:14:"letter-spacing";s:3:"2px";s:5:"color";s:7:"#c3002f";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"content-typography";a:10:{s:11:"font-family";s:15:"Source Sans Pro";s:7:"variant";s:7:"regular";s:9:"font-size";s:4:"17px";s:11:"line-height";s:3:"1.7";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#606060";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:400;s:10:"font-style";s:6:"normal";}s:25:"widget-heading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"24px";s:11:"line-height";s:4:"26px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#0c121d";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"buttons-typography";a:9:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"14px";s:11:"line-height";s:4:"18px";s:14:"letter-spacing";s:3:"1px";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:21:"css-only-1-typography";a:5:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:7:"regular";s:11:"font-weight";i:400;s:10:"font-style";s:6:"normal";s:11:"font-backup";s:0:"";}s:21:"css-only-2-typography";a:5:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";s:11:"font-backup";s:0:"";}s:21:"css-only-3-typography";a:5:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"700";s:11:"font-weight";i:700;s:10:"font-style";s:6:"normal";s:11:"font-backup";s:0:"";}s:12:"header-style";s:1:"2";s:14:"header-bgcolor";s:11:"transparent";s:15:"titlebar-height";s:3:"500";s:16:"titlebar-bgcolor";s:11:"transparent";s:27:"titlebar-heading-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"46px";s:11:"line-height";s:4:"52px";s:14:"letter-spacing";s:6:"-0.5px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:22:"portfolio-single-style";s:1:"1";s:30:"titlebar-subheading-typography";a:10:{s:11:"font-family";s:6:"Barlow";s:7:"variant";s:3:"700";s:9:"font-size";s:4:"16px";s:11:"line-height";s:3:"1.5";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:4:"none";s:11:"font-backup";s:0:"";s:11:"font-weight";i:700;s:10:"font-style";s:6:"normal";}s:30:"titlebar-breadcrumb-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"15px";s:11:"line-height";s:3:"1.5";s:14:"letter-spacing";s:3:"1px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:14:"titlebar-style";s:6:"center";s:20:"service-show-related";b:0;s:22:"portfolio-show-related";b:0;s:17:"footer-boxes-area";b:1;s:17:"footer-box-1-icon";s:583:"dsvy-lyfpro-icon dsvy-lyfpro-icon-pin;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer";s:18:"footer-box-1-title";s:14:"Office Address";s:20:"footer-box-1-content";s:19:"201 Stokes New York";s:17:"footer-box-2-icon";s:587:"dsvy-lyfpro-icon dsvy-lyfpro-icon-email-1;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer";s:18:"footer-box-2-title";s:21:"24 X 7 online support";s:20:"footer-box-2-content";s:15:"info@Lyfpro.com";s:17:"footer-box-3-icon";s:584:"dsvy-lyfpro-icon dsvy-lyfpro-icon-call;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer;far fa-address-book;fas fa-star;fab fa-facebook-square;mdi mdi-group;sgicon sgicon-Pointer";s:18:"footer-box-3-title";s:15:"Contact Us Free";s:20:"footer-box-3-content";s:16:"+1 (088) 456 888";s:14:"footer-bgcolor";s:8:"blackish";s:13:"footer-column";s:6:"custom";s:17:"team-single-style";s:1:"1";s:4:"logo";s:87:"https://lyfpro.designervily.com/demo3/wp-content/uploads/sites/4/2020/12/logo-white.png";s:13:"header-search";b:1;s:15:"header-btn-text";s:19:"Have any Question ?";s:16:"header-btn-text2";s:14:"+0 123 888 999";s:14:"header-btn-url";s:1:"#";s:20:"main-menu-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"15px";s:11:"line-height";s:4:"20px";s:14:"letter-spacing";s:5:"0.5px";s:5:"color";s:7:"#ffffff";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:8:"facebook";s:1:"#";s:7:"twitter";s:1:"#";s:8:"linkedin";s:1:"#";s:7:"youtube";s:1:"#";s:24:"dropdown-menu-typography";a:10:{s:11:"font-family";s:8:"Rajdhani";s:7:"variant";s:3:"600";s:9:"font-size";s:4:"14px";s:11:"line-height";s:3:"1.5";s:14:"letter-spacing";s:3:"0px";s:5:"color";s:7:"#0c121d";s:14:"text-transform";s:9:"uppercase";s:11:"font-backup";s:0:"";s:11:"font-weight";i:600;s:10:"font-style";s:6:"normal";}s:18:"footer-1-col-width";s:2:"25";s:18:"footer-2-col-width";s:2:"50";s:18:"footer-3-col-width";s:2:"25";s:24:"footer-copyright-bgcolor";s:11:"transparent";s:11:"footer-logo";s:0:"";s:30:"footer-copyright-right-content";s:4:"menu";s:22:"main-menu-active-color";s:5:"white";s:11:"sticky-logo";s:85:"https://lyfpro.designervily.com/demo3/wp-content/uploads/sites/4/2020/12/logo-new.png";s:17:"sidebar-wc-single";s:5:"right";s:17:"wc-show-cart-icon";b:0;s:13:"sticky-header";b:1;}s:7:"options";a:20:{s:22:"woocommerce_demo_store";s:2:"no";s:29:"woocommerce_demo_store_notice";s:79:"This is a demo store for testing purposes &mdash; no orders shall be fulfilled.";s:29:"woocommerce_shop_page_display";s:0:"";s:36:"woocommerce_category_archive_display";s:0:"";s:35:"woocommerce_default_catalog_orderby";s:10:"menu_order";s:30:"woocommerce_single_image_width";s:3:"600";s:33:"woocommerce_thumbnail_image_width";s:3:"300";s:30:"woocommerce_thumbnail_cropping";s:3:"1:1";s:43:"woocommerce_thumbnail_cropping_custom_width";s:1:"4";s:44:"woocommerce_thumbnail_cropping_custom_height";s:1:"3";s:34:"woocommerce_checkout_company_field";s:8:"optional";s:36:"woocommerce_checkout_address_2_field";s:8:"optional";s:32:"woocommerce_checkout_phone_field";s:8:"required";s:46:"woocommerce_checkout_highlight_required_fields";s:3:"yes";s:55:"woocommerce_checkout_terms_and_conditions_checkbox_text";s:44:"I have read and agree to the website [terms]";s:40:"woocommerce_checkout_privacy_policy_text";s:161:"Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our [privacy_policy].";s:26:"wp_page_for_privacy_policy";s:1:"0";s:25:"woocommerce_terms_page_id";s:0:"";s:9:"site_icon";s:5:"15686";s:23:"nav_menus_created_posts";a:0:{}}s:6:"wp_css";s:0:"";}';
			
			// setting customizer options value
			if( !empty($customizer_options[$current_style]) ){
				$customizer_value	= unserialize($customizer_options[$current_style]);
				if( $customizer_value!=false && !empty($customizer_value) && !empty($customizer_value['mods']) ){
					$customizer_value	= $customizer_value['mods'];
					$current_value		= get_option('theme_mods_lyfpro');
					$new_value			= array_merge( $current_value, $customizer_value );
					update_option('theme_mods_lyfpro', $new_value);
					if( function_exists('dsvy_lyfpro_addons_create_css') ){
						dsvy_lyfpro_addons_create_css();
					}
				}
			}

			// Menu
			$main_menu   = get_term_by( 'name', esc_attr('Main Menu'), 'nav_menu' );
			$footer_menu = get_term_by( 'name', esc_attr('Footer Menu'), 'nav_menu' );
			set_theme_mod(
				'nav_menu_locations', array(
					'designervily-top'		=> $main_menu->term_id,
					'designervily-footer'	=> $footer_menu->term_id,
				)
			);
			$homepage = get_page_by_title( 'Homepage 1' );
			if ( $homepage ) {
				update_option( 'page_on_front', $homepage->ID );
				update_option( 'show_on_front', 'page' );
			}
			$blogpage = get_page_by_title( 'Blog' );
			if ( $blogpage ) {
				update_option( 'page_for_posts', $blogpage->ID );
				update_option( 'show_on_front', 'page' );
			}
			
			// Removing Hello World post
			$hello_world_post = get_page_by_title( 'Hello world!', null, 'post' );
			wp_delete_post($hello_world_post->ID);

			// Slider Revolution - Importing Sliders
			if ( class_exists( 'RevSlider' ) ){
				$slider_array	= array(
					get_template_directory() . '/setup/sliders/slider-demo-1.zip',
					get_template_directory() . '/setup/sliders/slider-demo-2.zip',
					get_template_directory() . '/setup/sliders/slider-demo-3.zip',
				);
				$slider			= new RevSlider();
				foreach($slider_array as $filepath){
					if( file_exists($filepath) ){
						$result = $slider->importSliderFromPost(true,true,$filepath);  
					}
				}
			}
			
			// Reset default values for some required options
			$set_values = array(
				'min'				=> true,
				'dynamic-css-file'	=> true,
				'load-merged-css'	=> true
			);
			foreach($set_values as $key=>$val){
				set_theme_mod( $key, $val );
			}

			/* Insert theme options */

			// Setting blogroll page
			$blog_page_id  = get_page_by_title( 'Blog Classic' );

			
			if( !empty($blog_page_id->ID) ){ update_option( 'page_for_posts', $blog_page_id->ID ); }
			
			// Setting home page
			if( $current_style == 'style1' ){        // 1. Demo 1
				$front_page_id = get_page_by_title( 'Homepage 1' );
				update_option( 'show_on_front', 'page' );
				if( !empty($front_page_id->ID) ){ update_option( 'page_on_front', $front_page_id->ID ); }
			} else if( $current_style == 'style2' ){ // 2. Demo 2
				$front_page_id = get_page_by_title( 'Homepage 2' );
				update_option( 'show_on_front', 'page' );
				if( !empty($front_page_id->ID) ){ update_option( 'page_on_front', $front_page_id->ID ); }
			} else if( $current_style == 'style3' ){ // 3. Demo 3
				$front_page_id = get_page_by_title( 'Homepage 3' );
				update_option( 'show_on_front', 'page' );
				if( !empty($front_page_id->ID) ){ update_option( 'page_on_front', $front_page_id->ID ); }
			} 

			global $wp_rewrite;
			$wp_rewrite->set_permalink_structure( '/%year%/%monthnum%/%day%/%postname%/' );
			update_option( 'rewrite_rules', false );
			$wp_rewrite->flush_rules( true );

			// All done.. disable Merlin wizard
			update_option( 'dsvy-merlin-all-done', 'yes' );

			return true;
		}

		public function _get_json( $file ) {
			if ( is_file( __DIR__ . '/content/' . basename( $file ) ) ) {
				WP_Filesystem();
				global $wp_filesystem;
				$file_name = __DIR__ . '/content/' . basename( $file );
				if ( file_exists( $file_name ) ) {
					return json_decode( $wp_filesystem->get_contents( $file_name ), true );
				}
			}

			return array();
		}

		private function _get_sql( $file ) {
			if ( is_file( __DIR__ . '/content/' . basename( $file ) ) ) {
				WP_Filesystem();
				global $wp_filesystem;
				$file_name = __DIR__ . '/content/' . basename( $file );
				if ( file_exists( $file_name ) ) {
					return $wp_filesystem->get_contents( $file_name );
				}
			}

			return false;
		}


		public $logs = array();

		public function log( $message ) {
			$this->logs[] = $message;
		}

		public $errors = array();

		public function error( $message ) {
			$this->logs[] = 'ERROR!!!! ' . $message;
		}


		public function envato_setup_color_style() {

			?>
            <h1><?php esc_html_e( 'Site Style', 'lyfpro' ); ?></h1>
            <form method="post">
                <p><?php esc_html_e( 'Please choose your site style below.', 'lyfpro' ); ?></p>

                <div class="theme-presets">
                    <ul>
	                    <?php
						$current_style = get_theme_mod( 'dsvy_lyfpro_site_style', 'style1' );
	                    foreach ( $this->site_styles as $style_name => $style_url ) {
		                    ?>
                            <li class="<?php if($style_name == $current_style) { echo esc_attr('current'); } ?>">
                                <a href="#" class="dsvy-theme-preset-thumbnail" data-style="<?php echo esc_attr( $style_name ); ?>">
									<img src="<?php echo esc_url(get_template_directory_uri() .'/includes/images/'.$style_name.'.jpg');?>">
								</a>
								<br />
								<a href="<?php echo esc_url($style_url); ?>" class="dsvy-theme-preset-link" target="_blank">
									<?php esc_html_e('See Preview', 'lyfpro'); ?> <span class="dashicons dashicons-external"></span>
								</a>

                            </li>
	                    <?php } ?>
                    </ul>
                </div>

                <input type="hidden" name="new_style" id="new_style" value="">

                
                <p class="envato-setup-actions step">
                    <input type="submit" class="button-primary button button-large button-next"
                           value="<?php esc_attr_e( 'Continue', 'lyfpro' ); ?>" name="save_step"/>
                    <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                       class="button button-large button-next"><?php esc_html_e( 'Skip this step', 'lyfpro' ); ?></a>
					<?php wp_nonce_field( 'envato-setup' ); ?>
                </p>
            </form>
			<?php
		}


		/**
		 * Save logo & design options
		 */
		public function envato_setup_color_style_save() {
			check_admin_referer( 'envato-setup' );

			$new_style = isset( $_POST['new_style'] ) ? $_POST['new_style'] : false;
			if ( $new_style ) {
				set_theme_mod( 'dsvy_lyfpro_site_style', $new_style );
			}

			wp_redirect( esc_url_raw( $this->get_next_step_link() ) );
			exit;
		}

		/**
		 * Logo & Design
		 */
		public function envato_setup_logo_design() {

			?>
            <h1><?php esc_html_e( 'Select Logo &amp; Global Color for your site', 'lyfpro' ); ?></h1>

			<form method="post">

				<div class="dsvy-logo-section">
					<h3 class="dsvy-logo-section-title"><span><?php esc_html_e( '1', 'lyfpro' ); ?></span><?php esc_html_e( 'Select Logo', 'lyfpro' ); ?></h3>

					<p><?php printf( esc_html__( 'Please add your logo below. For best results, the logo should be a transparent PNG. The logo can be changed at any time from the %1$sAppearance > Customize > lyfpro Options > General Options%2$s area in your dashboard.', 'lyfpro'), '<strong>', '</strong>' ); ?></p>

					<table>
						<tr>
							<td>
								<div id="current-logo">
									<?php
									$image_url = $this->get_logo_image();
									if ( $image_url ) {
										$image = '<img id="dsvy-swizard-logo" class="site-logo" src="%s" alt="%s" style="width:%s; height:auto" />';
										printf(
											$image,
											$image_url,
											get_bloginfo( 'name' ),
											$this->get_header_logo_width()
										);
									} ?>
								</div>
							</td>
							<td>
								<a href="#" class="button button-upload"><?php esc_html_e( 'Upload New Logo', 'lyfpro' ); ?></a>
							</td>
						</tr>
					</table>
					
				</div>



				<!-- 2. Select Color -->
				<div class="dsvy-logo-section">
					<h3 class="dsvy-logo-section-title"><span><?php esc_html_e( '2', 'lyfpro' ); ?></span><?php esc_html_e( 'Select Theme Colors', 'lyfpro' ); ?></h3>

					<div class="dsvy-logo-sub-section">
						
						<div class="dsvy-logo-section-left">
							<p class="separator">
								<h4><?php esc_attr_e('Select Global Color', 'lyfpro' ); ?></h4>
								<?php $global_color = dsvy_get_base_option('global-color'); ?>
								<input id="dsvy-swizard-globalcolor" class="color-field" type="text" name="global-color" value="<?php echo esc_attr($global_color); ?>"/>
							</p>	
						</div>

						<div class="dsvy-logo-section-right hidden">
							<p><strong><?php esc_attr_e('Auto Detected Colors:', 'lyfpro' ); ?></strong></p>
							<p><?php esc_attr_e('Here is the list of auto-detected colors. Just CLICK on any color you want to set:', 'lyfpro' ); ?></p>
							<div id="dsvy-swizard-global-color-pallate"></div>	
						</div>

						<div class="clear clr"></div>

					</div>

					<hr>

					<div class="dsvy-logo-sub-section">
						
						<div class="dsvy-logo-section-left">
							<p class="separator">
								<h4><?php esc_attr_e('Select Secondary Color', 'lyfpro' ); ?></h4>
								<?php $secondary_color = dsvy_get_base_option('secondary-color'); ?>
								<input id="dsvy-swizard-secondarycolor" class="color-field" type="text" name="secondary-color" value="<?php echo esc_attr($secondary_color); ?>"/>
							</p>	
						</div>

						<div class="dsvy-logo-section-right hidden">
							<p><strong><?php esc_attr_e('Auto Detected Colors:', 'lyfpro' ); ?></strong></p>
							<p><?php esc_attr_e('Here is the list of auto-detected colors. Just CLICK on any color you want to set:', 'lyfpro' ); ?></p>
							<div id="dsvy-swizard-secondary-color-pallate"></div>	
						</div>

						<div class="clear clr"></div>

					</div>

				</div>


				<script>
					jQuery(document).ready(function(){
						jQuery('.color-field').each(function(){
							jQuery(this).wpColorPicker();
						});
					});
				</script>


				<?php
				$demo_styles = apply_filters( 'lyfpro_default_styles', array() );
				if ( ! $this->get_default_theme_style() || count( $demo_styles ) <= 1 ) {

				} else {
					?>

                    
                    <div class="theme-presets">
                        <ul>
							<?php
							$current_demo = get_theme_mod( 'lyfpro_site_color', $this->get_default_theme_style() );
							foreach ( $demo_styles as $demo_name => $demo_style ) {
								?>
                                <li<?php if($demo_name == $current_demo){ ?> class="current"<?php }; ?>>
                                    <a href="#" data-style="<?php echo esc_attr( $demo_name ); ?>"><img
                                                src="<?php echo esc_url( $demo_style['image'] ); ?>"></a>
                                </li>
							<?php } ?>
                        </ul>
                    </div>
				<?php } ?>



                <input type="hidden" name="new_logo_id" id="new_logo_id" value="">
                <input type="hidden" name="new_style" id="new_style" value="">

                <p class="envato-setup-actions step">
                    <input type="submit" class="button-primary button button-large button-next"
                           value="<?php esc_attr_e( 'Continue', 'lyfpro' ); ?>" name="save_step"/>
                    <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                       class="button button-large button-next"><?php esc_html_e( 'Skip this step', 'lyfpro' ); ?></a>
					<?php wp_nonce_field( 'envato-setup' ); ?>
                </p>
            </form>
			<?php
		}

		/**
		 * Save logo & design options
		 */
		public function envato_setup_logo_design_save() {
			check_admin_referer( 'envato-setup' );

			$new_logo_id = (int) $_POST['new_logo_id'];
			$global_color = $_POST['global-color'];
			$secondary_color = $_POST['secondary-color'];
			// save this new logo url into the database and calculate the desired height based off the logo width.
			// copied from dtbaker.theme_options.php
			if ( $new_logo_id ) {
				$attr = wp_get_attachment_image_src( $new_logo_id, 'full' );
				if ( $attr && ! empty( $attr[1] ) && ! empty( $attr[2] ) ) {

					//set_theme_mod( 'custom_logo', $new_logo_id );
					set_theme_mod( 'logo', $attr[0] );
					set_theme_mod( 'header_textcolor', 'blank' );
					set_theme_mod( 'logo_header_image', $attr[0] );
					// we have a width and height for this image. awesome.
					$logo_width  = (int) get_theme_mod( 'logo_header_image_width', '467' );
					$scale       = $logo_width / $attr[1];
					$logo_height = intval( $attr[2] * $scale );
					if ( $logo_height > 0 ) {
						set_theme_mod( 'logo_header_image_height', $logo_height );
					}
				}
			}

			if ( !empty($global_color) ) {
				set_theme_mod( 'global-color', esc_attr($global_color) );
				if( function_exists('dsvy_lyfpro_addons_create_css') ){
					dsvy_lyfpro_addons_create_css();
				}
			}

			if ( !empty($secondary_color) ) {
				set_theme_mod( 'secondary-color', esc_attr($secondary_color) );
				if( function_exists('dsvy_lyfpro_addons_create_css') ){
					dsvy_lyfpro_addons_create_css();
				}
			}

			$new_style = isset( $_POST['new_style'] ) ? $_POST['new_style'] : false;
			if ( $new_style ) {
				$demo_styles = apply_filters( 'lyfpro_default_styles', array() );
				if ( isset( $demo_styles[ $new_style ] ) ) {
					set_theme_mod( 'lyfpro_site_color', $new_style );
					if ( class_exists( 'lyfpro_customize_save_hook' ) ) {
						$site_color_defaults = new lyfpro_customize_save_hook();
						$site_color_defaults->save_color_options( $new_style );
					}
				}
			}

			wp_redirect( esc_url_raw( $this->get_next_step_link() ) );
			exit;
		}

		/**
		 * Updates Step
		 */
		public function envato_setup_updates() {
			?>
            <h1><?php esc_html_e( 'Theme Updates', 'lyfpro' ); ?></h1>
			<?php if ( function_exists( 'envato_market' ) ) { ?>
                <form method="post">
					<?php
					$option = envato_market()->get_options();

					$my_items = array();
					if ( $option && ! empty( $option['items'] ) ) {
						foreach ( $option['items'] as $item ) {
							if ( ! empty( $item['oauth'] ) && ! empty( $item['token_data']['expires'] ) && $item['oauth'] == $this->envato_username && $item['token_data']['expires'] >= time() ) {
								// token exists and is active
								$my_items[] = $item;
							}
						}
					}
					if ( count( $my_items ) ) {
						?>
                        <p>Thanks! Theme updates have been enabled for the following items: </p>
                        <ul>
							<?php foreach ( $my_items as $item ) { ?>
                                <li><?php echo esc_html( $item['name'] ); ?></li>
							<?php } ?>
                        </ul>
                        <p><?php esc_html_e( 'When an update becomes available it will show in the Dashboard with an option to install.', 'lyfpro' ); ?></p>
                        <p><?php esc_html_e( 'Change settings from the "Envato Market" menu in the WordPress Dashboard.', 'lyfpro' ); ?></p>

                        <p class="envato-setup-actions step">
                            <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                               class="button button-large button-next button-primary"><?php esc_html_e( 'Continue', 'lyfpro' ); ?></a>
                        </p>
						<?php
					} else {
						?>
                        <p><?php esc_html_e( 'Please login using your ThemeForest account to enable Theme Updates. We update themes when a new feature is added or a bug is fixed. It is highly recommended to enable Theme Updates.', 'lyfpro' ); ?></p>
                        <p><?php esc_html_e( 'When an update becomes available it will show in the Dashboard with an option to install.', 'lyfpro' ); ?></p>
                        <p><?php esc_html_e( 'On the next page you will be asked to Login with your ThemeForest account and grant permissions to enable Automatic Updates.', 'lyfpro' ); ?></p>
                        <p class="envato-setup-actions step">
                            <input type="submit" class="button-primary button button-large button-next"
                                   value="<?php esc_attr_e( 'Login with Envato', 'lyfpro' ); ?>" name="save_step"/>
                            <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                               class="button button-large button-next"><?php esc_html_e( 'Skip this step', 'lyfpro' ); ?></a>
							<?php wp_nonce_field( 'envato-setup' ); ?>
                        </p>
					<?php } ?>
                </form>
			<?php } else { ?>
                <p><?php esc_html_e( 'Please ensure the Envato Market plugin has been installed correctly.', 'lyfpro' ); ?><a href="<?php echo esc_url( $this->get_step_link( 'default_plugins' ) ); ?>"><?php esc_html_e( 'Return to Required Plugins installer', 'lyfpro' ); ?></a>.</p>
			<?php } ?>
			<?php
		}

		/**
		 * Payments Step save
		 */
		public function envato_setup_updates_save() {
			check_admin_referer( 'envato-setup' );

			// redirect to our custom login URL to get a copy of this token.
			$url = $this->get_oauth_login_url( $this->get_step_link( 'updates' ) );

			wp_redirect( esc_url_raw( $url ) );
			exit;
		}


		public function envato_setup_customize() {
			?>

            <h1><?php esc_html_e( 'Theme Customization', 'lyfpro' ); ?></h1>
            <p><?php esc_html_e( 'Most changes to the website can be made through the "Appearance > Customize" menu from the WordPress
                dashboard. These include:', 'lyfpro' ); ?>
                
            </p>

			<div class="dsvy-swizard-customize-area">

				<div class="dsvy-swizard-customize-left">
					<img src="<?php echo esc_url(get_template_directory_uri() .'/includes/images/customizer-options.jpg');?>" alt="<?php esc_attr_e('Customize Options Preview', 'lyfpro')?>" />
				</div>

				<div class="dsvy-swizard-customize-right">
					<ul>
						<li><?php esc_html_e( 'Colors: Set or change global color and also secondary color. Apply your business color in whole site.', 'lyfpro' ); ?></li>
						<li><?php esc_html_e( 'Typography: Font Sizes, Style, Colors (over 200 fonts to choose from) for various page elements.', 'lyfpro' ); ?></li>
						<li><?php esc_html_e( 'Logo: Upload a new logo and adjust its size.', 'lyfpro' ); ?></li>
						<li><?php esc_html_e( 'Header: Change header style and edit texts in header area', 'lyfpro' ); ?></li>
						<li><?php esc_html_e( 'Footer: Set column for footer widgets and change background image or color.', 'lyfpro' ); ?></li>
						<li><?php esc_html_e( 'and more ...', 'lyfpro' ); ?></li>
						
					</ul>
				</div>
				<div class="clear clr clearfix"></div>
			</div>

            <p class="envato-setup-actions step">
                <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                   class="button button-primary button-large button-next"><?php esc_html_e( 'Continue', 'lyfpro' ); ?></a>
            </p>

			<?php
		}

		public function envato_setup_help_support() {

		    $doc_url = false;
            if ( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
                $doc_url = lyfpro_Theme_Manager_custom::get_instance()->get_theme_setting( 'documentation_url' );
            } else if( class_exists( 'lyfpro_Theme_Manager' ) ) {
                $doc_url = lyfpro_Theme_Manager::get_instance()->get_theme_setting( 'documentation_url' );
			}
			

			$support_url = false;
            if ( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
                $support_url = lyfpro_Theme_Manager_custom::get_instance()->get_theme_setting( 'support_url' );
            } else if( class_exists( 'lyfpro_Theme_Manager' ) ) {
                $support_url = lyfpro_Theme_Manager::get_instance()->get_theme_setting( 'support_url' );
			}
			


            if($doc_url){ ?>
                <h1><?php esc_html_e( 'Documentation', 'lyfpro' ); ?></h1>
                <p><?php esc_html_e( 'Here is a link to theme documentation, please bookmark for future reference:', 'lyfpro' ); ?> <br/><a href="<?php echo esc_url($doc_url);?>" target="_blank"><?php echo esc_html($doc_url);?></a></p>

				<div class="envato-setup-next-steps envato-setup-documentation">
					<div class="envato-setup-next-steps-first">
						<a class="button button-primary button-large dsvy-big-btn" href="<?php echo esc_url($doc_url);?>" target="_blank"> <span class="dashicons dashicons-book-alt"></span> &nbsp; <?php esc_html_e( 'Read lyfpro theme Document', 'lyfpro' ); ?></a>
					</div>
					<div class="envato-setup-next-steps-last">
						<a class="button button-large dsvy-big-btn" href="<?php echo esc_url($support_url);?>" target="_blank"> <span class="dashicons dashicons-sos"></span> &nbsp; <?php esc_html_e( 'Question? Create ticket on our support', 'lyfpro' ); ?></a>
					</div>
				</div>


				


            <?php } ?>
            <h1><?php esc_html_e( 'Help and Support', 'lyfpro' ); ?></h1>
			
			<p><?php
			printf(
				esc_html__( 'We have a dedicated support system and team to help you for our theme support. just create a ticket on our support at %1$s and we will reply within 24 hours. Generally you will get reply within 12 hours.', 'lyfpro' ),
				dsvy_esc_kses('<a href="' . esc_url($support_url) . '" target="_blank">' . esc_html($support_url) . '</a>')
			);?></p>

			<p><?php
			printf(
			esc_html__( 'We recommend you to read our %1$s theme document%2$s before creating ticket so you can solve your question fast and also understand our system properly.', 'lyfpro' ),
			dsvy_esc_kses('<a href="' . esc_url($doc_url) . '" target="_blank">'),
			dsvy_esc_kses('</a>')
			);
			?></p>


            <p class="envato-setup-actions step">
                <a href="<?php echo esc_url( $this->get_next_step_link() ); ?>"
                   class="button button-primary button-large button-next"><?php esc_html_e( 'Got it, Continue', 'lyfpro' ); ?></a>
				<?php wp_nonce_field( 'envato-setup' ); ?>
            </p>
			<?php
		}

		/**
		 * Final step
		 */
		public function envato_setup_ready() {

			update_option( 'envato_setup_complete', time() );
			update_option( 'lyfpro_update_notice', strtotime('-4 days') );

			$doc_url = false;
            if ( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
                $doc_url = lyfpro_Theme_Manager_custom::get_instance()->get_theme_setting( 'documentation_url' );
            } else if( class_exists( 'lyfpro_Theme_Manager' ) ) {
                $doc_url = lyfpro_Theme_Manager::get_instance()->get_theme_setting( 'documentation_url' );
			}

			$support_url = false;
            if ( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
                $support_url = lyfpro_Theme_Manager_custom::get_instance()->get_theme_setting( 'support_url' );
            } else if( class_exists( 'lyfpro_Theme_Manager' ) ) {
                $support_url = lyfpro_Theme_Manager::get_instance()->get_theme_setting( 'support_url' );
			}
			?>
			
            <h1><?php esc_html_e( 'Your Website is Ready!', 'lyfpro' ); ?></h1>

            <p><?php esc_html_e( 'Congratulations! The theme has been activated and your website is ready. Login to your WordPress dashboard to make changes and modify any of the default content to suit your needs.', 'lyfpro' ); ?></p>

            <p><?php printf( esc_html__( 'Please come back and %1$s leave a 5-star rating%2$s if you are happy with this theme.', 'lyfpro' ), dsvy_esc_kses('<a href="'.esc_url('https://themeforest.net/downloads').'" target="_blank">') , dsvy_esc_kses('</a> ') )  ?> </p>

            <div class="envato-setup-next-steps">
                <div class="envato-setup-next-steps-first">
                    <h2><?php esc_html_e( 'Next Steps', 'lyfpro' ); ?></h2>
                    <ul>
                        <li class="setup-product"><a class="button button-next button-primary button-large" href="<?php echo esc_url( admin_url() ); ?>"><span class="dashicons dashicons-dashboard"></span> <?php esc_html_e( 'Go to Dashboard', 'lyfpro' ); ?></a>
                        </li>
                        <li class="setup-product"><a class="button button-large" href="<?php echo esc_url( home_url() ); ?>" target="_blank"><span class="dashicons dashicons-admin-home"></span> <?php esc_html_e( 'View your new website!', 'lyfpro' ); ?></a>
                        </li>
                    </ul>
                </div>
                <div class="envato-setup-next-steps-last">
                    <h2><?php esc_html_e( 'More Resources', 'lyfpro' ); ?></h2>
                    <ul>
                        <li class="documentation"><a href="<?php echo esc_url($doc_url);?>" target="_blank"><?php esc_html_e( 'Read the Theme Documentation', 'lyfpro' ); ?></a></li>
                        <li class="howto"><a href="https://wordpress.org/support/category/basic-usage/" target="_blank"><?php esc_html_e( 'Learn how to use WordPress', 'lyfpro' ); ?></a></li>
                        <li class="rating"><a href="https://themeforest.net/downloads" target="_blank"><?php esc_html_e( 'Leave an Item Rating', 'lyfpro' ); ?></a></li>
                        <li class="support"><a href="<?php echo esc_url($support_url);?>" target="_blank"><?php esc_html_e( 'Get Help and Support', 'lyfpro' ); ?></a></li>
                    </ul>
                </div>
            </div>
			<?php
		}

		public function envato_market_admin_init() {

			if ( ! function_exists( 'envato_market' ) ) {
				return;
			}

			global $wp_settings_sections;
			if ( ! isset( $wp_settings_sections[ envato_market()->get_slug() ] ) ) {
				// means we're running the admin_init hook before envato market gets to setup settings area.
				// good - this means our oauth prompt will appear first in the list of settings blocks
				register_setting( envato_market()->get_slug(), envato_market()->get_option_name() );
			}

			// pull our custom options across to envato.
			$option         = get_option( 'envato_setup_wizard', array() );
			$envato_options = envato_market()->get_options();
			$envato_options = $this->_array_merge_recursive_distinct( $envato_options, $option );
			if(!empty($envato_options['items'])) {
				foreach($envato_options['items'] as $key => $item) {
					if(!empty($item['id'])){
						$envato_options['items'][$key]['id'] = (string)$item['id']; // we store in string here (instead of int) because the plugin does a === match on a parse_str() result.
					}
				}
			}
			update_option( envato_market()->get_option_name(), $envato_options );


			if ( ! empty( $_POST['oauth_session'] ) && ! empty( $_POST['bounce_nonce'] ) && wp_verify_nonce( $_POST['bounce_nonce'], 'envato_oauth_bounce_' . $this->envato_username ) ) {
				// request the token from our bounce url.
				$my_theme    = wp_get_theme();
				$oauth_nonce = get_option( 'envato_oauth_' . $this->envato_username );
				if ( ! $oauth_nonce ) {
					// this is our 'private key' that is used to request a token from our api bounce server.
					// only hosts with this key are allowed to request a token and a refresh token
					// the first time this key is used, it is set and locked on the server.
					$oauth_nonce = wp_create_nonce( 'envato_oauth_nonce_' . $this->envato_username );
					update_option( 'envato_oauth_' . $this->envato_username, $oauth_nonce );
				}

				if ( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
					$theme_slug = lyfpro_Theme_Manager_custom::get_instance()->get_theme_setting( 'slug' );
					$item_id = lyfpro_Theme_Manager_custom::get_instance()->get_theme_setting( 'envato-item-id' );
				} else if( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
					$theme_slug = lyfpro_Theme_Manager::get_instance()->get_theme_setting( 'slug' );
					$item_id = lyfpro_Theme_Manager::get_instance()->get_theme_setting( 'envato-item-id' );
				}else{
					$theme_slug = '';
					$item_id = '';
				}

				$response = wp_remote_post( $this->oauth_script, array(
						'method'      => 'POST',
						'timeout'     => 15,
						'redirection' => 1,
						'httpversion' => '1.0',
						'blocking'    => true,
						'headers'     => array(),
						'body'        => array(
							'oauth_session' => $_POST['oauth_session'],
							'oauth_nonce'   => $oauth_nonce,
							'get_token'     => 'yes',
							'url'           => home_url(),
							'theme'         => $my_theme->get( 'Name' ),
							'version'       => $my_theme->get( 'Version' ),
							'slug'       => $theme_slug,
							'item_id'       => $item_id,
							'update_version'       => $this->version,
						),
						'cookies'     => array(),
					)
				);
				if ( is_wp_error( $response ) ) {
					$error_message = $response->get_error_message();
					$class         = 'error';
					echo dsvy_esc_kses('"<div class="'.esc_attr($class).'"><p>' . sprintf( esc_html__( 'Something went wrong while trying to retrieve oauth token: %1$s', 'lyfpro' ), esc_html($error_message) ) . '</p></div>');
				} else {
					$token  = @json_decode( wp_remote_retrieve_body( $response ), true );
					$result = false;
					if ( is_array( $token ) && ! empty( $token['access_token'] ) ) {
						$token['oauth_session'] = $_POST['oauth_session'];
						$result                 = $this->_manage_oauth_token( $token );
					}
					if ( $result !== true ) {
						esc_html_e('Failed to get oAuth token. Please go back and try again', 'lyfpro');
						exit;
					}
				}
			}

			add_settings_section(
				envato_market()->get_option_name() . '_' . $this->envato_username . '_oauth_login',
				sprintf( esc_html__( 'Login for %s updates', 'lyfpro' ), $this->envato_username ),
				array( $this, 'render_oauth_login_description_callback' ),
				envato_market()->get_slug()
			);
			// Items setting.
			add_settings_field(
				$this->envato_username . 'oauth_keys',
				esc_html__( 'oAuth Login', 'lyfpro' ),
				array( $this, 'render_oauth_login_fields_callback' ),
				envato_market()->get_slug(),
				envato_market()->get_option_name() . '_' . $this->envato_username . '_oauth_login'
			);
		}

		private static $_current_manage_token = false;

		private function _manage_oauth_token( $token ) {
			if ( is_array( $token ) && ! empty( $token['access_token'] ) ) {
				if ( self::$_current_manage_token == $token['access_token'] ) {
					return false; // stop loops when refresh auth fails.
				}
				self::$_current_manage_token = $token['access_token'];
				// yes! we have an access token. store this in our options so we can get a list of items using it.
				$option = get_option( 'envato_setup_wizard', array() );
				if ( ! is_array( $option ) ) {
					$option = array();
				}
				if ( empty( $option['items'] ) ) {
					$option['items'] = array();
				}
				// check if token is expired.
				if ( empty( $token['expires'] ) ) {
					$token['expires'] = time() + 3600;
				}
				if ( $token['expires'] < time() + 120 && ! empty( $token['oauth_session'] ) ) {
					// time to renew this token!
					$my_theme    = wp_get_theme();
					$oauth_nonce = get_option( 'envato_oauth_' . $this->envato_username );


					if ( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
						$theme_slug = lyfpro_Theme_Manager_custom::get_instance()->get_theme_setting( 'slug' );
						$item_id = lyfpro_Theme_Manager_custom::get_instance()->get_theme_setting( 'envato-item-id' );
					} else if( class_exists( 'lyfpro_Theme_Manager_custom' ) ) {
						$theme_slug = lyfpro_Theme_Manager::get_instance()->get_theme_setting( 'slug' );
						$item_id = lyfpro_Theme_Manager::get_instance()->get_theme_setting( 'envato-item-id' );
					}else{
						$theme_slug = '';
						$item_id = '';
                    }
					
					$response    = wp_remote_post( $this->oauth_script, array(
							'method'      => 'POST',
							'timeout'     => 10,
							'redirection' => 1,
							'httpversion' => '1.0',
							'blocking'    => true,
							'headers'     => array(),
							'body'        => array(
								'oauth_session' => $token['oauth_session'],
								'oauth_nonce'   => $oauth_nonce,
								'refresh_token' => 'yes',
								'url'           => home_url(),
								'theme'         => $my_theme->get( 'Name' ),
								'version'       => $my_theme->get( 'Version' ),
								'slug'       => $theme_slug,
								'item_id'       => $item_id,
								'update_version'       => $this->version,
							),
							'cookies'     => array(),
						)
					);
					if ( is_wp_error( $response ) ) {
						$error_message = $response->get_error_message();
						// we clear any stored tokens which prompts the user to re-auth with the update server.
                        $this->_clear_oauth();
					} else {
						$new_token = @json_decode( wp_remote_retrieve_body( $response ), true );
						$result    = false;
						if ( is_array( $new_token ) && ! empty( $new_token['new_token'] ) ) {
							$token['access_token'] = $new_token['new_token'];
							$token['expires']      = time() + 3600;
						}else {
							//refresh failed, we clear any stored tokens which prompts the user to re-register.
                            $this->_clear_oauth();
						}
					}
				}
				// use this token to get a list of purchased items
				// add this to our items array.
				$response                    = envato_market()->api()->request( 'https://api.envato.com/v3/market/buyer/purchases', array(
					'headers' => array(
						'Authorization' => 'Bearer ' . $token['access_token'],
					),
				) );
//				self::$_current_manage_token = false; // whoops
				if ( is_array( $response ) && is_array( $response['purchases'] ) ) {
					// up to here, add to items array
					foreach ( $response['purchases'] as $purchase ) {
						// check if this item already exists in the items array.
						$exists = false;
						foreach ( $option['items'] as $id => $item ) {
							if ( ! empty( $item['id'] ) && $item['id'] == $purchase['item']['id'] ) {
								$exists = true;
								// update token.
								$option['items'][ $id ]['token']      = $token['access_token'];
								$option['items'][ $id ]['token_data'] = $token;
								$option['items'][ $id ]['oauth']      = $this->envato_username;
								if ( ! empty( $purchase['code'] ) ) {
									$option['items'][ $id ]['purchase_code'] = $purchase['code'];
								}
							}
						}
						if ( ! $exists ) {
							$option['items'][] = array(
								'id'            => '' . $purchase['item']['id'],
								// item id needs to be a string for market download to work correctly.
								'name'          => $purchase['item']['name'],
								'token'         => $token['access_token'],
								'token_data'    => $token,
								'oauth'         => $this->envato_username,
								'type'          => ! empty( $purchase['item']['wordpress_theme_metadata'] ) ? 'theme' : 'plugin',
								'purchase_code' => ! empty( $purchase['code'] ) ? $purchase['code'] : '',
							);
						}
					}
				} else {
					return false;
				}
				if ( ! isset( $option['oauth'] ) ) {
					$option['oauth'] = array();
				}
				// store our 1 hour long token here. we can refresh this token when it comes time to use it again (i.e. during an update)
				$option['oauth'][ $this->envato_username ] = $token;
				update_option( 'envato_setup_wizard', $option );

				$envato_options = envato_market()->get_options();
				$envato_options = $this->_array_merge_recursive_distinct( $envato_options, $option );
				update_option( envato_market()->get_option_name(), $envato_options );
				envato_market()->items()->set_themes( true );
				envato_market()->items()->set_plugins( true );

				return true;
			} else {
				return false;
			}
		}

		public function _clear_oauth() {
			$envato_options = envato_market()->get_options();
			unset( $envato_options['oauth'] );
			update_option( envato_market()->get_option_name(), $envato_options );
		}



		public function ajax_notice_handler() {
			check_ajax_referer( 'dtnwp-ajax-nonce', 'security' );
			// Store it in the options table
			update_option( 'lyfpro_update_notice', time() );
		}

		public function admin_theme_auth_notice() {


			if(function_exists('envato_market')) {
				$option = envato_market()->get_options();

				$envato_items = get_option( 'envato_setup_wizard', array() );
				if(!envato_market()->items()->themes( )) {
					envato_market()->items()->set_themes();
				}

				if ( !$option || empty($option['oauth']) || empty( $option['oauth'][ $this->envato_username ] ) || empty($envato_items) || empty($envato_items['items']) || !envato_market()->items()->themes( 'purchased' )) {

					// we show an admin notice if it hasn't been dismissed
					$dissmissed_time = get_option('lyfpro_update_notice', false );

					if ( ! $dissmissed_time || $dissmissed_time < strtotime('-7 days') ) {
						// Added the class "notice-my-class" so jQuery pick it up and pass via AJAX,
						// and added "data-notice" attribute in order to track multiple / different notices
						// multiple dismissible notice states ?>
                        <div class="notice notice-warning notice-lyfpro-themeupdates is-dismissible">
                            <p><?php
                            _e( 'Please activate ThemeForest updates to ensure you have the latest version of this theme.', 'lyfpro' );
                                ?></p>
                            <p>
                            <?php printf( __( '<a class="button button-primary" href="%s">Activate Updates</a>', 'lyfpro' ),  esc_url($this->get_oauth_login_url( admin_url( 'admin.php?page=' . envato_market()->get_slug() . '' ) ) ) ); ?>
                            </p>
                        </div>
                        <script type="text/javascript">
                            jQuery(function($) {
                                $( document ).on( 'click', '.notice-lyfpro-themeupdates .notice-dismiss', function () {
                                    $.ajax( ajaxurl,
                                        {
                                            type: 'POST',
                                            data: {
                                                action: 'lyfpro_update_notice_handler',
                                                security: '<?php echo wp_create_nonce( "dtnwp-ajax-nonce" ); ?>'
                                            }
                                        } );
                                } );
                            });
                        </script>
					<?php }

				}
			}



		}
		/**
		 * @param $array1
		 * @param $array2
		 *
		 * @return mixed
		 *
		 *
		 * @since    1.1.4
		 */
		private function _array_merge_recursive_distinct( $array1, $array2 ) {
			$merged = $array1;
			foreach ( $array2 as $key => &$value ) {
				if ( is_array( $value ) && isset( $merged [ $key ] ) && is_array( $merged [ $key ] ) ) {
					$merged [ $key ] = $this->_array_merge_recursive_distinct( $merged [ $key ], $value );
				} else {
					$merged [ $key ] = $value;
				}
			}

			return $merged;
		}

		/**
		 * @param $args
		 * @param $url
		 *
		 * @return mixed
		 *
		 * Filter the WordPress HTTP call args.
		 * We do this to find any queries that are using an expired token from an oAuth bounce login.
		 * Since these oAuth tokens only last 1 hour we have to hit up our server again for a refresh of that token before using it on the Envato API.
		 * Hacky, but only way to do it.
		 */
		public function envato_market_http_request_args( $args, $url ) {
			if ( strpos( $url, 'api.envato.com' ) && function_exists( 'envato_market' ) ) {
				// we have an API request.
				// check if it's using an expired token.
				if ( ! empty( $args['headers']['Authorization'] ) ) {
					$token = str_replace( 'Bearer ', '', $args['headers']['Authorization'] );
					if ( $token ) {
						// check our options for a list of active oauth tokens and see if one matches, for this envato username.
						$option = envato_market()->get_options();
						if ( $option && ! empty( $option['oauth'][ $this->envato_username ] ) && $option['oauth'][ $this->envato_username ]['access_token'] == $token && $option['oauth'][ $this->envato_username ]['expires'] < time() + 120 ) {
							// we've found an expired token for this oauth user!
							// time to hit up our bounce server for a refresh of this token and update associated data.
							$this->_manage_oauth_token( $option['oauth'][ $this->envato_username ] );
							$updated_option = envato_market()->get_options();
							if ( $updated_option && ! empty( $updated_option['oauth'][ $this->envato_username ]['access_token'] ) ) {
								// hopefully this means we have an updated access token to deal with.
								$args['headers']['Authorization'] = 'Bearer ' . $updated_option['oauth'][ $this->envato_username ]['access_token'];
							}
						}
					}
				}
			}

			return $args;
		}

		public function render_oauth_login_description_callback() {
			printf(
				esc_html__('If you have purchased items from %1$s on ThemeForest or CodeCanyon please login here for quick and easy updates.', 'lyfpro'),
				esc_html( $this->envato_username )
			) ;

		}

		public function render_oauth_login_fields_callback() {
			$option = envato_market()->get_options();
			?>
            <div class="oauth-login" data-username="<?php echo esc_attr( $this->envato_username ); ?>">
                <a href="<?php echo esc_url( $this->get_oauth_login_url( admin_url( 'admin.php?page=' . envato_market()->get_slug() . '' ) ) ); ?>"
                   class="oauth-login-button button button-primary">Login with Envato to activate updates</a>
            </div>
			<?php
		}

		/// a better filter would be on the post-option get filter for the items array.
		// we can update the token there.

		public function get_oauth_login_url( $return ) {
			return $this->oauth_script . '?bounce_nonce=' . wp_create_nonce( 'envato_oauth_bounce_' . $this->envato_username ) . '&wp_return=' . urlencode( $return );
		}

		/**
		 * Helper function
		 * Take a path and return it clean
		 *
		 * @param string $path
		 *
		 * @since    1.1.2
		 */
		public static function cleanFilePath( $path ) {
			$path = str_replace( '', '', str_replace( array( '\\', '\\\\', '//' ), '/', $path ) );
			if ( $path[ strlen( $path ) - 1 ] === '/' ) {
				$path = rtrim( $path, '/' );
			}

			return $path;
		}

		public function is_submenu_page() {
			return ( $this->parent_slug == '' ) ? false : true;
		}
	}

}// if !class_exists

/**
 * Loads the main instance of Envato_Theme_Setup_Wizard to have
 * ability extend class functionality
 *
 * @since 1.1.1
 * @return object Envato_Theme_Setup_Wizard
 */
add_action( 'after_setup_theme', 'envato_theme_setup_wizard', 10 );
if ( ! function_exists( 'envato_theme_setup_wizard' ) ) :
	function envato_theme_setup_wizard() {
		Envato_Theme_Setup_Wizard::get_instance();
	}
endif;
