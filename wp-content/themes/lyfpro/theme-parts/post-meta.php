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
?>
<?php
/*** Author Meta ****/
?>
<span class="dsvy-meta dsvy-meta-author"><a class="dsvy-author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="demo-icon dsvy-base-icon-user"></i><?php echo get_the_author(); ?></a></span>
<?php
/*** Date Meta ****/
if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
	$time_string = sprintf( '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated dsvy-hide" datetime="%3$s">%4$s</time>',
		esc_attr( get_the_date( 'c' ) ),
		get_the_date( get_option('date_format') ),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date( get_option('date_format') )
	);
} else {
	$time_string = sprintf( '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( 'c' ) ),
		get_the_date( get_option('date_format') ) // ,
	);
}
?>
<span class="dsvy-meta dsvy-meta-date"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo dsvy_esc_kses($time_string); ?></a></span>
<?php
/*** Category Meta ****/
$cat_link        = true;
$categories_list = get_the_category_list( ', ' );
if ( !empty($categories_list) ) {
	if( $cat_link!=true ){
		$categories_list = strip_tags($categories_list);
	}
	?>
	<span class="dsvy-meta dsvy-meta-cat"><?php echo dsvy_esc_kses($categories_list); ?></span>
	<?php
}
?>
<?php
/*** Tag Meta ****/
$tag_link	= true;
$tags_list	= get_the_tag_list( '', esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'lyfpro' ) );
if ( !empty($tags_list) ) {
	if( $tag_link!=true ){
		$tags_list = strip_tags($tags_list);
	}
	?>
	<span class="dsvy-meta dsvy-meta-tags"><?php echo dsvy_esc_kses($tags_list); ?></span>
	<?php
}
?>
<?php
/*** Comments Meta ****/
if ( !post_password_required() && comments_open() && get_comments_number()>0 ) {
	?>
	<span class="dsvy-meta dsvy-meta-comments"><?php echo esc_html( get_comments_number() ); ?></span>
	<?php
}
?>