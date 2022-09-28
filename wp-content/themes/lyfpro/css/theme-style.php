<?php
$all_data = dsvy_get_all_option_array();
extract($all_data);
$gradient_first = '#ffff00';
$gradient_last  = '#ffff00';
if( function_exists('dsvy_get_base_option') ){
	$gradient_colors = dsvy_get_base_option('gradient-color');
	$gradient_first  = ( !empty($gradient_colors['first']) ) ? $gradient_colors['first'] : '#ffff00' ;
	$gradient_last   = ( !empty($gradient_colors['last'])  ) ? $gradient_colors['last']  : '#ffff00' ;
}
?>
<?php echo dsvy_all_options_values('background'); ?>
<?php echo dsvy_all_options_values('typography'); ?>
/* --------------------------------------
 * Custom background color and text color
 * ---------------------------------------*/
/* Custom preheader background color */
.dsvy-pre-header-wrapper.dsvy-bg-color-custom{
	background-color: <?php echo esc_attr($preheader_bgcolor_custom); ?>;
}
/* Custom Header background color */
.dsvy-header-wrapper.dsvy-bg-color-custom{
	background-color: <?php echo esc_attr($header_background_color); ?>;
}
/* Custom Menu area background color */
.dsvy-header-menu-area.dsvy-bg-color-custom{
	background-color: <?php echo esc_attr($menu_background_color); ?>;
}
/* sticky-header-background-color */
.dsvy-sticky-on.dsvy-sticky-bg-color-custom{
	background-color: <?php echo esc_attr($sticky_header_background_color); ?>;
}
/* Custom Menu text color */
.dsvy-sticky-on .dsvy-navbar div > ul > li > a{
	color: <?php echo esc_attr($main_menu_sticky_color); ?>;
}
<?php if($service_single_image_hide==true){ ?>
/* Hide single image in service */
.single.single-dsvy-service .dsvy-featured-wrapper {
	display: none;
}

<?php } ?>
/* --------------------------------------
 * A tag
 * ---------------------------------------*/
a{
	color: <?php echo esc_attr($link_color['normal']); ?>
}
a:hover{
	color: <?php echo esc_attr($link_color['hover']); ?>
}

/* --------------------------------------
 * site-title
 * ---------------------------------------*/
.site-title {
    height: <?php echo esc_attr($header_height); ?>px;
}
.site-title img.dsvy-main-logo{
	max-height: <?php echo esc_attr($logo_height); ?>px;
}
.site-title img.dsvy-responsive-logo{
	max-height: <?php echo esc_attr($responsive_logo_height); ?>px;
}

/* --------------------------------------
 * Titlebar
 * ---------------------------------------*/
.dsvy-title-bar-content,
.dsvy-title-bar-wrapper{
    min-height: <?php echo esc_attr($titlebar_height); ?>px;
}
.dsvy-color-globalcolor,
.dsvy-globalcolor,
.globalcolor{
	color: <?php echo esc_attr($global_color); ?> ;
}
.dsvy-bg-color-globalcolor.dsvy-title-bar-wrapper:before,
.designervily-ele-team .designervily-overlay{
	background-color: <?php echo dsvy_hex2rgb($global_color, '0.5') ?>;
}

/*========================================== Row / Colum Background Base Css ==========================================*/

.elementor-section.elementor-top-section.dsvy-bg-image-over-color.dsvy-bgimage-yes:before,
.elementor-column.elementor-top-column.dsvy-bgimage-yes.dsvy-bg-image-over-color > .dsvy-stretched-div:before,

.elementor-column.elementor-top-column.dsvy-bg-image-over-color > .elementor-widget-wrap:before,
.elementor-column.elementor-inner-column.dsvy-bg-image-over-color > .elementor-widget-wrap:before,

.elementor-element.elementor-section.elementor-inner-section.dsvy-bg-image-over-color.dsvy-bgimage-yes:before{
	background-color: transparent !important;
}

/* --------------------------------------
 * Row Colum - Global BG Color
 * ---------------------------------------*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-globalcolor,
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-globalcolor:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-globalcolor{
	background-color: <?php echo esc_attr($global_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-globalcolor:not(.dsvy-bgimage-yes) .elementor-widget-wrap > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-globalcolor.dsvy-bg-image-over-color .elementor-widget-wrap > .dsvy-stretched-div,

.elementor-column.elementor-top-column.dsvy-elementor-bg-color-globalcolor:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-globalcolor.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-globalcolor.dsvy-bg-image-over-color:before,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-globalcolor:not(.dsvy-bgimage-yes) > .elementor-widget-wrap,
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-globalcolor.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($global_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-globalcolor.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-globalcolor.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-globalcolor.dsvy-bgimage-yes:not(.dsvy-bg-image-over-color) .elementor-widget-wrap .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-globalcolor .elementor-widget-wrap .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-globalcolor.dsvy-bg-color-over-image:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-globalcolor.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($global_color, '0.60') ?>;
}
/*====== End --- Row Colum - Global BG Color ======*/

/* --------------------------------------
 * Row Colum - Light BG Color
 * ---------------------------------------*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-light,
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-light:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-light{
	background-color: <?php echo esc_attr($light_bg_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-light:not(.dsvy-bgimage-yes) .elementor-widget-wrap > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-light.dsvy-bg-image-over-color .elementor-widget-wrap > .dsvy-stretched-div,

.elementor-column.elementor-top-column.dsvy-elementor-bg-color-light:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-light.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-light.dsvy-bg-image-over-color:before,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-light:not(.dsvy-bgimage-yes) > .elementor-widget-wrap,
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-light.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($light_bg_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-light.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-light.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-light.dsvy-bgimage-yes:not(.dsvy-bg-image-over-color) .elementor-widget-wrap .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-light .elementor-widget-wrap .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-light.dsvy-bg-color-over-image:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-light.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($light_bg_color, '0.60') ?>;
}
/*====== End --- Row Colum - Light BG Color ======*/

/* --------------------------------------
 * Row Colum - Secondary BG Color
 * ---------------------------------------*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-secondary,
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-secondary:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-secondary{
	background-color: <?php echo esc_attr($secondary_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-secondary:not(.dsvy-bgimage-yes) .elementor-widget-wrap > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-secondary.dsvy-bg-image-over-color .elementor-widget-wrap > .dsvy-stretched-div,

.elementor-column.elementor-top-column.dsvy-elementor-bg-color-secondary:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-secondary.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-secondary.dsvy-bg-image-over-color:before,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-secondary:not(.dsvy-bgimage-yes) > .elementor-widget-wrap,
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-secondary.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($secondary_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-secondary.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-secondary.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-secondary.dsvy-bgimage-yes:not(.dsvy-bg-image-over-color) .elementor-widget-wrap .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-secondary .elementor-widget-wrap .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-secondary.dsvy-bg-color-over-image:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-secondary.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($secondary_color, '0.60') ?>;
}

/*====== End --- Row Colum - Light BG Color ======*/

/* --------------------------------------
 * Row Colum - Blackish BG Color
 * ---------------------------------------*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-blackish,
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-blackish:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-blackish{
	background-color: <?php echo esc_attr($blackish_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-blackish:not(.dsvy-bgimage-yes) .elementor-widget-wrap > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-blackish.dsvy-bg-image-over-color .elementor-widget-wrap > .dsvy-stretched-div,

.elementor-column.elementor-top-column.dsvy-elementor-bg-color-blackish:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-blackish.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-blackish.dsvy-bg-image-over-color:before,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-blackish:not(.dsvy-bgimage-yes) > .elementor-widget-wrap,
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-blackish.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($blackish_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-blackish.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-blackish.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-blackish.dsvy-bgimage-yes:not(.dsvy-bg-image-over-color) .elementor-widget-wrap .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-blackish .elementor-widget-wrap .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-blackish.dsvy-bg-color-over-image:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-blackish.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($blackish_color, '0.60') ?>;
}
/*====== End --- Row Colum - Blackish BG Color ======*/

/* --------------------------------------
 * Row Colum - White BG Color
 * ---------------------------------------*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-white,
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-white:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-white{
	background-color: <?php echo esc_attr($white_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-white:not(.dsvy-bgimage-yes) .elementor-widget-wrap > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-white.dsvy-bg-image-over-color .elementor-widget-wrap > .dsvy-stretched-div,

.elementor-column.elementor-top-column.dsvy-elementor-bg-color-white:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-white.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-white.dsvy-bg-image-over-color:before,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-white:not(.dsvy-bgimage-yes) > .elementor-widget-wrap,
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-white.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($white_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-white.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-white.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-white.dsvy-bgimage-yes:not(.dsvy-bg-image-over-color) .elementor-widget-wrap .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-white .elementor-widget-wrap .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-white.dsvy-bg-color-over-image:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-white.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($white_color, '0.60') ?>;
}
/*====== End --- Row Colum - White BG Color ======*/

/* --------------------------------------
 * Row Colum - Gradient BG Color
 * ---------------------------------------*/

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes:before,

/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-gradient:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-gradient.dsvy-bg-image-over-color .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-gradient.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) .elementor-widget-wrap,

.elementor-column.elementor-top-column.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-gradient .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second RoW BG - with image ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-gradient:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-gradient.dsvy-bg-image-over-color .elementor-widget-wrap,
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes .elementor-widget-wrap:before{
	background-image: -ms-linear-gradient(right, <?php echo esc_attr($gradient_first); ?> 0%, <?php echo esc_attr($gradient_last); ?> 100%);
	background-image: linear-gradient(to right, <?php echo esc_attr($gradient_first); ?> , <?php echo esc_attr($gradient_last); ?> );
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-gradient:not(.dsvy-bgimage-yes) .dsvy-stretched-div{
	background-image: -ms-linear-gradient(right, <?php echo esc_attr($gradient_first); ?> 0%, <?php echo esc_attr($gradient_last); ?> 100%) !important;
	background-image: linear-gradient(to right, <?php echo esc_attr($gradient_first); ?> , <?php echo esc_attr($gradient_last); ?> ) !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes .dsvy-stretched-div:before,

/*--- Second RoW BG - with image ---*/
.elementor-section.elementor-inner-section.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-elementor-bg-color-gradient.dsvy-bgimage-yes .elementor-widget-wrap:before{
    opacity: 0.5;
}

/*====== End --- Row Colum - Gradient BG Color ======*/

/*========================================== Base Css ==========================================*/

/*============================================ Remove this code =====================================================*/

/*========================================== Row / Colum Background Base Css ==========================================*/

.elementor-section.elementor-top-section.dsvy-bg-image-over-color.dsvy-bgimage-yes:before,
.elementor-column.elementor-top-column.dsvy-bgimage-yes.dsvy-bg-image-over-color > .dsvy-stretched-div:before,

.elementor-column.elementor-top-column.dsvy-bg-image-over-color > .elementor-widget-wrap:before,
.elementor-column.elementor-inner-column.dsvy-bg-image-over-color > .elementor-widget-wrap:before{
	background-color: transparent !important;
}

/*====== Row Colum - Global BG Color ======*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-globalcolor:before{
	background-color: <?php echo esc_attr($global_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-globalcolor.dsvy-bg-image-over-color > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-bg-color-globalcolor.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-bg-color-globalcolor:not(.dsvy-bgimage-yes) > .dsvy-stretched-div,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-globalcolor.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($global_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-globalcolor.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-globalcolor.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-bg-color-globalcolor.dsvy-bgimage-yes > .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-bg-color-globalcolor > .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-globalcolor.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($global_color, '0.95') ?>;
}

/*====== End --- Row Colum - Global BG Color ======*/

/*====== Row Colum - Light BG Color ======*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-light:before{
	background-color: <?php echo esc_attr($light_bg_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-light.dsvy-bg-image-over-color > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-bg-color-light.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-bg-color-light:not(.dsvy-bgimage-yes) > .dsvy-stretched-div,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-light.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($light_bg_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-light.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-light.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-bg-color-light.dsvy-bgimage-yes > .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-bg-color-light > .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-light.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($light_bg_color, '0.95') ?>;
}

/*====== End --- Row Colum - Light BG Color ======*/

/*====== Row Colum - Secondary BG Color ======*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-secondary:before{
	background-color: <?php echo esc_attr($secondary_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-secondary.dsvy-bg-image-over-color > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-bg-color-secondary.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-bg-color-secondary:not(.dsvy-bgimage-yes) > .dsvy-stretched-div,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-secondary.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($secondary_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-secondary.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-secondary.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-bg-color-secondary.dsvy-bgimage-yes > .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-bg-color-secondary > .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-secondary.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($secondary_color, '0.95') ?>;
}

/*====== End --- Row Colum - Light BG Color ======*/

/*====== Row Colum - Blackish BG Color ======*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-blackish:before{
	background-color: <?php echo esc_attr($blackish_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-blackish.dsvy-bg-image-over-color > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-bg-color-blackish.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-bg-color-blackish:not(.dsvy-bgimage-yes) > .dsvy-stretched-div,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-blackish.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($blackish_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-blackish.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-blackish.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-bg-color-blackish.dsvy-bgimage-yes  .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-bg-color-blackish  .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-blackish.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($blackish_color, '0.95') ?>;
}
/*====== End --- Row Colum - Blackish BG Color ======*/

/*====== Row Colum - White BG Color ======*/
/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-white:before{
	background-color: <?php echo esc_attr($white_color); ?>;
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-white.dsvy-bg-image-over-color > .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-bg-color-white.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap,
.elementor-column.elementor-top-column.dsvy-bg-color-white:not(.dsvy-bgimage-yes) > .dsvy-stretched-div,

/*--- Second Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-white.dsvy-bg-image-over-color > .elementor-widget-wrap{
	background-color: <?php echo esc_attr($white_color); ?> !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-white.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-white.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-bg-color-white.dsvy-bgimage-yes > .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-bg-color-white > .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-white.dsvy-bgimage-yes > .elementor-widget-wrap:before{
    background-color: <?php echo dsvy_hex2rgb($white_color, '0.95') ?>;
}
/*====== End --- Row Colum - White BG Color ======*/

/*====== Row Colum - Gradient BG Color ======*/

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-gradient.dsvy-bgimage-yes:before,

/*--- First RoW BG ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-gradient:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-gradient.dsvy-bg-image-over-color .dsvy-stretched-div,
.elementor-column.elementor-top-column.dsvy-bg-color-gradient.dsvy-bg-image-over-color:not(.dsvy-col-stretched-yes) .elementor-widget-wrap,

.elementor-column.elementor-top-column.dsvy-bg-color-gradient.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-bg-color-gradient.dsvy-bgimage-yes .dsvy-stretched-div:before,
.elementor-column.elementor-top-column.dsvy-bg-color-gradient .dsvy-bgimage-yes.dsvy-stretched-div:before,

/*--- Second RoW BG - with image ---*/
.elementor-section.elementor-inner-section.dsvy-bg-color-gradient.dsvy-bgimage-yes:before,

/*--- Second RoW BG ---*/
.elementor-section.elementor-inner-section.dsvy-bg-color-gradient:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-gradient.dsvy-bg-image-over-color .elementor-widget-wrap,
.elementor-column.elementor-inner-column.dsvy-bg-color-gradient.dsvy-bgimage-yes .elementor-widget-wrap:before{
	background-image: -ms-linear-gradient(right, <?php echo esc_attr($gradient_first); ?> 0%, <?php echo esc_attr($gradient_last); ?> 100%);
	background-image: linear-gradient(to right, <?php echo esc_attr($gradient_first); ?> , <?php echo esc_attr($gradient_last); ?> );
}

/*--- First Colum BG - ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-gradient:not(.dsvy-bgimage-yes) .dsvy-stretched-div{
	background-image: -ms-linear-gradient(right, <?php echo esc_attr($gradient_first); ?> 0%, <?php echo esc_attr($gradient_last); ?> 100%) !important;
	background-image: linear-gradient(to right, <?php echo esc_attr($gradient_first); ?> , <?php echo esc_attr($gradient_last); ?> ) !important;
}

/*--- First RoW BG - with image ---*/
.elementor-section.elementor-top-section.dsvy-bg-color-gradient.dsvy-bgimage-yes:before,

/*--- First Colum BG - with image ---*/
.elementor-column.elementor-top-column.dsvy-bg-color-gradient.dsvy-bgimage-yes:not(.dsvy-col-stretched-yes) .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.dsvy-bg-color-gradient.dsvy-bgimage-yes .dsvy-stretched-div:before,

/*--- Second RoW BG - with image ---*/
.elementor-section.elementor-inner-section.dsvy-bg-color-gradient.dsvy-bgimage-yes:before,

/*--- Second Colum BG - with image ---*/
.elementor-column.elementor-inner-column.dsvy-bg-color-gradient.dsvy-bgimage-yes .elementor-widget-wrap:before{
    opacity: 0.5;
}
/*====== End --- Row Colum - Gradient BG Color ======*/

/*============================================ Remove this code =====================================================*/

/*========================================== Base Css ==========================================*/

/* --------------------------------------
 * Global Color
 * ---------------------------------------*/

/*=== Global BG Color ===*/
.wp-block-button__link:hover, 
.is-style-outline a.wp-block-button__link:hover, 

.wp-block-search .wp-block-search__button,
.dsvy-team-form button:hover,
.wp-block-tag-cloud a:hover, 
.footer-wrap .widget_tag_cloud a:hover, 

.post.sticky .dsvy-blog-classic:after,
.nav-links .page-numbers:hover, 
.nav-links .page-numbers.current,
.search-results .dsvy-top-search-form .search-form button,
.search-no-results .search-no-results-content .search-form button,

input[type=submit]:hover,
.reply a:hover,
.dsvy-ourhistory .dsvy-ourhistory-right:before,

.site-header .dsvy-bg-color-globalcolor,
.site-header .dsvy-sticky-on.dsvy-sticky-bg-color-globalcolor,

.dsvy-btn-style-flat .elementor-button,
.dsvy-btn-style-flat.dsvy-btn-color-globalcolor .elementor-button,

.dsvy-bg-color-globalcolor,
.dsvy-footer-section.dsvy-bg-color-globalcolor:before,

.dsvy-btn-style-flat.dsvy-btn-color-blackish .elementor-button:hover,

body .scroll-to-top{
    background-color: <?php echo esc_attr($global_color); ?>;
}

.dsvy-footer-section.dsvy-bg-color-globalcolor.dsvy-bg-image-yes:before{
    background-color: <?php echo dsvy_hex2rgb($global_color, '0.70') ?>;
}

/*=== Global Text Color ===*/
.dsvy-blog-classic .dsvy-post-title a:hover,
.dsvy-search-results-right .dsvy-post-title a:hover,
.dsvy-portfolio-single .dsvy-portfolio-nav-head,
.dsvy-ourhistory .label,
.dsvy-pricing-table-box .dsvy-ptable-icon,

.dsvy-footer-section.dsvy-text-color-globalcolor .widget-title,
.dsvy-footer-section.dsvy-text-color-globalcolor,
.dsvy-footer-section.dsvy-text-color-globalcolor a,

.dsvy-btn-style-text.dsvy-btn-color-globalcolor .elementor-button,

.dsvy-globalcolor,
.dsvy-skincolor,
.post-navigation .nav-links a:hover{
   	color: <?php echo esc_attr($global_color); ?>;
}

/*=== Global Border Color ===*/
.post.sticky{
	border-color: <?php echo esc_attr($global_color); ?>;
}
.dsvy-btn-style-outline .elementor-button{
	border-color: <?php echo esc_attr($global_color); ?>;
	color: <?php echo esc_attr($global_color); ?>;
}

/* --------------------------------------
 * Secondary Color
 * ---------------------------------------*/

/*=== Secondary BG Color ===*/
.elementor-widget-button.dsvy-btn-bg-color-secondary .elementor-button,

.dsvy-bg-color-secondary,

.dsvy-footer-section.dsvy-bg-color-secondarycolor:before{
    background-color: <?php echo esc_attr($secondary_color); ?>;
}

.dsvy-footer-section.dsvy-bg-color-secondarycolor.dsvy-bg-image-yes:before{
    background-color: <?php echo dsvy_hex2rgb($secondary_color, '0.90') ?>;
}

/*=== Secondary Text Color ===*/
.dsvy-footer-section.dsvy-text-color-secondarycolor .widget-title,
.dsvy-footer-section.dsvy-text-color-secondarycolor,
.dsvy-footer-section.dsvy-text-color-secondarycolor a,
.dsvy-btn-style-text.dsvy-btn-color-secondary .elementor-button,
.testcolor{
   	color: <?php echo esc_attr($secondary_color); ?>;
}

/*=== Global Border Color ===*/
.testcolor{
	border-color: <?php echo esc_attr($secondary_color); ?>;
}
.dsvy-btn-style-outline.dsvy-btn-color-secondary .elementor-button{
	border-color: <?php echo esc_attr($secondary_color); ?>;
	color: <?php echo esc_attr($secondary_color); ?>;
}

/* --------------------------------------
 *  Gradient Color
 * ---------------------------------------*/

/*=== Gradient BG Color ===*/
.elementor-widget-button.dsvy-btn-color-gradient .elementor-button,
.dsvy-bg-color-gradient{
	background-image: -ms-linear-gradient(right, <?php echo esc_attr($gradient_first); ?> 0%, <?php echo esc_attr($gradient_last); ?> 100%);
	background-image: linear-gradient(to right, <?php echo esc_attr($gradient_first); ?> , <?php echo esc_attr($gradient_last); ?> );
}
.dsvy-footer-section.dsvy-bg-color-gradientcolor:before{
	background-image: -ms-linear-gradient(right, <?php echo esc_attr($gradient_first); ?> 0%, <?php echo esc_attr($gradient_last); ?> 100%) !important;
	background-image: linear-gradient(to right, <?php echo esc_attr($gradient_first); ?> , <?php echo esc_attr($gradient_last); ?> ) !important;
}
.elementor-widget-button.dsvy-btn-color-gradient .elementor-button {	
	border-image-slice: 1;
	border-image-source: linear-gradient(to left, <?php echo esc_attr($gradient_first); ?>, <?php echo esc_attr($gradient_last); ?>);
}

/* --------------------------------------
 *  Blackish Color
 * ---------------------------------------*/

 /*=== Blackish BG Color ===*/
button, 
html input[type=button], 
input[type=reset], 
input[type=submit],

.dsvy-accordion-style1 .elementor-accordion .elementor-tab-title.elementor-active,

.dsvy-ptable-btn a,
.designervily-element-viewtype-carousel .owl-carousel .owl-nav button.owl-next, 
.designervily-element-viewtype-carousel .owl-carousel .owl-nav button.owl-prev, 

.dsvy-btn-style-outline.dsvy-btn-color-blackish .elementor-button:hover,
.dsvy-btn-style-flat.dsvy-btn-color-globalcolor .elementor-button:hover,
.dsvy-btn-style-flat.dsvy-btn-color-white .elementor-button:hover,
.dsvy-btn-style-flat.dsvy-btn-color-blackish .elementor-button,

.dsvy-bg-color-blackish,
body .scroll-to-top:hover,

.dsvy-footer-section.dsvy-bg-color-blackish:before{
    background-color: <?php echo esc_attr($blackish_color); ?>;
}

/*=== Blackish Text Color ===*/
.nav-links .page-numbers,
.dsvy-btn-style-outline.dsvy-btn-color-white .elementor-button:hover,,
.dsvy-pricing-table-box .designervily-ptable-price-w,
.dsvy-footer-section.dsvy-text-color-blackish .widget-title,
.dsvy-footer-section.dsvy-text-color-blackish a,
.dsvy-btn-style-text.dsvy-btn-color-blackish .elementor-button,
.dsvy-btn-style-flat.dsvy-btn-color-light .elementor-button,
.dsvy-btn-style-flat.dsvy-btn-color-white .elementor-button,
.elementor-widget-progress .elementor-title,
.elementor-progress-percentage,

.dsvy-color-blackish,
.dsvy-text-color-blackish h1, 
.dsvy-text-color-blackish h2, 
.dsvy-text-color-blackish h3, 
.dsvy-text-color-blackish h4, 
.dsvy-text-color-blackish h5, 
.dsvy-text-color-blackish h6,
.dsvy-blackish{
	color: <?php echo esc_attr($blackish_color); ?>;
}

.dsvy-footer-section.dsvy-text-color-blackish{
	color: <?php echo dsvy_hex2rgb($blackish_bg_color, '0.95') ?>;
}
.dsvy-btn-style-outline.dsvy-btn-color-blackish .elementor-button{
	border-color: <?php echo esc_attr($blackish_bg_color); ?>;
	color: <?php echo esc_attr($blackish_bg_color); ?>;
}

/* --------------------------------------
 *  Light Color
 * ---------------------------------------*/

.dsvy-btn-style-flat.dsvy-btn-color-light .elementor-button,
.dsvy-bg-color-light,
.dsvy-footer-section.dsvy-bg-color-light:before{
    background-color: <?php echo esc_attr($light_bg_color); ?>;
}

.dsvy-btn-style-text.dsvy-btn-color-blackish .elementor-button{
	color: <?php echo esc_attr($light_bg_color); ?>;
}
.dsvy-btn-style-outline.dsvy-btn-color-light .elementor-button{
	border-color: <?php echo esc_attr($light_bg_color); ?>;
	color: <?php echo esc_attr($light_bg_color); ?>;
}

/* --------------------------------------
 *  White Color
 * ---------------------------------------*/
/*=== Light BG Color ===*/
.dsvy-bg-color-white,
.dsvy-footer-section.dsvy-bg-color-white:before{
    background-color: #fff;
}

.dsvy-btn-style-flat.dsvy-btn-color-white .elementor-button:hover,
.dsvy-color-white,

.dsvy-text-color-white .dsvy-heading-subheading .dsvy-element-title,

.dsvy-color-white,
.dsvy-text-color-white h1, 
.dsvy-text-color-white h2, 
.dsvy-text-color-white h3, 
.dsvy-text-color-white h4, 
.dsvy-text-color-white h5, 
.dsvy-text-color-white h6,
.dsvy-white{
	color: <?php echo esc_attr($white_color); ?>;
}

/*========================================== End Base Css ==========================================*/

/*==========================================THEME SPECIAL===========================================*/

/* --------------------------------------
* Global color 
* ---------------------------------------*/
.widget_calendar table td#today,
.dsvy-digit-box .dsvy-digit,
.dsvy-footer-big-area .dsvy-footer-contact-info-wrap,
.site-content .dsvy_widget_list_all_posts ul>li.dsvy-post-active a,
.dsvy-testimonial-style-3 .designervily-box-title,
.dsvy-subheading-skincolor .dsvy-heading-subheading .dsvy-element-subtitle,
.dsvy-testimonial-style-2 .dsvy-base-icon-star.dsvy-active,
.dsvy-blog-meta-top .dsvy-meta i,
.dsvy-elementor-bg-color-blackish.dsvy-text-color-white .dsvy-heading-subheading .dsvy-element-subtitle,
.dsvy-team-style-2 .designervily-box-team-position,
.dsvy-ihbox-style-7 .dsvy-ihbox-icon-wrapper,
.dsvy-team-single-style-1 .dsvy-team-designation,
.dsvy-blog-classic blockquote:before,
.site-content .dsvy_widget_list_all_posts ul > li a:before,
.lyfpro_recent_posts_widget .dsvy-rpw-content .dsvy-rpw-date a,
.dsvy-blc-style-1 blockquote:before,
.elementor-icon-list-item i,
.dsvy-ihbox-style-6 .dsvy-ihbox-box-number,
.dsvy-pricing-table-box .dsvy-ptable-line i,
.dsvy-meta-line i,
.dsvy-search-results-right .dsvy-read-more-link a,
.dsvy-blog-classic-inner .dsvy-read-more-link a,
.dsvy-blog-style-2 .dsvy-read-more-link a,
.dsvy-blog-style-1 .dsvy-read-more-link a,
.dsvy-sortable-list a.dsvy-selected,
.dsvy-team-style-1 .designervily-box-team-position,
.dsvy-testimonial-style-3 .designervily-box-desc:after,
.dsvy-testimonial-style-1 .dsvy-base-icon-star.dsvy-active,
.dsvy-service-style-2 .dsvy-service-icon-wrapper i,
.dsvy-service-cat,
.dsvy-service-cat a,
.dsvy-port-cat,
.dsvy-port-cat a,
.designervily-ele-fid-style-1 .dsvy-fid sup,
.designervily-ele-fid-style-1 .dsvy-sbox-icon-wrapper i,
.dsvy-ihbox-style-3 .dsvy-ihbox-icon-wrapper i,
.dsvy-ihbox-style-4 .dsvy-ihbox-icon-wrapper i,
.dsvy-ihbox-style-5 .dsvy-ihbox-icon-wrapper i,
.dsvy-ihbox-style-2 .dsvy-ihbox-icon-wrapper i,
.dsvy-blog-style-2 .dsvy-meta-container .dsvy-meta-line .dsvy-meta-category:hover i{
	color: <?php echo esc_attr($global_color); ?>;
}
.footer-social-links .dsvy-social-links li a:hover,
.dsvy-header-style-4:after,
.dsvy-element-testimonial-style-3.designervily-element-viewtype-carousel .owl-carousel button.owl-dot.active,
.dsvy-form-style-1 .input-button button,
.dsvy-footer-widget .dsvy-newsletter button,
.dsvy-footer-contact-info-inner i,
.elementor-widget-progress .elementor-progress-wrapper .elementor-progress-bar,
.dsvy-service-style-3:hover .designervily-box-content,
.dsvy-form-style-1 input[type=submit],
.dsvy-single-project-details-list,
.dsvy-btn-style-outline .elementor-button:hover,
.dsvy-element-testimonial-style-2.designervily-element-viewtype-carousel .owl-carousel .owl-nav button.owl-next:hover,
.dsvy-element-testimonial-style-2.designervily-element-viewtype-carousel .owl-carousel .owl-nav button.owl-prev:hover,
.dsvy-ptable-btn a:hover,
.dsvy-element-testimonial-style-1.designervily-element-viewtype-carousel .owl-carousel button.owl-dot.active,
.dsvy-blog-classic .dsvy-meta-date-wrapper,
.dsvy-heading-subheading .dsvy-element-subtitle:before,
.dsvy-team-style-2 .designervily-box-social-links ul,
.dsvy-btn-style-outline.dsvy-btn-color-globalcolor .elementor-button .elementor-button-content-wrapper:before,
.dsvy-team-single .dsvy-team-social-links a,
.widget .download .item-download a,
.designervily-sidebar .widget.widget_search,
.site-content .dsvy_widget_list_all_posts ul > li a:after,
.dsvy-pricing-table-featured-col .dsvy-ptable-btn a,
.dsvy-blog-style-1 .dsvy-meta-date-wrapper,
.dsvy-blog-style-2 .dsvy-meta-date-wrapper,
.dsvy-search-results-right .dsvy-read-more-link a span:after,
.dsvy-blog-classic-inner .dsvy-read-more-link a span:after,
.dsvy-blog-style-2 .dsvy-read-more-link a span:after,
.dsvy-blog-style-1 .dsvy-read-more-link a span:after,
.dsvy-team-style-1 .dsvy-team-social-links li a,
.dsvy-service-style-1 .dsvy-service-icon-wrapper,
.dsvy-service-cat:before,
.dsvy-port-cat:before,
.dsvy-fld-active .designervily-ele-fid-style-1,
.dsvy-ihbox-style-1,
.dsvy-static-box-style-1 .dsvy-contentbox,
.dsvy-static-box-style-2 .dsvy-contentbox,
.dsvy-ihbox-style-3 .dsvy-heading-desc ul li:before{
	background-color: <?php echo esc_attr($global_color); ?>;
}

.dsvy-btn-style-outline.dsvy-btn-color-globalcolor .elementor-button:hover{
	background-color: <?php echo esc_attr($global_color); ?> !important;
}

.dsvy-portfolio-style-1 .designervily-post-content:after{
	background-color: <?php echo dsvy_hex2rgb($global_color, '0.90') ?>;
}

.dsvy-service-style-1:hover .designervily-post-item,
.dsvy-service-style-2:hover .designervily-post-item,
.dsvy-element-testimonial-style-2.designervily-element-viewtype-carousel .owl-carousel .owl-nav button.owl-next:hover,
.dsvy-element-testimonial-style-2.designervily-element-viewtype-carousel .owl-carousel .owl-nav button.owl-prev:hover,
.dsvy-blc-style-2 blockquote{
	border-color: <?php echo esc_attr($global_color); ?>;
}
.dsvy-pricing-table-featured-col .dsvy-pricing-table-box:before{
	border-top: 48px solid <?php echo esc_attr($global_color); ?>;
    border-right: 50px solid <?php echo esc_attr($global_color); ?>;
}

/* --------------------------------------
* Secondary color
* ---------------------------------------*/

.dsvy-blog-classic-inner .dsvy-read-more-link a:hover span:after,
.dsvy-blog-style-1 .dsvy-read-more-link a:hover span:after,
.dsvy-element-testimonial-style-3.designervily-element-viewtype-carousel .owl-carousel button.owl-dot,
.dsvy-form-style-1 .input-button button:hover:before,
.dsvy-team-single .dsvy-team-social-links a:hover,
.dsvy-team-single-style-1 .dsvy-team-single-info:after,
.dsvy-pricing-table-featured-col .dsvy-ptable-btn a:hover span:after,
.quote-form input[type=submit]:hover,
.reply a,
.dsvy-btn-style-outline.dsvy-btn-color-blackish .elementor-button .elementor-button-content-wrapper:before,
.widget.widget_search .search-form button,
.dsvy-pricing-table-featured-col .dsvy-pricing-table-box .designervily-ptable-heading,
.dsvy-pricing-table-featured-col .dsvy-pricing-table-box,
.dsvy-ihbox-style-3:hover,
.dsvy-secondary-color{
	background-color: <?php echo esc_attr($secondary_color); ?>;
}


.dsvy-blog-classic-inner .dsvy-read-more-link a:hover,
.dsvy-blog-style-1 .dsvy-read-more-link a:hover,
.dsvy-testimonial-style-2 blockquote,
.dsvy-form-style-1 .input-button button:hover,
.elementor-progress-percentage,
.dsvy-form-style-1 input[type=submit]:hover,
.dsvy-testimonial-style-2 .designervily-box-title,
.dsvy-pricing-table-featured-col .dsvy-ptable-btn a:hover,
.quote-form input[type=submit],
.dsvy-blogbox-style-1 .dsvy-read-more-link a span:after{
	color: <?php echo esc_attr($secondary_color); ?>;
}

.test-color{
	border-color: <?php echo esc_attr($secondary_color); ?>;
}

/* --------------------------------------
 * Blackish color
 * ---------------------------------------*/
/* Lyfpro Special */
.dsvy-text-color-white .widget_archive ul li span,
.site-footer .widget_categories ul li span,
.dsvy-elementor-bg-color-blackish .elementor-widget-button.dsvy-btn-color-globalcolor .elementor-button:hover,
.dsvy-vertical-text .elementor-heading-title span{
	color: <?php echo esc_attr($blackish_color); ?>;
}

.dsvy-elementor-bg-color-blackish .elementor-widget-button.dsvy-btn-color-globalcolor .elementor-button:hover span:before,
.test-bg-color{
	background-color: <?php echo esc_attr($blackish_color); ?>;
} 
.single-service-contact:after{
	background-color: <?php echo dsvy_hex2rgb($blackish_color, '0.85') ?>;
}

.dsvy-heaing-style-1.dsvy-blackish .dsvy-heading-subheading{
	border-left-color:  <?php echo dsvy_hex2rgb($blackish_color, '0.15') ?>;
}

.site-footer.dsvy-bg-color-blackish.dsvy-bg-image-yes {
	background-color: <?php echo esc_attr($blackish_color); ?> !important;
}
.site-footer.dsvy-bg-color-blackish.dsvy-bg-image-yes:before {
    background-color: transparent!important;
}

/* --------------------------------------
 * Light color
 * ---------------------------------------*/
 .ihbox-style-2-light .dsvy-ihbox-style-2 .dsvy-ihbox-box-number,
.dsvy-team-single-info,
.dsvy-ihbox-style-4,
input[type="number"], input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="url"], input[type="search"], textarea,
.designervily-sidebar .widget,
.test-bg-color{
	background-color: <?php echo esc_attr($light_bg_color); ?>;
}

.test-bg-color{
	color: <?php echo esc_attr($light_bg_color); ?>;
}

/* --------------------------------------
 * Gradient color 
 * ---------------------------------------*/
.testbg{
	background-image: -ms-linear-gradient(right, <?php echo esc_attr($gradient_first); ?> 0%, <?php echo esc_attr($gradient_last); ?> 100%);
	background-image: linear-gradient(to right, <?php echo esc_attr($gradient_first); ?> , <?php echo esc_attr($gradient_last); ?> );
}

/*====================================  woocommerce  ====================================*/
.woocommerce-info, .woocommerce-message{
	border-top-color: <?php echo esc_attr($global_color); ?>;
}
.woocommerce-info::before,
.woocommerce ul.cart_list li ins,
.woocommerce ul.product_list_widget li ins{
	color: <?php echo esc_attr($global_color); ?>;
}
.single-product .entry-summary .product_meta .posted_in, 
.single-product .entry-summary .product_meta .sku_wrapper{
	color: <?php echo esc_attr($blackish_bg_color); ?>;
}
.woocommerce-product-search [type=submit],
.widget_product_search .woocommerce-product-search button,
.woocommerce-form-coupon button[type=submit]:hover, 
.woocommerce #payment #place_order, 
.woocommerce-page #payment #place_order,
.woocommerce #review_form #respond .form-submit input,
.woocommerce .woocommerce-error .button:hover, 
.woocommerce .woocommerce-info .button:hover, 
.woocommerce .woocommerce-message .button:hover, 
.woocommerce-page .woocommerce-error .button:hover, 
.woocommerce-page .woocommerce-info .button:hover, 
.woocommerce-page .woocommerce-message .button:hover,
.woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range,
.woocommerce .widget_shopping_cart .buttons a:not(.wcppec-cart-widget-button), 
.woocommerce.widget_shopping_cart .buttons a:not(.wcppec-cart-widget-button),
.woocommerce .widget_price_filter .price_slider_amount .button,
.woocommerce .cart .button, 
.woocommerce .cart input.button,
#add_payment_method .wc-proceed-to-checkout a.checkout-button, 
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, 
.woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,
.woocommerce div.product form.cart .button,
.woocommerce div.product .woocommerce-tabs ul.tabs li a,
.woocommerce ul.products li.product .button{
	background-color: <?php echo esc_attr($global_color); ?>;
}

.widget_product_categories ul li .count,
.woocommerce-form-coupon button[type=submit],
.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
.woocommerce .widget_price_filter .price_slider_amount .button:hover,
.woocommerce #review_form #respond .form-submit input:hover,
.woocommerce .woocommerce-error .button, 
.woocommerce .woocommerce-info .button, 
.woocommerce .woocommerce-message .button, 
.woocommerce-page .woocommerce-error .button, 
.woocommerce-page .woocommerce-info .button, 
.woocommerce-page .woocommerce-message .button,
.woocommerce .woocommerce-error .button:hover, 
.woocommerce .woocommerce-info .button:hover, 
.woocommerce .woocommerce-message .button:hover, 
.woocommerce-page .woocommerce-error .button:hover, 
.woocommerce-page .woocommerce-info .button:hover, 
.woocommerce-page .woocommerce-message .button:hover,
.woocommerce .cart .button:hover, 
.woocommerce .cart input.button:hover, 
#add_payment_method .wc-proceed-to-checkout a.checkout-button:hover, 
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, 
.woocommerce-checkout .wc-proceed-to-checkout a.checkout-button:hover, 
.woocommerce div.product form.cart .button:hover,  
.woocommerce ul.products li.product .button:hover{
	background-color: <?php echo esc_attr($blackish_bg_color); ?>;
}

.woocommerce-info,
.woocommerce-message {
    border-top-color: <?php echo esc_attr($global_color); ?>;
}

/*====================================  End Dynamic color  ====================================*/

/* * * * *  MENU AND BREAKPOINT CSS  * * * * * */
/*====================================  Max Width for dynamic breakpoint  ====================================*/
@media (max-width: <?php echo esc_attr($responsive_breakpoint); ?>px){

	.dsvy-header-style-3 .dsvy-header-top-area > .container > .d-flex,
	.dsvy-header-top-area > .container{
		position: relative;
	}

	.dsvy-header-info-inner,
	.something{
		display: none;
	}
	.navbar-expand-lg .navbar-nav{
		-ms-flex-direction: unset !important;
		flex-direction: unset !important;
	}
	.dsvy-header-menu-area-inner,
	.dsvy-navbar{
	    display: block !important;
	}
	.nav-menu-toggle{
	    display: block;
	    position: absolute;
	    right: 0px;
	    top: 50%;
	    -webkit-transform: translateY(-50%);
	    -ms-transform: translateY(-50%);
	    transform: translateY(-50%);
	    background-color: transparent;
	    padding: 0;
	    font-size: 35px;
	    line-height: 35px;
	    color: #2c2c2c;
	    width: 40px;
	}
	.dsvy-navbar > div{
		background-color: #fff;
	}
	.sub-menu{
		display: none;
	}
	.dsvy-header-menu-area-wrapper{
		min-height: auto !important;
	}
	.closepanel{
		position: absolute;
		z-index: 99;
		right: 35px;
		top: 25px;
		display: block;
		width: 30px;
		height: 30px;
		line-height: 30px;		
		border-radius: 50%;
		text-align: center;
		cursor: pointer;
		font-size: 35px;
		color: #fff;
	}
	.admin-bar .closepanel{
		top: 45px;
	}
	
	/* Responsive menu */
	.dsvy-navbar > div {
	    background-color: #fff;
	    position: fixed;
		top: 0;
		right: 0;
	    z-index: 1000;
	    width: 300px;
	    height: 100%;
	    padding: 0;
	    display: block;
	    background-color: #222;
	    -webkit-transition: transform 0.4s ease;
	    transition: transform 0.4s ease;
	    -webkit-transform: translateX(400px);
	    -ms-transform: translateX(400px);
	    transform: translateX(400px);
	    -webkit-backface-visibility: hidden;
	    backface-visibility: hidden;
	    visibility: hidden;
	    opacity: 0
	}
	.dsvy-navbar > div.active {
	    -webkit-transform: translateX(0);
	    -ms-transform: translateX(0);
	    transform: translateX(0);
	    visibility: visible;
	    opacity: 1;
		overflow-y: scroll;
	}
	.dsvy-navbar > div > ul{
		padding: 90px 0;
	}
	.dsvy-navbar > div > ul li a {
	    color: #fff !important;
	    padding: 15px 25px;
	    height: auto;
	    display: inline-block;
	}
	.dsvy-navbar > div > ul ul {
	    padding-left: 1em;
	    overflow: hidden;
	    display: none;
	}
	ul .sub-menu.show,
	ul .children.show {
	    display: block;
	}
	.dsvy-navbar li{
		position: relative;
	}
	.dsvy-navbar ul.menu > li{
		border-bottom: 1px solid rgba(204, 204, 204, 0.10);
	}
	.sub-menu-toggle{
	    display: block;
	    position: absolute;
	    right: 25px;
	    top: 15px;
	    cursor: pointer;
	    color: rgba(255, 255, 255, 0.80);
	}
	.dsvy-navbar ul ul{
		background-color: transparent !important;
	}

	.dsvy-header-style-2 .dsvy-header-content {
		margin: 0 15px;		
	}

	/* Reset Sticky */
	.dsvy-header-style-4 .dsvy-header-wrapper.dsvy-sticky-on,
	.dsvy-header-style-1 .dsvy-header-wrapper.dsvy-sticky-on{
		position: static !important;
		width: auto !important;
	}
	.dsvy-header-style-4 .dsvy-header-wrapper > .container > .d-flex,
	.dsvy-header-style-1 .dsvy-header-wrapper > .container > .d-flex{
		position: relative;
	}
	.dsvy-header-style-4 .dsvy-header-search-btn,
	.dsvy-header-style-1 .dsvy-header-search-btn {	
	    position: absolute;
	    right: 60px;
	}
	.dsvy-header-style-2 .nav-menu-toggle{
		color: <?php echo esc_attr($main_menu_typography['color']); ?>;
	}
	.home .dsvy-header-style-4 .dsvy-social-links,
	.dsvy-header-style-3 .dsvy-header-button,
	.dsvy-header-style-4:before,
	.dsvy-header-style-4:after,
	.dsvy-header-style-4 .dsvy-social-links,
	.dsvy-header-style-4 .dsvy-right-box,
	.dsvy-header-style-3 .dsvy-right-box,
	.dsvy-header-style-2 .dsvy-right-box,
	.dsvy-header-style-1 .dsvy-right-box{
		display: none;
	}

	.dsvy-mobile-search{
		display: block;
	}
	.dsvy-mobile-search .dsvy-header-search-btn{
		display: block;
		position: absolute;
		right: 60px;
		top: 50%;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
	}
	/*=== Responsive Logo ===*/
	.dsvy-responsive-logo-yes .dsvy-sticky-logo,
	.dsvy-responsive-logo-yes .dsvy-main-logo{
		display: none;
	}
	.dsvy-responsive-logo-yes .dsvy-responsive-logo{
		display: inline-block;
	}
	/*=== Responsive header background color ===*/
	.dsvy-responsive-header-bgcolor-globalcolor .dsvy-header-wrapper{
		background-color: <?php echo esc_attr($global_color); ?> !important;
	}
	.dsvy-responsive-header-bgcolor-white .dsvy-header-wrapper{
		background-color: #fff !important;
	}
	.dsvy-responsive-header-bgcolor-blackish .dsvy-header-wrapper{
		background-color: #222 !important;
	}
	.dsvy-cart-wrapper{
		display: none !important
	}
}
/*====================================  End Max Break Point  ====================================*/
/*====================================  Min Width for dynamic breakpoint  ====================================*/
@media (min-width: <?php echo esc_attr($responsive_breakpoint); ?>px) {
	.dsvy-responsive-logo{
		display: none;
	}
	.nav-menu-toggle,
	.something{
		display: none;
	}
	.dsvy-sticky-on .site-title img.dsvy-main-logo,
	.site-title img.dsvy-sticky-logo{
		max-height: <?php echo esc_attr($sticky_logo_height); ?>px;
	}
	.dsvy-sticky-on.dsvy-header-wrapper{
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}
	.dsvy-navbar > div > ul > li,
	.dsvy-navbar > div > ul > li > a{
	    line-height: <?php echo esc_attr($header_height); ?>px !important;
	    height: <?php echo esc_attr($header_height); ?>px;
	}
	.dsvy-sticky-on .dsvy-navbar > div > ul > li,
	.dsvy-sticky-on .dsvy-navbar > div > ul > li > a,
	.dsvy-sticky-on .site-title {
	    line-height: <?php echo esc_attr($sticky_header_height); ?>px !important;
	    height: <?php echo esc_attr($sticky_header_height); ?>px;
	}
	.dsvy-navbar ul > li > ul > li.current-menu-item > a,
	.dsvy-navbar ul > li > ul li.current_page_item > a,
	.dsvy-navbar ul > li > ul li.current_page_ancestor > a,
	.dsvy-navbar > div > ul > li:hover > a,
	.dsvy-navbar > div > ul > li.current_page_item > a,
	.dsvy-navbar > div > ul > li.current-menu-parent > a {
	   color: <?php echo esc_attr($global_color); ?>;
	}
	.dsvy-navbar ul > li > ul li.current_page_item > a:before,
	.dsvy-navbar ul > li > ul li.current_page_ancestor > a:before,
	.dsvy-navbar ul > li > ul li.current_page_parent > a:before{
		 background-color: <?php echo esc_attr($global_color); ?>;
	}
	.dsvy-navbar ul > li > ul li:hover > a {
	   color: #ffffff !important;
	}
	.dsvy-navbar > div > ul {
	   position: relative;
	   z-index: 597;
	}
	.dsvy-navbar > div > ul > li {
	   float: left;
	   min-height: 1px;
	   vertical-align: middle;
	   position: relative;
	}
	.dsvy-navbar > div > ul ul {
	   visibility: hidden;
	   position: absolute;
	   top: 100%;
	   left: 0;
	   z-index: 598;
	}
	.dsvy-navbar ul > li:hover > ul{
		z-index: 600;
	}
	.dsvy-navbar > div > ul li ul.dsvy-nav-left{
	    left: inherit;
	    right: 0;		
	}
	.dsvy-navbar > div > ul li ul ul.dsvy-nav-left{
	    left: -100%;
	    right: 0;
	}	
	.dsvy-navbar > div > ul ul li {
	   float: none;
	}
	.dsvy-navbar > div > ul ul ul {
	   top: 0;
	   left: 100%;
	   width: 190px;
	}
	.dsvy-navbar > div > ul ul {
	  margin-top: 0;
	}
	.dsvy-navbar > div > ul ul li {
	    font-weight: normal;
	}
	.dsvy-navbar a {
	    display: block;
	    line-height: 1em;
	    text-decoration: none;
	}
	.dsvy-navbar > div > ul ul li:hover > a{
		background-color: <?php echo esc_attr($global_color); ?>;
	}
	/* Custom CSS Styles */
	.dsvy-navbar > ul {
	  *display: inline-block;
	}
	.dsvy-navbar:after,
	.dsvy-navbar ul:after {
	   content: '';
	   display: block;
	   clear: both;
	}
	.dsvy-navbar ul {
	   text-transform: uppercase;
	}
	.dsvy-navbar ul ul {
		min-width: 270px;
		opacity: 0;
		visibility: hidden;
		-webkit-transition: all 0.3s linear 0s;
		transition: all 0.3s linear 0s;
		box-shadow: 0px 10px 40px rgba(0,0,0,0.20);
		border-top: 3px solid <?php echo esc_attr($global_color); ?>;
	}
	.dsvy-navbar ul > li:hover > ul {
	    visibility: visible;
	    opacity: 1;
	}
	.dsvy-navbar ul > li > ul > li > a{
	   padding: 15px 30px;
	}
	.dsvy-navbar ul > li > ul > li:hover > a{
		padding-left: 40px;
	}
	.dsvy-navbar ul > li > ul > li > a:before {
	    position: absolute;
	    content: '';
	    left: 18px;
	    top: 24px;
	    width: 0px;
	    height: 2px;
	    background-color: transparent;
	    -webkit-transition: all .500s ease-in-out;
	    transition: all .500s ease-in-out;
	}
	.dsvy-navbar ul > li > ul > li:hover >a:before{
		background-color: rgba(255, 255, 255, 0.50);
		width: 10px;
	}
	.dsvy-navbar ul ul a {
	   border-bottom: 1px solid rgba(0, 0, 0, 0.10);
	   border-top: 0 none;
	   line-height: 150%;
	   padding: 16px 20px;
	}
	.dsvy-navbar ul ul ul {
	   border-top: 0 none;
	}
	.dsvy-navbar ul ul li {
	   position: relative;
	}
	.dsvy-navbar ul li.last ul {
	    left: auto;
	    right: 0;
	}
	.dsvy-navbar ul li.last ul ul {
	   left: auto;
	   right: 99.5%;
	}
	.dsvy-navbar div > ul > li > a{
	    margin: 0 20px;
	}
	/* Dropdown Menu ( Globalcolor )*/
	.dsvy-navbar.dsvy-dropdown-active-color-globalcolor ul > li > ul > li.current-menu-item > a, 
	.dsvy-navbar.dsvy-dropdown-active-color-globalcolor ul > li > ul li.current_page_item > a, 
	.dsvy-navbar.dsvy-dropdown-active-color-globalcolor ul > li > ul li.current_page_ancestor > a,
	/* Main Menu ( Globalcolor )*/
	.dsvy-navbar.dsvy-main-active-color-globalcolor > div > ul > li:hover > a, 
	.dsvy-navbar.dsvy-main-active-color-globalcolor > div > ul > li.current_page_item > a, 
	.dsvy-navbar.dsvy-main-active-color-globalcolor > div > ul >li.current-menu-parent > a{
	    color: <?php echo esc_attr($global_color); ?>;
	}
	/* Dropdown Menu ( Secondarycolor )*/
	.dsvy-navbar.dsvy-dropdown-active-color-secondarycolor ul > li > ul > li.current-menu-item > a, 
	.dsvy-navbar.dsvy-dropdown-active-color-secondarycolor ul > li > ul li.current_page_item > a, 
	.dsvy-navbar.dsvy-dropdown-active-color-secondarycolor ul > li > ul li.current_page_ancestor > a,
	/* Main Menu ( Secondarycolor )*/
	.dsvy-navbar.dsvy-main-active-color-secondarycolor > div > ul > li:hover > a, 
	.dsvy-navbar.dsvy-main-active-color-secondarycolor > div > ul > li.current_page_item > a, 
	.dsvy-navbar.dsvy-main-active-color-secondarycolor > div > ul >li.current-menu-parent > a{
	    color: <?php echo esc_attr($secondary_color); ?>;
	}
	.dsvy-header-menu-area .dsvy-navbar div > ul > li,
	.dsvy-header-menu-area .dsvy-navbar div > ul > li > a,
	.dsvy-header-menu-area{
		height: 70px;
		line-height: 70px !important;
	}
	.dsvy-header-menu-area.dsvy-sticky-on .dsvy-navbar div > ul > li,
	.dsvy-header-menu-area.dsvy-sticky-on .dsvy-navbar div > ul > li > a,
	.dsvy-header-menu-area.dsvy-sticky-on{
		height: 70px;
		line-height: 70px !important;
	}
	.dsvy-header-menu-area{
	    position: relative;
	    z-index: 10;
	}
	/*=== dsvy-header-style-1 ===*/
	.dsvy-header-style-1 .dsvy-navbar div > ul > li > a{
		margin: 0 15px;
	}
	.dsvy-header-style-1 .dsvy-navbar.dsvy-bigger-menu div > ul > li > a{
		margin: 0 10px;
	}
	.dsvy-header-style-1 .dsvy-right-box {
	    margin-left: 10px;
	    display: flex;
	}
	.dsvy-header-style-1 .dsvy-logo-menuarea {
		display: -ms-flexbox!important;
		display: flex!important;
		display: -ms-flexbox!important;
		display: flex!important;
		-webkit-flex: 1;
		-ms-flex: 1;
		flex: 1;
		-webkit-box-pack: justify!important;
		-ms-flex-pack: justify!important;
		justify-content: space-between!important;
	}
	.dsvy-header-style-1 .dsvy-header-button {
		line-height: normal;
	}
	.dsvy-header-style-1 .dsvy-header-button a{
		color: <?php echo esc_attr($blackish_color); ?>;
		height: 100%;
		display: inline-block;
	    padding: 0 60px;
	    vertical-align: middle;
	    padding-right: 8px;	   
		font-weight: normal;
		font-size: 16px;
		position: relative;
		border-radius: 6px;
		letter-spacing: 1px;
		-webkit-transition: all .25s ease-in-out;
    	transition: all .25s ease-in-out;
	}
	.dsvy-header-style-1 .dsvy-header-button a:after {
	    content: "\e83f";
	    font-family: "designervily-base-icons";	   
	    font-size: 45px;
	    line-height: 45px;
	    top: 3px;
	    position: absolute;
	    left: 0;	   
	    color: <?php echo esc_attr($global_color); ?>;
	    font-weight: normal;
	}
	.dsvy-header-style-1 .dsvy-header-button a span{
		display: block;
	}
	.dsvy-header-style-1 .dsvy-header-button .dsvy-header-button-text-1{
		font-weight: 700;		
		margin-bottom: 5px;
	}
	.dsvy-header-style-1 .dsvy-header-button{
		line-height: normal;
	}
	.dsvy-header-style-1 .dsvy-sticky-on .dsvy-header-button a{
		color: <?php echo esc_attr($blackish_color); ?>;		
	}

	/*=== .dsvy-header-style-2 ===*/
	.dsvy-header-style-2 .dsvy-pre-header-wrapper .container{
		max-width: none;
		padding: 0 50px
	}
	.dsvy-header-style-2 .site-branding.dsvy-logo-area {
	    margin-right: 30px;
	}
	.dsvy-header-style-2 .dsvy-logo-menuarea{
		display: -ms-flexbox!important;
		display: flex!important;
		-webkit-box-pack: justify!important;
		-ms-flex-pack: justify!important;
		justify-content: space-between!important;
	}
	.dsvy-header-style-2 .dsvy-right-box{
	    margin-left: 10px;
	    display: flex;
	    align-items: center;
	}
	.dsvy-header-style-2 .dsvy-right-box{
		line-height: <?php echo esc_attr($header_height); ?>px !important;
		height: <?php echo esc_attr($header_height); ?>px;
	}
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-right-box{
		line-height: <?php echo esc_attr($sticky_header_height); ?>px !important;
		height: <?php echo esc_attr($sticky_header_height); ?>px;
	}

	.dsvy-header-style-2 .dsvy-bg-color-transparent .dsvy-header-button{
		border-left: 1px solid rgba(255, 255, 255, 0.23);
	}

	.dsvy-header-style-2 .dsvy-bg-color-transparent.dsvy-sticky-on .dsvy-header-button{
		border-left: 1px solid rgba(0, 0, 0, 0.13);
	}

	.dsvy-header-style-2 .dsvy-header-button a{
		color: #fff;		
		height: 100%;
		display: inline-block;
	    padding: 0 70px;
		padding-right: 8px;	   
		vertical-align: middle;
		font-weight: normal;
		font-size: 16px;
		position: relative;
		border-radius: 6px;
		letter-spacing: 1px;
		line-height: normal;
		-webkit-transition: all .25s ease-in-out;
    	transition: all .25s ease-in-out;
	}
	.dsvy-header-style-2 .dsvy-header-button a:after {
	    content: "\E847";
	    font-family: "designervily-base-icons";	   
	    font-size: 60px;
	    line-height: 60px;
	    top: -2px;
	    position: absolute;
	    left: 0;	   
	    color: <?php echo esc_attr($global_color); ?>;
	    font-weight: normal;
	}
	.dsvy-header-style-2 .dsvy-header-button a span{
		display: block;
	}
	.dsvy-header-style-2 .dsvy-header-button .dsvy-header-button-text-1{
		font-size: 20px;
		font-weight: 700;		
		margin-bottom: 5px;
	}
	.dsvy-header-style-2 .dsvy-header-button .dsvy-header-button-text-2{
		font-size: 20px;
		font-weight: 500;				
	}

	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-header-button a{
		color: <?php echo esc_attr($blackish_color); ?>;		
	}

	.dsvy-header-style-2 .navigation-top{
	  margin-left: auto!important;
	}
	.dsvy-header-style-2  .dsvy-navbar div > ul > li > a {
	    margin: 0 10px;
	}

	.dsvy-header-style-2 .dsvy-right-box .dsvy-cart-wrapper, 
	.dsvy-header-style-2 .dsvy-right-box .dsvy-header-search-btn {
	    display: flex;
	    align-items: center;
	    margin-right: 30px;
	}
	.dsvy-header-style-2 .dsvy-right-box .dsvy-cart-wrapper{
		margin-right: 20px;
	}

	.dsvy-header-style-2 .dsvy-title-bar-content{
		padding-top: 180px;
	}

	.dsvy-header-style-2 .dsvy-right-box .dsvy-cart-link,
	.dsvy-header-style-2 .dsvy-header-search-btn a{
		font-size: 18px;
	}

	/*** Custom Menu text color ***/
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-right-box .dsvy-cart-link,
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-header-search-btn a,
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-navbar div > ul > li > a{
		color: <?php echo esc_attr($main_menu_sticky_color); ?>;
	}
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-pre-header-wrapper{
		height: 0;
		line-height: 0;
		display: none;
	}
	.dsvy-header-style-2 .dsvy-navbar.dsvy-main-active-color-globalcolor > div > ul > li.current_page_item > a, 
	.dsvy-header-style-2 .dsvy-navbar.dsvy-main-active-color-globalcolor > div > ul > li.current-menu-parent > a{
		color: <?php echo esc_attr($global_color); ?>;
	}
	.dsvy-header-style-2 .dsvy-navbar.dsvy-main-active-color-blackish > div > ul > li.current_page_item > a, 
	.dsvy-header-style-2 .dsvy-navbar.dsvy-main-active-color-blackish  > div > ul > li.current-menu-parent > a{
		color: #232323;
	}
	.dsvy-header-style-2 .dsvy-navbar.dsvy-main-active-color-white > div > ul > li.current_page_item > a, 
	.dsvy-header-style-2 .dsvy-navbar.dsvy-main-active-color-white  > div > ul > li.current-menu-parent > a{
		color: #fff;
	}
	.dsvy-header-style-2 .dsvy-navbar.dsvy-main-active-color-secondarycolor > div > ul > li.current_page_item > a, 
	.dsvy-header-style-2 .dsvy-navbar.dsvy-main-active-color-secondarycolor  > div > ul > li.current-menu-parent > a{
		color: #eee;
	}
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-navbar > div > ul > li.current_page_item > a, 
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-navbar  > div > ul > li.current-menu-parent > a{
		color: <?php echo esc_attr($global_color); ?>;
	}

	<?php if( !empty($main_menu_typography['color']) ){
		?>
		.dsvy-header-style-2 .dsvy-header-button a,
		.dsvy-header-style-2 .dsvy-right-box .dsvy-cart-link,
		.dsvy-header-style-2  .dsvy-header-search-btn a {
			color: <?php echo esc_attr($main_menu_typography['color']); ?>;
		}
		<?php
	}
	?>

	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-header-button a,
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-right-box .dsvy-cart-link,
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-header-search-btn a {
		color: <?php echo esc_attr($main_menu_sticky_color); ?>;
	}

	.dsvy-header-style-2 .dsvy-social-links li a{
		color: <?php echo esc_attr($main_menu_typography['color']); ?>;
	}

	/*=== Cart design ===*/
	.dsvy-header-style-2 .dsvy-cart-wrapper span.dsvy-cart-icon {
		font-size: 20px;
	}
	.dsvy-header-style-2 .dsvy-cart-wrapper{
		padding-right: 25px;
		line-height: normal;
		padding-top: 20px;
		padding-bottom: 20px;
		margin-right: 25px;
		position: relative;
	}
	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-social-links li a{
		color:  <?php echo esc_attr($main_menu_sticky_color); ?>;
	}
	.dsvy-header-style-2 .dsvy-cart-wrapper .dsvy-cart-count{
		position: absolute;
		background-color: <?php echo esc_attr($global_color); ?>;
		width: 20px;
		text-align: center;
		height: 20px;
		border-radius: 50%;
		left: 8px;
		top: 4px;
		font-size: 11px;
		line-height: 20px;
		font-weight: 700;
		-webkit-transition: all .25s ease-in-out;
		transition: all .25s ease-in-out;
	}

	.dsvy-header-style-2 .dsvy-sticky-on .dsvy-cart-wrapper .dsvy-cart-count,
	.dsvy-header-style-2 .dsvy-cart-wrapper .dsvy-cart-link:hover .dsvy-cart-count{
		color: #fff;
		background-color: <?php echo esc_attr($blackish_color); ?>;
	}


	/*==== dsvy-header-style-3 ====*/
	.dsvy-header-style-3 .dsvy-right-box .dsvy-header-search-form-wrapper{
		border-right: 1px solid  rgba(0, 0, 0, 0.10);
	}
	.dsvy-header-style-3 .dsvy-right-box .dsvy-header-search-form-wrapper{
		border-left: 1px solid  rgba(0, 0, 0, 0.10);
	}

	.dsvy-header-style-3 .dsvy-header-button{
		margin-right: 15px;
	}
	.dsvy-header-style-3 .dsvy-header-button a{
		color: #fff;		
		height: 100%;
		display: inline-block;
		padding: 0 30px;		
	    vertical-align: top;	  
	    line-height: 70px;
	    height: 70px;
		background-color: <?php echo esc_attr($blackish_bg_color); ?>;
	    text-transform: uppercase;
		font-weight: 600;
		font-size: 13px;
		position: relative;		
		letter-spacing: 1px;
		-webkit-transition: all .25s ease-in-out;
   		transition: all .25s ease-in-out;
	}
	.dsvy-header-style-3 .dsvy-header-info-inner .dsvy-header-box-icon i{
		color: <?php echo esc_attr($global_color); ?>;
	}
	.dsvy-header-style-3 .dsvy-header-search-btn a{
		display: inline-block;
		height: auto;
		padding: 0 20px;
		background-color: <?php echo esc_attr($global_color); ?>;;
		color: #fff;
	}
	.dsvy-header-style-3 .dsvy-header-menu-area.dsvy-bg-color-light{
		background-color: transparent;
	}
	.dsvy-header-style-3 .dsvy-header-menu-area.dsvy-bg-color-light .navigation-top-wrapper,
	.dsvy-header-style-3 .navigation-top-wrapper:after{
		background-color: #f9f9f9;
	}
	.dsvy-header-style-3 .dsvy-header-menu-area.dsvy-bg-color-light .navigation-top-wrapper{
		padding-left: 15px;
	}

	/* Cart design */
	.dsvy-header-style-3 .dsvy-cart-wrapper span.dsvy-cart-icon {
		font-size: 20px;
	}
	.dsvy-header-style-3 .dsvy-cart-wrapper{
		padding-right: 25px;
		line-height: normal;
		padding-top: 20px;
		padding-bottom: 20px;
		margin-right: 0px;
		position: relative;
		margin-left: 25px;
	}
	.dsvy-header-style-3 .dsvy-cart-wrapper a{
		color: <?php echo esc_attr($main_menu_typography['color']); ?>;
	}
	.dsvy-header-style-3 .dsvy-cart-wrapper a:hover{
		color:  <?php echo esc_attr($main_menu_sticky_color); ?>;
	}
	.dsvy-header-style-3 .dsvy-sticky-on  .dsvy-cart-wrapper:after{
		background-color:  <?php echo esc_attr($main_menu_sticky_color); ?>;		
		opacity: 0.15;
	}
	.dsvy-header-style-3 .dsvy-cart-wrapper .dsvy-cart-count{
		position: absolute;
		background-color: <?php echo esc_attr($blackish_color); ?>;
		color: #fff;
		width: 20px;
		text-align: center;
		height: 20px;
		border-radius: 50%;
		left: 8px;
		top: 4px;
		font-size: 11px;
		line-height: 20px;
		font-weight: 700;
		-webkit-transition: all .25s ease-in-out;
		transition: all .25s ease-in-out;
	}
	.dsvy-header-style-3 .dsvy-cart-wrapper .dsvy-cart-link:hover .dsvy-cart-count{
		color: #fff;
		background-color: <?php echo esc_attr($blackish_color); ?>;
	}
	.dsvy-header-style-3 .navigation-top-wrapper:after{
		content: '';
		width: 5000px;
		height: 70px;
		position: absolute;
		right: -5000px;
		top: 0;    
	}

	/*=== dsvy-header-style-4 ===*/
	.dsvy-header-style-4 .site-branding{
		margin-right: 90px;
	}
	.dsvy-header-style-4 .dsvy-navbar div > ul > li > a{
		margin: 0 15px;
	}
	.dsvy-header-style-4 .dsvy-navbar.dsvy-bigger-menu div > ul > li > a{
		margin: 0 10px;
	}
	.dsvy-header-style-4 .navigation-top{
	  margin-left: auto!important;
	}
	.dsvy-header-style-4 .dsvy-right-box {
		margin-left: 10px;
		display: flex;
		align-items: center;
	}
	.dsvy-header-style-4 .dsvy-logo-menuarea {
	    display: -ms-flexbox!important;
	    display: flex!important;
	}
	.dsvy-header-style-4 .dsvy-header-button {
		line-height: normal;
	}
	.dsvy-header-style-4 .dsvy-header-button a{
		color: #fff;
		height: 100%;
		display: inline-block;
	    padding: 0 60px;
	    vertical-align: middle;
	    padding-right: 8px;	   
		font-weight: normal;
		font-size: 16px;
		position: relative;
		border-radius: 6px;
		letter-spacing: 1px;
		-webkit-transition: none;
    	transition: none;
	}
	.dsvy-header-style-4 .dsvy-header-button a:before {
	    content: "\e848";
	    font-family: "designervily-base-icons";	   
	    font-size: 45px;
	    line-height: 45px;
	    top: 3px;
	    position: absolute;
	    left: 0;	   
	    color: #fff;
	    font-weight: normal;
	}
	.dsvy-header-style-4 .dsvy-header-button a span{
		display: block;
		-webkit-transition: all .25s ease-in-out;
		transition: all .25s ease-in-out;
	}
	.dsvy-header-style-4 .dsvy-header-button .dsvy-header-button-text-1{
		font-weight: 700;		
		margin-bottom: 5px;
	}
	.dsvy-header-style-4 .dsvy-header-button .dsvy-header-button-text-2{
		font-weight: 600;				
	}
	.dsvy-header-style-4 .dsvy-header-button{
		line-height: normal;
	}
	.dsvy-header-style-4 .dsvy-sticky-on .dsvy-header-button a{
		color: <?php echo esc_attr($blackish_color); ?>;		
	}

	.dsvy-header-style-4 .dsvy-right-box .dsvy-cart-wrapper a, 
	.dsvy-header-style-4 .dsvy-right-box .dsvy-header-search-btn a{
		margin-right: 30px;
		color: #fff;
		font-size: 22px;
	}
	.dsvy-header-style-4 .dsvy-right-box .dsvy-cart-wrapper a{
		margin-right: 45px;
		position: relative;
	}
	.dsvy-header-style-4 .dsvy-right-box .dsvy-cart-wrapper a:after{		
		position: absolute;
		content: '';
		height: 100%;
		width: 1px;
		background-color: #ffffff47;
		margin-left: 25px;
		margin-top: 5px;		
	}

	.dsvy-header-style-4 .dsvy-sticky-on .dsvy-right-box .dsvy-cart-wrapper a:after{	
		background-color: #00000047;	
	}

	.dsvy-header-style-4 .dsvy-sticky-on .dsvy-right-box .dsvy-cart-details .dsvy-cart-count{
		background-color: <?php echo esc_attr($main_menu_sticky_color); ?>;	
		color: #fff
	}

	.dsvy-header-style-4 .dsvy-sticky-on .dsvy-right-box .dsvy-cart-wrapper a, 
	.dsvy-header-style-4 .dsvy-sticky-on .dsvy-header-button a:before,
	.dsvy-header-style-4 .dsvy-sticky-on .dsvy-right-box .dsvy-header-search-btn a{		
		color:  <?php echo esc_attr($main_menu_sticky_color); ?>;	
	}

	.dsvy-header-style-4 .dsvy-right-box .dsvy-cart-details{
		position: relative;
	}
	.dsvy-header-style-4 .dsvy-right-box .dsvy-cart-details .dsvy-cart-count{
		position: absolute;
		background-color: #fff;
		color: <?php echo esc_attr($main_menu_typography['color']); ?>;
		border-radius: 50%;
		top: -18px;
		right: -2px;
		display: inline-block;
		height: 22px;
		width: 22px;
		line-height: 22px;
		text-align: center;
		font-size: 11px;
	}


}
/*====================================  End Min Break Point  ====================================*/

<?php if( !empty($preheader_responsive) ){ ?>
@media screen and (max-width: <?php echo esc_html($preheader_responsive); ?>px) {
	.dsvy-pre-header-wrapper{
		display: none;
	}
}
<?php } ?>
<?php
$footer_column	= dsvy_get_base_option('footer-column');
if( $footer_column=='custom' ) :
	$footer_column_1	= dsvy_get_base_option('footer-1-col-width');
	$footer_column_2	= dsvy_get_base_option('footer-2-col-width');
	$footer_column_3	= dsvy_get_base_option('footer-3-col-width');
	$footer_column_4	= dsvy_get_base_option('footer-4-col-width');
	?>
	@media screen and (min-width: 992px) {
		<?php if( !empty($footer_column_1) && $footer_column_1!='hide' ) : ?>
		.site-footer .dsvy-footer-widget.dsvy-footer-widget-col-1{
			-ms-flex: 0 0 <?php echo esc_attr($footer_column_1) ?>%;
			flex: 0 0 <?php echo esc_attr($footer_column_1) ?>%;
			max-width: <?php echo esc_attr($footer_column_1) ?>%;
		}
		<?php endif; ?>
		<?php if( !empty($footer_column_2) && $footer_column_2!='hide' ) : ?>
		.site-footer .dsvy-footer-widget.dsvy-footer-widget-col-2{
			-ms-flex: 0 0 <?php echo esc_attr($footer_column_2) ?>%;
			flex: 0 0 <?php echo esc_attr($footer_column_2) ?>%;
			max-width: <?php echo esc_attr($footer_column_2) ?>%;
		}
		<?php endif; ?>
		<?php if( !empty($footer_column_3) && $footer_column_3!='hide' ) : ?>
		.site-footer .dsvy-footer-widget.dsvy-footer-widget-col-3{
			-ms-flex: 0 0 <?php echo esc_attr($footer_column_3) ?>%;
			flex: 0 0 <?php echo esc_attr($footer_column_3) ?>%;
			max-width: <?php echo esc_attr($footer_column_3) ?>%;
		}
		<?php endif; ?>
		<?php if( !empty($footer_column_4) && $footer_column_4!='hide' ) : ?>
		.site-footer .dsvy-footer-widget.dsvy-footer-widget-col-4{
			-ms-flex: 0 0 <?php echo esc_attr($footer_column_4) ?>%;
			flex: 0 0 <?php echo esc_attr($footer_column_4) ?>%;
			max-width: <?php echo esc_attr($footer_column_4) ?>%;
		}
		<?php endif; ?>
	}
<?php endif; ?>
