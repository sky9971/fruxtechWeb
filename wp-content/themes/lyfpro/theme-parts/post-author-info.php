<?php
$bio = get_the_author_meta( 'description' );
if( !empty($bio) ) :
?>
	<div class="dsvy-author-box">
		<?php if(get_avatar(get_the_author_meta('ID')) !== FALSE) { ?>
			<div class="dsvy-author-image">
				<?php echo dsvy_esc_kses( get_avatar(get_the_author_meta('ID')) ); ?>
			</div>
		<?php } ?>
		<div class="dsvy-author-content">
			<span class="dsvy-author-name">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php printf( esc_attr__('Posted by %1$s','lyfpro'), get_the_author() ); ?>" rel="author"><?php echo get_the_author(); ?></a>
			</span>
			<p class="dsvy-text dsvy-author-bio"><?php the_author_meta( 'description' ); ?></p>
			<?php dsvy_author_social_links(); ?>
		</div>
	</div>
<?php endif; ?>