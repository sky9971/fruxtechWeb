<?php
/**
 * Template part for displaying post meta
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.0
 */
$meta_array = array();
ob_start();
dsvy_blog_social_share();
$social = ob_get_contents();
ob_end_clean();
$social = trim($social);
?>
<?php if ( is_single() && ( !empty($social) || has_tag() ) ) { ?>
	<div class="dsvy-blog-meta dsvy-blog-meta-bottom <?php if( empty($social) ) : ?> dsvy-blog-meta-no-social<?php endif; ?>">
		<?php if( has_tag() ) : ?>
		<div class="dsvy-blog-meta-bottom-left">
			<?php echo dsvy_esc_kses( dsvy_meta_tag(', ', '<span class="dsvy-meta-title">' . esc_html__('Tags:', 'lyfpro') . '</span>' ) ); // Tag Meta ?>
		</div>
		<?php endif; ?>
		<?php if( !empty($social) ) : ?>
		<div class="dsvy-blog-meta-bottom-right">
			<?php dsvy_blog_social_share(); ?>
		</div>
		<?php endif; ?>
	</div>
<?php } ?>