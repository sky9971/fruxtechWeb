<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.2
 */
 // Class list
$progressbar_title = '';
$style		= dsvy_get_base_option('team-single-style');
$class_list	= 'container dsvy-team-single-style-'.$style;
// Team Member details
$designation	= get_post_meta( get_the_ID(), 'dsvy-team-details_designation', true ); 
if( !empty($designation) ){ $designation = '<h4 class="dsvy-team-designation">' . esc_attr($designation) . '</h4>'; }
// Email
$email			= get_post_meta( get_the_ID(), 'dsvy-team-details_email', true ); 
if( !empty($email) ){ $email = '<li><label>'.esc_html__('Email', 'lyfpro').'</label> <a href="mailto:' . sanitize_email($email) . '">' . esc_attr($email) . '</a></li>'; }
// Phone
$phone			= get_post_meta( get_the_ID(), 'dsvy-team-details_phone', true ); 
if( !empty($phone) ){ $phone = '<li><label>'.esc_html__('Phone', 'lyfpro').'</label> ' . esc_attr($phone) . '</li>'; }
$sitetitle		= get_post_meta( get_the_ID(), 'dsvy-team-details_sitetitle', true );
$siteurl		= get_post_meta( get_the_ID(), 'dsvy-team-details_siteurl', true ); 
$site			= '';
if( !empty($siteurl) ){
	$sitetitle		= ( empty($sitetitle) ) ? $siteurl : $sitetitle ;
	$site = '<li><label>'.esc_html__('Website', 'lyfpro').'</label> <a href="' . esc_url($siteurl) . '">' . esc_attr($sitetitle) . '</a> </li>';
}
$fax			= get_post_meta( get_the_ID(), 'dsvy-team-details_fax', true ); 
if( !empty($fax) ){ $fax = '<li><label>'.esc_html__('Fax', 'lyfpro').'</label> ' . esc_attr($fax) . '</li>'; }
if( function_exists('dsvy_uencode') ){
	$progress_1_number		= get_post_meta( get_the_ID(), 'dsvy-team-details_progress_1_number', true );
	$progress_1_label		= get_post_meta( get_the_ID(), 'dsvy-team-details_progress_1_label', true );
	$progress_2_number		= get_post_meta( get_the_ID(), 'dsvy-team-details_progress_2_number', true );
	$progress_2_label		= get_post_meta( get_the_ID(), 'dsvy-team-details_progress_2_label', true );
	$values = '';
	if( !empty($progress_1_label) ){
		$values .= '{"label":"'.esc_attr($progress_1_label).'","value":"'.esc_attr($progress_1_number).'"}';
	}
	if( !empty($progress_2_label) ){
		$values .= ',{"label":"'.esc_attr($progress_2_label).'","value":"'.esc_attr($progress_2_number).'"}';
	}
	if( !empty($values) ){
		$values = '['.$values.']';
	}
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class_list ); ?>>
	<div class="dsvy-team-single">
		<div class="row">
			<div class="col-md-5 col-lg-5">
				<div class="dsvy-team-left-inner">
					<?php dsvy_get_featured_data( array( 'featured_img_only' => false, 'size' => 'full' ) ); ?>			
				</div>
			</div>
			<div class="col-md-7 col-lg-7">
				<div class="dsvy-team-title-box">
					<h2 class="dsvy-team-title"><?php the_title(); ?></h2>
					<?php echo dsvy_esc_kses($designation); ?>
				</div>
				<?php echo dsvy_team_social_links(); ?>				
				<?php
					// Short Description
					$short_desc = get_post_meta( get_the_ID(), 'dsvy-team-details_short-description', true );
					if( !empty($short_desc) ){
						?>
						<div class="dsvy-short-description">
							<?php echo do_shortcode($short_desc); ?>
						</div>
						<?php
					}
				?>
				<ul class="dsvy-single-team-info">
					<?php echo dsvy_esc_kses($phone); ?>
					<?php echo dsvy_esc_kses($email); ?>
					<?php echo dsvy_esc_kses($site); ?>
					<?php echo dsvy_esc_kses($fax); ?>
				</ul>
			</div>
		</div><!-- .row -->
		<div class="dsvy-entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				'',
				get_the_title()
			) );
			?>
		</div>
	</div><!-- .dsvy-team-single -->
</article><!-- #post-## -->
<?php dsvy_edit_link(); ?>